<!DOCTYPE html>
<!-- saved from url=(0051)http://order.mi.com/buy/checkout?r=80242.1469596349 -->
<html lang="zh-CN" xml:lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>进行退款</title>
    <meta name="viewport" content="width=1226">

    <link type="text/css" rel="stylesheet" href="/h/homes/common/demo/css/application.css">`
    <link href="/h/homes/common//favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/h/homes/common/css/base.min.css">
    <link rel="stylesheet" type="text/css" href="/h/homes/common/css/checkout.min.css">
    <style type="text/css" media="screen">
        body{
            font-family: Tahoma;
        }
        textarea{
            width:450px;
            height: 210px;
            float:right;
            margin: 15px 100px;
            padding: 20px;
        }
        .goods-item{
            width:220px;
            height: 210px;
            float:left;
            margin: 15px ;

        }
        p:hover{
            color: #ff4f31;
        }
        p{
            font-weight: 800;
            font-size: 15px;
        }
        .title{
            float: left;
        }
        .demo{
            float: right;
            margin-top: 50px;
            margin-right: 250px;
        }
        .clear{
            clear: both;

        }
    </style>

</head>
<body>

    <div class="section section-goods">
        <div class="section-header clearfix">
            <h3 class="title">退款详情 &nbsp;&nbsp;&nbsp;<span>&nbsp;&nbsp;&nbsp;</span> 订单编号:{{$money->bianhao}} &nbsp;&nbsp;&nbsp;&nbsp;  退款金额:{{$money->jiage}}元 <span>&nbsp;&nbsp;&nbsp;</span> 申请人 : {{$user->customername}}<span>&nbsp;&nbsp;&nbsp;</span>申请人手机号:{{$user->customerphone}} <div style="float:right;margin-left: 30px"><a href="/user/order">返回>></a></div></h3>  
           

        </div>
        <div>
            <h2 class="title"><a href="" ></a></h2>
            <div class="demo">
            </div>
        </div>
        <div class="clear" style="font-size:30px;margin:0 auto;" > <center>订单状态：@if($money->status =="1") 等待店家处理 @else 已退款 @endif</center></div>
        <div class="section-body clearfix">
            @foreach($cart as $k =>$v )
            <div  style="height: 300px">

                <div class="goods-item">
                    <div class="figure figure-img">
                        <img src="/uploads/{{$v->waresimgpath}}" width="200" height="200" alt="">
                    </div>
                </div>
                <div class="">
                    <p class="desc">商品名称:{{$v->waresname}}</p>
                    <p class="desc">价格:{{$v->waresprice}}元</p>
                    <p class="desc">数量:{{$v->num}}</p><p></p>
                    <p class="desc">类型: {{$v->specstr}}</p>
                    <p class="desc">价格: {{$v->num * $v->waresprice}}元</p>
                </div>
            </div>
            @endforeach
      
       

        </div>
    </div>

</form>
</body>
