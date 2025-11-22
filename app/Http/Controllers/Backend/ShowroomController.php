<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    public function __invoke()
    {
        return view('backend.showroom.index');
    }
}
