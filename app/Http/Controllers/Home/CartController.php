<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Controllers\Home\CartController;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //接受搜索//购物车商品数量
        $count = CartController::countCar();
        //显示模板
        return view('home.cart.cart',["count"=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *  加入购物车
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $_SESSION["car"] = null;
        $id = $request->input("id","0");

        //判断是否添加过
        if(empty($_SESSION["car"][$id])){
            // 获取商品
            $data = DB::table("goodswares")->where("id",$id)->first();
            $data->num  = 1;
            // $data = DB::table("shopcart")->insert(["uid"->$_SESSION["home"]["user"],"wid"=>$id]);
            $data->xiaoji = $data->waresprice * $data->num;
            // dump($id);
            $_SESSION["car"][$id] = $data;
        }else{
            $_SESSION["car"][$id]->num = $_SESSION["car"][$id]->num+1;
            $_SESSION["car"][$id]->xiaoji = ($_SESSION["car"][$id]->num * $_SESSION["car"][$id]->waresprice);
        }
        // dump($_SESSION["car"]);
        echo '<script>'; echo 'alert("成功加入购物车");'; echo "location.href='/home/list_search'"; echo '</script>';
        // return redirect('/home/list_search');
    }


    // 统计购物车数量
    public static  function countCar()
    {
        if(empty($_SESSION["car"])){
            $count = 0;
        }else{
            $count = 0;
            foreach ($_SESSION["car"] as $key => $value) {
                $count += $value->num;
            }
        }

        return  $count;
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
