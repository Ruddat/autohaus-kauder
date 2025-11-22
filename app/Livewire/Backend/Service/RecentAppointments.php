<?php

namespace App\Livewire\Backend\Service;

use Livewire\Component;
use App\Models\ServiceAppointment;

class RecentAppointments extends Component
{
    public function markAsDone($id)
    {
        ServiceAppointment::where('id', $id)->update([
            'status' => 'done'
        ]);
    }

    public function render()
    {
        return view('livewire.backend.service.recent-appointments', [
            'appointments' => ServiceAppointment::latest()
                ->take(5)
                ->get()
        ]);
    }
}
