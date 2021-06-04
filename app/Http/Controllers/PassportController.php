<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PassportController extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validation->fails()) {
            return redirect('login')->withErrors($validation)->withInput();
        }

        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {

            $token = auth()->user()->createToken('Personal Access Token')->accessToken;
            dd($token);
            return redirect('/')->response()->json(['token' => $token], 200);
            //return view('home')->with(['token' => $token]);
        } else {
            return response()->json(['error' => 'Unauthorized', 401]);
        }
    }

    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validation->fails()) {
            return redirect('register')->withErrors($validation)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if (strtolower($request->role) == 'administrador') {
            $user->assignRole('Administrador');
        } elseif (strtolower($request->role) == 'usuario') {
            $user->assignRole('Usuario');
        }

        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json(['token' => $token], 200);
    }
}
