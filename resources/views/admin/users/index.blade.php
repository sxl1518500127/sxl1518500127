@extends('admin.layout.index')


@section('content')
<form action="/admin/users" method="get">
    关键字
    <input type="text" name="search" placeholder="用户名" value="">
    <input type="submit"class="btn btn-danger"  value="搜索">
</form>



<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 用户列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>邮箱</th>
                    <th>手机号</th>
                    <th>头像</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tr>
                <td>1</td>
                <td>name</td>
                <td>邮箱</td>
                <td></td>
                <td></td>
                <td></td>
            </tr><tr>
                <td>1</td>
                <td>name</td>
                <td>邮箱</td>
                <td></td>
                <td></td>
                <td></td>
            </tr><tr>
                <td>1</td>
                <td>name</td>
                <td>邮箱</td>
                <td></td>
                <td></td>
                <td></td>
            </tr><tr>
                <td>1</td>
                <td>name</td>
                <td>邮箱</td>
                <td></td>
                <td></td>
                <td></td>
            </tr><tr>
                <td>1</td>
                <td>name</td>
                <td>邮箱</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
            
        <div id="page_page">
            
        </div>

    </div>
</div>

@endsection