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
                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-house"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <div class="yangshi">
                            	<span class="mws-stat-title">家庭成员</span>
                                <span class="mws-stat-value">324</span>

                            </div>
                        </span>
                    </a>

                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-group"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<div class="yangshi">
                                <span class="mws-stat-title">用户数量</span>
                                <span class="mws-stat-value">324</span>

                            </div>
                        </span>
                    </a>

                	<a class="mws-stat" href="#">
                    	<!-- Statistic Icon (edit to change icon) -->
                    	<span class="mws-stat-icon icol32-lorry"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                        	<div class="yangshi">
                                <span class="mws-stat-title">商城订单</span>
                                <span class="mws-stat-value">324</span>

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
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 4.0</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 5.0</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 5.5</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 6</font></font></td>
                                      
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 7</font></font></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">AOL浏览器（AOL桌面）</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壁虎</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Firefox 1.0</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壁虎</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Firefox 1.5</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壁虎</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">卡米诺1.5</font></font></td>
                                      
                                    </tr>
                                   
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
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 4.0</font></font></td>
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 5.0</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 5.5</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 6</font></font></td>
                                      
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 7</font></font></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">AOL浏览器（AOL桌面）</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壁虎</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Firefox 1.0</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壁虎</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Firefox 1.5</font></font></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">壁虎</font></font></td>
                                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">卡米诺1.5</font></font></td>
                                      
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <!-- Inner Container End -->
@endsection