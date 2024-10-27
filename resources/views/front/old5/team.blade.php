@extends('layouts.front')

@section('title')
    {{ $langg->lang18 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/qoudorat/assets/css/lightgallery.css') }}">
@stop





@section('content')


    <div class="page-banner-area" style="background-image:url({{ asset('assets/images/' . $gs->big_icon) }})">
        <div class="container">
            <div class="page-banner-content">
                <h2> {{ $langg->lang18 }}</h2>
                <ul class="pages-list">
                    <li><a href="{{ route('front.index', $sign) }}"> {{ $langg->lang17 }}</a></li>
                    <i class="fad fa-chevron-right"></i>
                    <li> {{ $langg->lang18 }}</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="doctors pb-100 pt-100">
        <div class="container">
            <div class="section_title">
                <h2><span>{{ $langg->lang25 }}</span></h2>
                <p>{{ $langg->lang200 }} </p>
                <div class="divider_effect_section"></div>
            </div>
            <div class="row">

                @foreach ($our_teams as $data)
                    <div class="col-lg-3">
                        <div class="card carda">
                            <img src="{{ asset('assets/images/speakers/' . $data->photo) }}" alt="">
                            <ul class="links">
                                <li><a href="{{ $data->facebook }}"><i class="fab fa-facebook"></i></a></li>
                            </ul>
                            <div class="content">
                                <h6>
                                    @if ($langg->rtl == 1)
                                        {{ $data->title_ar }}
                                    @else
                                        {{ $data->title }}
                                    @endif
                                </h6>
                                <h3>
                                    @if ($langg->rtl == 1)
                                        {{ $data->name_ar }}
                                    @else
                                        {{ $data->name }}
                                    @endif
                                </h3>
                                <div class="brdr"></div>
                                <p>
                                    @if ($langg->rtl == 1)
                                        {{ $data->desc_ar }}
                                    @else
                                        {{ $data->desc }}
                                    @endif
                                </p>
                                {{--  <a href="appointment.html" class="default-btn">More</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@stop
