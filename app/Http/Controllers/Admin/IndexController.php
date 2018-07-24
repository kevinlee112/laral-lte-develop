<?php

namespace App\Http\Controllers\Admin;



class IndexController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('后台首页，当前用户名：'.auth('admin')->user()->name);
        return view('admin.index.index');
    }


}
