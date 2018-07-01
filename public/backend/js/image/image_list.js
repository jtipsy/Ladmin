var TableDatatablesAjax = function() {
    var datatableAjax = function(){
        dt = $('#datatable_ajax');
        ajax_datatable = dt.DataTable({
            "processing": true,
            "serverSide": true,
            "searching" : false,
            "ajax": {
                'url' : '/admin/image/select',
                "data": function ( d ) {
                    d.category_id = $('.filter select[name="category_id"] option:selected').val();
                    d.created_at_from = $('.filter input[name="created_at_from"]').val();
                    d.created_at_to = $('.filter input[name="created_at_to"]').val();
                }
            },
            "pagingType": "bootstrap_full_number",
            "order" : [],
            "orderCellsTop": true,
            "dom" : "<'row'<'col-sm-3'l><'col-sm-6'<'customtoolbar'>><'col-sm-3'f>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "columns": [	
				{
                    "data": "id",
                    "name" : "id",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },
                {
                    "data": "path",
                    "name": "path",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<img src="/backend/uploads/small/'+data+'" width="80" height="80" >';
					}
                },
                {
                    "data": "category_id",
                    "name": "category_id",
                    "orderable" : false,
				  render:function(data){
					if (data == 1) {
					  return '<span class="label label-success"> 首页轮播 </span>';
					}else if(data == 2){
					  return '<span class="label label-warning"> 产品报价 </span>';
					}else if(data == 3){
					  return '<span class="label label-success"> 其他 </span>';
					}else{
					  return '<span class="label label-danger"> Error1&0 </span>';
					}
				  }
                },
                {
                    "data": "created_at",
                    "name": "created_at",
                    "orderable" : true,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },
                {
                    "data": "webactionButton",
                    "name": "webactionButton",
                    "type": "html",
                    "orderable" : false,
                },

            ],
			
            "drawCallback": function( settings ) {
                ajax_datatable.$('.tooltips').tooltip( {
                    placement : 'top',
                    html : true
                });
            },
            "language": {
                url: '/i18n'
            }
        });

        dt.on('click', '.filter-submit', function(){
            ajax_datatable.ajax.reload();
        });

        dt.on('click', '.filter-cancel', function(){
            $('textarea.form-filter, select.form-filter, input.form-filter', dt).each(function() {
                $(this).val("");
            });

            $('select.form-filter').selectpicker('refresh');

            $('input.form-filter[type="checkbox"]', dt).each(function() {
                $(this).attr("checked", false);
            });
            ajax_datatable.ajax.reload();
        });

        $('.input-group.date').datepicker({
            autoclose: true
        });
        $(".bs-select").selectpicker({
            iconBase: "fa",
            tickIcon: "fa-check"
        });
    };

    return {
        init : datatableAjax
    }
}();
