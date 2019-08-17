@extends('admin.layout.index')
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>网站配置</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/config/update" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">网页名称</label>
                    <div class="mws-form-item">
                        <input type="text"  name="conname" value="{{ $configs->conname }}" class="small">
                    </div>
                </div>
                <input type="hidden"  name="id" value="{{ $configs->id }}" class="small">
                <div class="mws-form-row">
                    <label class="mws-form-label">网页关键字</label>
                    <div class="mws-form-item">
                        <input type="text" name="conkeyword" value="{{ $configs->conkeyword }}" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">网站描述</label>
                    <div class="mws-form-item">
                        <input type="text" name="condesc" value="{{ $configs->condesc}}" class="small">
                    </div>
                </div>

                <div class="mws-form-row" style="width: 895px;">
                    <label class="mws-form-label">logo</label>
                    <div class="mws-form-item">
                        <input type="file" name="log" value="" class="small">
                    </div>
                    <div class="mws-form-item" style="width: 100px;border-radius: 8px;margin-left: 170px;margin-top: 30px;">
                        <img src="/uploads/{{ $configs->log }}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">网站开关</label>
                    <div class="mws-form-item">
                        <input type="radio" name="constatus" value="0" />维护
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="radio" name="constatus" value="1" checked="true" />开启
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