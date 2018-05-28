<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');   	
        factory('App\User', 50)->create(); 
        factory('App\Product', 200)->create(); 
        $this->call(user::class);
        $this->call(categoria::class);
        



        DB::statement('SET FOREIGN_KEY_CHECKS=1;');        	
       
    }
}
