@extends('admin.layout.index')


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>管理员添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/admins" method="post" enctype="multipart/form-data">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" name="adminuname" value="{{ old('adminuname') }}" class="small">
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">昵称</label>
                    <div class="mws-form-item">
                        <input type="text" name="adminname" value="{{ old('adminname') }}" class="small">
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">密码</label>
    				<div class="mws-form-item">
    					<input type="password" name="adminpass" value="" class="small">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">确认密码</label>
    				<div class="mws-form-item">
    					<input type="password" name="repass" value="" class="small">
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">角色</label>
                        <select name = 'roles' class="mws-form-item">
                          <option value ="1">{{$roles[0]->roles}}</option>
                          <option value ="2">{{$roles[1]->roles}}</option>
                          <option value="3">{{$roles[2]->roles}}</option>
                        </select>
                </div>



			
                <div class="mws-form-row" style="width: 703px;">
                    <label class="mws-form-label">头像</label>
                    <div class="mws-form-item">
                        <input type="file" name="adminphoto" value="" class="small">
                    </div>
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