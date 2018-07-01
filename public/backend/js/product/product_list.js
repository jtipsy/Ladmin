var TableDatatablesAjax = function() {
    var datatableAjax = function(){
        dt = $('#datatable_ajax');
        ajax_datatable = dt.DataTable({
            "processing": true,
            "serverSide": true,
            "searching" : false,
            "ajax": {
                'url' : '/admin/product/list',
                "data": function ( d ) {
                    d.name = $('.filter input[name="name"]').val();
                    d.brand_name = $('.filter input[name="brand_name"]').val();
					d.species = $('.filter select[name="species"] option:selected').val();
					d.level = $('.filter select[name="level"] option:selected').val();
                    d.price= $('.filter input[name="price"]').val();
                    d.specifications = $('.filter select[name="specifications"] option:selected').val();
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
                    "data": "thumb",
                    "name" : "thumb",
                    "orderable" : false,
					"render": function(data,type,row,meta){
						return data = '<img src="'+data+'" width="80" height="80" >';
					}
                },	
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
                    "data": "species",
                    "name": "species",
                    "orderable" : true,
					render:function(data){
						if (data == 1) {
							return '<div class="ctr">其他</div>';
						}else if(data == 2){
							return '<div class="ctr">羊肉</div>';
						}else if(data == 3){
							return '<div class="ctr">牛肉</div>';
						}else if(data == 4){
							return '<div class="ctr">驼肉</div>';
						}else if(data == 5){
							return '<div class="ctr">猪肉</div>';
						}else if(data == 6){
							return '<div class="ctr">鸡肉</div>';
						}else if(data == 7){
							return '<div class="ctr">鹅肉</div>';
						}else if(data == 8){
							return '<div class="ctr">鸭肉</div>';
						}else if(data == 9){
							return '<div class="ctr">鱼肉</div>';
						}else if(data == 10){
							return '<div class="ctr">驴肉</div>';
						}else if(data == 11){
							return '<div class="ctr">马肉</div>';
						}else{
							return '<div class="ctr">其他</div>';
						}
					}
                },                
                {
                    "data": "level",
                    "name": "level",
                    "orderable" : true,
					render:function(data){
						if (data == 1) {
							return '<div class="ctr">普通</div>';
						}else if(data == 2){
							return '<div class="ctr">绿色</div>';
						}else if(data == 3){
							return '<div class="ctr">有机</div>';
						}else if(data == 4){
							return '<div class="ctr">无公害</div>';
						}else if(data == 5){
							return '<div class="ctr">原生态</div>';
						}else{
							return '<div class="ctr">其他</div>';
						}
					}
                },                
				{
                    "data": "price",
                    "name": "price",
                    "orderable" : true,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
					}
                }, 				
				{
                    "data": "specifications",
                    "name": "specifications",
                    "orderable" : false,
					render:function(data){
						if (data == 1) {
							return '<div class="ctr">件</div>';
						}else if(data == 2){
							return '<div class="ctr">袋</div>';
						}else if(data == 3){
							return '<div class="ctr">条</div>';
						}else if(data == 4){
							return '<div class="ctr">盒</div>';
						}else if(data == 5){
							return '<div class="ctr">箱</div>';
						}else if(data == 6){
							return '<div class="ctr">块</div>';
						}else if(data == 7){
							return '<div class="ctr">个</div>';
						}else if(data == 8){
							return '<div class="ctr">吨</div>';
						}else if(data == 9){
							return '<div class="ctr">卷</div>';
						}else if(data == 10){
							return '<div class="ctr">斤</div>';
						}else if(data == 11){
							return '<div class="ctr">公斤</div>';
						}else if(data == 12){
							return '<div class="ctr">G</div>';
						}else if(data == 13){
							return '<div class="ctr">KG</div>';
						}else{
							return '<div class="ctr">其他</div>';
						}
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
                    "data": "view_count",
                    "name": "view_count",
                    "orderable" : true,
					"render": function(data,type,row,meta){
						return data = '<div class="ctr">'+data+'</div>';
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
                    "data": "actionButton",
                    "name": "actionButton",
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
                url: '/admin/i18n'
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
