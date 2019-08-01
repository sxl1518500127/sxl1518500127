<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	//显示模板
        return view('home.user.data');
    }

    public function order()
    {
        //显示模板
        return view('home.user.order');
    }


    public function address()
    {
        //显示模板
        return view('home.user.address');
    }


    public function comment()
    {
        //显示模板
        return view('home.user.comment');
    }
}
