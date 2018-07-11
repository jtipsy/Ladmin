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
	        <span>{!! trans('labels.breadcrumb.brandCreate') !!}</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">
                  <span class="caption-subject bold uppercase">{!! trans('labels.breadcrumb.brandCreate') !!}</span>
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
              <form role="form" class="form-horizontal" method="POST" action="{{url('admin/brand/create')}}">
              		{!! csrf_field() !!}
                
                  <div class="form-body">
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="name">{{trans('labels.brand.name')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="name" name="name" placeholder="{{trans('labels.brand.name')}}" value="{{old('name')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="admin_name">{{trans('labels.brand.admin')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="{{trans('labels.brand.admin')}}" value="{{old('admin_name')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>
					  <style>
						.uploadify{display:inline-block;}
						.uploadify-button{border:none;border-radius:2px;margin-top:8px;}
						table.add_tab tr td span.uploadify-button-text{color:#FFF;margin:0;}
					  </style>
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="logo">{{trans('labels.brand.logo')}}</label>
                          <div class="col-md-3">
                              <div class="col-md-8 thumb-image">
									<img src="" id="logo_thum" width="200" height="200"/>
									<input type="hidden" id="logo" name="logo" value="{{old('logo')}}" > 
									<input id="file_logo" name="file_logo" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="enterprise">{{trans('labels.brand.enterprise')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="enterprise" name="enterprise" placeholder="{{trans('labels.brand.enterprise')}}" value="{{old('enterprise')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="phone">{{trans('labels.brand.phone')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="phone" name="phone" placeholder="{{trans('labels.brand.phone')}}" value="{{old('phone')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
					  <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="address">{{trans('labels.brand.address')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="address" name="address" placeholder="{{trans('labels.brand.address')}}" value="{{old('address')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>					  
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="atlas1">{{trans('labels.brand.atlas')}}</label>
                          <div class="col-md-3" style="width:15%;">
                              <div class="col-md-8 thumb-image">
									<img src="" id="atlas1_thum" width="200" height="200"/>
									<input type="hidden" id="atlas1" name="atlas1" value="{{old('atlas1')}}" >
									<input id="file_atlas1" name="file_atlas1" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div>                          
						  <div class="col-md-3" style="width:15%;">
                              <div class="col-md-8 thumb-image">
									<img src="" id="atlas2_thum" width="200" height="200"/>
									<input type="hidden" id="atlas2" name="atlas2" value="{{old('atlas2')}}" >
									<input id="file_atlas2" name="file_atlas2" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div>  						  
						  <div class="col-md-3" style="width:15%;">
                              <div class="col-md-8 thumb-image">
									<img src="" id="atlas3_thum" width="200" height="200"/>
									<input type="hidden" id="atlas3" name="atlas3" value="{{old('atlas3')}}" >
									<input id="file_atlas3" name="file_atlas3" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div> 						  
						  <div class="col-md-3" style="width:15%;">
                              <div class="col-md-8 thumb-image">
									<img src="" id="atlas4_thum" width="200" height="200"/>
									<input type="hidden" id="atlas4" name="atlas4" value="{{old('atlas4')}}" >
									<input id="file_atlas4" name="file_atlas4" type="file" multiple="true">
                              </div>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>                     
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="sort">{{trans('labels.brand.sort')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="sort" name="sort" placeholder="{{trans('labels.brand.sort')}}" value="{{old('sort')}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div> 
                      <!--
                      <div class="form-group form-md-line-input">
                          <label class="col-md-2 control-label" for="content">{{trans('labels.article.content')}}</label>
                          <div class="col-md-8">
                              {!! UEditor::css() !!}
                              {!! UEditor::content() !!}
                              {!! UEditor::js() !!}
                          </div>

                      </div>
                      -->
                      <div class="form-group form-md-line-input">
                          <div id="test-editormd"></div>
                          <textarea name="content" class="hide" id="content"></textarea>
                      </div>
					  
					  
					  <!--
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="sort">{{trans('labels.brand.describe')}}</label>
                          <div class="col-md-10">
                              <textarea type="text" class="form-control"  id="describe" name="describe" placeholder="{{trans('labels.brand.describe')}}" value="{{old('describe')}}"></textarea>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div> 
					  -->
                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.brand.level')}}</label>
                        <div class="col-md-10">
                          <div class="md-checkbox-inline">
                              <div class="md-checkbox">
                                  <input type="checkbox" id="level1" name="level1" value="1" class="md-check" checked>
                                  <label for="level1">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.brand.level1')}}</label>
                              </div>                              
							  <div class="md-checkbox">
                                  <input type="checkbox" id="level2" name="level2" value="2" class="md-check" >
                                  <label for="level2">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.brand.level2')}}</label>
                              </div>							  
							  <div class="md-checkbox">
                                  <input type="checkbox" id="level3" name="level3" value="3" class="md-check" >
                                  <label for="level3">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.brand.level3')}}</label>
                              </div>							  
							  <div class="md-checkbox">
                                  <input type="checkbox" id="level4" name="level4" value="4" class="md-check" >
                                  <label for="level4">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.brand.level4')}}</label>
                              </div>							 
							  <div class="md-checkbox">
                                  <input type="checkbox" id="level5" name="level5" value="5" class="md-check" >
                                  <label for="level5">
                                      <span></span>
                                      <span class="check"></span>
                                      <span class="box"></span>{{trans('labels.brand.level5')}}</label>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.brand.status')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="status1" name="status" value="{{config('admin.global.status.active')}}" class="md-radiobtn" @if(old('status') == config('admin.global.status.active')) checked @endif>
                                    <label for="status1">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('labels.brand.on')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status2" name="status" value="{{config('admin.global.status.audit')}}" class="md-radiobtn" @if(old('status') === config('admin.global.status.audit')) checked @endif>
                                    <label for="status2">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('labels.brand.off')}} </label>
                                </div>
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
			'buttonText' : '选择LOGO',
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'_token'     : "{{csrf_token()}}"
			},
			'swf'      : "{{asset('backend/plugins/uploadify/uploadify.swf')}}",
			'uploader' : "{{url('admin/upload')}}",
			'onUploadSuccess' : function(file, data, response) {
				$('#logo_thum').attr('src',data);
				$('input[name=logo]').val(data);
			}
		});		
		$('#file_atlas1').uploadify({
			'buttonText' : '上传图集1',
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
			'buttonText' : '上传图集2',
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
			'buttonText' : '上传图集3',
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
			'buttonText' : '上传图集4',
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
   /*          $(".thumb-image").on("click",function() {
                showChoseImageDialog('',"{{url('admin/image/lib')}}");
            }); */
        });
    </script>
@endsection