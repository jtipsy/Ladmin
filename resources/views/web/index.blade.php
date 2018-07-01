@extends('web.layout.web')
@section('css')
@endsection
@section('content')
<div class="page-container">
    <div class="fullwidthbanner-container slider-main banner_bg">
        <div class="banner_content">
            <h1 class="banner_title">
                <span>肉之家品牌管理系统</span>
            </h1>
            <div id="banner-start">
                <span id="banner-start-command">肉之家品牌管理系统快速通道: 37fb591be38db52dd1d5f04b689008f6</span>
                <a id="banner-start-link" href="37fb591be38db52dd1d5f04b689008f6"><i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
 @section('js')
    <script src="/front/assets/scripts/app.js"></script>
    <script src="/front/assets/scripts/index.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();

        });
    </script>
@endsection
