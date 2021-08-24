<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::OrderBy('name', 'asc')->get();
        return view('post_create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->has('Checkbox'.'2'));
        if ($request->btn == "reg") {
            $validatedData = $request->validate([
                'title' => 'required|unique:posts,title',
                'code' => 'required',
            ]);
            $post = new Post;
            $post->user_id =Auth::user()->id;
            $post->title = $request->title;
            $post->code = $request->code;
            $post->note1 = $request->note1;
            $post->save();

            //tagの数分post_tagテーブルにレコードを作成する
            $tags = Tag::all();
            foreach ($tags as $tag) {
                if ($request->has('Checkbox'.$tag->id)) {
                    var_dump($tag->id);
                    DB::table('post_tag')->insert(
                        [
                            'post_id' => $post->id,
                            'tag_id' => $tag->id,
                        ]
                    );
                }
            }
        }
        
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
