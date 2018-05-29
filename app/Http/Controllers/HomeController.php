<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservedProduct;
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
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        
        

        //$products=Product::inRandomOrder()->paginate(6);
        $products=product::
            orderBy('id','desc')
            ->join('categories', 'products.so_categories_id', '=', 'categories.id')
                       
            ->select(
                    'products.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name'                
        )->get(); 
        //$products=Product::orderBy('id','desc')->get();
        $random=$products->random(6);
        $recientes=$products->take(10);
        $economicos=$products->sortBy('price')->take(10);
        //dd($mas_apartados->random(1));

        $mas_apartados=ReservedProduct::orderBy('id','desc')->where('status',2)->limit(50)->get();               
        $mas_apartados=$mas_apartados->groupBy('so_products_id');        
        $mas_apartados = $mas_apartados->map(function ($item, $key) {            
            return $item->first();
        });
        $mas_apartados = $mas_apartados->take(5);

        return view('home.index',compact('random','mas_apartados','recientes','economicos'));
    }
    public function categories($categories=null)
    {
        if (!$categories) {
            return view('home.categories');
            
        }
    }
    public function contacts()
    {
        
            return view('home.contacts');
            
        
    }
}
