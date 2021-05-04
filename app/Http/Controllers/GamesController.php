<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('games/index', ["games" => Game::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('games/create', compact('teams'));
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
            'result1' => 'required|numeric',
            'result2' => 'required|numeric',
            'date' => 'required|date_format:Y-m-d',
        ]);


        if ($validation->fails()) {
            return redirect('games/create')->withErrors($validation)->withInput();
        } else if ($request->team1 == $request->team2) {
            return redirect('games/create')->with(["mensaje" => "Los dos equipos han de ser diferentes"]);
        } else {

            $stadium1 = Team::find($request->team1)->stadium;
            $request["stadium"] = $stadium1;
            $game = Game::create($request->all());
            return redirect()->route('games.index')->with(["mensaje" => "Partido CREADO"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games/show', ["game" => $game]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $teams = Team::all();
        return view('games/edit', [
            "game" => $game,
            "teams" => $teams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $validation = Validator::make($request->all(), [
            'result1' => 'required|numeric',
            'result2' => 'required|numeric',
            'date' => 'required|date_format:Y-m-d',
        ]);


        if ($validation->fails()) {
            return redirect()->route('games.edit', [$game])->withErrors($validation)->withInput();
        } else if ($request->team1 == $request->team2) {
            return redirect()->route('games.edit', [$game])->with(["mensaje" => "Los dos equipos han de ser diferentes"]);
        } else {
            $stadium1 = Team::find($request->team1)->stadium;
            $request["stadium"] = $stadium1;
            $game->fill($request->input())->saveOrFail();
            return redirect()->route('games.index')->with(["mensaje" => "Partido modificado con éxito"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route("games.index")->with(["mensaje" => "Partido borrado"]);
    }
}
