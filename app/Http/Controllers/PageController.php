<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Category;
class PageController extends Controller
{
    public function __construct()
    {
        $this->categories=Category::
          where('products.activo',1)          
          ->join('products', 'categories.id','=','products.so_categories_id')                       
          ->select('categories.slug as category_slug','categories.name as category_name')
          ->get()->unique('category_name');        
    }

    public function index($slug)
    {	
    	$page=Page::where('slug',$slug)->first();
    	$categories=$this->categories;
    	return view('page.index',compact('page','categories'));
    }
    
    public function empeno()
    { 
      $page=Page::where('slug','empeno-malaga')->first();
      $categories=$this->categories;
      return view('page.index',compact('page','categories'));
    }

    public function compraOro()
    { 
      $page=Page::where('slug','compra-venta-oro-malaga')->first();
      $categories=$this->categories;
      return view('page.index',compact('page','categories'));
    }

    public function quieneSomos()
    { 
      $page=Page::where('slug','quienes-somos')->first();
      $categories=$this->categories;
      return view('page.index',compact('page','categories'));
    }

    public function politicasLegales()
    { 
      $page=Page::where('slug','politicas-legales')->first();
      $categories=$this->categories;
      return view('page.index',compact('page','categories'));
    }
}
