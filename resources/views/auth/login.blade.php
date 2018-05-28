@extends('layouts.app')
@section('title', 'login')
@section('content')
<!-- Login Page 1 -->
        <div class="login-page-1 container-fluid no-padding">
            <div class="padding-50"></div>
            <!-- Container -->
            <div class="container">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="login-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#login" title="Login" role="tab" data-toggle="tab">Login</a></li>
                            <li role="presentation"><a href="#register" title="Register" role="tab" data-toggle="tab">Registrarse</a></li>
                        </ul><!-- Nav tabs /- -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="login">
                                
                                <form class="login-form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <h3>Inicio de sesion</h3>
                                    <div class="form-group col-md-12 no-padding">
                                        <input type="text" name="email" class="form-control" placeholder="EMAIL" required value="admin@admin.com">
                                    </div>
                                    <div class="form-group col-md-12 no-padding">
                                        <input type="text" name="password" class="form-control" placeholder="CONTRASEÑA" required value="secret">
                                    </div> 
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif <br>           
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <br>                                   
                                    <button type="submirt" title="LogIn">Inciar <i class="arrow_right"></i></button>
                                </form>

                                
                            </div>
                            <div role="tabpanel" class="tab-pane" id="register">
                                <p>los registro se hacen manuales desde la tienda</p>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Container /- -->
            <div class="padding-100"></div>
        </div><!-- Login Page 1 /- -->
          
       
@endsection