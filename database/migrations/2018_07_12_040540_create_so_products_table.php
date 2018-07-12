<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 120);
			$table->string('slug', 120)->default('');
			$table->text('content', 65535)->nullable();
			$table->decimal('price', 12)->default(0.00);
			$table->integer('quantity')->nullable();
			$table->integer('quantity_min')->nullable();
			$table->string('img', 180)->nullable();
			$table->boolean('activo')->default(1);
			$table->string('seo_title', 75)->nullable();
			$table->string('seo_desc', 320)->nullable();
			$table->string('seo_keys', 140)->nullable();
			$table->integer('so_categories_id')->unsigned()->index('products_so_categories_id_foreign');
			$table->softDeletes();
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
		Schema::drop('products');
	}

}
