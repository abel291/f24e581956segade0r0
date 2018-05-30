<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::get();        
        return view('dashboard.users.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $edit=false;
         return view('dashboard.users.create',compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        $v = Validator::make($request->all(), [            
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|string|max:20',
            'password' => 'required|string|min:6|confirmed',            
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $user->fill($request->all());
        $user->password=Hash::make($request->password);
        $user->save();

        return redirect()->route('usuarios.index')
            ->withSuccess('Usuario agregado con exito'); 

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
        $user=User::find($id);
        return view('dashboard.users.create',compact('edit','user'));
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
        $user=User::find($id);
        $v = Validator::make($request->all(), [            
            'name' => 'required|string|max:255',            
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,'.$user->id,  
            'password' => 'nullable|string|min:6|confirmed',                  
        ]);
         if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;

        if ($request->password) {
            $user->password=Hash::make($request->password);   
        }   
        $user->save();

        return redirect()->route('usuarios.index')
            ->withSuccess('Usuario modificado con exito'); 
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::find($id)->delete();
       return redirect()->route('usuarios.index')
            ->withSuccess('Usuario Eliminado con exito'); 
        
    }
}
