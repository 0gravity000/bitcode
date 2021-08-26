<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/main', 'MainController@index')->name('main');

Route::get('/language', 'LanguageController@index');
Route::get('/language/create', 'LanguageController@create');
Route::post('/language/store', 'LanguageController@store');
Route::get('/language/show/{name}', 'LanguageController@show');
Route::post('/language/update', 'LanguageController@update');
Route::get('/language/destroy/{name}', 'LanguageController@destroy');

Route::get('/tag', 'TagController@index');
Route::get('/tag/create', 'TagController@create');
Route::post('/tag/store', 'TagController@store');
Route::get('/tag/show/{name}', 'TagController@show');
Route::post('/tag/update', 'TagController@update');
Route::get('/tag/destroy/{name}', 'TagController@destroy');

Route::get('/post/create', 'PostController@create');
Route::post('/post/store', 'PostController@store');
Route::get('/post/show/{title}', 'PostController@show');
Route::get('/post/destroy/{title}', 'PostController@destroy');
Route::get('/post/edit/{title}/{backid}', 'PostController@edit');
Route::post('/post/update', 'PostController@update');
