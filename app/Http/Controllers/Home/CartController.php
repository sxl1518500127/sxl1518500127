<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Controllers\Home\CartController;
use App\Models\shopcart;
use App\Models\goods;
use App\Models\coustomercargo;
use App\Models\doindent;
use App\Models\indentpublic;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dump($_SESSION['home_login']);
        // dump($_SESSION['home_userinfo']);
        // // $_SESSION["car"] =null;
        // dump($_SESSION["car"]);
        // dump($_SESSION["car"]);
        $listItem ='';
        if(empty($_SESSION['home_login'])){

            if(!empty($_SESSION["car"])){

                $data = $_SESSION["car"];
                foreach ($data as $key => $value) {
                    $listItem .= $key.',';
                }
            }else{
                $data  = [];
            }
        }else{
         
            $uid = $_SESSION['home_userinfo']->customerid;
            $cart = DB::table("shopcart")->where("uid",$uid)->get();
            foreach ($cart as $key => $value) {
                $cart = goods::find($value->wid);
                $cart->num  = $value ->count;
                $cart->xiaoji = $value ->count * $value->spec;
                $_SESSION["car"][$value->wid] = $cart;

                $listItem .= $value->wid.',';

            }
            $data = $_SESSION["car"];


        }
        $listItem = trim($listItem,',');
        // 
        $priceCount = self::priceCount();
        //接受搜索//购物车商品数量
        $count = CartController::countCar();
        //显示模板
        return view('home.cart.cart',["count"=>$count,"data"=>$data,"priceCount"=>$priceCount,"listItem"=>$listItem]);
    }

    /**
     * Show the form for creating a new resource.
     *  加入购物车
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input("id","0");

        //判断是否添加过
        if(empty($_SESSION["car"][$id])){
            // 获取商品
            $data = DB::table("goodswares")->where("id",$id)->first();
            $data->num  = 1;
            // $data = DB::table("shopcart")->insert(["uid"->$_SESSION["home"]["user"],"wid"=>$id]);
            $data->xiaoji = $data->waresprice * $data->num;
            $data->spec = $data->waresprice;
            $_SESSION["car"][$id] = $data;
            if(!empty($_SESSION['home_login'])){
                DB::beginTransaction();
                $shopcart = new shopcart;
                $shopcart->uid = $_SESSION['home_userinfo']->customerid;
                $shopcart->wid = $_SESSION["car"][$id]->id;
                $shopcart->xiaoji = $_SESSION["car"][$id]->xiaoji;
                $shopcart->spec = $data->waresprice;
                $shopcart->count = $_SESSION["car"][$id]->num;
                $res = $shopcart->save();
                if(!$res){
                    DB::rollBack();
                    unset($_SESSION["car"][$id]);
                    return back()->with('error', '添加失败');
                }else{
                    DB::commit();
                }
            }
        }else{
            $_SESSION["car"][$id]->num = $_SESSION["car"][$id]->num+1;
            $_SESSION["car"][$id]->xiaoji = ($_SESSION["car"][$id]->num * $_SESSION["car"][$id]->waresprice);
            if(!empty($_SESSION['home_login'])){

                // dump( $_SESSION["car"][$id]->id);
                // dump( $_SESSION["car"][$id]->num);
                DB::beginTransaction();
                $shopcart = DB::table("shopcart")->where("uid",$_SESSION['home_userinfo']->customerid)->where("wid",$_SESSION["car"][$id]->id)->update(["xiaoji"=>$_SESSION["car"][$id]->xiaoji,"count"=>$_SESSION["car"][$id]->num]);
                if(!$shopcart){
                    DB::rollBack();
                    unset($_SESSION["car"][$id]);
                    return back()->with('error', '添加失败');
                }else{
                    DB::commit();
                }
            }

        }
        
        echo '<script>'; echo 'alert("成功加入购物车");'; echo "location.href='/home/list_search'"; echo '</script>';
    }

   

    //删除delete购物车数据
    //
    public function delete(Request $request)
    {
        $alltotal  = 0;
        $listItem = $request->input('listItem');

        if(in_array($request->input('id'),$listItem)){
            unset($_SESSION["car"][$request->input('id')]);
            $key = array_search($request->input('id'),$listItem);
            unset($listItem[$key]);

        }

        $skuid = $request->input('id');
        if(!empty($_SESSION['home_userinfo'])){

            $uid = $_SESSION['home_userinfo']->customerid;

            
            $cart = shopcart::where('uid',$uid)->where('wid',$skuid)->first();

            if($cart->delete()){
              
                $this->data['status'] = 0; 
                $this->data['msg'] = '删除成功';
                echo json_encode($this->data);
                die;
            }else{
                $this->data['status'] = 2;
                $this->data['msg'] = '删除失败';
                echo json_encode($this->data);
                die;
            }
        }else{
            $this->data['status'] = 0; 
            $this->data['msg'] = '删除成功';
            echo json_encode($this->data);
            die;
        }
    }

   

    //计算总计
    public function priceCount()
    {
        if(empty($_SESSION["car"])){
            $priceCount = 0;
        }else{
            $priceCount = 0;
            foreach ($_SESSION["car"] as $key => $value) {
                $priceCount += $value->xiaoji;
            }
        }

        return  $priceCount;
    }

     /**
     * ajax处理跳转到订单页 (购物车跳转)
     */
    public function postcon(Request $request)
    {

        $uid = $_SESSION['home_userinfo']->customerid;
        $user = DB::table("usercustomer")->where("customerid",$uid)->first();
        $ad = DB::table("customercargo")->where("uid",$uid)->where("cargodefault","1")->first();
        if(empty($ad)){
            $this->data['status'] = 66;
            $this->data['msg'] = '请添加默认地址 ！';
            echo json_encode($this->data);
            die;
        }else{
            $address = $ad->cargoaddres;

        }
        //获取购物商品的skuid
        $listItem = $request->input("listItem");

        $carts = [];
        foreach ($listItem as $key => $value) {
           
            //获取购物车信息
            $carts[] = DB::table("shopcart")->where('uid',$uid)->where('wid',$value)->first();
        }

        $num = 0;
        $allTotal = 0;
        foreach($carts as $k=>$v){
            $num += $v->count;
            $allTotal += $v->count*$v->spec;
        }

        $bianhao = time('YmdHis').rand(1000000,9999999);//订单编号

        //添加到订单
        $indent = new doindent;
        $indent->uid = $uid;
        $indent->indentprice = $allTotal;
        $indent->indentstatus = "0";//未支付
        $indent->indenttime = time('Y-m-d H:i:s');
        $indent->indentaddres = $address;
        $indent->indentname = $user->customernickname;
        $indent->indentphoto = $user->customerphone;
        $indent->indentbian = $bianhao;//BIANHAO 
        $res = $indent->save();

        if($res){
            foreach ($carts as $key => $value) {
                
                //订单详情
                $public = new indentpublic;
                $public->wid = $value->wid;
                $public->num = $value->count;
                $public->specstr = $value->warespec." ".$value->color;
                $public->bianhao = $bianhao;//BIANHAO
                $re2 = $public->save();
                // $car = DB::table("shopcart")->where('id',$value->id)->delete();
                // if($car){
                //     unset($_SESSION["car"][$value->id]);
                //     unset($listItem[$value->id]);
                // }
            }

        }else{
            $this->data['status'] = 4;
            $this->data['msg'] = '添加订单失败 ！';
            echo json_encode($this->data);
            die;
        }
        // $listItem = $request->input('listItem');
      

        //将订单商品信息存入到session中
        if(empty($listItem)){
            $this->data['status'] = 4;
            $this->data['msg'] = '购物车为空';
            echo json_encode($this->data);
            die;
        }

        $_SESSION["listItem"] = $listItem;
        //跳转去订单确认页面
        $this->data['status'] = 0;
        $this->data['msg'] = '/order/confirm';
        echo json_encode($this->data);
        die;
    }

    //去结算模板
    public function confirm()
    {
        //获取用户id
        $uid = $_SESSION['home_userinfo']->customerid;
        $ad = DB::table("customercargo")->where("uid",$uid)->where("cargodefault","1")->first();
        $address = $ad->cargoaddres;
        //获取购物商品的skuid
        $listItem = $_SESSION['listItem'];
        // dump($listItem);
        
        $carts = [];
        $wares = [];
        foreach ($listItem as $key => $value) {
           // dd($value);
            
            //获取商品信息
            // $wares[] = DB::table("goodswares")->where('id',$value)->first();


            //获取购物车信息
            // $carts[$value] = DB::table("shopcart")->where('uid',$uid)->where('wid',$value)->first();

            $carts[] =goods::join('shopcart','shopcart.wid','goodswares.id')->where(['goodswares.id'=>$value,'shopcart.uid'=>$uid,'shopcart.wid'=>$value])->get();

            // dump($res);
            // dump($tupian->waresimgpath);
            // $carts[$value] = $tupian->waresimgpath;

            // 删除购物车  清除session
            $del = DB::table("shopcart")->where('uid',$uid)->where('wid',$value)->delete();
            if($del){
                unset($_SESSION["car"][$value]);
                unset($listItem[$value]);
                
            }
        }
        

        // dump($carts);
      
        //获取总件数 总价格
        // die();

        // $order->order_num = time('YmdHis').rand(100000,999999);//订单编号
        $num = 0;
        $allTotal = 0;
   
        foreach ($carts as $key => $value) {
            foreach ($value as $ke => $v) {
                $num += $v->count;
                $allTotal += $v->count*$v->spec;
            }
        }

        $pack_fee = 10;
        if($allTotal>99){
            $pack_fee = 0;
        }

        //删除购物车  
        //foreach
        $indents = DB::table("doindent")->where('indentstatus',"0")->where("uid",$uid)->orderby("id","desc")->first();

        return view('home.order.confirm',[
                'address'=>$address,
                'carts'=>$carts,
                'indents'=>$indents,
                'wares'=>$wares,
                'num'=>$num,
                'allTotal'=>$allTotal,
                'pack_fee'=>$pack_fee,
            ]);
    }

    // 统计购物车数量
    public static  function countCar()
    {

        if(empty($_SESSION["car"])){
            $count = 0;
        }else{
            $count = 0;
            foreach ($_SESSION["car"] as $key => $value) {
                $count += $value->num;
            }
        }

        return  $count;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function addproduct(Request $request)
    {
        //获取用户id

        //查找商品
        $sku = goods::find($request->input('id'));
        //判断是超过库存
        if($sku->waresstock < $request->input('num')){
            $this->data['status'] = 1;//超过最大库存
            $this->data['msg'] = '已超过最大库存量'.$sku->waresstock.'件';
            $this->data['total'] = $sku->waresstock * $sku->waresprice;//价格小计
            $this->data['price'] = $sku->waresprice;//当前价格
            $this->data['stock'] = $sku->waresstock;//当前价格
            echo json_encode($this->data);
            die;
        }
        //判断是否是未登录状态
        if(empty($_SESSION['home_userinfo'])){
                
            //判断 该商品是否被选中 选中就更新总价
            $skus = $request->input('listItem');
            // 
            $alltotal = 0;
            if($skus&&in_array($request->input('id'),$skus)){
                
                $this->totalPriceBySession($skus,$alltotal,$sku,$request);

            }else if(empty($request->input('listItem'))){//未全选状态处理
                $this->data['nofollow'] = 'none';
                $this->data['alltotal'] = number_format(0,2);
            }else{
                $this->totalPriceBySession($skus,$alltotal,$sku,$request);
            }

            //成功返回的信息
            $this->data['status'] = 0;
            $this->data['total'] = number_format($sku->price*$request->input('num'),2);//价格小计
            $this->data['price'] = number_format($sku->price,2);//当前价格
            $this->data['msg'] = 'ok';
            echo json_encode($this->data); 
            die;
           
        }else{
           $uid = $_SESSION['home_userinfo']->customerid;

            //更新购物车表
            $cart = shopcart::where('uid',$uid)->where('wid',$request->input('id'))->first();
            $cart->count = $request->input('num');
            $cart->spec = $sku->waresprice;;

            if($cart->save()){
                //判断 该商品是否被选中 选中就更新总价
                $skus = $request->input('listItem');
                $alltotal  = 0;

                if(!empty($skus)){

                    foreach ($skus as $kk => $vv) {
                       if($vv != $request->input('id')){

                            $cart11 = shopcart::where('uid',$uid)->where('wid',$vv)->first();
                            $alltotal += $cart11->spec * ($cart11->count); 
                       }
                        
                    }
                }else{
                    $alltotal  = 0;
                }
                
                if($skus&&in_array($request->input('id'),$skus)){
                    //计算总价
                    $this->totalPriceByDB($uid,$skus,$alltotal,$sku,$cart,$request);

                }else if(empty($request->input('listItem'))){//未全选状态处理
                    $this->data['nofollow'] = 'none';;
                    $this->data['alltotal'] = number_format(0,2);
                }else{
                    //计算总价
                    $this->totalPriceByDB($uid,$skus,$alltotal,$sku,$cart,$request);
                }

                // $this->data['alltotal'] = number_format($sku->waresprice*$request->input('num'),2);
                $this->data['status'] = 0;
                $this->data['xiaoji'] = number_format($sku->waresprice*$request->input('num'),2);//价格小计
                $this->data['price'] = number_format($sku->waresprice,2);//当前价格
                $this->data['msg'] = 'ok';
                // dump($this->data);
                echo json_encode($this->data); 
                die;
            }else{
                $this->data['status'] = 4;
                $this->data['price'] = number_format($sku->waresprice,2);//当前价格
                $this->data['total'] = number_format($sku->waresprice*$cart->count,2);//价格小计
                $this->data['msg'] = '数据库出错';
                echo json_encode($this->data); 
                die;
            }
            
        }
    }

     /**
     * 通过数据库获取购物车选择商品总价
     */
    private function totalPriceByDB($uid,$skus,$alltotal,$sku,$cart,$request)
    {
        
        foreach($skus as $k=>$v){
            if($v == $sku->id ){

                $cart2 = shopcart::where('uid',$uid)->where('wid',$v)->first();
                if(!empty($cart2)){
                    $alltotal += $cart->count*$sku->waresprice;
                }else{
                    $this->data['status'] = 2;
                    $this->data['msg'] = '查不到商品信息';
                    echo json_encode($this->data);
                    die;
                }
            }
            
        }
        //计算总价
        if(!empty($alltotal)&&is_numeric($alltotal)){
            $this->data['status'] = 0;
            $this->data['msg'] = 'ok';
            $this->data['price'] = number_format($sku->waresprice,2);//当前价格
            $this->data['total'] = number_format($sku->waresprice*$request->input('num'),2);//价格小计
            $this->data['alltotal'] = number_format($alltotal,2);
            echo json_encode($this->data);
            die;
        }else{
            $this->data['status'] = 3;
            $this->data['msg'] = '未知错误';
            $this->data['price'] = number_format($sku->waresprice,2);//当前价格
            $this->data['total'] = number_format($sku->waresprice*$request->input('num'),2);//价格小计
            $this->data['alltotal'] = '未知错误,请刷新页面';
            echo json_encode($this->data);
            die;
        }

    }


    /**
     * 通过session获取购物车选择商品总价
     */
    private function totalPriceBySession($skus,$alltotal,$sku,$request)
    {
        foreach($skus as $k=>$v){
            

            if(!empty($sku_2)){

                $alltotal += session('cart')[$v][1]*$sku_2->price;
               
            }else{
                $this->data['status'] = 2;
                $this->data['msg'] = '请登录';
                echo json_encode($this->data);
                die;
            }
            
        }
        
        //计算总价
        if(!empty($alltotal)&&is_numeric($alltotal)){
            $this->data['status'] = 0;
            $this->data['msg'] = 'ok';
            $this->data['price'] = number_format($sku->price,2);//当前价格
            $this->data['total'] = number_format($sku->price*$request->input('num'),2);//价格小计
            $this->data['alltotal'] = number_format($alltotal,2);
            echo json_encode($this->data);
            die;
        }else{
            $this->data['status'] = 3;
            $this->data['msg'] = '未知错误';
            $this->data['price'] = number_format($sku->price,2);//当前价格
            $this->data['total'] = number_format($sku->price*$request->input('num'),2);//价格小计
            $this->data['alltotal'] = '未知错误,请刷新页面';
            echo json_encode($this->data);
            die;
        }
    }
    
    //
    //去结算模板
    public function getPay(Request $request)
    {
        //查询订单数据库
        $order = doindent::where('indentbian',$request->input('indentbian'))->first();
        // $inep = indentpublic::where('bianhao',$request->input('indentbian'))->get();
        $inep =goods::join('indentpublic','indentpublic.wid','goodswares.id')->where(['indentpublic.bianhao'=>$request->input('indentbian')])->get();
        // dd($inep);
        //查询
        $beginTime = strtotime($order->created_at);
        $endTime = $beginTime + (48*3600);
        $nowTime = time();
        $countTime = floor(($endTime-$nowTime)/3600).'小时'.floor(($endTime-$nowTime)/60%60).'分';

        return view('home.order.pay',[
                'order'=>$order,
                'inep'=>$inep,
                'countTime'=>$countTime,
            ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        //判断什么方式支付
        $paymethod = "";
        $pay = $request->input("pay","");
        if($pay =="wei"){
            $paymethod = "微信支付成功";
        }elseif ($pay=="qg") {
            $paymethod = "网络支付成功";
            
        }elseif ($pay =="bao") {
           $paymethod = "支付宝支付成功";
            
        }elseif ($pay =="ka") {
           $paymethod = "银行卡支付成功";
            
        }elseif ($pay =="caifutong") {
           $paymethod = "财付通支付成功";
        }elseif ($pay =="mi") {
           $paymethod = "小米钱包支付成功";
        }
        $doindent = doindent::where("indentbian",$request->input("bianhao"))->update(["indentstatus"=>"1"]);
        if($doindent){

            return view('home.order.success',["pay"=>$paymethod]);
        }else{
            return back()->with('error', '支付失败');
        }
        //
    }

    
}
