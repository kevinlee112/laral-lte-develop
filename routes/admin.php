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




Route::get('log', function () {
    return redirect('/admin/log-viewer');
});


Route::group(['middleware' => ['menu']], function () {

    Route::get('index', ['as' => 'admin.index.index', 'uses' => 'IndexController@index']);


    //权限管理路由
    Route::get('permission/{cid}/create', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@create']);
    Route::get('permission/manage', ['as' => 'admin.permission.manage', 'uses' => 'PermissionController@index']);
    Route::get('permission/{cid?}', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']);
    Route::post('permission/index', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']); //查询
    Route::resource('permission', 'PermissionController', ['names' => ['update' => 'admin.permission.edit', 'store' => 'admin.permission.create']]);

    //动态标签路由
    Route::get('dynamictag/index', ['as' => 'admin.dynamictag.index', 'uses' => 'DynamicTagController@index']);
    Route::post('dynamictag/index', ['as' => 'admin.dynamictag.index', 'uses' => 'DynamicTagController@index']);
    Route::resource('dynamictag', 'DynamicTagController', ['names' => ['update' => 'admin.dynamictag.edit', 'store' => 'admin.dynamictag.create']]);

});

Route::get('/', function () {
    return redirect('/admin/index');
});