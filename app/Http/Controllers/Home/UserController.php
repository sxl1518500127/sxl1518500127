<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usercustomer;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {  
        $id = $_SESSION['home_userinfo']->customerid;
        $user = Usercustomer::where('customerid',$id)->first();
    	//显示模板
        return view('home.user.data',['user'=>$user]);
    }

    // 注销账号
    public function logout()
    {
        echo "<script>alert('退出成功');location.href='/';</script>";
        $_SESSION = array();
    }

    // 我的订单
    public function order()
    {
        $id = $_SESSION['home_userinfo']->customerid;
        $arr = DB::table('doindent')->where('uid',$id)->get();
// dd($arr);


        //显示模板
        return view('home.user.order',['arr'=>$arr]);
    }


    public function address()
    {

        $id = $_SESSION['home_userinfo']->customerid;

     $address = DB::table('customercargo')->where('uid',$id)->get();


        //显示模板
        return view('home.user.address',['address'=>$address]);
    }

    public function del(Request $request)
    {
        $id = $request->input('id');

        $res = DB::table('customercargo')->where('id' ,$id)->delete();
        if ($res) {
            $this->data['status'] = 0;
            echo json_encode($this->data);
            die;
        }
    }

    // 我的评论
    public function comment()
    {
        //显示模板
        return view('home.user.comment');
    }

    public function store(Request $Request)
    {
        $id = $_SESSION['home_userinfo']->customerid;

        $user = Usercustomer::where('customerid',$id)->first();

        // dd($Request->hasFile('tupian'));
        if ($Request->hasFile('tupian')) {
            // 获取头像
            $path = $Request->file('tupian')->store(date('Ymd'));

        }else{
            $path = $user['customerphoto'];
        }

        $id = $_SESSION['home_userinfo']->customerid;
        $customername = $Request->input('customername') ;
        $customerbirthday = $Request->input('customerbirthday');
        $customeremail = $Request->input('customeremail');
        $customernickname = $Request->input('customernickname');
        $customersex = $Request->input('customersex');
        $customerphone = $Request->input('customerphone');

        $update = DB::table('Usercustomer')->where('customerid', $id)->update(['customername'=>$customername,'customerbirthday'=>$customerbirthday,'customeremail'=>$customeremail,'customernickname'=>$customernickname,'customersex'=>$customersex,'customerphone'=>$customerphone,'customerphoto'=>$path]);

        if ($update) {
            echo "<script>alert('修改成功');location.href='/user/index';</script>";               
            exit;
        }else{
            echo "<script>alert('修改失败');location.href='/user/index';</script>";               
            exit;
        }
    }

    public function add(Request $request)
    {   
        // 用户id
        $id = $_SESSION['home_userinfo']->customerid;

        $address = DB::table('customercargo')->where('uid',$id)->count();
        // dump($address);

        if ($address == 3) {
            $this->data['status'] = 3;
                echo json_encode($this->data);
            die;
        }
        // 省份
        $province = $request->input('province');

        // 市区
        $city = $request->input('city');

        // 县城
        $country = $request->input('country');

        // 收货人
        $uname = $request->input('uname');

        // 详细地址
        $address = $request->input('address'); 

        // 拼接字符串
        $aa = $province.$city.$country.$address;
        // 手机号
        $phone = $request->input('phone');

        $add = DB::table('customercargo')->insert(['cargoname'=>$uname,'cargophone'=>$phone,'cargoaddres'=>$aa,'uid'=>$id]);
        if ($add) {
            $this->data['status'] = 0;
            echo json_encode($this->data);
            die;
        }
    }

    // 设置默认收货地址
    public function update(Request $request)
    {
        $id = $request->input('id');

        $aa = array('cargodefault' => 1);;
        DB::table('customercargo')->update(['cargodefault'=>'0']);
        $add = DB::table('customercargo')->where('id', $id)->update(['cargodefault'=>'1']);

        if ($add) {
            $this->data['status'] = 0;
            echo json_encode($this->data);
            die;
        }

    }

    public function password()
    { 
        //显示模板
        return view('home.user.password');
    }

    public function newpass(Request $request)
    {
        if ($request->input('newpass') != $request->input('newpasss')) {
            echo "<script>alert('两次密码不一致');location.href='/user/password';</script>";            
            exit;
        }
        $id = $_SESSION['home_userinfo']->customerid;

        $user = Usercustomer::where('customerid',$id)->first();
        $pass = $request->input('pass','');
        $newpass = Hash::make($request->newpass);
        // dd($newpass);

        // 验证密码正确
        if (!Hash::check($pass,$user->customerpass)) {

            echo "<script>alert('密码错误');location.href='/user/password';</script>";            
            exit;
        }


        $upd = DB::table('usercustomer')->where('customerid', $id)->update(['customerpass'=>$newpass]);

        if ($upd) {
           echo "<script>alert('修改成功');location.href='/user/password';</script>"; 
        }
    }
}
