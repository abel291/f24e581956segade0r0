@extends('layouts.app')
@section('title', $product->category_name)
@section('content')

<!-- Slider Section -->
            <div class="section pt-5 pb-10">
                    <div class="container">                        
                        <div class="row">
                            <div class="col-md-9">
                                <div class="single-product">
                                    <div class="images">
                                        <a href="{{url('/segade/img/'.$product->images->first()->images)}}" rel="prettyPhoto[product-gallery]">
                                            <img src="{{url('/segade/img/'.$product->images->first()->images)}}" alt="">
                                        </a>
                                        <div class="thumbnails">
                                            @foreach($product->images->slice(1) as $image)
                                            <a  href="{{url('/segade/img/'.$image->images)}}" rel="prettyPhoto[product-gallery]">
                                                <img src="{{url('/segade/img/'.$image->images)}}" alt="">
                                            </a>   
                                            @endforeach                                         
                                        </div>
                                    </div>
                                    <div class="summary">
                                        <h1 class="product-title">{{$product->title}}</h1>
                                        
                                        <div class="price">                                         
                                            <ins class="black">$&nbsp;{{$product->price}}</ins>
                                        </div>                                        
                                        <div class="add-to-cart-form">
                                            <form class="cart" action="{{route('add')}}" method="post">

                                                <div class="quantity">
                                                    @csrf
                                                    <input min="{{--$product->quantity_min--}}" type="number" name="quantity" value="{{$product->quantity_min}}" class="input-text qty text highlighted">
                                                    <input type="hidden" name="so_products_id" value="{{$product->id}}">
                                                </div>

                                                <button type="submit" class="single_add_to_cart_button button">Añadir a la cesta</button>

                                                
                                            </form>
                                        </div>
                                        @if(isset ($errors) && count($errors) > 0)
                                                    <div class="alert alert-danger alert-dismissable  ">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <ul>
                                                            @foreach($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                            
                                                        </ul>        
                                                    </div>
                                                @endif
                                        <div class="product-meta">
                                            <span class="posted_in">
                                                Categoria: <a href="{{$product->category_slug}}">{{$product->category_name}}</a>
                                            </span>                                         
                                        </div>
                                    </div>
                                    <div class="commerce-tabs tabs mb-6">
                                        <ul class="nav nav-tabs tabs">
                                            <li class="active">
                                                <a data-toggle="tab" href="#tab-description" aria-expanded="true">Descripcion</a>
                                            </li>                                           
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab-description">
                                                <p>
                                                    {{$product->content}}
                                                </p>
                                                
                                            </div>                                          
                                        </div>
                                    </div>
                                    <div class="related-content">
                                        <div class="os-font mb-3">
                                            <h3 class="dark-color fw-600 fz-27">Productos relacionados</h3>
                                        </div>
                                        <ul class="products">
                                            @foreach($products_related as $relacionado)
                                            <li class="product col-md-4 col-sm-6">
                                                <div class="product-thumb-wrap">
                                                    <div class="product-thumb">
                                                        <a href="{{route('product',[$relacionado->category_slug,$relacionado->slug])}}">
                                                            <img src="{{url('/segade/img/'.$relacionado->img)}}" alt="">
                                                        </a>
                                                        <a href="{{route('product',[$relacionado->category_slug,$relacionado->slug])}}" class="product-add-cart">
                                                            <span class="pull-left">Añadir a la cesta</span>
                                                            <i class="pull-right fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <a href="shop-detail.html">
                                                        <h3 class="dark-color fw-600">{{$relacionado->title}}</h3>
                                                    </a>                                                    
                                                </div>
                                                <div class="price dark-color fw-600">$&nbsp;{{$relacionado->price}}</div>
                                            </li>
                                            @endforeach
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @include('partial.sidevar',[$mas_apartados])
                            </div>
                        </div>
                    </div>
                </div>

@endsection
