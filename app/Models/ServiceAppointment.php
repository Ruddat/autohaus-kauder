<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAppointment extends Model
{
    protected $fillable = [
        'name','email','phone','brand','model','license_plate',
        'date','time','status'
    ];
}
