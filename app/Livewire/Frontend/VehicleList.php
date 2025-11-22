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

    public $sort = 'price_asc';

    public $models = []; // dynamische Modelle pro Marke

    public function updatedBrandId()
    {
        // Reset Modell & Modelle laden
        $this->model = null;

        $this->models = Vehicle::where('brand_id', $this->brand_id)
            ->select('model')
            ->distinct()
            ->orderBy('model')
            ->pluck('model')
            ->toArray();
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
        $this->sort = 'price_asc';
    }

    public function render()
    {
        $brands = VehicleBrand::whereHas('vehicles')
            ->orderBy('name')
            ->get();


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

        // Sortierung
        switch ($this->sort) {
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'year_desc':
                $query->orderBy('year', 'desc');
                break;
            case 'year_asc':
                $query->orderBy('year', 'asc');
                break;
            case 'km_asc':
                $query->orderBy('km', 'asc');
                break;
            case 'km_desc':
                $query->orderBy('km', 'desc');
                break;
            case 'price_asc':
            default:
                $query->orderBy('price', 'asc');
                break;
        }

        $vehicles = $query->paginate(20);

        return view('livewire.frontend.vehicle-list', [
            'vehicles' => $vehicles,
            'brands' => $brands,
            'models' => $this->models,
        ]);
    }
}
