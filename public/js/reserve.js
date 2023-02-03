
//	Cambia la informacion segu categoría	//
	$("#slc_category").change(function() {
		var idCategory = $("#slc_category").val(),
			url_change = $("#slc_category").attr('url');
		console.log(idCategory);
		console.log(url_change);
		
		$("#tbl_reserves").empty();
				
		//			
		$.ajax({
			url : url_change + '/' + idCategory,
			type: 'GET',
			data: [],
			success: function(data) {
				if ( data. status ) 
				{
					console.log(data);
								
					if (data.data != '')
					{
						
						$.each(data.data, function(i, val){
							
							
							$("#tbl_reserves").append('<tr>'+
											'<td>'+val.title+'</td>'+
											'<td>'+val.author+'</td>'+
											'<td>'+
												'<a href="#modal-detail-reserve" data-toggle="modal" data-target="#modal-detail-reserve">'+
													'Reserve'+
												'</a>'+
												val.id_book+
											'</td>'+
										'</tr>');
						});
								
					}
					else
					{
						$("#tbl_reserves").append('<tr><td colspan="3" style="text-align:center;">¡No se encontraron registros!</td></tr>');
					};
					
					
				}
			}
		});
	});



