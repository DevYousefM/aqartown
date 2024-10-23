@extends('layouts.front')

@section('title')
    {{ $langg->lang11 }} -
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


    <section class="breadcrumb-section" style="background-image: url({{ asset('assets/images/' . $gs->best_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> {{ $langg->lang11 }}</h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> {{ $langg->lang11 }}</li>
                <li><a href="{{ route('front.index', $sign) }}"> {{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>

    <!-- about section -->
    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <div class="about-description" data-aos="zoom-in" data-aos-duration="1500">
                        @if ($langg->rtl == 1)
                            {!! $gs->home_about_ar !!}
                        @else
                            {!! $gs->home_about !!}
                        @endif
                        <a href="{{ $gs->home_about_link }}" class="see-more">
                            <span>
                                <i class="ion-social-youtube-outline"></i>
                            </span>
                            <p> {{ $langg->lang38 }}</p>
                        </a>

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="home-about" data-aos="zoom-in-left" data-aos-duration="1500">
                        <div class="img-div">
                            <img src="{{ asset('assets/images/' . $gs->home_about_img1) }}" alt="img">
                        </div>


                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- ./about section -->


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
                            <img src="{{ asset('assets/images/ads/' . $partner->photo) }}" alt="img">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- our clients section -->
@stop
