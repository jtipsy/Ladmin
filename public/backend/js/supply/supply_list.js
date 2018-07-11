var TableDatatablesAjax = function() {
    var datatableAjax = function(){
        dt = $('#datatable_ajax');
        ajax_datatable = dt.DataTable({
            "processing": true,
            "serverSide": true,
            "searching" : false,
            "ajax": {
                'url' : '/admin/supply/list',
                "data": function ( d ) {
					d.nickName = $('.filter input[name="nickName"]').val();
					d.num = $('.filter input[name="phone"]').val();
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
                    "data": "avatarUrl",
                    "name" : "avatarUrl",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<img src="'+data+'" width="100" height="100" >';
					}
                },	
                {
                    "data": "nickName",
                    "name": "nickName",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },                
				{
                    "data": "num",
                    "name": "num",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },				
				{
                    "data": "content",
                    "name": "content",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },	
				{ 
				  "data": "status",
				  "name": "status",
				  "orderable" : false,
				  render:function(data){
					if (data == 1) {
					  return '<span class="label label-warning"> 未处理 </span>';
					}else if(data == 2){
					  return '<span class="label label-success"> 已处理 </span>';
					}else{
					  return '<span class="label label-danger"> Error1&0 </span>';
					}
				  }
				},				
				{
                    "data": "view_count",
                    "name": "view_count",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },
                {
                    "data": "created_at",
                    "name": "created_at",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                },
                {
                    "data": "updated_at",
                    "name": "updated_at",
                    "orderable" : false,
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
