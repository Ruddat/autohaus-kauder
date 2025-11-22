<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Frontend\HomeController::class)
    ->name('home');

Route::get('/fahrzeuge/{filter?}', \App\Http\Controllers\Frontend\VehiclePageController::class)
    ->name('vehicles.index');

//Route::get('/fahrzeuge/{vehicle}', \App\Http\Controllers\Frontend\VehicleDetailController::class)
//    ->name('vehicles.show');

Route::get('/fahrzeuge/{slug}', \App\Http\Controllers\Frontend\VehicleDetailController::class)->name('vehicles.show');


Route::get('/service', \App\Http\Controllers\Frontend\ServicePageController::class)
      ->name('frontend.service');

Route::get('/ueber-uns', \App\Http\Controllers\Frontend\AboutPageController::class)
    ->name('frontend.about');

Route::get('/kontakt', \App\Http\Controllers\Frontend\ContactPageController::class)
   ->name('frontend.contact');

