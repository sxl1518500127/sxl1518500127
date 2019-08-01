@extends('home.layout.index')
@section('title','我的信息')
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
            <span>收货地址</span>
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
                                        <a href="/user/comment">评价晒单</a>
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

                                    
                                    <li class="active">
                                        <a href="/user/index">我的信息</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="span16">
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box">
                            <div class="box-hd">
                                <h1 class="title">我的信息</h1>
                            </div>
                            <div class="box-bd">

                                        <div class="personal-r f-r">
            <div class="personal-right">
                <div class="personal-r-tit">
                    <h3>个人资料</h3>
                </div>
                    <div class="dt1">
                        <p class="f-l">当前头像：</p>
                        <div class="touxiang f-l">
                            <div class="tu f-l">
                                <a href="#">
                                    <p><img width="100px" src="/h/image/upload/47841801564104291.jpg" /></p>
                                    <input type="file" name="" id="" class="img1" />
                                </a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">昵称：<input style="border:none;" type="text" placeholder="RH了" /></p>
                            <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">用户名：<input style="border:none;" type="text" value="zhao601884596" /></p>
                            <div style="clear:both;"></div>
                    </div>
                    <div class="dt1 dt2">
                        <p class="dt-p f-l">性别：
                        <input type="radio" name="hobby" value="nan"></input><span>男</span>
                        <input type="radio" name="hobby" value="nan"></input><span>女</span></p>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">年龄： <input style="border:none;" type="text" value="20" /></p>
                       
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1 dt3">
                        <p class="dt-p f-l">手机号：<input style="border:none;" type="text" value="12345678910" /></p>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="dt1">
                        <p class="dt-p f-l">邮箱： <input style="border:none;" type="text" value="601884596@qq.com" /></p>
                        <div style="clear:both;"></div>
                    </div>  
                    <button class="btn-pst">保存</button>
                </div>
            </div>
        </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="J_modalEditAddress" class="modal fade modal-hide modal-edit-address">
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="/h/homes/common/myjs/jquery.min.js"></script>
<script src="/h/homes/common/js/address_all.js"></script>        
<script src="/h/homes/common/myjs/address.js"></script>
<script src="/h/data/indexNav.js"></script>
<script src="/h/data/indexData.js"></script>
<script src="/h/homes/common/myjs/common.js"></script>
@endsection
