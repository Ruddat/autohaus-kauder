<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\VehiclePageController;
use App\Http\Controllers\Frontend\VehicleDetailController;

Route::get('/', \App\Http\Controllers\Frontend\HomeController::class)
    ->name('home');

// Übersicht + Filter
Route::get('/fahrzeuge/{filter?}', VehiclePageController::class)
    ->name('vehicles.index');

// Detail → eigener Scope
Route::get('/fahrzeug/{slug}', VehicleDetailController::class)
    ->name('vehicles.show');

//Route::get('/fahrzeuge/{vehicle}', \App\Http\Controllers\Frontend\VehicleDetailController::class)
//    ->name('vehicles.show');

Route::get('/fahrzeuge/{slug}', \App\Http\Controllers\Frontend\VehicleDetailController::class)->name('vehicles.show');

Route::get('/service', \App\Http\Controllers\Frontend\ServicePageController::class)
      ->name('frontend.service');

Route::get('/ueber-uns', \App\Http\Controllers\Frontend\AboutPageController::class)
    ->name('frontend.about');

Route::get('/kontakt', \App\Http\Controllers\Frontend\ContactPageController::class)
   ->name('frontend.contact');

