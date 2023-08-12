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

Route::group(['prefix' => 'dashboard'], function ($router) {
  Route::get('/', 'App\Http\Controllers\DashboardController@index');
})->middleware('auth.admin');

Route::group(['prefix' => 'users'], function ($router) {
    Route::get('/', 'App\Http\Controllers\UserController@index');
    Route::post('/', 'App\Http\Controllers\UserController@store');
    Route::delete('/', 'App\Http\Controllers\UserController@destroy');
    Route::get('/search', 'App\Http\Controllers\UserController@search');
    Route::patch('/{id}', 'App\Http\Controllers\UserController@update');
})->middleware('auth.admin');


Route::group(['prefix' => 'posts'], function ($router) {
  Route::get('/', 'App\Http\Controllers\PostController@index')->middleware('auth.admin');
  Route::post('/', 'App\Http\Controllers\PostController@store');
})->middleware('auth.admin');

Route::group(['prefix' => 'games'], function ($router) {
  Route::get('/', 'App\Http\Controllers\GameController@index');
  Route::post('/', 'App\Http\Controllers\GameController@store');
  Route::post('/update', 'App\Http\Controllers\GameController@update');
  Route::get('/search', 'App\Http\Controllers\GameController@search');
  Route::delete('/', 'App\Http\Controllers\GameController@destroy');
})->middleware(['auth.admin', 'api']);

Route::group(['prefix' => 'orders'], function ($router) {
  Route::get('/', 'App\Http\Controllers\OrderController@index');
})->middleware('auth.admin');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
