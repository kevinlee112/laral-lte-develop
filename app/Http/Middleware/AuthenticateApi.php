<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class AuthenticateApi
{

    protected $except = [
    ];

    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ticket = empty($request->header('offcn-ticket')) ? $request->input('offcn-ticket', '') : $request->header('offcn-ticket');
        if (empty($ticket))
        {
            return Response()->json(['statusCode'=> 4, 'msg'=>'登陆异常', 'params'=>$request->all()]);
        }
        $loginData = json_decode(Redis::get('online_course_'.$ticket), 1);

        if (empty($loginData))
        {
            return Response()->json(['statusCode'=> 1, 'msg'=>'登陆超时', 'params'=>$request->all()]);
        }
        elseif($loginData['status'] != 0)
        {
            return Response()->json(['statusCode'=> 2, 'msg'=>'登陆被踢出', 'params'=>$request->all()]);
        }

        return $next($request);
    }
}
