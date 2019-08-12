<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Models\Login;
use Hash;
use DB; 

class LoginController extends Controller
{
    // 加载登陆页面
    public function login()
    {
     return view('home.login.login');
    }


    //加载登陆
    public function dologin(Request $request)
    {
        $this->validate($request, [
            'customername'  => 'required',
            'customerpass' => 'required',
        ],[
            'customername.required'=>'请填写用户名',
            'customerpass.required'=>'请填写密码'
        ]);
        
        // 获取信息
        $customername = $request->input('customername','');
        $customerpass = $request->input('customerpass','');

        $userinfo = DB::table('usercustomer')->where('customername',$customername)->first();

        if($customername !== $userinfo->customername){
            echo "<script>alert('用户名错误');location.href='/login';</script>";               
                exit;
            }


        // 验证密码正确
        if (!Hash::check($customerpass,$userinfo->customerpass)) {

            echo "<script>alert('密码错误');location.href='/login';</script>";            
            exit;
        }

        // 登录成功
        $_SESSION['home_login']=true;

        $_SESSION['home_userinfo']=$userinfo;
        
        //跳转
        return redirect('/');

    }
}