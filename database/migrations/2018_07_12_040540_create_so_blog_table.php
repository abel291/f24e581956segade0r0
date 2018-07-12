<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo', 120);
			$table->string('slug', 120);
			$table->string('entradilla')->nullable();
			$table->text('contenido', 65535)->nullable();
			$table->string('seo_desc', 180)->nullable();
			$table->string('seo_title', 120)->nullable();
			$table->string('seo_keys', 120)->nullable();
			$table->string('main_img', 180)->nullable();
			$table->boolean('activo')->default(1);
			$table->integer('so_categories_id')->unsigned();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blog');
	}

}
