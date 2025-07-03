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



    <!-- ============================ Page Title Start================================== -->
    <div class="page-title"
        style="background:linear-gradient(#21459799, #21459799), url({{ asset(access_public() . 'assets/images/' . $gs->feature_icon) }});"
        data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{ $langg->lang11 }}</li>
                        </ol>
                        <h2 class="breadcrumb-title">{{ $langg->lang11 }} -<span
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
            <h4><b>{{ $langg->lang35 }}</b></h4>
        </div>


        <div class="row">

            @foreach ($categories as $key => $category)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <a
                        href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                                  @else
                                            
                                                {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                        <div class="single-team-typ-1-wraper">
                            <img src="{{ asset(access_public() . 'assets/images/categories/' . $category->photo) }}"
                                alt="img">
                            <div class="team-typ-1-hvr text-white">
                                <p>
                                    @if ($langg->rtl == 1)
                                        {{ $category->name_ar }}
                                    @else
                                        {{ $category->name }}
                                    @endif​​
                                </p>
                            </div>
                            <h5 class="brand-title text-center black p-2">
                                @if ($langg->rtl == 1)
                                    {{ $category->name_ar }}
                                @else
                                    {{ $category->name }}
                                @endif​​
                            </h5>
                        </div>
                    </a>
                </div>
            @endforeach

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

                @foreach ($images as $partner)
                    <div class="item">
                        <img src="{{ asset(access_public() . 'assets/images/ads/' . $partner->photo) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Counter Section -->
    @include('includes.form')
@stop
