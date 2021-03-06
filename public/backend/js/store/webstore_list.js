var TableDatatablesAjax = function() {
    var datatableAjax = function(){
        dt = $('#datatable_ajax');
        ajax_datatable = dt.DataTable({
            "processing": true,
            "serverSide": true,
            "searching" : false,
            "ajax": {
                'url' : '/37fb591be38db52dd1d5f04b689008f2',
                "data": function ( d ) {
                    d.name = $('.filter input[name="name"]').val();
                    d.brand_name = $('.filter input[name="brand_name"]').val();
                    d.type = $('.filter select[name="type"] option:selected').val();
                    d.phone= $('.filter input[name="phone"]').val();
                    d.recommended = $('.filter select[name="recommended"] option:selected').val();
                    d.status = $('.filter select[name="status"] option:selected').val();
                    d.created_at_from = $('.filter input[name="created_at_from"]').val();
                    d.created_at_to = $('.filter input[name="created_at_to"]').val();
                    d.updated_at_from = $('.filter input[name="updated_at_from"]').val();
                    d.updated_at_to = $('.filter input[name="updated_at_to"]').val();
                }
            },
            "pagingType": "bootstrap_full_number",
            "order" : [],
            "orderCellsTop": true,
            "dom" : "<'row'<'col-sm-3'l><'col-sm-6'<'customtoolbar'>><'col-sm-3'f>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "columns": [	
				{
                    "data": "name",
                    "name" : "name",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },
                {
                    "data": "brand_name",
                    "name": "brand_name",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },
                {
                    "data": "type",
                    "name": "type",
                    "orderable" : false,
				  render:function(data){
					if (data == 1) {
					  return '<span class="label label-success"> 直营店 </span>';
					}else if(data == 2){
					  return '<span class="label label-warning"> 专营店 </span>';
					}else if(data == 3){
					  return '<span class="label label-success"> 综合店 </span>';
					}else if(data == 4){
					  return '<span class="label label-warning"> 代理商 </span>';
					}else{
					  return '<span class="label label-danger"> Error1&0 </span>';
					}
				  }
                },                
                {
                    "data": "phone",
                    "name": "phone",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },                
				{ 
				  "data": "recommended",
				  "name": "recommended",
				  "orderable" : true,
				  render:function(data){
					if (data == 1) {
					  return '<span class="label label-success"> 推荐 </span>';
					}else if(data == 2){
					  return '<span class="label label-warning"> 否 </span>';
					}else{
					  return '<span class="label label-danger"> Error1&0 </span>';
					}
				  }
				},				
				{ 
				  "data": "status",
				  "name": "status",
				  "orderable" : true,
				  render:function(data){
					if (data == 1) {
					  return '<span class="label label-success"> 开启 </span>';
					}else if(data == 2){
					  return '<span class="label label-warning"> 关闭 </span>';
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
                    "data": "updated_at",
                    "name": "updated_at",
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
