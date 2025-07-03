@extends('layouts.front')

@section('title')
    {{ $langg->lang222 }} -
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
        style="background-image:url({{ asset(access_public() . 'assets/images/' . $gs->hot_icon) }})">
        <div class="container">
            <div class="page-banner-content">
                <h2>{{ $langg->lang222 }}</h2>
                <ul class="pages-list">
                    <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                    <i class="fad fa-chevron-right"></i>
                    <li>{{ $langg->lang222 }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- blog area start -->
    <section class="blog__area pt-100 pb-100">
        <div class="blog-area ptb-100">
            <div class="container">
                <div class="section_title">
                    <h2><span> {{ $langg->lang202 }}</span></h2>
                    <p>{{ $langg->lang203 }} </p>
                    <div class="divider_effect_section"></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-slider owl-carousel owl-theme">

                            @foreach ($blogs as $blogg)
                                <div class="blog-card text-center">
                                    <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                        <img src="{{ $blogg->photo ? asset(access_public() . 'assets/images/blogs/' . $blogg->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                            alt="Shape">
                                    </a>
                                    <div class="b-card-text">
                                        <h3><a
                                                href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                                @if ($langg->rtl == 1)
                                                    {{ strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar, 0, 50) . '...' : $blogg->title_ar }}
                                                @else
                                                    {{ strlen($blogg->title) > 50 ? substr($blogg->title, 0, 50) . '...' : $blogg->title }}
                                                @endif
                                            </a>
                                        </h3>
                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ substr(strip_tags($blogg->details_ar), 0, 120) }}
                                            @else
                                                {{ substr(strip_tags($blogg->details), 0, 120) }}
                                            @endif
                                        </p>
                                        <div class="view-more">
                                            <a
                                                href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                                {{ $langg->lang38 }}
                                                <i class='bx bx-right-arrow-alt'></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>

                </div>

            </div>

    </section>
    <!-- blog area end -->
@stop
