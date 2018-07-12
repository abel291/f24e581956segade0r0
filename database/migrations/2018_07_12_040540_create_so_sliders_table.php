<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoSlidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sliders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('img', 180);
			$table->boolean('tipo')->default(0);
			$table->text('content', 65535)->nullable();
			$table->string('text_color', 10)->default('#fff');
			$table->string('href', 100)->nullable();
			$table->boolean('activo');
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
		Schema::drop('sliders');
	}

}
