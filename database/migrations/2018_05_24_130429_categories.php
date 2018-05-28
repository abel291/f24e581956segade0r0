<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('categories', function (Blueprint $table) {
            $table->increments('id',2);
            $table->string('name',55);
            $table->string('slug',55);
            $table->boolean('activo')->default(1);                       
            $table->timestamps();
        });
       DB::statement("ALTER TABLE `so_categories`CHANGE `id` `id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {       
        Schema::dropIfExists('categories');
    }
}
