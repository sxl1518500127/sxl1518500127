<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class LoginController extends Controller
{
    // 加载登陆页面
    public function login()
    {
    	return view('admin.login.login');
    }

    public function dologin(Request $request)
   	{
   		// dd($request);
   		/*$arr = [
   			['uname'=>'zhangsan','upass'=>Hash::make('123123')],
   			['uname'=>'lisi','upass'=>Hash::make('123123')],
   			['uname'=>'admin','upass'=>Hash::make('123123')],
   		];

   		foreach ($arr as $key => $value) {
   			DB::table('admin_users')->insert($value);
   		}*/

   		
   		// 获取信息
   		$adminuname = $request->input('adminuname','');
   		$adminpass = $request->input('adminpass','');


   		$userinfo = DB::table('user')->where('adminuname',$adminuname)->first();

   		// if($adminpass == $userinfo->adminpass){
   		// 	dd('123');
   		// }
   		// dump($adminpass);
   		// dd($userinfo);
   		if(!$userinfo){
			echo "<script>alert('用户名或者密码错误');location.href='/admin/login';</script>";   			
   			exit;
   		}

   		// 验证密码正确
   		if ($adminpass !== $userinfo->adminpass) {
   		    echo "<script>alert('用户名或者密码错误');location.href='/admin/login';</script>";   			
      			exit;
   		}

   		// 登录成功
   		session(['admin_login'=>true]);
   		session(['admin_userinfo'=>$userinfo]);


      $nodes = DB::select('select n.nodecroller,n.nodemethod from node as n,user_role as ur,roles_node as rn where ur.userroleid = '.$userinfo->adminid.' and ur.roleid = rn.roleid and rn.nodeid = n.id');

       $nodes_data = [];
         foreach ($nodes as $key => $value) {


            if($value->nodemethod == 'create'){
               $nodes_data[$value->nodecroller][] = 'store'; 
            }

            if($value->nodemethod == 'nodecroller'){
               $nodes_data[$value->nodecroller][] = 'update'; 
            }

            $nodes_data[$value->nodecroller][] = $value->nodemethod; 

         }
         // 压入后台首页权限
         $nodes_data['indexcontroller'][] = 'index'; 

         // 将权限压入session
         session(['admin_nodes'=>$nodes_data]);


   		// 跳转
   		return redirect('/admin');
		}
}
