@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>个人中心</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/admins" method="post" enctype="multipart/form-data">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
                        {{session('admin_userinfo')->adminuname}}
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">昵称</label>
                    <div class="mws-form-item">
                        {{session('admin_userinfo')->adminname}}

                    </div>
                </div>

                <div class="mws-form-row" style="width: 703px;">
                    <label class="mws-form-label">头像</label>
                    <div class="mws-form-item">
                        <img src="/uploads/{{session('admin_userinfo')->adminphoto}}">
                    </div>
                </div>
    		</div>
    	</form>
    </div>    	
</div>
@endsection