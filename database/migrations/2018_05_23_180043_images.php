<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Images extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('images',120);
            $table->boolean('activo')->default(1);
            $table->integer('so_products_id')->unsigned();                                       
            $table->timestamps();

        });
       DB::statement("ALTER TABLE `so_images` 
        CHANGE `id` `id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT, 
        CHANGE `so_products_id` `so_products_id` INT(5) UNSIGNED NOT NULL ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('images');
    }
}
