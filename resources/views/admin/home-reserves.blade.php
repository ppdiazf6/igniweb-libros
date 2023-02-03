@extends('layouts.template', ['activePage' => 'home'])

@section('styles')
	<style type="text/css">
		.container{
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			justify-content: center;
			align-items: stretch;
		}
		#my_data, #my_reserves{
			flex: 0,1,auto;
			align-self: auto;
		}
		#my_data{
			order: 0;
		}
		#my_reserves{
			order: 1;
			overflow-x: auto;
		}
		#data{
			max-width: 90%;
			margin-left: auto;
			margin-right: auto;
		}
		#datas{
			float: left;
		}
		#image{
			float: right;
		}
		
		h1, p{
			text-align: center;
		}
		
		.btn-delete,{
			background-color: white; 
			color: black; 
			border: 2px solid #f44336;
		}
		.btn-delete:hover {
			background-color: #f44336;
			color: white;
		}
	</style>
@endsection

@section('content')
	<div class="container">
		<div id="my_data">
			<div id="data">
				<div id="datas">
					<br><br><br>
					<b>My name: </b>
					<span>{{ $fullname }}</span>
					<br>
					<b>Reserves total: </b>
					<span>{{ count($list_reserves) }}</span>
				</div>
				<div id="image">
					<?php 
						$img_name = ($img_profile ? $img_profile : 'default-avatar.png');
					?>
					<img src="{{ asset('img/'.$img_name) }}" width="150px" alt="img-profile">
				</div>
			</div>
		</div>
		<br><br>
		<div id="my_reserves">
			<h1>My reserves</h1>
			<table id="table">
				<thead>
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if( count($list_reserves) )
						@foreach($list_reserves as $keyMyReserve => $valueReserve)
							<tr>
								<td>{{ $valueReserve->title }}</td>
								<td>{{ $valueReserve->author }}</td>
								<td style="text-align: center;">
									<?php 
										$url_delete = URL::to('admin/home/reserve/delete/'.$valueReserve->id_book);
									?>
									<form action="{{ $url_delete }}" method="post">
										@csrf
										@method('DELETE')
										<button type="submit" class="button btn-delete">Delete</button>
									</form>
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
@endsection