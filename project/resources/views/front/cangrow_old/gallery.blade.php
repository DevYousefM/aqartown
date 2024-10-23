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
    <main class="main page page__portfolio">
        <div class="page__header container">
            <div class="row">
                <div class="col-12">
                    <h2 class="page__above-title text-center" data-aos="fade-down" data-aos-delay="700">{{ $langg->lang15 }}
                    </h2>
                    <h1 class="page__title text-center text-uppercase" data-aos="fade-up">{{ $langg->lang221 }}</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="300">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $langg->lang221 }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="portfolio__list-filter d-flex flex-wrap justify-content-center">
                            <li class="portfolio__list-filter-item active" data-filter="all" data-aos="fade-left"
                                data-aos-delay="600">All</li>
                            @foreach ($galleries as $key => $data)
                                <li class="portfolio__list-filter-item" data-filter="{{ $data->id }}"
                                    data-aos="fade-left" data-aos-delay="900">
                                    @if ($langg->rtl == 1)
                                        {{ $data->name_ar }}
                                    @else
                                        {{ $data->country_name }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">

                    @foreach ($images as $key => $data)
                        <div class="col-sm-6 col-lg-3 portfolio__column {{ $data->country_id }}">
                            <div class="portfolio__work" data-aos="fade-up" data-aos-delay="600">
                                <div class="portfolio__wrap-icons">
                                    <a class="portfolio__work-zoom-image"
                                        href="{{ asset('assets/images/gallery/' . $data->photo) }}">
                                        <img src="{{ asset('assets/cangrow/images/svg/zoom.svg') }}" alt="">
                                    </a>
                                    <a class="portfolio__work-share" href="#">
                                        <img src="{{ asset('assets/cangrow/images/svg/share.svg') }}" alt="">
                                    </a>
                                </div>
                                <div class="portfolio__wrap-work-image">
                                    <div class="sk-spinner sk-spinner-pulse"></div>
                                    <img class="portfolio__image position-absolute h-100 w-100 b-lazy"
                                        data-src="{{ asset('assets/images/gallery/' . $data->photo) }}"
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                        alt="Planning">
                                </div>
                                <div class="portfolio__work-name-desc">
                                    <h3 class="portfolio__work-name text-center">
                                        @if ($langg->rtl == 1)
                                            {{ $data->name_ar }}
                                        @else
                                            {{ $data->name }}
                                        @endif
                                    </h3>
                                    <p class="portfolio__work-desc text-center">
                                        @if ($langg->rtl == 1)
                                            {{ $data->date->name_ar }}
                                        @else
                                            {{ $data->date->country_name }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@stop
