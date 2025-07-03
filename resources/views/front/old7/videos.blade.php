@extends('layouts.front')

@section('title')
    @if ($type == 'product')
        {{ $langg->lang223 }} -
    @else
        {{ $langg->lang20 }} -
    @endif

    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/Al-Araby/css/lightgallery.css"') }}">
@stop





@section('content')

    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp

    <!-- ============================ Page Title Start================================== -->
    <div class="page-title"
        style="background:linear-gradient(#21459799, #21459799), url({{ asset(access_public() . 'assets/images/' . $gs->trending_icon) }});"
        data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                @if ($type == 'product')
                                    {{ $langg->lang223 }}
                                @else
                                    {{ $langg->lang20 }}
                                @endif
                            </li>
                        </ol>
                        <h2 class="breadcrumb-title">
                            @if ($type == 'product')
                                {{ $langg->lang223 }}
                            @else
                                {{ $langg->lang20 }}
                            @endif -
                            <span onclick="window.location.href='{{ route('front.index', $sign) }}'"
                                style="cursor: pointer;"> {{ $langg->lang17 }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
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
                        {!! $video->link !!}

                    </div>
                @endforeach




            </div>
        </div>
    </section>

    <!-- ============================ Our Videos End ================================== -->


    <!-- ============================ Agency List Start ================================== -->
    @include('includes.form')
@stop
