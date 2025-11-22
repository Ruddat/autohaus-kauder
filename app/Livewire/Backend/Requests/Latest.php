<?php

namespace App\Livewire\Backend\Requests;

use Livewire\Component;
use App\Models\RequestMessage;

class Latest extends Component
{
    public function markRead($id)
    {
        RequestMessage::where('id', $id)->update([
            'is_new' => false
        ]);
    }

    public function render()
    {
        return view('livewire.backend.requests.latest', [
            'requests' => RequestMessage::where('is_new', true)
                ->latest()
                ->take(5)
                ->get()
        ]);
    }
}
