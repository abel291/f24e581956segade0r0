<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class BlogController extends Controller
{
    
    public function __construct()
    {
        $this->categories=Category::
          where('products.activo',1)         
          ->join('products', 'categories.id','=','products.so_categories_id')                       
          ->select('categories.slug as category_slug','categories.name as category_name')
          ->get()->unique('category_name');     
    }

    public function index()
    {
    	$entradas=Blog::
            where('blog.activo',1)
            ->orderBy('blog.id','desc')
            ->join('categories', 'blog.so_categories_id', '=', 'categories.id')                       
            ->select(
                    'blog.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name'                
        )->paginate(9);
        
        $categories=$this->categories;
        return view('blog.index',compact('categories','entradas'));     
	}


    

    public function entradas($slug_ca,$slug_blog=null)
    {
    	$entradas=Blog::
            orderBy('id','desc')
            ->join('categories', 'blog.so_categories_id', '=', 'categories.id')
            ->where('categories.slug',$slug_ca)            
            ->where('blog.activo',1)            
            ->select(
                    'blog.*',
                    'categories.slug as category_slug' ,
                    'categories.name as category_name'                
            );

        //list
        $categories=$this->categories;
        if (!$slug_blog) {    
            $entradas=$entradas->paginate(9);
            $entradas->search=$entradas->first()->category_name;
            //dd($entradas);
            
            return view('blog.index',compact('categories','entradas'));            
        
        //detail
        }else{
            $entrada=$entradas->where('blog.slug',$slug_blog)->first();                   
             
                 	      
            return view('blog.entrada',compact('categories','entrada'));        
        }     
    }
}
