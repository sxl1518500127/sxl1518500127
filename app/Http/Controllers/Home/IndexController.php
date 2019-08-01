<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 后台首页
    public function index()
    {
    	// 显示模板
    	return view('home.index.index');
    }
}
