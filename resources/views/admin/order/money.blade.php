@extends('admin.layout.index')


@section('content')
<div style="margin-left: 30px">
    <form action="/admin/money" method="get">
        关键字
        <input type="text" name="search" placeholder="用户名" value="">
        <input type="submit"class="btn btn-danger"  value="搜索">
    </form>

</div>

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 退款列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>订单编号</th>
                    <th>总价</th>
                    <th>状态</th>
                    <th>退款时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            @foreach($money as $key => $value)

            <tr style="font-size:12px">
                <td>{{ (($money->currentPage()-1)*12)+($key+1)}}</td>
                <td>{{$value->customername}}</td>
                <td>{{$value->bianhao}}</td>
                <td>{{$value->jiage}}元</td>
                <td>
                    @if($value->status == "1")
                        <span style="background: #f34804">未退款</span>
                        
                    @else
                        <span style="background: #4cd64b">退款</span>
                     
                        
                    @endif
                </td>
                <td>{{$value->created_at}}</td>
                <td>
                    @if($value->status == "1")
                        <a href="/admin/tui/{{$value->bianhao}}" style="" class="btn-min btn-primary">退款</a>
                    @endif
                        <a href="/admin/showtui/{{$value->bianhao}}" class="btn-min btn-success">查看</a>
                        


                </td>
            </tr>
            @endforeach
        </table>
            
        <div id="page_page">
                {{ $money->appends($requests)->links() }}
            
        </div>

    </div>
</div>

@endsection