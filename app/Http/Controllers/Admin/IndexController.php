<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{



















	
    // 后台首页
    public function index()
    {
        $titles = DB::table('config')->where('id',1)->get();
        

    	// 显示模板
    	return view('admin.index.index',['titles'=>$titles]);
    }
}
