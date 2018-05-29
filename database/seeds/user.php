<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert(
    	[ 
    		'name' => 'Admin',
            'email' => "admin@admin.com",           
            'phone' => "+58424558869",           
	        'is_admin' => 1,	        
	        'password' => bcrypt('secret'), // secret	        
    	]
);
    }
}
