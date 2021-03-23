<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Saludo1Controller extends Controller
{
    public function bienvenida()
    {
        return view('saludo1');
    }

    public function saludar($nombre = "Anónimo")
    {
        return view('saludo1')->with('nombre', $nombre);
    }
}
