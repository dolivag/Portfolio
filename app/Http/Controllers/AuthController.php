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

        //Se crean las credenciales
        $credentials = $request->all();

        //Se validan los datos introducidos
        $validation = Validator::make($request->all(), [
            'name' => 'sometimes|required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        //Si no se introduce el nombre, este será 'Anónimo'
        if (!isset($request["name"])) {
            $credentials["name"] = 'Anónimo';
        }

        //Si falla la validación se retornan los errores
        if ($validation->fails()) {
            return response()->json([
                'success' => 'false',
                'errors' => $validation->errors()->toJson()
            ], 400);
        };

        //Se crea el usuario con las credenciales
        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password'])
        ]);

        //Se asigna un rol
        if (strtolower($request->role) == 'administrador') {
            $user->assignRole('Administrador');
        } elseif (strtolower($request->role) == 'usuario') {
            $user->assignRole('Usuario');
        }

        //Se crea un JWToken para el usuario
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
                'message' => 'Expired token'
            ], 422);
        } catch (TokenBlacklistedException $ex) {
            return response()->json([
                'success' => false,
                'message' => 'BlackList'
            ], 422);
        }
    }
}
