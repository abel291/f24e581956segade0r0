<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservedProduct;
use App\Slider;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories=Category::
          where('products.activo',1)          
          ->join('products', 'categories.id','=','products.so_categories_id')                       
          ->select('categories.*','categories.slug as category_slug','categories.name as category_name')
          ->get()->unique('category_name');     
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $sliders=Slider::where('activo',1)->orderBy('updated_at','desc')->get();
        $products=product::
            where('products.activo',1)
            ->orderBy('products.id','desc')
            ->join('categories', 'products.so_categories_id', '=', 'categories.id')                       
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name'                
        )->get();

        
        $categories=$this->categories;

        //$products=Product::orderBy('id','desc')->get();
        $random=$products->sortByDesc('id')->take(6);
        $recientes=$products->sortByDesc('id')->take(10);
        $economicos=$products->sortBy('price')->take(10);
        //dd($mas_apartados->random(1));     

        return view('home.index',compact('random','','recientes','economicos','sliders','categories'));
    }
    public function categories($categories=null)
    {     
        $categories=$this->categories;
        return view('home.categories',compact('categories'));        
    }

    public function contacts()
    {    
        $categories=$this->categories;
        return view('home.contacts',compact('categories'));        
    }

  
}
