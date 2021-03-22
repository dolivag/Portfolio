<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        return "Mostrando índice de países";
    }

    public function store()
    {
        return "Añadiendo nuevo país";
    }

    public function show($pais)
    {
        return "Mostrando el pais $pais";
    }

    public function update($pais)
    {
        return "Modificando la información del país $pais";
    }

    public function delete($pais)
    {
        return "Borrando el país $pais";
    }
}
