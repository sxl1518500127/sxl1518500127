<!DOCTYPE html>
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <!-- Viewport Metatag -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- Plugin Stylesheets first to ease overrides -->
    <link rel="stylesheet" type="text/css" href="/d/plugins/colorpicker/colorpicker.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/custom-plugins/picklist/picklist.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/plugins/select2/select2.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/plugins/ibutton/jquery.ibutton.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/plugins/cleditor/jquery.cleditor.css" media="screen">

    <!-- Required Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/d/bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/fonts/ptsans/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/fonts/icomoon/style.css" media="screen">

    <link rel="stylesheet" type="text/css" href="/d/css/mws-style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/icons/icol16.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/icons/icol32.css" media="screen">

    <!-- Demo Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/d/css/demo.css" media="screen">

    <!-- jQuery-UI Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/d/jui/css/jquery.ui.all.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/jui/jquery-ui.custom.css" media="screen">

    <!-- Theme Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/d/css/mws-theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/themer.css" media="screen">

    <title>小米商城后台</title>

    <style type="text/css">
        #page_page li{
            list-style-type: none;
            margin:0;
            padding: 0;
        }
        #page_page li{
            position: relative;
            float: left;
            padding: 6px 12px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<div id="mws-logo-container">
        
        	<div id="mws-logo-wrap">
            	<img src="/d/images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <div id="mws-user-tools" class="clearfix">
            <div id="mws-user-info" class="mws-inset">
            
            	<div id="mws-user-photo">
                	<img src="/uploads/{{session('admin_userinfo')->adminphoto}}" alt="User Photo">
                </div>
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, {{session('admin_userinfo')->adminuname}}
                    </div>
                    <ul>
                        <li><a href="/admin/personal">个人中心</a></li>
                    	<li><a href="/admin/exit">注销</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        <div id="mws-sidebar">
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <div id="mws-navigation">
                <ul>
                    <li class="active" >
                        <a href="#"><i class="icon-users"></i> 用户管理</a>
                        <ul>
                            <li><a href="/admin/users">用户列表</a></li>
                            <li><a href="/admin/users/create">用户添加</a></li>
                        </ul>
                    </li>
                     <li class="active">
                        <a href="#"><i class="icon-users"></i> 家庭成员管理</a>
                        <ul>
                            <li><a href="/admin/admins">家庭成员列表</a></li>
                            <li><a href="/admin/admins/create">成员添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 分类管理</a>
                        <ul>
                            <li><a href="/admin/cates">分类列表</a></li>
                            <li><a href="/admin/cates/create">分类添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 订单管理</a>
                        <ul>
                            <li><a href="/admin/order">订单管理 </a></li>
                            <li><a href="/admin/money">退款管理</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 角色管理</a>
                        <ul>
                            <li><a href="/admin/nodes">角色列表</a></li>
                            <li><a href="/admin/nodes/create">角色添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 权限管理</a>
                        <ul>
                            <li><a href="/admin/roles">权限列表</a></li>
                            <li><a href="/admin/roles/create">权限添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 链接管理</a>
                        <ul>
                            <li><a href="/admin/link">链接列表</a></li>
                            <li><a href="/admin/link/linkadd">链接添加</a></li>
                        </ul>
                    </li>
                    <li><a href="/admin/config"><i class="icon-calendar"></i> 网站管理</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- 内容 开始 -->
            <div class="container">
             
                <!-- 读取 提示 消息 -->
                @if (session('success'))
                    <div class="mws-form-message success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mws-form-message error">
                        {{ session('error') }}
                    </div>
                @endif
                @section('content')

                @show
            </div>
            <!-- 内容结束 -->

            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
        </div>
        
    </div>
    <!-- JavaScript Plugins -->
    <script src="/d/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/d/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/d/js/libs/jquery.placeholder.min.js"></script>
    <script src="/d/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/d/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/d/jui/jquery-ui.custom.min.js"></script>
    <script src="/d/jui/js/jquery.ui.touch-punch.js"></script>

    <script src="/d/jui/js/globalize/globalize.js"></script>
    <script src="/d/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="/d/custom-plugins/picklist/picklist.min.js"></script>
    <script src="/d/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="/d/plugins/select2/select2.min.js"></script>
    <script src="/d/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/d/plugins/validate/jquery.validate-min.js"></script>
    <script src="/d/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="/d/plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="/d/plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="/d/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="/d/plugins/cleditor/jquery.cleditor.icon.min.js"></script>

    <!-- Core Script -->
    <script src="/d/bootstrap/js/bootstrap.min.js"></script>
    <script src="/d/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/d/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/d/js/demo/demo.formelements.js"></script>

</body>
</html>
