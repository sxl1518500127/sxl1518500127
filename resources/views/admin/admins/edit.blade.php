@extends('admin.layout.index')


@section('content')


<!-- 显示 验证错误  开始 -->
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- 显示 验证错误  结束 -->



<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>权限修改</span>
    </div>
    <div class="mws-panel-body no-padding">

    	<form class="mws-form" action="/admin/xgrole/{{ $user->adminid }}" method="post" enctype="multipart/form-data">
    		{{ csrf_field() }}
    <div class="mws-form-row">
        <label class="mws-form-label">角色名称</label>
        <div class="mws-form-item">
            <input type="text" disabled="disabled" name="" value='{{$user->adminuname}}' class="small">
        </div>
    </div>
    <div class="mws-form-row">
        <label class="mws-form-label">权限等级</label>
            <div class="mws-form-item clearfix">
                <ul class="mws-form-list inline">
                    <input type="radio" value="1" name="ro" checked="checked">{{$roles[0]->roles}}
                    <input type="radio" value="2" name="ro" checked="checked">{{$roles[1]->roles}}
                    <input type="radio" value="3" name="ro" checked="checked">{{$roles[2]->roles}}

                </ul>
            </div>
        </div>

    		<div class="mws-button-row">
    			<input type="submit" value="Submit" class="btn btn-danger">
    			<input type="reset" value="Reset" class="btn ">
    		</div>
    	</form>
    </div>    	
</div> 
@endsection