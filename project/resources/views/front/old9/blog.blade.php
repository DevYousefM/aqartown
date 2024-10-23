@extends('layouts.front')

@section('title')
    {{ $langg->lang222 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop
@section('css')
    <link href="{{ asset('assets/canbest/css/plugins/bootstrap.min.css') }}" rel="stylesheet">
@stop
@section('content')
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp
    <!-- end header -->
    <section class="page-title" style="background-image:url({{ asset('assets/images/' . $gs->hot_icon) }});">
        <div class="auto-container">
            <h1>{{ $langg->lang222 }}</h1>

            <ul class="bread-crumb">
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                <li><a href="#">{{ $langg->lang222 }}</a></li>
            </ul>

        </div>

        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span>
            </div>
        </div>

    </section>



    <!-- end start blogs section -->
    <div class="blogs-section">
        <div class="container">
            <div class="section-heading">
                <p>
                    {{ $langg->lang222 }}
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
                                        data-src="{{ $blogg->photo ? asset('assets/images/blogs/' . $blogg->photo) : asset('assets/images/noimage.png') }}"
                                        alt="img"
                                        src="{{ $blogg->photo ? asset('assets/images/blogs/' . $blogg->photo) : asset('assets/images/noimage.png') }}">

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


    @include('includes.form')

@stop
