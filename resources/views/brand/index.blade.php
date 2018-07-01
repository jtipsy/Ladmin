@extends('brand.head')
@section('content')
@include('flash::message')
<div id="myCarousel" class="carousel slide" >
    <!-- 轮播（Carousel）指标 -->
	@foreach($brand as $b)
    <ol class="carousel-indicators">
        @if($b['atlas1'])<li data-target="#myCarousel" data-slide-to="0" class="active"></li>@endif
        @if($b['atlas2'])<li data-target="#myCarousel" data-slide-to="1"></li>@endif
        @if($b['atlas3'])<li data-target="#myCarousel" data-slide-to="2"></li>@endif
        @if($b['atlas4'])<li data-target="#myCarousel" data-slide-to="3"></li>@endif
    </ol>   
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner" data-interval="3000" data-wrap="true">
		@if($b['atlas1'])
		<div class="item active">
			<img src="{{$b['atlas1']}}" alt="{{$b['name']}}">
		</div>
		@endif
		@if($b['atlas2'])
		<div class="item">
			<img src="{{$b['atlas2']}}" alt="{{$b['name']}}">
		</div>
		@endif		
		@if($b['atlas3'])
		<div class="item">
			<img src="{{$b['atlas3']}}" alt="{{$b['name']}}">
		</div>
		@endif		
		@if($b['atlas4'])
		<div class="item">
			<img src="{{$b['atlas4']}}" alt="{{$b['name']}}">
		</div>
		@endif
    </div>
    <!-- 轮播（Carousel）导航 -->
	@if($b['atlas1'] || $b['atlas2'] || $b['atlas3'] || $b['atlas4'])
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
	@endif
</div>
<div class="container">
	<div class="about">
        <div class="show_top clearfix">
            <div class="show_top_l wow fadeInLeft text-center">
                <h2 class="show_top_l_h2" style="margin-bottom:0;">公司简介</h2>
                <p class="show_top_l_p">INTRODUCTION</p>
            </div>
        </div>
        <div class="about_bot clearfix">
            <p class="about_bot_l wow fadeInLeft text-center">@if($b['describe']) {{$b['describe']}} @else 您还没有简介哟~ @endif</p>
        </div>
	@endforeach
        <div class="show_top clearfix">
            <div class="show_top_l wow fadeInLeft text-center">
                <h2 class="show_top_l_h2" style="margin-bottom:0;">产品</h2>
                <p class="show_top_l_p">PRODUCT</p>
            </div>
        </div>
    </div>
    <div class="row gutter">
	  @foreach($product as $p)
      <div class="col-xs-4 col-sm-4  col-md-4 col-lg-4 gutter">
          <img src="{{$p['thumb']}}" title="{{$p['name']}}">
      </div>
	  @endforeach
   </div>
</div>
<style>
.show_top_l{
	padding:0 100px;
	background:url(http://www.meathome.com.cn/backend/img/bg1.png) no-repeat center center;
}
.about_bot{
	padding:0 50px;
}
.show_top_l_h2{
	font-size:18px;	
	color:#000;
}
.show_top_l_p{
	font-size:10px;
	color:#999999;
	margin-bottom:20px;
}
.about_bot_l{
	font-size:16px;
	color:#494949;
	line-height:44px;
}
.row{
    margin: 0 auto
}
.row div{
    box-sizing: border-box;
	height:260px;
    border-radius: 8px;
    margin-bottom: 15px;
    text-align: center;
    padding-left: 8px;
    padding-right: 8px;
}
.col-md-4 img{
    width:100%;
    height: 100%;
}
@media (max-width: 414px){
	.show_top_l_h2{
		font-size:30px;	
	}
	.show_top_l_p{
		font-size:16px;
		margin-bottom:10px;
	}
	.about_bot_l{
		font-size:12px;
		line-height:20px;
	}
    .row div{
        border-radius: 8px;
        margin-bottom: 6px;
        padding-left: 3px;
        padding-right: 3px;
		height:75px;
    }
    .about_bot{
        padding:0 4px;
    }
    .show_top{
        padding: 0 16px
    }
    .col-md-4 {
		height:75px;
		overflow: hidden;   
    }
}
</style>
@endsection
