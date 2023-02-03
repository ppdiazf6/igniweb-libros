<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


use App\Models\Books as BooksModel;
use App\Models\BooksUsers as BooksUsersModel;
use App\Models\BookCategories as BookCategoriesModel;


use Validator;

/**
 *   
 */
class ReservesController extends Controller
{
	
	function __construct()
	{
		$this->middleware('auth');
	}
		
		
	public function index()
	{
		$list_category_book = BookCategoriesModel::ListCategoriesActives();
		
		$list_reserves = BooksModel::ListReservesActivesAll();
			
		return view('admin.reserves', compact('list_category_book', 'list_reserves'));
	}
		
	
		
		
	//	función para reservar libro
	public function store(Request $request)
	{
		//	Validación
		$validator = Validator::make($request->all(), [
				'days' => 'required|numeric'
			]);
			
			
			
		try
		{
			if ( $validator->fails() )
			{
				
				throw new \Exception($validator->errors()->first());
			}
			
			
			//	Get data 
			$IdUser = Auth::user()->id;
			$DateC = date('Y-m-d');
			$date_future = strtotime("+$request->days days", strtotime($DateC));
			$DateE = date('Y-m-d', $date_future);
			
			
				
			//  Guarda datos de la reserva en books users 
				$book_user_row = new BooksUsersModel();
					
					$book_user_row->id_book = $request->id_book;
					$book_user_row->id_user = $IdUser;
					$book_user_row->days = $request->days;
					$book_user_row->date_start = $DateC;
					$book_user_row->date_end = $DateE;
					
					$book_user_row->status_reserved = 1;	// 1:reservado, 2:devuelto 
					
					
			if ( ! $book_user_row->save() )
			{
				throw new \Exception('Error al registrar la reserva');
			}
			
				
			//	Actualizar estado en books
			$book_row = BooksModel::find($request->id_book);
				$book_row->status = 2;	// 2:no disponible, 1:disponible 
				$book_row->id_user = $IdUser;	// actualiza usuario actual
				
			if ( ! $book_row->save() ) {
				throw new \Exception('Error al actualizar el estado de la reserva');
			}
					
			
			//	Redirecciona
			return redirect('admin/reserve')->with('message', 'Guardado correctamente');
			
			#$
		}
		catch (\Exception $e)
		{
			return back()->with('message', 'Error al registrar la reserva');
		}
	}
			
		
		
	//	función para obtener los libros según categoría
	public function get_data_books($id_category)
	{
		#
		$list_book = BooksModel::GetBooksCategory($id_category);
		
		$this->json['status'] = true;
		$this->json['message'] = 'success';
		$this->json['data'] = $list_book;
		
		
		return response()->json($this->json);
	}
}

 ?>