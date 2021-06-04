<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validation = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Wrong validation',
                'errors' => $validation->errors()
            ], 422);
        }

        $token = JWTAuth::attempt($credentials);

        if ($token) {
            return response()->json([
                'success' => 'true',
                'token' => $token,
                'user' => User::where('email', $credentials['email'])->get()->first()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Wrong credentials',
                'errors' => $validation->errors()
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $credentials = $request->all();

        $validation = Validator::make($credentials, [
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

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'success' => 'true',
            'token' => $token,
            'user' => $user
        ], 200);
    }

    public function logout()
    {
        $token = JWTAuth::getToken();

        try {
            JWTAuth::invalidate($token);
            return response()->json([
                'success' => 'true',
            ], 200);
        } catch (JWTException $ex) {
            return response()->json([
                'success' => 'false',
                'error' => 'Logout error',
            ], 400);
        }
    }

    public function refreshToken()
    {
        $token = JWTAuth::getToken();
        try {
            $token = JWTAuth::refresh($token);
            return response()->json([
                'success' => true,
                'token' => $token
            ], 200);
        } catch (TokenExpiredException $ex) {
            return response()->json([
                'success' => false,
                'message' => 'Need to login again (expired Token)'
            ], 422);
        } catch (TokenBlacklistedException $ex) {
            return response()->json([
                'success' => false,
                'message' => 'Need to login again! (blacklisted)'
            ], 422);
        }
    }
}
