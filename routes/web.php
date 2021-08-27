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
Route::get('/home/{tag}', 'HomeController@show');
Route::get('/main', 'MainController@index')->name('main');
Route::get('/main/{tag}', 'MainController@show');

Route::get('/language', 'LanguageController@index');
Route::get('/language/create', 'LanguageController@create');
Route::post('/language/store', 'LanguageController@store');
Route::get('/language/show/{name}', 'LanguageController@show');
Route::post('/language/update', 'LanguageController@update');
Route::get('/language/destroy/{name}', 'LanguageController@destroy');

Route::get('/admin/tag', 'AdminController@index_tag');
Route::get('/admin/tag/create', 'AdminController@create_tag');
Route::post('/admin/tag/store', 'AdminController@store_tag');
Route::get('/admin/tag/show/{name}', 'AdminController@show_tag');
Route::post('/admin/tag/update', 'AdminController@update_tag');
Route::get('/admin/tag/destroy/{name}', 'AdminController@destroy_tag');

Route::get('/post/create', 'PostController@create');
Route::post('/post/store', 'PostController@store');
Route::get('/post/show/{title}', 'PostController@show');
Route::get('/post/destroy/{title}', 'PostController@destroy');
Route::get('/post/edit/{title}/{backid}', 'PostController@edit');
Route::post('/post/update', 'PostController@update');
