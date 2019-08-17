<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="/h/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="/h/homes/common/css/base.min.css" />
<link rel="stylesheet" href="/h/homes/common/css/cart.min.css" />
<script src="/h/homes/common/myjs/jquery.min.js"></script>
<script src="/h/homes/common/myjs/cart.js"></script>
<script>
    var listItem = [{{$listItem}}];
</script>

<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a class="logo ir" href="/" title="小米官网" data-stat-id="f4006c1551f77f22" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f4006c1551f77f22', '//www.mi.com/index.html', 'pcpid']);">小米官网</a>
        </div>
        <div class="header-title has-more" id="J_miniHeaderTitle">
            <h2>我的购物车</h2>
            <p>温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</p>
        </div>
        @if(empty($_SESSION["home_login"]))
        <div class="topbar-info" id="J_userInfo">
            <a  rel="nofollow" class="link" href="/login" data-needlogin="true">登录</a>
            <span class="sep">|</span>
            <a  rel="nofollow" class="link" href="/register" >注册</a>
        </div>
        @else
        <div class="topbar-info" id="J_userInfo">
            <span class="user">
                <a rel="nofollow" class="user-name" href="/user/index" target="_blank">
                    <span class="name">{{$_SESSION["home_userinfo"]->customername}}</span> <i class="iconfont"></i>
                </a>
                <ul class="user-menu" style="display: none;">
                    <li>
                        <a rel="nofollow" href="/portal">个人中心</a>
                    </li>
                    <li>
                        <a rel="nofollow" href="/user/comment" target="_blank">评价晒单</a>
                    </li>
                    <li>
                        <a rel="nofollow" href="/user/logout">退出登录</a>
                    </li>
                </ul>
            </span>
            <span class="sep">|</span>
            <a rel="nofollow" class="link link-order" href="/user/order/" target="_blank">我的订单</a>
        </div>
        @endif
    </div>
</div>
<div class="page-main">

    <div class="container">
        <div class="cart-loading loading hide" id="J_cartLoading">
            <div class="loader"></div>
        </div>

        @if(empty($_SESSION["car"]))
            <div class="cart-empty @if(empty(session('uid'))) cart-empty-nologin @endif" id="J_cartEmpty">
                <h2>您的购物车还是空的！</h2>
                <p class="login-desc">登录后将显示您之前加入的商品</p>
                @if(empty($_SESSION["home_login"]))
                <a href="/login" class="btn btn-primary btn-login" id="J_loginBtn">立即登录</a>
                @endif
                <a href="/" class="btn btn-primary btn-shoping J_goShoping" >马上去购物</a>
            </div>
        @else
        <div id="J_cartBox" class="">
            <div class="cart-goods-list">
                <div class="list-head clearfix">
                    <div class="col col-check"> <i class="iconfont icon-checkbox icon-checkbox-selected" id="J_selectAll">√</i>
                        全选
                    </div>
                    <div class="col col-img">&nbsp;</div>
                    <div class="col col-name">商品名称</div>
                    <div class="col col-price">单价</div>
                    <div class="col col-num">数量</div>
                    <div class="col col-total">小计</div>
                    <div class="col col-action">操作</div>
                </div>
                <div class="list-body" id="J_cartListBody">
                    @foreach($data as $value)
                        <div class="item-box" data-cid="{{$value->id}}">
                            <div class="item-table J_cartGoods" data-sid="{{$value->id}}" >
                                <div class="item-row clearfix">
                                    <div class="col col-check"> <i class="iconfont icon-checkbox icon-checkbox-selected J_itemCheckbox">√</i>
                                    </div>
                                    <div class="col col-img">
                                        <a href="/detail/{{$value->id}}" target="_blank">
                                            <img alt="" src="/uploads/{{$value->waresimgpath}}" width="80" height="80"></a>
                                    </div>
                                    <div class="col col-name">
                                        <div class="tags"></div>
                                        <h3 class="name">
                                            <a href="/detail/{{$value->id}}" target="_blank">{{$value->waresname}}</a>
                                        </h3>
                                    </div>
                                    <div class="col col-price">{{$value->waresprice}}元</div>
                                    <div class="col col-num">
                                        <div class="change-goods-num clearfix J_changeGoodsNum">
                                            <!-- <a href="/home/jnum?id={{$value->id}}" class="J_minus"> -->
                                            <a href="javascript:void(0)" class="J_minus">
                                                <i class="iconfont"></i>
                                            </a>
                                            <input tyep="text" name="{{$value->id}}" value="{{$value->num}}"  autocomplete="off" class="goods-num J_goodsNum">
                                            <!-- <a href="/home/addnum?id={{$value->id}}" class="J_plus"> -->
                                            <a href="javascript:void(0)" class="J_plus">
                                                <i class="iconfont"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col col-total">
                                        {{$value->xiaoji}}元
                                        <p class="pre-info"></p>
                                    </div>
                                    <div class="col col-action">
                                        <a id="2151900016_0_buy" data-msg="确定删除吗？" href="javascript:void(0);" title="删除" class="del J_delGoods">
                                            <i class="iconfont"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="cart-bar clearfix" id="J_cartBar">
                <div class="section-left">
                    <a href="/" class="back-shopping J_goShoping"  >继续购物</a>
                    @if(empty($_SESSION["home_login"]))
                    <span class="total-price">
                        <a href="/home/login">
                          未登录,不能下订单和保存商品数量哦!
                        </a>
                    </span>
                    @endif
                </div>

                <span class="total-price">
                    合计（不含运费）： <em id="J_cartTotalPrice">{{$priceCount}}</em>
                    元
                </span>
                 @if(empty($_SESSION["home_login"]))

                <a href="/login" class="btn btn-a btn btn-primary btn-disabled" id="J_goCheckout">去结算</a>

                @else
                <a href="javascript:void(0);" class="btn btn-a btn btn-primary" id="J_goCheckout">去结算</a>
                @endif
                <div class="no-select-tip hide" id="J_noSelectTip">
                    请勾选需要结算的商品
                    <i class="arrow arrow-a"></i>
                    <i class="arrow arrow-b"></i>
                </div>
            </div>
        </div>

        @endif
        <div class="cart-recommend hide" id="J_historyRecommend"></div>
        <div class="cart-recommend container" id="J_miRecommendBox">
            <h2 class="xm-recommend-title">
                <span>商品推荐</span>
            </h2>
            <div class="xm-recommend">
                <ul class="row" data-carousel-list="true">
                    <li class="J_xm-recommend-list span4">
                        <dl>
                            <dt>
                                <a href="//item.mi.com/1154000008.html" >
                                    <img src="" width="120" alt="米家小白智能摄像机"></a>
                            </dt>
                            <dd class="xm-recommend-name">
                                <a href="//item.mi.com/1154000008.html"></a>
                            </dd>
                            <dd class="xm-recommend-price">元</dd>
                            <dd class="xm-recommend-tips">
                                592人好评
                            </dd>
                            <dd class="xm-recommend-notice"></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
