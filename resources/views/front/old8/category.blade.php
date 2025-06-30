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


    <!-- ============================ Page Title Start================================== -->
    <section class="breadcrumb-section"
        style="background-image: url({{ asset('public/assets/images/' . $gs->feature_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
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
            </div>
            <ul class="breadcrumb-nav">
                <li>
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
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">Absen</span>
        </div>

    </section>
    <!-- ============================ Page Title End ================================== -->
    <div class="service_details">
        <div class="container">

            <div class="row">

                <div class="col-md-6">
                    <div class="service_details_wraper">
                        <div class="text-p">
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
                        <hr>
                        <p>
                            @if (!empty($childcat))
                                @if ($langg->rtl == 1)
                                    {!! $childcat->details_ar !!}
                                @else
                                    {!! $childcat->details !!}
                                @endif
                            @elseif(!empty($subcat))
                                @if ($langg->rtl == 1)
                                    {!! $subcat->details_ar !!}
                                @else
                                    {!! $subcat->details !!}
                                @endif
                            @elseif(!empty($cat))
                                @if ($langg->rtl == 1)
                                    {!! $cat->details_ar !!}
                                @else
                                    {!! $cat->details !!}
                                @endif
                            @endif
                        </p>

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="service_details_wraper">
                        @if (!empty($subcat))
                            <img src="{{ asset('public/assets/images/subcategories/' . $subcat->photo) }}" alt="">
                        @elseif(!empty($cat))
                            <img src="{{ asset('public/assets/images/categories/' . $cat->photo) }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end gallery section -->
    <!-- ============================ Agency List Start ================================== -->
@stop
