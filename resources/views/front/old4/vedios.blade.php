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
    <link rel="stylesheet" href="{{ asset('public/assets/Al-Araby/css/lightgallery.css"') }}">
@stop





@section('content')


    <section class="page-title">
        <div class="outer-container">
            <div class="image">
                <img src="{{ asset('public/assets/images/' . $gs->hot_icon) }}" alt="" />
            </div>
        </div>
    </section>
    <section class="page-breadcrumb">
        <div class="image-layer" style="background-image:url({{ asset('public/assets/naglaa/images/background/1.png') }})"></div>
        <div class="container">
            <div class="clearfix">
                <div class="pull-left fll">
                    <h2>{{ $langg->lang223 }}</h2>
                </div>
                <div class="pull-right">
                    <ul class="breadcrumbs">
                        <li class="left-curves"></li>
                        <li class="right-curves"></li>
                        <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }} -</a></li>
                        <li>{{ $langg->lang223 }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="vedios">
        <div class="container">
            <div class="title-box" style="text-align: center;padding: 26px;">
                <h2
                    style="  position: relative;
                            color: #000;
                            font-size: 46px;
                            font-weight: 700;">
                    {{ $langg->lang223 }}</h2>
            </div>

            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-lg-3">
                        {!! $video->link !!}
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@stop
