<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStore;
use App\Models\Usercustomer;
use Hash;
use DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * 用户列表首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');

        // 获取数据
        $users = Usercustomer::where('customername','like','%'.$search.'%')->paginate(2);

        // 加载模板
        return view('admin.users.index',['users'=>$users,'requests'=>$request->input()]); 
        
    }

    /**
     * 显示 添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示页面
        return view('admin.users.create');
       
    }

    /**
     * 执行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStore $request)
    {
        
        // 检查文件上传
        if ($request->hasFile('customerphoto')) {
            // 获取头像
            $path = $request->file('customerphoto')->store(date('Ymd'));
        }else{
            return back();
        }
        // 开启事务
        DB::beginTransaction();

        // 实例化模型
        $usercustomer = new Usercustomer;
        $usercustomer->customername = $request->input('customername','');
        $usercustomer->customerpass = Hash::make($request->input('customerpass',''));
        $usercustomer->customeremail = $request->input('customeremail','');
        $usercustomer->customerphone = $request->input('customerphone','');

        // 添加头像
        
        $usercustomer->customerphoto = $path;
        $res = $usercustomer->save();
      
        if($res){
            DB::commit();
            return redirect('admin/users')->with('success', '添加成功');
        }else{
            DB::rollBack();
            return back()->with('error', '添加失败');
        }

    }

    /**
     * 显示详情页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 显示修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userinfo = DB::table('usercustomer')->where('customerid', $id)->first();
        // 加载视图
        return view('admin.users.edit',['user'=>$userinfo]);
        
    }

    /**
     * 执行修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // 检查用户是否有文件上传
        if(!$request->hasFile('customerphoto')){

            $user = [];
            $user["customeremail"] = $request->input('customeremail','');
            $user["customerphone"] = $request->input('customerphone','');

            //修改
            $upda = DB::table('usercustomer')->where('customerid', $id)->update($user);
            if($upda){
                return redirect('admin/users')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }

        }else{
            // 开启事务
            DB::beginTransaction();

            // 接收文件上传
            $path  = $request->file('customerphoto')->store(date('Ymd'));

            $usersinfo = Usercustomer::where('customerid',$id)->first();
            // 删除图片
            Storage::delete([$usersinfo->customerphoto]);
          
            $user['customerphoto'] = $path;

            // // 修改用户的主信息
            $user['customeremail'] = $request->input('customeremail','');
            $user['customerphone'] = $request->input('customerphone','');
            $res2 = DB::table("usercustomer")->where("customerid",$id)->update($user);

            if($res2){
                DB::commit();
                return redirect('admin/users')->with('success','修改成功');
            }else{
                DB::rollBack();
                return back()->with('error','修改失败');
            }

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
        $res = DB::table('usercustomer')->where('customerid' ,$id)->delete();   

        if($res){
            //提交事务
            DB::commit();
                return redirect('admin/users')->with('success', '删除成功');
        }else{
            // 回滚事务
                DB::rollBack();
                return back()->with('error', '删除失败');
        }
    }
}
