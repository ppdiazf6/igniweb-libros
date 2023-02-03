<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

/**
 * 
 */
class Books extends Model
{
	
	protected $table = 'books';
	
	protected $table_bc = 'book_categories';
	
	protected $primaryKey = 'id_book';
	protected $userKey = 'id_user'; 
	
	protected $statusReserve = 'status';
		
	
	public function scopeMyReservesActives($builder, $id_user)
	{
		$builder->where($this->table.'.'.$this->userKey, '=', $id_user);
		$builder->where($this->table.'.'.$this->statusReserve, '=', 2);
		
		return $builder->get();
	}
	
	public function scopeListReservesActivesAll($builder)
	{
		#$builder->join($this->table_bc, $this->table_bc.'.'.$this->primaryKey, '=', $this->table.'.'.$this->primaryKey);
		$builder->where('status', '=', 1);
		$builder->orderBy('title', 'desc');
		// code...
		return $builder->get();
	}
	
	public function scopeGetBooksCategory($builder, $id_category)
	{
		$builder->where('id_book_category', '=', $id_category);
		$builder->where('status', '=', 1);
		$builder->orderBy('title', 'desc');
		
		
		return $builder->get();
	}
	
		#
}


?>