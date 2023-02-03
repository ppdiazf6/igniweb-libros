<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no' />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
	<title>@yield('title', 'Igniweb S.A.S')</title>
	
	<style type="text/css">
		header { 
			grid-area: header;
		}
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
		}
		li {
			float: left;
		}
		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}
		li a:hover:not(.active) {
			background-color: #111;
		}
		.logout{
			display: inline-block;
			text-decoration: none;
			background-color: #333;
			border: 0 solid #f44336;
			color: white;
		}
		.active {
			background-color: #04AA6D;
		}
		.grid-container {
			display: grid;
			gap: 10px;
			background-color: #2196F3;
			padding: 10px;
		}
		select {
			max-width: 25%;
			padding: 6px 12px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 13px;
		}
		span, b{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
		}
		#table {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 90%;
			margin-left: auto;
			margin-right: auto;
		}
		#table td, #table th {
			border: 1px solid #ddd;
			padding: 8px;
		}
		#table tr:nth-child(even){
			background-color: #f2f2f2;
		}
		#table tr:hover {
			background-color: #ddd;
		}
		#table th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: #04AA6D;
			color: white;
		}
		.button {
			background-color: #f44336;
			border: none;
			color: white;
			padding: 8px 26px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			transition-duration: 0.4s;
			cursor: pointer;
		}
	</style>
		
	@yield('styles')
		
	<script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
</head>
<body>
	<header >
		<nav >
			
			<ul>
				<li>
					<a href="#!">IGNIWE S.A.S</a>
				</li>
				<li class="{{ $activePage == 'home' ? ' active' : '' }}">
					<a href="{{ URL::to('admin/home') }}">My Reserves</a>
				</li>
				<li class="{{ $activePage == 'reserve' ? ' active' : '' }}">
					<a href="{{ URL::to('admin/reserve') }}">Reserve</a>
				</li>
				<li style="float:right">
					<ul>
						@auth
							<li>
								<a href="#!">
									{{ Auth::user()->name }}
								</a>
							</li>
							&nbsp; 
							<li>
								<form action="{{ route('logout') }}" method="post">
									@csrf
									<button type="submit" class="logout" >
										<i class="material-icons left" style="margin-top:3px;;">power_settings_new</i>
										Cerrar Sesión
									</button>
								</form>
							</li>
						@endauth
					</ul>
				</li>
			</ul>
			
		</nav>
	</header>
						
	<div class="container">
		<div>
			@yield('content')
		</div>
						
	</div>
</body>
</html>