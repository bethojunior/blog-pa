<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'posts'], function () {
    Route::group(['as' => 'posts'], function () {
        Route::get('', 'Blog\BlogController@list');
        Route::post('', 'Blog\BlogController@create');
        Route::delete('{id}', 'Blog\BlogController@destroy');
    });
});
