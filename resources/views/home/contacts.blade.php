@extends('layouts.app')
@section('title', 'Contactos')
@section('content')
<div class="container">
    <div class="padding-30"></div>

    <div class="row">
        <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
            <h1 class="os-font">Contacto</h1>
            
            <div class="heading-line"></div>
        </div>
    </div>
    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5920.707926742606!2d1.8418948279030358!3d42.09988947738429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a508312251967d%3A0xc8dac010a7b1e524!2s08600+Berga%2C+Barcelona%2C+Espa%C3%B1a!5e0!3m2!1ses!2sve!4v1527567586046"  frameborder="0" style="border:0;width: 100%;height: 500px;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>  
    
    
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
                                <input type="text" class="highlighted" name="name" id="author" placeholder="nombre*" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="highlighted" name="email" id="email" placeholder="Email*" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="highlighted" name="subject" id="subject" placeholder="Asunto*" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <textarea name="comment" id="comment" class="highlighted fullwidth" placeholder="Cual es tu duda" rows="8" required></textarea>
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
                            <h4 class="fw-600 dark-color os-font"> Dirección </h4>
                            <p class="dark-color">
                                 Dirección
                                <br> 5690-970 New york City
                            </p>
                            <div class="simple_line"></div>
                            <h4 class="fw-600 dark-color os-font">Horario de atención</h4>
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
</div>           
@endsection
