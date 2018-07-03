<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 120);
            $table->string('slug', 120)->default('');
            $table->text('content')->nullable();  ;
            $table->decimal('price',12, 2)->default('0');
            $table->integer('quantity')->default(0);           
            $table->integer('quantity_min')->default(0);
            $table->string('img', 120)->nullable();            
            $table->boolean('activo')->default(1);
            
            $table->string('seo_title', 75)->nullable();
            $table->string('seo_desc', 320)->nullable();
            $table->string('seo_keys', 140)->nullable();

            $table->integer('so_categories_id')->unsigned();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        
        DB::statement("ALTER TABLE `so_products`
            CHANGE `id` `id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT, 
            CHANGE `quantity` `quantity` INT(2) , 
            CHANGE `quantity_min` `quantity_min` INT(2) , 
            CHANGE `so_categories_id` `so_categories_id` INT(3) UNSIGNED NOT NULL");
            
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
