<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Language;
use App\Tag;
use Illuminate\Support\Facades\Auth;

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
        $languages = Language::all();
        $tags = Tag::all();
        return view('home', compact('languages', 'tags'));
    }
}
