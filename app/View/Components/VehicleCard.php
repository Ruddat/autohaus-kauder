<?php

namespace App\View\Components;

use Closure;
use App\Models\Vehicle;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class VehicleCard extends Component
{
    public Vehicle $v;

    public function __construct(Vehicle $v)
    {
        $this->v = $v;
    }

    public function render()
    {
        return view('components.vehicle-card');
    }
}
