<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RolesController extends Controller
{

        public static function controllernames()
    {
        return [
            'userscontroller'=>'用户管理',
            'goodscontroller'=>'商品管理',
        ];
    } 

    public static function nodes()
    {
        $nodes = DB::table('node')->get();
        $arr = [];
        $temp = [];
        foreach ($nodes as $key => $value) {
            $temp['id'] = $value->id;
            $temp['nodecroller'] = $value->nodecroller;
            $temp['nodename'] = $value->nodename;
            $arr[$value->nodecroller][] = $temp;
        }

      
        return $arr;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //权限列表
              $data = DB::table('roles')->get();
        // 显示遍历
        return view('admin.roles.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
           $nodes = self::nodes();
        $controllernames = self::controllernames();
       
        // 加载页面
        return view('admin.roles.create',['nodes'=>$nodes,'controllernames'=>$controllernames]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();

        $rname = $request->input('rname');
        $nid = $request->input('nid');

        $rid = DB::table('roles')->insertGetId(['roles'=>$rname]);



        if($rid){
            foreach ($nid as $key => $value) {
               $res =  DB::table('roles_node')->insert(['roleid'=>$rid,'nodeid'=>$value]);
                if(!$res){
                    DB::rollBack();
                    return back()->with('error','添加失败');
                }
            }
            
        }


        DB::commit();
        return redirect('admin/roles')->with('success','添加成功');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
