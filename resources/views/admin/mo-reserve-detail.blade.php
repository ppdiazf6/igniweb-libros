@extends('layouts.template', ['activePage' => 'reserve'])

@section('content')
	<div  class="modal fade" id="show_desc-{{ $documento }}" tabindex="-1" style="display: none;" aria-hidden="true">
		
		<div class="modal-dialog">
			<div class="modal-content">
				<p>
					Book title: { $book_detail->title }}
					Author: { $book_detail->author }}
				</p>
				<hr>
				<div class="row">
					<div class="col s12 m6">
					Description:
					{ $book_detail->descrition }}
					</div>
					{{ $documento }}
					<img src="" alt="img-book">
				</div>
				<hr>
				<hr>
						
				<div>
					<form action="" method="post">
						<p>
							Days 
							<select>
								<option></option>
							</select>
							<button type="submit">
								Reserve
							</button>
						</p>
					</form>
				</div>
			</div>
				
		</div>
			
	</div>
@endsection