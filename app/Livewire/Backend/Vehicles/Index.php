<?php

namespace App\Livewire\Backend\Vehicles;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $sort = 'created_at';
    public $direction = 'desc';

    public $mode = 'page';

    protected $queryString = ['search', 'status', 'sort', 'direction'];

    protected $listeners = ['refreshVehicles'];

public function mount($mode = 'page')
{
    $this->mode = $mode;
}


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

public function refreshVehicles()
{
    $this->resetPage();
}


    public function sortBy($field)
    {
        if ($this->sort === $field) {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort = $field;
            $this->direction = 'asc';
        }
    }

    public function deleteVehicle($id)
    {
        Vehicle::findOrFail($id)->delete();
    }

public function render()
{
    $vehicles = Vehicle::query()
        ->when($this->search, function ($q) {
            $q->where('brand', 'like', "%{$this->search}%")
              ->orWhere('model', 'like', "%{$this->search}%");
        })
        ->when($this->status, fn($q) => $q->where('status', $this->status))
        ->orderBy($this->sort, $this->direction)
        ->paginate(10);

    // Dashboard-Mode → nur Tabelle zurückgeben
    if ($this->mode === 'dashboard') {
        return view('livewire.backend.vehicles.table', [
            'vehicles' => $vehicles,
        ]);
    }

    // Normale Seite → vollständiges Layout
    return view('livewire.backend.vehicles.index', [
        'vehicles' => $vehicles,
    ])
        ->extends('backend.layout.app')
        ->section('content')
        ->layoutData(['title' => 'Fahrzeuge']);
}
}
