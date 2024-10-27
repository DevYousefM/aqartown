@extends('layouts.front')

@section('title')
    {{ $langg->lang223 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/lightgallery.css"') }}">
@stop





@section('content')

    <!--============= Start breadvroumb =============-->

    <div class="breadvroumb_area" style="background-image: url({{ asset('assets/images/' . $gs->hot_icon) }});">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1>{{ $langg->lang223 }}</h1>
                    <div class="breadcroumb_link">
                        <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }} </a>/ {{ $langg->lang223 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= End breadvroumb =============-->

    <section class="vedios">
        <div class="container">
            <div class="sec-title centered">
                <h2>{{ $langg->lang223 }}</h2>
                <div class="separator"></div>
            </div>
            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-lg-3">
                        {!! $video->link !!}
                    </div>
                @endforeach
            </div>
    </section>

@stop
