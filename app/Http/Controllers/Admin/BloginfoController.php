<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BlogInfo;
use App\User;
use Crypt;

class BloginfoController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $bloginfo = BlogInfo::first();

        return view('admin/bloginfo/bloginfo_index')->with([
            'bloginfo' => $bloginfo
        ]);
    }

    public function edit()
    {
        return view('admin/bloginfo/bloginfo_edit')->with([
            'bloginfo' => BlogInfo::first()
        ]);
    }

    public function update(Request $request)
    {
        //
    }

    public function resetPassword()
    {
        return view('admin/password/password_reset');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|max:255|confirmed'
        ]);

        $password = Crypt::encrypt($request->input('password'));
        $user = User::find(1);
        $user->password = $password;

        if ($user->save()) {
            return redirect('/admin/bloginfo');
        } else {
            return back();
        }
    }
}
