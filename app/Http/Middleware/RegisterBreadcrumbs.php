<?php

namespace App\Http\Middleware;

use Closure;
use URL, Route, Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;



class RegisterBreadcrumbs
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
       $this->register();
        return $next($request);
    }

    /**
     * 注册BreadCrumbs
     * @return array
     */
    protected function register()
    {
        if (Request::is('admin/index'))
        {
            return null;
        }
        $path_arr = explode('/', URL::getRequest()->path());
        foreach ($path_arr as $k => $path)
        {
            if (is_numeric($path)) unset($path_arr[$k]);
        }
        $urlPath = count($path_arr)==3 ? implode('.', $path_arr):implode('.', $path_arr).'.index';
        $menu =  \App\Models\Admin\Permission::where('name', '=', $urlPath)->first();
        !empty($menu->cid) && $menuParents =  \App\Models\Admin\Permission::find($menu->cid);
        if(!empty($menuParents))
        {
            Breadcrumbs::register($menuParents->name, function ($breadcrumbs) use ($menuParents) {
                $breadcrumbs->push($menuParents->label, route($menuParents->name.'.index', ['cid'=>$menuParents->id]));
            });

            $menu->parents = $menuParents->name;
            Breadcrumbs::register(Route::currentRouteName(), function ($breadcrumbs) use ($menu) {
                $breadcrumbs->parent($menu->parents);
                $breadcrumbs->push($menu->label, route($menu->name, ['cid'=>$menu->id]));
            });
        }
        else
        {
            Breadcrumbs::register($menu->name, function ($breadcrumbs) use ($menu) {
                $breadcrumbs->push($menu->label, route($menu->name, ['cid'=>$menu->id]));
            });
        }

    }
}
