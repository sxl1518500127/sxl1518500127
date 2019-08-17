<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Spec;
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *  显示商品修改模板
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查询出商品
        $wares = Goods::find($_GET["wares"]);
        $goods = DB::table('goods')->where('id', $_GET["goods"])->first();
        $spec = DB::table('goodsspec')->where('wid', $_GET["wares"])->first();

        // 显示模板并且传输数据
        return view('admin.cates.update',['wares'=>$wares,"goods"=>$goods,"spec"=>$spec]);
    }

    /**
     * Show the form for creating a new resource.
     *  产品添加模板
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //接收产品id
        $id = $request->input('id');

        // 当前id需要添加的子分类
        $goods = DB::table('goods')->where('id', $id)->first();

        // 显示模板并且传输数据
        return view('admin.cates.add',['id'=>$id,"goods"=>$goods]);
    }


    /**
     * Store a newly created resource in storage.
     *  执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 检查文件上传
        if ($request->hasFile('waresimgpath')) {
            // 获取头像
            $path = $request->file('waresimgpath')->store(date('Ymd'));
        }else{
            return back();
        }
        // 开启事务
        DB::beginTransaction();

        // 实例化模型
        $goods = new Goods;
        $goods->waresgid = $request->input('id','');
        $goods->waresname = $request->input('waresname','');
        $goods->waresprice = $request->input('waresprice','');
        $goods->waresstock = $request->input('waresstock','');
        $goods->waresdescript = $request->input('waresdescript','');

        // 添加头像
        $goods->waresimgpath = $path;

        // 执行添加
        $res = $goods->save();
      
        // 判断是否添加成功
        if($res){
             $id = $goods->waresgid;
            DB::commit();
            return redirect("admin/cates/show?id=".$id)->with('success', '添加成功');
        }else{
            DB::rollBack();
            return back()->with('error', '添加失败');
        }

    }

    /**
     * Display the specified resource.
     * 查询
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 开启事务
        DB::beginTransaction();

        // 查询出当前商品
        $wares = Goods::find($id);


        // 判断是否下架
        if($wares->status == "1"){
            $wares->status = "0";
        }else{
            $wares->status = "1";
        }
        // 执行添加
        $res = $wares->save();

        // 判断是否添加成功
        if($res){
            // 提交事务
            DB::commit();
            return redirect("admin/cates/show?id=".$wares->waresgid)->with('success', '下架成功');
        }else{
            // 回滚事务
            DB::rollBack();
            return back()->with('error', '下架失败');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *商品详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        // 查询商品
        $wares = Goods::find($request->wares);
        $goods = DB::table('goods')->where('id', $id)->first();
        $spec = DB::table('goodsspec')->where('wid', $request->wares)->first();

        // 加载视图并传输数据
        return view('admin.cates.play',['wares'=>$wares,"goods"=>$goods,"spec"=>$spec]);
    }

    /**
     * Update the specified resource in storage.
     *  修改 和添加规格
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 判断商品规格
        if($request->spec == "spec"){

            // 查询当前商品的规格
            $spec = DB::table('goodsspec')->where('wid', $id)->first();
            // 判断是否查询到此商品规格
            if($spec){
                // 修改规格、
                $spe = Spec::where('wid',$id)->first();

            }else{
                // 添加规格
                $spe = new Spec;
                $spe->wid = $id;
                
            }

            $spe->goodspec = $request->input('goodspec','');
            $res = $spe->save();
            if($res){
                // 提交事务
                DB::commit();
                return redirect('admin/goods/'.$request->input("goods").'/edit?wares='.$id)->with('success', '成功');
            }else{
                // 回滚事务
                DB::rollBack();
                return back()->with('error', '失败');
            }
        }else{
            $spec = DB::table('goodsspec')->where('wid', $id)->first();
            if($spec){
                // 修改颜色
                $spe = Spec::where('wid',$id)->first();
               
            }else{
                // 添加规格
                $spe = new Spec;
                $spe->wid = $id;
            }
            $spe->color = $request->input('color','');
            $res = $spe->save();
            if($res){
                // 提交事务
                DB::commit();
                return redirect('admin/goods/'.$request->input("goods").'/edit?wares='.$id)->with('success','成功');
            }else{
                // 回滚事务
                DB::rollBack();
                return back()->with('error','失败');
            }
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *     执行商品修改
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xiugai(Request $request)
    {
        // 开启事务
        DB::beginTransaction();

        // 实例化模型
        $wares = Goods::find($request->input('wares'));
        $wares->waresgid = $request->input('goods','');
        $wares->waresname = $request->input('waresname','');
        $wares->waresprice = $request->input('waresprice','');
        $wares->waresstock = $request->input('waresstock','');
        $wares->waresdescript = $request->input('waresdescript','');
        
         // 检查文件上传
        if ($request->hasFile('waresimgpath')) {
            // 获取头像
            $path = $request->file('waresimgpath')->store(date('Ymd'));
             // 添加touxiang 
            $wares->waresimgpath = $path;
        
        }
       
        $res = $wares->save();

        // 添加或修改sku
        $spec = DB::table('goodsspec')->where('wid',$request->input('wares'))->first();
        if($spec){
            // 修改颜色
            $spe = Spec::where('wid',$request->input('wares'))->first();
           
        }else{
            // 添加规格
            $spe = new Spec;
            $spe->wid = $request->input('wares');
        }
        $spe->color = $request->input('color','');
        $spe->goodspec = $request->input('goodspec','');
        $res1 = $spe->save();
       
        // 全部成功
        if($res && $res1){
            DB::commit();
            return redirect('/admin/goods?goods='.$request->input('goods').'&wares='.$request->input('wares'))->with('success', '修改成功');
        }else{
            DB::rollBack();
            return back()->with('error', '修改失败');
        }

    }
    /**
     * Remove the specified resource from storage.
     *   删除商品
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // 开启事务
        DB::beginTransaction();
        $wares = Goods::find($id);
        // 删除商品 
        $res1 = Goods::destroy($id);

        // 删除规格
        $res2 = Spec::where('wid',$id)->delete();

        // 判断
        if($res1){
            // 提交事务
            DB::commit();
            return redirect('admin/cates/show?id='.$wares->waresgid)->with('success', '删除成功');
        }else{
            // 回滚事务
            DB::rollBack();
            return back()->with('admin/goods/'.$wares->waresgid.'/edit?wares='.$id, '删除失败');
        }
    }
}
