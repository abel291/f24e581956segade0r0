@extends('layouts.app')
@section('title', 'Categorias')
@section('content')
<div class="section pt-5 ">
                <div class="container">
                    <div class="padding-30"></div>

                    <div class="row">
                        <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <h1 class="os-font">Categorias</h1>
                            <p class="">Te preguntas ¿dónde comprar joyas usadas o de segunda mano? En Cash Converters compramos y vendemos joyas en perfecto estado para que sorprendas a esa persona que tanto quieres, con una joya exclusiva que podrás encontrar en nuestra tienda física u online.</p>
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
                        
                        <a href="{{route('product',['anillos'])}}">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            
                            <div class="promotinbox promotionbox-categories layout3">
                                <img src="segade/img/h55.jpg" alt="promotion"/>
                                <div class="promotionbox-content ">
                                    <h3>Anillos</h3>                                    
                                </div>
                                
                            </div>

                        </div><!-- PromotionBox Layout3 /- -->  
                        </a>
                        <a href="{{route('product',['pulseras'])}}">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            
                            <div class="promotinbox promotionbox-categories layout3">
                                <img src="segade/img/h66.jpg" alt="promotion"/>
                                <div class="promotionbox-content ">
                                    <h3>Pulseras</h3>                                   
                                </div>
                                
                            </div>

                        </div><!-- PromotionBox Layout3 /- -->  
                        </a>
                        <a href="{{route('product',['collares'])}}">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            
                            <div class="promotinbox promotionbox-categories layout3">
                                <img src="segade/img/h77.jpg" alt="promotion"/>
                                <div class="promotionbox-content ">
                                    <h3>Collares</h3>                                   
                                </div>
                                
                            </div>

                        </div><!-- PromotionBox Layout3 /- -->  
                        </a>
                        <a href="{{route('product',['cadenas'])}}">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            
                            <div class="promotinbox promotionbox-categories layout3">
                                <img src="segade/img/h88.jpg" alt="promotion"/>
                                <div class="promotionbox-content ">
                                    <h3>Cadenas</h3>                                    
                                </div>
                                
                            </div>

                        </div><!-- PromotionBox Layout3 /- -->  
                        </a>
                        <a href="{{route('product',['colgantes'])}}">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            
                            <div class="promotinbox promotionbox-categories  layout3">
                                <img src="segade/img/h99.jpg" alt="promotion"/>
                                <div class="promotionbox-content">
                                    <h3>Colgantes</h3>                                  
                                </div>
                                
                            </div>

                        </div><!-- PromotionBox Layout3 /- -->  
                        </a>
                        <a href="{{route('product',['pendientes'])}}">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            
                            <div class="promotinbox promotionbox-categories layout3">
                                <img src="segade/img/h98.jpg" alt="promotion"/>
                                <div class="promotionbox-content ">
                                    <h3>Pendientes</h3>                                 
                                </div>
                                
                            </div>

                        </div><!-- PromotionBox Layout3 /- -->  
                        </a>
                        <a href="{{route('product',['joyas'])}}">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            
                            <div class="promotinbox promotionbox-categories layout3">
                                <img src="segade/img/h97.jpg" alt="promotion"/>
                                <div class="promotionbox-content ">
                                    <h3>Joyas con diamantes</h3>                                    
                                </div>
                                
                            </div>

                        </div><!-- PromotionBox Layout3 /- -->  
                        </a>

                        
                    </div>
                </div>
                <div class="padding-30"></div>  
            </div><!-- Promotion Section /- -->         
            
@endsection
