<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestMessage extends Model
{
    protected $fillable = [
        'name','email','phone','subject','message','is_new'
    ];
}
