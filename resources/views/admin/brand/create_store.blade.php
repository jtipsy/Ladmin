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
	        <a href="{{url('admin/article')}}">{!! trans('labels.breadcrumb.brandList') !!}</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <span>{!! trans('labels.breadcrumb.CreateStore') !!}</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">
                  <span class="caption-subject bold uppercase">{!! trans('labels.breadcrumb.CreateStore') !!}</span>
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
              <form role="form" class="form-horizontal" method="POST" action="{{url('admin/brand/store/create')}}">
					{!! csrf_field() !!}
                  <div class="form-body">
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="brand_name">{{trans('labels.store.brand_name')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control"  value="{{$brand['name']}}" disabled="disabled">
                              <input type="hidden" class="form-control" id="brand_name" name="brand_name" value="{{$brand['name']}}">
                              <input type="hidden" class="form-control" id="brand_id" name="brand_id" value="{{$brand['id']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="name">{{trans('labels.store.name')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="name" name="name" placeholder="{{trans('labels.store.name')}}" value="{{old('store')}}">
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
									<img src="" id="logo_thum" width="200" height="200"/>
									<input type="hidden" id="logo" name="logo" value="{{old('logo')}}" > 
									<input id="file_logo" name="file_logo" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="type">{{trans('labels.store.type')}}</label>
                          <div class="col-md-3">
                                <select class="bs-select form-control form-filter" data-show-subtext="true" id="type" name="type">
                                  <option value="" data-icon="fa-glass icon-success">{{trans('labels.store.type')}}....</option>
                                    @if(trans('strings.store_type'))
                                      @foreach(trans('strings.store_type') as $status_key => $status_value)
                                        <option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}"> {{$status_value[1]}}</option>
                                      @endforeach
                                    @endif
                                </select>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="phone">{{trans('labels.store.phone')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="phone" name="phone" placeholder="{{trans('labels.store.phone')}}" value="{{old('phone')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="address">{{trans('labels.store.address')}}</label>
                          <div class="col-md-10">
                              <textarea type="text" class="form-control"  id="address" name="address" placeholder="{{trans('labels.store.address')}}" value="{{old('address')}}"></textarea>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>  
					  
                      <!--
                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="content">{{trans('labels.store.describe')}}</label>
                          <div class="col-md-8">
                              {!! UEditor::css() !!}
                              {!! UEditor::content() !!}
                              {!! UEditor::js() !!}
                          </div>

                      </div>
                      -->
                      <div class="form-group form-md-line-input">
                          <div id="test-editormd"></div>
                          <textarea name="describe" class="hide" id="content">{{old('describe')}}</textarea>
                      </div>
					  
                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.store.label')}}</label>
                        <div class="col-md-10">
                          <div class="md-checkbox-inline">
                              <div class="md-checkbox">
                                  <input type="checkbox" id="more1" name="more1" value="1" class="md-check" checked>
                                  <label for="more1">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.store.more1')}}</label>
                              </div>                              
							  <div class="md-checkbox">
                                  <input type="checkbox" id="more2" name="more2" value="2" class="md-check" >
                                  <label for="more2">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.store.more2')}}</label>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.brand_product.status')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
							@if(trans('strings.status'))
                                @foreach(trans('strings.status') as $status_key => $status_value)
                                <div class="md-radio">
                                    <input type="radio" id="status{{config('admin.global.status.'.$status_key)}}" name="status" value="{{config('admin.global.status.'.$status_key)}}" class="md-radiobtn" @if(config('admin.global.status.'.$status_key) ==1) checked @endif>
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