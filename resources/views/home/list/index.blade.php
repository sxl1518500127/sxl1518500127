@extends('home.layout.index')

@section('css')
    <link rel="shortcut icon" href="/h/homes/common/img/favicon.ico" />
    <link href="/h/homes/common/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/h/homes/common/css/category.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="/h/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/h/homes/common/css/base.min.css" />
    <script type="text/javascript" src="/h/homes/common/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/jquery.json.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/common.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/global.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/easydialog.min.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/compare.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/transport_jquery.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/utils.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/jquery.SuperSlide.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/xiaomi_common.js"></script>
@endsection

@section('content')
<script type="text/javascript" src="/h/homes/common/js/xiaomi_category.js"></script>

<div class="breadcrumbs">
    <div class="container">
        <a href="http://mm.com/">首页</a>
        <code>&gt;</code>
        <a href="http://mm.com/category.php?id=69">购买手机</a>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="order-list-box clearfix">
            <form method="GET" name="listform">
                <ul class="order-list">
                    <li class="first active"><a title="销量" href="" class="curr" rel="nofollow"><span class="search_DESC">销量</span>&nbsp;<i class="iconfont"></i></a></li>
                    <li class=""><a title="价格" href="" rel="nofollow"><span class="">价格</span></a></li>
                    <li class=""><a title="上架时间" href="" rel="nofollow"><span class="">上架时间</span></a></li>
                    <input type="hidden" name="category" value="69" />
                    <input type="hidden" name="display" value="grid" id="display" />
                    <input type="hidden" name="brand" value="0" />
                    <input type="hidden" name="price_min" value="0" />
                    <input type="hidden" name="price_max" value="0" />
                    <input type="hidden" name="filter_attr" value="0" />
                    <input type="hidden" name="page" value="1" />
                    <input type="hidden" name="sort" value="sales_volume" />
                    <input type="hidden" name="order" value="DESC" />
                </ul>
            </form>
        </div>
        <div  class="clearfix">
            <form name="compareForm" action="" method="post" enctype="multipart/form-data" >
                @foreach($lists as $k=>$v)
                <div class="goods-list-box"> 
                    <div class="goods-item" style="width:292px;">
                        <div class="figure figure-img">
                            <a href="/detail/{{ $v->id }}"><img src="/uploads/{{ $v->waresimgpath }}" class="goodsimg" /></a>
                        </div>
                        <p class="price">￥<font class="shop_s"><em>{{ $v->waresprice }}</em></font></p>
                        <p class="">{{ $v->waresname }}</p>
                        <p class="desc">已销售{{ $v->waressellcount }}部</p>
                        <div class="actions clearfix">
                            <a href="javascript:collect(82);" class="btn-like J_likeGoods"><i class="iconfont"></i> <span>收藏</span></a>
                            <a href="javascript:addToCart(82)" class="btn-buy J_buyGoods"><span>购买</span> <i class="iconfont"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </form>
        </div>

        <script type="Text/Javascript" language="JavaScript">
            function selectPage(sel)
            {
                sel.form.submit();
            }
        </script>
        <script type="text/javascript">
            window.onload = function()
            {
                Compare.init();
                fixpng();
            }
            var button_compare = '';
            var exist = "您已经选择了%s";
            var count_limit = "最多只能选择4个商品进行对比";
            var goods_type_different = "\"%s\"和已选择商品类型不同无法进行对比";
            var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
            var btn_buy = "购买";
            var is_cancel = "取消";
            var select_spe = "请选择商品属性";
        </script>
        <script type="Text/Javascript" language="JavaScript">
            function selectPage(sel)
            {
                sel.form.submit();
            }
        </script>
    </div>
</div>
<div class="add_ok" id="cart_show">
    <div class="tip">
        <i class="iconfont"> </i>商品已成功加入购物车
    </div>
    <div class="go">
        <a href="javascript:easyDialog.close();" class="back">&lt;&lt;继续购物</a>
        <a href="http://mm.com/flow.php" class="btn">去结算</a>
    </div>
</div>
@endsection


