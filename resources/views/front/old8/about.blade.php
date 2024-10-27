@extends('layouts.front')

@section('title')
    {{ $langg->lang223 }} -
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
    <section class="breadcrumb-section" style="background-image: url({{ asset('assets/images/' . $gs->best_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> {{ $langg->lang223 }}</h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> {{ $langg->lang223 }}</li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">Absen</span>
        </div>

    </section>
    <br>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Our Story Start ================================== -->
    <section>

        <div class="container">

            <!-- row Start -->
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <div class="story-wrap explore-content">

                        <p>
                            @if ($langg->rtl == 1)
                                {!! $gs->home_about_ar !!}
                            @else
                                {!! $gs->home_about !!}
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <img src="{{ asset('assets/images/' . $gs->home_about_img1) }}" class="img-fluid rounded"
                        alt="" />
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Our Story End ================================== -->
    <!-- Services Section -->
    <section class="counters">
        <div class="container">
            <div class="sec-heading text-center">
                <h1> {{ $langg->lang40 }}
                </h1>
                <p> {{ $langg->lang46 }}

                </p>
            </div>
            <div class="row">


                @foreach ($counters as $key => $counter)
                    <div class="four col-md-6 col-lg-2 col-sm-6">
                        <div class="counter-box colored"><span class="counter">{{ $counter->value }}

                            </span>
                            <p>{{ $langg->rtl == 1 ? $counter->title_ar : $counter->title }}
                            </p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Counter Section -->



    <!-- ============================ Agency List Start ================================== -->
    @include('includes.form')
    <!-- ============================ Agency List End ================================== -->
@stop

@section('js')

    <script>
        $(document).ready(function() {

            $('.counter').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 8000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

        });
    </script>
@stop
