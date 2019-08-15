@extends('admin.layout.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>订单详情--  >{{$indent->indentbian}}</span><a style="float:right;margin-top:-20px" href="/admin/order">返回上一层</a>
        </div>
        <div class="mws-panel-body no-padding">
            
            <table class="mws-table">
                <tbody>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单编号</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font>{{$indent->indentbian}}</font></td>
                       
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">下单用户</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> </font>{{$indent->indentname}}</font></td>
                    </tr>

                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">下单总价格</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font>{{$indent->indentprice}}元</font></td>
                       
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">下单时间</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font>{{$indent->created_at}}</font></td>
                      
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单地址</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font>{{$indent->indentaddres}} </td>
                       
                    </tr>
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户手机号</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font>{{$indent->indentphoto}}</font></td>
                        
                    </tr>
                    @foreach($cart as $key => $value)
                        <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$key+1}}</font></font></td>
                            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font> <img src="/uploads/{{$value->waresimgpath}}" style="width:100px;height:100px" alt=""> {{$value->waresname}} &nbsp;&nbsp;&nbsp;{{$value->specstr}} &nbsp;&nbsp;&nbsp;&nbsp; {{$value->waresprice}} x {{$value->num}} &nbsp;&nbsp;&nbsp;&nbsp; {{$value->num * $value->waresprice}}</font></td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
                  
        </div>
    </div>
@endsection
