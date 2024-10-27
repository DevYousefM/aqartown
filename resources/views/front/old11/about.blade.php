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

    @endphp

    <!-- =====slider home ===== -->
    <!-- Main Slider -->
    <section class="breadcrumb-area" style="background-image: url({{ asset('public/assets/images/' . $gs->feature_icon) }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title float-right">
                            <h2>{{ $langg->lang16 }}</h2>
                        </div>
                        <div class="breadcrumb-menu float-left">
                            <ul class="clearfix">
                                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active">{{ $langg->lang16 }} </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--Start About Area-->
    <div class="about-area pt-80 pb-50 theme-bg-dark">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 offset-lg-1 mb-30">
                    <div class="about-content">
                        <div class="about-content-text">
                            <!-- <h6>About Us</h6> -->
                            @if ($langg->rtl == 1)
                                {!! $gs->management_ar !!}
                            @else
                                {!! $gs->management !!}
                            @endif

                            <!-- <p>Lorem ipsum dolor eletum nulla eu placerat felis etiam tincidunt tiam tincidunt orci lacus id varius dolor fermum sit amet orem ipsum dolor eletum nulla eu placerat felis etiam tincidunt lacus id varius dolor fermum sit amet.</p> -->
                            {{--
                                <a href="#" class="btn-style-1 mt-20">اكتشف مجموعتنا</a>
--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img-wrapper">
                        <div class="row align-items-center">

                            <div class="col-lg-7 mb-30">
                                <div class="about-images-2">
                                    <img src="{{ asset('public/assets/images/' . $gs->home_about_img2) }}" alt=""> <a
                                        href="{{ $gs->home_about_link }}" class="video-btn venobox vbox-item"
                                        data-autoplay="true" data-vbtype="video"> <i class="fa fa-play"></i> <span>Play
                                            Video</span> </a>
                                </div>
                                <div class="about-images-3 mt-30"> <img
                                        src="{{ asset('public/assets/images/' . $gs->home_about_img4) }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5 mb-30">
                                <div class="about-images-1"> <img
                                        src="{{ asset('public/assets/images/' . $gs->home_about_img5) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End About Area-->

@stop
