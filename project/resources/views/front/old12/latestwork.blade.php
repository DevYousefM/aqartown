@extends('layouts.front')

@section('title')
  {{ $langg->lang16 }} -
  @if($langg->rtl == 1 )
    {{$gs->title_ar}}
  @else
    {{$gs->title}}
  @endif
@stop

@section('content')
  @php




  $ps = App\Models\Pagesetting::find(1);


  @endphp

          <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero hero-vegas-slider inner-page-hero " id="page-hero">
      <div class="overlay-color"></div>
      <div class="vegas-slider-content" data-vegas-slide-1="{{asset('assets/images/'.$gs->feature_icon)}}"
           data-vegas-slide-2="{{asset('assets/images/'.$gs->best_icon)}}"
           data-vegas-slide-3="{{asset('assets/images/'.$gs->trending_icon)}}">
        <div class="container">
          <div class="row">
            <div class="col-12 hero-text-area ">
              <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">الأعمال السابقه</h1>
              <nav aria-label="breadcrumb ">
                <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                  <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('front.index',$sign) }}"><i class="fas fa-home icon "></i>{{ $langg->lang17 }}</a></li>
                  <li class="breadcrumb-item active">الأعمال السابقه</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End inner Page hero-->
        <!-- Start  portfolio Section-->
        <section class="portfolio portfolio-slider    mega-section" id="portfolio">
          <div class="container">
            <div class="section-heading center-heading">
              <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s">معرض <span
                  class='hollow-text'> الأعمال السابقة</span><span class="title-design-element "></span></h2>
              <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
          </div>
          <!--Swiper-->
          <div class="swiper-container wow fadeIn" data-wow-delay=".5s">
            <div class="swiper-wrapper ">

              @foreach($images as $image)
              <div class="swiper-slide">
                <div class="item "><a class="portfolio-img-link " href="#">
                    <div class="overlay overlay-color"></div><img class="  portfolio-img img-fluid  "
                      src="{{asset('/assets/images/ads/'.$image->photo)}}" alt=" ">
                  </a>
                  <div class="item-info "><span></span>
                   {{-- <h3 class="item-title">HPL</h3>--}}
                  </div>
                </div>
              </div>
              @endforeach


        
            </div>
            <div class="swiper-button-prev">
              <div class="left-arrow"><i class="fas fa-arrow-right icon "></i>
              </div>
            </div>
            <div class="swiper-button-next">
              <div class="right-arrow"><i class="fas fa-arrow-left icon "></i>
              </div>
            </div>
          </div>
        </section>
        <!-- End  portfolio Section-->

  @include('includes.form')

@stop