<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0022)http://mm.com/user.php -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Generator" content="ECSHOP v2.7.3">

    <meta name="Keywords" content="">
    <meta name="Description" content="">

    <title>小米官网</title>
    <link href="/h/homes/common/css/login.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="/h/homes/common/js/common.js"></script>
    <script type="text/javascript" src="/h/homes/common/js/user.js"></script>
</head>
<body>
<script type="text/javascript" src="/h/homes/common/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/h/homes/common/js/jquery.json.js"></script>
<script type="text/javascript" src="/h/homes/common/js/transport_jquery.js"></script>
<script type="text/javascript" src="/h/homes/common/js/utils.js"></script>
<script type="text/javascript" src="/h/homes/common/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="/h/homes/common/js/xiaomi_common.js"></script>




<div id="main" class="layout">
    <div class="nl-content">
        <div class="nl-logo-area">
            <a href="/"><img src="/h/homes/common/image/logo.gif" width="55"></a>
        </div>
        <h1 class="nl-login-title">一个帐号，玩转所有小米官网！</h1>
        <p class="nl-login-intro" style="color:#ff5340;">

        </p>
        <div id="login-box" class="nl-frame-container">
            <div class="ng-form-area show-place">
                <form action="/login/dologin" method="post">
                    @if (count($errors) > 0)
                        <div class="mws-form-message error" style="background-color:#ccc; color:red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{csrf_field()}}
                    <div class="shake-area">
                        <style type="text/css">
                            #error{
                                color: orangered;
                                text-align: center;
                            }
                        </style>
                        <div class="enter-area">
                            <input name="customername" type="text" class="enter-item first-enter-item" placeholder="用户名" style="height: 40px;">
                            <i class="placeholder">用户名</i>

                        </div>

                        <div class="enter-area">
                            <input name="customerpass" type="password" class="enter-item first-enter-item" placeholder="密码" style="height: 40px; margin-top: 15px;" >
                            <i class="placeholder">密码</i>
                        </div>
                    </div>
                
                    <input type="submit" name="submit" class="button orange" value="立即登录" style="margin-top:30px;">
                    <div class="ng-foot clearfix">
                        <div class="ng-link-area">
                            <span><a href="/login/password">忘记密码?</a></span>
                            <div class="third-area hide">
                                <a class="ta-weibo" target="_blank" href="http://mm.com/user.php?act=oath&amp;type=weibo" title="weibo">weibo</a>
                                <a class="ta-qq" target="_blank" href="http://mm.com/user.php?act=oath&amp;type=qq" title="qq">qq</a>
                                <a class="ta-alipay" target="_blank" href="http://mm.com/user.php?act=oath&amp;type=alipay" title="alipay">alipay</a>
                                <em class="corner"></em>
                                <em class="corner-inner"></em>
                            </div>
                        </div>
                    </div>
                    <a class="button" href="/register">注册小米官网</a>
                </form>
            </div>
        </div>
    </div>
    <div class="nl-footer">
        <div class="nl-f-nav">
            <p class="nl-f-copyright">©<a href="http://mm.com/user.php#">mi.com</a> 京ICP证110507号 京ICP备10046444号 京公网安备1101080212535号 <a href="http://mm.com/user.php#">京网文[2014]0059-0009号</a></p>
        </div>
    </div>



</div>

</body>
</html>