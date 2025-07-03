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



    <!-- =====slider home ===== -->
    <!-- Main Slider -->
    <section class="breadcrumb-area"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->top_icon) }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title float-right">
                            <h2>{{ $langg->lang18 }} </h2>
                        </div>
                        <div class="breadcrumb-menu float-left">
                            <ul class="clearfix">
                                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active">{{ $langg->lang18 }} </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--Start About Area-->
    <div class="gallery-page">
        <!-- start gallery section -->
        <div class="gallery-section">
            <div class="gallery-layout">
                <div class="mfa-gallery">
                    @foreach ($images as $key => $service)
                        <a href="{{ asset(access_public() . 'assets/images/banners/' . $service->photo) }}">
                            <div class="img-div lazy-div">
                                <img class="lazy"
                                    data-src="{{ asset(access_public() . 'assets/images/banners/' . $service->photo) }}" />
                                <div class="next-lazy-img"></div>
                            </div>
                        </a>
                    @endforeach


                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- end gallery section -->

    <!--End About Area-->
@stop
