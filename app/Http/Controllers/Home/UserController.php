<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usercustomer;
use App\Models\goods;
use DB;
use Hash;

class UserController extends Controller
{
    // 个人信息
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
        $carts = [];
        foreach ($arr as $key => $value) {
            
            $carts[] =goods::join('indentpublic','indentpublic.wid','goodswares.id')->where(['indentpublic.bianhao'=>$value->indentbian])->get();
        }
        //显示模板
        return view('home.user.order',['arr'=>$arr,"carts"=>$carts]);
    }


    // 地址模板
    public function address()
    {

        $id = $_SESSION['home_userinfo']->customerid;

        $address = DB::table('customercargo')->where('uid',$id)->get();
        //显示模板
        return view('home.user.address',['address'=>$address]);
    }

    // 删除地址
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

    // 用户修改
    public function store(Request $Request)
    {
        $id = $_SESSION['home_userinfo']->customerid;

        $user = Usercustomer::where('customerid',$id)->first();

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


    // 添加地址
    public function add(Request $request)
    {   
        // 用户id
        $id = $_SESSION['home_userinfo']->customerid;

        $address = DB::table('customercargo')->where('uid',$id)->count();

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

    // 修改密码模板
    public function password()
    { 
        //显示模板
        return view('home.user.password');
    }

    // 修改密码
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

    // 我的评论
    public function comment()
    {
        //获取当前登陆的id
        $id = $_SESSION['home_userinfo']->customerid;

        // 获取当前可评论的商品
        $ping = DB::table('doindent')->where(['uid'=>$id,'indentstatus'=>'4'])->get();

        $lists = [];
        foreach ($ping as $k => $v) {
            $bianhao = $v->indentbian;

            // 获取当前可评论的商品详情
            $lists[] = DB::table('indentpublic')
                ->join('goodswares', 'goodswares.id', '=', 'indentpublic.wid')
                ->select('goodswares.*', 'indentpublic.*')
                ->where("indentpublic.bianhao",$bianhao)
                ->get();
        }
        //显示模板
        return view('home.user.comment',['lists'=>$lists]);
    }


    // 评论页面
    public function comments($wid)
    {
        //获取当前登陆的id
        $id = $_SESSION['home_userinfo']->customerid;

         // 获取当前可评论的商品详情
        $lists = DB::table('indentpublic')
                ->join('goodswares', 'goodswares.id', '=', 'indentpublic.wid')
                ->where('indentpublic.id',$wid)
                ->select('goodswares.*', 'indentpublic.*')
                ->get();

        //显示模板
        return view('home.comment.index',['lists'=>$lists]);
    }


    // 添加评论
    public function insert(Request $request)
    {
        // 评论内容
        $commentstr = $request->input('commentstr');

        // 评论的商品id
        $wid = $request->input('wid');

        // 评星
        $score = number_format($request->input('score',2),1);

        //当前评论内容的用户
        $uid = $_SESSION['home_userinfo']->customerid;

        // 获取当前的时间戳
        $time = time();

        // 更换时间戳格式
        $start = date('Y-m-d H:i:s',$time);

        // 获取当前的ip
        $ip = $_SERVER["REMOTE_ADDR"];

        // 修改indentpublic表状态
        $upd = DB::table('indentpublic')->where('wid', $wid)->update(['iscomment'=>2]);

        $add = DB::table('commentwares')->insert(['commentstr'=>$commentstr,'wid'=>$wid,'uid'=>$uid,'commenttime'=>$start,'commentip'=>$ip,'score'=>$score]);

        if ($add) {
            echo "<script>alert('评论成功');location.href='/user/comment';</script>";               
            exit;
        }else{
            echo "<script>alert('评论失败');location.href='/comment/comments';</script>";               
            exit;
        }

    }

    //我的关注模板
    public function attention()
    {
        // 查询出关注的商品
        $lists = DB::table('storeup')
        ->join('goodswares', 'goodswares.id', '=', 'storeup.wid')
        ->join('usercustomer', 'usercustomer.customerid', '=', 'storeup.uid')
        ->select('goodswares.*', 'usercustomer.*')
        ->get();

        return view('home.user.attention',['lists'=>$lists]);
    }

    // 我的关注页面
    public function attentions($id)
    {
        $uid = $_SESSION['home_userinfo']->customerid;

        $atten = DB::table('storeup')->where(['wid'=>$id,'uid'=>$uid])->get();
        if (!count($atten) > 0) {
            $add = DB::table('storeup')->insert(['wid'=>$id,'uid'=>$uid]);
        }else{
            echo "<script>alert('已经关注该商品了');location.href='/';</script>";               
            exit;
        }
        
        if ($add) {
            echo "<script>alert('关注成功');location.href='/user/attention';</script>";               
            exit;
        }else{
            echo "<script>alert('已经关注该商品了');location.href='/';</script>";               
            exit;
        }
    }


    // 取消关注
    public function delatten($id)
    {
        // 获取当前登陆的id
        $uid = $_SESSION['home_userinfo']->customerid;

        // 删除当前用户关注的商品
        $res = DB::table('storeup')->where(['wid'=>$id,'uid'=>$uid])->delete();  
        if ($res) {
            echo "<script>alert('取消关注成功');location.href='/user/attention';</script>";               
            exit;
        }else{
            echo "<script>alert('取消关注失败');location.href='/';</script>";               
            exit;
        }
    }

    // 查看物流
    public function log($id)
    {
        return view("home.user.log",["id"=>$id]);
    }

    // 确认收货
    public function tuiorder(Request $Request,$id)
    {
        $uid = $_SESSION['home_userinfo']->customerid;

        $pass = $Request->input('password');

        $user = DB::table('usercustomer')->where(['customerid'=>$uid])->first();


        if(hash::check($pass,$user->customerpass)){
            $ding = DB::table('doindent')->where('indentbian',$id)->update(['indentstatus'=>'4']);
            if ($ding) {
            echo "<script>alert('收货成功');location.href='/user/order';</script>";               
            exit;
            }
        }else{
            echo "<script>alert('密码不正确');location.href='/user/order';</script>";               
            exit;
        }


    }
}
