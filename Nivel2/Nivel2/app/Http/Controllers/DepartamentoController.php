<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index($pais)
    {
        return "Bienvenidos a la sección de departamentos de $pais";
    }

    public function store($pais)
    {
        return "Añadiendo departamento a $pais";
    }

    public function show($pais, $departamento)
    {
        return "Has entrado en el departamento de $departamento de $pais";
    }

    public function update($pais, $departamento)
    {
        return "Modificando el departamento de $departamento de $pais";
    }

    public function destroy($pais, $departamento)
    {
        return "Eliminando el departamento de $departamento de $pais";
    }
}
