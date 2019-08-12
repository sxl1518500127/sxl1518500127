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
                                  <b class="tablinks" onclick="openCity(event, 'Tokyo')">已付款</b>&nbsp&nbsp&nbsp
                                  <b class="tablinks" onclick="openCity(event, 'aaa')">已收货</b>&nbsp&nbsp&nbsp
                                  <b class="tablinks" onclick="openCity(event, 'bbb')">待评价</b>&nbsp&nbsp&nbsp
                                  <b class="tablinks" onclick="openCity(event, 'ccc')">退款</b>
                                </div>                                
                            </div>
                        </div>





                            <div id="Paris" class="tabcontent">
                              <h3>未付款</h3>
                    @foreach($arr as $k=>$v)

                    <div style="border:1px solid #ff6700" class="order-detail">
                        <div class="order-summary">
                            <div style="color:#ff6700" class="order-status">等待付款</div>
                            <p style="color:#ff6700" class="order-desc J_deliverDesc">
                                现在支付，预计2-3天送达
                                <span class="beta">wait</span>
                            </p>
                        </div><table class="order-detail-table">
                            <thead>
                                <tr>
                                    <th class="col-main">
                                        <p class="caption-info">
                                            2019年08月06日 01:56
                                            <span class="sep">|</span>
                                            是是是
                                            <span class="sep">|</span>
                                            订单号：
                                            <a href="/user/orderView?num=1565056599464828">1565056599464828</a>
                                            <span class="sep">|</span>
                                            在线支付
                                        </p>
                                    </th>
                                    <th class="col-sub">
                                        <p class="caption-price">
                                            订单金额：
                                            <span class="num">3072.00</span>
                                            元
                                        </p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="order-items">
                                        <ul class="goods-list"><li>
                                                <div class="figure figure-thumb">
                                                    <a href="/detail?id=1" target="_blank">
                                                        <img src="" width="80" height="80" alt=""></a>
                                                </div>
                                                <p class="name">
                                                    <a target="_blank" href="/detail?id=1">MI/小米 4C 标准版全网通 2GB内存＋16GB容量 手机 粉色</a>
                                                </p>
                                                <p class="price">768.00元 × 4</p>
                                            </li></ul>
                                    </td>
                        <td class="order-actions">
                            <a class="btn btn-small btn-primary" href="/order/pay?id=23" target="_blank">立即支付</a>
                            <!--<a class="btn btn-small btn-line-gray" href="user/orderView?id=23">订单详情</a>-->
                        </td></tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                    
                            </div>

                            <div id="Tokyo" class="tabcontent">
                              <h3>已付款</h3>
                              <p>Tokyo is the capital of Japan.</p>
                            </div>

                            <div id="aaa" class="tabcontent">
                              <h3>已收货</h3>
                              <p>aaa</p>
                            </div>

                            <div id="bbb" class="tabcontent">
                              <h3>待评价</h3>
                              <p>bbb</p>
                            </div>

                            <div id="ccc" class="tabcontent">
                              <h3>退款</h3>
                              <p>ccc</p>
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
<!-- <script src="/h/homes/common/myjs/common.js"></script> -->
@endsection