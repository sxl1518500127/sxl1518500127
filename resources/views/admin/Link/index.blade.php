@extends('admin.layout.index')
@section('content')

<div class="mws-panel grid_8">

    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 用户列表</span>
    </div>

    
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>链接网址</th>
                    <th>链接名称</th>
                    <th>操作</th>
                </tr>
            </thead>
    @foreach($links as $k=>$v)
            
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->linkdir }}</td>
                <td>{{ $v->linkname }}</td>
                <td>
             
                <form action="/admin/link/{{ $v->id }}" method="post" style="display: inline;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value='删除' class="btn btn-danger">
                </form>
                </td>
            </tr>
    @endforeach

        </table>
    </div>
</div>

@endsection