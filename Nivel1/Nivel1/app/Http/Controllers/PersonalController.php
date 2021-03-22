<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function show($nombre)
    {
        return view('personalPage')->with('nombre', $nombre);
    }
}
