@extends('home.layout.index')
@section('title','我的地址')
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
                                        <a href="/user/show">我的订单</a>
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
                        </div>


                    </div>
                </div>

                <div class="span16">
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box">
                            <div class="box-hd">
                                <h1 class="title">收货地址</h1>
                            </div>
                            <div class="box-bd">

                                <div class="user-address-list J_addressList clearfix">
                                    <div class="address-item address-item-new" data-type="" id="J_newAddress"> <i class="iconfont">&#xe609;</i>
                                        添加新地址
                                    </div>
                                    <div class="address-item J_addressItem" 
                                     data-address_id=''
                                     data-consignee=''
                                     data-tel=''
                                     data-province_name=''
                                     data-city_name=''
                                     data-district_name=''
                                     data-address=''
                                    >
                                        <dl>
                                            <dt>
                                                <span class="tag"></span> <em class="uname"></em>
                                            </dt>
                                            <dd class="utel"></dd>
                                            <dd class="uaddress">
                                                <br></dd>
                                        </dl>
                                        <div class="actions">
                                            <!-- <a href="javascript:void(0);" data-id="" class="modify J_addressModify">修改</a> --><a href="javascript:void(0);" class="modify J_addressDel">删除</a>
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
