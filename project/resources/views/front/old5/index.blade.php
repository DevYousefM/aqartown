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
    <div class="home-slides owl-carousel owl-theme">

        @foreach ($sliders as $slide)
            @php
                $galss = str_replace(' ', '%20', $slide->photo);
            @endphp
            <div class="main-slides-item item-bg4"
                style="background-image: url({{ asset('/assets/images/sliders/' . $galss) }});">
                <div class="container">
                    <div class="main-slides-content">
                        <!-- <span class="sub-title">
                            <i class="flaticon-hashtag-symbol"></i>
                            Keeping Teeth Clean
                        </span> -->
                        @if (!empty($slide->subtitle_text) || !empty($slide->subtitle_text_ar))
                            <h1> <span>{{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}</span>
                            </h1>
                        @endif
                        <p>{{ $langg->rtl == 1 ? $slide->title_text_ar : $slide->title_text }}</p>
                        @if (!empty($slide->btn_text) || !empty($slide->btn_text_ar))
                            <div class="slides-btn">
                                <a href="{{ $slide->link }}"
                                    class="default-btn">{{ $langg->rtl == 1 ? $slide->btn_text_ar : $slide->btn_text }}</a>
                                <!-- <a href="dentist.html" class="optional-btn">Consult A Dentist</a> -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach


    </div>

    <section class="features-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-features">
                        <div class="content">

                            <h3>
                                <a href="#"> {{ $langg->lang6 }}</a>
                            </h3>
                            <p> {{ $langg->lang7 }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-features bg-f57e57">
                        <div class="content">

                            <h3>
                                <a href="#"> {{ $langg->lang8 }}</a>
                            </h3>
                            <p> {{ $langg->lang41 }}</p>
                        </div>
                    </div>
                </div>
                @if (!empty($gs->percent_title))
                    @php
                        $title = explode(',', $gs->percent_title);

                        $title_ar = explode(',', $gs->percent_title_ar);

                    @endphp
                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                        <div class="single-features bg-4a6577">
                            <div class="content">

                                <h3>
                                    <a href="#">{{ $langg->lang53 }}</a>
                                </h3>
                                <p>
                                    @foreach ($title as $key => $data1)
                                        <span class="cmsmasters_homepage_fb_opening_item"
                                            style="color: #ffffff;">{{ $title[$key] }}
                                            <span class="align-right"> {{ $title_ar[$key] }}</span></span>
                                    @endforeach


                                </p>
                            </div>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </section>
    <section class="section_padding about_us_area" data-scroll-index="1">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="section_title">
                        <h2><span>{{ $langg->lang35 }}</span></h2>
                        <p>{{ $langg->lang36 }} </p>
                        <div class="divider_effect_section"></div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about_content">
                        <h3>{{ $langg->lang37 }}</h3>
                        <p>
                            @if ($langg->rtl == 1)
                                {!! $gs->home_about_ar !!}
                            @else
                                {!! $gs->home_about !!}
                            @endif
                        </p>
                        <a href="{{ route('front.about', $sign) }}" class="about_btn">{{ $langg->lang38 }} </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about_bg"
                        style="background-image: url({{ asset('public/assets/images/' . $gs->home_about_img1) }});"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="callus m-auto">
        <div class="container" style="background-color: #3d3d3c;border-radius: 25px 25px 25px 25px;">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="content">
                                <h3>{{ $langg->lang39 }} </h3>
                                <p>{{ $langg->lang4 }}</p>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="carl">
                                <a href="tel:{{ $ps->phone }}"
                                    class="elementor-button-link elementor-button elementor-size-md" role="button">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text">{{ $langg->lang5 }} {{ $ps->phone }}</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="services bg-eef9ff pt-100 pb-70">
        <div class="container">
            <div class="section_title">
                <h2> <span> {{ $langg->lang9 }}</span></h2>
                <p>{{ $langg->lang10 }} </p>
                <div class="divider_effect_section"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 p-0">
                    <h1>{{ $langg->lang14 }} </h1>
                    <p>{{ $langg->lang15 }}</p>
                </div>
                <div class="col-lg-3 imag p-0">
                </div>
                @foreach ($categories->take(8) as $key => $category)
                    <div class="col-lg-3  p-0">
                        <a
                            href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                                  @else
                                            
                                                {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                            <div
                                class="boxmoth boxmoth-1"style="background-image: url({{ asset('public/assets/images/categories/' . $category->photo) }});">
                                <h6>0{{ $key + 1 }}.</h6>
                                <h5>
                                    @if ($langg->rtl == 1)
                                        {{ $category->name_ar }}
                                    @else
                                        {{ $category->name }}
                                    @endif​
                                </h5>
                                <p>
                                    @if ($langg->rtl == 1)
                                        {{ $category->meta_description_ar }}
                                    @else
                                        {{ $category->meta_description }}
                                    @endif​
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach


                <div class="col-lg-6 p-0">
                    <div class="back">
                        <span class="elementor-icon-list-text">{{ $langg->lang19 }}</span>
                        <h3><a href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="doctors pt-100">
        <div class="container">
            <div class="section_title">
                <h2><span>{{ $langg->lang25 }}</span></h2>
                <p>{{ $langg->lang200 }}</p>
                <div class="divider_effect_section"></div>
            </div>
            <div class="row">


                @foreach ($our_teams->take(5) as $data)
                    <div class="col-lg-3">
                        <div class="card carda">
                            <img src="{{ asset('public/assets/images/speakers/' . $data->photo) }}" alt="">
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
                                <!-- <a href="appointment.html" class="default-btn">More</a> -->
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>


    <section class="cust-happy  ptb-100">
        <div class="container">
            <div class="section_title">
                <h2> <span>{{ $langg->lang230 }}</span></h2>
                <p>{{ $langg->lang201 }}</p>
                <div class="divider_effect_section"></div>
            </div>
            <div class="row">

                @foreach ($reviews as $review)
                    <div class="col-lg-6">
                        <div class="card">
                            <img width="450" height="450"
                                src="{{ asset('public/assets/images/reviews/' . $review->photo) }}"
                                class="attachment-full size-full" alt="" loading="lazy"
                                srcset="{{ asset('public/assets/images/reviews/' . $review->photo) }} 450w, {{ asset('public/assets/images/reviews/' . $review->photo) }} 300w, {{ asset('public/assets/images/reviews/' . $review->photo) }} 150w, {{ asset('public/assets/images/reviews/' . $review->photo) }} 400w"
                                sizes="(max-width: 450px) 100vw, 450px">
                            <div class="content">
                                <p>{!! $langg->rtl == 1 ? $review->details_ar : $review->details !!}</p>
                                <h4>{{ $langg->rtl == 1 ? $review->title_ar : $review->title }}</h4>
                                <div class="rate">

                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- blog area start -->
    <section class="blog__area">
        <div class="blog-area ptb-100">
            <div class="container">
                <div class="section_title">
                    <h2><span>{{ $langg->lang202 }}</span></h2>
                    <p>{{ $langg->lang203 }}</p>
                    <div class="divider_effect_section"></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-slider owl-carousel owl-theme">


                            @foreach ($blogs as $blogg)
                                <div class="blog-card text-center">
                                    <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                        <img src="{{ $blogg->photo ? asset('public/assets/images/blogs/' . $blogg->photo) : asset('public/assets/images/noimage.png') }}"
                                            alt="Shape">
                                    </a>
                                    <div class="b-card-text">
                                        <h3><a
                                                href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                                @if ($langg->rtl == 1)
                                                    {{ strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar, 0, 50) . '...' : $blogg->title_ar }}
                                                @else
                                                    {{ strlen($blogg->title) > 50 ? substr($blogg->title, 0, 50) . '...' : $blogg->title }}
                                                @endif
                                            </a>
                                        </h3>
                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ substr(strip_tags($blogg->mobile_details_ar), 0, 120) }}
                                            @else
                                                {{ substr(strip_tags($blogg->mobile_details), 0, 120) }}
                                            @endif
                                        </p>
                                        <div class="view-more">
                                            <a
                                                href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                                {{ $langg->lang38 }}
                                                <i class='bx bx-right-arrow-alt'></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>

                </div>

            </div>

    </section>
    <!-- blog area end -->
    <section class="our_partenr">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('public/assets/images/' . $gs->logo) }}" alt="">
                </div>
                <div class="col-md-8">
                    <div class="clints-slider owl-carousel owl-theme">
                        @foreach ($partners as $partner)
                            <div class="item">
                                <img src="{{ asset('public/assets/images/partner/' . $partner->photo) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('includes.form')
@stop
