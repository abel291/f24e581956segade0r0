<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use Validator;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Storage::disk('s3')->allFiles('/'));
        $categories=Category::where('activo',1)->get();
        return view('dashboard.categories.list',compact('categories'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return redirect()->route('categorias.index');
        $edit=false;
        return view('dashboard.categories.create',compact('edit'));
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
            'name'=>'required',
            'seo_title'=>'nullable|max:120',
            'seo_desc'=>'nullable|max:180',
            'seo_keys'=>'nullable|max:120',
            'img' => 'image|mimes:jpeg,jpg,png|max:10000',          
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }   
        
        $categoria=(new Category)->fill($request->all());
        $categoria->slug=str_slug($request->name);
        $files=$request->file('img');                
        
        $categoria->img=$this->upload_img($files,$request->name);       
        $categoria->save();

        return redirect()->route('categorias.index')
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
        $edit=true;
        $categoria=Category::findOrFail($id);        
        return view('dashboard.categories.create',compact('edit','categoria'));
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
            'name'=>'required',
            'color'=>'required',
            'seo_title'=>'nullable|max:120',
            'seo_desc'=>'nullable|max:180',
            'seo_keys'=>'nullable|max:120',
            'img' => 'image|mimes:jpeg,jpg,png|max:10000',          
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }   
        
        $categoria=Category::findOrFail($id);
        $categoria->slug=str_slug($request->name);
        $categoria->color=$request->color;        
        $categoria->seo_title=$request->seo_title;        
        $categoria->seo_desc=$request->seo_desc;        
        $categoria->seo_keys=$request->seo_keys;      
        

        $files=$request->file('img');
        if ($files) {
            $categoria->img=str_replace("https://segadeoro.s3.us-east-2.amazonaws.com/", '', $categoria->img);        
            if (Storage::exists($categoria->img)) {                
                Storage::delete($categoria->img);
            }
            $categoria->img=$this->upload_img($files,$request->name);

        }       
        //dd($categoria);
        $categoria->save();

        return redirect()->route('categorias.index')
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
        
        $categoria=Category::findOrFail($id);

        if ($categoria) {
            $categoria->img=str_replace("https://segadeoro.s3.us-east-2.amazonaws.com/", '', $categoria->img);
            if (Storage::exists($categoria->img)) {                
                Storage::delete($categoria->img);
            }
        }
        
        $categoria->deleted_at=date('Y-m-d H:i:s');
        $categoria->activo=0;
        $categoria->save();
        
        $images=[];
        foreach ($categoria->products as  $product) {
            
            $product->deleted_at=date('Y-m-d H:i:s');
            $product->activo=0;
            $product->save();
            
            $product->img=str_replace("https://segadeoro.s3.us-east-2.amazonaws.com/", '', $product->img);
            if (Storage::exists($product->img)) {                
                Storage::delete($product->img);
            }

            if (count($product->images)>0) {
                
                foreach ($product->images as  $image) {
                   array_push($images, str_replace("https://segadeoro.s3.us-east-2.amazonaws.com/", '', $image->img)) ;
                   array_push($images, str_replace("https://segadeoro.s3.us-east-2.amazonaws.com/", '', $image->thum)); 
                }
            }
            
        }        
        Storage::delete($images);
        return redirect()->route('categorias.index')->withSuccess('Categoria eliminada con exito');
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
        $img=\Image::make($file)->resize(370,300)->stream('jpg');                       
        $filename='categorias/'.uniqid(5)."_".str_slug($title).'.jpg';     
        //$filename='segadeoro/img/segadeoro_dd.jpg';    
        Storage::put($filename,$img->__toString(),'public');                           
        return Storage::url($filename);   
        
    }
}
