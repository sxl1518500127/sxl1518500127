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
            <span>退款详情--  >{{$money->bianhao}}</span><a style="float:right;margin-top:-20px" href="/admin/money">返回上一层</a>
        </div>
        <div class="mws-panel-body no-padding">
            
            <table class="mws-table">
                <tbody>
                    <tr>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;">退款编号</font></font></td>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;"> </font>{{$money->bianhao}}</font></td>
                       
                    </tr>
                    <tr>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;">退款申请人</font></font></td>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;"> </font>{{$money->customername}}</font></td>
                    </tr>
                    <tr>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;">退款申请人手机号</font></font></td>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;"> </font>{{$money->customerphone}}</font></td>
                    </tr>
                    <tr>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;">退款金额</font></font></td>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;"> </font>{{$money->jiage}}元</font></td>
                    </tr>
                     <tr>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;">退款原因</font></font></td>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;"> </font>{{$money->what}}</font></td>
                    </tr>
                 
                    @foreach($cart as $key => $value)
                        <tr>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;">退货{{$key+1}}</font></font></td>
                            <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;"></font> <img src="/uploads/{{$value->waresimgpath}}" style="width:100px;height:100px" alt=""> {{$value->waresname}} &nbsp;&nbsp;&nbsp;{{$value->specstr}} &nbsp;&nbsp;&nbsp;&nbsp; {{$value->waresprice}}元 x {{$value->num}} &nbsp;&nbsp;&nbsp;&nbsp; {{$value->num * $value->waresprice}}元</font></td>
                           
                        </tr>
                    @endforeach
                    <tr>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;">退款方式</font></font></td>
                        <td><font style="vertical-adivgn: inherit;"><font style="vertical-adivgn: inherit;">
                            <ul class="clearfix payment-divst J_paymentdivst J_divnksign-customize">
                                <div class="J_bank" >
                                  
                                    <a href="/order/tuikuan/{{$money->bianhao}}"><img src="//c1.mifile.cn/f/i/15/pay/wechat0715.jpg" alt="" style="margin-left: 0;"/>
                                </div>
                                <div class="J_bank">
                                    
                                    <a href="/order/tuikuan/{{$money->bianhao}}">
                                        <img src="//s01.mifile.cn/i/banklogo/unionpay.png?ver2015" alt="" style="margin-left: 0;"/>
                                    </a>
                                </div>
                                <div class="J_bank">
                                  
                                    <a href="/order/tuikuan/{{$money->bianhao}}"><img src="//s01.mifile.cn/i/banklogo/cft.png" alt="" style="margin-left: 0;"/></a>
                                </div>
                                <div class="J_bank">
                                    <a href="/order/tuikuan/{{$money->bianhao}}"><img src="//s01.mifile.cn/i/banklogo/micash.png?ver2015" alt="" style="margin-left: 0;"/></a>
                                </div>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
                  
        </div>
    </div>
@endsection
