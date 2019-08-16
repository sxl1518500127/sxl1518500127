@extends('admin.layout.index')


@section('content')
<form action="/admin/order" method="get">
    关键字
    <input type="text" name="search" placeholder="用户名" value="">
    <input type="submit"class="btn btn-danger"  value="搜索">
</form>

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 订单列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>联系方式</th>
                    <th>总价</th>
                    <th>收货地址</th>
                    <th>订单编号</th>
                    <th>状态</th>
                    <th>下单时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            @foreach($doinent as $key => $value)
            <!-- {{dump($value)}} -->
            <tr style="font-size:12px">
                <td>{{ (($doinent->currentPage()-1)*12)+($key+1)}}</td>
                <td>{{$value->indentname}}</td>
                <td>{{$value->indentphoto}}</td>
                <td>{{$value->indentprice}}元</td>
                <td >{{$value->indentaddres}}</td>
                <td>{{$value->indentbian}}</td>
                <td>
                    @if($value->indentstatus == "0")
                        <span style="background: #4ca0f9">未付款</span>
                        
                    @elseif($value->indentstatus == "1")
                        <span style="background: #76B249">已付款</span>
                        
                    @elseif($value->indentstatus == "2")
                        <span style="background: #31e649">已发货</span>
                        
                    @elseif($value->indentstatus == "3")
                        <span style="background: orange">待收货</span>
                        
                    @elseif($value->indentstatus == "4")
                        <span style="background: #d3e82d">待评价</span>
                        
                    @elseif($value->indentstatus == "5")
                        <span style="background: red">退款</span>
                        
                    @endif
                </td>
                <td>{{$value->created_at}}</td>
                <td>
                    @if($value->indentstatus == "1")
                        <a href="/admin/fahuo/{{$value->indentbian}}" style="" class="btn-min btn-primary">发货</a>
                    @endif
                        <a href="/admin/doindents/{{$value->indentbian}}" class="btn-min btn-primary">编辑</a>
                        <a href="/admin/store/{{$value->indentbian}}" class="btn-min btn-success">查看</a>
                        


                </td>
            </tr>
            @endforeach
        </table>
            
        <div id="page_page">
                {{ $doinent->appends($requests)->links() }}
            
        </div>

    </div>
</div>

@endsection