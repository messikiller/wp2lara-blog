<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

use App\Libraries\ZuiThreePresenter;
use App\Cate;

class CateController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Cate::orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy('pid');

        // dd($cates);

        return view('admin/cate_index')->with([
            'cates' => $cates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_cates = Cate::where('pid', '=', 0)
            ->orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        // dd($parent_cates);

        return view('admin/cate_create')->with([
            'parent_cates' => $parent_cates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parent_cates = Cate::where('pid', '=', 0)
            ->orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin/cate_edit')->with([
            'cate' => Cate::find($id),
            'parent_cates' => $parent_cates
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
