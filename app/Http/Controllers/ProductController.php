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
            ->where('products.activo',1)            
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name'                
            );
        $economicos=$products;
        $economicos=$economicos->get()->sortBy('price')->take(5);
        //list
        if (!$slug_pro) {    
            $products=$products->paginate(9);
            $products->search=$products->first()->category_name;
            return view('products.list',compact('products','economicos'));            
        
        //detail
        }else{
            $products=$products->get();
            $economicos=$products->sortBy('price')->take(5);            
            $product=$products->where('slug',$slug_pro)->first();
            $products_related=$products->random(3);         
            return view('products.detail',compact('product','products_related','economicos'));        
        }     

        
    }
    public function search(Request $request)
    {
        //dd($request->search);
        $products=product::
            orderBy('id','desc')
            ->join('categories', 'products.so_categories_id', '=', 'categories.id')
            ->where('products.title','like',"%$request->search%")
            ->where('products.activo',1)          
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name'                
            );
        $economicos=$products;
        $economicos=$economicos->get()->sortBy('price')->take(5);    
        $products=$products->paginate(9);     
        $products->search =' Búsqueda,: '. $request->search;        
            
        return view('products.list',compact('products','economicos')); 
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

