<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userLogin()
    {
        return view('auth/login');
    }

    public function userInfo(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'username'  => 'required | max:15',
            'password'   => 'required | max: 15',
        ]);

        if ($validation->fails()) {
            return redirect('login')->withErrors($validation)->withInput();
        } else {
            $user_cookie = cookie('userName', $request->input('username'), 60 * 24);

            return response(view('auth/loginSuccess'))->withCookie($user_cookie);
        }
    }

    public function userLogout()
    {
        return view('auth/logout');
    }
}
