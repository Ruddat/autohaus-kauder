<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{


    public function __invoke()
    {
        return view('backend.service.index');
    }
}
