<?php

namespace App\Livewire\Backend\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\Support\Str;

class QuickCreate extends Component
{
    public $brand = '';
    public $model = '';
    public $price = '';
    public $year = '';
    public $fuel = 'Benzin';
    public $gear = 'Automatik';
    public $km = '';

    public function rules()
    {
        return [
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'year'  => 'required|integer|min:1900|max:' . now()->year,
            'km'    => 'required|integer|min:0',
            'fuel'  => 'required|string|max:100',
            'gear'  => 'required|string|max:100',
        ];
    }

    public function save()
    {
        $this->validate();

        // Slug
        $slug = Str::slug($this->brand . '-' . $this->model . '-' . time());

        $vehicle = Vehicle::create([
            'brand' => $this->brand,
            'model' => $this->model,
            'slug'  => $slug,
            'price' => $this->price,
            'year'  => $this->year,
            'km'    => $this->km,
            'fuel'  => $this->fuel,
            'gear'  => $this->gear,
            'status' => 'verfügbar',
            'description' => null,
        ]);

        // Reset Formular
        $this->reset();

        // Dashboard soll die Liste neu laden
        $this->dispatch('vehicle-added');

        session()->flash('quick_created', 'Fahrzeug erfolgreich erstellt!');

        return;
    }

    public function render()
    {
        return view('livewire.backend.vehicles.quick-create');
    }
}
