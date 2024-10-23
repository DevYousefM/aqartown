@extends('layouts.front')

@section('title')
    {{ $langg->lang2 }} -
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


    <section class="breadcrumb-section"
        style="background-image: url({{ asset('assets/images/' . $gs->trending_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> {{ $langg->lang2 }}
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> {{ $langg->lang2 }}
                </li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>

    <section class="vedios">

        <div class="container">
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
