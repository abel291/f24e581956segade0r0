<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 May 2018 21:59:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Blog
 * 
 * @property int $id
 * @property int $categoria
 * @property string $titulo
 * @property string $slug
 * @property string $entradilla
 * @property string $contenido
 * @property \Carbon\Carbon $fecha
 * @property string $seo_desc
 * @property string $seo_title
 * @property string $seo_keys
 * @property string $main_img
 * @property bool $activo
 *
 * @package App\Models
 */
class Blog extends Eloquent
{
	protected $table = 'blog';
	public $timestamps = false;

	protected $casts = [
		'categoria' => 'int',
		'activo' => 'bool'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'categoria',
		'titulo',
		'slug',
		'entradilla',
		'contenido',
		'fecha',
		'seo_desc',
		'seo_title',
		'seo_keys',
		'main_img',
		'activo'
	];
}
