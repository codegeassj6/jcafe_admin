<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});

Route::group(['prefix' => 'dashboard', 'middlware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\DashboardController@index');
});

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\UserController@index');
    Route::post('/', 'App\Http\Controllers\UserController@store');
    Route::delete('/', 'App\Http\Controllers\UserController@destroy');
    Route::get('/search', 'App\Http\Controllers\UserController@search');
    Route::patch('/{id}', 'App\Http\Controllers\UserController@update');
});


Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\PostController@index');
    Route::post('/', 'App\Http\Controllers\PostController@store');
    Route::patch('/', 'App\Http\Controllers\PostController@update');
    Route::delete('/', 'App\Http\Controllers\PostController@destroy');
    // post likes
    Route::post('/{id}/like', 'App\Http\Controllers\PostLikeController@store');

    // comment
    Route::get('/{post_id}/comment', 'App\Http\Controllers\CommentController@index');
    Route::post('/{post_id}/comment', 'App\Http\Controllers\CommentController@store');
    Route::patch('/{post_id}/comment', 'App\Http\Controllers\CommentController@update');
    Route::delete('/{post_id}/comment', 'App\Http\Controllers\CommentController@destroy');

    // comment likes
    Route::post('/{post_id}/comment/{comment_id}/like', 'App\Http\Controllers\CommentLikeController@store');
});


Route::group(['prefix' => 'games', 'middleware' => 'auth'], function ($router) {
    Route::get('/', 'App\Http\Controllers\GameController@index');
    Route::post('/', 'App\Http\Controllers\GameController@store');
    Route::post('/update', 'App\Http\Controllers\GameController@update');
    Route::get('/search', 'App\Http\Controllers\GameController@search');
    Route::delete('/', 'App\Http\Controllers\GameController@destroy');
})->middleware('auth');

Route::group(['prefix' => 'orders'], function ($router) {
    Route::get('/', 'App\Http\Controllers\OrderController@index');
})->middleware('auth');
