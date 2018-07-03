<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 May 2018 21:59:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property float $price
 * @property int $quantity
 * @property string $model
 * @property string $brand
 * @property int $quantity_min
 * @property bool $activo
 * @property int $so_categories_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Category $so_category
 * @property \Illuminate\Database\Eloquent\Collection $so_images
 * @property \Illuminate\Database\Eloquent\Collection $so_reserved_products
 *
 * @package App */
class Product extends Eloquent
{
	protected $casts = [
		'price' => 'float',
		'quantity' => 'int',
		'quantity_min' => 'int',
		'activo' => 'bool',
		'so_categories_id' => 'int'
	];

	protected $fillable = [
		'title',
		'slug',
		'content',
		'price',
		'quantity',	
		'seo_title',
		'seo_desc',
		'seo_keys',	
		'quantity_min',
		'img',
		'activo',
		'so_categories_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Category::class, 'so_categories_id');
	}

	public function images()
	{
		return $this->hasMany(\App\Image::class, 'so_products_id');
	}

	public function reserved_products()
	{
		return $this->hasMany(\App\ReservedProduct::class, 'so_products_id');
	}

	
}
