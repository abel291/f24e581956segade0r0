<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ReservedProduct ;
class ReservedController extends Controller
{
    public function add(Request $request)
    {
       
        $product=Product::find($request->so_products_id);

        if ($product->quantity_min>$request->quantity) {
        	return redirect()->back()->withErrors('La cantida minima de este producto es de '.$product->quantity_min);
        }
        
        $reserved=(new ReservedProduct)->fill($product->toArray());
        $reserved=$reserved->fill($request->all());        
        $reserved->img=$product->images->first()->images;      
        $reserved->category=$product->category->name;    
        
        $reserved->user()->associate(auth()->user()->id);
        $reserved->save();
        
        return redirect()->route('reserved');
       
    }
    public function reserved()
    { 
        $user_id=auth()->user()->id;
        $reserved_products=auth()->user()->reserved_products->where('status',0);
        
        //dd($reserved_products->first());
        return view('reserved.list',compact('reserved_products'));
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

        $total=$reserved_products->sum(function ($product) {
		    return $product->price*$product->quantity;
		});
        
        //dd($total);
        //dd($reserved_products);
        return view('reserved.checkout',compact('reserved_products','total'));
    }
     public function store(Request $request)
     {
     	$reserved_products=ReservedProduct::where('so_users_id',auth()->user()->id)->where('status',0)
     	->update([
     		'status' => 1,
     		'date_arrival' => $request->date_arrival,
     		'hour' => $request->hour     		
     	]);
     	return redirect()->route('history');
        
     }
     public function history()
     {
     	$user_id=auth()->user()->id;
        $reserved_products=auth()->user()->reserved_products;

        return view('reserved.history',compact('reserved_products'));

     }
}
