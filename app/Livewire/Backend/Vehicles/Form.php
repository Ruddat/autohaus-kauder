<?php

namespace App\Livewire\Backend\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\VehicleImage;
use Livewire\WithFileUploads;
use App\Services\FeatureService;

class Form extends Component
{
    use WithFileUploads;

    public ?Vehicle $vehicle = null;

    // Fahrzeugfelder (matching deiner Migration)
    public $brand, $model, $slug, $year, $km, $price, $price_net, $vat = 19;
    public $fuel, $gear, $drive, $power, $hp, $kw, $ccm;
    public $body_type, $doors, $seats;
    public $color, $color_code, $interior, $interior_color, $interior_material;
    public $consumption, $co2;
    public $vehicle_number, $vin, $badge, $category;
    public $status = 'verfügbar';
    public $description;

    // Features (Tagging)
    public $features_input = '';    // Komma-getrennt
    public $features = [];          // Array der Strings

    // Galerie Upload
    public $gallery = [];           // temporäre Uploads (max 30)

    // Hauptbild Auswahl (existing)
    public $main_image_id = null;   // ID aus vehicle_images

    protected function rules()
    {
        return [
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year'  => 'required|integer|min:1900|max:' . now()->year,
            'km'    => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
            'fuel'  => 'required|string|max:100',
            'gear'  => 'required|string|max:100',
            'status'=> 'required|in:verfügbar,reserviert,verkauft',

            // optional fields
            'slug'  => 'nullable|string|max:255',
            'description' => 'nullable|string',

            // upload rules
            'gallery' => 'array|max:30',
            'gallery.*' => 'image|max:8192', // bis 8MB pro Bild
        ];
    }

public function mount($vehicle = null)
{
    if ($vehicle) {
        $this->vehicle = Vehicle::findOrFail($vehicle);

        $this->fill($this->vehicle->only([
            'brand','model','slug','year','km','price','price_net','vat',
            'fuel','gear','drive','power','hp','kw','ccm',
            'body_type','doors','seats',
            'color','color_code','interior','interior_color','interior_material',
            'consumption','co2',
            'vehicle_number','vin','badge','category',
            'status','description'
        ]));


dd($this->vehicle);

        // Features
        $this->features = $this->vehicle->features()->pluck('name')->toArray();
        $this->features_input = implode(', ', $this->features);

        // Main Image
        $this->main_image_id = optional($this->vehicle->mainImage)->id;
    }
}


    public function updated($field)
    {
        // Slug live generieren wenn Brand/Model geändert werden
        if (in_array($field, ['brand', 'model']) && !$this->vehicle) {
            $this->slug = Str::slug(trim($this->brand.' '.$this->model));
        }
    }

    public function updatedFeaturesInput()
    {
        // Tags aus dem Input bauen
        $this->features = collect(explode(',', $this->features_input))
            ->map(fn($x) => trim($x))
            ->filter()
            ->unique()
            ->values()
            ->toArray();
    }

    public function removeNewImage($index)
    {
        unset($this->gallery[$index]);
        $this->gallery = array_values($this->gallery);
    }

    public function setMainImage($imageId)
    {
        $this->main_image_id = $imageId;
    }

    public function save()
    {
        $this->validate();

        // Slug fixieren
        $slug = $this->slug ?: Str::slug(trim($this->brand.' '.$this->model));

        // Slug unique machen
        $slugBase = $slug;
        $i = 1;
        while (
            Vehicle::where('slug', $slug)
                ->when($this->vehicle, fn($q)=>$q->where('id','!=',$this->vehicle->id))
                ->exists()
        ) {
            $slug = $slugBase.'-'.$i++;
        }

        $data = [
            'brand' => $this->brand,
            'model' => $this->model,
            'slug'  => $slug,
            'year'  => $this->year,
            'km'    => $this->km,
            'price' => $this->price,
            'price_net' => $this->price_net,
            'vat' => $this->vat,
            'fuel' => $this->fuel,
            'gear' => $this->gear,
            'drive' => $this->drive,
            'power' => $this->power,
            'hp' => $this->hp,
            'kw' => $this->kw,
            'ccm' => $this->ccm,
            'body_type' => $this->body_type,
            'doors' => $this->doors,
            'seats' => $this->seats,
            'color' => $this->color,
            'color_code' => $this->color_code,
            'interior' => $this->interior,
            'interior_color' => $this->interior_color,
            'interior_material' => $this->interior_material,
            'consumption' => $this->consumption,
            'co2' => $this->co2,
            'vehicle_number' => $this->vehicle_number,
            'vin' => $this->vin,
            'badge' => $this->badge,
            'category' => $this->category,
            'status' => $this->status,
            'description' => $this->description,
        ];

        $vehicle = $this->vehicle
            ? tap($this->vehicle)->update($data)
            : Vehicle::create($data);

        $this->vehicle = $vehicle;

        // 🔥 Features auto-learning + sync
        FeatureService::syncFeatures($vehicle, $this->features);

        // 🔥 Galerie speichern (bis 30)
        if (!empty($this->gallery)) {
            $nextSort = (int) $vehicle->images()->max('sort_order');

            foreach ($this->gallery as $img) {
                $path = $img->store("vehicles/{$vehicle->id}", 'public');

                $record = VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'path' => $path,
                    'sort_order' => ++$nextSort,
                    'is_main' => false,
                ]);

                // wenn noch kein main image gesetzt ist, erstes Bild main machen
                if (!$vehicle->mainImage) {
                    $record->update(['is_main' => true]);
                    $this->main_image_id = $record->id;
                }
            }

            // temp uploads leeren
            $this->gallery = [];
        }

        // 🔥 Hauptbild prüfen/setzen
        if ($this->main_image_id) {
            $vehicle->images()->update(['is_main' => false]);
            $vehicle->images()->where('id', $this->main_image_id)->update([
                'is_main' => true
            ]);
            $vehicle->update([
                'main_image' => optional($vehicle->mainImage)->path
            ]);
        }

        session()->flash('success', 'Fahrzeug gespeichert ✅');

        return redirect()->route('backend.vehicles.edit', $vehicle);
    }

public function render()
{
    return view('livewire.backend.vehicles.form', [
        'existingImages' => $this->vehicle
            ? $this->vehicle->images()->get()
            : collect(),
    ])
        ->extends('backend.layout.app')             // WICHTIG für @yield
        ->section('content')                        // WICHTIG für @yield
        ->layoutData([
            'title' => $this->vehicle
                ? 'Fahrzeug bearbeiten'
                : 'Fahrzeug anlegen',
        ]);
}

}
