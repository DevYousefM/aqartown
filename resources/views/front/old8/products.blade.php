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
        $about_uss = DB::table('brands')->where('status', 1)->get();

    @endphp

    <!-- ============================ Page Title Start================================== -->
    <section class="breadcrumb-section"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->top_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>{{ $langg->lang16 }}</h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>{{ $langg->lang16 }}</li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">Absen</span>
        </div>

    </section>
    <!-- ============================ Page Title End ================================== -->
    <!-- ============================ Agency List Start ================================== -->

    <!-- category section -->
    <div class="categories-section">
        <div class="line-up"></div>
        <div class="section-heading">
            <p>
                {{ $langg->lang8 }}
            </p>
        </div>
        <div class="section-body">
            <ul class="main-ul">

                @foreach ($about_uss as $k => $about_us)
                    <li>
                        <a href="{{ route('front.product2', ['slug' => $about_us->slug, 'lang' => $sign]) }}"
                            class="product-card">
                            <div class="img-div lazy-div">
                                <img class="lazy"
                                    data-src="{{ asset(access_public() . 'assets/images/brands/' . $about_us->photo) }}"
                                    alt="png" />
                                <div class="next-lazy-img"></div>
                            </div>
                            <div class="title">
                                <p>
                                    @if ($langg->rtl == 1)
                                        {{ $about_us->title_ar }}
                                    @else
                                        {{ $about_us->title }}
                                    @endif
                                </p>
                                <h6>
                                    @if ($langg->rtl == 1)
                                        {{ $about_us->name_ar }}
                                    @else
                                        {{ $about_us->name }}
                                    @endif
                                </h6>
                            </div>
                        </a>
                    </li>
                @endforeach


            </ul>
        </div>
    </div>
    <!-- ./category section -->
    <!-- ============================ Agency List End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    @include('includes.form')
    <!-- ============================ Agency List End ================================== -->
@stop
