<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 权限列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('node')->get();
        // 显示数据
        return view('admin.nodes.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * 权限模板
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.nodes.create');

    }

    /**
     * 进行添加权限
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');

        $data['nodecroller'] = $data['nodecroller'].'controller';

        $res = DB::table('node')->insert($data);

        if($res){
            return redirect('admin/nodes')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

}
