<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function check(Request $request)
    {
        $this->validate($request, [
            'user.username' => 'required',
            'user.password' => 'required'
        ]);

        $username = $request->input('user.username');
        $password = $request->input('user.password');

        // User::where('username', '=', $username)->where('password', '=', bcrypt($))
    }

    public function logout()
    {

    }
}
