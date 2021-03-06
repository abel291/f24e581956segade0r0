<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ReservedProduct;
use App\Product;
use App\Image;
use Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::whereNull('deleted_at')->get();        
        return view('dashboard.producto.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit=false;

        return view('dashboard.producto.create',compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $producto)
    {
        $v = Validator::make($request->all(), [            
            'title'             =>'required',
            'content'           =>'required',
            'price'             =>'required|min:0',
            'seo_title'         =>'nullable|max:75',
            'seo_desc'          =>'nullable|max:320',
            'seo_keys'          =>'nullable|max:140',
            'so_categories_id'  =>'required',
            //'quantity'        =>'required|min:0',            
            //'quantity_min'    =>'required|min:0',
            'images'            =>'required',
            'images.*'          => 'image|mimes:jpeg,jpg,png|max:10000',            
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $files=$request->file('images');
        $product= (new Product)->fill($request->all());
        
        $product->seo_title=!$product->seo_title ? $product->title:$product->seo_title;   
        
        $product->save(); 
        $product->img=$this->upload_img($files,$request->title,$product);   
        $product->slug=str_slug($product->id.'-'.$request->title); 
        $product->save();

        return redirect()->route('productos.index')
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
        $product=Product::findOrFail($id);
        $images=$product->images->sortBy('id');
        return view('dashboard.producto.create',compact('edit','product','images'));
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
            'title'=>'required',
            'content'=>'required',
            'price'=>'required|min:0',
            'seo_title'       =>'nullable|max:75',
            'seo_desc'       =>'nullable|max:320',
            'seo_keys'       =>'nullable|max:140',
            'so_categories_id'  =>'required',
            //'quantity'=>'required|min:0',            
            //'quantity_min'=>'required|min:0',
            'images.*' => ' image|mimes:jpeg,jpg,png|max:10000',            
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        $product= Product::find($id)->fill($request->all());
        $product->slug=$product->id.'-'.str_slug($request->title);        
        $product->img=$request->img_activo;  
        $product->seo_title=!$product->seo_title ? $product->title:$product->seo_title;    
        $product->save();


        
            
        //dd($filename);
        $files=$request->file('images');
        $this->upload_img($files,$product->title,$product);      
       
        return redirect()->route('productos.index')
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
        $product=Product::findOrFail($id);
        $product->deleted_at=date('Y-m-d H:i:s');
        $product->activo=0;
        $product->save();
        return redirect()->route('productos.index')
            ->withSuccess('Producto eliminado con exito');
    }
    public function delete_img($id)
    {
        $img=Image::findOrFail($id);

        $img->delete();
        return redirect()->back()->withSuccess('La imagen se borro correctamente'); ;
    }

    public function upload_img($files,$title,$product)
    {   

        if ($files){           
            foreach ($files as $value) {

                if ($value->getClientSize()>100000) {
                    
                    $temppath=$value->getPathname();
                    $type='.'.$value->getClientOriginalExtension();                   
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

                    $value=$filename;
                    //dd($value);
                }             
                
                $img_thum=\Image::make($value)->resize(365,260)->stream('jpg',60);
                $img_normal=\Image::make($value)->stream('jpg',60);
                
                $filename_normal='segadeoro/img/'.uniqid(5)."_".str_slug($title).'.jpg';    
                $filename_thum='segadeoro/thum/'.uniqid(5)."_".str_slug($title).'.jpg';      
                
                //dd($value);

                Storage::put($filename_normal,$img_normal->__toString(),'public');                           
                Storage::put($filename_thum,$img_thum->__toString(),'public');
                
                $filename_normal=Storage::url($filename_normal);
                $filename_thum=Storage::url($filename_thum);
                $image= new Image;                    
                $image->img=$filename_normal;
                $image->thum=$filename_thum;
                $image->product()->associate($product);
                $image->save();   

            }
            return $filename_thum;
        }
        

        /*
        if ($request->hasFile('images')){

            $file=$request->file('images');
            foreach ($file as $value ) {      
                
                $img_thumbnails=\Image::make($value)->resize(365,260)->stream('jpg',60);
                $img_normal=\Image::make($value)->stream('jpg',60);
                $filename_thumbnail='segadeoro/thumbnails/segadeoro_'.uniqid(10)."_".str_slug($request->title).'jpg';
                $filename_normal='segadeoro/img/segadeoro_'.uniqid(10)."_".str_slug($request->title).'jpg';
                //$img_thumbnails->save(public_path().'/img/thumbnails/'.$value->getClientOriginalName(),60);             
                
                Storage::put($filename_thumbnail,$img_normal->__toString(),'public');
                Storage::put($filename_normal,$img_thumbnails->__toString(),'public');                
                //dd(Storage::url($filename););

                
                $images= new Image;
                $image->img=$filename_normal;
                $image->thum=$filename_thumbnail;
                $image->associate()->product($product);
                $image->save();
                }
        }*/
    }
}
