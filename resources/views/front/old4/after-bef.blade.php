@extends('layouts.front')

@section('title')

    {{ $langg->lang222 }}
    @if ($langg->rtl == 1)
        - {{ $gs->title_ar }}
    @else
        - {{ $gs->title }}
    @endif


@stop


@section('content')
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp



    <section class="page-title">
        <div class="outer-container">
            <div class="image">
                <img src="{{ asset('public/assets/images/' . $gs->new_icon) }}" alt="" />
            </div>
        </div>
    </section>
    <section class="page-breadcrumb">
        <div class="image-layer" style="background-image:url({{ asset('public/assets/naglaa/images/background/1.png') }})"></div>
        <div class="container">
            <div class="clearfix">
                <div class="pull-left fll">
                    <h2>{{ $langg->lang222 }}</h2>
                </div>
                <div class="pull-right">
                    <ul class="breadcrumbs">
                        <li class="left-curves"></li>
                        <li class="right-curves"></li>
                        <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}-</a></li>
                        <li>{{ $langg->lang222 }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="section-md before-after" style="margin-bottom: 20px;">
        <div class="container" style="max-width: 1269px;">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9 aos-init aos-animate" data-aos="fade-right">
                    <div class="section-title text-center">
                        <h2>{{ $langg->lang222 }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($images as $key => $data)
                    <div class="col-md-4 mb-4 aos-init aos-animate"
                        @if ($key == 0) data-aos="fade-left"

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
                        <div class="twentytwenty-wrapper twentytwenty-horizontal">
                            <div class="twentytwenty-container" id="container1" style="height: 300px;">

                                <img src="{{ asset('public/assets/images/ads/' . $data->photo) }}"
                                    class="img-fluid w-100 twentytwenty-before" alt=""
                                    style="clip: rect(0px, 196.5px, 300px, 0px);">
                                <img src="{{ asset('public/assets/images/ads/' . $data->image) }}"
                                    class="img-fluid w-100 twentytwenty-after" alt=""
                                    style="clip: rect(0px, 393px, 300px, 196.5px);">
                                <div class="twentytwenty-overlay">
                                    <div class="twentytwenty-before-label" data-content="{{ $langg->lang38 }}"></div>
                                    <div class="twentytwenty-after-label" data-content="{{ $langg->lang39 }}"></div>
                                </div>
                                <div class="twentytwenty-handle" style="left: 196.5px;"><span
                                        class="twentytwenty-left-arrow"></span><span
                                        class="twentytwenty-right-arrow"></span></div>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </section>



@stop
@section('js')
    <script src="{{ asset('public/assets/naglaa/assets/js/jquery.event.move.js') }}"></script>
    <script src="{{ asset('public/assets/naglaa/assets/js/jquery.twentytwenty.js') }}"></script>
    <script>
        $(window).load(function() {
            $(".twentytwenty-container").twentytwenty();
        });
        $(window).load(function() {
            $("#container2").twentytwenty();
        });
        $(window).load(function() {
            $("#container3").twentytwenty();
        });
        $(window).load(function() {
            $("#container4").twentytwenty();
        });
        $(window).load(function() {
            $("#container5").twentytwenty();
        });
        $(window).load(function() {
            $("#container6").twentytwenty();
        });
    </script>

@stop
