<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleDetailController extends Controller
{
    public function __invoke($slug)
    {
        $vehicle = Vehicle::where('slug', $slug)
            ->with('images')
            ->firstOrFail();

        return view('frontend.vehicles.show', compact('vehicle'));
    }
}
