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
        $this->call(user::class);  	
        factory('App\User', 50)->create(); 
        factory('App\Product', 2)->create();        
        factory('App\Blog', 5)->create();        
        $this->call(categoria::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');        	
       
    }
}
