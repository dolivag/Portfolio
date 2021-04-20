<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Departamento;
use Illuminate\Support\Facades\Session;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('empleados/index', ["empleados" => Empleado::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all();
        return view('empleados/create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'nombre' => 'required|max:120',
            'apellidos' => 'required|max:255',
            'email' => 'required|email|unique:empleados',
            'telefono' => 'required|numeric',
            'departamento_id' => 'required',
        ]);

        session()->regenerate();

        if ($validation->fails()) {
            return redirect('empleados/create')->withErrors($validation)->withInput();
        } else {
            $empleado = Empleado::create($request->all());

            return redirect()->route("empleados.index")->with(["mensaje" => "Empleado CREADO"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::all();
        return view('empleados/edit', [
            "empleado" => $empleado,
        ], compact('departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado->fill($request->input())->saveOrFail();
        return redirect()->route("empleados.index")->with(["mensaje" => "Empleado actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route("empleados.index")->with(["mensaje" => "Empleado borrado"]);
    }
}
