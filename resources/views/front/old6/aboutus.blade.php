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
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp



    <section class="breadcrumb-section"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->best_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>{{ $langg->lang18 }} </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>{{ $langg->lang18 }} </li>
                <li><a href="{{ route('front.index', $sign) }}"> {{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>

    <section class="service-details">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="service-sidebar default-sidebar mr-20">
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h3> {{ $langg->lang39 }} </h3>
                                <div class="shape"></div>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li>
                                        <h5><a href="{{ route('front.about', $sign) }}"> {{ $langg->lang11 }}</a></h5>

                                    </li>

                                    <li class="active">
                                        <h5><a href="{{ route('front.profits', $sign) }}">{{ $langg->lang221 }} </a></h5>

                                    </li>


                                    <li>
                                        <h5><a href="{{ route('front.blog', $sign) }}"> {{ $langg->lang222 }} </a></h5>

                                    </li>
                                    <li>
                                        <h5><a href="{{ route('front.jobs', $sign) }}"> {{ $langg->lang20 }} </a></h5>

                                    </li>
                                    <li>
                                        <h5><a href="{{ route('front.categories', $sign) }}"> {{ $langg->lang223 }} </a>
                                        </h5>
                                        <span class="line"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>




                        <!-- <div class="sidebar-widget free-quote">
                                <div class="widget-title">
                                    <h3>تواصل معنا</h3>
                                    <div class="shape"></div>
                                </div>
                                <div class="widget-content">
                                    <form action="contact.html" method="post" class="quote-form">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="الاسم بالكامل" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="البريد الالكتروني" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="رقم الهاتف" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="نص الرسالة"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn-one">إرســــــال</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-side" data-aos="zoom-in-left" data-aos-duration="1500">
                    <div class="service-details-content">
                        <div class="content-one">
                            <!-- <figure class="image-box"><img src="images/events/1.jpg" alt=""></figure> -->
                            <div class="text">

                                <p>
                                    @if ($langg->rtl == 1)
                                        {!! $gs->policy_ar !!}
                                    @else
                                        {!! $gs->policy !!}
                                    @endif
                                </p>




                            </div>

                        </div>




                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features-area text-right pb-70" style="background-color: #f7fcfe;">
        <div class="container-fluid">
            <h1 class="text-right headline" style="color: #8fc8eb;"> {{ $langg->lang40 }}
            </h1>
            <div class="row">


                @foreach ($counters as $key => $counter)
                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3" data-aos="fade-down-left"
                        data-aos-duration="1500">
                        <div class="single-features-2">

                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="icon">
                                            <i class="fal fa-shield-check"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h2 class="card-title">
                                                {{ $langg->rtl == 1 ? $counter->title_ar : $counter->title }}</h2>
                                            <p class="card-text">
                                                {{ $langg->rtl == 1 ? $counter->subtitle_ar : $counter->subtitle }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


    <!-- our clients section -->
    <div class="clients-section">
        <div class="section-heading">
            <p>
                {{ $langg->lang37 }}
            </p>
        </div>
        <div class="swiper-container home-clients-slider">
            <div class="swiper-wrapper">

                @foreach ($images as $partner)
                    <div class="swiper-slide">
                        <div class="slider-img">
                            <img src="{{ asset(access_public() . 'assets/images/ads/' . $partner->photo) }}"
                                alt="img">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- our clients section -->
@stop
