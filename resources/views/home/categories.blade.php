@extends('layouts.app')
@section('title', 'Joyería segunda mano Málaga | Maxima Calidad | Segade Compro Oro')

@section('seo_desc','Joyería de segunda mano en Málaga. Joyas en perfecto estado y máxima calidad. Compra y
venta de joyas al mejor precio.')

@section('seo_keys','joyeria segunda mano, joyeria segunda mano malaga')

@section('content')
<div class="section pt-5 ">
                <div class="container">
                    <div class="padding-30"></div>

                    <div class="row">
                        <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <h1 class="h1_p "> Joyería de segunda mano en Málaga</h1>
                            <h2 class="os-font" > Joyería Segade</h2>

                            <div class="heading-line"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Promotion Section -->
            <div class="promotion-section">             
                <div class="container">
                    <div class="row">
                        <!-- PromotionBox Layout3 -->
                        @foreach($categories as $categoria)
                        <a href="{{route('product',$categoria->slug)}}">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            
                            <div class="promotinbox promotionbox-categories layout3">
                                <img src="{{$categoria->img}}" alt="promotion"/>
                                <div class="promotionbox-content ">
                                    <h3>{{$categoria->name}}</h3>                                    
                                </div>
                                
                            </div>

                        </div><!-- PromotionBox Layout3 /- -->  
                        </a>
                        @endforeach                
                    </div>
                </div>
                <div class="padding-30"></div>  
            </div><!-- Promotion Section /- -->         
            
@endsection
