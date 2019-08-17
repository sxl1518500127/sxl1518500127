@extends('home.layout.index')
@section('title','我的订单')
@section('css')

<link rel="stylesheet" href="/h/homes/common/css/base.min.css" />
<link rel="stylesheet" href="/h/homes/common/css/main.min.css" />
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <a href="//www.mi.com/index.html">首页</a><span class="sep">&gt;</span><span>交易订单</span>
    </div>
</div>

<div class="page-main user-main">
    <div class="container">
        <div class="row">
            <div class="span4">
                    <div class="uc-box uc-sub-box">
                        <div class="uc-nav-box">
                            <div class="box-hd">
                                <h3 class="title">订单中心</h3>
                            </div>
                            <div class="box-bd">
                                <ul class="uc-nav-list">
                                    <li class="active">
                                        <a href="/user/order">我的订单</a>
                                    </li>
                                    
                                    <li>
                                        <a href="/user/comment/">评价晒单</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="uc-nav-box">
                            <div class="box-hd">
                                <h3 class="title">个人中心</h3>
                            </div>
                            <div class="box-bd">
                                <ul class="uc-nav-list">

                                    
                                    <li>
                                        <a href="/user/address">收货地址</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="box-bd">
                                <ul class="uc-nav-list">  
                                    <li>
                                        <a href="/user/index">我的信息</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="box-bd">
                                <ul class="uc-nav-list">
                                    <li>
                                        <a href="/user/attention">我的关注</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="box-bd">
                                <ul class="uc-nav-list">
                                    <li>
                                        <a href="/user/password">修改密码</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="span16">
                <div class="uc-box uc-main-box">
                    <div class="uc-content-box order-list-box">
                        <div class="box-hd">
                            <h1 class="title">我的订单<small>请谨防钓鱼链接或诈骗电话，<a href="//www.mi.com/service/buy/antifraud/" target="_blank">了解更多&gt;</a></small></h1>
                            <div class="more clearfix">
                                <div class="tab">
                                  <b id="quan" class="tablinks" onclick="openCity(event, 'London')">全部有效订单</b>&nbsp&nbsp&nbsp
                                  <b class="tablinks" onclick="openCity(event, 'Paris')">未付款</b>&nbsp&nbsp&nbsp
                                  <b class="tablinks" onclick="openCity(event, 'Tokyo')">待发货
                                  </b>&nbsp&nbsp&nbsp
                                  <b class="tablinks" onclick="openCity(event, 'aaa')">待收货</b>&nbsp&nbsp&nbsp
                                  <b class="tablinks" onclick="openCity(event, 'bbb')">评价</b>&nbsp&nbsp&nbsp
                                  <b class="tablinks" onclick="openCity(event, 'ccc')">退款/售后</b>
                                </div>                                
                            </div>
                        </div>
                        <div id="Paris" class="tabcontent">
                            <h3>未付款</h3>
                            @foreach($arr as $k=>$v)
                                @if($v->indentstatus =="0")
                                <div style="border:1px solid #ff6700" class="order-detail">
                                    <div class="order-summary">
                                        <div style="color:#ff6700" class="order-status">
                                            等待付款
                                            <span class="order-actions">
                                                <a class="btn btn-small btn-primary" style="margin-left: 640px" href="/order/getPay?indentbian={{$v->indentbian}}" target="_blank">立即支付</a>
                                                <!--<a class="btn btn-small btn-line-gray" href="user/orderView?id=23">订单详情</a>-->
                                            </span>
                                        </div>
                                        <p style="color:#ff6700" class="order-desc J_deliverDesc">
                                            现在支付，预计2-3天送达
                                            <span class="beta">wait</span>

                                            
                                        </p>
                                    </div>
                                    <table class="order-detail-table">
                                        <thead>
                                            <tr>
                                                <th class="col-main">
                                                    <p class="caption-info">
                                                        {{$v->created_at}}
                                                        <span class="sep">|</span>
                                                        {{$v->indentname}}
                                                        <span class="sep">|</span>
                                                        订单号：
                                                       {{$v->indentbian}}
                                                        <span class="sep">|</span>
                                                        在线支付
                                                    </p>
                                                </th>
                                                <th class="col-sub">
                                                    <p class="caption-price">
                                                        订单金额：
                                                        <span class="num">{{$v->indentprice}}</span>
                                                        元
                                                    </p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $key => $vlaue )
                                            @foreach($vlaue as $kee => $vel)
                                            @if($vel->bianhao == $v->indentbian )
                                            <tr>
                                                <td class="order-items">
                                                    <ul class="goods-list">
                                                        <li>
                                                            <div class="figure figure-thumb">
                                                                <a href="/detail/{{$vel->wid}}" target="_blank">
                                                                    <img src="/uploads/{{$vel->waresimgpath}}" width="80" height="80" alt=""></a>
                                                            </div>
                                                            <p class="name">
                                                                <a target="_blank" href="/detail/{{$vel->wid}}">{{$vel->waresname}}&nbsp;&nbsp;&nbsp;{{$vel->specstr}}</a>
                                                            </p>
                                                            <p class="price">{{$vel->waresprice}}元 × {{$vel->num}} = {{$vel->waresprice*$vel->num}}</p>
                                                        </li>
                                                    </ul>
                                                </td>
                                                
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div> &nbsp;</div>
                                @endif
                            @endforeach
                
                        </div>

                        <div id="Tokyo" class="tabcontent">
                          <h3>待发货</h3>
                          @foreach($arr as $k=>$v)
                                @if($v->indentstatus =="1")
                                <div style="border:1px solid #ff6700" class="order-detail">
                                    <div class="order-summary">
                                        <div style="color:#ff6700" class="order-status">
                                            等待发货
                                            <span class="order-actions">
                                                <a class="btn btn-small btn-primary" style="margin-left: 640px" href="/order/money/{{$v->indentbian}}" target="_blank">退款</a>
                                                <!--<a class="btn btn-small btn-line-gray" href="user/orderView?id=23">订单详情</a>-->
                                            </span>
                                        </div>
                                        <p style="color:#ff6700" class="order-desc J_deliverDesc">
                                            商家会尽快给你发货
                                            <span class="beta">wait</span>

                                            
                                        </p>
                                    </div>
                                    <table class="order-detail-table">
                                        <thead>
                                            <tr>
                                                <th class="col-main">
                                                    <p class="caption-info">
                                                        {{$v->created_at}}
                                                        <span class="sep">|</span>
                                                        {{$v->indentname}}
                                                        <span class="sep">|</span>
                                                        订单号：
                                                       {{$v->indentbian}}
                                                        <span class="sep">|</span>
                                                        在线支付
                                                    </p>
                                                </th>
                                                <th class="col-sub">
                                                    <p class="caption-price">
                                                        订单金额：
                                                        <span class="num">{{$v->indentprice}}</span>
                                                        元
                                                    </p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $key => $vlaue )
                                            @foreach($vlaue as $kee => $vel)
                                            @if($vel->bianhao == $v->indentbian )
                                            <tr>
                                                <td class="order-items">
                                                    <ul class="goods-list">
                                                        <li>
                                                            <div class="figure figure-thumb">
                                                                <a href="/detail/{{$vel->wid}}" target="_blank">
                                                                    <img src="/uploads/{{$vel->waresimgpath}}" width="80" height="80" alt=""></a>
                                                            </div>
                                                            <p class="name">
                                                                <a target="_blank" href="/detail/{{$vel->wid}}">{{$vel->waresname}}&nbsp;&nbsp;&nbsp;{{$vel->specstr}}</a>
                                                            </p>
                                                            <p class="price">{{$vel->waresprice}}元 × {{$vel->num}} = {{$vel->waresprice*$vel->num}}</p>
                                                        </li>
                                                    </ul>
                                                </td>
                                                
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div> &nbsp;</div>
                                @endif
                            @endforeach
                        </div>

                        <div id="aaa" class="tabcontent">
                            <h3>待收货</h3>
                            @foreach($arr as $k=>$v)
                                @if($v->indentstatus =="2")
                                <div style="border:1px solid #ff6700" class="order-detail">
                                    <div class="order-summary">
                                        <div style="color:#ff6700" class="order-status">
                                            卖家已发货
                                            <span class="order-actions">
                                                <button class="btn btn-small btn-line-gray" data-toggle="modal" data-target="#myModal">确认收货</button>
                                                <a class="btn btn-small btn-line-gray" href="user/orderView?id=23">查看物流</a>
                                            </span>
                                        </div>
                                        <p style="color:#ff6700" class="order-desc J_deliverDesc">
                                            快递员正在向你飞奔而来
                                            <span class="beta">wait</span>

                                            
                                        </p>
                                    </div>
                                    <table class="order-detail-table">
                                        <thead>
                                            <tr>
                                                <th class="col-main">
                                                    <p class="caption-info">
                                                        {{$v->created_at}}
                                                        <span class="sep">|</span>
                                                        {{$v->indentname}}
                                                        <span class="sep">|</span>
                                                        订单号：
                                                        {{$v->indentbian}}
                                                        <span class="sep">|</span>
                                                        在线支付
                                                    </p>
                                                </th>
                                                <th class="col-sub">
                                                    <p class="caption-price">
                                                        订单金额：
                                                        <span class="num">{{$v->indentprice}}</span>
                                                        元
                                                    </p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $key => $vlaue )
                                            @foreach($vlaue as $kee => $vel)
                                            @if($vel->bianhao == $v->indentbian )
                                            <tr>
                                                <td class="order-items">
                                                    <ul class="goods-list">
                                                        <li>
                                                            <div class="figure figure-thumb">
                                                                <a href="/detail/{{$vel->wid}}" target="_blank">
                                                                    <img src="/uploads/{{$vel->waresimgpath}}" width="80" height="80" alt=""></a>
                                                            </div>
                                                            <p class="name">
                                                                <a target="_blank" href="/detail/{{$vel->wid}}">{{$vel->waresname}}&nbsp;&nbsp;&nbsp;{{$vel->specstr}}</a>
                                                            </p>
                                                            <p class="price">{{$vel->waresprice}}元 × {{$vel->num}} = {{$vel->waresprice*$vel->num}}</p>
                                                        </li>
                                                    </ul>
                                                </td>
                                                
                                            </tr>
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h2 class="modal-title" id="myModalLabel">
                                                                    <center>收货请输入密码</center>
                                                                </h2>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form class="mws-form" action="/user/tuiorder/{{$vel->bianhao}}" method="post" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="dt1">
                                                                    <p class="dt-p f-l"><center>密码</center><input class="form-control"  name="password" oninput="myFunction()" type="password" value="" /></p>
                                                                        <div style="clear:both;"></div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                                </button>
                                                                <button type="Submit" class="btn btn-primary">
                                                                    提交更改
                                                                </button>
                                                            </div>
                                                            </form>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal -->
                                                </div>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div> &nbsp;</div>
                                @endif

                            @endforeach
                        </div>

                        <div id="bbb" class="tabcontent">
                            <h3>评价</h3>
                                @foreach($arr as $k=>$v)
                                @if($v->indentstatus =="4")
                                @foreach($carts as $key => $vlaue )
                                @foreach($vlaue as $kee => $vel)
                                @if($vel->bianhao == $v->indentbian )
                                <div style="border:1px solid #ff6700" class="order-detail">
                                    <div class="order-summary">小米专卖店 > 已收货</div>
                                    <table class="order-detail-table">
                                        <thead></thead>
                                        <tbody>
                                            <tr>
                                                <td class="order-items">
                                                    <ul class="goods-list">
                                                        <li>
                                                            <div class="figure figure-thumb">
                                                                <a href="/detail/{{$vel->wid}}" target="_blank">
                                                                    <img src="/uploads/{{$vel->waresimgpath}}" width="80" height="80" alt=""></a>
                                                            </div>
                                                            <p class="name">
                                                                <a target="_blank" href="/detail/{{$vel->wid}}">{{$vel->waresname}}&nbsp;&nbsp;&nbsp;{{$vel->specstr}}</a>
                                                            </p>
                                                            <p class="price">{{$vel->waresprice}}元 × {{$vel->num}} = {{$vel->waresprice*$vel->num}}</p>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="order-actions">
                                                    <a class="btn btn-small btn-primary"  href="/comment/comments/{{$vel->id}}" target="_blank">评价</a>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div> &nbsp;</div>
                                @endif
                                @endforeach
                                @endforeach
                                @endif
                            @endforeach
                        </div>

                        <div id="ccc" class="tabcontent">
                            <h3>退款</h3>
                            @foreach($arr as $k=>$v)
                                @if($v->indentstatus =="5")
                                <div style="border:1px solid #ff6700" class="order-detail">
                                    <div class="order-summary">
                                        <div style="color:#ff6700" class="order-status">
                                            退款成功
                                            <span class="order-actions">
                                                <a class="btn btn-small btn-primary" style="margin-left: 640px" href="/order/pay?id=23" target="_blank">查看详情</a>
                                            </span>
                                        </div>
                                        <p style="color:#ff6700" class="order-desc J_deliverDesc">
                                            仅退款
                                            <span class="beta">out</span>

                                            
                                        </p>
                                    </div>
                                    <table class="order-detail-table">
                                        <thead>
                                            <tr>
                                                <th class="col-main">
                                                    <p class="caption-info">
                                                        {{$v->created_at}}
                                                        <span class="sep">|</span>
                                                        {{$v->indentname}}
                                                        <span class="sep">|</span>
                                                        订单号：
                                                        {{$v->indentbian}}
                                                        <span class="sep">|</span>
                                                        在线支付
                                                    </p>
                                                </th>
                                                <th class="col-sub">
                                                    <p class="caption-price">
                                                        订单金额：
                                                        <span class="num">{{$v->indentprice}}</span>
                                                        元
                                                    </p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $key => $vlaue )
                                            @foreach($vlaue as $kee => $vel)
                                            @if($vel->bianhao == $v->indentbian )
                                            <tr>
                                                <td class="order-items">
                                                    <ul class="goods-list">
                                                        <li>
                                                            <div class="figure figure-thumb">
                                                                <a href="/detail/{{$vel->wid}}" target="_blank">
                                                                    <img src="/uploads/{{$vel->waresimgpath}}" width="80" height="80" alt=""></a>
                                                            </div>
                                                            <p class="name">
                                                                <a target="_blank" href="/detail/{{$vel->wid}}">{{$vel->waresname}}&nbsp;&nbsp;&nbsp;{{$vel->specstr}}</a>
                                                            </p>
                                                            <p class="price">{{$vel->waresprice}}元 × {{$vel->num}} = {{$vel->waresprice*$vel->num}}</p>
                                                        </li>
                                                    </ul>
                                                </td>
                                                
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div> &nbsp;</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="deliver-beta hide" id="J_deliverBeta">
    <p>预计送达时间功能处于测试阶段，若您在下单时已选择“周末送货”或“工作日送货”，则会顺延至您要求的时间，如果发现预计送达时间不准确，期待您的反馈，我们会及时改进。</p>
    <a href="//static.mi.com/feedback/" target="_blank">问题反馈 &gt;</a>
    <i class="arrow arrow-a"></i>
    <i class="arrow arrow-b"></i>
