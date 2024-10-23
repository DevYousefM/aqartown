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
    <!-- ============================ Page Title Start================================== -->
    <section class="breadcrumb-section"
        style="background-image: url({{ asset('assets/images/' . $gs->trending_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>{{ $langg->lang12 }}</h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>{{ $langg->lang12 }}</li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">Absen</span>
        </div>

    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Our Videos Start ================================== -->

    <section class="vedios">
        <div class="container-fluid">
            <div class="sec-title centered">
                <div class="separator"></div>
            </div>
            <div class="row">

                @foreach ($videos as $video)
                    <div class="col-lg-3">
                        {!! $video->link !!} </div>
                @endforeach



            </div>
        </div>
    </section>

    <!-- ============================ Our Videos End ================================== -->
@stop
