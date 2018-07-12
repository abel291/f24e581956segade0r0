<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="keywords" content="@yield('seo_keys')">
    <meta name="description" content="@yield('seo_desc')">
    
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>   
    <link rel="icon" type="image/x-icon" href="{{ asset('/segade/img/favicon.ico')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images//apple-touch-icon-114x114-precomposed.png">    
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images//apple-touch-icon-72x72-precomposed.png">   
    <link rel="apple-touch-icon-precomposed" href="images//apple-touch-icon-57x57-precomposed.png">    
    <link href="{{ asset('/segade/libraries/lightslider/lightslider.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/revolution/css/settings.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/revolution/css/layers.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/css/pulse.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/segade/css/custom_pulse.css')}}" rel="stylesheet" type="text/css">
    @yield('css')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121624445-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-121624445-1');
    </script>    
    
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
                                    <a href="{{route('home')}}" class="navbar-brand">
                                        <img src="{{url('/segade/img/logo-segade.png')}}" alt="Compro Oro Málaga" title="Compro Oro Málaga" width="200px;"/>
                                    </a>
                                </div>
                                <div class="menu-icon">                                
                                    <div class="search">    
                                        <a href="#" id="search" title="Buscar"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>              
                                <div class="navbar-collapse collapse navbar-right" id="navbar">
                                    <ul class="nav navbar-nav navbar-right">                                       

                                        <li class="{{Request::is('compra-venta-oro-malaga*') ? 'active' : '' }} ">
                                            <a href="{{route('compraOro')}}" >Compra y venta de oro</a>                              
                                        </li>

                                        <li class="dropdown {{ \Route::current()->getName() === 'categories' ? 'active' : '' }} ">
                                            <a href="{{route('categories')}}" class="dropdown-toggle "role="button" aria-haspopup="true" aria-expanded="false">Joyería <i class="fa fa-angle-down"></i> </a>
                                            <i class="ddl-switch fa fa-angle-down"></i>
                                            <ul class="dropdown-menu" role="menu">
                                                @foreach($categories->sortBy('category_name') as $category)
                                                <li><a href="{{route('categoria',[$category->category_slug])}}">{{$category->category_name}}</a></li>
                                                @endforeach
                                                <li><a href="{{url('/novedades')}}">Novedades</a></li>                                               
                                            </ul>
                                        </li>
                                        <li class="{{Request::is('page/empeno') ? 'active' : '' }} ">
                                            <a href="{{route('empeno')}}">Empeño</a>                              
                                        </li> 
                                        <li class="{{Request::is('blog*') ? 'active' : '' }} ">
                                            <a href="{{route('blog')}}" >Blog</a>                              
                                        </li> 
                                                                               
                                        <li class="dropdown ">
                                            @if(auth()->check())
                                                <a  class="dropdown-toggle "role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-user"></i> 
                                                    {{ auth()->user()->name }} 
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <i class="ddl-switch fa fa-angle-down"></i>
                                                <ul class="dropdown-menu" role="menu">     
                                                    @if(auth()->user()->is_admin)  
                                                     <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                                    @endif                                           
                                                    <li><a href="{{route('history')}}">Historial de reservados</a></li>
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
                                    <dir style="position: absolute;top: 50%; width: 100%; text-align:center;">
                                        <input type="search" name="search" placeholder="¿Qué buscas?">
                                        
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </dir>
                                        
                                </form>
                            </div><!-- Search Box /- -->
                            
                        </div><!-- Row /- -->
                    </div><!-- Container /- -->
            </header>  
 
            @yield('content')     
            </div>
            
        </div>
    </div>

    <footer class="container-fluid no-left-padding no-right-padding footer-2 pt-5">
        <div class="container">
            <div class="template-info">
                <a href="{{route('home')}}" class="footer-img"><img src="{{url('/segade/img/logo_b.png')}}" alt="Casa de empeños en Málaga" title="Casa de empeños en Málaga" /></a>
                
                <p>C/ Héroe de Sostoa, 91 CP 29002 Málaga<span><a href="tel:+34951112626">(+ 34) 951 112 626</a> - <a href="segadeoro@segade.com">hola@segadeoro.com</a></span></p>
                <ul>                    
                    <li><a href="https://www.facebook.com/segadecomprooro/" title="facebook">facebook</a></li>
                    <li><a href="https://plus.google.com/u/1/108107907386449557440" title="google+">google+</a></li>
                    <li><a href="{{route('politicasLegales')}}" title="Politicas Legales">Politicas Legales</a></li>
                    <li><a href="{{route('contactos')}}" title="Contacto">Contacto</a></li>
                    <li><a href="{{route('quieneSomos')}}" title="Quiene Somos">Quienes Somos</a></li>
                    
                </ul>
            </div>
        </div><!-- Container /- -->
        <div class="copyright mt-5">

            <p>(c) {{date('Y')}} Desarrollado con <i class="fa fa-heart" style="color:red"></i> por <a href="https://rocketfy.es" title="Diseño web en Málaga" target="blank">Rocketfy</a></p>
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
    <script type="text/javascript" src="{{ asset('/segade/js/herbyCookie.js')}}"></script>
    <!-- Library - Theme JS --> 
    <script src="{{ asset('/segade/js/functions.js')}}"></script>
    @yield('js')

<body>
</body>
</html>
