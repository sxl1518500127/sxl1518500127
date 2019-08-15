@extends('admin.layout.index')

@section('content')
	
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加链接</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/link" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">链接网址</label>
                    <div class="mws-form-item">
                        <input type="text" name="linkdir" value="" class="small">
                    </div>
                </div>
        
                <div class="mws-form-row">
                    <label class="mws-form-label">网址名称</label>
                    <div class="mws-form-item">
                        <input type="text" name="linkname" value="" class="small">
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