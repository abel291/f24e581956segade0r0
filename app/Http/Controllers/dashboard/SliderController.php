<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

use Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::get();
        return view('dashboard.slider.list',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit=false;

        return view('dashboard.slider.create',compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Slider $slider)
    {
        $v = Validator::make($request->all(), [            
            'content'=>'required',            
            'tipo'=>'required',            
            'href'=>'required',                   
            'img' => ' required|image|mimes:jpeg,jpg,png|max:10000',            
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }       
       
        $files=$request->file('img');
        $slider=$slider->fill($request->all());
        $slider->content=nl2br($request->content);
        $slider->img=$this->upload_img($files,$request->content);
        $slider->save();

        return redirect()->route('slider.index')
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::find($id);
        $edit=true;        
        return view('dashboard.slider.create',compact('edit','slider'));
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
            
            'content'=>'required',            
            'href'=>'required',          
            'img' => 'nullable|image|mimes:jpeg,jpg,png|max:10000',            
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
                 
        $slider=Slider::find($id);       
        $slider->content=nl2br($request->content);
        $slider->href=$request->href; 
        $slider->activo=$request->activo;           
        $slider->tipo=$request->tipo;
        $slider->text_color=$request->text_color;       
        if ($request->hasFile('img')){
            $files=$request->file('img');
            $slider->img=$this->upload_img($files,$slider->title);
        }        
        $slider->save();

        if ($slider->tipo==0 && $slider->activo==1) {
            $sliders=Slider::where('tipo',0)->where('activo',1)->get();
            //dd($sliders->sortBy('updated_at'));
            if ($sliders->count()>2) {
                $slider_desactive=$sliders->sortByDesc('updated_at')->last();
                //dd($slider_desactive);
                $slider_desactive->activo=0;
                $slider_desactive->save();
               
            }
            
        }

        return redirect()->route('slider.index')
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
        $slider=Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('slider.index')
            ->withSuccess('Slider eliminado con exito');
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
