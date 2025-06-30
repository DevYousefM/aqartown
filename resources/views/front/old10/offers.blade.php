@extends('layouts.front')

@section('title')
    {{ $langg->lang7 }} -
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

    <!-- end header -->
    <section class="page-title" style="background-image:url({{ asset('public/assets/images/' . $gs->big_icon) }});">
        <div class="auto-container">
            <h1>{{ $langg->lang7 }} </h1>

            <ul class="bread-crumb">
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                <li><a href="#">{{ $langg->lang7 }}</a></li>
            </ul>

        </div>

        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span></div>
        </div>

    </section>

    <!-- start home about section -->
    <secion class="price-packages weight-lifing-outline-bg pt-4 pb-5">
        <div class="container">

            <div class="row">


                @foreach ($offers as $offer)
                    <div class="col-lg-4">
                        <div class="card">
                            <img src="{{ asset('public/assets/images/speakers/' . $offer->photo) }}" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-right"> {{ $langg->rtl == 1 ? $offer->name_ar : $offer->name }}
                                </h5>
                                <p class="sale">
                                    {{ $langg->rtl == 1 ? $offer->title_ar : $offer->title }}
                                </p>
                                <div class="brdr"
                                    style="background-color: #000;width: 100%;height: 0.3px;margin-top: 10px;margin-bottom: 10px;">
                                </div>


                                @if (!empty($offer->desc))
                                    @php
                                        $title = explode(',', $offer->desc);

                                        $title_ar = explode(',', $offer->desc_ar);

                                    @endphp

                                    @foreach ($title as $key => $data1)
                                        <p class="card-text"><i class="fas fa-quote-right"></i>
                                            @if ($langg->rtl == 1)
                                                {{ $title_ar[$key] }}
                                            @else
                                                {{ $title[$key] }}
                                            @endif
                                        </p>
                                    @endforeach
                                @endif



                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach


            </div>
        </div>
    </secion>
    <!-- end home about section -->
    @include('includes.form')
@stop
