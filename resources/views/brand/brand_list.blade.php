@extends('brand.head')
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
          <a href="{{url('/37fb591be38db52dd1d5f04b689008f6')}}">{!! trans('labels.breadcrumb.home') !!}</a>
          <i class="fa fa-angle-right"></i>
      </li>
      <li>
          <span>{!! trans('labels.breadcrumb.brandList') !!}</span>
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
              <span class="caption-subject font-dark sbold uppercase">{{trans('labels.brand.title')}}</span>
            </div>
            <div class="actions">
                  <div class="btn-group">
                      <a href="{{url('/37fb591be38db52dd1d5f04b689008f8')}}" class="btn btn-success btn-outline btn-circle">
                          <i class="fa fa-user-plus"></i>
                          <span class="hidden-xs">{{trans('crud.create')}}</span>
                      </a>
                  </div>
            </div>
          </div>
            <div class="portlet-body">
              <div class="table-container table-responsive">
                <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                    <thead>
                        <tr role="row" class="heading">
                          <th width="8%"> {{ trans('labels.brand.logo') }} </th>
                          <th width="8%"> {{ trans('labels.brand.name') }} </th>
                          <th width="8%"> {{ trans('labels.brand.admin') }} </th>
                          <th width="20.5%"> {{ trans('labels.brand.enterprise') }} </th>
                          <th width="10%"> {{ trans('labels.brand.phone') }} </th>
						  <th width="6%">{{ trans('labels.brand.recommended') }} </th>
						  <th width="6%">{{ trans('labels.brand.status') }} </th>
                          <th width="11%"> {{ trans('labels.created_at') }} </th>
                          <th width="11%"> {{ trans('labels.updated_at') }} </th>
                          <th width="13%"> {{ trans('labels.action') }} </th>
                        </tr>
						<style>
							.ctr{
								margin-top:40px;
								text-align:center;
							}
						</style>
                        <tr role="row" class="filter">
                            <td>
                              <div class="form-group form-md-line-input">
                                <div class="input-group has-success">
                                    {{ trans('labels.brand.brand_logo') }}
                                    <div class="form-control-focus"> </div>
                                </div>
                              </div>
							</td>                            
							<td>
                              <div class="form-group form-md-line-input">
                                <div class="input-group has-success">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control form-filter" name="name" placeholder="{{ trans('labels.brand.name') }}">
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
                                    <input type="text" class="form-control form-filter" name="admin" placeholder="{{ trans('labels.brand.admin') }}">
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
                                    <input type="text" class="form-control form-filter" name="enterprise" placeholder="{{ trans('labels.brand.enterprise') }}">
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
                                      <input type="text" class="form-control form-filter" name="phone" placeholder="{{ trans('labels.brand.phone') }}">
                                      <div class="form-control-focus"> </div>
                                  </div>
                              </div>
                            </td>
                            <td>
                              <div class="form-group form-md-line-input">
                                <select class="bs-select form-control form-filter" data-show-subtext="true" name="recommended">
                                  <option value="" data-icon="fa-glass icon-success">{{ trans('labels.brand.recommended') }}....</option>
                                    @if(trans('strings.recommended'))
                                      @foreach(trans('strings.recommended') as $status_key => $status_value)
                                        <option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}"> {{$status_value[1]}}</option>
                                      @endforeach
                                    @endif
                                </select>
                              </div>
							 </td>                           
							 <td>
                              <div class="form-group form-md-line-input">
                                <select class="bs-select form-control form-filter" data-show-subtext="true" name="status">
                                  <option value="" data-icon="fa-glass icon-success">{{ trans('labels.brand.status') }}....</option>
                                    @if(trans('strings.brand'))
                                      @foreach(trans('strings.brand') as $status_key => $status_value)
                                        <option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}"> {{$status_value[1]}}</option>
                                      @endforeach
                                    @endif
                                </select>
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
<script type="text/javascript" src="{{asset('backend/js/brand/webbrand_list.js')}}"></script>
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