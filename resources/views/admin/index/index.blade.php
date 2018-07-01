@extends('layouts.admin')

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{url('admin')}}">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>控制台</span>
        </li>
    </ul>
</div>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
	<div class="page-container">
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-9">
						<div class="alert alert-info"><strong>数据一览!</strong></div>
							<section class="box-body">
								<div class="row">
                                    <div class="col-md-4 col-sm-6 col-xs-12">
										<div class="dashboard-stat2 ">
											<div class="display">
												<div class="number">
													<h3 class="font-green-sharp">
														品牌新增
													</h3>
													<small>今日数：<a href="/admin/brand/list">{{$LatestBrand}}</a></small>
												</div>
												<div class="icon">
													<i class="fa fa-fw fa-list"></i>
												</div>
											</div>
											<div class="progress-info">
												<div class="progress">
													<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
														<span class="sr-only">品牌</span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
										<div class="dashboard-stat2 ">
											<div class="display">
												<div class="number">
													<h3 class="font-green-sharp">
														产品新增
													</h3>
													<small>今日数：<a href="/admin/product/list">{{$LatestProduct}}</a></small>
												</div>
												<div class="icon">
													<i class="fa fa-fw fa-bug"></i>
												</div>
											</div>
											<div class="progress-info">
												<div class="progress">
													<span style="width: 0%;" class="progress-bar progress-bar-success green-sharp">
														<span class="sr-only">产品</span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
										<div class="dashboard-stat2 ">
											<div class="display">
												<div class="number">
													<h3 class="font-green-sharp">
														订单新增
													</h3>
													<small>今日数：<a href="/admin/logistics/dynamic">{{$LatestDynamic}}</a></small>
												</div>
												<div class="icon">
													<i class="fa fa-fw fa-bullhorn"></i>
												</div>
											</div>
											<div class="progress-info">
												<div class="progress">
													<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
														<span class="sr-only">订单</span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
										<div class="dashboard-stat2 ">
											<div class="display">
												<div class="number">
													<h3 class="font-green-sharp">
														品牌总数
													</h3>
													<small>品牌数：{{$TotalBrand}}</small>
												</div>
												<div class="icon">
													<i class="fa fa-fw fa-heartbeat"></i>
												</div>
											</div>
											<div class="progress-info">
												<div class="progress">
													<span style="width: 0%;" class="progress-bar progress-bar-success green-sharp">
														<span class="sr-only">品牌</span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
										<div class="dashboard-stat2 ">
											<div class="display">
												<div class="number">
													<h3 class="font-green-sharp">
														产品总数
													</h3>
													<small>产品数：{{$TotalProduct}}</small>
												</div>
												<div class="icon">
													<i class="fa fa-fw fa-times-circle"></i>
												</div>
											</div>
											<div class="progress-info">
												<div class="progress">
													<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
														<span class="sr-only">产品</span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
										<div class="dashboard-stat2 ">
											<div class="display">
												<div class="number">
													<h3 class="font-green-sharp">
														订单总数
													</h3>
													<small>订单数：{{$TotalDynamic}}</small>
												</div>
												<div class="icon">
													<i class="fa fa-fw fa-info-circle"></i>
												</div>
											</div>
											<div class="progress-info">
												<div class="progress">
													<span style="width: 0%;" class="progress-bar progress-bar-success green-sharp">
														<span class="sr-only">订单</span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
										<div class="dashboard-stat2 ">
											<div class="display">
												<div class="number">
													<h3 class="font-green-sharp">
														用户总数
													</h3>
													<small>用户数：{{$TotalWechatUser}}</small>
												</div>
												<div class="icon">
													<i class="fa fa-fw fa-exclamation-triangle"></i>
												</div>
											</div>
											<div class="progress-info">
												<div class="progress">
													<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
														<span class="sr-only">用户</span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
										<div class="dashboard-stat2 ">
											<div class="display">
												<div class="number">
													<h3 class="font-green-sharp">
														店铺总数
													</h3>
													<small>店铺数：<a href="/admin/store/list">{{$TotalStore}}</a></small>
												</div>
												<div class="icon">
													<i class="fa fa-fw fa-exclamation-circle"></i>
												</div>
											</div>
											<div class="progress-info">
												<div class="progress">
													<span style="width: 0%;" class="progress-bar progress-bar-success green-sharp">
														<span class="sr-only">店铺</span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
										<div class="dashboard-stat2 ">
											<div class="display">
												<div class="number">
													<h3 class="font-green-sharp">
														求购总数
													</h3>
													<small>求购数：<a href="/admin/supply/list">{{$TotalDiscover}}</a></small>
												</div>
												<div class="icon">
													<i class="fa fa-fw fa-life-ring"></i>
												</div>
											</div>
											<div class="progress-info">
												<div class="progress">
													<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
														<span class="sr-only">求购</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
@endsection
@section('js')
@endsection

