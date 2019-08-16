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
<form action="/cart/moneyinsert" method="post">
                        {{ csrf_field() }}

    <div class="section section-goods">
        <div class="section-header clearfix">
            <h3 class="title">提交退款申请 &nbsp;&nbsp;&nbsp;&nbsp; 订单编号:{{$indent->indentbian}} &nbsp;&nbsp;&nbsp;&nbsp;  退款金额:{{$indent->indentprice}}元</h3>  
        </div>
        <div>
            <h2 class="title"><a href="" ></a></h2>
            <div class="demo">
            </div>
        </div>
        <div class="clear"></div>
        <div class="section-body clearfix">
            @foreach($cart as $k =>$v )
            <span  style="width:600px;height: 300px">

                <div class="goods-item">
                    <div class="figure figure-img">
                        <img src="/uploads/{{$v->waresimgpath}}" width="200" height="200" alt="">
                    </div>
                </div>
                <div class="goods-item">
                    <p class="desc">商品名称:{{$v->waresname}}</p>
                    <p class="desc">价格:{{$v->waresprice}}</p>
                    <p class="desc">数量:{{$v->num}}</p><p></p>
                    <p class="desc">类型: {{$v->specstr}}</p>
                    <p class="desc">价格: {{$v->num * $v->waresprice}}</p>
                </div>
            </span>
            @endforeach
            <ul class="goods-list clearfix" id="J_goodsList" style="float: right">
                <textarea name="what" title="">退款原因</textarea>
            </ul>
       

        </div>
    </div>
    <input type="hidden" name="bianhao" value="{{$indent->indentbian}}">
    <div class="section-bar clearfix">
        <div class="fr">
            <button href="" class="btn btn-primary" id="J_checkoutToPay" data-stat-id="4773f7ffc10003b8" >提交
            </button>
        </div>
    </div>
</form>
</body>
