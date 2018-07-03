<?php

namespace App\Http\Controllers\dashboard;

use App\Product;
use App\User;
use App\ReservedProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($value='')
    {	
    	$products=Product::
        join('categories', 'products.so_categories_id', '=', 'categories.id')
        ->select('products.*',
            'categories.slug as category_slug',
            'categories.name as category_name',         
            'categories.color'           
        )->get();
    	$users=User::get();
    	$reserved=ReservedProduct::get();
        
        $chart=$products->groupBy('so_categories_id')->map(function ($item, $key) {
            return [$item->first()->category_name,count($item),$item->first()->color];
        });

       

    	return view('dashboard.index',compact('products','users','reserved','chart'));
    }
}