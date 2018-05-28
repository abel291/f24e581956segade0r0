<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ReservedProduct ;
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($slug_ca,$slug_pro=null)
    { 

        $products=product::
            orderBy('id','desc')
            ->join('categories', 'products.so_categories_id', '=', 'categories.id')
            ->where('categories.slug',$slug_ca)            
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name'                
            );      
        
        $mas_apartados=ReservedProduct::inRandomOrder('id','desc')->where('category',$slug_ca)->where('status',2)->limit(50)->get();     
        $mas_apartados=$mas_apartados->groupBy('so_products_id');        
        $mas_apartados = $mas_apartados->map(function ($item, $key) {            
            return $item->first();
        });
        $mas_apartados = $mas_apartados->take(5);
        
        //list
        if (!$slug_pro) {    
            $products=$products->paginate(9);
            $products->search=$products->first()->category_name;
            return view('products.list',compact('products','mas_apartados'));            
        
        //detail
        }else{
            $products=$products->get();             
            $product=$products->where('slug',$slug_pro)->first();
            $products_related=$products->random(3);         
            return view('products.detail',compact('product','products_related','mas_apartados'));        
        }     

        
    }
    public function search(Request $request)
    {
        //dd($request->search);
        $products=product::
            orderBy('id','desc')
            ->join('categories', 'products.so_categories_id', '=', 'categories.id')
            ->where('products.title','like',"%$request->search%")            
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name'                
            )->paginate(9);      
        $products->search =' Busqueda: '. $request->search;
        $mas_apartados=ReservedProduct::orderBy('id','desc')->where('status',2)->limit(50)->get();     
        $mas_apartados=$mas_apartados->groupBy('so_products_id');        
        $mas_apartados = $mas_apartados->map(function ($item, $key) {            
            return $item->first();
        });
        $mas_apartados = $mas_apartados->take(5);      
        return view('products.list',compact('products','mas_apartados')); 
    }

    
    
    
}
/*$products=Category::where('categories.slug',$slug_ca)
            ->orderBy('id','desc')
            ->join('products', 'categories.id', '=', 'products.so_categories_id')            
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name'                
            )
            ->paginate(9

