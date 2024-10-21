@extends('layouts.front')

@section('title')
    {{ $langg->lang221 }} -
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
    <section class="breadcrumb-section" style="background-image: url(./img/slider/20210428041843_805397.jpg);">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>{{ $langg->lang221 }}</h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>{{ $langg->lang221 }}</li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">Absen</span>
        </div>

    </section>
    <!-- ============================ Page Title End ================================== -->
    <div class="service_details">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="service_details_wraper">
                        <img src="{{ asset('public/assets/images/' . $gs->home_about_img2) }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service_details_wraper">
                        <div class="text-p">
                            <p> {{ $langg->lang39 }} </p>

                        </div>
                        <hr>
                        <p style="
                            line-height: 3;
                        ">
                            {!! $langg->rtl == 1 ? $gs->policy_ar : $gs->policy !!}
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end gallery section -->
@stop
