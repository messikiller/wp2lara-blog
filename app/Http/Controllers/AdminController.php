<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('layouts.admin_main');
    }

    public function login()
    {
        return view('admin.login');
    }
}
