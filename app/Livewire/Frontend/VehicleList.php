<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Vehicle;
use App\Models\VehicleBrand;

class VehicleList extends Component
{
    public $brand_id = null;
    public $model = null;

    public $price_from = null;
    public $price_to = null;

    public $year_from = null;
    public $year_to = null;

    public $km_from = null;
    public $km_to = null;

    public $fuel_type_id = null;
    public $transmission_id = null;
    public $drive_id = null;
    public $badge_id = null;

    public $sort = 'price_asc';
    public $models = [];

public $filtersOpen = false;

public $initialFilter = null;

public function mount($filter = null)
{
    $this->initialFilter = $filter;

    // Homepage → Neu
    if ($filter === 'new') {
        $this->sort = 'created_at_desc';
    }

    // Homepage → Top Fahrzeuge
    if ($filter === 'top') {
        $badgeTop = \App\Models\Badge::where('label', 'TOP')->first()?->id;
        if ($badgeTop) {
            $this->badge_id = $badgeTop;
        }
    }

    // Homepage → Hot Deals (SALE)
    if ($filter === 'hot' || $filter === 'sale') {
        $badgeSale = \App\Models\Badge::where('label', 'SALE')->first()?->id;
        if ($badgeSale) {
            $this->badge_id = $badgeSale;
        }
    }
}


    public function updatedBrandId()
    {
        $this->model = null;

        $this->models = Vehicle::where('brand_id', $this->brand_id)
            ->select('model')
            ->distinct()
            ->orderBy('model')
            ->pluck('model')
            ->toArray();
    }
public function toggleFilters()
{
    $this->filtersOpen = !$this->filtersOpen;
}
    public function resetFilters()
    {
        $this->brand_id = null;
        $this->model = null;
        $this->price_from = null;
        $this->price_to = null;
        $this->year_from = null;
        $this->year_to = null;
        $this->km_from = null;
        $this->km_to = null;

        $this->fuel_type_id = null;
        $this->transmission_id = null;
        $this->drive_id = null;
        $this->badge_id = null;

        $this->sort = 'price_asc';
    }

    public function render()
    {
        $brands = VehicleBrand::whereHas('vehicles')
            ->orderBy('name')
            ->get();

        $fuelTypes = \App\Models\FuelType::orderBy('name')->get();
        $transmissions = \App\Models\Transmission::orderBy('name')->get();
        $drives = \App\Models\Drive::orderBy('name')->get();
        $badges = \App\Models\Badge::orderBy('sort_order')->get();

        $query = Vehicle::query()->with(['brandRef', 'images', 'features']);

        // Marke
        if ($this->brand_id) {
            $query->where('brand_id', $this->brand_id);
        }

        // Modell
        if ($this->model) {
            $query->where('model', $this->model);
        }

        // Preis
        if ($this->price_from) {
            $query->where('price', '>=', $this->price_from);
        }
        if ($this->price_to) {
            $query->where('price', '<=', $this->price_to);
        }

        // Erstzulassung
        if ($this->year_from) {
            $query->where('year', '>=', $this->year_from);
        }
        if ($this->year_to) {
            $query->where('year', '<=', $this->year_to);
        }

        // Kilometer
        if ($this->km_from) {
            $query->where('km', '>=', $this->km_from);
        }
        if ($this->km_to) {
            $query->where('km', '<=', $this->km_to);
        }

        // NEUE Filter
        if ($this->fuel_type_id) {
            $query->where('fuel_type_id', $this->fuel_type_id);
        }

        if ($this->transmission_id) {
            $query->where('transmission_id', $this->transmission_id);
        }

        if ($this->drive_id) {
            $query->where('drive_id', $this->drive_id);
        }

        if ($this->badge_id) {
            $query->where('badge_id', $this->badge_id);
        }

        // Sortierung
        switch ($this->sort) {
            case 'price_desc': $query->orderBy('price', 'desc'); break;
            case 'year_desc':  $query->orderBy('year', 'desc'); break;
            case 'year_asc':   $query->orderBy('year', 'asc'); break;
            case 'km_asc':     $query->orderBy('km', 'asc'); break;
            case 'km_desc':    $query->orderBy('km', 'desc'); break;
            case 'price_asc':
            default: $query->orderBy('price', 'asc'); break;
        }

        $vehicles = $query->paginate(20);

        return view('livewire.frontend.vehicle-list', [
            'vehicles' => $vehicles,
            'brands' => $brands,
            'models' => $this->models,
            'fuelTypes' => $fuelTypes,
            'transmissions' => $transmissions,
            'drives' => $drives,
            'badges' => $badges,
        ]);
    }
}
