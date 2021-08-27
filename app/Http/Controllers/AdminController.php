<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_tag()
    {
        $tags = Tag::all();
        return view('admin_tag', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_tag()
    {
        return view('admin_tag_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_tag(Request $request)
    {
        //dd($request);
        if ($request->btn == "reg") {
            $validatedData = $request->validate([
                'tag' => 'required|unique:tags,name',
            ]);
            $tag = new Tag;
            $tag->name = $request->tag;
            $tag->save();
        } 
        return redirect('/admin/tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  $name
     * @return \Illuminate\Http\Response
     */
    public function show_tag($name)
    {
        //dd($name);
        $tag = Tag::where('name', $name)->first();
        return view('admin_tag_show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_tag(Request $request)
    {
        //dd($request);
        if ($request->btn == "update") {
            $validatedData = $request->validate([
                'tag' => 'required|unique:tags,name',
                    //Rule::unique('tags','name')->ignore($request->id),
            ]);
            $tag = Tag::where('id', $request->id)->first();
            $tag->name = $request->tag;
            $tag->save();
        } 
        return redirect('/admin/tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy_tag($name)
    {
        //dd($name);
        $tag = Tag::where('name', $name)->first();
        //dd($tag);
        $tag->delete();
        return redirect('/admin/tag');
    }
}
