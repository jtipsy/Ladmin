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
	        <a href="{{url('admin/article')}}">{!! trans('labels.breadcrumb.productList') !!}</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <span>{!! trans('labels.breadcrumb.brandCreateProduct') !!}</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">
                  <span class="caption-subject bold uppercase">{!! trans('labels.breadcrumb.brandCreateProduct') !!}</span>
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
			  <form role="form" class="form-horizontal" method="POST" action="/admin/product/list/{{$product['id']}}">
              		{!! csrf_field() !!}
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="id" value="{{$product['id']}}">
                  <div class="form-body">
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="name">{{trans('labels.brand_product.name')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="name" name="name" value="{{$product['name']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  <style>
						.uploadify{display:inline-block;}
						.uploadify-button{border:none;border-radius:2px;margin-top:8px;}
						table.add_tab tr td span.uploadify-button-text{color:#FFF;margin:0;}
					  </style>
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="thumb">{{trans('labels.brand_product.thumb')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" placeholder="请上传1:1长宽比的正方形图片，建议尺寸100×100" disabled="disabled">
							  <div class="col-md-8 thumb-image" style="margin-top:6%;">
									<img src="{{$product['thumb']}}" id="logo_thum" width="200" height="200"/>
									<input type="hidden" id="thumb" name="thumb" value="{{$product['thumb']}}" > 
									<input id="file_logo" name="file_logo" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="species">{{trans('labels.brand_product.species')}}</label>
                          <div class="col-md-3">
                                <select class="bs-select form-control form-filter" data-show-subtext="true" id="species" name="species">
                                    @if(trans('strings.species'))
                                      @foreach(trans('strings.species') as $status_key => $status_value)
										@if(config('admin.global.status.'.$status_key) == $product['species'])
                                        <option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}" selected="selected">{{$status_value[1]}}...</option>						
										@else
										<option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}">{{$status_value[1]}}</option>
										@endif
										
                                      @endforeach
                                    @endif
                                </select>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>	
					  
                    <!--
                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="content">{{trans('labels.brand_product.describe')}}</label>
                          <div class="col-md-8">
                              {!! UEditor::css() !!}
                              {!! UEditor::content() !!}
                              {!! UEditor::js() !!}
                          </div>

                      </div>
                    -->

                      <div class="form-group form-md-line-input">
                          <div id="test-editormd"></div>
                          <textarea name="describe" class="hide" id="content">{{$product['describe']}}</textarea>
                      </div>
					  
					  <!--
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="describe">{{trans('labels.brand_product.describe')}}</label>
                          <div class="col-md-10">
                              <textarea type="text" class="form-control"  id="describe" name="describe" >{{$product['describe']}}</textarea>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  -->					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="price">{{trans('labels.brand_product.price')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="price" name="price" value="{{$product['price']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="specifications">{{trans('labels.brand_product.specifications')}}</label>
                          <div class="col-md-3">
                                <select class="bs-select form-control form-filter" data-show-subtext="true" id="species" name="species">
                                    @if(trans('strings.specifications'))
                                      @foreach(trans('strings.specifications') as $status_key => $status_value)
										@if(config('admin.global.status.'.$status_key) == $product['specifications'])
                                        <option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}" selected="selected">{{$status_value[1]}}...</option>						
										@else
										<option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}">{{$status_value[1]}}</option>
										@endif
										
                                      @endforeach
                                    @endif
                                </select>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="net_weight">{{trans('labels.brand_product.net_weight')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="net_weight" name="net_weight" value="{{$product['net_weight']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>						  					  
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="atlas1">{{trans('labels.brand_product.atlas')}}</label>
                          <div class="col-md-3" style="width:15%;">
                              <div class="col-md-8 thumb-image">
									<img src="{{$product['atlas1']}}" id="atlas1_thum" width="200" height="200"/>
									<input type="hidden" id="atlas1" name="atlas1" value="{{$product['atlas1']}}" >
									<input id="file_atlas1" name="file_atlas1" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div>                          
						  <div class="col-md-3" style="width:15%;">
                              <div class="col-md-8 thumb-image">
									<img src="{{$product['atlas2']}}" id="atlas2_thum" width="200" height="200"/>
									<input type="hidden" id="atlas2" name="atlas2" value="{{$product['atlas2']}}" >
									<input id="file_atlas2" name="file_atlas2" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div>  						  
						  <div class="col-md-3" style="width:15%;">
                              <div class="col-md-8 thumb-image">
									<img src="{{$product['atlas3']}}" id="atlas3_thum" width="200" height="200"/>
									<input type="hidden" id="atlas3" name="atlas3" value="{{$product['atlas3']}}" >
									<input id="file_atlas3" name="file_atlas3" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div> 						  
						  <div class="col-md-3" style="width:15%;">
                              <div class="col-md-8 thumb-image">
									<img src="{{$product['atlas4']}}" id="atlas4_thum" width="200" height="200"/>
									<input type="hidden" id="atlas4" name="atlas4" value="{{$product['atlas4']}}" >
									<input id="file_atlas4" name="file_atlas4" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="Country_of_origin">{{trans('labels.brand_product.Country_of_origin')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="Country_of_origin" name="Country_of_origin" value="{{$product['Country_of_origin']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  					  
                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.brand_product.Shipping_method')}}</label>
                        <div class="col-md-10">
                          <div class="md-checkbox-inline">
                              <div class="md-checkbox">
                                  <input type="checkbox" id="cold"  value="1" class="md-check" @if($product['cold'] == 1) checked @endif>
								  <input type="hidden" name="cold" value="{{$product['cold']}}" />
                                  <label for="cold">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.brand_product.cold')}}</label>
                              </div>                              
							  <div class="md-checkbox">
                                  <input type="checkbox" id="empty" value="2" class="md-check" @if($product['empty'] == 2) checked @endif>
								  <input type="hidden" name="empty" value="{{$product['empty']}}" />
                                  <label for="empty">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.brand_product.empty')}}</label>
                              </div>							  
							  <div class="md-checkbox">
                                  <input type="checkbox" id="courier" value="3" class="md-check" @if($product['courier'] == 3) checked @endif>
								  <input type="hidden" name="courier" value="{{$product['courier']}}" />
                                  <label for="courier">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.brand_product.courier')}}</label>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="Shipping_agency">{{trans('labels.brand_product.Shipping_agency')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="Shipping_agency" name="Shipping_agency" value="{{$product['Shipping_agency']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.brand_product.Selling_way')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
							@if(trans('strings.Selling_way'))
                                @foreach(trans('strings.Selling_way') as $status_key => $status_value)
                                <div class="md-radio">
                                    <input type="radio" id="Selling_way{{config('admin.global.status.'.$status_key)}}" name="Selling_way" value="{{config('admin.global.status.'.$status_key)}}" class="md-radiobtn" @if( config('admin.global.status.'.$status_key) == $product['Selling_way']) checked @endif>
                                    <label for="Selling_way{{config('admin.global.status.'.$status_key)}}">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{$status_value[1]}} </label>
                                </div>
                                @endforeach
							@endif
                            </div>
                        </div>
                      </div>                      
					  <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.brand_product.halal')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
							@if(trans('strings.halal'))
                                @foreach(trans('strings.halal') as $status_key => $status_value)
                                <div class="md-radio">
                                    <input type="radio" id="halal{{config('admin.global.status.'.$status_key)}}" name="halal" value="{{config('admin.global.status.'.$status_key)}}" class="md-radiobtn" @if( config('admin.global.status.'.$status_key) == $product['halal']) checked @endif>
                                    <label for="halal{{config('admin.global.status.'.$status_key)}}">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{$status_value[1]}} </label>
                                </div>
                                @endforeach
							@endif
                            </div>
                        </div>
                      </div>
                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.brand_product.level')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
							@if(trans('strings.level'))
                                @foreach(trans('strings.level') as $status_key => $status_value)
                                <div class="md-radio">
                                    <input type="radio" id="level{{config('admin.global.status.'.$status_key)}}" name="level" value="{{config('admin.global.status.'.$status_key)}}" class="md-radiobtn" @if( config('admin.global.status.'.$status_key) == $product['level']) checked @endif>
                                    <label for="level{{config('admin.global.status.'.$status_key)}}">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{$status_value[1]}} </label>
                                </div>
                                @endforeach
							@endif
                            </div>
                        </div>
                      </div>
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="varieties">{{trans('labels.brand_product.varieties')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="varieties" name="varieties" value="{{$product['varieties']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>                      
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="Shelf_life">{{trans('labels.brand_product.Shelf_life')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="Shelf_life" name="Shelf_life" value="{{$product['Shelf_life']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="Storage_way">{{trans('labels.brand_product.Storage_way')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="Storage_way" name="Storage_way" value="{{$product['Storage_way']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="temperature">{{trans('labels.brand_product.temperature')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="temperature" name="temperature" value="{{$product['temperature']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="warehouse_address">{{trans('labels.brand_product.warehouse_address')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="warehouse_address" name="warehouse_address" value="{{$product['warehouse_address']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="Production_license_number">{{trans('labels.brand_product.Production_license_number')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="Production_license_number" name="Production_license_number"  value="{{$product['Production_license_number']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="Production_standard_no">{{trans('labels.brand_product.Production_standard_no')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="Production_standard_no" name="Production_standard_no" value="{{$product['Production_standard_no']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.brand_product.status')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
							@if(trans('strings.status'))
                                @foreach(trans('strings.status') as $status_key => $status_value)
                                <div class="md-radio">
                                    <input type="radio" id="status{{config('admin.global.status.'.$status_key)}}" name="status" value="{{config('admin.global.status.'.$status_key)}}" class="md-radiobtn" @if( config('admin.global.status.'.$status_key) == $product['status']) checked @endif>
                                    <label for="status{{config('admin.global.status.'.$status_key)}}">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{$status_value[1]}} </label>
                                </div>
                                @endforeach
							@endif
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="form-actions">
                      <div class="row">
                          <div class="col-md-offset-2 col-md-10">
                              <a href="/admin/article" class="btn default">{{trans('crud.cancel')}}</a>
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
	<script src="{{asset('backend/plugins/uploadify/js/jquery.uploadify.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
	<?php $timestamp = time();?>
	$(function() {
		$('#file_logo').uploadify({
			'buttonText' : '{{trans("labels.brand_product.thumb")}}',
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'_token'     : "{{csrf_token()}}"
			},
			'swf'      : "{{asset('backend/plugins/uploadify/uploadify.swf')}}",
			'uploader' : "{{url('admin/upload')}}",
			'onUploadSuccess' : function(file, data, response) {
				$('#logo_thum').attr('src',data);
				$('input[name=thumb]').val(data);
			}
		});		
		$('#file_atlas1').uploadify({
			'buttonText' : '{{trans("labels.brand_product.atlas1")}}',
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'_token'     : "{{csrf_token()}}"
			},
			'swf'      : "{{asset('backend/plugins/uploadify/uploadify.swf')}}",
			'uploader' : "{{url('admin/upload')}}",
			'onUploadSuccess' : function(file, data, response) {
				$('#atlas1_thum').attr('src',data);
				$('input[name=atlas1]').val(data);
			}
		});		
		$('#file_atlas2').uploadify({
			'buttonText' : '{{trans("labels.brand_product.atlas2")}}',
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'_token'     : "{{csrf_token()}}"
			},
			'swf'      : "{{asset('backend/plugins/uploadify/uploadify.swf')}}",
			'uploader' : "{{url('admin/upload')}}",
			'onUploadSuccess' : function(file, data, response) {
				$('#atlas2_thum').attr('src',data);
				$('input[name=atlas2]').val(data);
			}
		});		
		$('#file_atlas3').uploadify({
			'buttonText' : '{{trans("labels.brand_product.atlas3")}}',
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'_token'     : "{{csrf_token()}}"
			},
			'swf'      : "{{asset('backend/plugins/uploadify/uploadify.swf')}}",
			'uploader' : "{{url('admin/upload')}}",
			'onUploadSuccess' : function(file, data, response) {
				$('#atlas3_thum').attr('src',data);
				$('input[name=atlas3]').val(data);
			}
		});		
		$('#file_atlas4').uploadify({
			'buttonText' : '{{trans("labels.brand_product.atlas4")}}',
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'_token'     : "{{csrf_token()}}"
			},
			'swf'      : "{{asset('backend/plugins/uploadify/uploadify.swf')}}",
			'uploader' : "{{url('admin/upload')}}",
			'onUploadSuccess' : function(file, data, response) {
				$('#atlas4_thum').attr('src',data);
				$('input[name=atlas4]').val(data);
			}
		}); 
		$("#cold").change(function() { 
			var data = $('input[name=cold]').val();
			var status = 1;
			var status2 = 0;
			if(data==1){
				$('input[name=cold]').val(status2);
			}else{
				$('input[name=cold]').val(status);
			}
		});			
		$("#empty").change(function() { 
			var data = $('input[name=empty]').val();
			var status = 2;
			var status2 = 0;
			if(data==2){
				$('input[name=empty]').val(status2);
			}else{
				$('input[name=empty]').val(status);
			}
		});			
		$("#courier").change(function() { 
			var data = $('input[name=courier]').val();
			var status = 3;
			var status2 = 0;
			if(data==3){
				$('input[name=courier]').val(status2);
			}else{
				$('input[name=courier]').val(status);
			}
		});
	});
	</script>
    <script type="text/javascript">
        var testEditor;
        var content;
        var md ;

        $(function() {
            md =  $("#content").val();
            testEditor = editormd("test-editormd", {
                width: "90%",
                height: 740,
                path : '/backend/plugins/md-editor/lib/',
                toolbarIcons : function() {

                    return ["undo", "redo", "|", "bold", "del", "italic", "quote",
                        "ucwords", "uppercase", "lowercase", "|", "h1", "h2", "h3",
                        "h4", "h5", "h6", "|", "list-ul", "list-ol", "hr", "|", "link",
                        "reference-link", "image", "myImage", "code", "preformatted-text", "code-block",
                        "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
                        "goto-line", "watch", "preview", "fullscreen", "clear", "search", "|", "help", "info"];

                },
                toolbarIconsClass : {
                    myImage : "fa-file-picture-o"  // 指定一个FontAawsome的图标类
                },
                // 自定义工具栏按钮的事件处理
                toolbarHandlers : {
                    myImage : function(cm, icon, cursor, selection) {
                        showChoseImageDialog(cm,"{{url('admin/image/lib')}}");


                    }
                },
                //theme : "dark",
                //previewTheme : "dark",
                //editorTheme : "pastel-on-dark",
                markdown : md,
                codeFold : true,
                //syncScrolling : false,
                saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
                searchReplace : true,
                //watch : false,                // 关闭实时预览
                htmlDecode : "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启
                //toolbar  : false,             //关闭工具栏
                //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
                emoji : true,
                taskList : true,
                tocm            : true,         // Using [TOCM]
                tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                flowChart : true,             // 开启流程图支持，默认关闭
                sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
                //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
                //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
                //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
                //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
                //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
                imageUpload : true,
                imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                //imageUploadURL : "./php/upload.php",
                imageUploadURL : "{{url('admin/editor')}}",
                onload : function() {
                    console.log('onload', this);
                    //this.fullscreen();
                    //this.unwatch();
                    //this.watch().fullscreen();

                    //this.setMarkdown("#PHP");
                    //this.width("100%");
                    //this.height(480);
                    //this.resize("100%", 640);
                }
            });
            $("#submit").on('click',function(){
                content = testEditor.getMarkdown();
                $("#content").val(content);
            });

            //选择封面
            $(".thumb-image").on("click",function() {
                showChoseImageDialog('',"{{url('admin/image/lib')}}");
            });
        });
    </script>
@endsection