@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{ asset('public/assets/images/' . $gs->logo) }}" />
@stop

@section('content')
    @if (!empty($sliders))
        <section>
            <div class="w-100 position-relative">
                <div class="feat-wrap2 position-relative w-100">
                    <div class="feat-caro2 w-100">

                        @foreach ($sliders as $slide)
                            @php
                                $galss = str_replace(' ', '%20', $slide->photo);
                            @endphp




                            <div class="feat-item2 position-relative d-block w-100">
                                <div class="feat-img position-relative d-block w-100"
                                    style="background-image: url({{ asset('/public/assets/images/sliders/' . $galss) }});">
                                </div>
                                <div
                                    class="feat-cap2-wrap text-center d-flex flex-wrap justify-content-center position-absolute w-100">
                                    <div class="feat-cap2 d-inline-block w-100">

                                        @if (!empty($slide->subtitle_text) || !empty($slide->subtitle_text_ar))
                                            <h2 class = "mb-0">
                                                {{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}
                                            </h2>
                                        @endif
                                        @if (!empty($slide->title_text) || !empty($slide->title_text_ar))
                                            <p class="mb-0">
                                                {{ $langg->rtl == 1 ? $slide->title_text_ar : $slide->title_text }}</p>
                                        @endif
                                        @if (!empty($slide->details_text) || !empty($slide->details_text_ar))
                                            <span
                                                class="feat-cap-time d-block">{{ $langg->rtl == 1 ? $slide->details_text_ar : $slide->details_text }}</span>
                                        @endif
                                        @if (!empty($slide->btn_text) || !empty($slide->btn_text_ar))
                                            <a class="thm-btn v2 thm-bg brd-rd5 position-relative d-inline-block overflow-hidden"
                                                href="{{ $slide->link }}"
                                                title="">{{ $langg->rtl == 1 ? $slide->btn_text_ar : $slide->btn_text }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (!empty($gs->percent_title) && !empty($gs->percent_title_ar))
        @php
            $title = explode(',', $gs->percent_title);

            $title_ar = explode(',', $gs->percent_title_ar);

        @endphp
        <section>
            <div class="w-100 position-relative">
                <div class="container">
                    <div class="special-wrap res-row brd-rd5 overflow-hidden overlap140 overlap-85 w-100 wide-sec">
                        <div class="row mrg">

                            @foreach ($title as $key => $data1)
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="special-box z1 scndry-bg grad-bg2 d-flex position-relative flex-wrap w-100">
                                        @if ($key == 0)
                                            <i class="flaticon-first-aid-kit d-inline-block"></i>
                                        @elseif($key == 1)
                                            <i class="flaticon-brain d-inline-block"></i>
                                        @else
                                            <i class="flaticon-pharmacy d-inline-block"></i>
                                        @endif
                                        <div class="special-box-inner">
                                            <h4 class = "mb-0"> {{ $langg->rtl == 1 ? $title_ar[$key] : $title[$key] }}</h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section>
        <div class="w-100 pt-100 gray-layer opc95 pb-100 position-relative">
            <div class="fixed-bg"
                style="background-image: url({{ asset('public/assets/images/' . $gs->about_background) }});"></div>
            <div class="container">
                <div class="about-wrap2 position-relative w-100">
                    <div class="row mrg30">
                        <div class="col-md-12 col-sm-12 col-lg-6 order-lg-1">
                            <div class="about-gal w-100">
                                <div class="row align-items-end mrg20">
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                                            <a href="{{ asset('public/assets/images/' . $gs->home_about_img1) }}"
                                                data-fancybox="gallery" title=""><img class="img-fluid w-100"
                                                    src="{{ asset('public/assets/images/' . $gs->home_about_img1) }}"
                                                    alt="About Gallery Image 1"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                                            <a href="{{ asset('public/assets/images/' . $gs->home_about_img2) }}"
                                                data-fancybox="gallery" title=""><img class="img-fluid w-100"
                                                    src="{{ asset('public/assets/images/' . $gs->home_about_img2) }}"
                                                    alt="About Gallery Image 2"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mrg20">
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div
                                            class="about-gal-img brd-rd10 brd-rd10 overflow-hidden position-relative w-100">
                                            <a href="{{ asset('public/assets/images/' . $gs->home_about_img3) }}"
                                                data-fancybox="gallery" title=""><img class="img-fluid w-100"
                                                    src="{{ asset('public/assets/images/' . $gs->home_about_img3) }}"
                                                    alt="About Gallery Image 3"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                                            <a class="about-play-btn spinner thm-clr rounded-circle"
                                                href="{{ asset('public/assets/images/' . $gs->home_about_link) }}"
                                                data-fancybox title=""><i class="fas fa-play-circle"></i></a>
                                            <img class="img-fluid w-100"
                                                src="{{ asset('public/assets/images/' . $gs->home_about_img4) }}"
                                                alt="About Gallery Image 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-6">
                            <div class="about-desc w-100">
                                <h2 class="mb-0 sub-title"><i class="fab fa-slack"></i> {{ $langg->lang1 }}
                                </h2>
                                <p class="mb-0"> {!! $langg->rtl == 1 ? $gs->home_about_ar : $gs->home_about !!}</p>
                                <p class="mb-0"></p>
                                <!-- <span class="about-time d-block"><span class="thm-clr"><i class="flaticon-clock"></i>Visit Schedule:</span> Every Week Monday To Friday: 9:00am to 5:00pm</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-200 white-layer opc95 pb-100 position-relative">
            <div class="fixed-bg"
                style="background-image: url({{ asset('public/assets/images/' . $gs->service_background) }});"></div>
            <div class="container">
                <div
                    class="sec-title sec-title-with-btns d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="sec-title-btns d-inline-flex flex-wrap align-items-center">
                        <a class="thm-btn v2 thm-bg brd-rd5 d-inline-block position-relative overflow-hidden"
                            href="{{ route('front.contact', $sign) }}" title="">{{ $langg->lang12 }}</a>
                    </div>
                    <div class="sec-title-inner">
                        <span class="position-relative thm-clr sub-shap v2 thm-shp d-block">{{ $langg->lang4 }}</span>
                        <h2 class = "mb-0">{{ $langg->lang5 }} </h2>
                        <p class="mb-0">{{ $langg->lang9 }}</p>
                    </div>

                </div>
                <div class="serv-wrap2 res-row position-relative w-100">
                    <div class="row mrg30">

                        @foreach ($categories as $category)
                            <div class="col-md-7 col-sm-6 col-lg-4">
                                <div class="serv-box2 v2 position-relative w-100">
                                    <div class="serv-img2 brd-rd10 position-relative overflow-hidden w-100">
                                        <img class="img-fluid w-100"
                                            src="{{ asset('public/assets/images/categories/' . $category->photo) }}"
                                            alt="{{ $category->name_ar }}">
                                        <a class="position-absolute"
                                            href="{{ $langg->rtl == 1 ? route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) : route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}"
                                            title=""><i class="flaticon-plus"></i></a>
                                    </div>
                                    <div class="serv-info2 w-100 position-absolute">
                                        <h3 class="mb-0">
                                            @if ($langg->rtl == 1)
                                                <a
                                                    href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}">
                                                    {{ $category->name_ar }}</a>
                                            @else
                                                <a
                                                    href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}">
                                                    {{ $category->name }}</a>
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="col-md-7 col-sm-6 col-lg-4">
                                        <a class="simple-link thm-clr d-inline-block" href="services.html" title="">خدمات اخرى<i class="fas fa-caret-right"></i></a>

                                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($gs->multiple_packaging == 1)
        <section>
            <div class="w-100 pt-20 thm-bg pb-70 position-relative">
                <div class="container">
                    <div class="facts-wrap v2 position-relative w-100 wide-sec2">
                        <ul
                            class="facts-list d-flex flex-wrap align-items-center justify-content-between position-relative mb-0 list-unstyled">


                            @foreach ($counters as $key => $counter)
                                <li>
                                    <div class="fact-box v2 position-relative d-flex flex-wrap w-100">
                                        @if ($key == 0)
                                            <i class="flaticon-lifeline-in-a-heart-outline d-inline-block"></i>
                                        @elseif($key == 1)
                                            <i class="flaticon-sexual-health d-inline-block"></i>
                                        @else
                                            <i class="flaticon-brain-1 d-inline-block"></i>
                                        @endif

                                        <div class="fact-box-inner">
                                            <span class="scndry-clr d-block"><i
                                                    class="counter">{{ $counter->value }}</i></span>
                                            <h4 class="mb-0">
                                                {{ $langg->rtl == 1 ? $counter->title_ar : $counter->title }}</h4>
                                            <!-- <p class="mb-0">هناك حقيقة مثبتة</p> -->
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section>
        <div class="w-100 pt-90 position-relative">
            <div class="container">
                <div class="sec-title v2 text-center w-100">
                    <div class="sec-title-inner d-inline-block">
                        <h2 class="mb-0 text-color3">{{ $langg->lang10 }}</h2>
                        <p class="mb-0 position-relative sub-shap v2 thm-shp d-inline-block">{{ $langg->lang14 }}</p>
                    </div>
                </div>
                @foreach ($works as $key => $work)
                    <div class="live-video-wrap overlap-210 position-relative w-100">
                        <div class="live-video-inner position-relative w-100">
                            <span
                                class="thm-bg rounded-pill position-absolute z2">{{ $langg->rtl == 1 ? $work->name_ar : $work->name }}</span>
                            <div class="live-video-img z1 brd-rd10 position-relative overflow-hidden w-100">
                                <img class="img-fluid w-100"
                                    src="{{ asset('public/assets/images/gallery/' . $work->photo) }}"
                                    alt="{{ $langg->rtl == 1 ? $work->name_ar : $work->name }}">
                                <a class="position-absolute spinner rounded-circle" href="{{ $work->auther }}"
                                    data-fancybox title=""><i class="fas fa-play-circle"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    @include('includes.form')


    <section class="container">
        {!! $ps->map !!}
    </section>
@stop
