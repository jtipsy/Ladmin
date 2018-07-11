@extends('layouts.admin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/datatables/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.min.css')}}">
@endsection
@section('content')
<div class="page-bar">
  <ul class="page-breadcrumb">
      <li>
          <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
          <i class="fa fa-angle-right"></i>
      </li>
      <li>
          <span>求购列表</span>
      </li>
  </ul>
</div>
<!-- END PAGE BAR -->
<div class="row margin-top-40">
    <div class="col-md-12">
        @include('flash::message')
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
          <div class="portlet-title">
            <div class="caption">
              <i class="icon-settings font-dark"></i>
              <span class="caption-subject font-dark sbold uppercase">求购列表</span>
            </div>
          </div>
            <div class="portlet-body">
              <div class="table-container">
                <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                    <thead>
                        <tr role="row" class="heading">
                          <th width="20%" style="min-width:50rpx;">头像</th>
                          <th width="12%"> 昵称 </th>
                          <th width="12%"> 手机号 </th>
                          <th width="12%"> 求购内容 </th>
						  <th width="5%">状态 </th>
						  <th width="5%">浏览数 </th>
                          <th width="11%"> {{ trans('labels.created_at') }} </th>
                          <th width="11%"> {{ trans('labels.updated_at') }} </th>
                          <th width="13%"> {{ trans('labels.action') }} </th>
                        </tr>
						<style>
							.ctr{
								margin-top:22px;
								text-align:center;
							}
						</style>
                        <tr role="row" class="filter">                         
							<td>
                              <div class="form-group form-md-line-input">
                                <div class="input-group has-success">
                                    用户头像
                                    <div class="form-control-focus"> </div>
                                </div>
                              </div>
							</td>
                            <td> 
                              <div class="form-group form-md-line-input">
                                <div class="input-group has-success">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" class="form-control form-filter" name="nickName" placeholder="用户昵称">
                                    <div class="form-control-focus"> </div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="form-group form-md-line-input">
                                  <div class="input-group has-success">
                                    <span class="input-group-addon">
                                        <i class="fa fa-book"></i>
                                    </span>
                                      <input type="text" class="form-control form-filter" name="phone" placeholder="用户手机">
                                      <div class="form-control-focus"> </div>
                                  </div>
                              </div>
                            </td>                         
							<td>
                              <div class="form-group form-md-line-input">
                                  <div class="input-group has-success">
										求购内容
                                      <div class="form-control-focus"> </div>
                                  </div>
                              </div>
                            </td>							
                            <td>
                              <div class="form-group form-md-line-input">
                                <select class="bs-select form-control form-filter" data-show-subtext="true" name="status">
                                  <option value="" data-icon="fa-glass icon-success">状态....</option>
                                  <option value="1" data-icon="fa fa-paw"> 未处理 </option>
                                  <option value="2" data-icon="fa fa-navicon"> 已处理 </option>
                                </select>
                              </div>
							</td>						
							<td>
                              <div class="form-group form-md-line-input">
                                  <div class="input-group has-success">
										浏览数
                                      <div class="form-control-focus"> </div>
                                  </div>
                              </div>
                            </td>
                            <td>
                              <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control form-filter input-sm" readonly placeholder="From" name="created_at_from">
                                <span class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </span>
                              </div>

                              <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control form-filter input-sm" readonly placeholder="To" name="created_at_to">
                                <span class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </span>
                              </div>
                            <td>
                                <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
                                  <input type="text" class="form-control form-filter input-sm" readonly placeholder="From" name="updated_at_from">
                                  <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </span>
                                </div>

                                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                  <input type="text" class="form-control form-filter input-sm" readonly placeholder="To" name="updated_at_to">
                                  <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </span>
                                </div>
                            </td>
                            <td>
                                <div class="margin-bottom-5">
                                    <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                        <i class="fa fa-search"></i> 搜索</button>
                                </div>
                                <button class="btn btn-sm red btn-outline filter-cancel">
                                    <i class="fa fa-times"></i> 重置</button>
                            </td>
                        </tr>
                    </thead>
                    <tbody> </tbody>
                </table>
              </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('backend/plugins/datatables/datatables.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/supply/supply_list.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/plugins/layer/layer.js')}}"></script>
<script type="text/javascript">
  $(function() {
    TableDatatablesAjax.init();
    $(document).on('click','#destory',function() {
      layer.msg('{{trans('alerts.deleteTitle')}}', {
        time: 0, //不自动关闭
        btn: ['{{trans('crud.destory')}}', '{{trans('crud.cancel')}}'],
        icon: 5,
        yes: function(index){
          $('form[name="delete_item"]').submit();
          layer.close(index);
        }
      });
    });
  });
</script>
@endsection