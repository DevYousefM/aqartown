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



    <!-- =====slider home ===== -->
    <!-- Main Slider -->
    <section class="breadcrumb-area" style="background-image: url({{ asset('public/assets/images/' . $gs->best_icon) }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title float-right">
                            <h2>
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
                            </h2>
                        </div>
                        <div class="breadcrumb-menu float-left">
                            <ul class="clearfix">
                                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @if (!empty($subcat))
        <!--Start services style1 area-->
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
                                <!-- <div class="pro-rating sin-pro-rating f-right">
                                    <a href="#" tabindex="0"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <span class="text-black-5">( 27 Rating )</span>

                                </div> -->
                            </div>
                            <div class="clearfix"></div>
                            @if ($langg->rtl == 1)
                                {!! $subcat->details_ar !!}
                            @else
                                {!! $subcat->details !!}
                            @endif






                        </div>
                    </div>
                    <div class="col-md-6 col-sm-7">
                        <img src="{{ asset('public/assets/images/subcategories/' . $subcat->photo) }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!--End services style1 area-->
    @else
        <!--Start services style1 area-->
        <section class="services-style1-area sec-pd1">
            <div class="container">
                <div class="sec-title max-width text-center">
                    <h1>
                        @if ($langg->rtl == 1)
                            {{ $cat->name_ar }}
                        @else
                            {{ $cat->name }}
                        @endif
                    </h1>

                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="services-carousel owl-carousel owl-theme">

                            @if (count($cat->subs) > 0)
                                @foreach ($cat->subs as $subcat)
                                    <!--Start single solution style1-->
                                    <div class="single-solution-style1">
                                        <div class="img-holder">
                                            <img src="{{ asset('public/assets/images/subcategories/' . $subcat->photo) }}"
                                                alt="@if ($langg->rtl == 1) {{ $subcat->name_ar }}
                                     @else

                                     {{ $subcat->name }} @endif">
                                            <div class="icon-holder">
                                                <div class="inner-content">
                                                    <div class="box">
                                                        <span class="fal fa-table"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h3>
                                                @if ($langg->rtl == 1)
                                                    {{ $subcat->name_ar }}
                                                @else
                                                    {{ $subcat->name }}
                                                @endif
                                            </h3>

                                            <div class="readmore">
                                                <a href="#"><span class="flaticon-next"></span></a>
                                                <div class="overlay-button">
                                                    <a
                                                        href="{{ route('front.category', ['category' => $subcat->category->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}">معرفه
                                                        المزيد</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End single solution style1-->
                                @endforeach
                            @endif


                            <!--End single solution style1-->

                            <!--End single solution style1-->
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--End services style1 area-->
    @endif


@stop
