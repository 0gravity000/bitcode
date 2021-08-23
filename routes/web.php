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
