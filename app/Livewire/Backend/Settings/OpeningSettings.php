<?php

namespace App\Livewire\Backend\Settings;

use Livewire\Component;
use App\Models\OpeningHour;
use App\Models\OpeningException;

class OpeningSettings extends Component
{
    public string $tab = 'sales'; // sales | workshop | exceptions

    public array $salesHours = [];
    public array $workshopHours = [];

    public array $exceptions = [];
    public bool $showExceptionModal = false;

    public array $exceptionForm = [
        'department' => 'sales',
        'date' => null,
        'opens' => null,
        'closes' => null,
        'is_closed' => false,
        'note' => null,
    ];

    public function mount()
    {
        $this->salesHours = $this->loadHours('sales');
        $this->workshopHours = $this->loadHours('workshop');
        $this->exceptions = $this->loadExceptions();
    }

    private function loadHours(string $department): array
    {
        // falls noch nichts da ist: default 7 Tage erzeugen
        foreach (range(1,7) as $weekday) {
            OpeningHour::firstOrCreate(
                ['department' => $department, 'weekday' => $weekday],
                ['opens' => '09:00', 'closes' => '18:00', 'is_closed' => $weekday === 7]
            );
        }

        return OpeningHour::where('department', $department)
            ->orderBy('weekday')
            ->get()
            ->map(fn($d) => [
                'id' => $d->id,
                'weekday' => $d->weekday,
                'opens' => $d->opens,
                'closes' => $d->closes,
                'is_closed' => $d->is_closed,
            ])->toArray();
    }

    private function loadExceptions(): array
    {
        return OpeningException::orderBy('date','desc')
            ->limit(200)
            ->get()
            ->map(fn($e) => [
                'id' => $e->id,
                'department' => $e->department,
                'date' => $e->date,
                'opens' => $e->opens,
                'closes' => $e->closes,
                'is_closed' => $e->is_closed,
                'note' => $e->note,
            ])->toArray();
    }

    public function saveSales()
    {
        $this->saveHoursArray($this->salesHours, 'sales');
        $this->dispatch('saved');
    }

    public function saveWorkshop()
    {
        $this->saveHoursArray($this->workshopHours, 'workshop');
        $this->dispatch('saved');
    }

    private function saveHoursArray(array $hours, string $department)
    {
        foreach ($hours as $row) {
            OpeningHour::updateOrCreate(
                ['id' => $row['id']],
                [
                    'department' => $department,
                    'weekday' => $row['weekday'],
                    'opens' => $row['is_closed'] ? null : $row['opens'],
                    'closes' => $row['is_closed'] ? null : $row['closes'],
                    'is_closed' => (bool)$row['is_closed'],
                ]
            );
        }
    }

    public function openExceptionModal(string $department = 'sales')
    {
        $this->exceptionForm = [
            'department' => $department,
            'date' => now()->format('Y-m-d'),
            'opens' => null,
            'closes' => null,
            'is_closed' => false,
            'note' => null,
        ];
        $this->showExceptionModal = true;
    }

    public function saveException()
    {
        $data = $this->exceptionForm;

        OpeningException::create([
            'department' => $data['department'],
            'date' => $data['date'],
            'opens' => $data['is_closed'] ? null : $data['opens'],
            'closes' => $data['is_closed'] ? null : $data['closes'],
            'is_closed' => (bool)$data['is_closed'],
            'note' => $data['note'],
        ]);

        $this->exceptions = $this->loadExceptions();
        $this->showExceptionModal = false;
        $this->dispatch('saved');
    }

    public function deleteException(int $id)
    {
        OpeningException::whereKey($id)->delete();
        $this->exceptions = $this->loadExceptions();
    }

    public function render()
    {
        return view('livewire.backend.settings.opening-settings')
                    ->extends('backend.layout.app')
            ->section('content')
            ->layoutData(['title' => 'Öffnungszeiten']);
    }
}
