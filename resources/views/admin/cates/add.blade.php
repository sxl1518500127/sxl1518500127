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
                            <script id="editor" name="waresdescript" type="text/plain" style="width:650px;height:300px;">                             <table class="cs_tab">
                               <tbody>
                                <tr>
                                 <td class="td_tit">品牌</td>
                                 <td> MI/小米 </td>
                                 <td class="td_tit">型号</td>
                                 <td>4C 标准版全网通</td>
                                 <td class="td_tit">上市时间</td>
                                 <td>2015年</td>
                                </tr>
                                <tr>
                                 <td class="td_tit">主屏分辨率</td>
                                 <td> 1920&times;1080像素 </td>
                                 <td class="td_tit">外观样式</td>
                                 <td>直板</td>
                                 <td class="td_tit">屏幕颜色</td>
                                 <td>1600万</td>
                                </tr>
                                <tr>
                                 <td class="td_tit">主屏尺寸</td>
                                 <td> 5.0英寸 </td>
                                 <td class="td_tit">操作系统</td>
                                 <td>MIUI 6（基于Android OS 5.1）</td>
                                 <td class="td_tit">是否智能手机</td>
                                 <td>智能手机</td>
                                </tr>
                                <tr>
                                 <td class="td_tit">前摄像头</td>
                                 <td> 500万像素 </td>
                                 <td class="td_tit">摄像头</td>
                                 <td>1300万</td>
                                 <td class="td_tit">触摸屏</td>
                                 <td>电容式触摸屏</td>
                                </tr>
                                <tr>
                                 <td class="td_tit">运行内存RAM</td>
                                 <td> 2G </td>
                                 <td class="td_tit">机身内存ROM</td>
                                 <td>16g</td>
                                 <td class="td_tit">储存功能</td>
                                 <td>不支持存储卡</td>
                                </tr>
                                <tr>
                                 <td class="td_tit">高级功能</td>
                                 <td> 双卡双待 </td>
                                 <td class="td_tit">网络制式</td>
                                 <td>电信4G/联通4G/移动4G</td>
                                 <td class="td_tit">CPU型号</td>
                                 <td>骁龙808</td>
                                </tr>
                                <tr>
                                 <td class="td_tit">厚度</td>
                                 <td> 超薄(小于9mm) </td>
                                 <td class="td_tit">CPU核数</td>
                                 <td>六核</td>
                                 <td class="td_tit">CPU频率</td>
                                 <td>1.8GHz</td>
                                </tr>
                                <tr>
                                 <td class="td_tit">电池类型</td>
                                 <td> 不可拆卸电池 </td>
                                 <td class="td_tit">耳机接口</td>
                                 <td>3.5mm</td>
                                 <td class="td_tit">电池容量</td>
                                 <td>3080mAh</td>
                                </tr>
                                <tr>
                                 <td class="td_tit">SIM卡类型</td>
                                 <td> Micro SIM(中卡） </td>
                                 <td class="td_tit">屏幕像素密度PPI</td>
                                 <td>441</td>
                                </tr>
                                <tr>
                                 <td class="td_tit">商品清单</td>
                                 <td colspan="5">主机x1, 充电器x1,USB数据线x1, 说明书x1, 保修卡x1</td>
                                </tr>
                               </tbody>
                              </table></script>
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