<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Language;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
        }
        //dd($posts);
        $tags = Tag::all();
        return view('home', compact('posts', 'tags'));
    }
}
