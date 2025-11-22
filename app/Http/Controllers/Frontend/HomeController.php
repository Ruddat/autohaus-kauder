<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('frontend.home', [
            'newVehicles' => Vehicle::orderBy('created_at', 'desc')
                ->with('images')
                ->take(4)
                ->get(),

            'topVehicles' => Vehicle::where('badge', 'TOP')
                ->with('images')
                ->take(4)
                ->get(),

            'hotDeals' => Vehicle::where('badge', 'SALE')
                ->with('images')
                ->take(4)
                ->get(),
        ]);
    }
}
