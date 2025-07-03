@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}" />
@stop


@section('content')



    <!-- =====slider home ===== -->
    <!-- Main Slider -->
    <!-- start home main slider -->
    <div class="swiper-container home-main-slider">
        <div class="swiper-wrapper">

            @foreach ($sliders as $k => $slide)
                @php
                    $galss = str_replace(' ', '%20', $slide->photo);
                @endphp
                <div class="swiper-slide">
                    <div class="slider-img">
                        <img src="{{ asset('/' . access_public() . '/assets/images/sliders/' . $galss) }}" alt="img">
                    </div>
                    <div class="slider-text">
                        <div class="text-buttons">
                            <div class="text">
                                <p>
                                    {{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}
                                </p>
                                <p>
                                    {{ $langg->rtl == 1 ? $slide->title_text_ar : $slide->title_text }} </p>
                            </div>

                        </div>
                    </div>
                    <div class="slider-text">
                        <div class="text-buttons">
                            <div class="text">
                                <p>
                                    {{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}
                                </p>
                                <p>
                                    {{ $langg->rtl == 1 ? $slide->title_text_ar : $slide->title_text }} </p>
                            </div>

                        </div>
                    </div>
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

    <!-- End Main Slider -->
    <!-- =====slider home ===== -->
    <!-- Slider END -->

    <!--Start About Area-->
    <div class="about-area pt-80 pb-50 theme-bg-dark">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 offset-lg-1 mb-30">
                    <div class="about-content">
                        <div class="about-content-text">
                            <!-- <h6>About Us</h6> -->
                            @if ($langg->rtl == 1)
                                {!! $gs->home_about_ar !!}
                            @else
                                {!! $gs->home_about !!}
                            @endif
                            <!-- <p>Lorem ipsum dolor eletum nulla eu placerat felis etiam tincidunt tiam tincidunt orci lacus id varius dolor fermum sit amet orem ipsum dolor eletum nulla eu placerat felis etiam tincidunt lacus id varius dolor fermum sit amet.</p> -->
                            <a href="{{ route('front.about', $sign) }}" class="btn-style-1 mt-20">{{ $langg->lang6 }} </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img-wrapper">
                        <div class="row align-items-center">

                            <div class="about-images-2">
                                <img src="{{ asset(access_public() . 'assets/images/' . $gs->home_about_img3) }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End About Area-->
    @foreach ($categories->take(1) as $cat)
        <!--Start services style1 area-->
        <section class="services-style1-area sec-pd1">
            <div class="container">
                <div class="sec-title max-width text-center">
                    {{-- <h3>مطابخ</h3> --}}
                    <h1>
                        @if ($langg->rtl == 1)
                            {{ $cat->name_ar }}
                        @else
                            {{ $cat->name }}
                        @endif
                    </h1>

                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="services-carousel owl-carousel owl-theme">

                            @if (count($cat->subs) > 0)
                                @foreach ($cat->subs as $subcat)
                                    <!--Start single solution style1-->
                                    <div class="single-solution-style1">
                                        <div class="img-holder">
                                            <img src="{{ asset(access_public() . 'assets/images/subcategories/' . $subcat->photo) }}"
                                                alt="Awesome Image">
                                            <div class="icon-holder">
                                                <div class="inner-content">
                                                    <div class="box">
                                                        <span class="fal fa-table"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>
                                                @if ($langg->rtl == 1)
                                                    {{ $subcat->name_ar }}
                                                @else
                                                    {{ $subcat->name }}
                                                @endif
                                            </h3>

                                            <div class="readmore">
                                                <a
                                                    href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $cat->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}

                                        @else
                                        {{ route('front.category', ['category' => $cat->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }} @endif"><span
                                                        class="flaticon-next"></span></a>
                                                <div class="overlay-button">
                                                    <a
                                                        href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $cat->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}

                                            @else
                                            {{ route('front.category', ['category' => $cat->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }} @endif">{{ $langg->lang3 }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End single solution style1-->
                                @endforeach
                            @endif

                            <!--End single solution style1-->

                            <!--End single solution style1-->
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--End services style1 area-->
    @endforeach

    <!--Start team area v2-->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 about-inner-wrap">
                    <div class="about-inner">
                        <h6> {{ $langg->lang8 }}
                        </h6>
                        @if ($langg->rtl == 1)
                            {!! $gs->policy_ar !!}
                        @else
                            {!! $gs->policy !!}
                        @endif
                    </div>
                    <!-- <ul class="about-list">
                                            <li>
                                                <div class="icon">
                                                    <img src="img/bg/about-icon-1.png" alt="about icon">
                                                </div>
                                                <div class="text">
                                                    <h5>12 Years Experince</h5>
                                                    <p>
                                                        It's difficult to find examples of lorem ipsum in use before Letraset made it
                                                        popular as a dummy text..
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <img src="img/bg/about-icon-2.png" alt="about icon">
                                                </div>
                                                <div class="text">
                                                    <h5>Unique Tips &amp; Design</h5>
                                                    <p>
                                                        It's difficult to find examples of lorem ipsum in use before Letraset made it
                                                        popular as a dummy text..
                                                    </p>
                                                </div>
                                            </li>
                                        </ul> -->
                    <a href="{{ route('front.about', $sign) }}" title="Read More" class="primary-btn">
                        <span>{{ $langg->lang3 }} </span>
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{ asset(access_public() . 'assets/images/' . $gs->home_about_img1) }}" alt="about image"
                            class="img-fluid">
                        <a href="{{ $gs->home_about_link }}" title="Youtube Video" data-autoplay="true" data-vbtype="video"
                            class="video-btns  venobox vbox-item">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End team area v2-->

    @foreach ($categories->skip(1)->take(1) as $cat)
        <!--Start Highlights area-->
        <section class="news-section">
            <div class="container">
                <div class="sec-title centred">

                    <h2>
                        @if ($langg->rtl == 1)
                            {{ $cat->name_ar }}
                        @else
                            {{ $cat->name }}
                        @endif
                    </h2>
                </div>
                <div class=" clearfix blog-slider owl-carousel owl-theme">
                    @if (count($cat->subs) > 0)
                        @foreach ($cat->subs as $subcat)
                            <div class="news-block item">
                                <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                                    data-wow-duration="1500ms"
                                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ asset(access_public() . 'assets/images/subcategories/' . $subcat->photo) }}"
                                                alt="">
                                            <a href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $cat->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}

                                    @else
                                    {{ route('front.category', ['category' => $cat->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }} @endif"
                                                class="link"><i class="fal fa-link"></i></a>

                                        </figure>
                                        <div class="lower-content">
                                            <h3><a
                                                    href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $cat->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}

                                        @else
                                        {{ route('front.category', ['category' => $cat->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }} @endif">
                                                    @if ($langg->rtl == 1)
                                                        {{ $subcat->name_ar }}
                                                    @else
                                                        {{ $subcat->name }}
                                                    @endif
                                                </a></h3>
                                            <div class="link"><a
                                                    href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $cat->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}

                                        @else
                                        {{ route('front.category', ['category' => $cat->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }} @endif"><i
                                                        class="far fa-long-arrow-right"></i></a>
                                            </div>
                                            <div class="btn-box"><a
                                                    href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $cat->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}

                                        @else
                                        {{ route('front.category', ['category' => $cat->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }} @endif"
                                                    class="theme-btn-one">

                                                    {{ $langg->lang3 }}

                                                    <i class="far fa-long-arrow-left"></i></a></div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>
    @endforeach
    <!--End Highlights area-->





    <!--Start works area-->
    <div class="Blog-section pt-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-t">
                        <!-- <h2>
                                                    
                                                </h2>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipiscing
                                                </p> -->

                    </div>
                </div>
            </div>

            <div class="row pt-40">
                @foreach ($blogs->take(2) as $blogg)
                    <div class="col-md-6 pl-30 pt-30 pb-30 pr-30">
                        <div class="blog-box">
                            <div class="blog-img">
                                <a href="#">
                                    <img src="{{ $blogg->photo ? asset(access_public() . 'assets/images/blogs/' . $blogg->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                        alt="">
                                </a>
                            </div>
                            <div class="blog-con">
                                <ul class="top-b">
                                    <li>
                                        @if ($langg->rtl == 1)
                                            {{ $blogg->title_ar }}
                                        @else
                                            {{ $blogg->title }}
                                        @endif
                                    </li>
                                </ul>
                                <p>
                                    @if ($langg->rtl == 1)
                                        {!! $blogg->details_ar !!}
                                    @else
                                        {!! $blogg->details !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--End works area-->

    <!-- Counter Section -->
    <div class="counter-area parallax two three pt-100 pb-70">
        <h1>
            {{ $langg->lang53 }} </h1>
        <div class="container">
            <div class="row align-items-center">

                @foreach ($counters as $key => $counter)
                    <div class="col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <h3>
                                <span class="odometer" data-count="{{ $counter->value }}">0</span>
                                <span class="target">+</span>
                            </h3>
                            <p>{{ $langg->rtl == 1 ? $counter->title_ar : $counter->title }} </p>
                        </div>
                    </div>
                @endforeach



            </div>

        </div>
    </div>
    <!-- End Counter Section -->

    <!--Start Testimonial area-->
    <section class="testimonial-area">
        <div class="container inner-content">
            <div class="row">
                <div class="col-xl-6">
                    <div class="sec-title">
                        <h3>{{ $langg->lang35 }} </h3>
                        <h1>{{ $langg->lang12 }} </h1>
                    </div>
                </div>
                {{-- <div class="col-xl-6">
                        <div class="button float-left">
                            <a class="btn-one" href="#">{{ $langg->lang3 }} </a>
                        </div>
                    </div> --}}
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testimonial-carousel owl-carousel owl-theme">

                        @foreach ($reviews as $review)
                            <!--Start Single Testimonial Item-->
                            <div class="single-testimonial-item text-center">
                                <div class="text-holder">
                                    <p> {!! $langg->rtl == 1 ? $review->details_ar : $review->details !!} </p>
                                    <div class="img-holder">
                                        <img src="{{ $review->photo ? asset(access_public() . 'assets/images/reviews/' . $review->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                            alt="Awesome Image">
                                    </div>
                                </div>
                                <div class="name">
                                    <h3> {{ $langg->rtl == 1 ? $review->title_ar : $review->title }}</h3>
                                    {{--   <span>Denver</span> --}}
                                </div>
                            </div>
                            <!--End Single Testimonial Item-->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Testimonial area-->

    <!--Start latest blog area-->
    <!-- <section class="latest-blog-area sec-pd1">
                                <div class="container inner-content">
                                    <div class="sec-title max-width text-center">
                                        <h3>News & Tips</h3>
                                        <h1>Latest From Our Blog</h1>
                                        <p>Your teeth play an important part in your daily life. It not only helps you to chew and eat your
                                            food, but frames your face. Any missing tooth can have a major impact on your quality of life.
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <div class="single-blog-post">
                                                <div class="img-holder">
                                                    <img src="images/blog/lat-blog-1.jpg" alt="Awesome Image">
                                                    <div class="categorie-button">
                                                        <a class="btn-one" href="#">Healthy Teeth</a>
                                                    </div>
                                                </div>
                                                <div class="text-holder">
                                                    <div class="meta-box">
                                                        <div class="author-thumb">
                                                            <img src="images/blog/author-1.png" alt="Image">
                                                        </div>
                                                        <ul class="meta-info">
                                                            <li><a href="#">By Megan Clarks</a></li>
                                                            <li><a href="#">Nov 14, 2018</a></li>
                                                        </ul>
                                                    </div>
                                                    <h3 class="blog-title"><a href="blog-single.html">A guide for dentists and patients</a>
                                                    </h3>
                                                    <div class="text-box">
                                                        <p>No one rejects, dislikes our avoids pleasures itself, because it is all pleasure,
                                                            but because those who do not know.</p>
                                                    </div>
                                                    <div class="readmore-button">
                                                        <a class="btn-two" href="#"><span class="flaticon-next"></span>Continue REading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                              
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <div class="single-blog-post">
                                                <div class="img-holder">
                                                    <img src="images/blog/lat-blog-2.jpg" alt="Awesome Image">
                                                    <div class="categorie-button">
                                                        <a class="btn-one" href="#">Technology</a>
                                                    </div>
                                                </div>
                                                <div class="text-holder">
                                                    <div class="meta-box">
                                                        <div class="author-thumb">
                                                            <img src="images/blog/author-2.png" alt="Image">
                                                        </div>
                                                        <ul class="meta-info">
                                                            <li><a href="#">By Megan Clarks</a></li>
                                                            <li><a href="#">Nov 14, 2018</a></li>
                                                        </ul>
                                                    </div>
                                                    <h3 class="blog-title"><a href="blog-single.html">Should i go for a smile design?</a>
                                                    </h3>
                                                    <div class="text-box">
                                                        <p>Nor again is there anyone who love pursues or desires to obtain pain of itself,
                                                            bepain, but occasionally circumstances.</p>
                                                    </div>
                                                    <div class="readmore-button">
                                                        <a class="btn-two" href="#"><span class="flaticon-next"></span>Continue REading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <div class="single-blog-post">
                                                <div class="img-holder">
                                                    <img src="images/blog/lat-blog-3.jpg" alt="Awesome Image">
                                                    <div class="categorie-button">
                                                        <a class="btn-one" href="#">Dental Care</a>
                                                    </div>
                                                </div>
                                                <div class="text-holder">
                                                    <div class="meta-box">
                                                        <div class="author-thumb">
                                                            <img src="images/blog/author-3.png" alt="Image">
                                                        </div>
                                                        <ul class="meta-info">
                                                            <li><a href="#">By Megan Clarks</a></li>
                                                            <li><a href="#">Nov 14, 2018</a></li>
                                                        </ul>
                                                    </div>
                                                    <h3 class="blog-title"><a href="blog-single.html">What you need to know teeth?</a></h3>
                                                    <div class="text-box">
                                                        <p>It not only helps you to chew and eat your food frames your faceany missing tooth
                                                            can major impact your quality of life.</p>
                                                    </div>
                                                    <div class="readmore-button">
                                                        <a class="btn-two" href="#"><span class="flaticon-next"></span>Continue REading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section> -->
    <!--End latest blog area-->

@stop
