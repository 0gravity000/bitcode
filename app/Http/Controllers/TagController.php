<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect('/tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //dd($name);
        $tag = Tag::where('name', $name)->first();
        return view('tag_show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        if ($request->btn == "update") {
            $validatedData = $request->validate([
                'tag' => 'required|unique:tags,name',
                    //Rule::unique('tags','name')->ignore($request->id),
            ]);
            $language = Tag::where('id', $request->id)->first();
            $language->name = $request->tag;
            $language->save();
        } 
        return redirect('/tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        //dd($name);
        $tag = Tag::where('name', $name)->first();
        //dd($tag);
        $tag->delete();
        return redirect('/tag');
    }
}
