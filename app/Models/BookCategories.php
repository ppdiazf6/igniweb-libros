<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

/**
 * 
 */
class BookCategories extends Model
{
	
	protected $table = 'book_categories';
	
	protected $primaryKey = 'id_book_category';
	 
	
	protected $statusCategory = 'status_category';
		
	
	
	//	Lista categorias activas
	public function scopeListCategoriesActives($builder)
	{
		$builder->where($this->table.'.'.$this->statusCategory, '=', 1);
		$builder->orderBy('name_category', 'asc');
		//
		return $builder->get();
	}
			
	
}


?>