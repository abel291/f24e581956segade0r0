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
                                        
                                        <div class="slider-for">
                                            @foreach($product->images as $image)                                           
                                            <div>
                                                <a  href="{{$image->img}}" data-lightbox="image-1" data-title="{{$product->title}}">
                                                    <img src="{{$image->thum}}"  style="width: 100%" class="img-responsive" alt="{{$product->title}}">
                                                </a> 
                                            </div>                                            
                                            @endforeach                                         
                                        </div>
                                        <div class="slider-nav">
                                            @foreach($product->images as $image)                                           
                                            <div>                                       
                                                <img src="{{$image->thum}}" class="img-responsive" alt="{{$product->title}}">                
                                            </div>
                                            
                                            @endforeach                                         
                                        </div>
                                    </div>
                                    <div class="summary">
                                        <h1 class="product-title">{{$product->title}}</h1>
                                        
                                        <div class="price">                                         
                                            <ins class="black">€{{number_format($product->price,2)}}</ins>
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
                                           
                                            @include('partial.list_product',['products'=>$products_related])
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                @include('partial.sidevar',['products'=>$economicos])
                            </div>
                        </div>
                    </div>
                </div>

@endsection
@section('css')
    <link href="{{asset('/segade/lightbox/css/lightbox.css') }}" rel="stylesheet">
    <link href="{{asset('/segade/slick/slick.css') }}" rel="stylesheet">
    <link href="{{asset('/segade/slick/slick-theme.css') }}" rel="stylesheet">
@endsection

@section('js')

    <script   src="{{ asset('/segade/lightbox/js/lightbox.js') }}" type="text/javascript"></script>
    <script   src="{{ asset('/segade/slick/slick.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
    lightbox.option({
      'resizeDuration': 800,
      'wrapAround': true
    })

     $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      /*dots: true,*/
      centerMode: true,
      focusOnSelect: true
    });
</script>
@endsection