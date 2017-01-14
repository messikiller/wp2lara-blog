<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Redirector;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $redirect = App('Illuminate\Routing\Redirector');

        if (! $this->auth->isAuthed()) {
            $redirect->to('/login')->send();
        }
    }

    public function index()
    {
        return view('layouts.admin_main');
    }
}
