<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function(Blueprint $table)
        {
            $table->foreign('so_products_id')->references('id')->on('products');                       
            
        });

        Schema::table('reserved_product', function(Blueprint $table)
        {
            
            $table->foreign('so_products_id')->references('id')->on('products');         
            $table->foreign('so_users_id')->references('id')->on('users');         
        });

        Schema::table('products', function(Blueprint $table)
        {
            $table->foreign('so_categories_id')->references('id')->on('categories');                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function(Blueprint $table)
        {
            $table->dropForeign('images_so_products_id_foreign');            
                        
        });

        Schema::table('reserved_product', function(Blueprint $table)
        {                    
            $table->dropForeign('reserved_product_so_products_id_foreign');            
            $table->dropForeign('reserved_product_so_users_id_foreign');            
        });
        Schema::table('products', function(Blueprint $table)
        {
            $table->dropForeign('products_so_categories_id_foreign');            
                       
        });
    }
}
