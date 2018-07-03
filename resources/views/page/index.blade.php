@extends('layouts.app')
@section('title',$page->seo_title )

@section('seo_desc',$page->seo_desc )
@section('seo_keys',$page->seo_keys )


@section('content')
<div class="section pt-5 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div data-wow-delay="0.3s" class="single-page-title text-center mb-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <h1 class="os-font">{{ $page->title }}</h1>
                    <p class="dark-color">{!! $page->entry !!}</p>                    
                    <div class="heading-line"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">        
                {!! $page->content !!}
                <img src="{!! $page->main_img !!}" class="img-responsive">
            </div>
        </div>
    </div>
</div>
@endsection




