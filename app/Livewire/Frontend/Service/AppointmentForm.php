<?php

namespace App\Livewire\Frontend\Service;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class AppointmentForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $vehicle;
    public $service;
    public $message;

    public $success = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:50',
        'vehicle' => 'nullable|string|max:255',
        'service' => 'required|string|max:255',
        'message' => 'nullable|string|max:2000',
    ];

    public function submit()
    {
        $this->validate();

        // Mail versenden
        Mail::send('emails.service-appointment', ['data' => $this->all()], function ($m) {
            $m->to('service@autohaus-kauder.de')
              ->subject('Neue Service-Anfrage');
        });

        $this->reset();
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.frontend.service.appointment-form');
    }
}
