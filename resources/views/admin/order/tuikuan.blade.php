@extends('admin.layout.index')

@section('content')
<style>
.J_bank {
    width: 150px;
    height: 80px;
    float: left;
}
</style>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>退款成功--  > {{$id}} </span><a style="float:right;margin-top:-20px" href="/admin/tui/{{$id}}">返回上一层</a>
        </div>
        <div class="mws-panel-body no-padding">
            
            <table class="mws-table">
                <tbody>
                    <tr style="height:500px; text-align: center;background-image: url('/uploads/succ.jpg'); background-repeat:no-repeat;background-size:100% 100%">

                        <td style="font-size:30px;text-align: center;color:red">
                            <span style="font-size:70px">ok</span>
                                退款成功
                            <a href="/admin/tui/{{$id}}"><div style="margin-left:400px;margin-top:30px;  width:200px;height:60px;background: #ff9a02;border-radius:30px; border:1px solid blue;"><p style="margin-top: 20px">返回订单列表</p></div></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
