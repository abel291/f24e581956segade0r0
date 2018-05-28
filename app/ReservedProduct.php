<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 May 2018 21:59:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ReservedProduct
 * 
 * @property int $id
 * @property \Carbon\Carbon $date_arrival
 * @property string $hour
 * @property string $note
 * @property string $status
 * @property int $quantity
 * @property int $so_products_id
 * @property int $so_users_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\SoProduct $so_product
 * @property \App\Models\SoUser $so_user
 *
 * @package App\Models
 */
class ReservedProduct extends Eloquent
{
	protected $table = 'reserved_product';

	protected $fillable = [		
		'date_arrival',
		'hour',
		'note',
		'title',
		'slug',
		'content',
		'price',
		'quantity',			
		'img',		
		'activo',
		'status',
		'category',
		'so_users_id',
		'so_products_id',
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'so_users_id');
	}
	public function product()
	{
		return $this->belongsTo(\App\Models\User::class, 'so_products_id');
	}	
	public function category()
	{
		return $this->belongsTo(\App\Category::class, 'so_categories_id');
	}
}
