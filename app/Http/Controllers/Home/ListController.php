<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ListController extends Controller
{
    // 加载页面
    public function index()
    {
    	// dd('0');
    	return view('home.list.index');
    }

    public function show($id)
    {
    	// dd($id);

		$lists = DB::table('goods')
            ->join('goodswares', 'goodswares.waresgid', '=', 'goods.id')
            ->where('goods.id',$id)
            ->select('goodswares.*', 'goods.id')
            ->get();
        // dd($lists);
    	return view('home.list.index',['lists'=>$lists]);
   			
    }

}
