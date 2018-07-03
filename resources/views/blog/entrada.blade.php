@extends('layouts.app')
@section('title',$entrada->seo_title )

@section('seo_desc',$entrada->seo_desc )
@section('seo_keys',$entrada->seo_keys )

@section('content')
<div class="section section-normal pt-6">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-blog-info">
                    <div class="single-blog-info-inner text-center">                        
                        <h1 class="single-blog-title os-font dark-color">{{$entrada->titulo}}</h1>
                        <div class="single-blog-meta">
                            <div class="date">{{$entrada->created_at->format('d/M/Y')}}</div>
                            <div class="blog-divider">-</div>
                            <div class="blog-cate">
                                <a href="{{route('entradas',[$entrada->category_slug])}}">{{$entrada->category_name}}</a>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="blog-content" class="section pt-5 pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-blog">
                                    <div class="single-blog-content mb-11">
                                        <article>
                                            <div class="blog-thumbnail">
                                                <img src="{{$entrada->main_img}}" alt="{{$entrada->category_name}} - {{$entrada->titulo}}" 
                            title="{{$entrada->category_name}} - {{$entrada->titulo}}">
                                            </div>
                                           <div style="line-height: 2;"> {!! $entrada->contenido !!}</div>
                                        </article>
                                        
                                        <div class="single-blog-tags pull-left fullwidth">
                                            <div class="tag-heading">Etiquetas</div>
                                            <div class="tag-link">
                                                <a href="{{route('entradas',[$entrada->category_slug])}}">{{$entrada->category_name}}</a>
                                                
                                            </div>
                                        </div>

                                    </div>
                                    <a class="btn btn-primary" href="{{ URL::previous() }}" style="border: none;"> Volver</a>
                                    <div class="clearfix"></div>
                                    
                                    
                                                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
@section('css')

@endsection
@section('js')

@endsection


