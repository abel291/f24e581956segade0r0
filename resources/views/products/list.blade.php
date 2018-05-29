@extends('layouts.app')
@section('title',$products->search )
@section('content')
<div class="section pt-5 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <h1 class="os-font">
                        {{ $products->search }}
                        
                        </h1>                    
                    <div class="heading-line"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                @if( \Route::current()->getName() === 'search') )
                <div class="commerce-result-count">{{$products->total()}} resultados encontrados</div>
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




