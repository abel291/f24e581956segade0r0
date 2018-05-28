@extends('layouts.app')
@section('title', 'Contactos')
@section('content')
<div class="container">
                    <div class="padding-30"></div>

                    <div class="row">
                        <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <h1 class="os-font">Contactos</h1>
                            
                            <div class="heading-line"></div>
                        </div>
                    </div>
                </div>
            <!-- Promotion Section -->
            <div class="promotion-section">             
                <div class="section pt-6 pb-6">
                    <div class="container">
                        <div class="row">
                            <div data-wow-delay="0.3s" class="col-md-9 wow fadeInLeft" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                <h3 class="dark-color fw-600 os-font bottom-line">
                                    ¿TIENES ALGUNA DUDA?
                                </h3>
                                
                                <form class="contact-form">
                                    <div class="row mb-2">
                                        <div class="col-sm-4">
                                            <input type="text" class="highlighted" name="author" id="author" placeholder="Name (required)">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="highlighted" name="email" id="email" placeholder="Email (required)">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="highlighted" name="subject" id="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-12">
                                            <textarea name="comment" id="comment" class="highlighted fullwidth" placeholder="Your comment" rows="8"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-color uppercase">Enviar Mensaje</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div data-wow-delay="0.3s" class="col-md-3 wow fadeInRight" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                                <div id="sidebar">
                                    <h3 class="dark-color fw-600 os-font bottom-line">
                                        Segade oro
                                    </h3>
                                    <p class="mb-4">
                                        On the flanks it is cased with wood, and at top completely covered by him. We started having real fun the next day.
                                    </p>
                                    <div class="company-info mb-2">
                                        <h4 class="fw-600 dark-color os-font">Direccion </h4>
                                        <p class="dark-color">
                                            Direccion
                                            <br> 5690-970 New york City
                                        </p>
                                        <div class="simple_line"></div>
                                        <h4 class="fw-600 dark-color os-font">Horario de atencion</h4>
                                        <p class="dark-color">
                                            LUNES - VIERNES : 08:00am - 05:30pm
                                            <br> 5690-970 New york City
                                        </p>
                                        <div class="simple_line"></div>
                                        <a href="mailto:email@fount.com" class="color">
                                                segadeoro@segade.com
                                            </a>
                                        <p class="phone">+1 (245) 785 952 354</p>
                                        <p class="phone">+1 (245) 785 952 355</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="padding-30"></div>  
            </div><!-- Promotion Section /- -->     
@endsection
