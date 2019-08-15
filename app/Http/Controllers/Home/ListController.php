<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\CartController;
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

	public function __construct()
	{
		// 引入类文件
		require 'D:/wamp/www/sxl1518500127/public/pscws4/pscws4.class.php';
		// 实例化
		@$this->cws = new \PSCWS4;
		//设置字符集
		$this->cws->set_charset('utf8');
		//设置词典
		$this->cws->set_dict('pscws4/etc/dict.utf8.xdb');
		//设置utf8规则
		$this->cws->set_rule('pscws4/etc/rules.utf8.ini');
		//忽略标点符号
		$this->cws->set_ignore(true);
	} 


	public function dataWord(){
		$data = DB::table('goodswares')->get();
		// dump($data);
		foreach($data as $k => $v){
			$arr = $this->word($v->waresname);
			// dump($arr);
			foreach($arr as $kk => $vv){
				DB::table('waresword')->insert(['waresid'=>$v->id,'word'=>$vv]);
			}
			
		}
	}
    //
   
    public function eidt(Request $request){
    	
    	// $this->dataWord();
    	// dump($count);
    	//接受搜索//购物车商品数量
    	// $count = CartController::countCar();
    	$search = $request->input('search','');
    	//中文分词start
    	if(!empty($search)){
    		$gid = DB::table('waresword')->select('waresid')->where('word',$search)->get();
	    	$gids = [];
	    	foreach($gid as $k => $v){
	    		$gids[] = $v->waresid;
	    	}
	    	$data2 = DB::table('goodswares')->whereIn('id',$gids)->get();
    	}else{
    		$data2 = DB::table('goodswares')->get();
    	}
    	
    	//中文分词end
    	// return view('home.list.list_search',['wares'=>$data2,"count"=>$count]);
    	return view('home.list.list_search',['wares'=>$data2]);
    }


    public  function word($text)
    {		
    	//去除空格
    	$arr = explode(' ',$text);
    	$preg = '/^[\w\+\%\.\(\)]+/';
    	$str = '';
    	foreach($arr as $k => $v){
    		$str .= preg_replace($preg,'',$v);
    	}


		//传递字符串
		$this->cws->send_text($str);
		//获取权重最高的前十个词
		// $res = $cws->get_tops(10);// top 顶部


		//获取所有的结果
		$res = $this->cws->get_result();
		
		$list = [];
		foreach($res as $k => $v){
			$list[] = $v['word'];
		}
		return $list;




		
    }


    public function show($id)
    {

   		// 查询goods的id
    	$list = DB::table('goods')->where('goodsmid','=',$id)->first();
    	
    	// 根据goods的id查询goodswares的id
    	$lists = DB::table('goodswares')->where('waresgid','=',$list->id)->get();


    	// dump($list->id);
    	return view('home.list.index',['lists'=>$lists]);

    }

    public function lists()
    {
    	// 查询更多的商品
    	$goodswares = DB::table('goodswares')->get();

    	// dd($lists);

    	return view('home.list.list',['goodswares'=>$goodswares]);
    }



 	public function __destruct(){
    	//关闭
		$this->cws->close();
    }


}

