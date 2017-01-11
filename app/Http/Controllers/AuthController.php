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

        $user = User::where('username', '=', $username)->first();

        if (! empty($user) && \Crypt::decrypt($user->password) == $password) {
            $request->session()->forget('user');
            $request->session()->put('user', $user);
            return redirect('/admin/index');
        } else {
            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/');
    }
}
