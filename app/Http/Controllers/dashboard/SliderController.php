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
            'title'=>'required',
            'content'=>'required',            
            'href'=>'required',          
            'img' => ' required|image|mimes:jpeg,jpg,png|max:1000',            
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $files=$request->file('img');
        $slider=$slider->fill($request->all());
        $slider->img=$this->upload_img($files,$slider->title);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Slider::findOrFail($id);
        $product->delete();
        return redirect()->route('slider.index')
            ->withSuccess('Slider eliminado con exito');
    }
    public function upload_img($files,$title)
    {
                  
        $img=\Image::make($files)->stream('jpg',100);                
        //$filename='segadeoro/img/segadeoro_'.uniqid(5)."_".str_slug($title).'.jpg';     
        $filename='segadeoro/sliders/segadeoro_dd.jpg';    
        Storage::put($filename,$img->__toString(),'public');                           
        return Storage::url($filename);   
        
    }
}