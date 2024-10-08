

    
  
@extends('layouts.front')

@section('title')
    @if($langg->rtl == 1)

        {{$gs->title_ar}}

    @else
        {{$gs->title}}

    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{asset('assets/images/'.$gs->logo)}}" />
@stop


@section('content') 

  <!-- start home main slider -->
  <div class="swiper-container home-main-slider">

    <div class="swiper-wrapper">

    @foreach($sliders as $slide)
                                         @php
                                        $galss = str_replace(' ', '%20', $slide->photo);
                                        @endphp
      <div class="swiper-slide">
        <div class="slider-img">
          <img src="{{asset('/assets/images/sliders/'.$galss)}}" alt="img">
        </div>
        <div class="slider-text">
          <div class="text-buttons">
            <div class="text">
              <p>
              {{$langg->rtl == 1 ? $slide->subtitle_text_ar :   $slide->subtitle_text}}
              </p>
              <p>
              {{$langg->rtl == 1 ? $slide->title_text_ar :   $slide->title_text}}
              </p>
            </div>

          </div>
        </div>

     

      </div>
   @endforeach 


    </div>

    <div class="mfa-swiper-buttons">
      <div class="swiper-button-prev home-main-slider-prev">
        <span class="ion-android-arrow-back"></span>
      </div>
      <div class="swiper-button-next home-main-slider-next">
        <span class="ion-android-arrow-forward"></span>
      </div>
    </div>

    <div class="swiper-pagination home-main-slider-pagination"></div>
  </div>
  <!-- end home main slider -->
<!-- Button trigger modal -->

@if($gs->is_popup== 1)
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <img src="{{asset('assets/images/'.$gs->popup_background)}}" alt="">

      </div>
      <div class="modal-body">
      @if($langg->rtl == 1)
                                                    {!!$gs->popup_text_ar!!}
                                                @else
                                                    {!!$gs->popup_text!!}
                                                @endif
      </div>
    
    </div>
  </div>
</div>

@endif

  <section class="features-area pb-70">
    <div class="bg"></div>
    <div class="container">
      <h1 class="text-center headline">{{ $langg->lang48 }}
      </h1>
      <div class="row">

      @foreach($services->take(3) as $service)
        <div class="col-lg-4 col-md-6" data-aos="flip-right" data-aos-duration="1500">
          <div class="single-features">
            <div class="content">

              <h3>
                <a href="{{route('front.service',['service' => $service->title ,'lang' => $sign ])}}"> @if($langg->rtl == 1)
                                                    {{$service->title_ar}}
                                                @else
                                                    {{$service->title}}
                                                @endif</a>
              </h3>
              <p> @if($langg->rtl == 1)
                                                    {{$service->name_ar}}
                                                @else
                                                    {{$service->name}}
                                                @endif</p>
              <a class="readmore_btn" href="{{route('front.service',['service' => $service->title ,'lang' => $sign ])}}">{{ $langg->lang49 }}<i class="fal fa-long-arrow-left"></i></a>
            </div>
          </div>
        </div>

      @endforeach
        


      </div>
      <div class="row">
        <div class="col-12">
          <div class="view-more">
            <a href="{{ route('front.services',$sign) }}">
              <i class="fas fa-caret-circle-left"></i>
              {{ $langg->lang50 }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ask" style="background-image: url({{asset('assets/images/'.$gs->feature_icon)}});">
    <div class="container">
      <div class="icon" data-aos="zoom-in" data-aos-duration="1500">
        <i class="fal fa-microscope"></i>
      </div>
      <div class="text text-center" data-aos="zoom-in" data-aos-duration="1500">
        <h1>{{ $langg->lang52 }}</h1>
      </div>
      <div class="btns" style="display: flex;" data-aos="zoom-in" data-aos-duration="1500">
        <div class="appointment">
          <a href="blog-details.html">
          {{ $langg->lang53 }}
            <i class="fal fa-plus-circle"></i>
          </a>
        </div>
        <div class="appointment">
          <a href="blog-details.html">
          {{ $langg->lang35 }}
            <i class="fas fa-caret-circle-left"></i>
          </a>
        </div>
      </div>

    </div>
  </section>


   <!-- end start blogs section -->
<div class="blogs-section blog-page">
  <div class="container">
    <div class="section-heading">
      <p>
      {{ $langg->lang36 }}
        </p>
    </div>

    <div class="section-body">
      <ul class="main-ul">

      @foreach($blogs as $blogg)
        <li>
          <a href="{{route('front.blogshow',['id' => $blogg->slug ,'lang' => $sign ])}}" class="blog-card">
            <div class="img-div lazy-div">
              <img class="" data-src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}" alt="img" src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}">
              
            </div>
            <p class="blog-title">

            @if($langg->rtl == 1)
                                                    {{$blogg->title_ar}}
                                                @else
                                                    {{$blogg->title}}
                                                @endif
              </p>
          </a>
        </li>

        @endforeach
     

      </ul>
    </div>
  </div>
</div>


  <!-- our clients section -->
  <div class="clients-section">
    <div class="section-heading">
      <p>
      {{ $langg->lang37 }}
      </p>
    </div>
    <div class="swiper-container home-clients-slider">
      <div class="swiper-wrapper">


      @foreach($images as $partner)
        <div class="swiper-slide">
          <div class="slider-img">
            <img src="{{asset('assets/images/ads/'.$partner->photo )}}" alt="img">
          </div>
        </div>
        @endforeach


      </div>
    </div>
  </div>
  <!-- our clients section -->
@stop