<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 55);
			$table->string('slug', 55);
			$table->string('img', 180);
			$table->string('color', 180)->default('#0b0d0b');
			$table->string('seo_title', 120)->nullable();
			$table->string('seo_keys', 120)->nullable();
			$table->string('seo_desc', 180)->nullable();
			$table->boolean('activo')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
