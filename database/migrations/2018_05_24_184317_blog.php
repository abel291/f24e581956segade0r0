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
            $table->integer('categoria');
            $table->string('titulo', 120);
            $table->string('slug', 55);
            $table->string('entradilla', 255)->default(null);
            $table->text('contenido');
            $table->timestamp('fecha')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('seo_desc', 115)->default(null);
            $table->string('seo_title', 55)->default(null);
            $table->string('seo_keys', 120)->default(null);
            $table->string('main_img', 120)->default(null);
            $table->boolean('activo')->default(1);
                    
        });

        DB::statement("ALTER TABLE `so_blog`CHANGE `id` `id` INT(4) UNSIGNED NOT NULL AUTO_INCREMENT ");

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
