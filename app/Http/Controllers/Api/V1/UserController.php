<?php
/**
 * Created by PhpStorm.
 * User: liqingyuan
 * Date: 2018/7/19
 * Time: 下午12:09
 */

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;


class UserController extends BaseController
{

    public function index(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);
        if ($validator->fails())
        {
            return $this->respondError('200001', '', $validator->errors()->messages());
        }

        $user = User::get();

        return $this->respondSuccess($user);
    }

}