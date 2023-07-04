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
  Route::get('/', 'App\Http\Controllers\DashboardController@index')->middleware('auth');
});

Route::group(['prefix' => 'users'], function ($router) {
    Route::get('/', 'App\Http\Controllers\UserController@index')->middleware('auth');
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
