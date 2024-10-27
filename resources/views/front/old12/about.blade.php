@extends('layouts.front')

@section('title')
    {{ $langg->lang16 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('content')
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp

    <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero hero-vegas-slider inner-page-hero " id="page-hero">
        <div class="overlay-color"></div>
        <div class="vegas-slider-content" data-vegas-slide-1="{{ asset('public/assets/images/' . $gs->feature_icon) }}"
            data-vegas-slide-2="{{ asset('public/assets/images/' . $gs->best_icon) }}"
            data-vegas-slide-3="{{ asset('public/assets/images/' . $gs->trending_icon) }}">
            <div class="container">
                <div class="row">
                    <div class="col-12 hero-text-area ">
                        <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">{{ $langg->lang16 }} </h1>
                        <nav aria-label="breadcrumb ">
                            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                                <li class="breadcrumb-item"><a class="breadcrumb-link"
                                        href="{{ route('front.index', $sign) }}"><i
                                            class="fas fa-home icon "></i>{{ $langg->lang17 }}</a></li>
                                <li class="breadcrumb-item active">{{ $langg->lang16 }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End inner Page hero-->
    <!-- Start  about Section-->
    <section class="about mega-section" id="about-2">
        <div class="container">
            <!-- Start first about div-->
            <div class=" content-block  ">
                <div class="row">
                    <div class="col-12 col-lg-6 d-flex align-items-center about-col pad-end order-1 order-lg-0  wow fadeInUp"
                        data-wow-delay="0.2s">
                        <div class=" text-area "><span class="tag-line">من نحن</span>
                            <div class="section-heading side-heading  light-title">
                                <h2 class="section-title "> {{ $langg->lang8 }}
                                    <span class='featured-text'></span><span class="title-design-element "></span>
                                </h2>
                            </div>
                            <p class=" init-text">
                                @if ($langg->rtl == 1)
                                    {!! $gs->management_ar !!}
                                @else
                                    {!! $gs->management !!}
                                @endif
                            </p>
                            <!-- <p class="about-text ">
                      هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                      النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى
                      يولدها التطبيق.
                      إذا كنت تحتاج إلى عدد أكبر من الفقرات
                    </p> -->
                            <div class="cta-area wow fadeInUp" data-wow-delay=".8s">

                                <div class="signature ">
                                    {{--  <div class="signature-img"></div>
                  <div class="signature-name">CEO &amp; Founder </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center order-0 order-lg-1  wow fadeInUp"
                        data-wow-delay="0.4s">
                        <div class="img-area  " data-tilt data-tilt-glare data-tilt-max-glare="0.5">
                            <!-- <div class="photo-banner-end"><span class="number">46 </span>
                      <p class="banner-text">years of Exprince</p>
                      <div class="line line-on-center   my-1"></div>
                    </div> -->
                            <div class="image">
                                <div class="overlay-color"></div><img class="img-fluid about-img  video-thumb "
                                    src="{{ asset('public/assets/images/' . $gs->home_about_img2) }}" alt="Our vision">
                            </div>
                            <div class="video-wrapper on-start">
                                <div class="play-btn-col-dir"><a class="video-link" href="{{ $gs->home_about_link }}"
                                        role="button" data-fancybox="data-fancybox">
                                        <div class="play-video-btn">
                                            <div class="play-btn"> <i class="fas fa-play icon"></i></div>
                                        </div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End first about div-->
        </div>
    </section>
    <!-- End  about Section-->

    @include('includes.form')

@stop
