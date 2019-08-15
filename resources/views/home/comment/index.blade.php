<!DOCTYPE html>
<!-- saved from url=(0051)http://order.mi.com/buy/checkout?r=80242.1469596349 -->
<html lang="zh-CN" xml:lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>回帖</title>
    <meta name="viewport" content="width=1226">

    <link type="text/css" rel="stylesheet" href="/h/homes/common/demo/css/application.css">
    <script type="text/javascript" src="/h/homes/common/demo/js/jquery.min.js"></script>
    <script type="text/javascript" src="/h/homes/common/lib/jquery.raty.min.js"></script>
    <link href="/h/homes/common//favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/h/homes/common/css/base.min.css">
    <link rel="stylesheet" type="text/css" href="/h/homes/common/css/checkout.min.css">
    <style type="text/css" media="screen">
        body{
            font-family: Tahoma;
        }
        textarea{
            width:450px;
            height: 210px;
            float:right;
            margin: 15px 100px;
            padding: 20px;
        }
        .goods-item{
            width:220px;
            height: 210px;
            float:left;
            margin: 15px ;

        }
        p:hover{
            color: #ff4f31;
        }
        p{
            font-weight: 800;
            font-size: 15px;
        }
        .title{
            float: left;
        }
        .demo{
            float: right;
            margin-top: 50px;
            margin-right: 250px;
        }
        .clear{
            clear: both;

        }
    </style>

</head>
<body>
<form action="/comment/insert" method="post">
                        {{ csrf_field() }}

    <div class="section section-goods">
        <div class="section-header clearfix">
            <h3 class="title">亲,留个评价吧!</h3> 
        </div>
        <div>
            <h2 class="title"><a href="" ></a></h2>
            <div class="demo">
                <div id="precision-demo" class="target-demo"></div>
                <div id="precision-hint" class="hint"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="section-body clearfix">
            @foreach($lists as $k=>$v)
            <div class="goods-item">
                <div class="figure figure-img"><a href="//item.mi.com/1152000033.html?cfrom=list">
                    <img src="/uploads/{{$v->waresimgpath}}" width="200" height="200" alt=""></a>
                </div>
            </div>
                <?php
                    $a =explode(',',$v->specstr);
                 ?>
            <div class="goods-item">
                <p class="desc">价格: {{$v->waresprice}}</p>
                <p class="desc">型号: {{$a[0]}}</p><p></p>
                <p class="desc">颜色: {{$a[1]}}</p>
            </div>

            <ul class="goods-list clearfix" id="J_goodsList">
                <textarea name="commentstr" title="">外形如何,使用如何,写下您的感受吧...</textarea>
            </ul>
        @endforeach

        </div>
    </div>
    <input type="hidden" name="wid" value="{{$v->wid}}">
    <div class="section-bar clearfix">
        <div class="fr">
            <button href="" class="btn btn-primary" id="J_checkoutToPay" data-stat-id="4773f7ffc10003b8" >发表评论
            </button>
        </div>
    </div>
</form>
</body>

<script type="text/javascript">
    $(function() {



        $.fn.raty.defaults.path = '/h/homes/common/lib/img';

        $('#precision-demo').raty({
            path      : '/h/homes/common/demo/img',
            cancelOff : 'cancel-off-big.png',
            cancelOn  : 'cancel-on-big.png',
            size      : 24,
            starHalf  : 'star-half-big.png',
            starOff   : 'star-off-big.png',
            starOn    : 'star-on-big.png',
            target    : '#precision-hint',
            cancel    : true,
            targetKeep: true,

            precision : true
        });

        $('#space-demo').raty({ space: false });

        $('#single-demo').raty({ single: true });

        $('#function-demo').raty({
            path      : 'demo/img',
            cancelOff : 'cancel-off-big.png',
            cancelOn  : 'cancel-on-big.png',
            size      : 24,
            starHalf  : 'star-half-big.png',
            starOff   : 'star-off-big.png',
            starOn    : 'star-on-big.png',
            target    : '#function-hint',
            cancel    : true,
            targetKeep: true,
            precision : true,
            click: function(score, evt) {
                alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt.type);
            }
        });

        $('#score-action').on('click', function() {
            $('#function-demo').raty('score', $('#score-function-demo').val());
        });

        $('#click-action').on('click', function() {
            $('#function-demo').raty('click', $('#click-function-demo').val());
        });

        $('#readOnly-action').on('click', function() {
            var isReadOnly = $('#readOnly-function-demo').val() === 'true' ? true : false;

            $('#function-demo').raty('readOnly', isReadOnly);
        });

        $('#cancel-action').on('click', function() {
            var isTrigger = $('#cancel-function-trigger-demo').val() === 'true' ? true : false;

            $('#function-demo').raty('cancel', isTrigger);
        });

        $('#reload-action').on('click', function() {
            $('#function-demo').raty('reload');
        });

        $('#score-get-action').on('click', function() {
            alert('score: ' + $('#function-demo').raty('score'));
        });

        $('#score-set-action').on('click', function() {
            var score = $('#score-set-function-demo').val();

            $('#function-demo').raty('score', score);
        });

        $('#set-action').on('click', function() {
            var options = $('#set-function-demo').val(),
                    command = "$('#function-demo').raty('set', " + options + ");";

            eval(command);
        });

        $('#destroy-action').on('click', function() {
            $('#function-demo').raty('destroy');
        });
    });
</script>