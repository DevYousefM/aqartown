@extends('layouts.front')

@section('title')
    @if (!empty($childcat))
        @if ($langg->rtl == 1)
            {{ $childcat->name_ar }} - {{ $gs->title_ar }}
        @else
            {{ $childcat->name }} - {{ $gs->title }}
        @endif
    @elseif(!empty($subcat))
        @if ($langg->rtl == 1)
            {{ $subcat->name_ar }} - {{ $gs->title_ar }}
        @else
            {{ $subcat->name }} - {{ $gs->title }}
        @endif
    @elseif(!empty($cat))
        @if ($langg->rtl == 1)
            {{ $cat->name_ar }} - {{ $gs->title_ar }}
        @else
            {{ $cat->name }} - {{ $gs->title }}
        @endif
    @endif

@stop

@section('gsearch')


    @if (!empty($cat) && empty($subcat) && empty($childcat))
        @if (isset($tool->category_analytics))
            {!! $tool->category_analytics !!}
        @endif

    @endif



    @if (!empty($subcat) && !empty($cat) && empty($childcat))
        @if (isset($tool->subcategory_analytics))
            {!! $tool->subcategory_analytics !!}
        @endif

    @endif




    @if (!empty($childcat) && !empty($subcat) && !empty($cat))
        @if (isset($tool->childcategory_analytics))
            {!! $tool->childcategory_analytics !!}
        @endif

    @endif


@stop

