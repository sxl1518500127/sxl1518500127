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

        // dump($goods);
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

        // $uid = $_SESSION['home_userinfo']->customerid ? $_SESSION['home_userinfo']->customerid : '1';

        // 查询该商品是否以收藏
        // $atten = DB::table('storeup')->where('wid',$id)->where('uid',$uid)->get();
        // dd($atten);


        //显示模板
        return view('home.goods.detail',['goods'=>$goods,'sizes'=>$sizes,'colors'=>$colors,'comment'=>$comment,'comments'=>$comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show()
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
