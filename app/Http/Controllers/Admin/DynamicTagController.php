<?php
/**
 * Created by PhpStorm.
 * User: liqingyuan
 * Date: 2018/7/17
 * Time: 上午10:06
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\DynamicTag;
use App\Http\Requests\Admin\DynamicTagUpdateRequest;
use App\Http\Requests\Admin\DynamicTagCreateRequest;

class DynamicTagController
{
    protected $fields = [
        'name'        => '',
        'sort'       => '',
        'status' => ''
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = array();
            $data['draw'] = $request->get('draw');
            $start = $request->get('start');
            $length = $request->get('length');
            $order = $request->get('order');
            $columns = $request->get('columns');
            $search = $request->get('search');
            $cid = $request->get('cid', 0);
            $recordsTotal = DynamicTag::count();
            $data['recordsTotal'] = $recordsTotal;
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = DynamicTag::where(function ($query) use ($search) {
                    $query
                        ->where('name', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('sort', 'like', '%' . $search['value'] . '%')
                        ->orWhere('status', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = DynamicTag::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('sort', 'like', '%' . $search['value'] . '%')
                        ->orWhere('status', 'like', '%' . $search['value'] . '%');
                })
                    ->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {
                $data['recordsFiltered'] = $recordsTotal;
                $data['data'] = DynamicTag::skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }

            return response()->json($data);
        }
        return view('admin.dynamic.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.dynamic.tag.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DynamicTagUpdateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DynamicTagCreateRequest $request, DynamicTag $DynamicTag)
    {
        foreach (array_keys($this->fields) as $field) {
            $DynamicTag->$field = $request->get($field, $this->fields[$field]);
        }
        $DynamicTag->save();

        return redirect('/admin/dynamictag/index')->withSuccess('添加成功！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = DynamicTag::find((int)$id);
        if (!$tag) return redirect('/admin/dynamictag')->withErrors("找不到该标签!");

        $data = ['id' => (int)$id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $tag->$field);
        }

        return view('admin.dynamic.tag.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DynamicTagUpdateRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DynamicTagUpdateRequest $request, $id)
    {
        $tag = DynamicTag::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $tag->$field = $request->get($field, $this->fields[$field]);
        }
        $tag->save();

        return redirect('admin/dynamictag/')->withSuccess('修改成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = DynamicTag::find((int)$id);
        if ($tag) {
            $tag->delete();
        } else {
            return redirect()->back()
                ->withErrors("删除失败");
        }

        return redirect()->back()
            ->withSuccess("删除成功");
    }


}