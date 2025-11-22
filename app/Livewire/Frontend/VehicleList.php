<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Vehicle;

class VehicleList extends Component
{
    public $brand = 'Alle Marken';
    public $sort = 'price_asc';

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function updatedSort()
    {
        // automatisch neu rendern reicht
    }

    public function render()
    {
        // Grund-Query
        $query = Vehicle::query();

        // Filter nach Marke
        if ($this->brand !== 'Alle Marken') {
            $query->where('brand', $this->brand);
        }

        // Sortierung
        switch ($this->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;

            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;

            case 'year_desc':
                $query->orderBy('year', 'desc');
                break;

            case 'year_asc':
                $query->orderBy('year', 'asc');
                break;

            case 'brand_asc':
                $query->orderBy('brand', 'asc');
                break;
        }

        // Fahrzeuge laden (inkl. 1 Bild)
        $vehicles = $query->with('images')->limit(40)->get();

        return view('livewire.frontend.vehicle-list', [
            'vehicles' => $vehicles
        ]);
    }
}
