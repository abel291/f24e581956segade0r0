<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('blog', function(Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->increments('id');
           
            $table->string('titulo', 120);
            $table->string('slug', 120);
            $table->string('entradilla', 255)->nullable();
            $table->text('contenido')->nullable();        
            $table->string('seo_desc', 115)->nullable();
            $table->string('seo_title', 55)->nullable();
            $table->string('seo_keys', 120)->nullable();
            $table->string('main_img', 120)->nullable();
            $table->boolean('activo')->default(1);
            $table->integer('so_categories_id');
            $table->timestamps();
                    
        });

        DB::statement("ALTER TABLE `so_blog`CHANGE `id` `id` INT(4) UNSIGNED NOT NULL AUTO_INCREMENT ,
                 CHANGE `so_categories_id` `so_categories_id` INT(3) UNSIGNED NOT NULL");
         
            

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('blog');
    }
}
