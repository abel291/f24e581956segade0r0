<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 May 2018 21:59:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $category
 * @property bool $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $so_products
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $casts = [
		'activo' => 'bool'
	];

	protected $fillable = [
		'category',
		'activo'
	];

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class, 'so_categories_id');
	}
}
