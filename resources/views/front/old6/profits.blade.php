@extends('layouts.front')

@section('title')
    {{ $langg->lang221 }} -
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
        style="background-image: url({{ asset('public/assets/images/' . $gs->contact_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>{{ $langg->lang221 }} </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>{{ $langg->lang221 }} </li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>

    <div class="gallery-pgae">
        <!-- start gallery section -->
        <div class="home-gallery-section">

            <div class="gallery-layout">
                <div class="home-light-gallery">

                    @foreach ($reviews as $review)
                        <a href="{{ asset('public/assets/images/reviews/' . $review->photo) }}" data-aos="zoom-in"
                            data-aos-duration="1500">
                            <img src="{{ asset('public/assets/images/reviews/' . $review->photo) }}">
                            <div class="text text-center">
                                <h2>{{ $langg->rtl == 1 ? $review->title_ar : $review->title }}</h2>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- end gallery section -->
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

                @foreach ($images as $partner)
                    <div class="swiper-slide">
                        <div class="slider-img">
                            <img src="{{ asset('public/assets/images/ads/' . $partner->photo) }}" alt="img">
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- our clients section -->
@stop
