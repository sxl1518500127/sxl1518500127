<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\CartController;

class IndexController extends Controller
{
    // 后台首页
    public function index()
    {
    	//购物车商品数量
    	$count = CartController::countCar();
    	// 显示模板["wares"=>$goods]
    	return view('home.index.index',["count"=>$count]);
    }
}
