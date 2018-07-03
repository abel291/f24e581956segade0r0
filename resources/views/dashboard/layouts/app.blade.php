<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('/segade/img/favicon.ico')}}" />
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
                                <strong class="font-bold" style="color: white;">{{auth()->user()->name}}</strong>
                            </span> 
                            <span class="text-muted text-xs block">{{auth()->user()->email}} </span> 
                            
                        </div>                        
                    </li>
                    
                    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <a href="{{url('/dashboard')}}"><i class="fa fa-th-large"></i><span class="nav-label">Home</span></a>
                    </li>
                    <li class="{{ Request::is('dashboard/usuarios') ? 'active' : '' }}">
                        <a href="{{url('dashboard/usuarios')}}"><i class="fa fa-user"></i> <span class="nav-label">Clientes</span></a>
                    </li>  
                    <li class="{{ Request::is('dashboard/slider') ? 'active' : '' }}">
                        <a href="{{url('/dashboard/slider')}}"><i class="fa fa-file-image-o"></i> <span class="nav-label">Slider</span></a>
                    </li>
                    <li class="{{ Request::is('dashboard/productos*') ? 'active' : '' }}">
                        <a href="{{url('/dashboard/productos')}}"><i class="fa fa-bullseye"></i> <span class="nav-label">Productos</span></a>
                    </li>
                    <li class="{{ Request::is('dashboard/categorias') ? 'active' : '' }}">
                        <a href="{{url('dashboard/categorias')}}"><i class="fa fa-tags"></i> <span class="nav-label">Categorias</span></a>
                    </li>
                    <li class="{{ Request::is('dashboard/reservados') ? 'active' : '' }}">
                        <a href="{{url('dashboard/reservados')}}"><i class="fa fa-list-alt"></i> <span class="nav-label">Ordenes</span></a>
                    </li>
                    <li class="{{ Request::is('dashboard/blog') ? 'active' : '' }}">
                        <a href="{{url('dashboard/blog')}}"><i class="fa fa-book"></i> <span class="nav-label">Blog</span></a>
                    </li> 
                    <li class="{{ Request::is('dashboard/page') ? 'active' : '' }}">
                        <a href="{{url('dashboard/page')}}"><i class="fa fa-file-o"></i> <span class="nav-label">Contenido</span></a>
                    </li>             
                    
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">                
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>                    
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <a target="_blanck" href="{{route('home')}}" class="2 btn btn-primary">Volver a la web</a>
                        
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
                            <strong>Copyright</strong> rocketfy {{date('Y')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_confirm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" ></h5>                            
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">                            
                        <a href="#" class="btn btn-fill"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm"  role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Borrar Usuario</h5>                            
                    </div>
                    <div class="modal-body">
                        Realmente desea Borrar este usuario?
                    </div>
                    <div class="modal-footer">
                        <form action="" method="post">
                            <input type="hidden" name="_method" value="delete" />
                            {!! csrf_field() !!}
                            <button class="btn btn-fill btn-danger fff" type="submit" >Borrar Usuario</button>
                        </form>                          
                        
                    </div>
                </div>
            </div>
        </div>

 
        
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/inspinia.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script> 
    <script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
     
    
    
    <script type="text/javascript">
        $(document).on('submit ', 'form', function(event) {
            $('form button[type="submit"],form input[type="submit"]').attr('disabled',true);                          
        });
    </script>
    @yield('js')
</body>
</html>
