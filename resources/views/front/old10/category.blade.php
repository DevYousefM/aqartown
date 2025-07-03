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


    <section class="page-title"
        style="background-image:url({{ asset(access_public() . 'assets/images/' . $gs->best_icon) }});">
        <div class="auto-container">
            <h1>
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

            <ul class="bread-crumb">
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                <li><a href="#">
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
                    </a></li>
            </ul>

        </div>

        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span></div>
        </div>

    </section>


    <div class="details-page">
        <div class="page-heading">
            <p>
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
            </p>
        </div>
        <div class="page-body container">
            <div class="container">
                <div class="body-text">
                    <div class="main-heading" data-aos="fade-up" data-aos-duration="1500">



                    </div>

                    <div class="specifications" data-aos="zoom-in-up" data-aos-duration="1500">

                        <p>
                            @if ($langg->rtl == 1)
                                {!! $cat->details_ar !!}
                            @else
                                {!! $cat->details !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="before-after-container">


                    <div id="before-after-container" class="twentytwenty-container">
                        <img src="{{ asset(access_public() . 'assets/images/categories/' . $cat->photo) }}">

                    </div>
                </div>
            </div>

        </div>

        <!-- appointment working hours  -->

        <!-- appointment working hours  -->
    </div>

@stop
