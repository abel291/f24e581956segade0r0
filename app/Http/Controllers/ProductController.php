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
        
        $products=Product::
            orderBy('id','desc')
            ->join('categories', 'products.so_categories_id', '=', 'categories.id')
            ->where('products.activo',1)          
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name',               
                    'categories.seo_title as category_seo_title',               
                    'categories.seo_desc as category_seo_desc',               
                    'categories.seo_keys as category_seo_keys'               
            );
        
        $categories=$products;
        $categories=$categories->get()->unique('category_name');       
        
        //list
        if (!$slug_pro) {

            if ($slug_ca=="novedades") {
                $economicos=$products;
                $economicos=$economicos->get()->sortBy('price')->take(5); 
                $products=$products->paginate(9);
                $products->search="Novedades";
            }else{
                $economicos=$products;
                $economicos=$economicos->where('categories.slug',$slug_ca)->get()->sortBy('price')->take(5);
                $products=$products->where('categories.slug',$slug_ca)->paginate(9);
                $products->search=$products->first()->category_name;
            }        
            
            //dd($products);
            return view('products.list',compact('products','economicos' ,'categories'));            
        
        
        //detail
        }else{
            $products=$products->where('categories.slug',$slug_ca)->inRandomOrder()->get();                        
            $product=$products->where('slug',$slug_pro)->first();
            $economicos=$products->whereNotIn('slug', $slug_pro)->sortBy('price')->take(5);
            $products_related=$products->whereNotIn('slug', $slug_pro)->take(3);
                     
            return view('products.detail',compact('product','products_related','economicos','categories'));        
        }     

        
    }
    public function categoria($categoria)
    {
        
        $products=Product::
            orderBy('id','desc')
            ->join('categories', 'products.so_categories_id', '=', 'categories.id')
            ->where('products.activo',1)          
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name',               
                    'categories.seo_title as category_seo_title',               
                    'categories.seo_desc as category_seo_desc',               
                    'categories.seo_keys as category_seo_keys'               
            );
        
        $categories=$products;
        $categories=$categories->get()->unique('category_name');        
        $economicos=$products;
        $economicos=$economicos->where('categories.slug',$categoria)->get()->sortBy('price')->take(5);
        $products=$products->where('categories.slug',$categoria)->paginate(9);
        $products->search=$products->first()->category_name;
                  
        return view('products.list',compact('products','economicos' ,'categories'));  
        
    }
    public function search(Request $request)
    {
        //dd($request->search);
        $products=product::
            orderBy('id','desc')
            ->join('categories', 'products.so_categories_id', '=', 'categories.id')            
            ->where('products.activo',1)          
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name',
                    'categories.seo_title as category_seo_title',               
                    'categories.seo_desc as category_seo_desc',               
                    'categories.seo_keys as category_seo_keys'                
            );

        $categories=$products;
        $categories=$categories->get()->unique('category_name');
        
        $economicos=$products;
        $economicos=$economicos->get()->sortBy('price')->take(5);    
        $products=$products->where(function($q) use ($request) {
          $q->where('products.title','like',"%$request->search%")
            ->orWhere('products.content','like',"%$request->search%");
        })->paginate(9);      
        $products->search =' Búsqueda: '. $request->search;        
            
        return view('products.list',compact('products','economicos','categories')); 
    }

    /*public function novedades(){        
        $products=Product::
            orderBy('id','desc')
            ->join('categories', 'products.so_categories_id', '=', 'categories.id')
            ->where('products.activo',1)          
            ->select('products.*','categories.slug as category_slug','categories.name as category_name');
        
        $categories=$products;
        $categories=$categories->get()->unique('category_name');       
        
        $economicos=$products;
        $economicos=$products->get()->sortBy('price')->take(5);
        $products=$products->paginate(9);
        $products->search="Novedades";
        return view('products.list',compact('products','economicos' ,'categories'));  
    }*/

    
    
    
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

