<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 
 */
class LoginController extends Controller
{
	//	funcion para mostrar la vista login
	public function index()
	{
		#   
		return view('auth.login');
	}
	
		
	//	funcion para iniciar sesion 
	public function store(Request $request)
	{
		//	Validacion de email y password
		$this->validate($request, [
			'username' => 'required|min:3',
			'password' => 'required'
		]);
			
		
		if ( ! auth()->attempt($request->only('username', 'password'), $request->remember) )
		{
			return back()->with('mensaje', 'Credenciales Incorrectas');
		}

			#
		
		return redirect('admin/home');
	}
	
		
}



?>