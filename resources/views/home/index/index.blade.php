@extends('home.layout.index')
@section('myCss')
<link rel="stylesheet" href="/h/homes/common/css/index.min.css" />
@show
@section('content')
   <div class="header-nav">
        <ul class="nav-list J_navMainList clearfix">
            <li id="J_navCategory" class="nav-category">

            <!-- start banner_y -->
                <div style="  position: absolute;left:445px;z-index:1000" class="banner_y center">
                    <div class="nav">
                        <ul>
                            @foreach($data as $k=>$v)
                            <li>

                                <a href="">{{ $v->goodsmod }}</a>

                                <div class="pop">

                                    <div style="border:1px solid red;width:100px" class="left fl pull-left">
                                    @foreach($erji as $kk=>$vv)

                                        @if($v->id == $kk)
                                            @foreach($vv as $er)
                                                <div style="border:1px solid pink;width:500px;height:200px">
                                                    
                                                    <span >{{$er->goodsmod}}</span>
                                                    @foreach($sanji as $kkk => $san)
                                                        @if($er->id == $kkk)
                                                        <p>
                                                            @foreach($san as $kkkk => $sano)
                                                                <div style="width:230px;border:1px solid pink;">
                                                                    <div class="xuangou_left fl">
                                                                        <a href="liebiao.html">
                                                                            <span class="fl">{{$sano->waresname}}</span>
                                                                            <div class="clear"></div>
                                                                        </a>
                                                                    </div>

                                                                    <div class="xuangou_right fr"><a href="xiangqing.html" >选购</a></div>
                                                                    <div class="clear"></div>
                                                                    
                                                                </div>
                                                            @endforeach
                                                        </p>
                                                        
                                                        @endif
                                                    @endforeach

                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach

                                    </div>

                                   
                                    <div class="clear"></div>

                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>  
            <!-- end banner -->
            </li>
        </ul>
    </div>


    <div class="home-hero-container container">
        <div class="home-hero">
            <div class="home-hero-slider">
                <div class="ui-wrapper" style="max-width: 100%;">
                    <div class="ui-viewport" style="width: 100%; overflow: hidden; position: relative; height: 460px;">
                        <div id="J_homeSlider" class="xm-slider" data-stat-title="焦点图轮播" style="width: auto; position: relative;">
                            <div class="slide loaded">
                                <a href="/" >
                                   <img src="http://i3.mifile.cn/a4/3df93b73-1f38-41dc-9c19-c6feb05c9cc1" srcset="http://i3.mifile.cn/a4/20c8359e-6e5e-46e1-a017-b2308d9fbbae 2x"></a>
                            </div>

                            <div class="slide loaded">
                                <a href="/" >
                                    <img src="http://i3.mifile.cn/a4/8ebfdc81-ace7-4bfb-b07a-409e17d6d3cf" srcset="http://i3.mifile.cn/a4/5de4e2bb-54fe-45b1-a399-d5b26f106f82 2x"></a>
                            </div>

                            <div class="slide loaded">
                                <a href="/" >
                                    <img src="http://i3.mifile.cn/a4/eadf8c22-c83d-446b-ac04-b3ce72078388" srcset="http://i3.mifile.cn/a4/b3642c09-0d31-49e0-a011-7934fa395697 2x"></a>
                            </div>

                            <div class="slide loaded">
                                <a href="/" >
                                    <img src="http://i3.mifile.cn/a4/c5688819-4791-4b8f-b13e-2d29718f0ed6" srcset="http://i3.mifile.cn/a4/f779d9d8-caac-4f12-8b9c-3032f3daf8e1 2x"></a>
                            </div>

                            <div class="slide loaded">
                                <a href="/" >
                                    <img src="http://i3.mifile.cn/a4/9ea4cb98-3628-4384-bdb1-21646222a53a" srcset="http://i3.mifile.cn/a4/efaf715f-a1cc-4942-a24d-41f7d73e7ff5 2x"></a>
                            </div>

                        </div>
                    </div>
                    <div class="ui-controls-direction">
                        <a class="ui-prev" href="javascript:void(0);">上一张</a>
                        <a class="ui-next" href="javascript:void(0);">下一张</a>
                    </div>
                    <div class="ui-controls ui-has-pager ui-has-controls-direction">
                        <div class="ui-pager ui-default-pager">
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link">1</a>
                            </div>
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link">2</a>
                            </div>
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link">3</a>
                            </div>
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link active">4</a>
                            </div>
                            <div class="ui-pager-item">
                                <a href="javascript:void(0);" class="ui-pager-link">5</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home-hero-sub row">
                <div class="span4">
                    <ul class="home-channel-list clearfix">
                        <li class="top left">
                            <a href="/" data-stat-aid="AA11221" data-stat-pid="2_44_1_250" target="_blank"> <i class="iconfont">&#xe640;</i>
                                电信专场
                            </a>
                        </li>
                        <li class="top">
                            <a href="/" data-stat-aid="AA10868" data-stat-pid="2_44_2_251" target="_blank">
                                <i class="iconfont">&#xe63e;</i>
                                企业团购
                            </a>
                        </li>
                        <li class="top">
                            <a href="/" data-stat-aid="AA10869" data-stat-pid="2_44_3_252" target="_blank">
                                <i class="iconfont">&#xe63b;</i>
                                官翻产品
                            </a>
                        </li>
                        <li class="left">
                            <a href="/" data-stat-aid="AA11244" data-stat-pid="2_44_4_253" target="_blank">
                                <i class="iconfont"></i>
                                小米移动
                            </a>
                        </li>
                        <li class="">
                            <a href="/" data-stat-aid="AA12084" data-stat-pid="2_44_5_254" target="_blank">
                                <i class="iconfont"></i>
                                以旧换新
                            </a>
                        </li>
                        <li class="">
                            <a href="/" data-stat-aid="AA10871" data-stat-pid="2_44_6_255" target="_blank">
                                <i class="iconfont"></i>
                                话费充值
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="span16" id="J_homePromo" data-stat-title="焦点图下方小图">
                    <ul class="home-promo-list clearfix">
                        <li class="first">
                            <a class="item" href="/" data-stat-aid="AA13327" data-stat-pid="2_16_1_77" target="_blank">
                                <img alt="米兔儿童手表-0720" src="http://i3.mifile.cn/a4/bcd96601-1406-4716-8258-975a90e8a706"/>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="/" data-stat-aid="AA13313" data-stat-pid="2_16_2_78" target="_blank">
                                <img alt="小米手机5-0720" src="http://i3.mifile.cn/a4/699590cf-1eec-4cbb-84e7-3db5d965bb0d" srcset="http://i3.mifile.cn/a4/cfd68741-d5d4-43aa-9ca9-f71b85483976 2x" />
                            </a>
                        </li>
                        <li>
                            <a class="item" href="/" data-stat-aid="AA13314" data-stat-pid="2_16_3_79" target="_blank">
                                <img alt="红米Note3-0720" src="http://i3.mifile.cn/a4/dc80da21-68df-4d2a-9b3f-3bbea5b539a4" srcset="http://i3.mifile.cn/a4/11f55f19-4011-4e67-be32-d245745c57ea 2x" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="home-star-goods" id="J_homeStar">
            <div class="xm-plain-box">
                <div class="box-hd">
                    <h2 class="title">小米明星单品</h2>
                    <div class="more">
                        <div class="xm-controls xm-controls-line-small xm-carousel-controls">
                            <a class="control control-prev iconfont" href="javascript: void(0);"></a>
                            <a class="control control-next iconfont" href="javascript: void(0);"></a>
                        </div>
                    </div>
                </div>
                <div class="box-bd">
                    <ul class="xm-carousel-list xm-carousel-col-5-list goods-list rainbow-list clearfix J_carouselList">
                    <!--这里遍历开始 -->
                        @foreach($goodstar as $k=>$v)
                        
                        <li class="rainbow-item">
                            <a class="thumb" href="/detail/{{ $v->id }}">
                                <img src="uploads/{{ $v->waresimgpath }}" srcset="" alt="" />
                            </a>
                            <h3 class="title">
                                <a href="/detail/{{ $v->id }}"></a>
                            </h3>
                            <p class="desc">{{$v->waresname}}</p>
                            <p class="price">{{$v->waresprice}}</p>
                        </li>
                        @endforeach

                        <li class="rainbow-item">
                            <a class="thumb" href="/detail/"  target="_blank">
                                <img src="" srcset="" alt="" />
                            </a>
                            <h3 class="title">
                                <a href="/detail" target="_blank"></a>
                            </h3>
                            <p class="desc">更多</p>
                            <p class="price">更多</p>
                        </li>
                        
                    <!--  这里遍历结束  -->
                        <li class="rainbow-item">
                            <a class="thumb" href="/datail"  target="_blank">
                                <img src="http://i3.mifile.cn/a4/40d24892-317d-4883-ad63-647f1b9e3cdf" srcset="" alt="" />
                            </a>
                            <h3 class="title">
                                <a href="/datail" target="_blank"></a>
                            </h3>
                            <p class="desc"></p>
                            <p class="price">更多...</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page-main home-main">
        <div class="container">
            <div id="smart" class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox" data-from-stat="false">
                <div class="box-hd">
                    <h2 class="title">智能硬件</h2>
                    <div class="more J_brickNav"></div>
                </div>
                <div class="box-bd J_brickBd">
                    <!-- 智能硬件 start-->
                    <div class="row">
                        <div class="span4 span-first">
                            <ul class="brick-promo-list clearfix">
                                <li class="brick-item brick-item-l brick-item-active">
                                    <a href="/" data-stat-aid="AA13253" data-stat-pid="2_18_1_90" target="_blank" data-stat-id="AA13253+2_18_1_90" onclick="_msq.push(['trackEvent', '79fe2eae924d2a2e-AA13253+2_18_1_90', '//www.mi.com/scooter/', 'pcpid']);">
                                        <img src="http://i3.mifile.cn/a4/124d82cc-cfce-44ab-b711-28b21be81683" width="160" height="160" alt=""></a>
                                </li>
                            </ul>
                        </div>
                        <div class="span16">
                            <ul class="brick-list clearfix">
                                @foreach($goods as $k=>$v)
                                        @if($k > 5)
                                        <li class="brick-item brick-item-m brick-item-m-2" data-gid="1161200059">
                                            @if($_SESSION)
                                            <a href="/user/attentions/{{$v->id}}" class="btn-like J_likeGoods" data-cid="1160800057" onclick="return false;" data-stat-id="ff751b1fdf797192" >
                                                <a href="/user/attentions/{{$v->id}}"><i class="iconfont"></i></a>
                                            </a>
                                            @endif
                                            <div class="figure figure-img">
                                                <a href="/detail/{{ $v->id }}">
                                                    <img src="uploads/{{ $v->waresimgpath }}" width="160" height="160" alt=""></a>
                                            </div>
                                            <h3 class="title">
                                                <a href="/detail/{{ $v->id }}">{{ $v->waresname }}</a>
                                            </h3>
                                            <p class="desc"></p>
                                            <p class="price">
                                                <span class="num">{{ $v->waresprice }}</span>
                                                元
                                            </p>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                <!-- 智能硬件 end-->
                </div>
            </div>

            <div id="video" class="home-video-box xm-plain-box J_itemBox J_videoBox is-visible">
                <div class="box-hd">
                    <h2 class="title">视频</h2>
                    <div class="more J_brickNav">

                    </div>
                </div>
                <div class="box-bd J_brickBd">
                    <!-- 视频 start -->
                    <ul class="video-list clearfix">
                        <li class="video-item video-item-first">
                            <div class="figure figure-img">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA12841" data-stat-pid="2_43_1_245" data-video="http://player.youku.com/embed/XMTU2NDM3NjEzMg==" data-video-title="小米Max 绝美外观视频" >
                                    <img src="//i3.mifile.cn/a4/T1v3LgBTxv1RXrhCrK.jpg" width="296" height="180" alt="小米Max 绝美外观视频">
                                    <span class="play"> <i class="iconfont"></i>
                                    </span>
                                </a>
                            </div>
                            <h3 class="title">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA12841" data-stat-pid="2_43_1_245" data-video="http://player.youku.com/embed/XMTU2NDM3NjEzMg==" data-video-title="小米Max 绝美外观视频" >小米Max 绝美外观视频</a>
                            </h3>
                            <p class="desc">6.44" 大屏黄金尺寸，看什么都震撼</p>
                        </li>
                        <li class="video-item">
                            <div class="figure figure-img">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA13049" data-stat-pid="2_43_2_246" data-video="http://player.youku.com/embed/XMTU5ODI2NzMyMA==" data-video-title="手机摄影，防抖绷带（教程）" title="点击播放视频" >
                                    <img src="http://i3.mifile.cn/a4/66cbfd29-8e48-4ed1-aee0-e0e46f4cdc8b" width="296" height="180" alt="手机摄影，防抖绷带（教程）">
                                    <span class="play"> <i class="iconfont"></i>
                                    </span>
                                </a>
                            </div>
                            <h3 class="title">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA13049" data-stat-pid="2_43_2_246" data-video="http://player.youku.com/embed/XMTU5ODI2NzMyMA==" data-video-title="手机摄影，防抖绷带（教程）" data-stat-id="AA13049+2_43_2_246">手机摄影，防抖绷带（教程）</a>
                            </h3>
                            <p class="desc">一分钟，拍照手抖迅速见效</p>
                        </li>
                        <li class="video-item">
                            <div class="figure figure-img">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA12771" data-stat-pid="2_43_3_247" data-video="http://player.youku.com/embed/XMTU2MTQ2Njg3Ng==" data-video-title="笑喷了，沈腾爆笑出演，6集联播" title="点击播放视频">
                                    <img src="//i3.mifile.cn/a4/T1k9CgB7Av1RXrhCrK.jpg" width="296" height="180" alt="笑喷了，沈腾爆笑出演，6集联播">
                                    <span class="play">
                                        <i class="iconfont"></i>
                                    </span>
                                </a>
                            </div>
                            <h3 class="title">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA12771" data-stat-pid="2_43_3_247" data-video="XMTU2MTQ2Njg3Ng==" data-video-title="笑喷了，沈腾爆笑出演，6集联播" >笑喷了，沈腾爆笑出演，6集联播</a>
                            </h3>
                            <p class="desc">小米Max沈腾爆笑预告全集</p>
                        </li>
                        <li class="video-item">
                            <div class="figure figure-img">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA12405" data-stat-pid="2_43_4_249" data-video="XMTUwMTEyMjk0MA==" data-video-title="15秒了解小米5 有多快" title="点击播放视频">
                                    <img src="//i3.mifile.cn/a4/T1ZOZgBmYv1RXrhCrK.jpg" width="296" height="180" alt="15秒了解小米5 有多快">
                                    <span class="play">
                                        <i class="iconfont"></i>
                                    </span>
                                </a>
                            </div>
                            <h3 class="title">
                                <a class="J_videoTrigger" href="javascript: void(0);" data-stat-aid="AA12405" data-stat-pid="2_43_4_249" data-video="XMTUwMTEyMjk0MA==" data-video-title="15秒了解小米5 有多快">15秒了解小米5 有多快</a>
                            </h3>
                            <p class="desc">华少用超快语速告诉你小米5 到底有多快</p>
                        </li>
                    </ul>
                    <!-- 视频 end -->
                </div>
            </div>
        </div>
    </div>

    <div id="J_modalVideo" class="modal modal-video fade modal-hide">
        <div class="modal-hd">
            <h3 class="title">视频播放</h3>
            <a class="close" data-dismiss="modal" href="javascript: void(0);">
                <i class="iconfont">&#xe602;</i>
            </a>
        </div>
        <div class="modal-bd">
            <div class="loading">
                <div class="loader"></div>
            </div>
        </div>
    </div>

@endsection