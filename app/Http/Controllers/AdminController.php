<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Redirector;

class AdminController extends Controller
{
    public function __construct(Request $request, Redirector $redirect)
    {
        if (! $request->session()->has('user')) {
            $redirect->to('/login')->send();
        }
    }

    public function index()
    {
        return view('layouts.admin_main');
    }
}
