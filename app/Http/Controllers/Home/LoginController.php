<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Models\Login;
use App\Models\shopcart;
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

        if(!$userinfo){
            echo "<script>alert('用户名或者密码错误');location.href='/login';</script>";               
                exit;
        }else{

            if (!Hash::check($customerpass,$userinfo->customerpass)) {

                echo "<script>alert('密码错误');location.href='/login';</script>";            
                exit;
            }
        }

        // 登录成功
        $_SESSION['home_login']=true;

        $_SESSION['home_userinfo']=$userinfo;
        if(!empty($_SESSION["car"])){
            foreach ($_SESSION["car"] as $key => $value) {
                $car = DB::table("shopcart")->where("wid",$key)->first();
                if(!$car){

                    $shopcart = new shopcart;
                    $shopcart->uid = $userinfo->customerid;
                    $shopcart->wid = $value->id;
                    $shopcart->xiaoji = $value->xiaoji;
                    $shopcart->spec = $value->spec;
                    $shopcart->count = $value->num;
                    $res = $shopcart->save();
                }
            }
        }

        
        //跳转
        return redirect('/');

    }
}