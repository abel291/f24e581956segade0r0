<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="wrapper"> 
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">                           
                            <span class="clear"> <span class="block m-t-xs"> 
                                <strong class="font-bold">{{auth()->user()->name}}</strong>
                            </span> 
                            <span class="text-muted text-xs block">{{auth()->user()->email}} </span> 
                            
                        </div>                        
                    </li>
                    
                    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <a href="{{url('/dashboard')}}"><i class="fa fa-house"></i> <span class="nav-label">Home</span></a>
                    </li>
                    <li class="{{ Request::is('dashboard/productos*') ? 'active' : '' }}">
                        <a href="{{url('/dashboard/productos')}}"><i class="fa fa-house"></i> <span class="nav-label">Productos</span></a>
                    </li>
                    <li class="{{ Request::is('ordenes') ? 'active' : '' }}">
                        <a href="{{url('/')}}"><i class="fa fa-house"></i> <span class="nav-label">Ordenes</span></a>
                    </li>             
                    
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="{{route('logout')}}">
                                <i class="fa fa-sign-out"></i> Salir
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="wrapper wrapper-content">
                
               
                    @yield('content')
                

                <div class="row">       
                    <div class="footer">                        
                        <div>
                            <strong>Copyright</strong> Example Company &copy; 2018
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>   
    <script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>
    
    @yield('js')
</body>
</html>
