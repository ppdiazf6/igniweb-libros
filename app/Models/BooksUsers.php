<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

/**
 * 
 */
class BooksUsers extends Model
{
	
	protected $table = 'books_users';
	
	protected $primaryKey = 'id_book_user';
	
	protected $userKey = 'id_user';
	 
	
	protected $statusReserved = 'status_reserved';
		
	
	
	//	funcion 
	public function scopeFindBookUser($builder, $id_book, $id_user)
	{
		$builder->where('id_user', '=', $id_user);
		$builder->where('id_book', '=', $id_book);
		$builder->where('status_reserved', '=', 1);
		$builder->orderBy('id_book_user', 'desc');
		#
		return $builder->first();
	}
			
	
}


?>