<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/







Route::get('index', 'IndexController@index');


//动态标签路由
Route::get('dynamictag/index', ['as' => 'admin.dynamictag.index', 'uses' => 'DynamicTagController@index']);
Route::post('dynamictag/index', ['as' => 'admin.dynamictag.index', 'uses' => 'DynamicTagController@index']);
Route::resource('dynamictag', 'DynamicTagController', ['names' => ['update' => 'admin.dynamictag.edit', 'store' => 'admin.dynamictag.create']]);

