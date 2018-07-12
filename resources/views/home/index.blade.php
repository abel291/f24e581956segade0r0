@extends('layouts.app')
@section('title', 'Compro Oro Málaga | Joyería | Segade Compro Oro')
@section('seo_desc','Compro Oro Málaga. Tienda y joyería donde comprar y vender oro, plata, joyas y piedras preciosas al mejor precio en el centro de Málaga.' )
@section('seo_keys','compro oro Málaga, joyas segunda mano, comprar joyas baratas' )

@section('content')
<div class="single-page-title text-center section-header5  pb-3">
    <h1 class="os-font mb-0">Un nuevo concepto de Compro Oro en Málaga: Segade</h1>
     <div class="heading-line"></div>   
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
                            data-x="['right','right','right','right']" data-hoffset="['50','150','150','150']" 
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
                             sans-serif;text-align: right; color:{{$slider->text_color}};">{!!$slider->content!!}
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

<div class="single-page-title text-center section-header5  pb-3">
    <h2 class="mb-1">Bienvenid@ a la web de Segade Compro Oro en Málaga</h2>
     <div class="heading-line mb-2"></div>
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

<div  class="section border-bottom pt-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div data-wow-delay="0.3s" class="text-center mb-1 wow fadeInUp single-page-title" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    
                    <h3 class="fw-bolder os-font  mb-1 ">Últimos productos</h3>
                    <div class="heading-line"></div>                
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

<div class="section single-page-title text-center border-bottom section-header5 pt-5 pb-5 ">
    <h2 class="mb-1">El compromiso de Segade con la calidad en el sector del Compro Oro en Málaga</h2>
     <div class="heading-line mb-2"></div>
     <div class="container">
        <div class="row">
            <div class="col-md-12  joyeria text-justify">
                <p>Convencidos de potenciar y legitimar nuestra profesión presentamos los principios de nuestras políticas de calidad e imagen que aplicamos en nuestros servicios para conseguir tal fin:</p>

                <p><b>Transparencia.</b> Total claridad en cada una nuestras transacciones. Cada compra y venta que tratamos se refleja cristalinamente en nuestras condiciones. Queremos que no exista la más mínima duda en la relación que establecemos con nuestros clientes.</p>

                <p><b>Competitividad.</b> En nuestras tasaciones y precios. Procuramos presentarle el mejor precio del oro y la óptima tasación de sus bienes. Realizamos un esfuerzo para conocer las variaciones diarias del oro y de la plata, además de analizar los precios de nuestra competencia en los servicios relacionados con la  <b>compra de oro en Málaga</b>. De esta forma ofrecemos tarifas  acordes a la realidad del mercado actual.</p>

                <p><b>Especialización.</b> Aparte de nuestra actividad especializada en compro oro, somos expertos en la joyería de segunda mano en Málaga. Ofreciendo servicios profesionales en la compra y venta de joyas en perfecto estado a precios muy económicos.</p>

                <p><b>Confidencialidad.</b> Garantizamos la máxima discreción en nuestros servicios. Como profesionales del sector respetamos la privacidad que requiere cada una de nuestras operaciones, siendo uno de los pilares fundamentales de nuestra actividad.</p>

                <p><b>Seguridad.</b> Todas nuestras instalaciones cuentan con modernas medidas de seguridad y todo nuestro stock se encuentra asegurado. Así garantizamos la tranquilidad de nuestros clientes de que los bienes depositados en nuestra tienda de compro oro en Málaga se encuentran a buen recaudo.</p>

                <p><b>Asesoramiento.</b> Nuestra seriedad en el sector del compro oro en Málaga a la hora de aconsejar a nuestros clientes en sus inversiones en oro u obtener financiación temporal dependiendo de sus circunstancias personales nos ha proporcionado la <b>excelente reputación</b> de la que actualmente disfrutamos.</p>

                <p><b>Seriedad y profesionalidad.</b> Nuestros conocimientos y experiencia tras 10 años nos permiten cumplir con todas nuestras obligaciones con nuestros clientes en los plazos y condiciones pactados. Sin dilación ya que queremos afianzar la seriedad y el respeto de nuestra profesión día a día.</p>

                <p><b>Satisfacción.</b> Nuestro principal objetivo. Lo que nos impulsa a la búsqueda de la excelencia en todo lo que hacemos. Queremos que nuestros clientes queden totalmente satisfechos con nuestros servicios ya que su satisfacción será la nuestra.</p>
            </div>
        </div>   
    </div>
</div>

<div class="section pt-4 ">
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
<div class="section single-page-title text-center border-bottom section-header5 pt-5 pb-5 ">
    <h2 class="mb-1">No lo dude, venga a conocer Segade Compro Oro en Málaga</h2>
     <div class="heading-line mb-2"></div>
     <div class="container">
        <div class="row">
            <div class="col-md-12  joyeria text-center">
                <p>Le invitamos a que conozca nuestra tienda y a nuestros profesionales que estarán a su entera disposición para atenderle y encantados de resolver cualquier duda que pueda tener.</p>  
            </div>
        </div>   
    </div>
</div>

@endsection
