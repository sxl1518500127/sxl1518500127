<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $goods = DB::table('goodswares')->where('id',$id)->first();

        $goodsspec = DB::table('goodsspec')->where('wid',$id)->first();

        if($goodsspec){
            //规格
            $size = $goodsspec->goodspec;

        //颜色
        $color = $goodsspec->color;
        }else{
            $size = "未定义";
            $color = "未定义";
        }

        //分割字符串
        $sizes = explode(',',$size);

        //分割字符串
        $colors = explode(',',$color);

        // 评论
        $comment = DB::table('commentwares')
            ->join('goodswares', 'goodswares.id', '=', 'commentwares.wid')
            ->join('usercustomer', 'usercustomer.customerid', '=', 'commentwares.uid')
            ->select('goodswares.*', 'commentwares.*','usercustomer.*')
            ->where('goodswares.id',$id)
            ->get();

        // 最新评论
        $comments = DB::table('commentwares')
            ->join('goodswares', 'goodswares.id', '=', 'commentwares.wid')
            ->join('usercustomer', 'usercustomer.customerid', '=', 'commentwares.uid')
            ->select('goodswares.*', 'commentwares.*','usercustomer.*')
            ->orderBy('commentwares.id','desc')
            ->take(2)
            ->where('goodswares.id',$id)
            ->get();

        //显示模板
        return view('home.goods.detail',['goods'=>$goods,'sizes'=>$sizes,'colors'=>$colors,'comment'=>$comment,'comments'=>$comments]);
    }
}
