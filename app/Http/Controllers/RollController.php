<?php

namespace App\Http\Controllers;

use App\Models\Roll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RollController extends Controller
{
    /**
     * Display a listing of with the user info and his rolls
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);

        $rolls = $user->rolls()->get();
        return response()->json([
            'success' => 'true',
            'user' => $user,
            'rolls' => $rolls,
        ], 201);
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
    public function store(int $id)
    {
        if (Auth::user()->id != $id) {
            return response()->json([
                'success' => 'false',
                'message' => 'Unauthorized'
            ], 401);
        }
        $user = User::find($id);

        $dice1 = rand(1, 6);
        $dice2 = rand(1, 6);
        $victory = 0;
        if ($dice1 + $dice2 == 7) {
            $victory = 1;
        }
        $credentials = [
            'dice1' => $dice1,
            'dice2' => $dice2,
            'victory' => $victory,
            'userId' => $id,
        ];
        $roll = Roll::create($credentials);

        return response()->json([
            'roll' => $roll,
            'user' => $user,
            'rolls' => $user->rolls,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roll  $roll
     * @return \Illuminate\Http\Response
     */
    public function show(Roll $roll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roll  $roll
     * @return \Illuminate\Http\Response
     */
    public function edit(Roll $roll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roll  $roll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roll $roll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roll  $roll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roll $roll)
    {
        //
    }

    public function deleteAll($id)
    {
        if (Auth::user()->id != $id) {
            return response()->json([
                'success' => 'false',
                'message' => 'Unauthorized'
            ], 401);
        }

        $rolls = Roll::where('userId', $id)->delete();

        return response()->json([
            'success' => 'true',
            'message' => 'Jugadas borradas con éxito',
            'user' => User::find($id),
        ], 201);
    }
}