@section('content')
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp


    <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero hero-vegas-slider inner-page-hero " id="page-hero">
        <div class="overlay-color"></div>
        <div class="vegas-slider-content"
            data-vegas-slide-1="{{ asset(access_public() . 'assets/images/' . $gs->feature_icon) }}"
            data-vegas-slide-2="{{ asset(access_public() . 'assets/images/' . $gs->best_icon) }}"
            data-vegas-slide-3="{{ asset(access_public() . 'assets/images/' . $gs->trending_icon) }}">
            <div class="container">
                <div class="row">
                    <div class="col-12 hero-text-area ">
                        <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">
                            @if (!empty($childcat))
                                @if ($langg->rtl == 1)
                                    {{ $childcat->name_ar }}
                                @else
                                    {{ $childcat->name }}
                                @endif
                            @elseif(!empty($subcat))
                                @if ($langg->rtl == 1)
                                    {{ $subcat->name_ar }}
                                @else
                                    {{ $subcat->name }}
                                @endif
                            @elseif(!empty($cat))
                                @if ($langg->rtl == 1)
                                    {{ $cat->name_ar }}
                                @else
                                    {{ $cat->name }}
                                @endif
                            @endif
                        </h1>
                        <nav aria-label="breadcrumb ">
                            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                                <li class="breadcrumb-item"><a class="breadcrumb-link"
                                        href="{{ route('front.index', $sign) }}"><i
                                            class="fas fa-home icon "></i>{{ $langg->lang17 }}</a></li>
                                <li class="breadcrumb-item active">
                                    @if (!empty($childcat))
                                        @if ($langg->rtl == 1)
                                            {{ $childcat->name_ar }}
                                        @else
                                            {{ $childcat->name }}
                                        @endif
                                    @elseif(!empty($subcat))
                                        @if ($langg->rtl == 1)
                                            {{ $subcat->name_ar }}
                                        @else
                                            {{ $subcat->name }}
                                        @endif
                                    @elseif(!empty($cat))
                                        @if ($langg->rtl == 1)
                                            {{ $cat->name_ar }}
                                        @else
                                            {{ $cat->name }}
                                        @endif
                                    @endif
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End inner Page hero-->



    @if (!empty($subcat))
        <section class="services-de mt-100 mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="single-product-info">
                            <div class="col-md-12">
                                <h3 class="text-black-1">
                                    @if (!empty($childcat))
                                        @if ($langg->rtl == 1)
                                            {{ $childcat->name_ar }}
                                        @else
                                            {{ $childcat->name }}
                                        @endif
                                    @elseif(!empty($subcat))
                                        @if ($langg->rtl == 1)
                                            {{ $subcat->name_ar }}
                                        @else
                                            {{ $subcat->name }}
                                        @endif
                                    @elseif(!empty($cat))
                                        @if ($langg->rtl == 1)
                                            {{ $cat->name_ar }}
                                        @else
                                            {{ $cat->name }}
                                        @endif
                                    @endif <span></span>
                                </h3>

                                <div class="clearfix"></div>
                                <hr>
                                <!-- <h3 class="pro-price f-left" style="font-size: 21px;">السعر: 869.00 EGP</h3> -->

                                <div class="clearfix"></div>
                                <div class="pro-rating sin-pro-rating f-right">
                                    <a href="#" tabindex="0"><i class="fa fa-star-half-o"
                                            aria-hidden="true"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    {{--   <span class="text-black-5">( 27 Rating )</span> --}}

                                </div>
                            </div>
                            <div class="clearfix"></div>



                            <hr>
                            {{-- <h3 class="pro-features" style="font-size: 21px; color: #333; padding-right: 10px;">مميزات الخدمه </h3>

                      <div class="list-style">
                          <ul class="features">
                              <li>  الغلاية: ويتكون من الحارقة والمضخات والمدخنة.</li>
                              <li> . المشعاع: عبارة عن ألواح من الألمنيوم الخفيف وأنواع من السكب.

                              </li>
                              <li> . الخزان: وهو خزان ماء صغير يوضع على سطح البيت ليؤمن الماء للغلاية.
                              </li>
                              <li>   .خزان الوقود: يزود حارقة الغلاية بالوقود، أو يوصل الوقود من خلال أنابيب.
                              </li>
                          </ul>
                      </div>
--}}
                            @if ($langg->rtl == 1)
                                {!! $subcat->details_ar !!}
                            @else
                                {!! $subcat->details !!}
                            @endif




                        </div>
                    </div>
                    <div class="col-md-6 col-sm-7">
                        <img src="{{ asset(access_public() . 'assets/images/subcategories/' . $subcat->photo) }}"
                            alt="">
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="portfolio portfolio-slider    mega-section" id="portfolio">
            <div class="container">
                <div class="section-heading center-heading">
                    <h2 class="section-title  wow fadeInUp" data-wow-delay=".2s">
                        @if ($langg->rtl == 1)
                            {{ $cat->name_ar }}
                        @else
                            {{ $cat->name }}
                        @endif
                        <span class='hollow-text'> </span><span class="title-design-element "></span>
                    </h2>
                    <div class="line line-on-center wow fadeIn" data-wow-delay=".7s"></div>
                </div>
            </div>
            <!--Swiper-->
            <div class="swiper-container wow fadeIn" data-wow-delay=".5s">
                <div class="swiper-wrapper ">
                    @if (count($cat->subs) > 0)
                        @foreach ($cat->subs as $subcat)
                            <div class="swiper-slide">
                                <div class="item "><a class="portfolio-img-link "
                                        href="{{ route('front.category', ['category' => $subcat->category->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}">
                                        <div class="overlay overlay-color"></div><img class="  portfolio-img img-fluid  "
                                            src="{{ asset(access_public() . 'assets/images/subcategories/' . $subcat->photo) }}"
                                            alt=" ">
                                    </a>
                                    <div class="item-info "><span></span>
                                        <h3 class="item-title">
                                            @if ($langg->rtl == 1)
                                                {{ $subcat->name_ar }}
                                            @else
                                                {{ $subcat->name }}
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="swiper-button-prev">
                    <div class="left-arrow"><i class="fas fa-arrow-right icon "></i>
                    </div>
                </div>
                <div class="swiper-button-next">
                    <div class="right-arrow"><i class="fas fa-arrow-left icon "></i>
                    </div>
                </div>
            </div>
        </section>

    @endif
    @include('includes.form')
@stop
