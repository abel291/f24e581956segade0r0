<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class categoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
        	[ 
        		'name'    => 'Anillos',
    	        'slug'    =>'anillos',
                'activo'  => 0,	                
        	],
            [ 
                'name'    =>'Pulseras',
                'slug'    =>'pulseras',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Collares',
                'slug'    =>'collares',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Cadenas',
                'slug'    =>'cadenas',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Colgantes',
                'slug'    =>'colgantes',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Pendientes',
                'slug'    =>'pendientes',
                'activo'  => 0,                  
            ],
            [ 
                'name'    =>'Joyas con diamantes',
                'slug'    =>'joyas',
                'activo'  => 0,                  
            ]
        ]);

        DB::table('images')->truncate();
        $products=\App\Product::get();          
        foreach ($products as $product) { 
            

            $product->img='https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg';
            $product->save();
            
            DB::table('images')->insert([
            [ 
                'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                'thum' => $product->img,
                'activo' => 1,
                'so_products_id'=>$product->id                  
            ],
            [ 
                'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/p'.rand(1,8).'.jpg',
                'thum' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                'activo' => 0,
                'so_products_id'=>$product->id                  
            ],
            [ 
                'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/p'.rand(1,8).'.jpg',
                'thum' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                'activo' => 0,
                'so_products_id'=>$product->id                  
            ],
            [ 
                'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/p'.rand(1,8).'.jpg',
                'thum' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                'activo' => 0,
                'so_products_id'=>$product->id                  
            ],
            [ 
                'img' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/img/p'.rand(1,8).'.jpg',
                'thum' => 'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',
                'activo' => 0,
                'so_products_id'=>$product->id                  
            ]            
        ]);
            echo $product->img."\n";
        }
        
    }
}
