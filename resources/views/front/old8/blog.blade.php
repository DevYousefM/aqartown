@extends('layouts.front')

@section('title')
    {{ $langg->lang13 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop
@section('css')
    <link href="{{ asset(access_public() . 'assets/canbest/css/plugins/bootstrap.min.css') }}" rel="stylesheet">
@stop
@section('content')
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp
    <!-- ============================ Page Title Start================================== -->
    <section class="breadcrumb-section"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->hot_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>{{ $langg->lang13 }}</h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>{{ $langg->lang13 }}</li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">Absen</span>
        </div>

    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Our Videos Start ================================== -->

    <section class="news-section">
        <div class="container">
            <div class="sec-title centred">

                <h2>News</h2>
            </div>
            <div class=" clearfix blog-slider owl-carousel owl-theme">

                @foreach ($blogs as $blogg)
                    <div class="news-block item">
                        <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms"
                            style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{ $blogg->photo ? asset(access_public() . 'assets/images/blogs/' . $blogg->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                        alt="">
                                    <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}"
                                        class="link"><i class="fal fa-link"></i></a>

                                </figure>
                                <div class="lower-content">
                                    <h3><a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                            @if ($langg->rtl == 1)
                                                {{ strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar, 0, 50) . '...' : $blogg->title_ar }}
                                            @else
                                                {{ strlen($blogg->title) > 50 ? substr($blogg->title, 0, 50) . '...' : $blogg->title }}
                                            @endif
                                        </a></h3>


                                    <p>
                                    </p>
                                    <p>
                                        @if ($langg->rtl == 1)
                                            {{ strlen($blogg->details_ar) > 160 ? substr(strip_tags($blogg->details_ar), 0, 160) . '...' : $blogg->details_ar }}
                                        @else
                                            {{ strlen($blogg->details) > 160 ? substr(strip_tags($blogg->details), 0, 160) . '...' : $blogg->details }}
                                        @endif
                                    </p>
                                    <div class="link"><a
                                            href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}"><i
                                                class="far fa-long-arrow-right"></i></a>
                                    </div>
                                    <div class="btn-box"><a
                                            href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}"
                                            class="theme-btn-one">View details <i class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- ============================ Our Videos End ================================== -->

@stop
