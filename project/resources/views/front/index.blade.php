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
    <!-- Slider-Start -->

    <div class="swiper mySwiper">

        <div class="swiper-wrapper">

            @foreach ($sliders as $k => $slide)
                @php

                    $galss = str_replace(' ', '%20', $slide->photo);

                @endphp

                <div class="swiper-slide cover-background"
                    style="background-image:url({{ asset('/assets/images/sliders/' . $galss) }})">



                </div>
            @endforeach



        </div>

        <div class="po-ab-se">

            <div class="container">

                <div class="content-slider">

                    <h1>{{ $langg->lang220 }} </h1>

                    <!-- <h4>Find new & featured property located in your local city.</h4> -->

                    <div class="row justify-content-center mt-50">

                        <div class="col-xl-10 col-lg-11 col-md-12">

                            <div class="full_search_box">

                                <div class="search_hero_wrapping">

                                    <form action="{{ route('front.search.submit') }}" method="POST">

                                        {{ csrf_field() }}

                                        <div class="row">

                                            <div class="col-lg-4 col-md-3 col-sm-12">

                                                <div class="form-group">

                                                    <label>{{ $langg->lang1 }}</label>

                                                    <div class="input-with-icon">
                                                        {{-- <br>
                                                        {{ $locations }}
                                                        <br> --}}
                                                        <select id="location" name="location" class="form-control">

                                                            <option value="">&nbsp;</option>

                                                            @foreach ($locations as $location)
                                                                <option value="{{ $location->id }}">
                                                                    @if ($langg->rtl == 1)
                                                                        {!! $location->name_ar !!}
                                                                    @else
                                                                        {!! $location->country_name !!}
                                                                    @endif
                                                                </option>
                                                            @endforeach

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-lg-3 col-md-3 col-sm-12">

                                                <div class="form-group">

                                                    <label>{{ $langg->lang2 }}</label>

                                                    <div class="input-with-icon">

                                                        <select id="ptypes" class="form-control" name="ptypes">

                                                            <option value="">&nbsp;</option>

                                                            @foreach ($types as $type)
                                                                <option value="{{ $type->id }}">
                                                                    @if ($langg->rtl == 1)
                                                                        {!! $type->name_ar !!}
                                                                    @else
                                                                        {!! $type->name !!}
                                                                    @endif
                                                                </option>
                                                            @endforeach

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-lg-4 col-md-4 col-sm-12">

                                                <div class="form-group none">

                                                    <label>{{ $langg->lang3 }}</label>

                                                    <div class="input-with-icon">

                                                        <select id="price" class="form-control" name="price">

                                                            <option value="">&nbsp;</option>

                                                            @foreach ($works as $work)
                                                                <option value="{{ $work->id }}">
                                                                    @if ($langg->rtl == 1)
                                                                        {!! $work->name_ar !!}
                                                                    @else
                                                                        {!! $work->name !!}
                                                                    @endif
                                                                </option>
                                                            @endforeach

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-lg-1 col-md-2 col-sm-12 small-padd">

                                                <div class="form-group none">

                                                    <button class="btn search-btn">{{ $langg->lang6 }}</button>

                                                </div>

                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



        </div>

        <div class="swiper-button-next"></div>

        <div class="swiper-button-prev"></div>

    </div>

    <!-- Slider-End -->



    <section class="pt-90 pb-90 about-page">

        <div class="container">

            <div class="row">

                <div class="col-md-6 pt-50">

                    <div class="text-con">
                        <p>
                            @if ($langg->rtl == 1)
                                {!! $gs->policy_ar !!}
                            @else
                                {!! $gs->policy !!}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-md-6 pl-70 pt-50">
                    <div class="min-about pl-40 pb-40">
                        <img src="{{ asset('assets/images/' . $gs->home_about_img1) }}" alt=""
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-90 pb-60 pop-pro pop-pro-mar">
        <div class="container">
            <div class="row mb-40">
                <div class="col-md-5">
                    <div class="heading-t  fadeInUp animated">
                        <h2> {{ $langg->lang7 }}</h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="tab-con">
                        <ul class="nav nav-pills" role="tablist">
                            @php
                                $s = 0;
                            @endphp
                            @foreach ($subcategories as $subcat)
                                <li class="nav-item">
                                    <a class="pointer nav-link @if ($s == 0) active @endif"
                                        id="pills-{{ $subcat->id }}-tab" data-toggle="pill"
                                        href="#pills-{{ $subcat->id }}" role="tab"
                                        aria-controls="pills-{{ $subcat->id }}" aria-selected="true">
                                        @if ($langg->rtl == 1)
                                            {{ $subcat->name_ar }}
                                        @else
                                            {{ $subcat->name }}
                                        @endif
                                    </a>
                                </li>
                                @php
                                    $s++;
                                @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content p-0 shadow-none" id="pills-tabContent">
                @php
                    $i = 0;
                @endphp
                @foreach ($subcategories as $subcat)
                    <div class="tab-pane fade @if ($i == 0) active show @endif"
                        id="pills-{{ $subcat->id }}" role="tabpanel" aria-labelledby="pills-{{ $subcat->id }}-tab">

                        <div class="row">
                            @if (count($subcat->productss) > 0)
                                @foreach ($subcat->productss as $productt)
                                    <div class="col-sm-4">
                                        <div class="min-pro-box">
                                            <a
                                                href="

                                  @if ($langg->rtl == 1) {{ route('front.product', ['slug' => $productt->slug_ar, 'lang' => $sign]) }}

                                    @else

                                    {{ route('front.product', ['slug' => $productt->slug, 'lang' => $sign]) }} @endif          ">

                                                <img src="{{ filter_var($productt->photo, FILTER_VALIDATE_URL) ? $productt->photo : asset('assets/images/products/' . $productt->photo) }}"
                                                    alt="" class="bg-pro-i">

                                            </a>

                                            {{-- <button class="chat-re" data-toggle="modal" data-target="#myModal-chat">

                                                <img src="{{ asset('public/assets/aqar/') }}/images/messenger.png"
                                                    alt="" class="mes">

                                            </button> --}}
                                            <div class="d-flex tags-container" style="gap: 10px">
                                                @if ($productt->is_available == 0)
                                                    <span class="tag-l bg-danger">
                                                        @if ($productt->product_condition == 1)
                                                            {{ $langg->lang832 }}
                                                        @endif
                                                        @if ($productt->product_condition == 2)
                                                            {{ $langg->lang831 }}
                                                        @endif
                                                    </span>
                                                @endif

                                                <span class="tag-l">
                                                    {{ $productt->product_condition == 2 ? $langg->lang39 : $langg->lang40 }}</span>
                                            </div>

                                            <div class="min-box-t">

                                                <h3> {{ $productt->price }}</h3>

                                                <h3><a
                                                        href=" @if ($langg->rtl == 1) {{ route('front.product', ['slug' => $productt->slug_ar, 'lang' => $sign]) }}

                                            @else

                                            {{ route('front.product', ['slug' => $productt->slug, 'lang' => $sign]) }} @endif  ">
                                                        @if ($langg->rtl == 1)
                                                            {{ $productt->name_ar }}
                                                        @else
                                                            {{ $productt->name }}
                                                        @endif
                                                    </a></h3>

                                                <ul class="min-f-img">
                                                    {{-- <li><img src="{{ asset('public/assets/aqar/') }}/images/b-o.png"
                                                            alt=""> 3 Br</li>

                                                    <li><img src="{{ asset('public/assets/aqar/') }}/images/ba-o.png"
                                                            alt=""> 3 Ba</li>

                                                    <li><img src="{{ asset('public/assets/aqar/') }}/images/g-o.png"
                                                            alt=""> 1 Gr</li> --}}

                                                    <li><img src="{{ asset('public/assets/aqar/') }}/images/s-o.png"
                                                            alt=""> {{ $productt->location }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
    </section>
    <section id="property-city" class="property-city pb30">
        <div class="container">
            <div class="col-lg-12 main-title text-center">
                <h2 class="Font_01">{{ $langg->lang18 }}</h2>
                <p class="Font_01">{{ $langg->lang8 }} </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($categories->where('type', 'service') as $category)
                    <div class="col-lg-4 col-xl-4 col-sm-6"><a
                            href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                        @else
                        {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                            <div class="properti_city">
                                <div class="thumb"><img class="img-fluid w100 DistrictImgList"
                                        src="{{ asset('assets/images/categories/' . $category->photo) }}"
                                        alt="@if ($langg->rtl == 1) {{ $category->name_ar }}
                                        @else
                                        {{ $category->name }} @endif ">
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <p class="Font_01">
                                            @if ($langg->rtl == 1)
                                                {{ $category->name_ar }}
                                            @else
                                                {{ $category->name }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="our-partners" class="our-partners">
        <div class="container">
            <div class="col-lg-12 main-title text-center">
                <h2 class="Font_01">{{ $langg->lang11 }} </h2>
                <p class="Font_01">{{ $langg->lang53 }} </p>
            </div>
            <div class="col-lg-12 team_slider owl-carousel owl-theme">
                @foreach ($images as $image)
                    <div class="item team_member">

                        <a href="{{ route('front.latestwork', $sign) }}"><img class="img-fluid thumb"
                                src="{{ asset('/assets/images/ads/' . $image->photo) }}"
                                alt="{{ $langg->rtl == 1 ? $image->title_ar : $image->title }} "></a>
                        <div class="details">
                            <a class="Font_01"
                                href="{{ route('front.latestwork', $sign) }}">{{ $langg->rtl == 1 ? $image->title_ar : $image->title }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop

@section('links')
    <link rel="preload" href="{{ asset('/assets/images/sliders/' . $galss) }}" as="image">
    <link rel="preload" href="{{ asset('assets/images/' . $gs->home_about_img1) }}" as="image">
    <link rel="preload" href="{{ asset('public/assets/aqar/') }}/images/s-o.png" as="image">
@endsection
