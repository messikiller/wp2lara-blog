<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\BlogInfo;
use App\Libraries\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $blogInfo = [];
    protected $auth;

    public function __construct()
    {
        $this->blogInfo = BlogInfo::first()->toArray();
        $this->auth = Auth::create();

        view()->composer('*', function ($view) {
            $view->with([
                'AUTH' => $this->auth
            ]);
        });
    }
}
