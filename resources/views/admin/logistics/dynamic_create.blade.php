@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/plugins/md-editor/css/editormd.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/plugins/select2/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/plugins/uploadify/css/uploadify.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="page-bar">
	<ul class="page-breadcrumb">
	    <li>
	        <a href="{{url('admin')}}">{!! trans('labels.breadcrumb.home') !!}</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <a href="{{url('/admin/logistics/dynamic')}}">订单列表</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <span>动态添加</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">
                  <span class="caption-subject bold uppercase">动态添加</span>
              </div>
              <div class="actions">
                  <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
              </div>
          </div>
          <div class="portlet-body form">
          		@if (isset($errors) && count($errors) > 0 )
					    <div class="alert alert-danger">
					        <button class="close" data-close="alert"></button>
					        @foreach($errors->all() as $error)
					            <span class="help-block"><strong>{{ $error }}</strong></span>
					        @endforeach
					    </div>
					    @endif
              @include('flash::message')
              <form role="form" class="form-horizontal" method="POST" action="{{url('/admin/logistics/dynamic/add')}}">
					{!! csrf_field() !!}
                  <div class="form-body">
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="shop_name">货物名称</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="货物名称" value="{{old('store')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  <input type="hidden" id="nickName" name="nickName" value="MEATHOME" > 
					  <input type="hidden" id="avatarUrl" name="avatarUrl" value="https://images.mongoliaci.com/backend/uploads/20180606/20180606172311647.jpg" > 
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="weight">重量</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="weight" name="weight" placeholder="如：10吨/kg/g等" value="{{old('phone')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="delivery_address">装货地址</label>
                          <div class="col-md-10">
                              <textarea type="text" class="form-control"  id="delivery_address" name="delivery_address" placeholder="装货地址" value="{{old('address')}}"></textarea>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>                      
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="shipping_address">卸货地址</label>
                          <div class="col-md-10">
                              <textarea type="text" class="form-control"  id="shipping_address" name="shipping_address" placeholder="卸货地址" value="{{old('describe')}}"></textarea>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.brand_product.status')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="status" name="status" value="1" class="md-radiobtn" checked >
                                    <label for="status">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>未处理</label>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="form-actions">
                      <div class="row">
                          <div class="col-md-offset-2 col-md-10">
                              <a href="/admin/logistics/dynamic" class="btn default">{{trans('crud.cancel')}}</a>
                              <button type="submit" class="btn blue" id="submit">{{trans('crud.submit')}}</button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

@endsection
@section('js')
    <script src="{{asset('backend/plugins/md-editor/js/editormd.js')}}"></script>
@endsection