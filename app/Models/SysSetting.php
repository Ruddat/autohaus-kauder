<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysSetting extends Model
{
    protected $fillable = [
        'group',
        'key',
        'value',
        'type',
    ];
}
