<?php

namespace App\Http\Controllers;

use App\Models\Bedroom;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BedroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Bedroom::all()->sortBy('roomNumber');
        return view('layouts.bedrooms', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.bedroom-create');
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
            'roomNumber' => 'required|numeric|unique:bedrooms',
            'capacity' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        if ($validation->fails()) {
            return redirect('bedroom/create')->withErrors($validation)->withInput();
        } else {
            $bedroom = Bedroom::create($request->all());

            return redirect('bedrooms')->with(["mensaje" => "Habitación CREADA"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bedroom  $bedroom
     * @return \Illuminate\Http\Response
     */
    public function show(Bedroom $bedroom)
    {

        return view('layouts.bedrooms-show', [
            "bedroom" => $bedroom,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bedroom  $bedroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Bedroom $bedroom)
    {
        return view('layouts.bedroom-edit', ["bedroom" => $bedroom]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bedroom  $bedroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bedroom $bedroom)
    {

        $validate = Validator::make($request->all(), [

            'capacity' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        $request["roomNumber"] = $bedroom->roomNumber;

        if ($validate->fails()) {
            return redirect()->route('bedrooms.edit', [$bedroom])->withErrors($validate)->withInput();
        } else {
            $bedroom->fill($request->input())->saveOrFail();
            return redirect()->route('bedrooms.index')->with(["mensaje" => "Habitación actualizada correctamente"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bedroom  $bedroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bedroom $bedroom)
    {
        $bedroom->delete();
        return redirect()->route('bedrooms.index')->with(["mensaje" => "Habitación borrada con éxito"]);
    }
}
