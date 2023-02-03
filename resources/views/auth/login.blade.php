<!DOCTYPE html>
<html>
<head>
	<title>Igniweb S.A.S</title>
	
	<style type="text/css">
		body{
			display: flex;
			flex-direction: row;
			flex-wrap: nowrap;
			justify-content: center;
			align-items: center;
			align-content: stretch;
			background-color: #f2f2f2;
			min-height: 100vh;
			
		}
		form{
			background-color: #fff;
			margin: auto;
			width: 90%;
			max-width: 400px;
			padding: 4.5em 3em;
			border-radius: 10px;
			box-shadow: 0 5px 10px -5px rgb(0 0 0 / 30%);
			text-align: center;
		}
		h1{
			text-align: center;
		}
		label{
			position: absolute;
			font-size: 14px;
			font-family: Arial, Helvetica, sans-serif;
			margin-top: 0;
			margin-bottom: 10px;
			padding-top: 0;
		}
			
		input, .btn {
			width: 100%;
			padding: 12px;
			border: none;
			border-radius: 4px;
			margin: 5px 0;
			opacity: 0.85;
			display: inline-block;
			font-size: 17px;
			line-height: 20px;
			text-decoration: none;
			margin-top: 20px;
		}
		input:hover, .btn:hover {
			opacity: 1;
		}
		input[type=submit] {
			width: 100%;
			background-color: #04AA6D;
			color: white;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
			
		<form action="{{ route('login') }}" method="POST">
				
			<h1>Iniciar Sesión</h1>
			
			<div class="row">
				<div class="col">
							
						
					@csrf
						
					@if(session('mensaje'))
						<p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
					@endif
						
					<div class="row">
						<div class="">
							<label for="username">
								Username
							</label>
							<input type="text" 
									name="username" id="username" 
									placeholder="Username" 
									class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
									value="{{ old('username') }}" >
							@error('username')
								<p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
							@enderror
						</div>
						<br>
						<div class="">
							<label for="password">
								Password
							</label>
							<input type="password" 
									name="password" id="password" 
									placeholder="Password" 
									class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" >
							@error('password')
								<p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
							@enderror
						</div>
					</div>
						<br>
					<div class="center-align">
						<input type="submit" 
								value="Sign in"
								class="waves-effect waves-light btn amber white-text">
					</div>
				</form>
				
			</div>
						
		</div>
	</div>
</body>
</html>
	