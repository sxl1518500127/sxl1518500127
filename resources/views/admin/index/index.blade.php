@extends('admin.layout.index')


@section('content')
<style>
    .mws-stat .mws-stat-content {
        margin-left: 304px;
    }

    .mws-stat {
        height:150px;
    }
    .mws-stat .mws-stat-icon {
        width:150px;
    }
    .mws-stat .mws-stat-content .mws-stat-title {
        font-size: 16px;
        line-height: 55px;
    }

    .yangshi {
        width: 150px;
        height: 150px;
        margin-left: -74px;
    }
</style>
<!-- Inner Container Start -->
            <div class="container">
            	<!-- Statistics Button Container -->
            	<div class="mws-stat-container clearfix">
                	
                    <!-- Statistic Item -->
                	<a class="mws-stat" href="/admin/admins">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-house"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <div class="yangshi">
                            	<span class="mws-stat-title">家庭成员</span>
                                <span class="mws-stat-value">{{$aa}}</span>

                            </div>
                        </span>
                    </a>

                	<a class="mws-stat" href="/admin/users">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-group"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<div class="yangshi">
                                <span class="mws-stat-title">用户数量</span>
                                <span class="mws-stat-value">{{$users}}</span>

                            </div>
                        </span>
                    </a>

                	<a class="mws-stat" href="/admin/order">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-lorry"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<div class="yangshi">
                                <span class="mws-stat-title">商城订单</span>
                                <span class="mws-stat-value">{{$ding}}</span>

                            </div>
                        </span>
                    </a>
                    
                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-coins"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<div class="yangshi">
                                <span class="mws-stat-title">今天收入</span>
                                <span class="mws-stat-value">324</span>

                            </div>
                        </span>
                    </a>
                    
                
                </div>
                
                <div class="mws-panel grid_4">
                        <div class="mws-panel-header">
                            <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 订单统计详情 </font></font></span>
                        </div>
                        <div class="mws-panel-body no-padding">
                            <table class="mws-table">
                                
                                <tbody>
                                    <tr>
                                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">姓名</font></font></td>
                                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">单号</font></font></td>
                                       
                                    </tr>
                                    @foreach($countuserss as $k=>$v)
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->indentname}}</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->indentbian}}</font></font></td>
                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>


                 <div class="mws-panel grid_4">
                        <div class="mws-panel-header">
                            <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 需要补货统计 </font></font></span>
                        </div>
                        <div class="mws-panel-body no-padding">
                            <table class="mws-table">
                                
                                <tbody>
                                    <tr>
                                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品名</font></font></td>
                                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品图</font></font></td>
                                    </tr>

                                    @foreach($goodswares as $k=>$v)
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->waresname}}</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><img style="width:50px;height:50px"  src="/uploads/{{$v->waresimgpath}}"></font></font></td>
                                       
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <!-- Inner Container End -->
@endsection