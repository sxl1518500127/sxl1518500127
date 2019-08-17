$(function(){
     //购物车划过效果
    ~function($){
        $('#J_miniCartTrigger').hover(function(){
            $(this).addClass('topbar-cart-active');
            $('#J_miniCartMenu').stop().slideDown(200,function(){
                //触发ajax发送请求获取购物车数据

            });
        },function(){
            $(this).removeClass('topbar-cart-active');
            $('#J_miniCartMenu').stop().slideUp(200);
        });
    }($);
   

    //网站导航鼠标划过显示
    ~function($){
       //获取导航
        var j_menu = $('#J_navMenu');
        var cont = j_menu.find('.container');
        //记录网站导航划过定时器
        var timer = null;
        $('.J_navMainList').on('mouseenter','.nav-item',function(){

            var self = $(this),obj = null;

            //判断是否已经触发过鼠标移入事件
            $('.J_navMainList').data('toggled',!0);
            //添加划过的样式
            self.addClass('nav-item-active');
            if(self.find('.children-list').length){
               obj = self.find('.children-list').clone();
                //显示主图
                obj.find('img').each(function(){
                    $(this).attr('src',$(this).attr('data-src'));
                }) ;
                cont.html(obj);                    
                timer = setTimeout(function(){
                    j_menu.stop(!0, !1).slideDown(200);
                },200)
            }else{
                j_menu.stop(!0, !1).slideUp(200);
            }

        }).on('mouseleave','.nav-item',function(){
            timer && (clearTimeout(timer),timer = null )
            var self = $(this);
            //移出划过样式
            self.removeClass('nav-item-active');
            timer = setTimeout(function(){
                j_menu.slideUp(200);
            },200)
        });

        j_menu.on({
            mouseenter: function() {
                timer && (clearTimeout(timer),timer = null );
            },
            mouseleave: function() {
                timer = setTimeout(function() {
                    j_menu.slideUp()
                }
                , 200)
            }
        })
    }($);
 

    //搜索框
    ~function($){
        var $search,$form,$list,$result,$cont,$words;
        $search = $('#search');
        $form = $('#J_searchForm');
        $words = $form.find('.search-hot-words');
        // if($form.length){
        //     $list = $('<div id="J_keywordList" class="keyword-list hide"><ul class="result-list"></ul></div>');
        //     $cont = $list.find('>ul');
        //     $list.appendTo($form);
        // }
        $search.on({
            click:function(){
                $form.addClass('search-form-focus');
                // if(!$form.data('oneClick')){
                //     getResultList($cont);
                // }
                $form.data('oneClick',true);
                $list.removeClass('hide'),$words.addClass('hide');

            },
            blur:function(){
                $form.removeClass('search-form-focus');
                $list.addClass('hide'),$words.removeClass('hide');
            }
        });

        // function getResultList($cont){
        //     var arr = [1,2,3,4,5,6];
        //     var str = '';
        //     for(var i=0;i<arr.length;i++){
        //         str += '<li data-key="小米手机5"><a href="#">小米手机5<span class="result">约有11件</span></a></li>';
        //         console.log(i)
        //     }
        //     $cont.html(str);
        // }
    }($);



    //点击播放视频
    ~function($){
        var $v = $('#J_modalVideo');
        $('.J_videoTrigger').on('click',function(e){
            e.preventDefault();
            var newTitle = $(this).attr('data-video-title');
            $v.find('.modal-hd').find('.title').html(newTitle).end().end().find('.modal-bd').html('<iframe width="880" height="536" src="'+$(this).data('video')+'" frameborder="0" allowfullscreen=""></iframe>');
            $v.fadeIn(200).addClass('in');
            $('<div class="modal-backdrop fade in" style="width:100%; height:100%"></div>').appendTo('body').off('click').on('click',function(){
                $v.find('.close').trigger('click');
            });
        })
        $v.find('.close').on('click',function(){
            $v.removeClass("in").fadeOut(200,function(){
                $('.modal-backdrop').remove();
                $v.find('iframe').attr('src','');
            });
            
        })
    }($);


    //鼠标滑过显示个人中心菜单效果
    $('#J_userInfo').on('mouseenter','.user',function(){
        $(this).addClass('user-active');
        $(this).find('.user-menu').stop().slideDown(200);
    }).on('mouseleave','.user',function(){
        $(this).removeClass('user-active');
        $(this).find('.user-menu').stop().slideUp(200);
    })


    
});
