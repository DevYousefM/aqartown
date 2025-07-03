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
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/qoudorat/assets/css/lightgallery.css') }}">

@stop





@section('content')



    <div class="page-banner-area"
        style="background-image:url({{ asset(access_public() . 'assets/images/' . $gs->trending_icon) }})">
        <div class="container">
            <div class="page-banner-content">
                <h2>{{ $langg->lang221 }}</h2>
                <ul class="pages-list">
                    <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                    <i class="fad fa-chevron-right"></i>
                    <li>{{ $langg->lang221 }}</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="gallery-pgae">
        <!-- start gallery section -->
        <div class="home-gallery-section">
            <div class="section_title">
                <h1>{{ $langg->lang221 }}</h1>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy. </p> -->
                <div class="divider_effect_section"></div>
            </div>
            <div class="gallery-layout">
                <div class="home-light-gallery">
                    @foreach ($services as $key => $service)
                        <a href="{{ asset(access_public() . 'assets/images/services/' . $service->photo) }}">
                            <img src="{{ asset(access_public() . 'assets/images/services/' . $service->photo) }}">
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- end gallery section -->
    </div>
@stop

@section('js')

    <script src="{{ asset(access_public() . 'assets/qoudorat/assets/js/lightgallery.js') }}"></script>

    <script src="{{ asset(access_public() . 'assets/qoudorat/assets/js/lg-thumbnail.umd.js') }}"></script>


    <script>
        if (document.querySelector('.home-light-gallery')) {
            lightGallery(document.querySelector('.home-light-gallery'), {
                thumbnail: true
            });
        }
    </script>
@stop
