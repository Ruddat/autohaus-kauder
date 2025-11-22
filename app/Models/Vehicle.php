<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'year',
        'km',
        'price',
        'fuel',
        'gear',
        'status',
        'description',
        'slug',

    ];

    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }

protected static function booted()
{
    static::creating(function ($vehicle) {
        $vehicle->slug = Str::slug($vehicle->brand . ' ' . $vehicle->model . '-' . uniqid());
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


}
