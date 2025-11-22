<?php

namespace App\Http\Controllers\Backend;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\RequestMessage;
use App\Models\ServiceAppointment;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('backend.dashboard', [
            'activeVehicles'     => Vehicle::where('status', 'available')->count(),
            'soldVehicles'       => Vehicle::where('status', 'sold')->count(),
            'serviceAppointments'=> ServiceAppointment::count(),
            'newRequests'        => RequestMessage::where('is_new', true)->count(),
            'vehicles'           => Vehicle::latest()->take(10)->get(),
        ]);
    }
}
