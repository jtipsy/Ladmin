@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/plugins/md-editor/css/editormd.css')}}" rel="stylesheet" type="text/css" />
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
	        <span>{!! trans('labels.breadcrumb.articleEdit') !!}</span>
	    </li>
	</ul>
</div>
<div class="row margin-top-40">
  <div class="col-md-12">
      <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-green-haze">
                  <span class="caption-subject bold uppercase">{!! trans('labels.breadcrumb.articleEdit') !!}</span>
              </div>
              <div class="actions">
                  <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
              </div>
          </div>
          <div class="portlet-body form">

              <form role="form" class="form-horizontal" method="POST" action="/admin/article/{{$article['id']}}">
              		{!! csrf_field() !!}
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="id" value="{{$article['id']}}">
                  <div class="form-body">
                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="title">{{trans('labels.article.title')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="title" disabled name="title" placeholder="{{trans('labels.article.title')}}" value="{{$article['title']}}">
                              <div class="form-control-focus"> </div>
                          </div>

                          <label class="col-md-1 control-label" for="desc">{{trans('labels.article.desc')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="desc" disabled name="desc" placeholder="{{trans('labels.article.desc')}}" value="{{$article['desc']}}">
                              <div class="form-control-focus"> </div>
                          </div>

                          <label class="col-md-1 control-label" for="author">{{trans('labels.article.author')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="author" disabled name="author" placeholder="{{trans('labels.article.author')}}" value="{{$article['author']}}">
                              <div class="form-control-focus"> </div>
                          </div>

                      </div>



                      <div class="form-group form-md-line-input">
                          <label class="col-md-1 control-label" for="from">{{trans('labels.article.from')}}</label>
                          <div class="col-md-3">
                              <input type="text" class="form-control" id="from" disabled name="from" placeholder="{{trans('labels.article.from')}}" value="{{$article['from']}}">
                              <div class="form-control-focus"> </div>
                          </div>
                      </div>

                      <div class="form-group form-md-line-input">
                          <div id="test-editormd"></div>
                          <textarea name="content" class="hide" id="content">{{$article['content']}}</textarea>
                      </div>

                      <div class="form-group form-md-line-input">
                        <label class="col-md-2 control-label" for="form_control_1">{{trans('labels.role.status')}}</label>
                        <div class="col-md-10">
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="status1"  disabled name="status" value="{{config('admin.global.status.active')}}" class="md-radiobtn" @if($article['status'] == config('admin.global.status.active')) checked @endif>
                                    <label for="status1">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.role.active.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status2" disabled name="status" value="{{config('admin.global.status.audit')}}" class="md-radiobtn" @if($article['status'] === config('admin.global.status.audit')) checked @endif>
                                    <label for="status2">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.role.audit.1')}} </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="status3" disabled name="status" value="{{config('admin.global.status.trash')}}" class="md-radiobtn" @if($article['status'] == config('admin.global.status.trash')) checked @endif>
                                    <label for="status3">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{trans('strings.role.trash.1')}} </label>
                                </div>
                            </div>
                        </div>
                      </div>

                  </div>
                  <div class="hide">
                      <textarea id="article_content">
                          {{$article['content']}}
                      </textarea>
                  </div>
                  <div class="form-actions">
                      <div class="row">
                          <div class="col-md-offset-2 col-md-10">
                              <a href="/admin/article" class="btn default">{{trans('crud.cancel')}}</a>
                              <button type="submit" class="btn blue" disabled>{{trans('crud.submit')}}</button>
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
                imageUploadURL : "./php/upload.php",
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


        });
    </script>



    <script>
        /**
         * 弹出选择图片提示框
         */
        function showChoseImageDialog( cm, content ){


            layer.open({
                title:'选择图片',
                type: 2,//1：字符串；2:content填URL
                area: ['650px', '450px'],
                content: content ,//这里content是一个普通的String
                zIndex: layer.zIndex,
                btn: ['确认', '取消'],
                yes: function(layero, index){
                    var body = layer.getChildFrame('body', 0);
                    var size = body.find('.chose_icon').size();//选中数量
                    if(size <= 0){
                        layer.alert("请选择图片");
                        return;
                    }

                    //设置图片
                    var imagePath       = body.find(".chose_icon").attr("src");
                    // alert(imagePath);
                    //设置input值
                    $('.form-group').find('input[type=hidden]').val(imagePath);
                    //修改图片src属性
                    $('.form-group').find('img').attr('src', imagePath);
                    //var html = '<img  style="max-height:500px;max-width:500px" src="'+imagePath+'"/>';
                    //ue.execCommand("insertHtml",html);
                    cm.replaceSelection("![](" + imagePath +")");
                    layer.closeAll()

                },
                cancel: function(layero, index){
                    layer.closeAll()
                }
            });
        }

    </script>


@endsection