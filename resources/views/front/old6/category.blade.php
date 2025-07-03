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

    <section class="breadcrumb-section"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->top_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>
                    @if ($langg->rtl == 1)
                        {{ $cat->name_ar }}
                    @else
                        {{ $cat->name }}
                    @endif
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>
                    @if ($langg->rtl == 1)
                        {{ $cat->name_ar }}
                    @else
                        {{ $cat->name }}
                    @endif
                </li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }} </a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>

    <!-- start details page -->
    <div class="product-details-page">
        <div class="page-body">
            <div class="mfa-container">
                <div class="body-images">
                    <!-- <div class="fotorama" data-direction="rtl" data-fit="cover" data-nav="thumbs" data-allowfullscreen="true"> -->
                    <div class="fotorama" data-direction="rtl" data-fit="cover" data-nav="thumbs"
                        data-allowfullscreen="true">
                        @foreach ($cat->galleries as $image)
                            <a href="{{ asset(access_public() . 'assets/images/galleries/' . $image->photo) }}">
                                <img src="{{ asset(access_public() . 'assets/images/galleries/' . $image->photo) }}" />
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="mfa-container">
                <div class="body-text">
                    <div class="main-heading">
                        <p class="service-title">
                            @if ($langg->rtl == 1)
                                {{ $cat->name_ar }}
                            @else
                                {{ $cat->name }}
                            @endif
                        </p>

                        <div class="brief">
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
            </div>
        </div>
    </div>


@stop
