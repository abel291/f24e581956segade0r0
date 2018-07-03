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
    <link href="{{ asset('assets/css/animate.css')}}"" rel="stylesheet">    
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css')}}"" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/slick/slick.css')}}"" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/slick/slick-theme.css')}}"" rel="stylesheet">
    @yield('css')
</head>
<body id="page-top" class="landing-page gray-section">
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-scroll" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    
                    <a href="#" class="navbar-brand">Inspinia</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                    
                </div>
                <div id="navbar" class="navbar-collapse collapse text-center">
                    <form role="search" action="search_results.html" style="display: inline-block;width: 550px;">
                        <div class="form-group" style="margin:15px 0px 0px 0px">
                            <input type="text" placeholder="Buscar Producto" class="form-control" style="padding: 20px;">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">                       
                        
                        <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Abel Morales <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="">Perfil</a></li>
                            <li><a href="">Reservados</a></li>
                            <li><a href="">Salir</a></li>                            
                        </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
        
    </div>
    <div class="container" style="margin-top: 100px; padding: 0px;">

            <div class="row">
                <div class="col-md-3">
                    <h2><b>Oro</b></h2>
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Categorias</h5>
                        </div>
                        <div class="ibox-content">
                            <ul>
                                <li>dd</li>
                                <li>dd</li>
                                <li>dd</li>
                                <li>dd</li>
                                <li>dd</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-4">
                        <div class="ibox">
                            <div class="ibox-content product-box">

                                <div class="product-imitation">
                                    [ INFO ]
                                </div>
                                <div class="product-desc">
                                    <span class="product-price">
                                        $10
                                    </span>
                                    <small class="text-muted">Category</small>
                                    <a href="#" class="product-name"> Product</a>



                                    <div class="small m-t-xs">
                                        Many desktop publishing packages and web page editors now.
                                    </div>
                                    <div class="m-t text-righ">

                                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ibox">
                            <div class="ibox-content product-box">

                                <div class="product-imitation">
                                    [ INFO ]
                                </div>
                                <div class="product-desc">
                                    <span class="product-price">
                                        $10
                                    </span>
                                    <small class="text-muted">Category</small>
                                    <a href="#" class="product-name"> Product</a>



                                    <div class="small m-t-xs">
                                        Many desktop publishing packages and web page editors now.
                                    </div>
                                    <div class="m-t text-righ">

                                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ibox">
                            <div class="ibox-content product-box">

                                <div class="product-imitation">
                                    [ INFO ]
                                </div>
                                <div class="product-desc">
                                    <span class="product-price">
                                        $10
                                    </span>
                                    <small class="text-muted">Category</small>
                                    <a href="#" class="product-name"> Product</a>



                                    <div class="small m-t-xs">
                                        Many desktop publishing packages and web page editors now.
                                    </div>
                                    <div class="m-t text-righ">

                                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ibox">
                            <div class="ibox-content product-box">

                                <div class="product-imitation">
                                    [ INFO ]
                                </div>
                                <div class="product-desc">
                                    <span class="product-price">
                                        $10
                                    </span>
                                    <small class="text-muted">Category</small>
                                    <a href="#" class="product-name"> Product</a>



                                    <div class="small m-t-xs">
                                        Many desktop publishing packages and web page editors now.
                                    </div>
                                    <div class="m-t text-righ">

                                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






            </div>
            


        </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick/slick.min.js') }}"></script>
    <script type="text/javascript">
        
    </script>
    @yield('js')
</body>
</html>
