<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function(Blueprint $table) {
            $table->engine = 'InnoDB';        
            $table->increments('id');
            $table->string('title', 120)->nullable();
            $table->string('phone', 120)->nullable();
            $table->string('address', 120)->nullable();
            $table->text('map')->nullable();
            $table->string('email', 120)->nullable();
            $table->text('note')->nullable();            
            $table->string('slug', 120)->nullable();
            $table->text('entry')->nullable();
            $table->text('content')->nullable();
            $table->string('main_img', 140)->nullable();
            $table->string('seo_title', 75)->nullable();
            $table->string('seo_desc', 320)->nullable();
            $table->string('seo_keys', 140)->nullable();
            $table->boolean('activo')->default(1);
            $table->timestamps();      
                  
        });

        DB::statement("ALTER TABLE `so_pages`CHANGE `id` `id` INT(3) UNSIGNED NOT NULL AUTO_INCREMENT ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