</div>




<div class="modal modal-appcode modal-hide fade" id="J_modalAppcode">
  <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe602;</i></a>
  <div class="modal-header">
    <h3 class="title">查看电子门票</h3>
  </div>
  <div class="modal-body">
    <p>发布会电子门票仅支持在小米商城 App 查看<br>扫码下载小米商城</p>
    <img src="//s1.mi.com/m/ghd/2016/0422max/images/2-2efadb9f14.png" alt="">
  </div>
</div>
<style>
input[type="password"],#btn1{
  box-sizing: border-box;
  text-align:center;
  font-size:1.4em;
  height:2.7em;
  border-radius:4px;
  border:1px solid #c8cccf;
  color:#6a6f77;
  -web-kit-appearance:none;
  -moz-appearance: none;
  display:block;
  outline:0;
  padding:0 1em;
  text-decoration:none;
  width:100%;
}

.pagination{
    text-align: center;
}
.pagination li{list-style:none;
    display: inline-block;
    width: 48px;
    height: 24px;
    padding: 3px 0;
    margin: 0 7px;
    font-size: 18px;
    font-weight: 200;
    line-height: 24px;
    color: #b0b0b0;
}
.pagination li:hover {
    background: #b0b0b0;
    color: #fff;
    cursor: pointer;
}
.pagination li:hover a{
    display: block;
    color:#fff;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
function openCity(evt, cityName) {
    var quan = document.getElementById("quan");



    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    quan.onclick = function () {
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "block";
    }
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<script src="/h/homes/common/myjs/jquery.min.js"></script>
<script src="/h/data/indexNav.js"></script>
<script src="/h/data/indexData.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- <script src="/h/homes/common/myjs/common.js"></script> -->
@endsection