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

@php
    $about_uss = DB::table('brands')->where('status', 1)->get();
@endphp
@section('content')


    <!-- ============================ Hero Banner  Start================================== -->
    <!-- start home main slider -->
    <div class="swiper-container home-main-slider">
        <div class="swiper-wrapper">


            @foreach ($sliders as $k => $slide)
                @php
                    $galss = str_replace(' ', '%20', $slide->photo);
                @endphp

                <div class="swiper-slide">
                    <div class="slider-img">
                        <img src="{{ asset('/assets/images/sliders/' . $galss) }}" alt="img">
                    </div>
                    <div class="slider-text">
                        <div class="text-buttons">
                            <div class="text">
                                <p>
                                    {{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}
                                </p>

                            </div>

                        </div>
                    </div> <!--   -->
                </div>
            @endforeach




        </div>

        <div class="mfa-swiper-buttons">
            <div class="swiper-button-prev home-main-slider-prev">
                <span class="fas fa-arrow-right"></span>
            </div>
            <div class="swiper-button-next home-main-slider-next">
                <span class="fas fa-arrow-left"></span>
            </div>
        </div>

        <div class="swiper-pagination home-main-slider-pagination">
        </div>
    </div>
    <!-- end home main slider -->
    <!-- ============================ Hero Banner End ================================== -->
    @if (!empty($gs->percent_title))
        @php
            $title = explode(',', $gs->percent_title);

            $title_ar = explode(',', $gs->percent_title_ar);

        @endphp
        <div class="details-page">
            <div class="page-body container-fluid">
                <div class="container-fluid">
                    <div class="body-text">
                        <div class="specifications">
                            <div class="title">
                                <span>
                                    {{ $langg->lang41 }}
                                </span>
                            </div>
                            <ul>
                                @foreach ($title as $key => $data1)
                                    <li>
                                        <i class="far fa-check-circle"></i>
                                        <p>
                                            <a href="#">
                                                @if ($langg->rtl == 1)
                                                    {{ $title_ar[$key] }}
                                                @else
                                                    {{ $title[$key] }}
                                                @endif
                                            </a>
                                        </p>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    @endif

    <!-- =======================Our Products Start============================ -->
    @foreach ($about_uss->take(3) as $k => $about_us)
        <!-- about section -->
        <div class="about-section-2">
            <div class="container">
                <div class="row">

                    @if ($k % 2)
                        <div class="col-md-6">

                            <div class="home-about">
                                <div class="img-div lazy-div">
                                    <img src="{{ asset('public/assets/images/brands/' . $about_us->photo) }}" alt="img">
                                </div>


                            </div>
                        </div>



                        <div class="col-md-6">

                            <a href="service.html">
                                <div class="about-description">
                                    <div class="heading">
                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ $about_us->title_ar }}
                                            @else
                                                {{ $about_us->title }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text">

                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ $about_us->name_ar }}
                                            @else
                                                {{ $about_us->name }}
                                            @endif
                                        </p>
                                    </div>
                                    <a href="{{ route('front.product2', ['slug' => $about_us->slug, 'lang' => $sign]) }}"
                                        class="see-more">

                                        {{ $langg->lang35 }}
                                    </a>

                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-md-6">

                            <a href="service.html">
                                <div class="about-description">
                                    <div class="heading">
                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ $about_us->title_ar }}
                                            @else
                                                {{ $about_us->title }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text">

                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ $about_us->name_ar }}
                                            @else
                                                {{ $about_us->name }}
                                            @endif
                                        </p>
                                    </div>
                                    <a href="{{ route('front.product2', ['slug' => $about_us->slug, 'lang' => $sign]) }}"
                                        class="see-more">

                                        {{ $langg->lang35 }}
                                    </a>

                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">

                            <div class="home-about">
                                <div class="img-div lazy-div">
                                    <img src="{{ asset('public/assets/images/brands/' . $about_us->photo) }}" alt="img">
                                </div>


                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
        <!-- ./about section -->
    @endforeach

    <section class="at-about-sec">
        <div class="container-fluid">
            <div class="row animatedParent animateOnce">
                <div class="col-lg-6 col-md-6">
                    <div class="article_featured_image">
                        <img src="{{ asset('public/assets/images/' . $gs->home_about_img3) }}" alt="">

                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="at-about-col at-col-default-mar">
                        <div class="at-about-title">
                            <h1> <span> {{ $langg->lang36 }}</span></h1>

                        </div>
                        <p> {!! $langg->rtl == 1 ? $gs->management_ar : $gs->management !!}</p>


                        <!--<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>-->
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- testimonials section -->
    <div class="testimonials-section">
        <div class="container">


            <!-- start testimonials slider -->
            <div class="slider-wrapper">
                <div class="slider-heading">
                    {{ $langg->lang37 }}
                </div>
                <div class="slider-itself">
                    <div class="swiper-container testimonials-slider">
                        <div class="swiper-wrapper">

                            @foreach ($categories->take(5) as $cat)
                                <div class="swiper-slide">
                                    <div class="img-div">
                                        <img src="{{ asset('public/assets/images/categories/' . $cat->photo) }}"
                                            alt="img">
                                    </div>

                                    <div class="content">
                                        <i class="fad fa-quote-right"></i>
                                        <p class="text">
                                            "@if ($langg->rtl == 1)
                                                {{ $cat->name_ar }}
                                            @else
                                                {{ $cat->name }}
                                            @endif
                                        </p>
                                        <p class="text">
                                            @if ($langg->rtl == 1)
                                                {!! $cat->details_ar !!}
                                            @else
                                                {!! $cat->details !!}
                                            @endif
                                        </p>
                                        <i class="fal fa-quote-right"></i>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- rtl code -->
                        <div class="swiper-button-prev testimonials-slider-prev">
                            <span class="far fa-chevron-right"></span>
                        </div>
                        <div class="swiper-button-next testimonials-slider-next">
                            <span class="far fa-chevron-left"></span>
                        </div>
                        <!-- rtl code -->

                        <!-- ltr code -->
                        <!-- <div class="swiper-button-next testimonials-slider-next">
              <span class="linearicons-chevron-right"></span>
            </div>
            <div class="swiper-button-prev testimonials-slider-prev">
              <span class="linearicons-chevron-left"></span>
            </div> -->
                        <!-- ltr code -->

                        <!-- <div class="swiper-pagination testimonials-slider-pagination"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- end testimonials slider -->


    <!-- ============================ Smart Testimonials End ================================== -->
@stop
