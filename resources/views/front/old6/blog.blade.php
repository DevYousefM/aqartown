@extends('layouts.front')

@section('title')
    {{ $langg->lang222 }} -
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


    <section class="breadcrumb-section"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->hot_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> {{ $langg->lang222 }}
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> {{ $langg->lang222 }}
                </li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>

    <!-- end start blogs section -->
    <div class="blogs-section blog-page">
        <div class="container">
            <div class="section-heading">
                <p>
                    {{ $langg->lang36 }}
                </p>
            </div>

            <div class="section-body">
                <ul class="main-ul">

                    @foreach ($blogs as $blogg)
                        <li>
                            <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}"
                                class="blog-card">
                                <div class="img-div lazy-div">
                                    <img class=""
                                        data-src="{{ $blogg->photo ? asset(access_public() . 'assets/images/blogs/' . $blogg->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                        alt="img"
                                        src="{{ $blogg->photo ? asset(access_public() . 'assets/images/blogs/' . $blogg->photo) : asset(access_public() . 'assets/images/noimage.png') }}">

                                </div>
                                <p class="blog-title">

                                    @if ($langg->rtl == 1)
                                        {{ $blogg->title_ar }}
                                    @else
                                        {{ $blogg->title }}
                                    @endif
                                </p>
                            </a>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
    </div>
    <!-- end start blogs section -->
@stop
