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
	        <a href="{{url('admin/article')}}">{!! trans('labels.breadcrumb.articleList') !!}</a>
	        <i class="fa fa-angle-right"></i>
	    </li>
	    <li>
	        <span>{!! trans('labels.breadcrumb.articleCreate') !!}</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">
                  <span class="caption-subject bold uppercase">{!! trans('labels.breadcrumb.articleCreate') !!}</span>
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
              <form role="form" class="form-horizontal" method="POST" action="{{url('admin/article')}}">
              		{!! csrf_field() !!}
                
                  <div class="form-body">
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="title">{{trans('labels.article.title')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="title" name="title" placeholder="{{trans('labels.article.title')}}" value="{{old('title')}}">
                              <div class="form-control-focus"> </div>
                          </div>


                          <label class="col-md-1 control-label" for="from">{{trans('labels.article.from')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="from" name="from" placeholder="{{trans('labels.article.from')}}" value="{{old('from')}}">
                              <div class="form-control-focus"> </div>
                          </div>


                          <label class="col-md-1 control-label" for="author">{{trans('labels.article.author')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="author" name="author" placeholder="{{trans('labels.article.author')}}" value="{{old('author')}}">
                              <div class="form-control-focus"> </div>
                          </div>

                      </div>


                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="desc">{{trans('labels.article.desc')}}</label>
                          <div class="col-md-10">
                              <textarea type="text" class="form-control"  id="desc" name="desc" placeholder="{{trans('labels.article.desc')}}" value="{{old('desc')}}"></textarea>
                              <div class="form-control-focus"> </div>
                          </div>


                      </div>

                      <div class="form-group form-md-line-input">

                          <label class="col-md-1 control-label" >文章分类</label>
                          <div class="col-md-5">
                              <select name="category_id" class="col-md-5">
                                  @foreach($category_list as $category)
                                      <option value="{{$category['id']}}">{{$category['name']}}</option>
                                  @endforeach
                              </select>
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

					  <style>
						.uploadify{display:inline-block;}
						.uploadify-button{border:none;border-radius:2px;margin-top:8px;}
						table.add_tab tr td span.uploadify-button-text{color:#FFF;margin:0;}
					  </style>
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="logo">封面</label>
                          <div class="col-md-3">
                              <div class="col-md-8 thumb-image">
									<img src="" id="logo_thum" width="200" height="200"/>
									<input type="hidden" id="thumb" name="thumb" value="{{old('thumb')}}" > 
									<input id="file_logo" name="file_logo" type="file" multiple="true">
                              </div>
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


                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.role.status')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="status1" name="status" value="{{config('admin.global.status.active')}}" class="md-radiobtn" @if(old('status') == config('admin.global.status.active')) checked @endif>
                                    <label for="status1">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.role.active.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status2" name="status" value="{{config('admin.global.status.audit')}}" class="md-radiobtn" @if(old('status') === config('admin.global.status.audit')) checked @endif>
                                    <label for="status2">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.role.audit.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status3" name="status" value="{{config('admin.global.status.trash')}}" class="md-radiobtn" @if(old('status') == config('admin.global.status.trash')) checked @endif>
                                    <label for="status3">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.role.trash.1')}} </label>
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
				'buttonText' : '选择封面',
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
        var md = "{{old('content')}}";

        $(function() {

            testEditor = editormd("test-editormd", {
                width: "90%",
                height: 740,
                path : '/backend/plugins/md-editor/lib/',
                toolbarIcons : function() {

                    return ["undo", "redo", "|", "bold", "del", "italic", "quote",
                        "ucwords", "uppercase", "lowercase", "|", "h1", "h2", "h3",
                        "h4", "h5", "h6", "|", "list-ul", "list-ol", "hr", "|", "link",
                       // "reference-link", "image", "myImage", "code", "preformatted-text", "code-block",
                        "reference-link","code", "preformatted-text", "code-block",
                        "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
                        "goto-line", "watch", "preview", "fullscreen", "clear", "search", "|", "help", "info"];
                    // Or return editormd.toolbarModes[name]; // full, simple, mini
                    // Using "||" set icons align right.
                    //return ["undo", "redo", "|", "bold", "hr", "|", "preview", "watch", "|", "fullscreen", "info"]
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
                placeholder : "请输入markdown内容",
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
                imageUploadURL : "{{url('admin/editor')}}",
                onload : function() {
                    console.log('onload', this);

                }
            });
            $("#submit").on('click',function(){
                content = testEditor.getMarkdown();
                $("#content").val(content);
            });


        });

        //选择封面
        $(".thumb-image").on("click",function() {
            showChoseImageDialog('',"{{url('admin/image/lib')}}");
        });
    </script>
@endsection