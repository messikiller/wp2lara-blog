<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Libraries\ZuiThreePresenter;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->paginate(15);

        // dd($tags);

        return view('admin/tag_index')->with([
            'tags'       => $tags,
            'pagination' => $tags->render(new ZuiThreePresenter($tags))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tag_create');
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
            'tag.name'  => 'required|max:255',
            'tag.color' => 'required|max:255'
        ]);

        $tag = new tag;
        $tag->name  = $request->input('tag.name');
        $tag->color = $request->input('tag.color');

        if ($tag->save()) {
            return redirect('/admin/tag');
        } else {
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/tag_edit')->with([
            'tag' => tag::find($id)
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
        $this->validate($request, [
            'tag.name'  => 'required|max:255',
            'tag.color' => 'required|max:255'
        ]);

        $tag = tag::find($id);
        $tag->name  = $request->input('tag.name');
        $tag->color = $request->input('tag.color');

        if ($tag->save()) {
            return redirect('/admin/tag');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if ($tag->delete()) {
            return redirect('/admin/tag');
        } else {
            return back();
        }
    }
}
