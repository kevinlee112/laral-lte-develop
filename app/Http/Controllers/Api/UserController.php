<?php
/**
 * Created by PhpStorm.
 * User: liqingyuan
 * Date: 2018/7/19
 * Time: 下午12:09
 */

namespace App\Http\Controllers\Api;

use App\Models\User;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;
use App\Http\Transformers\UserTransformer;
use Illuminate\Support\Facades\Cache;


class UserController extends BaseController
{

    public function index()
    {

       // Cache::put('test_cache', 'user_index', '200');
        $user = User::get();
//      // abort(401, '用户名或密码错误');
        return $this->response->collection($user,new UserTransformer());
//       // return $this->response->error('错误测试','412');
       // return response()->json(['status'=>1,'msg'=>'查询成功！','data'=>$user]);
    }

}