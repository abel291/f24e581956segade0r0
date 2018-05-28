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
                'activo'  => 1,	                
        	],
            [ 
                'name'    =>'Pulseras',
                'slug'    =>'pulseras',
                'activo'  => 1,                  
            ],
            [ 
                'name'    =>'Collares',
                'slug'    =>'collares',
                'activo'  => 1,                  
            ],
            [ 
                'name'    =>'Cadenas',
                'slug'    =>'cadenas',
                'activo'  => 1,                  
            ],
            [ 
                'name'    =>'Colgantes',
                'slug'    =>'colgantes',
                'activo'  => 1,                  
            ],
            [ 
                'name'    =>'Pendientes',
                'slug'    =>'pendientes',
                'activo'  => 1,                  
            ],
            [ 
                'name'    =>'Joyas con diamantes',
                'slug'    =>'joyas',
                'activo'  => 1,                  
            ]
        ]);

        DB::table('images')->truncate();
        $products=\App\Product::get();          
        foreach ($products as $product) {
            $img=rand(1,8);
            $product->img='p'.rand(1,8).'.jpg';
            $product->save();
            DB::table('images')->insert([
            [ 
                'images' => $product->img,
                'activo' => 1,
                'so_products_id'=>$product->id                  
            ],
            [ 
                'images' => 'p'.rand(1,8).'.jpg',
                'activo' => 1,
                'so_products_id'=>$product->id                  
            ],
            [ 
                'images' => 'p'.rand(1,8).'.jpg',
                'activo' => 1,
                'so_products_id'=>$product->id                  
            ],
            [ 
                'images' => 'p'.rand(1,8).'.jpg',
                'activo' => 1,
                'so_products_id'=>$product->id                  
            ],
            [ 
                'img' => 'p'.rand(1,8).'.jpg',
                'activo' => 1,
                'so_products_id'=>$product->id                  
            ]            
        ]);
            echo $product->title."\n";
        }
        
    }
}
