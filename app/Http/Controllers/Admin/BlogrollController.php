<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Libraries\ZuiThreePresenter;
use App\Blogroll;

class BlogrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogrolls = Blogroll::orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->paginate(15);

        // dd($blogrolls);

        return view('admin/blogroll_index')->with([
            'blogrolls'  => $blogrolls,
            'pagination' => $blogrolls->render(new ZuiThreePresenter($blogrolls))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blogroll_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'blogroll.title' => 'required|max:255',
            'blogroll.link'  => 'required|url|max:255'
        ]);

        $blogroll = new Blogroll;
        $blogroll->title = $request->input('blogroll.title');
        $blogroll->link  = $request->input('blogroll.link');

        $blogroll->save();

        return redirect('/admin/blogroll');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 123;
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
