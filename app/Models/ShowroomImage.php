<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowroomImage extends Model
{
    protected $fillable = [
        'image', 'title', 'subtitle', 'sort_order',
    ];
}
