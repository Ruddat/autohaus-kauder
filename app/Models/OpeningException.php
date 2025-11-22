<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningException extends Model
{
    protected $fillable = [
        'department','date','opens','closes','is_closed','note'
    ];
}
