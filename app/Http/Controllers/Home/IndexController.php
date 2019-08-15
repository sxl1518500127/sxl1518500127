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
    	// dd($links);
    	return  $links;

	}
    
    public static function getPidCatesData($pid = 0)
    { 
        $data = Good::where('goodsmid',$pid)->get();

  // $goodstar = DB::table('goodswares')->where('waresgid',17)->get();
            // dump($goodstar);
        $sanji = [];
        $erji = [];
        
        // dd($data);
        foreach ($data as $k => $v) {
            // dump($v->id);
            $erji[$v->id] = Good::where('goodspath',"0,".$v->id)->get();
            // dump($erji);
            // if(empty()){}
            foreach($erji as $ke => $va){
                // dump($va);
                foreach ($va as $key => $value) {
                    # code...
                    $sanji[$v->id] =DB::table('goodswares')->where('waresgid',$value->id)->get();
                }
            }
            // $v->sub = self::getPidCatesData($v->id);

        }
        // dump($data);
        // dump($erji);
        // dd($sanji);
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
        
        // dd($data);
        foreach ($data as $k => $v) {
            // dump($v->id);
            $erji[$v->id] = Good::where('goodspath',"0,".$v->id)->get();
            // dump($erji);
            // if(empty()){}
            foreach($erji as $ke => $va){
                // dump($va);
                foreach ($va as $key => $value) {
                    # code...
                    $sanji[$value->id] =DB::table('goodswares')->where('waresgid',$value->id)->get()->toArray();
                }
            }
            // $v->sub = self::getPidCatesData($v->id);

        }
    	// 小米明星单品
    	$goodstar = DB::table('goodswares')->orderBy("updated_at","desc")->limit(9)->get();

    	// 普通商品
    	$goods = DB::table('goodswares')->orderBy("waressellcount","desc")->get();

        // 商品类型
        $good = DB::table('goods')->where('goodspath','0')->get();

        // dd($good);


        $wares = [];

        foreach ($good as $k => $v) {
            $wares[] = DB::table('goodswares')->where('waresgid',$v->id)->get();
        }

            

    	// 显示模板
    	return view('home.index.index',['goods'=>$goods,'goodstar'=>$goodstar,'good'=>$good,'wares'=>$wares,'data'=>$data,"erji"=>$erji,"sanji"=>$sanji]);
    }

}
