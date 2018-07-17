<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::post('logout', 'LoginController@logout');



Route::get('log', function () {
    return redirect('/admin/log-viewer');
});


Route::group(['middleware' => ['auth:admin', 'menu', 'authAdmin', 'breadcrumbs']], function () {

    Route::get('index', ['as' => 'admin.index.index', 'uses' => 'IndexController@index']);


    //权限管理路由
    Route::get('permission/{cid}/create', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@create']);
    Route::get('permission/manage', ['as' => 'admin.permission.manage', 'uses' => 'PermissionController@index']);
    Route::get('permission/{cid?}', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']);
    Route::post('permission/index', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']); //查询
    Route::resource('permission', 'PermissionController', ['names' => ['update' => 'admin.permission.edit', 'store' => 'admin.permission.create']]);


    //角色管理路由
    Route::get('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::post('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::resource('role', 'RoleController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);


    //用户管理路由
    Route::get('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);  //用户管理
    Route::post('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.user.edit', 'store' => 'admin.user.create']]);

       //动态管理路由
    Route::get('dynamic/index', ['as' => 'admin.dynamic.index', 'uses' => 'DynamicController@index']);
    Route::post('dynamic/index', ['as' => 'admin.dynamic.index', 'uses' => 'DynamicController@index']);
    Route::resource('dynamic', 'DynamicController', ['names' => ['update' => 'admin.dynamic.edit', 'store' => 'admin.dynamic.create']]);

    //动态标签路由
    Route::get('dynamictag/index', ['as' => 'admin.dynamictag.index', 'uses' => 'DynamicTagController@index']);
    Route::post('dynamictag/index', ['as' => 'admin.dynamictag.index', 'uses' => 'DynamicTagController@index']);
    Route::resource('dynamictag', 'DynamicTagController', ['names' => ['update' => 'admin.dynamictag.edit', 'store' => 'admin.dynamictag.create']]);

});

Route::get('/', function () {
    return redirect('/admin/index');
});

