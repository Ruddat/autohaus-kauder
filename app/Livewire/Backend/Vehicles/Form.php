<?php

namespace App\Livewire\Backend\Vehicles;

use App\Models\Badge;
use App\Models\Drive;
use App\Models\Vehicle;
use Livewire\Component;
use App\Models\FuelType;
use Illuminate\Support\Str;
use App\Models\Transmission;
use App\Models\VehicleBrand;
use App\Models\VehicleImage;
use Livewire\WithFileUploads;
use App\Services\ImageService;
use App\Services\FeatureService;
use Illuminate\Support\Facades\Storage;

class Form extends Component
{
    use WithFileUploads;

    public ?Vehicle $vehicle = null;

    // Stammdaten
    public $brand_id;
    public $model;
    public $fuel_type_id;
    public $transmission_id;
    public $drive_id;
    public $badge_id;

    // Fahrzeug-Felder
    public $slug;
    public $year;
    public $km;
    public $price;
    public $price_net;
    public $vat = 19;
    public $status = 'verfügbar';
    public $description;

    // Galerie + Hauptbild
    public $gallery = [];
    public $main_image_id = null;

    // Features
    public $features_input = '';
    public $features = [];

    protected function rules()
    {
        return [
            'brand_id' => 'required|exists:vehicle_brands,id',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . now()->year,
            'km' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',

            'fuel_type_id' => 'required|exists:fuel_types,id',
            'transmission_id' => 'required|exists:transmissions,id',
            'drive_id' => 'nullable|exists:drives,id',
            'badge_id' => 'nullable|exists:badges,id',

            'status' => 'required|in:verfügbar,reserviert,verkauft',

            'description' => 'nullable|string',

            'gallery' => 'array|max:30',
            'gallery.*' => 'image|max:8192',
        ];
    }

public function mount(Vehicle $vehicle = null)
{
    $this->vehicle = $vehicle;

    if ($vehicle) {
        $this->fill($vehicle->only([
            'brand_id', 'model', 'slug', 'year', 'km', 'price',
            'price_net', 'vat', 'status', 'description',
            'fuel_type_id', 'transmission_id', 'drive_id', 'badge_id'
        ]));

        $this->features = $vehicle->features()->pluck('name')->toArray();
        $this->features_input = implode(', ', $this->features);

        $this->main_image_id = optional($vehicle->mainImage)->id;
    }
}

    public function updated($field)
    {
        if (in_array($field, ['brand_id', 'model']) && !$this->vehicle) {
            $brandName = optional(VehicleBrand::find($this->brand_id))->name;
            $this->slug = Str::slug(trim($brandName . ' ' . $this->model));
        }
    }

    public function updatedFeaturesInput()
    {
        $this->features = collect(explode(',', $this->features_input))
            ->map(fn($x) => trim($x))
            ->filter()
            ->unique()
            ->values()
            ->toArray();
    }

    public function save(ImageService $imageService)
    {
        $this->validate();

        // Slug vorbereiten
        $brandName = optional(VehicleBrand::find($this->brand_id))->name;
        $slug = $this->slug ?: Str::slug(trim($brandName . ' ' . $this->model));

        $base = $slug;
        $i = 1;

        while (
            Vehicle::where('slug', $slug)
                ->when($this->vehicle, fn($q) => $q->where('id', '!=', $this->vehicle->id))
                ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }

        // Speicherdaten
        $data = [
            'brand_id' => $this->brand_id,
            'model' => $this->model,
            'slug' => $slug,
            'year' => $this->year,
            'km' => $this->km,
            'price' => $this->price,
            'price_net' => $this->price_net,
            'vat' => $this->vat,
            'status' => $this->status,
            'description' => $this->description,

            'fuel_type_id' => $this->fuel_type_id,
            'transmission_id' => $this->transmission_id,
            'drive_id' => $this->drive_id,
            'badge_id' => $this->badge_id,
        ];

        $vehicle = $this->vehicle
            ? tap($this->vehicle)->update($data)
            : Vehicle::create($data);

        $this->vehicle = $vehicle;

        // FEATURES
        FeatureService::syncFeatures($vehicle, $this->features);

        // BILDER UPLOAD
        if (!empty($this->gallery)) {
            $nextSort = (int)($vehicle->images()->max('sort_order') ?? 0);

            foreach ($this->gallery as $img) {

                $processed = $imageService->uploadVehicleImage(
                    $img,
                    $vehicle->id,
                    $brandName . ' ' . $this->model
                );

                $record = VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'path' => $processed['hero'],
                    'original' => $processed['original'],
                    'hero' => $processed['hero'],
                    'normal' => $processed['normal'],
                    'thumb' => $processed['thumb'],
                    'sort_order' => ++$nextSort,
                    'is_main' => false,
                ]);

                if (!$vehicle->mainImage) {
                    $record->update(['is_main' => true]);
                    $this->main_image_id = $record->id;
                }
            }

            $this->gallery = [];
            $vehicle->refresh();
        }

        // HAUPTBILD
        if ($this->main_image_id) {
            $vehicle->images()->update(['is_main' => false]);
            $vehicle->images()
                ->where('id', $this->main_image_id)
                ->update(['is_main' => true]);

            $main = $vehicle->mainImage;
            $vehicle->update([
                'main_image' => optional($main)->hero ?: optional($main)->path
            ]);
        }

        session()->flash('success', 'Fahrzeug gespeichert ✔️');

        return redirect()->route('backend.vehicles.index');
    }


public function removeNewImage($index) { unset($this->gallery[$index]); $this->gallery = array_values($this->gallery); }
 public function setMainImage($imageId) { $this->main_image_id = $imageId; }


public function deleteImage($imageId)
{
    $image = VehicleImage::findOrFail($imageId);

    // Physische Dateien löschen
    if ($image->original && Storage::exists($image->original)) {
        Storage::delete($image->original);
    }
    if ($image->hero && Storage::exists($image->hero)) {
        Storage::delete($image->hero);
    }
    if ($image->normal && Storage::exists($image->normal)) {
        Storage::delete($image->normal);
    }
    if ($image->thumb && Storage::exists($image->thumb)) {
        Storage::delete($image->thumb);
    }

    // War es das Hauptbild?
    $wasMain = $image->is_main;

    // Löschen aus DB
    $image->delete();

    // Hauptbild neu setzen
    if ($wasMain) {
        $newMain = $this->vehicle->images()->orderBy('sort_order')->first();
        if ($newMain) {
            $newMain->update(['is_main' => true]);
            $this->main_image_id = $newMain->id;
            $this->vehicle->update(['main_image' => $newMain->hero]);
        } else {
            // Wenn KEIN Bild mehr vorhanden ist
            $this->main_image_id = null;
            $this->vehicle->update(['main_image' => null]);
        }
    }

    $this->vehicle->refresh();
}




    public function render()
    {
        return view('livewire.backend.vehicles.form', [
            'brands' => VehicleBrand::orderBy('name')->get(),
            'fuelTypes' => FuelType::orderBy('name')->get(),
            'transmissions' => Transmission::orderBy('name')->get(),
            'drives' => Drive::orderBy('name')->get(),
            'badges' => Badge::orderBy('sort_order')->get(),
            'existingImages' => $this->vehicle ? $this->vehicle->images : collect(),
        ])
            ->extends('backend.layout.app')
            ->section('content')
            ->layoutData([
                'title' => $this->vehicle
                    ? 'Fahrzeug bearbeiten'
                    : 'Fahrzeug anlegen'
            ]);
    }
}
