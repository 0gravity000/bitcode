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
                    //var_dump($tag->id);
                    DB::table('post_tag')->insert(
                        [
                            'post_id' => $post->id,
                            'tag_id' => $tag->id,
                            'created_at' => now(),
                            'updated_at' => now(),
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
     * @param  $title
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        //dd($title);
        $title = html_entity_decode($title, ENT_QUOTES);    //htmlエンティティのデコード
        $post = Post::where('title', $title)->with(['tags', 'user'])->first();
        $post->title = htmlentities($post->title, ENT_QUOTES, 'UTF-8'); //名前付きエンティティを持つ文字をHTMLエンティティに変換
        $post->title = str_replace(" ", "&#032;", $post->title);   //半角スペースをHTMLエンティティに変換
        $post->code = htmlentities($post->code, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
        $post->code = str_replace(" ", "&#032;", $post->code);   //半角スペースをHTMLエンティティに変換
        //dd($post);
        $tags = Tag::OrderBy('name', 'asc')->get();
        return view('post_show', compact('post', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $title,$backid
     * @return \Illuminate\Http\Response
     */
    public function edit($title, $backid)
    {
        //dd($title);
        $title = html_entity_decode($title, ENT_QUOTES);    //htmlエンティティのデコード
        $post = Post::where('title', $title)->with(['tags', 'user'])->first();
        $post->title = htmlentities($post->title, ENT_QUOTES, 'UTF-8'); //名前付きエンティティを持つ文字をHTMLエンティティに変換
        $post->title = str_replace(" ", "&#032;", $post->title);   //半角スペースをHTMLエンティティに変換
        $post->code = htmlentities($post->code, ENT_QUOTES, 'UTF-8');   //名前付きエンティティを持つ文字をHTMLエンティティに変換
        $post->code = str_replace(" ", "&#032;", $post->code);   //半角スペースをHTMLエンティティに変換
        //dd($post);
        $tags = Tag::OrderBy('name', 'asc')->get();
        return view('post_edit', compact('post', 'tags', 'backid'));
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
                'title' => 'required',
                'code' => 'required',
            ]);
            $post = Post::where('id', $request->id)->first();
            $post->title = $request->title;
            $post->code = $request->code;
            $post->note1 = $request->note1;
            $post->save();

            //tagの数分post_tagテーブルにレコードを更新する
            $tags = Tag::all();
            foreach ($tags as $tag) {
                if ($request->has('Checkbox'.$tag->id)) {
                    //var_dump($tag->id);
                    //選択されたタグが存在しているかチェック
                    $posttag = DB::table('post_tag')->where('post_id', $post->id)->where('tag_id', $tag->id)->exists();
                    //dd($posttag);
                    if ($posttag) {
                        //dd('存在する：'.$posttag);
                        //存在していなる場合は更新
                        DB::table('post_tag')->where('post_id', $post->id)->where('tag_id', $tag->id)->update(
                            [
                                'updated_at' => now(),
                            ]
                        );
                    } else {
                        //dd('存在しない：'.$posttag);
                        //存在していない場合は新規追加
                        DB::table('post_tag')->insert(
                            [
                                'post_id' => $post->id,
                                'tag_id' => $tag->id,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]
                        );
                    }
                } else {
                    //選択のないタグはテーブルから削除
                    DB::table('post_tag')->where('post_id', $post->id)->where('tag_id', $tag->id)->delete();
                }
            }
        } 

        if ($request->backid == 1) {
            return redirect('/home');
        } else {
            $title = $request->title;
            return redirect('/post/show/'.$title);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy($title)
    {
        //dd($title);
        $post = Post::where('title', $title)->first();
        //dd($post);
        //post_tagテーブルの該当post_idを削除
        DB::table('post_tag')->where('post_id', $post->id)->delete();
        $post->delete();
        return redirect('/home');
    }
}
