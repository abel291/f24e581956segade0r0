<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sliders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->string('main_img', 120);
            $table->string('txt_linea_a', 255)->default(null);
            $table->string('txt_linea_b', 255)->default(null);
            $table->string('txt_color', 6)->default('FFFFFF');
            $table->string('href', 100)->default(null);
            $table->boolean('activo')->default(1);
        
            
        
        });

        DB::statement("ALTER TABLE `so_sliders`CHANGE `id` `id` INT(1) UNSIGNED NOT NULL AUTO_INCREMENT ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
