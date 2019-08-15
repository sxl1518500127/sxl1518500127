<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\doindent;
use App\Models\goods;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');

        $doinent = doindent::where('indentname','like','%'.$search.'%')->orderby("created_at","desc")->paginate(12);

        return view('admin.order.index',["doinent"=>$doinent,'requests'=>$request->input()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
          // 开启事务
        DB::beginTransaction();

        // 实例化模型
        $doindent = doindent::where("indentbian",$request->input("indentbian"))->update(["indentphoto"=>$request->input("indentphoto"),"indentaddres"=>$request->input("indentaddres")]);

   
        if($doindent){
            DB::commit();
            return redirect('admin/order')->with('success', '修改成功');
        }else{
            DB::rollBack();
            return back()->with('error', '修改失败');
        }   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $doindent = doindent::where("indentbian",$id)->first();

        $carts =goods::join('indentpublic','indentpublic.wid','goodswares.id')->where(['indentpublic.bianhao'=>$id])->get();
        
        return view('admin.order.doindentxiang',["indent"=>$doindent,"cart"=>$carts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doindent = doindent::where("indentbian",$id)->first();
        // dump($doindent);
        return view('admin.order.update',["indent"=>$doindent]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fahuo($id)
    {
         // 开启事务
        DB::beginTransaction();

        // 实例化模型
        $doindent = doindent::where("indentbian",$id)->update(["indentstatus"=>"2"]);

        if($doindent){
            DB::commit();
            return redirect('admin/order')->with('success', '发货成功');
        }else{
            DB::rollBack();
            return back()->with('error', '添加失败');
        }    
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
