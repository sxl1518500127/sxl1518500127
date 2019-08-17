<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{

	
    // 后台首页
    public function index()
    {	
    	// 查询所有用户
        $countuser = DB::table('usercustomer')->get();

        // 查询所有管理员
        $countusers = DB::table('user')->get();

        // 查询所有订单
        $countuserss = DB::table('doindent')->get();

        // 查询所有商品是否缺货
        $goodswares = DB::table('goodswares')->where('waresstock',0)->get();
// dd($goodswares);
        // 计算有多少用户
        $users = count($countuser);

        // 计算有多少管理员
        $aa = count($countusers);

        // 计算有多少订单
        $ding = count($countuserss);



    	// 显示模板并传数据
    	return view('admin.index.index',['countuserss'=>$countuserss,'users'=>$users,'aa'=>$aa,'ding'=>$ding,'goodswares'=>$goodswares ]);

    }

    // 后台个人中心页面
    public function personal()
    {
    	return view('admin.index.personal');
    }

    public function exit()
    {
        echo "<script>alert('退出成功');location.href='/admin/login';</script>";
        $_SESSION = array();
    }
}
