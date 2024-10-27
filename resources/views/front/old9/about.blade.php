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

    <!-- end header -->
    <section class="page-title" style="background-image:url({{ asset('public/assets/images/' . $gs->feature_icon) }});">
        <div class="auto-container">
            <h1>{{ $langg->lang16 }} </h1>

            <ul class="bread-crumb">
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                <li><a href="#">{{ $langg->lang16 }} </a></li>
            </ul>

        </div>

        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span></div>
        </div>

    </section>



    <!-- start home about section -->
    <div class="home-about-section">
        <div class="container">

            <div class="section-text">
                <div class="section-heading" data-aos="fade-down" data-aos-duration="1500">
                    <div class="heading-left">
                        <span class="draw-line"></span>
                    </div>
                    <img src="{{ asset('public/assets/images/' . $gs->logo) }}" alt="">

                    <div class="heading-right">
                        <span class="draw-line"></span>
                    </div>
                </div>
                <div class="section-body" data-aos="zoom-in-up" data-aos-duration="1500">
                    @if ($langg->rtl == 1)
                        {!! $gs->home_about_ar !!}
                    @else
                        {!! $gs->home_about !!}
                    @endif
                </div>
            </div>
            <div class="home-about-slick-slider" data-aos="zoom-in-right" data-aos-duration="1500">

                @foreach ($images as $image)
                    <div class="img-div">
                        <img src="{{ asset('/public/assets/images/ads/' . $image->photo) }}" alt="img">
                    </div>
                @endforeach




            </div>
        </div>
    </div>
    <!-- end home about section -->

    <section class="counters">
        <div class="container">
            <div class="sec-heading text-center">

            </div>
            <div class="row">

                @foreach ($counters as $key => $counter)
                    <div class="four col-md-3">
                        <div class="counter-box"> <span class="counter">{{ $counter->value }}
                            </span>
                            <p>{{ $langg->rtl == 1 ? $counter->title_ar : $counter->title }}


                            </p>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>


    @include('includes.form')

@stop


@section('js')
    <script>
        if (document.querySelector('.home-about-slick-slider')) {
            $('.home-about-slick-slider').slick({});
        }

        if (document.querySelector('.home-about-slick-slider')) {
            const UIslickPrev = document.querySelector('.slick-prev');
            UIslickPrev.textContent = 'prev';
            const UIslickNext = document.querySelector('.slick-next');
            UIslickNext.textContent = 'next';
        }
    </script>
@stop
