<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\CartController;
use DB;


class IndexController extends Controller
{

	public static function links(){

		// 获取友情链接信息
    	$links = DB::table('friendlylink')->get();
    	// dd($links);
    	return  $links;

	}
    // 前台首页
    public function index()
    {

    	// //购物车商品数量
    	// $count = CartController::countCar();
    	// // 显示模板["wares"=>$goods]
    	// return view('home.index.index',["count"=>$count]);

    	// 显示模板
    	return view('home.index.index');
    }

}
