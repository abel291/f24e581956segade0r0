<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 May 2018 21:59:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Page
 * 
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $entry
 * @property string $content
 * @property string $main_img
 * @property string $seo_title
 * @property string $seo_desc
 * @property string $seo_keys
 * @property bool $activo
 * @property \Carbon\Carbon $date_modify
 *
 * @package App
 */
class Page extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'activo' => 'bool'
	];

	protected $dates = [
		'date_modify'
	];

	protected $fillable = [
		'title',
		'slug',
		'entry',
		'content',
		'main_img',
		'seo_title',
		'seo_desc',
		'seo_keys',
		'activo',
		'date_modify'
	];
}
