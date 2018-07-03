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
    
    
    
    <div class="section pt-6 pb-6">
        <div class="container">
            <div class="row">
                <div data-wow-delay="0.3s" class="col-md-9 wow fadeInLeft" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d199.92016501671463!2d-4.438837860868966!3d36.70520235595217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f778aa653ccd%3A0x815baf6ef0578361!2zQ2FsbGUgSMOpcm9lIGRlIFNvc3RvYSwgOTEsIDI5MDAyIE3DoWxhZ2EsIEVzcGHDsWE!5e0!3m2!1ses-419!2sve!4v1527662959479"  frameborder="0" style="border:0;width: 100%;height: 500px;" allowfullscreen></iframe>
                    <!--<h3 class="dark-color fw-600 os-font bottom-line">
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
                    </form>-->
                </div>
                <div data-wow-delay="0.3s" class="col-md-3 wow fadeInRight" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                    <div id="sidebar">
                        <h3 class="dark-color fw-600 os-font bottom-line">
                            Segade oro
                        </h3>                        
                        <div class="company-info mb-2">
                            <h4 class="fw-600 dark-color os-font"> Dirección </h4>
                            <p class="dark-color" style="padding-right: 10px;">
                                  C/ Héroe de Sostoa, 91 CP 29002 Málaga <br>
                            </p>
                            <div class="simple_line"></div>
                            <h4 class="fw-600 dark-color os-font">Horario de atención</h4>
                            <p class="dark-color">
                                <table style="width: auto;">
                                    <tr>
                                        <td> <b>Lunes</b></td>
                                        <td>9:30–14:00 - 17:00–20:30</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Martes</b></td>
                                        <td>9:30–14:00 - 17:00–20:30</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Miércoles</b></td>
                                        <td>9:30–14:00 - 17:00–20:30</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Jueves</b></td>
                                        <td>9:30–14:00 - 17:00–20:30</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Viernes</b></td>
                                        <td>9:30–14:00 - 17:00–20:30</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Sábado</b></td>
                                        <td>10:00 14:00</td>                                        
                                    </tr>
                                    <tr>
                                        <td> <b>Domingo</b></td>
                                        <td>Cerrado</td>                                        
                                    </tr>
                                </table>
                                
                                
                            </p>
                            <div class="simple_line"></div>
                            <a href="mailto:email@fount.com" class="color">
                                hola@segadeoro.com
                            </a>
                            <p class="phone">+34 951 112 626</p>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="padding-30"></div>  
</div>           
@endsection
