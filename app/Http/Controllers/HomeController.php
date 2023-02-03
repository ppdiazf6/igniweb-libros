<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


use App\Models\Books as BooksModel;
use App\Models\BooksUsers as BooksUsersModel;


use Validator;

/**
 *    
 */
class HomeController extends Controller
{
	
	function __construct()
	{
		#...
		$this->middleware('auth');
	}
		#
	public function index()
	{
		$IdUser = Auth::user()->id;
		$fullname = Auth::user()->name." ".Auth::user()->lastname;
		$img_profile = Auth::user()->img_profile;
			
		$list_reserves = BooksModel::MyReservesActives($IdUser);
		
			
		return view('admin.home-reserves', compact('fullname', 'img_profile', 'list_reserves'));
	}
		
		
	
		
	
	// funcion para actualizar el estado de la reserva y eliminar de su reserva 
	public function delete($id_book)
	{
		$IdUser = Auth::user()->id;
			
		$book_row = BooksModel::find($id_book);
		$book_row->id_user = 0;
		$book_row->status = 1;
		
		if ( ! $book_row->save() ) {
			throw new \Exception('No se pudo eliminar la reserva');
		}
			
			
		//	Actualiza el estado en la tabla books users
		$book_user_row = BooksUsersModel::FindBookUser($id_book, $IdUser);
		$book_user_row->status_reserved = 2;
		if ( ! $book_user_row->save() ) {
			throw new \Exception('No se pudo actualizar el estado de la reserva');
		}
		
				
		return redirect('admin/home');
	}
		
}

 ?>