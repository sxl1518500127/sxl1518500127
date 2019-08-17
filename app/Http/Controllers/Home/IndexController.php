<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\CartController;
use DB;
use App\Models\good;

class IndexController extends Controller
{
	public static function links(){
		// 获取友情链接信息
    	$links = DB::table('friendlylink')->get();
    	return  $links;

	}

    public static function config(){
        // 获取友情链接信息
        $config = DB::table('config')->first();
        return  $config;

    }
    
    public static function getPidCatesData($pid = 0)
    { 
        // 查询所有二级分类
        $data = Good::where('goodsmid',$pid)->get();
        $sanji = [];
        $erji = [];
        
        // 遍历二级分类        
        foreach ($data as $k => $v) {

            // 二级分类
            $erji[$v->id] = Good::where('goodspath',"0,".$v->id)->get();
            foreach($erji as $ke => $va){
                // 三级分类
                foreach ($va as $key => $value) {
                    $sanji[$v->id] =DB::table('goodswares')->where('waresgid',$value->id)->get();
                }
            }

        }
        // 返回到调用该静态方法的方法
        return $data;
        return $erji;
        return $sanji;
    }

    
    // 前台首页
    public function index()
    {	
        $data = Good::where('goodsmid',0)->get();
        $sanji = [];
        $erji = [];

        foreach ($data as $k => $v) {
            $erji[$v->id] = Good::where('goodspath',"0,".$v->id)->get();
            foreach($erji as $ke => $va){
                foreach ($va as $key => $value) {
                    $sanji[$value->id] =DB::table('goodswares')->where('waresgid',$value->id)->get()->toArray();
                }
            }

        }
    	// 小米明星单品
    	$goodstar = DB::table('goodswares')->orderBy("updated_at","desc")->limit(9)->get();

    	// 普通商品
    	$goods = DB::table('goodswares')->orderBy("waressellcount","desc")->get();

        // 商品类型
        $good = DB::table('goods')->where('goodspath','0')->get();

        $wares = [];

        foreach ($good as $k => $v) {
            // 查询商品
            $wares[] = DB::table('goodswares')->where('waresgid',$v->id)->get();
        }
    	// 显示模板并且传输数据
    	return view('home.index.index',['goods'=>$goods,'goodstar'=>$goodstar,'good'=>$good,'wares'=>$wares,'data'=>$data,"erji"=>$erji,"sanji"=>$sanji]);
    }

}
