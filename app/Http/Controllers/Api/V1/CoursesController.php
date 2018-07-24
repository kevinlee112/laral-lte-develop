<?php
/**
 * Created by PhpStorm.
 * User: liqingyuan
 * Date: 2018/7/19
 * Time: 下午12:09
 */

namespace App\Http\Controllers\Api\v1;

use App\Models\Api\Courses;
use App\Http\Controllers\Api\BaseController;


class CoursesController extends BaseController
{

    public function index()
    {

        $count = Courses::where('is_pust', 1)->count();

        return $this->respondSuccess(['count'=>$count]);
    }

}