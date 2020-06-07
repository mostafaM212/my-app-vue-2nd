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
//
//
Route::get('create',function (){

    factory(\App\Post::class,10)->create();
});

Route::resource('posts','PostController') ;

Route::post('/posts/search','PostController@search') ;

Route::post('/posts/search/{id}','PostController@getPost') ;
