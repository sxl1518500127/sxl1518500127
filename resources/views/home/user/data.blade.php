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
            <span>我的信息</span>
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
                        <div class="uc-content-box">
                            <div class="box-hd">
                                <h1 class="title">我的信息</h1>
                            </div>
                            <div class="box-bd">

                                <div class="personal-r f-r">
                                    <div class="personal-right">
                                        <div class="personal-r-tit">
                                            <h3>个人资料 <b style="color:red">(*点击需要修改的个人信息即可修改个人信息)</b> </h3>
                                        </div>


                                            <form class="mws-form" action="/user/store" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                当前头像：
                                                    <label>
                                                        <input title="更改头像" value="/uploads/{{$user->customerphoto}}" style="position:absolute;opacity:0;" type="file" oninput="myFunction()" name="tupian" id="" class="img1" />
                                                        <img style="width: 100px;height: 100px;" src="/uploads/{{$user->customerphoto}}">
                                                    <label>

                                                    <div style="clear:both;"></div>
                                                <div style="clear:both;"></div>
                                            <div class="dt1">
                                                <p class="dt-p f-l">昵称：<input style="border:none;" id="myInput" name="customernickname" oninput="myFunction()" type="text" value="{{$user->customernickname}}" /></p>
                                                    <div style="clear:both;"></div>
                                            </div>
                                            <div class="dt1">
                                                <p class="dt-p f-l">用户名：<input style="border:none;" name="customername" type="text" oninput="myFunction()" value="{{$user->customername}}" /></p>
                                                    <div style="clear:both;"></div>
                                            </div>
                                            <div class="dt1 dt2">
                                                <p class="dt-p f-l">性别：
                                                    <!-- 判断性别 -->
                                            @if(empty($user->customersex))
                                                <input type="radio" checked="checked" name="customersex" value="1"></input><span>男</span>
                                                <input type="radio" name="customersex" value="2"></input><span>女</span></p>   <p style="color:red">*性别只能修改一次(请慎重选择)</p>
                                            @else
                                                @if($user->customersex == 1)
                                                    男 <input type="hidden" checked="checked" name="customersex" value="1"></input> 
                                                @else
                                                    女 <input type="hidden" checked="checked" name="customersex" value="2"></input>
                                                @endif
                                            @endif
                                                <div style="clear:both;"></div>
                                            </div>
                                            <div class="dt1">
                                                <p class="dt-p f-l">生日： <input style="border:none;" name="customerbirthday" oninput="myFunction()" type="date" value="{{$user->customerbirthday}}" /></p>
                                               
                                                <div style="clear:both;"></div>
                                            </div>
                                            <div class="dt1 dt3">
                                                <p class="dt-p f-l">手机号：<input style="border:none;" name="customerphone" oninput="myFunction()" type="text" value="{{$user->customerphone}}" /></p>
                                                <div style="clear:both;"></div>
                                            </div>
                                            <div class="dt1">
                                                <p class="dt-p f-l">邮箱： <input style="border:none;width:200px" name="customeremail" oninput="myFunction()" type="text" value="{{$user->customeremail}}" /></p>
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
@endsection
