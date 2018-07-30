<?php

namespace App\Http\Middleware;

use Closure;
use URL, Auth, Cache, Gate;

class GetMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //view()->share('comData',$this->getMenu());
        $request->attributes->set('comData_menu', $this->getMenu());
        return $next($request);
    }

    /**
     * 获取左边菜单栏
     * @return array
     */
    protected function getMenu()
    {
        $openArr = [];
        $data = [];
        $data['top'] = [];
        //查找并拼接出地址的别名值
        $path_arr = explode('/', URL::getRequest()->path());
        if (isset($path_arr[1])) {
            $urlPath = $path_arr[0] . '.' . $path_arr[1] . '.index';
        } else {
            $urlPath = $path_arr[0] . '.index';
        }
        //查找出所有的地址
        $table = \App\Models\Admin\Permission::where('name', 'LIKE', '%index')
                ->orWhere('cid', 0)
                ->orderBy('sort', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        foreach ($table as $v) {
            if ($v->name == $urlPath) {
                $openArr[] = $v->id;
                $openArr[] = $v->cid;
            }
            $data[$v->cid][] = $v->toarray();
        }
        foreach ($data[0] as $v) {
            if (isset($data[$v['id']]) && is_array($data[$v['id']]) && count($data[$v['id']]) > 0) {
                $data['top'][] = $v;
            }
        }
        unset($data[0]);
        $data['openarr'] = array_unique($openArr);
        return $data;

    }
}
