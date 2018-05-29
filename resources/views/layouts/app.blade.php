<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/segade/img/favicon.ico')}}" />
    
    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images//apple-touch-icon-114x114-precomposed.png">
    
    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images//apple-touch-icon-72x72-precomposed.png">   
    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="images//apple-touch-icon-57x57-precomposed.png">     
    
    <link href="{{ asset('/segade/libraries/lightslider/lightslider.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/revolution/css/settings.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/revolution/css/layers.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/css/pulse.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/css/custom_pulse.css')}}" rel="stylesheet" type="text/css">
    @yield('css') 
    <!--[if lt IE 9]>
        <script src="js/html5/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
    <body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
    <a id="top"></a>

    <div class="shop-main">
        <div class="shop-boxed">            
            <header id="header" class=" header-shop header-bg-light text-color-black no-padding" style="border-bottom: 1px solid #e5e5e5;">
            
                    <div class="container">
                        <div class="row">
                            <!-- nav -->
                            <nav class="navbar navbar-default ow-navigation">
                                <div class="navbar-header">
                                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a href="index.html" class="navbar-brand"><img src="{{url('/segade/img/logo-segade.png')}}" alt="Logo" width="200px;"/></a>
                                </div>
                                <div class="menu-icon">
                                <!--<div class="cart">                          
                                    <button aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" title="Cart" id="language" type="button" class="btn dropdown-toggle"><i class="fa fa-shopping-cart"></i></button>
                                    <ul class="dropdown-menu no-padding">
                                        <li class="mini_cart_item">
                                            <a href="#" class="cart-item-image">
                                                <img width="70" height="70" alt="poster_2_up" class="attachment-shop_thumbnail" src="http://placehold.it/70x70/ddd">
                                            </a>
                                            <div class="cart-detail">
                                                <a href="#">denim dots t-shirt</a>
                                                <span class="quantity">$105.25</span>
                                                <a href="#" class="remove-cart"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </div>
                                        </li>
                                        <li class="mini_cart_item">
                                            <a href="#" class="cart-item-image">
                                                <img width="70" height="70" alt="poster_2_up" class="attachment-shop_thumbnail" src="http://placehold.it/70x70/ddd">
                                            </a>
                                            <div class="cart-detail">
                                                <a href="#">denim dots t-shirt</a>
                                                <span class="quantity">$105.25</span>
                                                <a href="#" class="remove-cart"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </div>
                                        </li>
                                        <li class="subtotal">
                                            <h5>subtotal <span>$12,99</span></h5>
                                        </li>
                                        <li class="button">
                                            <a href="#" title="View Cart">View Cart</a>
                                            <a href="#" title="Check Out">Check out</a>
                                        </li>
                                    </ul>
                                </div>-->
                                    <div class="search">    
                                        <a href="#" id="search" title="Buscar"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>              
                                <div class="navbar-collapse collapse navbar-right" id="navbar">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="{{ \Route::current()->getName() === 'home' ? 'active' : '' }} ">
                                            <a href="{{route('home')}}" >Inicio</a>                                
                                        </li>                           
                                        <li class="dropdown {{ \Route::current()->getName() === 'categories' ? 'active' : '' }} ">
                                            <a href="{{route('categories')}}" class="dropdown-toggle "role="button" aria-haspopup="true" aria-expanded="false">Categorías <i class="fa fa-angle-down"></i> </a>
                                            
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{route('product',['anillos'])}}">Anillos</a></li>
                                                <li><a href="{{route('product',['pulseras'])}}">Pulseras</a></li>
                                                <li><a href="{{route('product',['collares'])}}">Collares</a></li>
                                                <li><a href="{{route('product',['cadenas'])}}">Cadenas</a></li>
                                                <li><a href="{{route('product',['colgantes'])}}">Colgantes</a></li>
                                                <li><a href="{{route('product',['pendientes'])}}">Pendientes</a></li>
                                                <li><a href="{{route('product',['joyas'])}}">Joyas con diamantes</a></li>
                                            </ul>
                                        </li>
                                        <li >
                                            <a href="index.html" >Blog</a>                              
                                        </li>
                                        <li class="{{\Route::current()->getName() === 'contactos' ? 'active' : '' }} ">
                                            <a href="{{route('contactos')}}" >Contacto</a>                              
                                        </li>
                                        <li class="dropdown ">
                                            @if(auth()->check())
                                                <a  class="dropdown-toggle "role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-user"></i> 
                                                    {{ auth()->user()->email }} 
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{route('history')}}">Historial de apartados</a></li>
                                                    <li><a href="{{route('reserved')}}">Cestas</a></li>
                                                    <li><a href="{{route('logout')}}">Cerrar sesion</a></li>                     
                                                </ul>     
                                            @else
                                                <a href="{{route('login')}}" > Iniciar Sesion</a>      
                                            @endif                                                                  
                                        </li>   
                                    </ul>
                                </div><!--/.nav-collapse -->
                            </nav><!-- nav /- -->
                            <!-- Search Box -->
                            <div class="search-box">
                                <button type="button" class="close"><i class="icon icon-arrows-circle-remove"></i></button>
                                <form action="{{route('search')}}" method="get">
                                    <input type="search" name="search" placeholder="Como se llama el producto?" />
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </form>
                            </div><!-- Search Box /- -->
                            
                        </div><!-- Row /- -->
                    </div><!-- Container /- -->
            </header>  
 
            @yield('content')     
            </div>
            
        </div>
    </div>


    <footer class="container-fluid no-left-padding no-right-padding footer-2">
        <div class="container">
            <div class="template-info">
                <a href="#" title=""><img src="{{url('/segade/img/logo_b.png')}}" alt="segade oro" class="logo_footer" /></a>
                
                <p>5th Floor, ABC Building, 456 New Design St, Melbourne, Australia <span><a href="tel:+0049654781235">(+ 004) 965 478 1235</a> - <a href="hello@example.com">hello@example.com</a></span></p>
                <!--<ul>
                    <li><a href="#" title="twitter">twitter</a></li>
                    <li><a href="#" title="facebook">facebook</a></li>
                    <li><a href="#" title="google+">google+</a></li>
                    <li><a href="#" title="pinterest">pinterest</a></li>
                    <li><a href="#" title="dribbble">dribbble</a></li>
                </ul>-->
            </div>
        </div><!-- Container /- -->
        <div class="copyright">
            <p>Copyrights &copy; 2016 by <span><a href="https://rocketfy.es">Rocketfy</a></span>. All Rights Reserved </p>
            <a class="backto-top" id="back-to-top" href="#"><i class="fa fa-long-arrow-up"></i></a>
        </div>
    </footer>
        
    <!-- JQuery v1.11.3 -->
    <script type="text/javascript" src="{{ asset('/segade/js/jquery.min.js')}}"></script>
    <!-- Library JS -->
    <script src="{{ asset('/segade/libraries/lib.js')}}"></script>
    <script src="{{ asset('/segade/libraries/lightslider/lightslider.min.js')}}"></script>
    
    <!-- RS5.0 Core JS Files -->
    <script type="text/javascript" src="{{ asset('/segade/revolution/js/jquery.themepunch.tools.min.js?rev=5.0')}}"></script>
    <script type="text/javascript" src="{{ asset('/segade/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0')}}"></script>
    <script type="text/javascript" src="{{ asset('/segade/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/segade/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/segade/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/segade/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <!-- Library - Theme JS --> 
    <script src="{{ asset('/segade/js/functions.js')}}"></script>
    @yield('js')

<body>
</body>
</html>
