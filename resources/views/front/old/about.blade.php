@extends('layouts.front')

@section('title')
    {{ $langg->lang16 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('content')


    <section>
        <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('public/assets/images/' . $gs->best_icon) }});"></div>
            <div class="container">
                <div class="page-title-inner d-inline-block">
                    <h1 class="mb-0">{{ $langg->lang16 }}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}"
                                title="">{{ $langg->lang17 }}</a></li>
                        <li class="breadcrumb-item active">{{ $langg->lang16 }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- Page Title Wrap -->
    </section>
    <section>
        <div class="container">
            <div class="col-md-12">
                <h2 class="caption" style="text-align: center;padding-top: 4rem;color: #000;">{{ $langg->lang9 }}</h2>
            </div><!-- /.col-md-12 -->
        </div>
        <div class="w-100 pt-140 pb-120 position-relative">
            <div class="container">
                <div class="event-wrap w-100">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12    ">

                            @if ($langg->rtl == 1)
                                {!! $gs->policy_ar !!}
                            @else
                                {!! $gs->policy !!}
                            @endif
                        </div>

                    </div>
                </div><!-- Event Wrap -->
            </div>
        </div>
    </section>


    <section>
        @foreach ($about_uss as $k => $about_us)
            @if ($k % 2)
                <div class="w-100 pt-140 pb-120 position-relative">
                    <div class="container">

                        <div class="about-wrap2 w-100">

                            <div class="row align-items-center">
                                <div class="col-md-12 col-sm-12 col-lg-6">
                                    <div class="about-desc3 w-100">
                                        <div class="sec-title mb-25 w-100">
                                            <div class="sec-title-inner pt-0 d-inline-block">
                                                <span class="d-block thm-clr">
                                                    @if ($langg->rtl == 1)
                                                        {{ $about_us->title_ar }}
                                                    @else
                                                        {{ $about_us->title }}
                                                    @endif

                                                </span>

                                                <h3 class="mb-0">
                                                    @if ($langg->rtl == 1)
                                                        {{ $about_us->name_ar }}
                                                    @else
                                                        {{ $about_us->name }}
                                                    @endif
                                                </h3>
                                            </div>
                                        </div><!-- Sec Title -->
                                        <p class="mb-0">
                                            @if ($langg->rtl == 1)
                                                {!! $about_us->meta_description_ar !!}
                                            @else
                                                {!! $about_us->meta_description !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-6">
                                    <div class="about-img style2">
                                        @if (!empty($about_us->video))
                                            <a class="d-inline-block position-absolute play-btn" data-fancybox
                                                href="{{ $about_us->video }}" title="Video">
                                                <svg version="1.1" class="play" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    height="10rem" width="10rem" viewBox="0 0 100 100"
                                                    enable-background="new 0 0 100 100" xml:space="preserve">
                                                    <path class="stroke-dotted" fill="none" stroke="#fff"
                                                        d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7 C97.3,23.7,75.7,2.3,49.9,2.5">
                                                    </path>
                                                    <path class="icon" fill="#fff"
                                                        d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                        <img class="img-fluid w-100"
                                            src="{{ asset('public/assets/images/brands/' . $about_us->photo) }}"
                                            alt="{{ $about_us->name }}">
                                    </div>
                                </div>

                            </div>

                        </div><!-- About Wrap -->

                    </div>
                </div>
            @else
                <div class="w-100 pt-140 pb-120 position-relative">
                    <div class="container">

                        <div class="about-wrap2 w-100">

                            <div class="row align-items-center">
                                <div class="col-md-12 col-sm-12 col-lg-6">
                                    <div class="about-img style2">
                                        @if (!empty($about_us->video))
                                            <a class="d-inline-block position-absolute play-btn" data-fancybox
                                                href="{{ $about_us->video }}" title="Video">
                                                <svg version="1.1" class="play" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    height="10rem" width="10rem" viewBox="0 0 100 100"
                                                    enable-background="new 0 0 100 100" xml:space="preserve">
                                                    <path class="stroke-dotted" fill="none" stroke="#fff"
                                                        d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7 C97.3,23.7,75.7,2.3,49.9,2.5">
                                                    </path>
                                                    <path class="icon" fill="#fff"
                                                        d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif
                                        <img class="img-fluid w-100"
                                            src="{{ asset('public/assets/images/brands/' . $about_us->photo) }}"
                                            alt="{{ $about_us->name }}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-6">
                                    <div class="about-desc3 w-100">
                                        <div class="sec-title mb-25 w-100">
                                            <div class="sec-title-inner pt-0 d-inline-block">
                                                <span class="d-block thm-clr">
                                                    @if ($langg->rtl == 1)
                                                        {{ $about_us->title_ar }}
                                                    @else
                                                        {{ $about_us->title }}
                                                    @endif

                                                </span>

                                                <h3 class="mb-0">
                                                    @if ($langg->rtl == 1)
                                                        {{ $about_us->name_ar }}
                                                    @else
                                                        {{ $about_us->name }}
                                                    @endif
                                                </h3>
                                            </div>
                                        </div><!-- Sec Title -->
                                        <p class="mb-0">
                                            @if ($langg->rtl == 1)
                                                {!! $about_us->meta_description_ar !!}
                                            @else
                                                {!! $about_us->meta_description !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div><!-- About Wrap -->

                    </div>
                </div>
            @endif
        @endforeach
    </section>

    <!-- Our team Section -->
    <section id="team" class="team content-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2>{{ $langg->lang10 }}</h2>
                    <h3 class="caption gray">{{ $langg->lang14 }}</h3>
                </div><!-- /.col-md-12 -->

                <div class="container">
                    <div class="row">
                        @foreach ($our_teams as $k => $data)
                            <div class="col-md-4">
                                <div class="team-member">
                                    <figure style="
    height: 345px;
">
                                        <img src="{{ asset('public/assets/images/services/' . $data->photo) }}"
                                            alt="" class="img-responsive">
                                        <figcaption>
                                            <p>
                                                @if ($langg->rtl == 1)
                                                    {!! $data->details_ar !!}
                                                @else
                                                    {!! $data->details !!}
                                                @endif
                                            </p>
                                            <ul>
                                                @if (!empty($data->facebook))
                                                    <li><a href=" {!! $data->facebook !!}"><i style="
    color: wheat;
"
                                                                class="fab fa-facebook-f"></i></a></li>
                                                @endif
                                                @if (!empty($data->twiter))
                                                    <li><a href=" {!! $data->twiter !!}"><i
                                                                style="
    color: wheat;
"class="fab fa-twitter"></i></a>
                                                    </li>
                                                @endif
                                                @if (!empty($data->linkedin))
                                                    <li><a href=" {!! $data->linkedin !!}"><i
                                                                style="
    color: wheat;
"class="fab fa-linkedin"></i></a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <h4>
                                        @if ($langg->rtl == 1)
                                            {!! $data->name_ar !!}
                                        @else
                                            {!! $data->name !!}
                                        @endif
                                    </h4>
                                    <p>
                                        @if ($langg->rtl == 1)
                                            {!! $data->title_ar !!}
                                        @else
                                            {!! $data->title !!}
                                        @endif
                                    </p>
                                </div><!-- /.team-member-->
                            </div><!-- /.col-md-4 -->
                        @endforeach


                    </div><!-- /.row -->
                </div><!-- /.container -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.our-team -->

    <section>
        <div class="w-100 pt-120 pb-90 position-relative">
            <div class="container">
                <div class="sponsors-wrap w-100">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="sec-title mb-40 w-100">
                                <div class="sec-title-inner pt-0 d-inline-block">
                                    <span class="d-block thm-clr">{{ $langg->lang15 }}</span>
                                    <h3 class="mb-0">{{ $langg->lang25 }}</h3>
                                </div>
                            </div><!-- Sec Title -->
                        </div>

                        @foreach ($sponsers as $data)
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class=" text-center mb-30 w-100">
                                    <a href="javascript:void(0);" title=""><img class="img-fluid"
                                            src="{{ asset('public/assets/images/ads/' . $data->photo) }}"
                                            alt="Sponsor Image 1"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- Sponsors Wrap -->
            </div>
        </div>
    </section>

@stop
