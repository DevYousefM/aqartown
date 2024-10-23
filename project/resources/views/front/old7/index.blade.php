@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{ asset('assets/images/' . $gs->logo) }}" />
@stop


@section('content')


    <!-- ============================ Hero Banner  Start================================== -->
    <div class="pxp-hero vh-100">
        <div id="pxp-hero-props-carousel-1" class="carousel slide pxp-hero-props-carousel-1" data-ride="carousel"
            data-pause="false" data-interval="7000">
            <div class="carousel-indicators">




                @foreach ($sliders as $k => $slide)
                    @php
                        $galss = str_replace(' ', '%20', $slide->photo);
                    @endphp
                    <div data-target="#pxp-hero-props-carousel-1" data-slide-to="{{ $k }}"
                        class="pxp-cover @if ($k == 0) active @endif ">
                        <img src="{{ asset('/assets/images/sliders/' . $galss) }}" alt="">
                        <p> {{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}</p>
                    </div>
                @endforeach





            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $k => $slide)
                    @php
                        $galss = str_replace(' ', '%20', $slide->photo);
                    @endphp
                    <div class="carousel-item @if ($k == 0) active @endif"
                        data-slide="{{ $k }}">
                        <div class="pxp-hero-bg pxp-cover"
                            style="background-image: url({{ asset('/assets/images/sliders/' . $galss) }});"></div>

                    </div>
                @endforeach

                <!-- <div class="social-media">
                                <a href="#">
                                    <h6>EN</h6>
                                </a>
                                <ul>
                                    <li><a href="#">A <br> R</a></li>


                                </ul>
                            </div> -->

            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->


    <!-- =======================Our Products Start============================ -->

    <div class="services-section">
        <div class="index-tit">
            <h4><b> {{ $langg->lang3 }}</b></h4>
        </div>
        <div class="section-body">
            <ul class="main-section-ul">


                @foreach ($about_uss->take(6) as $k => $about_us)
                    <li>
                        <a href=" {{ route('front.product2', ['slug' => $about_us->slug, 'lang' => $sign]) }}"
                            class="main-flip-card">
                            <div class="card-content">
                                <div class="card-front">
                                    <div class="img-div">
                                        <img src="{{ asset('assets/images/brands/' . $about_us->photo) }}"
                                            alt="img">
                                    </div>
                                    <div class="title">
                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ $about_us->title_ar }}
                                            @else
                                                {{ $about_us->title }}
                                            @endif

                                            <br>
                                            <span>
                                                @if ($langg->rtl == 1)
                                                    {{ $about_us->name_ar }}
                                                @else
                                                    {{ $about_us->name }}
                                                @endif
                                            </span>
                                        </p>

                                    </div>
                                    <div class="spans">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="text">
                                        <span>
                                            @if ($langg->rtl == 1)
                                                {{ $about_us->title_ar }}
                                            @else
                                                {{ $about_us->title }}
                                            @endif
                                        </span>
                                        <p>

                                            @if ($langg->rtl == 1)
                                                {{ $about_us->name_ar }}
                                            @else
                                                {{ $about_us->name }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="read-more">
                                        <span>
                                            <i class="linearicons-magnifier"></i>
                                            {{ $langg->lang6 }}
                                        </span>
                                    </div>
                                    <div class="spans">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- =======================Our Products End============================ -->

    <div class="papri-team-typ-1-wraper pt-100 pb-70">
        <div class="container-fluid">
            <div class="index-tit">
                <h4><b>{{ $langg->lang11 }}</b></h4>
            </div>
            <div class="row">

                @foreach ($categories->take(6) as $key => $category)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <a
                            href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                                  @else
                                            
                                                {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                            <div class="single-team-typ-1-wraper">
                                <img src="{{ asset('assets/images/categories/' . $category->photo) }}"
                                    alt="img">
                                <div class="team-typ-1-hvr text-white">
                                    <p>
                                        @if ($langg->rtl == 1)
                                            {{ $category->name_ar }}
                                        @else
                                            {{ $category->name }}
                                        @endif​​
                                    </p>
                                </div>
                                <h5 class="brand-title text-center black p-2">
                                    @if ($langg->rtl == 1)
                                        {{ $category->name_ar }}
                                    @else
                                        {{ $category->name }}
                                    @endif​​
                                </h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <!-- ============================ Agency List Start ================================== -->


    <div class="home-centers-section">


        <div class="section-wrapper">
            <div class="index-tit">
                <h4><b>{{ $langg->lang7 }}</b></h4>
            </div>
            <div class="section-body">
                <ul class="main-section-ul">

                    @foreach ($blogs->take(6) as $blogg)
                        <li>
                            <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                <div class="img-div">
                                    <img src="{{ $blogg->photo ? asset('assets/images/blogs/' . $blogg->photo) : asset('assets/images/noimage.png') }}"
                                        alt="img">
                                </div>
                                <div class="body">
                                    <div class="name">
                                        <i class="linearicons-apartment"></i>
                                        <span>
                                            @if ($langg->rtl == 1)
                                                {{ strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar, 0, 50) . '...' : $blogg->title_ar }}
                                            @else
                                                {{ strlen($blogg->title) > 50 ? substr($blogg->title, 0, 50) . '...' : $blogg->title }}
                                            @endif
                                        </span>
                                        <br>
                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ substr(strip_tags($blogg->details_ar), 0, 120) }}
                                            @else
                                                {{ substr(strip_tags($blogg->details), 0, 120) }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="read-more">
                                        <span>
                                            {{ $langg->lang6 }}
                                        </span>
                                        <i class="linearicons-chevron-left"></i>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <!-- ============================ Agency List End ================================== -->


@stop
