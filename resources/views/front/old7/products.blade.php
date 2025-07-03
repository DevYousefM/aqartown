@extends('layouts.front')

@section('title')
    {{ $langg->lang18 }} -
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



    <!-- ============================ Page Title Start================================== -->
    <div class="page-title"
        style="background:linear-gradient(#21459799, #21459799), url({{ asset(access_public() . 'assets/images/' . $gs->top_icon) }});"
        data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{ $langg->lang18 }}</li>
                        </ol>
                        <h2 class="breadcrumb-title">{{ $langg->lang18 }} -<span
                                onclick="window.location.href='{{ route('front.index', $sign) }}'" style="cursor: pointer;">
                                {{ $langg->lang17 }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->


    <!-- =======================Our Products Start============================ -->

    <div class="services-section">
        <div class="index-tit">
            <h4><b>{{ $langg->lang8 }}</b></h4>
        </div>
        <div class="section-body">
            <ul class="main-section-ul">
                @foreach ($about_uss as $k => $about_us)
                    <li>
                        <a href=" {{ route('front.product2', ['slug' => $about_us->slug, 'lang' => $sign]) }}"
                            class="main-flip-card">
                            <div class="card-content">
                                <div class="card-front">
                                    <div class="img-div">
                                        <img src="{{ asset(access_public() . 'assets/images/brands/' . $about_us->photo) }}"
                                            alt="img">
                                    </div>
                                    <div class="title">
                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ $about_us->title_ar }}
                                            @else
                                                {{ $about_us->title }}
                                            @endif

                                            <br>
                                            <span>
                                                @if ($langg->rtl == 1)
                                                    {{ $about_us->name_ar }}
                                                @else
                                                    {{ $about_us->name }}
                                                @endif
                                            </span>
                                        </p>

                                    </div>
                                    <div class="spans">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="text">
                                        <span>
                                            @if ($langg->rtl == 1)
                                                {{ $about_us->title_ar }}
                                            @else
                                                {{ $about_us->title }}
                                            @endif
                                        </span>
                                        <p>

                                            @if ($langg->rtl == 1)
                                                {{ $about_us->name_ar }}
                                            @else
                                                {{ $about_us->name }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="read-more">
                                        <span>
                                            <i class="linearicons-magnifier"></i>
                                            {{ $langg->lang6 }}
                                        </span>
                                    </div>
                                    <div class="spans">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    <!-- =======================Our Products End============================ -->

    <!-- Services Section -->
    <div class="clinet sections">
        <div class="container">
            <div class="index-tit">
                <h4><b>{{ $langg->lang41 }}</b></h4>
            </div>

            <div class="owl-carousel owl-theme" id="clinet">

                @foreach ($images as $data)
                    <div class="item">
                        <img src="{{ asset(access_public() . 'assets/images/ads/' . $data->photo) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Counter Section -->

    @include('includes.form')
@stop
