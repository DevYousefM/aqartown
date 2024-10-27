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

    <!-- end header -->
    <section class="page-title" style="background-image:url({{ asset('public/assets/images/' . $gs->best_icon) }});">
        <div class="auto-container">
            <h1>{{ $langg->lang11 }} </h1>

            <ul class="bread-crumb">
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                <li><a href="#">{{ $langg->lang11 }} </a></li>
            </ul>

        </div>

        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span></div>
        </div>

    </section>

    <!-- category section -->
    <section class="services">
        <h2 class="heading-title">{{ $langg->lang220 }} </h2>
        <div class="container">
            <div class="services_grid">

                @foreach ($subcategories as $subcat)
                    <a href="{{ route('front.category', ['category' => $subcat->category->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}"
                        class="service-item" data-aos="zoom-in-down" data-aos-duration="3000">
                        <div class="service-icon">
                            <img src="{{ asset('public/assets/images/subcategories/' . $subcat->photo) }}"
                                alt="@if ($langg->rtl == 1) {{ $subcat->name_ar }}
            @else

            {{ $subcat->name }} @endif   "
                                data-lazy-src="{{ asset('public/assets/images/subcategories/' . $subcat->photo) }}"
                                data-ll-status="loaded" class="entered lazyloaded"><noscript><img
                                    src="{{ asset('public/assets/images/subcategories/' . $subcat->photo) }}"
                                    alt="@if ($langg->rtl == 1) {{ $subcat->name_ar }}
                @else

                {{ $subcat->name }} @endif   "></noscript>
                        </div>
                        <h3 class="service-name">
                            @if ($langg->rtl == 1)
                                {{ $subcat->name_ar }}
                            @else
                                {{ $subcat->name }}
                            @endif
                        </h3>
                    </a>
                @endforeach

            </div>
            {{--   <a href="services.html" class="reversed-btn morebtn">
        المزيد من الخدمات </a> --}}
        </div>
    </section>
    <!-- ./category section -->

    <br>

    <section class="map">
        <div class="container-fluid">
            {!! $ps->map !!}
        </div>
    </section>


@stop
