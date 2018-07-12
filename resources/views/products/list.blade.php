@extends('layouts.app')
@if( \Route::current()->getName() !== 'search')
    @section('title',$products->first()->category_seo_title )
    @section('seo_desc',$products->first()->category_seo_desc )
    @section('seo_keys',$products->first()->category_seo_keys )
@else
    @section('title',$products->search )
    @section('seo_desc',$products->search )
    @section('seo_keys',$products->search )
@endif
@section('content')
<div class="section pt-5 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp">
                    <h1 class="h1_p">Compra y venta de Joyeria en Málaga</h1>
                    <h2 class="os-font" style="text-transform: lowercase;">{{ $products->search }}</h2>                    
                                        
                    <div class="heading-line"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                @if( \Route::current()->getName() === 'search') 
                <div class="commerce-result-count">{{$products->total()}} productos encontrados</div>
                @endif

                <ul class="products">
                    @include('partial.list_product',[$products])
                </ul>
                {{ $products->appends(Request::except('page'))->links('paginate') }}                     
            </div>
            <div class="col-md-3">
               @include('partial.sidevar',['products'=>$economicos])
            </div>
        </div>
    </div>
</div>
@endsection




