<?php

namespace App\Http\Controllers;


use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams/index', ["teams" => Team::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('teams/create');
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
            'name' => 'required|max:120',
            'city' => 'required|max:255',
            'stadium' => 'required',
            'year' => 'required|numeric',
        ]);


        if ($validation->fails()) {
            return redirect('teams/create')->withErrors($validation)->withInput();
        } else {
            $request["shield"] = "images/escudo-generico.jpg";
            $team = Team::create($request->all());


            return redirect("teams")->with(["mensaje" => "Equipo CREADO"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams/show', ["team" => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('teams/edit', [
            "team" => $team,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->fill($request->input())->saveOrFail();
        return redirect()->route('teams.index')->with(["mensaje" => "Equipo actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with(["mensaje" => "Equipo borrado"]);
    }
}
