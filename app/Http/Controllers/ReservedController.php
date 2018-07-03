<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ReservedProduct ;
class ReservedController extends Controller
{
    public function __construct()
    {
        $this->categories=Category::
          where('products.activo',1)          
          ->join('products', 'categories.id','=','products.so_categories_id')                       
          ->select('categories.slug as category_slug','categories.name as category_name')
          ->get()->unique('category_name');     
    }

    public function add(Request $request)
    {
       
        $product=Product::find($request->so_products_id);       
        
        $reserved=(new ReservedProduct)->fill($product->toArray());        
        $reserved=$reserved->fill($request->all());   
        $reserved->category=$product->category->name; 
        $reserved->user()->associate(auth()->user()->id);
        $reserved->save();
        return redirect()->route('reserved');
       
    }
    public function reserved()
    { 
        $user_id=auth()->user()->id;
        $reserved_products=auth()->user()->reserved_products->where('status',0);       

        $categories=$this->categories;
        return view('reserved.list',compact('categories','reserved_products'));
    }

    public function remove($id=null)
    {
        
        $delete_product=ReservedProduct::find($id);
        $delete_product->delete();
        return redirect()->back();
    }
    public function checkout()
    {
        $user_id=auth()->user()->id;
        $reserved_products=auth()->user()->reserved_products->where('status',0);

        $total=$reserved_products->sum('price');
        
        //dd($total);
        //dd($reserved_products);

        $categories=$this->categories;
        return view('reserved.checkout',compact('categories','reserved_products','total'));
    }
     public function store(Request $request)
     {
     	$reserved_products=ReservedProduct::where('so_users_id',auth()->user()->id)->where('status',0)
     	->update([
     		'status' => 1,
     		//'date_arrival' => $request->date_arrival,
            //'hour' => $request->hour,      
     		'note' => $request->note  		
     	]);

        $categories=$this->categories;
     	return redirect()->route('history');
        
     }
     public function history()
     {
     	$user_id=auth()->user()->id;
        $reserved_products=auth()->user()->reserved_products;

        $categories=$this->categories;
        return view('reserved.history',compact('categories','reserved_products'));
     }
}
