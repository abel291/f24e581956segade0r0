<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservedProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved_product', function (Blueprint $table) {
            $table->increments('id');                                 
            $table->date('date_arrival')->nullable();;                        
            $table->string('hour',10)->nullable();                        
            $table->text('note')->nullable(); 
            $table->string('title', 120);
            $table->string('slug', 120);
            $table->text('content');
            $table->decimal('price',12, 2)->default('0');
            $table->integer('quantity');                   
            $table->string('img',120); 
            $table->string('category',55);            
            $table->boolean('activo')->default(1);
            $table->integer('status')->default(0); //0 sin apartar //1 apartado //2 entregado //3 rechasado                            
            $table->integer('so_products_id')->unsigned(); 
            $table->integer('so_users_id')->unsigned(); 
            

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `so_reserved_product` 
            CHANGE `id` `id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT ,            
            CHANGE `so_users_id` `so_users_id` INT(5) UNSIGNED NOT NULL,
            CHANGE `so_products_id` `so_products_id` INT(5) UNSIGNED NOT NULL,
            CHANGE `quantity` `quantity` INT(2) NOT NULL,            
            CHANGE `status` `status` INT(1)  NOT NULL DEFAULT '0'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserved_product');
    }
}
