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
            $table->string('title', 120);
            $table->string('img', 150);
            $table->boolean('tipo')->default(0);
            $table->text('content')->nullable();
            $table->string('href', 100)->nullable();           
            $table->boolean('activo');
            $table->timestamps();       
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
