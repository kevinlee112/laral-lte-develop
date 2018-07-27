<?php

namespace App\Http\Controllers\Admin;



class IndexController extends BaseController
{

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
