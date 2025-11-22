<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class VehicleInquiry extends Component
{
    public $vehicleTitle;
    public $vehicleId;

    public $name;
    public $email;
    public $phone;
    public $message;
    public $privacy = false;

    public $success = false;

    public function mount($vehicleTitle, $vehicleId)
    {
        $this->vehicleTitle = $vehicleTitle;
        $this->vehicleId = $vehicleId;
        $this->message = "Ich interessiere mich für den {$vehicleTitle} (FZ-{$vehicleId})";
    }

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'phone' => 'required|string|min:5',
        'message' => 'required|string|min:10',
        'privacy' => 'accepted'
    ];

    public function submit()
    {
        $this->validate();

        // später E-Mail an Händler
        // Mail::to('info@autohaus-kauder.de')->send(new VehicleInquiryMail(...));

        $this->success = true;

        $this->resetExcept('success', 'vehicleTitle', 'vehicleId');
    }

    public function render()
    {
        return view('livewire.frontend.vehicle-inquiry');
    }
}
