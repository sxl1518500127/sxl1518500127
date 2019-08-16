<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins;
use DB;

class AdminController extends Controller
{
    
	public function index(Request $request)
    {

        $search = $request->input('search','');

        // dd($search);

        // 获取数据
        $admins = Admins::where('adminuname','like','%'.$search.'%')->paginate(100000);

        // 加载模板
        return view('admin.admins.index',['admins'=>$admins,'requests'=>$request->input()]); 

    }

    public function create()
    {
        $roles = DB::table('roles')->get();
    	// 显示模板
    	return view('admin.admins.create',['roles'=>$roles]);
    }

    public function store(Request $request)
    {

        // dd($request->hasFile('adminphoto'));
        // 检查文件上传
        if ($request->hasFile('adminphoto')) {
            // 获取头像
            $path = $request->file('adminphoto')->store(date('Ymd'));
        }else{
            return back();
        }
        // 开启事务
        DB::beginTransaction();
    	$admin = new Admins;
    	$admin->adminuname = $request->input('adminuname');
    	$admin->adminname = $request->input('adminname');
    	$admin->adminpass = $request->input('adminpass');
    	$admin->adminphoto = $path;
    	$admin->save();
        $uid = $admin->id;
        $rid = $request->input('roles');
        
        $add = DB::table('user_role')->insert(['userroleid'=>$uid,'roleid'=>$rid]);

        if($admin && $add){
            DB::commit();
            return redirect('admin/admins')->with('success', '添加成功');
        }else{
            DB::rollBack();
            return back()->with('error', '添加失败');
        }

    }

        /**
     * 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 开启事务
        DB::beginTransaction(); 
        $res = DB::table('user')->where('adminid' ,$id)->delete();   


        if($res){
            //提交事务
            DB::commit();
                return redirect('admin/admins')->with('success', '删除成功');
        }else{
            // 回滚事务
                DB::rollBack();
                return back()->with('error', '删除失败');
        }
        
    }

    // 用户修改
    public function edit($id)
    {
        // dd($id);

        $userinfo = DB::table('user')->where('adminid', $id)->first();
        $roles = DB::table('roles')->get();

        $rid = $roles[0]->id;

        $uid = $userinfo->adminid;

        return view('admin.admins.edit',['user'=>$userinfo,'roles'=>$roles]);
        // echo "123";
    }

     // 修改权限
    public function xgrole(Request $request,$id){
        // 开启事务
        DB::beginTransaction(); 

        $roles = DB::table('roles')->get();
        $rid = $request->ro;
        $uid = $id;
        $res = DB::table('user_role')->where('userroleid', $uid)->update(['roleid'=>$rid]);

        if($res){
            //提交事务
            DB::commit();
                return redirect('admin/admins')->with('success', '修改权限成功');
        }else{
            // 回滚事务
                DB::rollBack();
                return back()->with('error', '修改权限失败');
        }
    }
}
