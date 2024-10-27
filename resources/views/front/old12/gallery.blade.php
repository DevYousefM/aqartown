@extends('layouts.front')

@section('title')
    {{ $langg->lang18 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop






@section('content')



    <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero hero-vegas-slider inner-page-hero " id="page-hero">
        <div class="overlay-color"></div>
        <div class="vegas-slider-content" data-vegas-slide-1="{{ asset('public/assets/images/' . $gs->feature_icon) }}"
            data-vegas-slide-2="{{ asset('public/assets/images/' . $gs->best_icon) }}"
            data-vegas-slide-3="{{ asset('public/assets/images/' . $gs->trending_icon) }}">
            <div class="container">
                <div class="row">
                    <div class="col-12 hero-text-area ">
                        <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">{{ $langg->lang18 }} </h1>
                        <nav aria-label="breadcrumb ">
                            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                                <li class="breadcrumb-item"><a class="breadcrumb-link"
                                        href="{{ route('front.index', $sign) }}"><i
                                            class="fas fa-home icon "></i>{{ $langg->lang17 }}</a></li>
                                <li class="breadcrumb-item active">{{ $langg->lang18 }} </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End inner Page hero-->
    <div class="gallery-page">
        <!-- start gallery section -->
        <div class="gallery-section">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;"><span
                        class="hollow-text">معرض صور
                    </span>المنزل الجميل<span class="title-design-element "></span></h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"
                    style="visibility: visible; animation-delay: 0.7s; animation-name: fadeIn;"></div>
            </div>
            <div class="gallery-layout">
                <div class="mfa-gallery">
                    @foreach ($images as $key => $service)
                        <a href="{{ asset('public/assets/images/banners/' . $service->photo) }}">
                            <div class="img-div lazy-div">
                                <img class="lazy"
                                    data-src="{{ asset('public/assets/images/banners/' . $service->photo) }}" />
                                <div class="next-lazy-img"></div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- end gallery section -->
@stop
