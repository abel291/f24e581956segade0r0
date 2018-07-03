<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ReservedProduct;
use App\Product;

class ReservedController extends Controller
{
    public function reserved($value='')
    {	
    	$products=ReservedProduct::
        join('users','reserved_product.so_users_id','=','users.id')     
        ->join('products','reserved_product.so_products_id','=','products.id')
    	->join('categories','products.so_categories_id','=','categories.id')
        ->select(
    		'reserved_product.*',
    		'users.name as user_name' ,
    		'users.email as user_email' ,
            'users.phone as user_phone',
    		'categories.slug as category' 
    	)
    	->get();

    	
    	return view('dashboard.reserved.list',compact('products'));
    }
    public function status($id_reserved,$status)
    {
    	$reserved=ReservedProduct::find($id_reserved);
    	if ($status>=0 && $status<=3 ) {
    		$reserved->status=$status;
    		$reserved->save();
    		return redirect()->route('d_reserved')->withSuccess('status cambiado con exito'); ;    		
    	}
    	return redirect()->route('d_reserved');
    }
    

}
