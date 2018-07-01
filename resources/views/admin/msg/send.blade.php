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
	        <a href="{{url('admin/msg/sendlist')}}">消息列表</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <span>群发消息</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">
                  <span class="caption-subject bold uppercase">群发消息</span>
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
              <form role="form" class="form-horizontal" method="POST" action="{{url('admin/msg/sending')}}">
					{!! csrf_field() !!}
                  <div class="form-body">
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="title">消息标题</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="title" name="title" placeholder="消息标题" value="{{old('title')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					                      
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="content">消息内容</label>
                          <div class="col-md-10">
                              <textarea type="text" class="form-control"  id="content" name="content" placeholder="消息内容" value="{{old('content')}}"></textarea>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  					  
                  </div>
                  <div class="form-actions">
                      <div class="row">
                          <div class="col-md-offset-2 col-md-10">
                              <a href="/admin/msg/senlist" class="btn default">{{trans('crud.cancel')}}</a>
                              <button type="submit" class="btn blue" id="submit">发送</button>
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