<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-cn" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="zh-cn" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="zh-cn"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>{{$seo['title']}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="keywords" content="{{$seo['keywords']}} ">
    <meta content="{{$seo['desc']}}" name="description" />
    <meta content="itas" name="author" />
    <meta name="baidu-site-verification" content="hxaiwCrdBK" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/front/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/front/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->


    <!-- BEGIN THEME STYLES -->

    <link href="/front/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/front/assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/front/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/front/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    @yield('css')
    <link rel="shortcut icon" href="favicon.ico" />

</head>
<body>


<!-- BEGIN HEADER -->
<div class="header navbar navbar-default navbar-static-top">

    <div class="container">
        <div class="navbar-header" style="margin-top:14px;"> 
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN LOGO (you can use logo image instead of text)-->
            <a class="navbar-brand logo-v1" href="/">
                <!--<img src="/front/assets/img/logo.png" id="logoimg" alt="" > -->
				肉之家
            </a>
            <!-- END LOGO -->
        </div>

        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown @if($url == '/')active @endif">
                    <a class="dropdown-toggle" href="/">首页 </a>

                </li>
                <li class="dropdown @if($url == '/37fb591be38db52dd1d5f04b689008f9')active @endif">
                    <a class="dropdown-toggle" href="{{url('37fb591be38db52dd1d5f04b689008f9')}}">品牌</a>
                </li>
                 <li class="dropdown @if($url == '/37fb591be38db52dd1d5f04b689008f5')active @endif">
                    <a class="dropdown-toggle" href="{{url('37fb591be38db52dd1d5f04b689008f5')}}">产品 </a>
                </li>
                <li class="dropdown @if($url == '/37fb591be38db52dd1d5f04b689008f2')active @endif">
                    <a class="dropdown-toggle" href="{{url('37fb591be38db52dd1d5f04b689008f2')}}">店铺</a>
                </li>
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
        <!-- BEGIN TOP NAVIGATION MENU -->
    </div>
</div>
<!-- END HEADER -->

@yield('content')

<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 border-right">
                <!-- BEGIN ABOUT -->
                <h2>关于肉之家</h2>
                <p class="margin-bottom-30">肉之家是一个肉类资讯平台。</p>
                <div class="clearfix"></div>
                <!-- END ABOUT -->


            </div>
            <div class="col-md-4 col-sm-4 border-right">
                <!-- BEGIN CONTACTS -->
                <h2>联系我们</h2>
                <address class="margin-bottom-40">
                    QQ:599415664<br>
                </address>
                <!-- END CONTACTS -->

            </div>
            <div class="col-md-4 col-sm-4">
                <!-- BEGIN TWITTER BLOCK -->
                <h2>关注我们</h2>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-weibo"></i></dt>
                    <dd>
                        <a href="http://weibo.com/" target="_blank">新浪微博</a>

                    </dd>
                </dl>


                <!-- END TWITTER BLOCK -->
            </div>

        </div>
    </div>
</div>
<!-- END FOOTER -->

<!-- BEGIN COPYRIGHT -->
<div class="copyright">

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-sm-8">
                <p>
                    <span class="margin-right-10">2018 © meathome.com.cn 版权所有. </span>
                    <span>
                        Power by <a target="_blank" href="https://www.mongoliaci.com">肉之家</a>
                    </span>

                </p>
            </div>

        </div>
    </div>
</div>
<!-- END COPYRIGHT -->


<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="/front/assets/plugins/respond.min.js"></script>
<![endif]-->
<script src="/front/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>

<script src="/front/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript" src="/front/assets/plugins/back-to-top.js"></script>
<!-- END CORE PLUGINS -->

@yield('js')
<script>
    var ticket = "{{$_COOKIE['ticket'] or ''}}";
     $.ajax({
            url: '{{env("SSO_SERVER")}}sso/user_info?ticket='+ticket,
            dataType: "jsonp",
            jsonp: "callback",
            success: function (data) {
                //var dataObj=eval("("+data+")");//转换为json对象 
                $("#account").text(data.username);
                $("#loginLink").attr('href','javascript:void()');
                console.log(data.username);
            },
            fail:function() {
                console.log('fail');
            }
    })
    </script>
</body>

</html>

