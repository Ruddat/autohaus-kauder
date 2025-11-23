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


// Technische Daten
public $vehicle_number;
public $vin;
public $power;
public $hp;
public $kw;
public $ccm;
public $body_type;
public $doors;
public $seats;

// Farben & Innenraum
public $color;
public $color_code;
public $interior;
public $interior_color;
public $interior_material;

// Verbrauch
public $consumption;
public $co2;

// Flags
public $is_new = 0;
public $is_top = 0;
public $is_hot_deal = 0;

// Kategorie
public $category;

public $consumption_city;
public $consumption_country;
public $co2_norm = 'WLTP';
public $eco_class = null;

// Features
public $featureSearch = '';
public $featureSuggestions = [];
public $featureCategory = 'Alle';
public $allFeatureCategories = [];
public $quickFeatures = [];


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

        'vehicle_number' => 'nullable|string|max:50',
        'vin' => 'nullable|string|max:50',
        'power' => 'nullable|integer|min:0',
        'hp' => 'nullable|integer|min:0',
        'kw' => 'nullable|integer|min:0',
        'ccm' => 'nullable|integer|min:0',
        'body_type' => 'nullable|string|max:100',
        'doors' => 'nullable|integer|min:1|max:6',
        'seats' => 'nullable|integer|min:1|max:9',

        'color' => 'nullable|string|max:50',
        'color_code' => 'nullable|string|max:20',
        'interior' => 'nullable|string|max:50',
        'interior_color' => 'nullable|string|max:50',
        'interior_material' => 'nullable|string|max:50',

        // Verbrauch
        'consumption_city'    => 'nullable|numeric|min:0|max:99.9',
        'consumption_country' => 'nullable|numeric|min:0|max:99.9',
        'consumption'         => 'nullable|numeric|min:0|max:99.9',

        // CO₂
        'co2' => 'nullable|numeric|min:0|max:999',

        // Norm → 100 % korrekt
        'co2_norm' => 'required|string|in:WLTP,NEFZ',

        // Flags
        'is_new' => 'boolean',
        'is_top' => 'boolean',
        'is_hot_deal' => 'boolean',

        'category' => 'nullable|string|max:50',
    ];
}


/**
 * @param \App\Models\Vehicle|null $vehicle
 */
public function mount(?Vehicle $vehicle = null)
{
    $this->vehicle = $vehicle;

    if ($vehicle) {

        // Felder normal laden
        $this->fill($vehicle->only([
            'brand_id', 'model', 'slug', 'year', 'km', 'price',
            'price_net', 'vat', 'status', 'description',
            'fuel_type_id', 'transmission_id', 'drive_id', 'badge_id',
            'vehicle_number','vin','power','hp','kw','ccm',
            'body_type','doors','seats',
            'color','color_code','interior','interior_color','interior_material',
            'consumption','co2',
            'is_new','is_top','is_hot_deal',
            'category',
            'consumption_city','consumption_country','co2_norm',
        ]));

        // 🔥 Automatische Fallback-Norm setzen
        if (!$this->co2_norm) {
            $this->co2_norm = 'WLTP';
        }

        // Verbräuche korrekt typisieren
        $this->consumption_city = $vehicle->consumption_city !== null ? floatval($vehicle->consumption_city) : null;
        $this->consumption_country = $vehicle->consumption_country !== null ? floatval($vehicle->consumption_country) : null;
        $this->consumption = $vehicle->consumption !== null ? floatval($vehicle->consumption) : null;

        // CO₂ typisieren
        $this->co2 = $vehicle->co2 !== null ? floatval($vehicle->co2) : null;

        // Features
        $this->features = $vehicle->features()->pluck('name')->toArray();
        $this->features_input = implode(', ', $this->features);

        // Hauptbild
        $this->main_image_id = optional($vehicle->mainImage)->id;
    }

    // Alle Feature-Kategorien laden
$this->allFeatureCategories = \App\Models\Feature::whereNotNull('category')
    ->distinct()
    ->orderBy('category')
    ->pluck('category')
    ->toArray();

$this->loadQuickFeatures();

}


public function loadQuickFeatures()
{
    $query = \App\Models\Feature::orderBy('category')->orderBy('name');

    if ($this->featureCategory !== 'Alle') {
        $query->where('category', $this->featureCategory);
    }

    $this->quickFeatures = $query->limit(60)->get();
}

public function setFeatureCategory($category)
{
    $this->featureCategory = $category;
    $this->loadQuickFeatures();
}


public function updatedFeatureSearch()
{
    $term = trim($this->featureSearch);

    if (strlen($term) < 2) {
        $this->featureSuggestions = [];
        return;
    }

    $this->featureSuggestions = \App\Models\Feature::where('name', 'like', "%{$term}%")
        ->orderBy('name')
        ->limit(10)
        ->get();
}


public function addFeature($name = null)
{
    $name = trim($name ?? $this->featureSearch);

    if ($name === '') return;

    $slug = Str::slug($name);

    // Feature existiert?
    $feature = \App\Models\Feature::firstOrCreate(
        ['slug' => $slug],
        [
            'name' => $name,
            'category' => $this->featureCategory !== 'Alle'
                ? $this->featureCategory
                : null,
        ]
    );

    if (!in_array($feature->slug, $this->features)) {
        $this->features[] = $feature->slug;
    }

    $this->featureSearch = '';
    $this->featureSuggestions = [];
}


public function removeFeature($slug)
{
    $this->features = array_filter(
        $this->features,
        fn($f) => $f !== $slug
    );
    $this->features = array_values($this->features);
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

      // dd($this->kw);

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

'vehicle_number' => $this->vehicle_number,
'vin' => $this->vin,
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

'is_new' => $this->is_new ? 1 : 0,
'is_top' => $this->is_top ? 1 : 0,
'is_hot_deal' => $this->is_hot_deal ? 1 : 0,

'category' => $this->category,

'consumption_city' => $this->consumption_city,
'consumption_country' => $this->consumption_country,
'co2_norm' => $this->co2_norm,

        ];

//dd($data);


        $vehicle = $this->vehicle
            ? tap($this->vehicle)->update($data)
            : Vehicle::create($data);

        $this->vehicle = $vehicle;

        // FEATURES
//        FeatureService::syncFeatures($vehicle, $this->features);
        FeatureService::syncFeatures($vehicle, $this->features); // enthält Slugs!

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


 public function updatedKw($value)
{
    if ($value !== null && $value !== '') {
        $this->hp = round($value * 1.35962);
    } else {
        $this->hp = null;
    }
}


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


public function updatedConsumptionCity($value)
{
    $this->updateCombined();
}

public function updatedConsumptionCountry($value)
{
    $this->updateCombined();
}

private function updateCombined()
{
    if (is_numeric($this->consumption_city) && is_numeric($this->consumption_country)) {
        $city = floatval($this->consumption_city);
        $country = floatval($this->consumption_country);

        // WLTP-Gewichtung
        $this->consumption = round(($city * 0.55) + ($country * 0.45), 1);
    }
}

public function updatedCo2($value)
{

$value = str_replace([',', ' '], ['.', ''], $value);


    if (!is_numeric($value)) {
        $this->eco_class = null;
        return;
    }

    $value = floatval($value);

    if ($value < 100) {
        $this->eco_class = 'green';
    } elseif ($value < 150) {
        $this->eco_class = 'yellow';
    } else {
        $this->eco_class = 'red';
    }
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
