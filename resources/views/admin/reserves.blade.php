@extends('layouts.template', ['activePage' => 'reserve'])

		
@section('styles')
	<style type="text/css">

		.modal {
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgb(0,0,0);
			background-color: rgba(0,0,0,0.4);
		}
		
		.modal-content {
			background-color: #fefefe;
			margin: 15% auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
		}
		
		.close {
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}
		.close:hover, .close:focus {
			color: black;
			text-decoration: none;
			cursor: pointer;
		}
		#filter{
			margin-left: 5%;
		}
		#texto {
			display: inline-block;
			vertical-align: top;
		}
		img {
			float: right;
			margin-right: 2%;
		}
		.button{
			background-color: #198754;
		}
		.btn-primary{
			background-color: #0d6efd;
		}
		.btn-secondary{
			background-color: #adb5bd;
		}
		.btn-success{
			background-color: white; 
			color: black; 
			border: 2px solid green;
		}
		.btn-success:hover {
			background-color: green;
			color: white;
		}
	</style>
@endsection

@section('content')
	<div class="container">
		<div id="filter">
			<br>
			<p>
				<span>Filter by </span> &nbsp; 
				<select name="category" id="slc_category" url="{{ URL::to('admin/reserve/get_data_books') }}">
					<option value="">[Category]</option>
					@if( count($list_category_book) )
						@foreach($list_category_book as $keyCategory => $valueCategory)
							<option value="{{ $valueCategory->id_book_category }}">{{ $valueCategory->name_category}}</option>
						@endforeach
					@endif
				</select>
			</p>
		</div>
			
			
		<div>
			<table id="table">
				<thead>
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="tbl_reserves">
					@if( count($list_reserves) )
						@foreach($list_reserves as $keyMyReserve => $valueReserve)
							<tr>
								<td>{{ $valueReserve->title }}</td>
								<td>{{ $valueReserve->author }}</td>
								<td style="text-align: center;">
									<a href="#" class="modal_detail button btn-primary"  id="{{ $valueReserve->id_book }}" 
										data-toggle="modal" data-target="#modal-detail-reserve"
										data-id="{{ $valueReserve->id_book }}"
										data-title="{{ $valueReserve->title }}"
										data-author="{{ $valueReserve->author }}"
										data-description="{{ $valueReserve->description }}"
										data-image="{{ $valueReserve->image_book }}"
										style="margin-top:1rem;" >
										Reserve
										<i class="material-icons right"></i>
									</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="3">
								<p style="text-align: center;">¡No se encontraron registros!</p>
							</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
		
		
		
		
	<div id="modal-detail-reserve" tabindex="-1" class="modal">
		<div class="modal-content">
			<span class="closeModal" onclick="closeModal();" style="float: right;">&times;</span>
			&nbsp; 
			<p>
				<b>Book title: </b><span id="sp_title"></span>
				<br>
				<b>Author: </b><span id="sp_author"></span>
			</p>
				
			<hr>
				
			<div>
				<p id="texto">
					<b>Description: </b><br>
					<img src="{{ asset('img/default-book.png') }}" id="src_img" width="170px" height="200px" alt="img-book" >
					<span id="sp_desc"></span>
				</p>
				
			</div>
					
			<hr>
			<hr>
					
			<form action="{{ URL::to('admin/reserve/create') }}" method="post">
				
				@csrf()
				
				<div style="display: flex;">
					<div>
						<span>Days </span>
						&nbsp; 
						
						<input type="number" name="days" class="vaidate" placeholder="Ejm. 3" required>
						&nbsp; 
							
						<input type="text" name="id_book" id="id_book_txt" >
						&nbsp; 
						
						<button type="submit" class="button btn-success">
							Reserve
						</button>
							
					</div>
						
					<div style="justify-content: flex-end;">
						<a class="btn closeModal button btn-secondary" 
							onclick="closeModal();"  
							>
							Cancelar
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
		
	
	<!-- SCRIPTS -->
	<script src="{{ asset('js/reserve.js') }}"></script>
		
	<script type="text/javascript">
		//	Levanta modal para reservar 
			$('.modal_detail').click(function(e){
				e.preventDefault();
				var id = $(this).attr('id');
						
				//	limpia valores
				$("#sp_title").empty();
				$("#sp_author").empty();
				$("#sp_desc").empty();
				$("#sp_img").empty();
					
				//	Abre modal
				$('.modal').fadeIn();
					
				//	Captura valores 
				let txt_id = $(this).data('id'),
					txt_title = $(this).data('title'),
					txt_author = $(this).data('author'),
					txt_desc = $(this).data('description'),
					txt_img = $(this).data('image');
					
					
				//	Asigna valores
					$("#id_book_txt").val(txt_id);
					$("#sp_title").append(txt_title);
					$("#sp_author").append(txt_author);
					$("#sp_desc").append(txt_desc);
					
					
				//	Agrega el atributo srf a la imgen
					$("#src_img").attr("src",`{{ asset("img/books/`+txt_img+`") }}`);
			});
				
					
		//	Cierra modal
			function closeModal() {
				$('.modal').fadeOut();
			}
	</script>
		
	

@endsection