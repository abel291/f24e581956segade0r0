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
            $table->string('phone', 120);
            $table->string('address', 120);
            $table->string('map', 120);
            $table->string('email', 120);
            $table->text('note');            
            $table->string('slug', 40);
            $table->text('entry');
            $table->text('content');
            $table->string('main_img', 140)->default(null);
            $table->string('seo_title', 75)->default(null);
            $table->string('seo_desc', 320)->default(null);
            $table->string('seo_keys', 140)->default(null);
            $table->boolean('activo')->default(1);
            $table->timestamp('date_modify')->default(\DB::raw('CURRENT_TIMESTAMP'));        
                  
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
