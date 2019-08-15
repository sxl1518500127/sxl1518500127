<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\gds;
use App\Models\goods;
use DB;

class CatesController extends Controller
{
    public static function getCates()
    {
        $cates = DB::select("select *,concat(goodspath,',',id) as paths from goods order by paths asc");
    
        foreach ($cates as $key => $value) {
            // 统计，出现次数
            $n = substr_count($value->goodspath,',');
            // 重复使用字符串
            $cates[$key]->goodsmod = str_repeat("|-----",$n).$value->goodsmod;

        }
        return $cates;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 加载模板

        return view('admin.cates.index',['cates'=>self::getCates()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id',0);

        // 加载添加视图
        return view('admin.cates.create',['id'=>$id,'cates'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取pid
        $pid = $request->input('goodsmid');
        // dump($pid);
        if($pid == 0){
            $path = 0;
        }else{
            // 获取父级的数据
           $parent_data = DB::table("goods")->where("id",$pid)->first();

           // dd($parent_data);
           $path = $parent_data->goodspath.','.$parent_data->id;
        }

        // 添加
        $cate = new gds;
        $cate->goodsmod = $request->input('goodsmod','');
        $cate->goodsmid = $pid;
        $cate->goodspath = $path;

        if($cate->save()){
            return redirect('admin/cates')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {

        $id = $request->input('id');
        // dump($id);
        $wares = DB::table('goodswares')->where('waresgid', $id)->paginate(5);
        $goods = DB::table('goods')->where('id', $id)->first();

        if(!$wares){
            $wares = [];
        }

        return view('admin.cates.show',['goods'=>$goods,"wares"=>$wares,'requests'=>$request->input()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
