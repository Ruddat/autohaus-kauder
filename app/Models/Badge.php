<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'label',
        'color',
        'text_color',
        'sort_order',
        'active'
    ];
}
