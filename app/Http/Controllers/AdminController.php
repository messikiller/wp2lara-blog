<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Redirector;

class AdminController extends Controller
{
    public function __construct()
    {
        $request  = App('Illuminate\Http\Request');
        $redirect = App('Illuminate\Routing\Redirector');
        
        if (! $request->session()->has('user')) {
            $redirect->to('/login')->send();
        }
    }

    public function index()
    {
        return view('layouts.admin_main');
    }
}
