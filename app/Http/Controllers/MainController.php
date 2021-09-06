<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Tag;
use App\Post;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['tags', 'user'])->orderBy('updated_at', 'desc')->get();
        //Character references (文字参照) HTMLエンティティに変換
        foreach ($posts as $post) {
            $post->title = htmlentities($post->title, ENT_QUOTES, 'UTF-8'); //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->title = str_replace(" ", "&#032;", $post->title);   //半角スペースをHTMLエンティティに変換
            $post->code = htmlentities($post->code, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->code = str_replace(" ", "&#032;", $post->code);   //半角スペースをHTMLエンティティに変換
            $post->note1 = htmlentities($post->note1, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->note1 = str_replace(" ", "&#032;", $post->note1);   //半角スペースをHTMLエンティティに変換
            $post->note2 = htmlentities($post->note2, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->note2 = str_replace(" ", "&#032;", $post->note2);   //半角スペースをHTMLエンティティに変換
            $post->note3 = htmlentities($post->note3, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->note3 = str_replace(" ", "&#032;", $post->note3);   //半角スペースをHTMLエンティティに変換
        }
        //dd($posts);
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('main', compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $tag = Tag::where('name', $name)->first();
        $posts = $tag->posts;   //Tagモデルのposts()でwith(['tags', 'user'])->orderBy('updated_at', 'desc')
        //dd($posts);
        //Character references (文字参照) HTMLエンティティに変換
        foreach ($posts as $post) {
            $post->title = htmlentities($post->title, ENT_QUOTES, 'UTF-8'); //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->title = str_replace(" ", "&#032;", $post->title);   //半角スペースをHTMLエンティティに変換
            $post->code = htmlentities($post->code, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->code = str_replace(" ", "&#032;", $post->code);   //半角スペースをHTMLエンティティに変換
            $post->note1 = htmlentities($post->note1, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->note1 = str_replace(" ", "&#032;", $post->note1);   //半角スペースをHTMLエンティティに変換
            $post->note2 = htmlentities($post->note2, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->note2 = str_replace(" ", "&#032;", $post->note2);   //半角スペースをHTMLエンティティに変換
            $post->note3 = htmlentities($post->note3, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
            $post->note3 = str_replace(" ", "&#032;", $post->note3);   //半角スペースをHTMLエンティティに変換
        }
        //dd($posts);
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('main', compact('posts', 'tags'));
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
