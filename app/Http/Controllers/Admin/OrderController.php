<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\doindent;
use App\Models\goods;
use App\Models\money;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *订单列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');

        $doinent = doindent::where('indentname','like','%'.$search.'%')->orderby("created_at","desc")->paginate(12);

        return view('admin.order.index',["doinent"=>$doinent,'requests'=>$request->input()]);
    }

    /**
     *  修改订单
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
     *  订单详情
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
     * 订单显示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doindent = doindent::where("indentbian",$id)->first();
       
        return view('admin.order.update',["indent"=>$doindent]);
       
    }

    /**
     * Show the form for editing the specified resource.
     * 进行发货
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
     * 退款列表
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function money(Request $request)
    {
        $search = $request->input("search","");
        
        $money = money::leftjoin("usercustomer","money.uid","usercustomer.customerid")->where('usercustomer.customername','like','%'.$search.'%')->orderby("money.created_at","desc")->paginate(12);

        return view('admin.order.money',["money"=>$money,'requests'=>$request->input()]);
        
    }

    /**
     * Remove the specified resource from storage.
     * 退款
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tui($id)
    {
        $money = money::leftjoin("usercustomer","money.uid","usercustomer.customerid")->where("money.bianhao",$id)->first();

        $carts =goods::join('indentpublic','indentpublic.wid','goodswares.id')->where(['indentpublic.bianhao'=>$id])->get();
        
        return view('admin.order.tui',["money"=>$money,"cart"=>$carts]);
    }

    /**
     * Remove the specified resource from storage.
     *  退款详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showtui($id)
    {
        $money = money::leftjoin("usercustomer","money.uid","usercustomer.customerid")->where("money.bianhao",$id)->first();

        $carts =goods::join('indentpublic','indentpublic.wid','goodswares.id')->where(['indentpublic.bianhao'=>$id])->get();
        
        return view('admin.order.showtui',["money"=>$money,"cart"=>$carts]);
    }

    /**
     * Remove the specified resource from storage.
     *  去退款
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tuikuan($id)
    {
        $money = money::where("bianhao",$id)->update(["status"=>"2"]);
        if($money){

            return view('admin.order.tuikuan',["id"=>$id]);
        }
    }
}
