@extends('home.layout.index')
@section('title','我的评论')
@section('css')
<link rel="stylesheet" href="/h/homes/common/css/base.min.css" />
<link rel="stylesheet" href="/h/homes/common/css/main.min.css" />
<link rel="stylesheet" href="/h/homes/common/css/address-edit.min.css" />
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

                <div class="span16">
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box">
                            <div class="box-hd">
                                <h1 class="title">商品评价</h1>
                                <div class="more clearfix">
                                    <ul class="filter-list J_addrType">
                                        <li class="first ">
                                            <a href="/user/comment?filter=1">待评价商品（）</a>
                                        </li>
                                        <li class=" ">
                                            <a href="/user/comment?filter=2">已评价商品（）</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-bd">
                                <div class="xm-goods-list-wrap">
                                    <ul class="xm-goods-list clearfix">
                                            <li>
                                            暂无数据
                                            </li>
                                        <li class="xm-goods-item">
                                            <div class="figure figure-img">
                                                <a href="/detail?id=" target="_blank">
                                                    <img src="" />
                                                </a>
                                            </div>
                                            <h3 class="title">
                                                <a href="/detail?id"></a>
                                            </h3>
                                            <p class="price">元</p>
                                            <p class="rank">人评价</p>
                                            <div class="actions">
                                                <a class="btn btn-primary btn-small J_btnComment" data-gid="2161000055" href="/comment?id=&order_id=">去评价</a>
                                            </div>
                                        </li>
                                      
                                            <li>
                                            暂无数据
                                            </li>
                          
                                        <li class="xm-goods-item">
                                            <div class="figure figure-img">
                                                <a href="/detail?id" target="_blank">
                                                    <img src="" />
                                                </a>
                                            </div>
                                            <h3 class="title">
                                                <a href="/detail?id"></a>
                                            </h3>
                                            <p class="price">元</p>
                                            <p class="rank">人评价</p>
                                        </li>
                             
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
<script src="/h/homes/common/myjs/jquery.min.js"></script>
<script src="/h/data/indexNav.js"></script>
<script src="/h/data/indexData.js"></script>
<script src="/h/homes/common/myjs/common.js"></script>
@endsection
