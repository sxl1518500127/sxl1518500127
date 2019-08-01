@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i><<<a href="/admin/cates">返回上一层</a> &nbsp;  {{$goods->goodsmod}}列表 <a style="margin-left:700px" href="/admin/goods/create?id={{$goods->id}}">添加{{$goods->goodsmod}}</a></span>
        <!-- <span></span> -->
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>产品名称</th>
                    <th>产品价格</th>
                    <th>图片</th>
                    <th>销量</th>
                    <th>库存</th>
                    <th>上架时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wares as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->waresname }}</td>
                    <td>{{ $v->waresprice }}</td>
                    <td>
                        <img src="/uploads/{{ $v->waresimgpath }}" style="width: 50px;border-radius: 8px;">
                    </td>
                    <td>{{ $v->waressellcount }}</td>
                    <td>{{ $v->waresstock }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td>
                        <a href="/admin/goods/{{$v->id}}" class="btn btn-waring">
                            @if($v->status == 1)
                            下架
                            @else
                            重新上架
                            @endif
                        </a>
                         &nbsp
                        <a href="/admin/goods/{{$goods->id}}/edit?wares={{$v->id}}" class="btn btn-success">查看</a> &nbsp
                        <a href="/admin/goods?goods={{$goods->id}}&wares={{$v->id}}" class="btn btn-primary">编辑</a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection