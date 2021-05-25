<?php

namespace App\Http\Controllers;

use App\Models\Painting;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PaintingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $shop = Shop::find($id);
        $paintings = $shop->paintings()->get();

        return view('paintings', compact('paintings'));
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
    public function store(Request $request, $id)
    {
        $painting = new Painting;

        $painting->author = $request->author;
        $painting->name = $request->name;
        $painting->shop_id = $id;
        $painting->price = $request->price;
        $painting->arrive_shop = $request->arrive_shop;

        $painting->save();

        return response()->json(compact('painting'), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painting  $painting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $painting = Painting::find($id);

        return response()->json(compact('painting'), 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painting  $painting
     * @return \Illuminate\Http\Response
     */
    public function edit(Painting $painting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Painting  $painting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->hasRole('Administrador')) {
            $painting = Painting::findOrFail($id);

            $painting->update($request->all());
            return response()->json(compact('painting'), 200);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painting  $painting
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::user()->hasRole('Administrador')) {
            $painting = Painting::where('id', $id)->delete();

            return response()->json(null, 204);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function burn_all($id)
    {
        if (Auth::user()->hasRole('Administrador')) {
            $painting = Painting::where('shop_id', $id)->delete();

            return response()->json(null, 204);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
