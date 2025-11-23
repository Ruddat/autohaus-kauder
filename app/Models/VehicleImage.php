<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    protected $fillable = [
        'vehicle_id',
        'path',
        'original',
        'hero',
        'normal',
        'thumb',
        'is_main',
        'sort_order',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
