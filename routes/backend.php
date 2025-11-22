<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Backend\Vehicles\Index as BackendVehiclesIndex;
use App\Livewire\Backend\Vehicles\Form as BackendVehiclesForm;

// Dashboard
Route::get('backend/dashboard', \App\Http\Controllers\Backend\DashboardController::class)
    ->name('backend.dashboard');

// Fahrzeuge
Route::get('backend/vehicles', BackendVehiclesIndex::class)
    ->name('backend.vehicles.index');

Route::get('backend/vehicles/create', BackendVehiclesForm::class)
    ->name('backend.vehicles.create');

Route::get('backend/vehicles/{vehicle}/edit', BackendVehiclesForm::class)
    ->name('backend.vehicles.edit');

Route::delete('backend/vehicles/{vehicle}', function (\App\Models\Vehicle $vehicle) {
    $vehicle->delete();
    return redirect()->route('backend.vehicles.index');
})->name('backend.vehicles.destroy');

// Showroom
Route::get('backend/showroom', \App\Livewire\Backend\Showroom\ShowIndex::class)
    ->name('backend.showroom');

// Team
Route::get('backend/team', \App\Livewire\Backend\Team\TeamIndex::class)
    ->name('backend.team.index');

// Service
Route::get('backend/service', \App\Http\Controllers\Backend\ServiceController::class)
    ->name('backend.service');

// Einstellungen
Route::get('backend/settings', \App\Http\Controllers\Backend\SettingsController::class)
    ->name('backend.settings');


    Route::get('/backend/test', function() {
    return "BACKEND ROUTES ARE ACTIVE";
});

Route::get('backend/website', function () {
    return view('backend.website.index');
})->name('backend.website');
