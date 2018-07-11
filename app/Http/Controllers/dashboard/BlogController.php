<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use Validator;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas=Blog::
        join('categories', 'blog.so_categories_id', '=', 'categories.id')
        ->select(
            'blog.*',
            'categories.slug as category_slug'                        
        )->get();
        return view('dashboard.blog.list',compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit=false;

        return view('dashboard.blog.create',compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $v = Validator::make($request->all(), [            
            'so_categories_id'=>'required',            
            'titulo'      =>'required|max:120',  
            'entradilla'  =>'required|max:255',                 
            'contenido'   =>'required',
            'seo_title'   =>'nullable|max:120',
            'seo_desc'    =>'nullable|max:180',
            'seo_keys'    =>'nullable|max:120',            
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        } 
        
        $entrada=(new Blog)->fill($request->all());
        $files=$request->file('main_img');                
        $entrada->main_img=$this->upload_img($files,$request->titulo);
        $entrada->slug=str_slug($request->titulo);       
        $entrada->save();

        return redirect()->route('blog.index')
            ->withSuccess('Datos guardados con exito');  
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
        $entrada=Blog::find($id);
        $edit=true;        
        return view('dashboard.blog.create',compact('edit','entrada'));
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
            'so_categories_id'=>'required',            
            'titulo'      =>'required|max:120',  
            'entradilla'  =>'required|max:255',                 
            'contenido'   =>'required',
            'seo_title'   =>'nullable|max:120',
            'seo_desc'    =>'nullable|max:180',
            'seo_keys'    =>'nullable|max:120',                 
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }       
       
        
        $entrada=Blog::find($id);
        $entrada->titulo=$request->titulo;
        $entrada->entradilla=$request->entradilla;
        $entrada->contenido=$request->contenido;
        $entrada->seo_title=$request->seo_title;
        $entrada->seo_desc=$request->seo_desc;
        $entrada->seo_keys=$request->seo_keys;
        $entrada->so_categories_id=$request->so_categories_id;

        if ($request->hasFile('main_img')){
            $files=$request->file('main_img');
            $entrada->main_img=$this->upload_img($files,$entrada->titulo);
        }        
        $entrada->save();

        return redirect()->route('blog.index')
            ->withSuccess('Datos guardados con exito');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entrada=Blog::findOrFail($id);
        if ($entrada) {
            $entrada->main_img=str_replace("https://segadeoro.s3.us-east-2.amazonaws.com/", '', $entrada->main_img);
            if (Storage::exists($entrada->main_img)) {                
                Storage::delete($entrada->main_img);
            }
        }
        $entrada->delete();
        return redirect()->route('blog.index')
            ->withSuccess('Entrada eliminada con exito');
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
            imagejpeg( $lienzo, $temppath,80);

            $file=$temppath;
                    
        }          
        $img=\Image::make($file)->stream('jpg');                       
        $filename='segadeoro/img/'.uniqid(5)."_".str_slug($title).'.jpg';     
        //$filename='segadeoro/img/segadeoro_dd.jpg';    
        Storage::put($filename,$img->__toString(),'public');                           
        return Storage::url($filename);   
        
    }
}
