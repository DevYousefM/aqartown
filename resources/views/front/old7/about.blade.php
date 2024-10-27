@extends('layouts.front')

@section('title')
    {{ $langg->lang12 }} -
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
        style="background:linear-gradient(#21459799, #21459799), url({{ asset('public/assets/images/' . $gs->best_icon) }});"
        data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{ $langg->lang12 }}</li>
                        </ol>
                        <h2 class="breadcrumb-title">{{ $langg->lang12 }} -<span
                                onclick="window.location.href='{{ route('front.index', $sign) }}'" style="cursor: pointer;">
                                {{ $langg->lang17 }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Our Story Start ================================== -->
    <section>

        <div class="container">

            <!-- row Start -->
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <div class="story-wrap explore-content">

                        <p class="mt-4">
                            @if ($langg->rtl == 1)
                                {!! $gs->home_about_ar !!}
                            @else
                                {!! $gs->home_about !!}
                            @endif
                        </p>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <img src="{{ asset('public/assets/images/' . $gs->home_about_img1) }}" class="img-fluid rounded"
                        alt="" />
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Our Story End ================================== -->
    <!-- Services Section -->
    <div class="clinet sections">
        <div class="container">
            <div class="index-tit">
                <h4><b>Certif</b>ication</h4>
            </div>

            <div class="owl-carousel owl-theme" id="clinet">

                @foreach ($images as $partner)
                    <div class="item">
                        <img src="{{ asset('public/assets/images/ads/' . $partner->photo) }}" alt="">
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Counter Section -->

    <!-- ============================ Agency List Start ================================== -->
    @include('includes.form')
    <!-- ============================ Agency List End ================================== -->
@stop
