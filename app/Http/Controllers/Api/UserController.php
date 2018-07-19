<?php
/**
 * Created by PhpStorm.
 * User: liqingyuan
 * Date: 2018/7/19
 * Time: 下午12:09
 */

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Transformers\UserTransformer;


class UserController extends BaseController
{

    public function index()
    {

        $user = User::get();
        abort(401, '用户名或密码错误');
        //return $this->response->collection($user,new UserTransformer());
        //return $this->response->error('修改失败','412');
    }

}