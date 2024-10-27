@extends('layouts.front')

@section('title')
    {{ $langg->lang1 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/lightgallery.css') }}">

@stop





@section('content')

    <section class="breadcrumb-section"
        style="background-image: url({{ asset('assets/images/' . $gs->trending_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> {{ $langg->lang1 }}
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> {{ $langg->lang1 }}
                </li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>

    <div class="gallery-page">
        <!-- start gallery section -->
        <div class="gallery-section">
            <br>
            <div class="gallery-layout">
                <div class="mfa-gallery">
                    @foreach ($images as $key => $service)
                        <a href="{{ asset('assets/images/banners/' . $service->photo) }}">
                            <div class="img-div lazy-div">
                                <img class="" data-src="{{ asset('assets/images/banners/' . $service->photo) }}"
                                    src="{{ asset('assets/images/banners/' . $service->photo) }}">


                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- end gallery section -->
    </div>
@stop
