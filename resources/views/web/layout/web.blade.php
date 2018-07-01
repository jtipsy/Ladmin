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
<div class="header navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown ">
                    <a href="{{url('/register')}}" id="loginLink">
						<i class="fa fa-user"></i><span>品牌厂商入住通道</span>
					</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END HEADER -->
@yield('content')
<!--[if lt IE 9]>
<script src="/front/assets/plugins/respond.min.js"></script>
<![endif]-->
<script src="/front/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/front/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/front/assets/plugins/back-to-top.js"></script>
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
                $("#loginLink").attr('href','logout');
                //console.log(data.username);
            },
            fail:function() {
                console.log('fail');
            }
    })
    </script>
</body>

</html>

