<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservedProduct;
use App\Product;
use Validator;
class ProductoController extends Controller
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
        $productos=Product::get();        
        return view('dashboard.producto.list',compact('productos'));
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
            'nombre'=>'required',
            'descripcion'=>'required',
            'precio'=>'required',
            'cantidad'=>'required',
            'modelo'=>'required',
            'marca'=>'required',
            'cantidad_min'=>'required',
            'status'=>'required',
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        $producto->fill($request->all());        
        $producto->save();
        return redirect()->route('productos.index')
            ->withSuccess('Datos guardados con exito'); 
        //dd($request->all());
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
        //
    }
}
