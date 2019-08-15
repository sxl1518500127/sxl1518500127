@extends('admin.layout.index')
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>修改订单<a style="margin-left:850px" href="/admin/order">返回上一层</a></span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/create" method="post">
                    {{csrf_field()}}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">订单编号</label>
                        <div class="mws-form-item">
                            <input type="text" disabled class="small" title="" name="" value="{{$indent->indentbian}}">
                            <input type="hidden"  class="small" title="" name="indentbian" value="{{$indent->indentbian}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">下单用户</label>
                        <div class="mws-form-item">
                            <input type="text" disabled class="small" title="" name="indentname" value="{{$indent->indentname}}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">订单地址</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="indentaddres" value="{{$indent->indentaddres}}">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">订单手机号</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="indentphoto" value="{{$indent->indentphoto}}">
                        </div>
                    </div>

                </div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
@endsection