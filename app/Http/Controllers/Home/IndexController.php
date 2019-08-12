<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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


    	// 显示模板
    	return view('home.index.index');
    }

}
