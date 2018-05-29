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
            $table->string('slug', 60);
            $table->text('content');
            $table->decimal('price',12, 2)->default('0');
            $table->integer('quantity');            
            $table->integer('quantity_min');
            $table->string('img', 120)->nullable();            
            $table->boolean('activo')->default(1);
            $table->integer('so_categories_id')->unsigned();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        
        DB::statement("ALTER TABLE `so_products`
            CHANGE `id` `id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT, 
            CHANGE `quantity` `quantity` INT(2) NOT NULL, 
            CHANGE `quantity_min` `quantity_min` INT(2) NOT NULL, 
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
