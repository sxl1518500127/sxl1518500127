<!DOCTYPE html>
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <!-- Viewport Metatag -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- Required Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/d/bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/fonts/ptsans/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/d/css/fonts/icomoon/style.css" media="screen">

    <link rel="stylesheet" type="text/css" href="/d/css/login.css" media="screen">

    <link rel="stylesheet" type="text/css" href="/d/css/mws-theme.css" media="screen">

    <title>MWS Admin - Login Page</title>

</head>
<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>Login</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/admin/login/dologin" method="post">
                	{{ csrf_field() }}
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="adminuname" class="mws-login-username required" placeholder="username">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="adminpass" class="mws-login-password required" placeholder="password">
                        </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">Remember me</label>
                            </li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="Login" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="/d/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/d/js/libs/jquery.placeholder.min.js"></script>
    <script src="/d/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/d/jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/d/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/d/js/core/login.js"></script>

</body>
</html>
