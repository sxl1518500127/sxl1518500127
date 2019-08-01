<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Link;
use DB;

class LinkController extends Controller
{
    //
    public function index(Request $request)
    {
        //获取数据
        // $links = Link::where('friendlylink','linkname');
        $links = DB::table('friendlylink')->get();
        // dd($links);
        
    	return view('admin.Link.index',['links'=>$links]);
    }

    public function store(Request $request)
    {
    	// dump($request->input());
    	//获取网址
    	
    	$input= $request->input();
    	
    	// 正则表达式
    	$strRegex ='/^([hH][tT]{2}[pP]:\/\/|[hH][tT]{2}[pP][sS]:\/\/|www\.)(([A-Za-z0-9-~]+)\.)+([A-Za-z0-9-~\/])+$/';

        //判断
        if (preg_match($strRegex,$request->input('linkdir',''))) {
        	// 实例化模型
	        $link = new Link;
	        $link->linkdir = $request->input('linkdir','');
	        $link->linkname =$request->input('linkname','');
	        $res = $link->save();
        	return redirect('admin/link')->with('success', '添加成功');
        }else{
        	return back()->with('error','请添加正确的网址!');
        }


    }

    public function show()
    {	

    	return view('admin.Link.linkadd');

    }


   public function destroy($id)
    {
        // 开启事务
        DB::beginTransaction(); 

        // $id =$request->input('id');
        $res = DB::table('friendlylink')->where('id' ,$id)->delete();   
        if($res){
            //提交事务
            DB::commit();
            return redirect('admin/link')->with('success', '删除成功');
        }else{

            // 回滚事务
            
            DB::rollBack();
            return back()->with('error', '删除失败');
        }
        
    }


}
