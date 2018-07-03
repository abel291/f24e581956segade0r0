<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    protected function authenticated($request, $user)
    {
        if($user->is_admin) {
            return redirect()->intended('/dashboard');
        }

        return redirect()->intended('/');
    }
    public function showLoginForm()
    {
        $categories=\App\Category::
          where('products.activo',1)
          ->orderBy('products.id','desc')
          ->join('products', 'categories.id','=','products.so_categories_id')                       
          ->select('categories.slug as category_slug','categories.name as category_name')
          ->get()->unique('category_name');  

        return view('auth.login', compact('title','categories'));
    }
}
