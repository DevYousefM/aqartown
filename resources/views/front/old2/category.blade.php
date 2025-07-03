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
    <section class="medicen-aboutUs text-center"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->top_icon) }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6">
                    <img src="./images/logo3.png" alt="">
                </div>
                <div class="col-lg-6">
                    <h3>
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
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
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
                            <li class="breadcrumb-item"><a
                                    href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <div class="service_details">
        <div class="container-fluid">
            <div class="image-layer">

            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="service_details_wraper" style="margin-right: 50px;padding-top: 50px;">

                        <div class="text-p">
                            <h2 class=" sub-title" style="font-weight: 900;font-size: 20px;"><i class="fab fa-slack"></i>
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
                <div class="col-lg-5 service_details_wraper">
                    <img src="{{ asset(access_public() . 'assets/images/categories/' . $cat->photo) }}"
                        alt="{{ $cat->name_ar }}">
                </div>
            </div>
        </div>
    </div>














@stop
