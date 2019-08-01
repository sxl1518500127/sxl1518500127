@extends('admin.layout.index')
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>修改商品<a style="margin-left:850px" href="/admin/cates/show?id={{$goods->id}}">返回上一层</a></span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/goods/xiugai" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品种类</label>
                        <div class="mws-form-item">
                            <input type="text" disabled class="small" title="" name="goodsmod" value="{{$goods->goodsmod}}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">商品名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="waresname" value="{{$wares->waresname}}">
                            <input type="hidden" class="small" title="" name="goods" value="{{$goods->id}}">
                            <input type="hidden" class="small" title="" name="wares" value="{{$wares->id}}">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">商品价格</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="waresprice" value="{{$wares->waresprice}}">
                        </div>
                    </div>

                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">商品数量</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="waresstock" value="{{$wares->waresstock}}">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">商品规格</label>
                        <div class="mws-form-item">
                            @if($spec == null)
                                <input type="text" class="small" title="" name="goodspec" value="">
                            @else
                                <input type="text" class="small" title="" name="goodspec" value="{{$spec->goodspec}}">
                            @endif
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">商品颜色</label>
                        <div class="mws-form-item">
                            @if($spec == null)
                                <input type="text" class="small" title="" name="color" value="">
                            @else
                                <input type="text" class="small" title="" name="color" value="{{$spec->color}}">

                            @endif
                        </div>
                    </div>

                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">列表图片</label>
                        <div class="mws-form-item">
                            <img src="/uploads/{{ $wares->waresimgpath }}" alt="">
                            <input type="file" class="small" title="" name="waresimgpath">
                        </div>
                    </div>


                    <!-- 配置文件 -->
                    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>

                    <div class="mws-form-row">
                        <label class="mws-form-label">详情</label>
                        <div class="mws-form-item">
                            <!-- 加载编辑器的容器 -->
                            <script id="editor" name="waresdescript" type="text/plain" style="width:650px;height:300px;">
                                    {!! $wares->waresdescript !!}
                            </script>
                        </div>
                    </div>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor', {
                            toolbars: [
                                [ 'undo', 'redo', 'bold','italic','formatmatch','fontfamily','fontsize', 'emotion','spechars','searchreplace', 'justifyleft', 'justifyright', 'justifycenter', 'justifyjustify', 'forecolor', 'backcolor','fullscreen','lineheight','simpleupload', 'insertimage','imagenone','imageleft','imageright', 'imagecenter' ,'scrawl']
                            ]
                        });
                    </script>

                </div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
@endsection