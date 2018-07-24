<?php

use Illuminate\Http\Request;

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

Route::group(['prefix'=> 'v1', 'namespace' => 'Api\v1', 'middleware' => 'authApi'], function () {
    Route::post('user', 'UserController@index');
    Route::post('courses', 'CoursesController@index');
});

