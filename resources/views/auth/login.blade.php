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
                       @if(isset ($errors) && count($errors) > 0)
                            <div class="alert alert-danger alert-dismissable  ">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    
                                </ul>        
                            </div>
                        @endif

                        @if(Session::get('success', false))
                            <?php $data = Session::get('success'); ?>
                            @if (is_array($data))
                                @foreach ($data as $msg)
                                    <div class="alert alert-success ">
                                        <i class="fa fa-check"></i>
                                        {{ $msg }}
                                        <button type="button" class="close" aria-hidden="true">&times;</button>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-success alert-notification">
                                    <i class="fa fa-check"></i>
                                    {{ $data }}
                                    <button type="button" class="close" aria-hidden="true">&times;</button>
                                </div>
                            @endif
                        @endif
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
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control highlighted" placeholder="EMAIL" required >
                                    </div>
                                    <div class="form-group col-md-12 no-padding">
                                        <label>Contraseña</label>
                                        <input type="password" name="password" class="form-control highlighted" placeholder="CONTRASEÑA" required >
                                    </div>
                                    
                                    <br>                                   
                                    <button type="submirt" title="LogIn">Iniciar <i class="arrow_right"></i></button>
                                </form>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="register">
                                <form class="login-form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <h3>Registrarse</h3>
                                     <div class="form-group col-md-12 no-padding">
                                        <label>Nombre</label>
                                        <input type="text" name="name" class="form-control highlighted" required value="{{ old('name') }}" >
                                    </div>
                                     <div class="form-group col-md-12 no-padding">
                                        <label>Telefono</label>
                                        <input type="text" name="phone" class="form-control highlighted" required value="{{ old('phone') }}" >
                                    </div>
                                    <div class="form-group col-md-12 no-padding">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control highlighted" required value="{{ old('email') }}" >
                                    </div>
                                     <div class="form-group col-md-12 no-padding">
                                        <label>Contraseña</label>
                                        <input type="password" name="password" class="form-control highlighted" required >
                                    </div>
                                    <div class="form-group col-md-12 no-padding">
                                        <label>Confirmar Contraseña</label>
                                        <input type="password" name="password_confirmation" class="form-control highlighted" required >
                                    </div>
                                    <div class="form-group col-md-12 text-left">
                                        <div align="center" class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_PUBLIC_KEY') }}"></div>
                                    </div>
                                    
                                    <br>                                   
                                    <button type="submirt" title="LogIn">Registrarse <i class="arrow_right"></i></button>
                                </form>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Container /- -->
            <div class="padding-100"></div>
        </div><!-- Login Page 1 /- -->         
       
@endsection
@section('js')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection