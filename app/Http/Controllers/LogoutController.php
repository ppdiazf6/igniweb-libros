<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 
 */
class LogoutController extends Controller
{
	
	
	//	función para cerrar sesion  
	public function store()
	{
		auth()->logout();
		
		return redirect()->route('login');
	}
	
		
}




?>