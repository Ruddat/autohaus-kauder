<?php

namespace App\Livewire\Frontend\Service;

use Livewire\Component;
use App\Models\ServiceItem;
use Illuminate\Support\Facades\Mail;

class RequestForm extends Component
{
    public $name;
    public $phone;
    public $email;

    public $brand;
    public $model;
    public $plate;
    public $year;

    public $service;
    public $message;

    public $privacy = false;
    public $success = false;

    protected $rules = [
        'name'     => 'required|string|max:255',
        'phone'    => 'required|string|max:100',
        'email'    => 'required|email|max:255',
        'brand'    => 'nullable|string|max:255',
        'model'    => 'nullable|string|max:255',
        'plate'    => 'nullable|string|max:50',
        'year'     => 'nullable|integer|min:1950|max:2050',
        'service'  => 'required|string|max:255',
        'message'  => 'nullable|string|max:2000',
        'privacy'  => 'accepted'
    ];

    public function submit()
    {
        $this->validate();

        // Mail verschicken
        Mail::send('emails.service-request', [
            'data' => $this->all()
        ], function ($m) {
            $m->to('service@autohaus-kauder.de')
              ->subject('Neue Service-Anfrage');
        });

        $this->reset();
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.frontend.service.request-form', [
            'services' => ServiceItem::orderBy('sort_order')->get(),
            'brands'   => ['Mercedes-Benz', 'Audi', 'BMW', 'Lexus', 'Andere'],
        ]);
    }
}
