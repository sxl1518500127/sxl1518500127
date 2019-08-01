@extends('admin.layout.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>添加{{$goods->goodsmod}}</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/goods" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">种类</label>
                        <div class="mws-form-item">
                            <input  type="text" disabled class="small" title="" name="goodsmod" value="{{$goods->goodsmod}}">
                        </div>
                    </div>
                            <input  type="hidden" name="id" value="{{$goods->id}}">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="waresname" value="{{old('waresname')}}">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">商品价格</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="waresprice" value="{{old('waresprice')}}">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">商品数量</label>
                        <div class="mws-form-item">
                            <input type="number" class="small" title="" name="waresstock" value="{{old('waresstock')}}">
                        </div>
                    </div>

                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">列表图片</label>
                        <div class="mws-form-item">
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
                            <script id="editor" name="waresdescript" type="text/plain" style="width:650px;height:300px;">商品信息不能为空</script>
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
                    {{csrf_field()}}
                    <input type="submit" value="添加商品" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
@endsection