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
        'description'
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
    return $this->belongsToMany(Feature::class, 'vehicle_feature');
}

}
