<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>品牌管理中心</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="_token" content="{{ csrf_token() }}"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{asset('backend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        @yield('css')
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('backend/css/components-md.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('backend/css/layouts.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <!-- END THEME LAYOUT STYLES -->
        <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
        </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
        <!-- BEGIN HEADER -->
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
            <div class="page-content-wrapper">
				    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">肉之家</a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/37fb591be38db52dd1d5f04b689008f6') }}">首页</a></li>
                    <li><a href="{{ url('/37fb591be38db52dd1d5f04b689008f9') }}">品牌</a></li>
                    <li><a href="{{ url('/37fb591be38db52dd1d5f04b689008f5') }}">产品</a></li>
                    <li><a href="{{ url('/37fb591be38db52dd1d5f04b689008f2') }}">店铺</a></li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guard('front')->guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('front')->user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
				  @if (Auth::guard('front')->guest())
				  @include('flash::message')
				  @else
                  @yield('content')
				  @endif
                </div>
                <!-- END CONTENT BODY -->
            </div>
        <!-- END CONTAINER -->
        <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('backend/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE JQUERY PLUGINS -->
        <!-- layer-->
        <script type="text/javascript" src="{{asset('backend/plugins/layer/layer.js')}}"></script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        @yield('js')
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('backend/js/app.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('backend/js/layout.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src='https://cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
		<script>
		var ticket = "{{$_COOKIE['ticket'] or ''}}";
		 $.ajax({
				url: '{{env("SSO_SERVER")}}sso/user_info?ticket='+ticket,
				dataType: "jsonp",
				jsonp: "callback",
				success: function (data) {
					$("#account").text(data.username);
					$("#user_id").text(data.id);
					$("#loginLink").attr('href','logout');
				},
				fail:function() {
					console.log('fail');
				}
		})
		</script>
    </body>
</html>