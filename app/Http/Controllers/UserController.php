<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = User::all();

        return response()->json(compact('players'), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (Auth::user()->id != $id) {
            return response()->json([
                'success' => 'false',
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::find($id);

        $user->name = $request['name'];

        $user->save();
        return response()->json([
            'success' => 'true',
            'user' => $user,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function ranking()
    {
        $podium = User::all();

        //Intentando cambiar el id a string para poder evitar el reordenamiento en JSON.parse (frontend)
        /*foreach ($podium as $user) {
            $user->id = (string)$user->id;
        }*/

        //Ordenando la lista de jugadores por ratio de éxito. Se devuelve como float para que se pueda ordenar en front
        $podium = $podium->sortByDesc(function ($user) {
            return floatVal($user->success_rate);
        });

        $avg = $podium->avg('success_rate');

        //Para evitar que se pierda el orden en front (axios está modificando el orden en que se envía)
        $podium = json_encode($podium);

        return response()->json([
            'avg' => $avg,
            'success' => 'true',
            'podium' => $podium,
        ], 201);
    }

    public function showWinner()
    {
        $podium = User::all();


        $podium = $podium->sortByDesc(function ($user) {
            return $user->success_rate;
        })->first();

        return response()->json([
            'success' => 'true',
            'podium' => $podium,
        ]);
    }

    public function showLoser()
    {
        $podium = User::all();


        $podium = $podium->sortBy(function ($user) {
            return $user->success_rate;
        })->first();

        return response()->json([
            'success' => 'true',
            'podium' => $podium,
        ]);
    }
}
