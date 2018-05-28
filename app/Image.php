<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 May 2018 21:59:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Image
 * 
 * @property int $id
 * @property string $images
 * @property bool $activo
 * @property int $so_products_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Product $so_product
 *
 * @package App
 */
class Image extends Eloquent
{
	protected $casts = [
		'activo' => 'bool',
		'so_products_id' => 'int'
	];

	protected $fillable = [
		'images',
		'activo',
		'so_products_id'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\SoProduct::class, 'so_products_id');
	}
	
}
