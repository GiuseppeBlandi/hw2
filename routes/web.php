<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get("login", "App\Http\Controllers\LoginController1@login")->name("login");
Route::get("logout", "App\Http\Controllers\LoginController1@logout");
Route::post("login", "App\Http\Controllers\LoginController1@checkLogin");

Route::get('register', "App\Http\Controllers\RegisterController1@index")->name('register');
Route::post('register', "App\Http\Controllers\RegisterController1@create");
Route::get('register_email/{email}', "App\Http\Controllers\RegisterController1@checkEmail");
Route::get("register_username/{username}", "App\Http\Controllers\RegisterController1@checkUsername");

Route::get('home', 'App\Http\Controllers\HomeController@index');

Route::get('create', 'App\Http\Controllers\CreateController@index');
Route::post('create_post', 'App\Http\Controllers\CreateController@create_post');

Route::get('classifiche', 'App\Http\Controllers\ClassificheController@index');

Route::get('profile', 'App\Http\Controllers\ProfileController1@index');

Route::get('post', 'App\Http\Controllers\PostController@index');

Route::post('add_like', 'App\Http\Controllers\LikesController@AddLike');
Route::post('remove_like', 'App\Http\Controllers\LikesController@RemoveLike');

Route::get('/post/{id}/comments', 'App\Http\Controllers\CommentsController@show');
Route::post('/post/comment', 'App\Http\Controllers\CommentsController@index');


Route::get('last_race', 'App\Http\Controllers\RaceController@last_race');
Route::get('next_race', 'App\Http\Controllers\RaceController@next_race');

Route::get('classifiche/{type}/{value}', 'App\Http\Controllers\ClassificheController@show');