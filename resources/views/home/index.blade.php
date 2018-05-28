@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<!-- Slider Section -->
<div id=" home-shop-slider1" class="slider-section container">
    <!-- START REVOLUTION SLIDER 5.0 -->
    <div class="rev_slider_wrapper">
        <div id="shop-slider1" class="rev_slider" data-version="5.0">
            <ul> 
                <li data-transition="fade"> 
                    <!-- MAIN IMAGE -->
                    <img src="{{url('/segade/img/h11.jpg')}}"  alt="shop"  width="1170" height="587"> 
                    <!-- LAYER NR. 1 -->


                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0 font-montserrat"
                    id="slide-1-layer-2" 
                    data-x="['left','left','left','left']" data-hoffset="['50','150','150','150']" 
                    data-y="['top','top','top','top']" data-voffset="['185','185','185','185']" 
                    data-fontsize="['40','40','40','30']"
                    data-lineheight="['48','48','48','48']"
                    data-width="auto"
                    data-height="none"
                    data-whitespace="noraml"
                    data-transform_idle="o:1;"
                    data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                    data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                    data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                    data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                    data-start="1500" 
                    data-splitin="none" 
                    data-splitout="none"                            
                    data-responsive_offset="on" 
                    style="z-index: 6; font-weight:700;text-transform:uppercase;font-family: 'Montserrat', sans-serif; ">30% de descuento <br> en anillos <br>y pulsera <br>por todo el <br>mes de noviembre  
                </div>                    

                <li data-transition="fade"> 
                    <!-- MAIN IMAGE -->
                    <img src="{{url('/segade/img/h22.jpg')}}"  alt="shop"  width="1170" height="587"> 
                    <!--LAYER NR. 1 -->


                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption NotGeneric-SubTitle tp-resizeme rs-parallaxlevel-0 font-montserrat"
                    id="slide-2-layer-2" 
                    data-x="['left','left','left','left']" data-hoffset="['150','150','150','150']" 
                    data-y="['top','top','top','top']" data-voffset="['185','185','185','185']" 
                    data-fontsize="['40','40','40','30']"
                    data-lineheight="['48','48','48','48']"
                    data-width="auto"
                    data-height="none"
                    data-whitespace="noraml"
                    data-transform_idle="o:1;"
                    data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                    data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                    data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                    data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                    data-start="1500" 
                    data-splitin="none" 
                    data-splitout="none"                            
                    data-responsive_offset="on" 
                    style="z-index: 6; font-weight:700;text-transform:uppercase;font-family: 'Montserrat', sans-serif; ">Nuevos<br> anillos<br> y pulseras<br> con diamante 
                </div>

                <!-- LAYER NR. 3 -->

            </li>

        </ul> 
    </div><!-- END REVOLUTION SLIDER -->
</div><!-- END OF SLIDER WRAPPER -->
</div><!-- Slider Section -->


<!-- Promotion Section -->
<div class="promotion-section">
    <div class="padding-30"></div>
    <div class="container">
        <div class="row">
            <!-- PromotionBox Layout3 -->
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="promotinbox layout4">
                    <img src="{{url('/segade/img/h33.jpg')}}" alt="promotion"/>
                    <div class="promotionbox-content">
                        <h3>COLGANTE PLATA PRIMERA LEY(NUEVOS)</h3>
                        <a href="#" title="Shop Now">Shop Now<span class="arrow_right" aria-hidden="true"></span></a>
                    </div>
                </div>
            </div><!-- PromotionBox Layout3 /- -->

            <!-- PromotionBox Layout4 -->
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="promotinbox layout4">
                    <img src="{{url('/segade/img/h44.jpg')}}" alt="promotion"/>
                    <div class="promotionbox-content">
                        <h3>10% desceunto en anillos di sento</h3>
                        <a href="#" title="Shop Now">Ver mas<span class="arrow_right" aria-hidden="true"></span></a>
                    </div>
                </div>
            </div><!-- PromotionBox Layout4 /- -->
        </div>
    </div>
    <div class="padding-30"></div>  
</div><!-- Promotion Section /- -->
<div  class="section border-bottom pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div data-wow-delay="0.3s" class="text-center mb-5 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <i class="mdi-bing icon-title"></i>
                    <h2 class="fw-bolder os-font  mb-1 section-title">Productos Recientes</h2>
                    <p>
                        The stones under my feet were muddy and slippery. People were landing hastily on both sides of the river. The splashes of the people in the boats leaping into the river sounded like thunderclaps in my ears.
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="padding: 15px;">
            <div class="col-md-12">
                <ul class="products">
                    @include('partial.list_product',['products'=>$random])    
                </ul> 
               
                
                {{-- $products->links('paginate') --}}                              
            </div>
        </div>

    </div>
</div>
<div class="section pt-7 pb-7">
    <div class="container">                     
        <div class="row">
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="text-center mb-2">
                    <div class="os-font double_lined">
                        <h4 class="fw-normal ">Mas Apartado</h4>
                    </div>
                </div>
                <ul class="product-list">
                    @include('partial.mas_apartados',[$mas_apartados])
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="text-center mb-2">
                    <div class="os-font double_lined">
                        <h4 class="fw-normal ">Recien Agregados</h4>
                    </div>
                </div>
                <ul class="product-list">
                   @foreach($recientes as $product)
                    <li class="product">
                        <div class="product-thumb-wrap">
                            <div class="product-thumb">
                                {{$product->slug}}
                                <a href="{{route('product',[$product->category_slug,$product->slug])}}">
                                    <img src="{{url('/segade/img/'.$product->img)}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h3 class="os-font  fw-600">{{$product->title}}</h3>
                            </a>
                        </div>
                        <div class="os-font price  fw-600">$&nbsp;{{$product->price}}</div>
                    </li>
                    @endforeach                    
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="text-center mb-2">
                    <div class="os-font double_lined">
                        <h4 class="fw-normal ">Economicos</h4>
                    </div>
                </div>
                <ul class="product-list">
                @foreach($economicos as $product)
                    <li class="product">
                        <div class="product-thumb-wrap">
                            <div class="product-thumb">
                                {{$product->slug}}
                                <a href="{{route('product',[$product->category_slug,$product->slug])}}">
                                    <img src="{{url('/segade/img/'.$product->img)}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h3 class="os-font  fw-600">{{$product->title}}</h3>
                            </a>
                        </div>
                        <div class="os-font price  fw-600">$&nbsp;{{$product->price}}</div>
                    </li>
                    @endforeach      
                </ul>
            </div>
            @if(count($mas_apartados))
            <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="text-center mb-2">
                    <div class="os-font double_lined">
                        <h4 class="fw-normal ">Popular</h4>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{route('product',[$product->category_slug,$product->slug])}}">
                        <img src="{{url('/segade/img/'.$mas_apartados->random()->img)}}" alt="">
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
