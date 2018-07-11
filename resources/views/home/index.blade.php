@extends('layouts.app')
@section('title', 'Compro Oro Málaga | Joyería | Segade Compro Oro')
@section('seo_desc','Compro Oro Málaga. Tienda y joyería donde comprar y vender oro, plata, joyas y piedras preciosas al mejor precio en el centro de Málaga.' )
@section('seo_keys','compro oro Málaga, joyas segunda mano, comprar joyas baratas' )

@section('content')
<div class="section-header5 pt-5 pb-10">
    <h1>Un nuevo concepto de Compra de Oro en Málaga: Segade</h1>    
</div>
<!-- Slider Section -->
<div id=" home-shop-slider1" class="slider-section container">

    <!-- START REVOLUTION SLIDER 5.0 -->
    <div class="rev_slider_wrapper">
        <div id="shop-slider1" class="rev_slider" data-version="5.0">
            <ul>
                @foreach($sliders->where('tipo',1) as $slider)
                <li data-transition="fade"> 
                    <a href="{{$slider->href}}">
                        <!-- MAIN IMAGE -->
                        <img src="{{$slider->img}}"  alt="Compro oro Málaga" title="Joyas de segunda mano en Málaga"  style="width: 100%;" > 
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
                            style="z-index: 6; font-weight:700;text-transform:uppercase;font-family: 'Montserrat',
                             sans-serif; color:{{$slider->text_color}};">{!!$slider->content!!}
                        </div>
                    </a>
                </li>
                @endforeach    
                
            </ul> 
        </div><!-- END REVOLUTION SLIDER -->
    </div><!-- END OF SLIDER WRAPPER -->
</div><!-- Slider Section -->


<!-- Promotion Section -->
<div class="promotion-section">
    <div class="padding-30"></div>
    <div class="container">
        <div class="row">
            @foreach($sliders->where('tipo',0) as $slider)
                <div class="col-sm-6 ">
                    <div class="promotinbox layout4">
                        <img src="{{$slider->img}}" alt="Compro Oro en Málaga" title="Compro Oro en Málaga" style="width: 100%;" />
                        <div class="promotionbox-content">
                            <h3 style="color:{{$slider->text_color}}">{!!$slider->content!!}</h3>
                            <a href="{{$slider->href}}" title="Ver mas">Ver mas<span class="arrow_right" aria-hidden="true"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach   
        </div>
    </div>
    <div class="padding-30"></div>  
</div>
<div class="section-header5">
    <h2>Bienvenid@ a la web de Segade Compro Oro en Málaga</h2>    
</div>

<div  class="section border-bottom pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div data-wow-delay="0.3s" class="text-center mb-5 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <i class="mdi-bing icon-title"></i>
                    <h2 class="fw-bolder os-font  mb-1 section-title">Últimos productos</h2>
                    
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
<div  class="section border-bottom pt-7 pb-7">
   <div class="container">
    <div class="row">
        <div class="col-md-12  joyeria">
            <p><strong>Segade compro oro</strong> es una <strong>tienda de compra y venta de oro</strong> especializada en <i>comprar y vender oro, plata y metales preciosos</i> situada en el centro de Málaga.</p>

            <p>Es, además, un espacio para la <strong>joyería</strong> donde puede comprar y vender joyas. Disponemos de un amplio catálogo de anillos, colgantes, pendientes, etc. en las mejores condiciones. Puede ver esta gama de joyas en esta página web y <strong>reservar la joya</strong> que más le interese y finalizar la compra en nuestra tienda si así lo desea.</p>

           <p> Adicionalmente ofrecemos <strong>servicios de empeño en Málaga</strong>. Si no quiere desprenderse de sus bienes más preciados pero necesita liquidez inmediata para hacer frente a un gasto imprevisto, permitirse un lujo o por cualquier otra circunstancia ponemos a su disposición un servicio de empeño profesional.</p>

            <p>Con más de 10 años de experiencia en el sector queremos presentar una <strong>imagen moderna y renovada en el sector del compro oro en Málaga</strong>.</p>
        </div>
    </div>
</div>
</div>
<div class="section pt-7 pb-7">
    <div class="container">                     
        <div class="row">            
            <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="text-center mb-2">
                    <div class="os-font double_lined">
                        <h4 class="fw-normal ">Novedades</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    @include('partial.list_small',['products'=>$recientes->take(5)])
                </div>
                <div class="col-md-6">
                    @include('partial.list_small',['products'=>$recientes->slice(5)])
                </div>                
                
            </div>
            <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="text-center mb-2">
                    <div class="os-font double_lined">
                        <h4 class="fw-normal ">Económicos</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    @include('partial.list_small',['products'=>$economicos->take(5)])
                </div>
                <div class="col-md-6">
                    @include('partial.list_small',['products'=>$economicos->slice(5)])
                </div>
            </div>            
        </div>
    </div>
</div>
<div class="section-header5 pb-10">
    <h2>No lo dude, venga a conocer Segade Compro Oro en Málaga</h2> 
     <div class="container">
    <div class="row">
        <div class="col-md-12 joyeria pt-2">
    <p>Le invitamos a que conozca nuestra tienda y a nuestros profesionales que estarán a su entera disposición para atenderle y encantados de resolver cualquier duda que pueda tener.</p>   
</div>
</div>
</div>
@endsection
