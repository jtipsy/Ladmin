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
          <a href="{{url('admin/')}}">{!! trans('labels.breadcrumb.home') !!}</a>
          <i class="fa fa-angle-right"></i>
      </li>
      <li>
          <span>{!! trans('labels.breadcrumb.productList') !!}</span>
      </li>
  </ul>
</div>
<!-- END PAGE BAR -->
<div class="row margin-top-40">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
          <div class="portlet-title">
            <div class="caption">
              <i class="icon-settings font-dark"></i>
              <span class="caption-subject font-dark sbold uppercase">{{trans('labels.brand_product.title')}}</span>
            </div>
	          <div class="actions">
                  <div class="btn-group">
                      <a href="{{url('/37fb591be38db52dd1d5f04b689008a5')}}" class="btn btn-success btn-outline btn-circle">
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
                          <th width="6.8%"> {{ trans('labels.brand_product.thumb') }} </th>
                          <th width="16%"> {{ trans('labels.brand_product.name') }} </th>
                          <th width="10%"> {{ trans('labels.brand_product.brand_name') }} </th>
                          <th width="5%"> {{ trans('labels.brand_product.species') }} </th>
                          <th width="5%"> {{ trans('labels.brand_product.level') }} </th>
						  <th width="9%">{{ trans('labels.brand_product.price') }} </th>
						  <th width="5%">{{ trans('labels.brand_product.specifications') }} </th>
						  <th width="5%">{{ trans('labels.brand.recommended') }} </th>
						  <th width="5%">{{ trans('labels.brand_product.status') }} </th>
						  <th width="9%">{{ trans('labels.brand_product.view_count') }} </th>
                          <th width="13%"> {{ trans('labels.created_at') }} </th>
                          <th width="4%"> {{ trans('labels.action') }} </th>
                        </tr>
						<style>
							.ctr{
								margin-top:35px;
								text-align:center;
							}
						</style>
                        <tr role="row" class="filter">
                            <td>
                              <div class="form-group form-md-line-input">
                                <div class="input-group has-success" style="margin-left:27px;">
                                    {{ trans('labels.brand_product.thumb') }}
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
                                    <input type="text" class="form-control form-filter" name="name" placeholder="{{ trans('labels.brand_product.name') }}">
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
                                    <input type="text" class="form-control form-filter" name="brand_name" placeholder="{{ trans('labels.brand_product.brand_name') }}">
                                    <div class="form-control-focus"> </div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="form-group form-md-line-input">
                                <select class="bs-select form-control form-filter" data-show-subtext="true" name="species">
                                  <option value="" data-icon="fa-glass icon-success">种类....</option>
                                    @if(trans('strings.species'))
                                      @foreach(trans('strings.species') as $status_key => $status_value)
                                        <option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}"> {{$status_value[1]}}</option>
                                      @endforeach
                                    @endif
                                </select>
                              </div>
							</td>
                            <td>
                              <div class="form-group form-md-line-input">
                                <select class="bs-select form-control form-filter" data-show-subtext="true" name="level">
                                  <option value="" data-icon="fa-glass icon-success">等级....</option>
                                    @if(trans('strings.level'))
                                      @foreach(trans('strings.level') as $status_key => $status_value)
                                        <option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}"> {{$status_value[1]}}</option>
                                      @endforeach
                                    @endif
                                </select>
                              </div>
							</td>							
							<td>
                              <div class="form-group form-md-line-input">
                                  <div class="input-group has-success">
                                    <span class="input-group-addon">
                                        <i class="fa fa-book"></i>
                                    </span>
                                      <input type="text" class="form-control form-filter" name="price" placeholder="{{ trans('labels.brand_product.price') }}">
                                      <div class="form-control-focus"> </div>
                                  </div>
                              </div>
                            </td>
                            <td>
                              <div class="form-group form-md-line-input">
                                <select class="bs-select form-control form-filter" data-show-subtext="true" name="specifications">
                                  <option value="" data-icon="fa-glass icon-success">规格....</option>
                                    @if(trans('strings.specifications'))
                                      @foreach(trans('strings.specifications') as $status_key => $status_value)
                                        <option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}"> {{$status_value[1]}}</option>
                                      @endforeach
                                    @endif
                                </select>
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
                                  <option value="" data-icon="fa-glass icon-success">状态....</option>
                                    @if(trans('strings.brand'))
                                      @foreach(trans('strings.brand') as $status_key => $status_value)
                                        <option value="{{config('admin.global.status.'.$status_key)}}" data-icon="{{$status_value[0]}}"> {{$status_value[1]}}</option>
                                      @endforeach
                                    @endif
                                </select>
                              </div>
							</td>
							<td>
                              <div class="form-group form-md-line-input">
                                  <div class="input-group has-success">
                                      {{ trans('labels.brand_product.view_count') }}
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
<script type="text/javascript" src="{{asset('backend/js/product/webproduct_list.js')}}"></script>
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