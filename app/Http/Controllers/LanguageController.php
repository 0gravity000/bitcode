<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

use App\Tag;
use Illuminate\Validation\Rule;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('language', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language_create');
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
                'lang' => 'required|unique:languages,name',
            ]);
            $language = new Language;
            $language->name = $request->lang;
            $language->save();
        } 
        return redirect('/language');
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
        $language = Language::where('name', $name)->first();
        return view('language_show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
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
                'lang' => 'required|unique:languages,name',
                    //Rule::unique('languages','name')->ignore($request->id),
            ]);
            $language = Language::where('id', $request->id)->first();
            $language->name = $request->lang;
            $language->save();
        } 
        return redirect('/language');
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
        $language = Language::where('name', $name)->first();
        //dd($language);
        $language->delete();
        return redirect('/language');
    }
}
