@extends('layouts.front')

@section('title')
    {{ $langg->lang221 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/smilehouse/css/lightgallery.css"') }}">
@stop





@section('content')



    <section class="page-title">
        <div class="outer-container">
            <div class="image">
                <img src="{{ asset('public/assets/images/' . $gs->trending_icon) }}" alt="" />
            </div>
        </div>
    </section>
    <section class="page-breadcrumb">
        <div class="image-layer" style="background-image:url({{ asset('assets/naglaa/images/background/1.png') }})"></div>
        <div class="container">
            <div class="clearfix">
                <div class="pull-left fll">
                    <h2>{{ $langg->lang221 }}</h2>
                </div>
                <div class="pull-right">
                    <ul class="breadcrumbs">
                        <li class="left-curves"></li>
                        <li class="right-curves"></li>
                        <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}-</a></li>
                        <li>{{ $langg->lang221 }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <section class="gallery-section">
        <div class="container">
            <div class="title-box">
                <h2>{{ $langg->lang221 }}</h2>
            </div>
            <div class="row">

                @foreach ($services as $key => $service)
                    <div
                        class="project-block col-lg-4 col-md-6 col-sm-12"@if ($key == 0) data-aos="fade-left"

                    @elseif($key == 1)

                       data-aos="zoom-in"

                       @elseif($key == 2)


                       data-aos="fade-right"
                       @elseif($key == 3)

                       data-aos="fade-left"
                       @elseif($key == 4)
                       data-aos="zoom-in"
                    @else

                    data-aos="fade-right" @endif>
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('public/assets/images/services/' . $service->photo) }}" alt="" />

                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <div class="overlay-content">
                                            <div class="icon-box">
                                                <span class="fas fa-spa"></span>
                                            </div>
                                            <h3><a
                                                    href="#">{{ $langg->rtl == 1 ? $service->name_ar : $service->name }}</a>
                                            </h3>
                                            <a class="plus"
                                                href="{{ asset('public/assets/images/services/' . $service->photo) }}"
                                                data-fancybox="gallery-1" data-caption=""><span
                                                    class="flaticon-plus-symbol"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

@stop
