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
            <span>我的密码</span>
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

                                    
                                    <li>
                                        <a href="/user/index">我的信息</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="box-bd">
                                <ul class="uc-nav-list">

                                    
                                    <li class="active">
                                        <a href="/user/index">修改密码</a>
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
                                <h1 class="title">修改密码</h1>
                            </div>
                            <div class="box-bd">

                                        <div class="personal-r f-r">
            <div class="personal-right">
  
                    <form class="mws-form" action="/user/newpass" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <div class="dt1">
                        <p class="dt-p f-l">原 密 码 ：<input id="myInput" name="pass" type="password" oninput="myFunction()" value="" /></p>
                            <div style="clear:both;"></div>
                    </div>

                    <div class="dt1">
                        <p class="dt-p f-l">新 密 码 ：<input id="myInput" name="newpass" type="password" oninput="myFunction()" value="" /></p>
                            <div style="clear:both;"></div>
                    </div>

                    <div class="dt1">
                        <p class="dt-p f-l">确认密码：<input id="myInput" name="newpasss" type="password" oninput="myFunction()" value="" /></p>
                            <div style="clear:both;"></div>
                    </div>
  
                    <input type="submit" id="baocun" style="display:none" class="btn btn-success" value="保存" />
                    </form>
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
<script>
function myFunction() {
    var x = document.getElementById("myInput").value;
    var baocun = document.getElementById("baocun");

    baocun.style.display = "inline";
    
}
    </script>


@endsection

@section('js')
<script src="/h/homes/common/myjs/jquery.min.js"></script>
<script src="/h/homes/common/js/address_all.js"></script>        
<script src="/h/homes/common/myjs/address.js"></script>
<script src="/h/data/indexNav.js"></script>
<script src="/h/data/indexData.js"></script>
<!-- <script src="/h/homes/common/myjs/common.js"></script> -->
@endsection
