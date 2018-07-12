<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSoReservedProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reserved_product', function(Blueprint $table)
		{
			$table->foreign('so_products_id', 'reserved_product_products_id_foreign')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			
			$table->foreign('so_users_id', 'reserved_product_users_id_foreign')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reserved_product', function(Blueprint $table)
		{
			$table->dropForeign('reserved_product_products_id_foreign');
			$table->dropForeign('reserved_product_users_id_foreign');
		});
	}

}
