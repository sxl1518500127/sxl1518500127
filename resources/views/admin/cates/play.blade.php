@extends('admin.layout.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>{{$goods->goodsmod}}--  >  --<d width="20px">  {{$wares->waresname}}</d></span><a style="float:right;margin-top:-20px" href="/admin/cates/show?id={{$goods->id}}">返回上一层</a>
        </div>
        <div class="mws-panel-body no-padding">
            
            <table class="mws-table">
                <tbody>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">种类名称</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$goods->goodsmod}}</font></font></td>
                       
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品名称</font></font></td>
                        <td><font style="vertical-align: inherit;">
                            {{$wares->waresname}}
                        </td>
                    </tr>

                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品型号</font></font></td>

                            <form class="mws-form" action="/admin/goods/{{$wares->id}}" method="post">
                                {{csrf_field()}}
                                {{ method_field('PUT') }}
                                <td>
                                    @if($spec == null)
                                        <input type="text" class="small" title="" name="goodspec" value="">
                                    @else
                                        <input type="text" class="small" title="" name="goodspec" value="{{$spec->goodspec}}">
                                    @endif
                                    <input type="hidden" name="goods" value="{{$goods->id}}">
                                    <input type="hidden" name="spec" value="spec">
                                    <input type="submit" value="编辑" class="btn btn-success">
                                </td>
                            </form>
                    </tr>

                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品颜色</font></font></td>
                        <form class="mws-form" action="/admin/goods/{{$wares->id}}" method="post">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <td>
                                @if($spec == null)
                                    <input type="text" class="small" title="" name="color" value="">
                                @else
                                    <input type="text" class="small" title="" name="color" value="{{$spec->color}}">

                                @endif
                                <input type="hidden" name="goods" value="{{$goods->id}}">
                                <input type="submit" value="编辑" class="btn btn-success">
                            </td>
                        </form>
                    </tr>

                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品价格</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$wares->waresprice}}</font></font></td>
                       
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品数量</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$wares->waresstock}}</font></font></td>
                      
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">列表图片</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <img src="/uploads/{{ $wares->waresimgpath }}" alt=""></font></font></td>
                       
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">库存</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$wares->waresstock}}</font></font></td>
                        
                    </tr>

                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">销量</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$wares->waressellcount}}</font></font></td>
                       
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品描述</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{!! $wares->waresdescript !!}</font></font></td>
                       
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            <form action="/admin/goods/{{$wares->id}}" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value='删除' class="btn btn-danger">
                            </form>
                            
                        </font></font></td>
                        
                    </tr>
                </tbody>
            </table>
                  
        </div>
    </div>
@endsection
