<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Saludo2Controller extends Controller
{
    public function get()
    {
        return view('saludo2');
    }
}
