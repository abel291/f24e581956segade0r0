<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 120)->nullable();
			$table->string('slug', 120)->nullable();
			$table->text('entry', 65535)->nullable();
			$table->text('content', 65535)->nullable();
			$table->string('main_img', 180)->nullable();
			$table->string('seo_title', 75)->nullable();
			$table->string('seo_desc', 320)->nullable();
			$table->string('seo_keys', 140)->nullable();
			$table->boolean('activo')->default(1);
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
		Schema::drop('pages');
	}

}
