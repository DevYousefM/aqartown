@extends('layouts.front')

@section('title')
  {{ $langg->lang18 }}  -
  @if($langg->rtl == 1 )
    {{$gs->title_ar}}
  @else
    {{$gs->title}}
  @endif
@stop






@section('content')


  <section class="page-title" style="background-image:url({{asset('assets/images/'.$gs->top_icon)}});">
    <div class="auto-container">
        <h1> {{ $langg->lang18 }} </h1>
        
        <ul class="bread-crumb">
            <li><a href="{{route('front.index',$sign)}}">{{ $langg->lang17 }}</a></li>
            <li><a href="#"> {{ $langg->lang18 }} </a></li>
        </ul>
        
    </div>
    
    <!--Go Down Button-->
    <div class="go-down">
        <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span></div>
    </div>
    
</section>


<div class="gallery-page">
    <!-- start gallery section -->
    <div class="gallery-section">
    <div class="gallery-layout">
        <div class="mfa-gallery">


          @foreach($images as $key=>$service)
        <a href="{{asset('assets/images/banners/'.$service->photo)}}">
            <div class="img-div lazy-div">
            <img
                class="lazy"
                data-src="{{asset('assets/images/banners/'.$service->photo)}}"
            />
            <div class="next-lazy-img"></div>
            </div>
        </a>
          @endforeach

            </div>
        </a>
        </div>
    </div>
    </div>
    <!-- end gallery section -->


   @stop