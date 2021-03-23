<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Saludo3Controller extends Controller
{
    public function get()
    {
        return view('saludo3');
    }
}
