@extends('layouts.app')
@section('title','Blog' )
@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="blog-grid masonry-grid-post">
                @foreach($entradas as $entrada)
                <div class="blog-item masonry-item col-sm-4" data-color="rgb(32, 221, 222)" >
                    <a href="{{route('entradas',[$entrada->category_slug,$entrada->slug])}}" >
                        <div class="blog-thumbnail" >
                            <div class="blog-overlay"  >
                                <i class="fa fa-link white"></i>
                            </div>
                            <img src="{{$entrada->main_img}}" alt="{{$entrada->category_name}} - {{$entrada->titulo}}" 
                            title="{{$entrada->category_name}} - {{$entrada->titulo}}">
                        </div>
                    </a>
                    <h4 class="fw-600 os-font blog-title">
                        <a href="{{route('entradas',[$entrada->category_slug,$entrada->slug])}}" >{{$entrada->titulo}} </a>
                    </h4>
                    
                    <div class="blog-content">
                        <p>{{str_limit($entrada->contenido,150)}}</p>
                        <a class="readmore" href="{{route('entradas',[$entrada->category_slug,$entrada->slug])}}" >Ver mas →</a>
                    </div>
                    <div class="blog-footer">                        
                        <div class="col-md-6 p-0">
                            {{$entrada->updated_at->format('d/M/Y')}}
                        </div>
                        <div class="col-md-6 p-0">
                            <a href="{{route('entradas',[$entrada->category_slug])}}">{{$entrada->category_name}}</a>
                        </div>
                    </div>
                </div>
                @endforeach       
            </div>
            {{ $entradas->appends(Request::except('page'))->links('paginate') }} 
            
        </div>
    </div>
</div>

@endsection
@section('css')
<style type="text/css">
    .blog-footer{
        text-align: left!important;
    }
</style>
@endsection
@section('js')
<script   src="{{ asset('/segade/js/masonry.pkgd.min.js') }}" type="text/javascript"></script> 
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.blog-grid').masonry({
      // options
      itemSelector: '.blog-item',
      
    });
    });
</script>
@endsection


