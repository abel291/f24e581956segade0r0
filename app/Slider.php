<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 25 May 2018 21:59:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Slider
 * 
 * @property int $id
 * @property string $main_img
 * @property string $txt_linea_a
 * @property string $txt_linea_b
 * @property string $txt_color
 * @property string $href
 * @property bool $activo
 *
 * @package App\Models
 */
class Slider extends Eloquent
{	

	protected $casts = [
		'activo' => 'bool'
	];

	protected $fillable = [
		'title',
		'img',
		'content',
		'text_color',
		'href',
		'activo'		
	];
}
