<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0035)http://mm.com/user.php?act=register -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="Generator" content="ECSHOP v2.7.3" />
    <meta name="Keywords" content="" />
    <meta name="Description" content="" />
    <title>小米官网</title>

    <link href="/h/homes/common/css/login.css" rel="stylesheet" type="text/css" />
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
<script>
    $(function(){

        //加载清空文本框
        $("input:text,input:password").val("");

        //提示文字隐藏显示效果
        //登录界面
        $(".enter-area .enter-item").focus(function(){
            if($(this).val().length==0){
                $(this).siblings(".placeholder").addClass("hide");
            }
        }).blur(function(){
            if($(this).val().length==0){
                $(this).siblings(".placeholder").removeClass("hide");
            }
        }).keyup(function(){
            if($(this).val().length>0){
                $(this).siblings(".placeholder").addClass("hide");
            }else{
                $(this).siblings(".placeholder").removeClass("hide");
            }
        });
        //注册界面
        $(".inputbg input").focus(function(){
            $('#error').remove();

            if($(this).val().length>0){
                $(this).parent().siblings(".t_text").addClass("hide");
            }
        }).blur(function(){
            if($(this).val().length==0){
                $(this).parent().siblings(".t_text").removeClass("hide");
            }
        }).keyup(function(){
            if($(this).val().length>0){
                $(this).parent().siblings(".t_text").addClass("hide");
            }else{
                $(this).parent().siblings(".t_text").removeClass("hide");
            }
        });

        //其它登录方式
        $("#other_method").click(function(){
            if($(".third-area").hasClass("hide")){
                $(".third-area").removeClass("hide");
            }else{
                $(".third-area").addClass("hide");
            }
        })
    })
</script>
<div class="register_wrap">
    <div class="bugfix_ie6 dis_none">
        <div class="n-logo-area clearfix">
            <a href="/" class="fl-l" style="margin-left: 450px"><img src="/h/homes/common/image/logo.gif" width="55" /></a>
        </div>
    </div>
    <div id="main">
        <div class="n-frame device-frame reg_frame">
            <div class="title-item dis_bot35 t_c">
                <h4 class="title-big">注册小米官网</h4>
            </div>
            <div class="regbox" id="register_box">
                    <style type="text/css">
                        #error{
                            color: orangered;
                            text-align: center;
                        }
                    </style>

                <form action="/register/create" method="post" name="formUser" onsubmit="return submitPwdInfo();">
                    @if (count($errors) > 0)
                        <div class="mws-form-message error" style="color: red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ csrf_field() }}
                    <div class="phone_step1">
                        <input type="hidden" id="sendtype" />
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="text" name="customername" id="username" placeholder="用户名" value="" />
                            </label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input name="customeremail" type="text" id="email" placeholder="email" value="" />
                            </label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input type="password" name="customerpass" placeholder="密码"  value="" />
                            </label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input name="recustomerpass" type="password" placeholder="确认密码" />
                            </label>
                        </div>
                        <div class="inputbg">
                            <label class="labelbox">
                                <input name="customerphone" type="text" id="phone" placeholder="手机号码" />
                            </label>
                        </div>
                        <div class="inputbg inputcode dis_box clearfix">
                            <label class="labelbox label-code">
                                <input type="text" class="code" name="code" placeholder="验证码" />
                                <a class="button" onClick="sendMobileCode();" id="sendMobileCode">
                                    <span id="dyMobileButton">获取</span>
                                </a>
                            </label>
                        </div>
                        <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
                        <div class="fixed_bot mar_phone_dis1">
                            <input name="Submit" type="submit" value="注册" class="btn332 btn_reg_1 submit-step" />
                        </div>
                        <div class="trig">
                            已有账号?
                            <a href="/login" class="trigger-box">点击登录</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="n-footer">
        <div class="nl-f-nav">
        </div>
        <p class="nf-intro"><span>&copy;<a href="http://mm.com/user.php?act=register#">mi.com</a> 京ICP证110507号 京ICP备10046444号 京公网安备1101080212535号 <a href="http://mm.com/user.php?act=register#">京网文[2014]0059-0009号</a></span></p>
    </div>
</div>
<script type="text/javascript">
    function sendMobileCode()
    {
        // 获取用户的验证码
        let phone = $('#phone').val();
        // 验证格式
        let phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;

        if (!phone_preg.test(phone)) {
            alert('请输入有效号码');
            return false;
        }

        $('#dyMobileButton').attr('disabled',true);
        $('#dyMobileButton').css('color','black');
        $('#dyMobileButton').css('cursor','no-drop');
        $('#dyMobileButton').css('color','#ccc');
        let time = null;

        if ($('#dyMobileButton').html() == "获取" ) {
            let i = 60;
            time = setInterval(function(){
                i--;
                $('#dyMobileButton').html('('+i+')s');
                if (i < 1) {
                    $('#dyMobileButton').attr('disabled',false);
                    // $('#dyMobileButton').css('color','#ccc');
                    $('#dyMobileButton').css('cursor','pointer');
                    $('#dyMobileButton').html('获取');
                    $('#dyMobileButton').css('color','black');
                    clearInterval(time);
                }
            },1000);

        // 发送Ajax  发送验证码
            $.get('/register/show',{phone},function(res){
                if (res.error_code == 0) {
                    alert('发送成功!');
                }else{
                    alert('发送失败!');
                }
            },'json');
        }
    }

</script>
</body>
</html>