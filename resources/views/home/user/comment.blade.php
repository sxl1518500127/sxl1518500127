@extends('home.layout.index')
@section('title','我的评论')
@section('css')
<link rel="stylesheet" href="/h/homes/common/css/base.min.css" />
<link rel="stylesheet" href="/h/homes/common/css/main.min.css" />
<link rel="stylesheet" href="/h/homes/common/css/address-edit.min.css" />
<style type="text/css">
    div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <a href='//www.mi.com/index.html'>首页</a>
            <span class="sep">&gt;</span>
            <span>商品评价</span>
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
                                    <li>
                                        <a href="/user/order">我的订单</a>
                                    </li>
                                    
                                    <li  class="active">
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
                <div class="span16">
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box">
                            <div class="box-hd">
                                <h1 class="title">商品评价</h1>
                            </div>

                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'London')">待评价商品</button>
                                <button class="tablinks" onclick="openCity(event, 'Paris')">已评价商品</button>
                            </div>

                            <div id="London" style="display:block" class="tabcontent">
                                @foreach($lists as $k=>$vv)
                                    @foreach($vv as $ke=>$v)
                                        @if($v->iscomment == "1")
                                        <li class="xm-goods-item">
                                            <div class="figure figure-img">
                                                <a href="/detail/{{$v->wid}}">
                                                    <img src="/uploads/{{$v->waresimgpath}}" />
                                                </a>
                                            </div>
                                            <h3 class="title">
                                                <a href="/detail/{{$v->wid}}">{{$v->waresname}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$v->specstr}}</a>
                                            </h3>
                                            <p class="price">{{$v->waresprice}}元</p>
                                            <div class="">
                                                <a class="btn btn-primary" data-gid="2161000055" href="/comment/comments/{{$v->id}}">去评价</a>
                                            </div>
                                        </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>

                            <div id="Paris" class="tabcontent">
                                @foreach($lists as $k=>$vv)
                                    @foreach($vv as $ke=>$v)
                                        @if($v->iscomment == "2")
                                        <li class="xm-goods-item">
                                            <div class="figure figure-img">
                                                <a href="/detail/{{$v->wid}}">
                                                    <img src="/uploads/{{$v->waresimgpath}}" />
                                                </a>
                                            </div>
                                            <h3 class="title">
                                                <a href="/detail/{{$v->wid}}">{{$v->waresname}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$v->specstr}}</a>
                                            </h3>
                                            <p class="price">{{$v->waresprice}}元</p>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script type="text/javascript">
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
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
<script src="/h/homes/common/myjs/common.js"></script>
@endsection
