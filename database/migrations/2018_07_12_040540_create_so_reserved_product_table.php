<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoReservedProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reserved_product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('date_arrival')->nullable();
			$table->string('hour', 10)->nullable();
			$table->text('note', 65535)->nullable();
			$table->string('title', 120);
			$table->string('slug', 120);
			$table->text('content', 65535);
			$table->decimal('price', 12)->default(0.00);
			$table->integer('quantity')->nullable();
			$table->string('img', 180);
			$table->string('category', 55);
			$table->boolean('activo')->default(1);
			$table->integer('status')->default(0);
			$table->integer('so_products_id')->unsigned()->index('reserved_product_so_products_id_foreign');
			$table->integer('so_users_id')->unsigned()->index('reserved_product_so_users_id_foreign');
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
		Schema::drop('reserved_product');
	}

}
