<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ReservedProduct;
use App\Product;

class ReservedController extends Controller
{
    public function reserved($value='')
    {	app('debugbar')->disable();
    	$products=ReservedProduct::
    	join('users','reserved_product.so_users_id','=','users.id')    	
    	->select(
    		'reserved_product.*',
    		'users.name as user_name' ,
    		'users.email as user_email' ,
    		'users.phone as user_phone' 
    	)
    	->get();

    	//dd($products);
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
