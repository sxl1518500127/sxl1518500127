<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins;
use DB;
use Hash;


class AdminController extends Controller
{
    // 加载成员列表
	public function index(Request $request)
    {

        $search = $request->input('search','');


        // 获取数据
        $admins = Admins::where('adminuname','like','%'.$search.'%')->paginate(100000);

        // 加载模板并且传过去数据
        return view('admin.admins.index',['admins'=>$admins,'requests'=>$request->input()]); 

    }

    // 加载添加成员界面
    public function create()
    {
        // 查询职位
        $roles = DB::table('roles')->get();

        // 加载模板并且传过去数据
    	return view('admin.admins.create',['roles'=>$roles]);
    }

    // 执行添加界面
    public function store(Request $request)
    {
        // 检查文件上传
        if ($request->hasFile('adminphoto')) {
            // 获取头像
            $path = $request->file('adminphoto')->store(date('Ymd'));
        }else{
            return back();
        }
        // 开启事务
        DB::beginTransaction();

        // new模型赋值给变量（以数组的形式插入表中）
    	$admin = new Admins;
        // 把数据赋值到数组里
        // 管理员用户名
    	$admin->adminuname = $request->input('adminuname');

        //管理员账号
    	$admin->adminname = $request->input('adminname');

        // 管理员密码
    	$admin->adminpass = Hash::make($request->input('adminpass'));

        // 管理员头像
    	$admin->adminphoto = $path;

        // if ($admin->adminuname && $admin->adminname && $admin->adminpass && $admin->adminphoto) {
        //     return back()->with('error', '不可为空');
        // }

        // 查询账号是否重复
        $cs = DB::table('user')->where('adminuname',$admin->adminuname)->get();

        // 判断账号是否重复
        if (count($cs)) {
            return back()->with('error', '账号重复');
        }

        // 添加到数据库
    	$admin->save();

        // 管理员id
        $uid = $admin->id;

        // 权限id
        $rid = $request->input('roles');
        
        // 执行添加权限
        $add = DB::table('user_role')->insert(['userroleid'=>$uid,'roleid'=>$rid]);

        // 判断添加数据和添加权限是否成功
        if($admin && $add){
            //提交事务
            DB::commit();
            return redirect('admin/admins')->with('success', '添加成功');
        }else{
            // 回滚事务
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

        // 删除管理员
        $res = DB::table('user')->where('adminid' ,$id)->delete();   

        // 判断删除管理员是否成功
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

    // 加载修改界面
    public function edit($id)
    {
        // 查询出要修改的
        $userinfo = DB::table('user')->where('adminid', $id)->first();

        // 查询出权限
        $roles = DB::table('roles')->get();

        // 赋值权限id
        $rid = $roles[0]->id;

        // 当前修改的管理员id
        $uid = $userinfo->adminid;

        // 加载模板并且传过去数据
        return view('admin.admins.edit',['user'=>$userinfo,'roles'=>$roles]);
        // echo "123";
    }

    // 执行修改
    public function xgrole(Request $request,$id){
        // 开启事务
        DB::beginTransaction(); 

        // 查询出权限
        $roles = DB::table('roles')->get();

        // 权限id
        $rid = $request->ro;

        // 修改的管理员id
        $uid = $id;

        // 执行修改
        $res = DB::table('user_role')->where('userroleid', $uid)->update(['roleid'=>$rid]);

        // 判断是否修改成功
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
