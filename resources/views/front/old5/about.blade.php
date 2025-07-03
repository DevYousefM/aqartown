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



    <div class="page-banner-area"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->best_icon) }});">
        <div class="container">
            <div class="page-banner-content">
                <h2>{{ $langg->lang16 }}</h2>
                <ul class="pages-list">
                    <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                    <i class="fad fa-chevron-right"></i>
                    <li>{{ $langg->lang16 }}</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="about-area ptb-100">
        <div class="container">


            @foreach ($about_uss as $k => $about_us)
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="about-content">
                            <div class="section_title"
                                style="
                        text-align: left;
                        /* float: left; */
                    ">
                                <h2><span>
                                        @if ($langg->rtl == 1)
                                            {{ $about_us->name_ar }}
                                        @else
                                            {{ $about_us->name }}
                                        @endif
                                    </span></h2>
                                <p>
                                    @if ($langg->rtl == 1)
                                        {!! $about_us->meta_description_ar !!}
                                    @else
                                        {!! $about_us->meta_description !!}
                                    @endif
                                </p>
                                <div class="divider_effect_section"style="
            margin-right: auto;
            margin-left: 0;
        "></div>
                            </div>
                            <!-- <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="about-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Complete Crown
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Dental Implants
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Dental X-Ray
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="about-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Cosmetic Filling
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Cosmetic Filling
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Root Canal
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="about-image">
                            <img src="{{ asset(access_public() . 'assets/images/brands/' . $about_us->photo) }}"
                                alt="image">
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="about-content">


                <div class="row">
                    @foreach ($counters as $key => $counter)
                        <div class="col-lg-3 col-md-3">
                            <div class="about-info">
                                <i class="flaticon-caduceus"></i>
                                <h4>{{ $counter->value }}</h4>
                                <span>{{ $langg->rtl == 1 ? $counter->title_ar : $counter->title }}</span>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>


    <!-- <section class="fun-facts-area pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-fun-fact">
                                <h3>
                                    <span class="odometer" data-count="549">00</span>
                                </h3>
                                <p>Expert Doctors</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-fun-fact">
                                <h3>
                                    <span class="odometer" data-count="867">00</span>
                                </h3>
                                <p>Problem Solve</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-fun-fact">
                                <h3>
                                    <span class="odometer" data-count="169">00</span>
                                </h3>
                                <p>Award Winning</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-fun-fact">
                                <h3>
                                    <span class="odometer" data-count="79">00</span>
                                </h3>
                                <p>Experiences</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->




    <section class="review-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="section_title"
                        style="
                    text-align: left;
                    /* float: left; */
                ">
                        <h2><span>{{ $langg->lang230 }}</span></h2>
                        <p>{{ $langg->lang201 }}</p>
                        <div class="divider_effect_section"style="
            margin-right: auto;
            margin-left: 0;
        "></div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <!-- <div class="section-warp-btn">
                                <a href="testimonials.html" class="default-btn">View All</a>
                            </div> -->
                </div>
            </div>
            <div class="review-slides owl-carousel owl-theme">

                @foreach ($reviews as $review)
                    <div class="single-review-item">
                        <div class="icon">
                            <i class="flaticon-left-quote"></i>
                        </div>
                        <p>{!! $langg->rtl == 1 ? $review->details_ar : $review->details !!}</p>
                        <div class="review-info">
                            <img src="{{ asset(access_public() . 'assets/images/reviews/' . $review->photo) }}"
                                alt="image">
                            <h3>{{ $langg->rtl == 1 ? $review->title_ar : $review->title }}</h3>
                            <span>{{ $langg->rtl == 1 ? $review->subtitle_ar : $review->subtitle }}</span>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

@stop
