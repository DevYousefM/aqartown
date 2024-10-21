@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{ asset('public/assets/images/' . $gs->logo) }}" />
@stop


@section('content')

    <!--End Page Header-->
    <!-- Start  Page hero-->
    <section class="page-hero hero-swiper-slider slider-parallax d-flex align-items-center" id="page-hero">
        <!--Start  Swiper JS slider-->
        <div class="slider swiper-container">
            <div class="swiper-wrapper text-center">


                @foreach ($sliders as $k => $slide)
                    @php
                        $galss = str_replace(' ', '%20', $slide->photo);
                    @endphp
                    <!--first slider-->
                    <div class="swiper-slide">
                        <div class="slide-bg-img" data-background="{{ asset('/public/assets/images/sliders/' . $galss) }}">
                            <div class="overlay-color"></div>
                        </div>
                        <div class="container">
                            <div class="hero-text-area   ">
                                <div class="row justify-content-center">
                                    <div class="col-12  ">
                                        <h1 class="slide-title  "> <span class="first-word hollow-text">
                                                {{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}
                                                <span class="title-design-element "></span></span>
                                            <br>
                                            {{ $langg->rtl == 1 ? $slide->title_text_ar : $slide->title_text }}

                                            <span class="featured-text"></span>
                                        </h1>
                                    </div>
                                    <div class="col-10 col-md-8 mx-auto ">
                                        <p class="slide-subtitle  ">
                                            {!! $langg->rtl == 1 ? $slide->details_text_ar : $slide->details_text !!}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <div class="slides-state ">
            <div class="slide-num curent-slide  "></div>
            <!--Add Pagination-->
            <div class="swiper-pagination"></div>
            <div class="slide-num slides-count  "></div>
        </div>
        <!--Add Arrows -->
        <div class="swiper-button-prev  ">
            <div class="left-arrow"><i class="fas fa-arrow-right icon "></i>
            </div>
        </div>
        <div class="swiper-button-next  ">
            <div class="right-arrow"><i class="fas fa-arrow-left icon "></i>
            </div>
        </div>
    </section>
    <!-- End  Page hero-->
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
                                    {!! $gs->policy_ar !!}
                                @else
                                    {!! $gs->policy !!}
                                @endif
                            </p>
                            <!-- <p class="about-text ">
                          هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                          النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى
                          يولدها التطبيق.
                          إذا كنت تحتاج إلى عدد أكبر من الفقرات
                        </p> -->
                            <div class="cta-area wow fadeInUp" data-wow-delay=".8s"><a class=" btn-solid "
                                    href="{{ route('front.about', $sign) }}">{{ $langg->lang3 }} </a>
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
                                    src="{{ asset('public/assets/images/' . $gs->home_about_img1) }}" alt="Our vision">
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
    <!-- Start  Services Section-->
    <section class=" services-bg-img flip-cards  mega-section text-center " id="services">
        <div class="overlay-photo-image-bg"></div>
        <div class="container">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s"><span class='hollow-text'>خدمات
                    </span>المنزل الجميل<span class="title-design-element "></span></h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
        </div>
        <div class="container">
            <div class="row   services-row">

                @foreach ($categories as $cat)
                    <div class="col-12 col-md-9  col-lg-4 mx-auto service-card">
                        <div class="flip-card flip-x wow fadeInUp " data-wow-offset="0" data-wow-delay=".2s">
                            <div class="front-face">
                                <div class="front-face-inner">
                                    <div class="icon-wrapper ">
                                    </div>
                                    <div class="title-wrapper ">
                                        <h3 class="title">
                                            @if ($langg->rtl == 1)
                                                {{ $cat->name_ar }}
                                            @else
                                                {{ $cat->name }}
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="desc-wrapper">
                                        <p class="desc">
                                            @if ($langg->rtl == 1)
                                                {{ $cat->meta_description_ar }}
                                            @else
                                                {{ $cat->meta_description }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{--    {{asset('public/assets/images/categories/'.$cat->photo)}} --}}
                            <div class="back-face">
                                <div class="bg-img-wrapper"><img class="bg-img"
                                        src="assets/images/services/وحدات-التخزين.png" alt="bg-img" /></div>
                                <div class="overlay-color"></div>
                                <div class="back-face-inner">
                                    <div class="title-wrapper">
                                        <h3 class="title">
                                            @if ($langg->rtl == 1)
                                                {{ $cat->name_ar }}
                                            @else
                                                {{ $cat->name }}
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="desc-wrapper">
                                        <p class="desc">
                                            @if ($langg->rtl == 1)
                                                {{ $cat->meta_description_ar }}
                                            @else
                                                {{ $cat->meta_description }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="btn-wrapper"><a class="btn-solid  "
                                            href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $cat->slug_ar, 'lang' => $sign]) }}

                      @else
                      {{ route('front.category', ['category' => $cat->slug, 'lang' => $sign]) }} @endif">المزيد<i
                                                class="fas fa-arrow-right icon ">
                                            </i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End  Services Section-->

    <!-- Start  portfolio Section-->
    <section class="portfolio portfolio-slider    mega-section" id="portfolio">
        <div class="container">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s">معرض <span class='hollow-text'> الأعمال
                        السابقة</span><span class="title-design-element "></span></h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
        </div>
        <!--Swiper-->
        <div class="swiper-container wow fadeIn" data-wow-delay=".5s">
            <div class="swiper-wrapper ">
                @foreach ($images as $image)
                    <div class="swiper-slide">
                        <div class="item "><a class="portfolio-img-link " href="#">
                                <div class="overlay overlay-color"></div><img class="  portfolio-img img-fluid  "
                                    src="{{ asset('/public/assets/images/ads/' . $image->photo) }}" alt=" ">
                            </a>
                            <div class="item-info "><span></span>
                                {{-- <h3 class="item-title">HPL</h3> --}}
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

    <!-- Start  testimonials-3d-->
    <section class="testimonials stack bg-img-section testimonials-3d dark-cards  d-flex align-items-center mega-section "
        id="testimonials-3d">
        <div class="particles-js  polygons" id="particles-js"></div>
        <div class="overlay-pattern-image-bg"></div>
        <div class="container">
            <div class="section-heading center-heading">
                <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s">اراء <span
                        class='hollow-text'>العملاء</span><span class="title-design-element "></span></h2>
                <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-12 ">
                    <div class="swiper-container  wow fadeIn  " data-wow-delay="0.2s">
                        <div class="swiper-wrapper">
                            @foreach ($reviews as $review)
                                <!--First Slide-->
                                <div class="swiper-slide">
                                    <div class="testmonial-card d-flex align-items-center justify-content-center">
                                        <div class="testimonial-content">
                                            <div class="customer-info "><img class="img-fluid "
                                                    src="{{ $review->photo ? asset('public/assets/images/reviews/' . $review->photo) : asset('public/assets/images/noimage.png') }}"
                                                    alt="First Slide ">
                                                <div class="customer-details">
                                                    <p class="customer-name">
                                                        {{ $langg->rtl == 1 ? $review->title_ar : $review->title }}</p>
                                                    {{--  <p class="customer-role">Lawyer</p> --}}
                                                </div>
                                            </div>
                                            <div class="rating-stars"><i class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon"></i><i
                                                    class="fas fa-star star-icon "></i></div>
                                            <div class="customer-testimonial"><i class="fas fa-quote-left   icon"></i>
                                                <div class="content">
                                                    <p class="testimonial-text ">{!! $langg->rtl == 1 ? $review->details_ar : $review->details !!} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  testimonials-3d-->

    @include('includes.form')

@stop
