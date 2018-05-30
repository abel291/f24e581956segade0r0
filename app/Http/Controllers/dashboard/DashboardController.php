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
    	$products=Product::get();
    	$users=User::get();
    	$reserved=ReservedProduct::get();

    	return view('dashboard.index',compact('products','users','reserved'));
    }
}