@extends('layouts.app')
@section('title', 'Orden')
@section('content')
<a id="top"></a>

    <div class="shop-main">
        <div class="shop-boxed">    
            <!-- Slider Section -->
            <div class="section pt-5 pb-10">
                <div class="container">

                    <div class="row">
                        <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <h1 class="os-font">Revision</h1>
                            <p class="dark-color">Un solo paso para terminar</p>
                            <div class="heading-line"></div>
                        </div>
                    </div>                      
                </div>
                <div class="container">
                    <div class="row">
                        @if(count($reserved_products)>0)
                        <div class="col-md-6 pb-4">
                            <div class="checkout">
                                <h3 class="text-uppercase mb-2 dark-color os-font">Detalles de apartado</h3>
                                <form action="{{route('store_r')}}" method="post">
                                    @csrf
                                <div class="form-checkout">                                     
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="text-uppercase">Nombre <sup>*</sup></label>
                                            <input type="text" class="highlighted" value="{{auth()->user()->name}}" disabled>
                                        </div>                                          
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label class="text-uppercase">Email </label>
                                            <input type="text" class="highlighted" value="{{auth()->user()->email}}" disabled>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="text-uppercase">Telefono </label>
                                            <input type="text" class="highlighted" value="{{auth()->user()->telefono}}" disabled>
                                        </div>
                                    </div>                                  

                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label class="text-uppercase"> Fecha de entrega </label>
                                            <input type="date" class="highlighted" name="date_arrival" required >
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="text-uppercase">hora </label>
                                            <input type="time" class="highlighted" name="hour" required >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="text-uppercase">Nota </label>
                                            <textarea class="highlighted" rows="7" placeholder="Algo que quiera comentar?" name="note"></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type='submit' class="btn btn-color" value="Procesar Orden">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 pb-4">
                            <div class="payment">
                                <h3 class="text-uppercase mb-2 dark-color os-font">Productos a apartar</h3>
                                <div class="payment-product-list">
                                    <ul>
                                        @foreach($reserved_products as $product)
                                        <li>
                                            <div class="product-item">
                                                <a target="_blanck" href="{{route('product',[$product->category,$product->slug])}}" class="product-img">
                                                    <img src="{{$product->img}}" alt="">
                                                    <span>{{$product->quantity}}</span>
                                                </a><!-- .product-mini__img -->
                                                <div class="product-body">
                                                    <h4 class="product-name"><a href="#">{{$product->title}}</a></h4>
                                                    <span class="product-price">${{number_format($product->price,2)}} x {{$product->quantity}}</span>
                                                </div><!-- .product-mini__body -->

                                                <div class="product-button">
                                                    <a href="{{route('remove',$product->id)}}" class="close"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </div><!-- .product-mini__button -->
                                            </div>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                                <div class="total-product pull-left fullwidth mb-4">
                                    <h5 class="text-uppercase os-font dark-color">
                                        <span class="pull-left">TOTAL A PAGAR</span>
                                        <span class="pull-right">$ {{number_format($total,2)}}</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="padding-100"></div>
                            NO hay productos                                
                        @endif
                        <div class="padding-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
