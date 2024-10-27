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


    <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero hero-vegas-slider inner-page-hero " id="page-hero">
        <div class="overlay-color"></div>
        <div class="vegas-slider-content" data-vegas-slide-1="{{ asset('public/assets/images/' . $gs->feature_icon) }}"
            data-vegas-slide-2="{{ asset('public/assets/images/' . $gs->best_icon) }}"
            data-vegas-slide-3="{{ asset('public/assets/images/' . $gs->trending_icon) }}">
            <div class="container">
                <div class="row">
                    <div class="col-12 hero-text-area ">
                        <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">{{ $langg->lang221 }} </h1>
                        <nav aria-label="breadcrumb ">
                            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                                <li class="breadcrumb-item"><a class="breadcrumb-link"
                                        href="{{ route('front.index', $sign) }}"><i
                                            class="fas fa-home icon "></i>{{ $langg->lang17 }}</a></li>
                                <li class="breadcrumb-item active">{{ $langg->lang221 }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End inner Page hero-->

    <section class="gallery-section">
        <div class="container">

            <div class="sortable-masonry">
                <div class="items-container row">
                    @foreach ($videos as $video)
                        <div class="gallery-item all masonry-item loft single-home col-lg-4 col-md-4 col-sm-12">
                            <div class="image-box">

                                {{--          <iframe src="https://www.youtube.com/embed/pKF_doN3Tz8" frameborder="0" style="width: 100%;     border-radius: 15px;
                                    height: 210px;
                                box-shadow: 0 0 27px rgba(0, 0, 0, 0.5);" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> --}}
                                {!! $video->link !!}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>



        </div>
    </section>

@stop
