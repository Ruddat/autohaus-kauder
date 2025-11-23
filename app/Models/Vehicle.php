<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'brand_id',
        'model',
        'year',
        'km',
        'price',
        'status',
        'description',
        'slug',

        // neue Felder
        'fuel_type_id',
        'transmission_id',
        'drive_id',
        'badge_id',
    ];

    // ❌ Altes Casting ENTFERNT
    // protected $casts = ['badge' => 'string'];

    protected static function booted()
    {
        static::creating(function ($vehicle) {

            // Marke sauber holen
            $brandName = $vehicle->brandRef->name ?? 'fahrzeug';

            $vehicle->slug = Str::slug($brandName . '-' . $vehicle->model . '-' . uniqid());
        });
    }

    public function features()
    {
        return $this->belongsToMany(\App\Models\Feature::class, 'vehicle_feature');
    }

    public function brandRef()
    {
        return $this->belongsTo(VehicleBrand::class, 'brand_id');
    }

    public function isVatDeductible(): bool
    {
        return $this->price_net !== null && $this->price_net > 0;
    }

    public function mainImage()
    {
        return $this->hasOne(VehicleImage::class)->where('is_main', true);
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class)->orderBy('sort_order');
    }

    public function fuelType()
    {
        return $this->belongsTo(FuelType::class);
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class);
    }

    public function drive()
    {
        return $this->belongsTo(Drive::class);
    }

    public function badge()
    {
        return $this->belongsTo(\App\Models\Badge::class, 'badge_id');
    }
}
