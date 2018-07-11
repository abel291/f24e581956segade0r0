<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use Illuminate\Support\Facades\Storage;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=Page::get();             
        return view('dashboard.page.list',compact('pages'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.index',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=true;
        $page=Page::find($id);
        return view('dashboard.page.create',compact('edit','page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [           
            
            'content'   =>'required',      
            'img'       =>'nullable|image|mimes:jpeg,jpg,png|max:10000',            
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }        
                 
        $page=Page::find($id);       
        
        $page->entry=$request->entry; 
        $page->content=$request->content;
        $page->seo_title=$request->seo_title; 
        $page->seo_desc=$request->seo_desc; 
        $page->seo_keys=$request->seo_keys;
        
        if ($request->hasFile('main_img')){
            $files=$request->file('main_img');
            $page->main_img=$this->upload_img($files,$page->slug);
        }        
        $page->save();        

        return redirect()->route('page.index')
            ->withSuccess('Datos guardados con exito');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove_image($id)
    {
        
        $page=Page::find($id);
        $page->main_img=null;
        $page->save();
        return redirect()->back()->withSuccess('Imagen removida');
    }
    public function upload_img($file,$title)
    {
                  
        if ($file->getClientSize()>100000) {

            $temppath=$file->getPathname();
            $type='.'.$file->getClientOriginalExtension();                   
            $filename='/tmp/'.uniqid(5)."_".str_slug($title).$type;       

            list($ancho, $largo) = getimagesize($temppath);           

            $nuevo_largo = (1200 * $largo) / $ancho;

            switch ( $type ){    
                case ".jpg":
                case ".jpeg":
                $imagen = imagecreatefromjpeg( $temppath );              
                break;
                case ".png":
                $imagen = imagecreatefrompng( $temppath );
                break;
            }
            $lienzo = imagecreatetruecolor(1200,$nuevo_largo );           
            imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, 1200,$nuevo_largo , $ancho, $largo);
            imagejpeg( $lienzo, $filename,80);

            $file=$filename;
                    
        }
        
        $img=\Image::make($file)->stream('jpg');                
        $filename='segadeoro/img/'.uniqid(5)."_".str_slug($title).'.jpg';     
        //$filename='segadeoro/img/segadeoro_dd.jpg';    
        Storage::put($filename,$img->__toString(),'public');                           
        return Storage::url($filename);   
        
    }
}
