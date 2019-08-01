@extends('admin.layout.index')


@section('content')
<form action="/admin/users" method="get">
    关键字
    <input type="text" name="search" placeholder="用户名" value="">
    <input type="submit"class="btn btn-danger"  value="搜索">
</form>



<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 成员列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>头像</th>
                    <th>操作</th>
                </tr>
            </thead>
            @foreach($admins as $k=>$v)
            <tr style="text-align:center;">
                <td>{{ $v->adminid }}</td>
                <td>{{ $v->adminname }}</td>
                <td><img src="/uploads/{{ $v->adminphoto }}" style="width:100px"></td>

                <td>
                    <form action="/admin/admins/{{ $v->adminid }}" method="post" style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value='删除' class="btn btn-danger">
                    </form>

                    <a href="/admin/admins/{{ $v->adminid }}/edit" class="btn btn-primary">修改权限</a>
                </td>

            </tr>
            @endforeach
        </table>
            
        <div id="page_page">
            
        </div>

    </div>
</div>

@endsection