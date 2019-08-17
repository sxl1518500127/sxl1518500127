@extends('admin.layout.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>退款详情--  >{{$money->bianhao}}</span><a style="float:right;margin-top:-20px" href="/admin/money">返回上一层</a>
        </div>
        <div class="mws-panel-body no-padding">
            
            <table class="mws-table">
                <tbody>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款编号</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font>{{$money->bianhao}}</font></td>
                        
                       
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款申请人</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font>{{$money->customername}}</font></td>
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款申请人手机号</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font>{{$money->customerphone}}</font></td>
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款金额</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font>{{$money->jiage}}元</font></td>
                    </tr>
                     <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款原因</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font>{{$money->what}}</font></td>
                    </tr>
                 
                    @foreach($cart as $key => $value)
                        <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退货{{$key+1}}</font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font> <img src="/uploads/{{$value->waresimgpath}}" style="width:100px;height:100px" alt=""> {{$value->waresname}} &nbsp;&nbsp;&nbsp;{{$value->specstr}} &nbsp;&nbsp;&nbsp;&nbsp; {{$value->waresprice}} x {{$value->num}} &nbsp;&nbsp;&nbsp;&nbsp; {{$value->num * $value->waresprice}}</font></td>
                           
                        </tr>
                    @endforeach
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">退款方式</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font>@if($money->status =="1")未退款<a href="/admin/tui/{{$money->bianhao}}">去退款</a>@else 已退款 @endif</font></td>
                    </tr>
                </tbody>
            </table>
                  
        </div>
    </div>
@endsection
