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


    <section>
        <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('assets/images/' . $gs->big_icon) }});"></div>
            <div class="container">
                <div class="page-title-inner d-inline-block">



                    @if (!empty($childcat))
                        @if ($langg->rtl == 1)
                            <h1 class="mb-0"> {{ $childcat->name_ar }}</h1>
                        @else
                            <h1 class="mb-0">{{ $childcat->name }}</h1>
                        @endif
                    @elseif(!empty($subcat))
                        @if ($langg->rtl == 1)
                            <h1 class="mb-0"> {{ $subcat->name_ar }}</h1>
                        @else
                            <h1 class="mb-0">{{ $subcat->name }}</h1>
                        @endif
                    @elseif(!empty($cat))
                        @if ($langg->rtl == 1)
                            <h1 class="mb-0"> {{ $cat->name_ar }}</h1>
                        @else
                            <h1 class="mb-0">{{ $cat->name }}</h1>
                        @endif
                    @endif




                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}"
                                title="">{{ $langg->lang17 }}</a></li>
                        @if (!empty($cat))
                            <li class="breadcrumb-item @if (empty($subcat)) active @endif ">
                                @if (empty($subcat))
                                    @if ($langg->rtl == 1)
                                        {{ $cat->name_ar }}
                                    @else
                                        {{ $cat->name }}
                                    @endif
                                @else
                                    @if ($langg->rtl == 1)
                                        <a
                                            href="{{ route('front.category', ['category' => $cat->slug_ar, 'lang' => $sign]) }}">
                                            {{ $cat->name_ar }}</a>
                                    @else
                                        <a
                                            href="{{ route('front.category', ['category' => $cat->slug, 'lang' => $sign]) }}">
                                            {{ $cat->name }}</a>
                                    @endif

                                @endif

                            </li>

                            @if (!empty($subcat))
                                <li class="breadcrumb-item @if (empty($childcat)) active @endif ">
                                    @if (empty($childcat))
                                        @if ($langg->rtl == 1)
                                            {{ $subcat->name_ar }}
                                        @else
                                            {{ $subcat->name }}
                                        @endif
                                    @else
                                        @if ($langg->rtl == 1)
                                            <a
                                                href="{{ route('front.category', ['category' => $cat->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}">
                                                {{ $subcat->name_ar }}</a>
                                        @else
                                            <a
                                                href="{{ route('front.category', ['category' => $cat->slug, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}">
                                                {{ $subcat->name }}</a>
                                        @endif

                                    @endif

                                </li>
                            @endif
                        @endif


                    </ol>
                </div>
            </div>
        </div><!-- Page Title Wrap -->
    </section>
    <section>
        <div class="w-100 pt-140 pb-120 position-relative">
            <div class="container">
                <div class="event-grid-wrap w-100">
                    <div class="row">
                        @foreach ($prods as $key => $productt)
                            <div class="col-md-6 col-sm-6 col-lg-4">
                                <div class="event-grid-box mb-30 w-100">
                                    <div class="event-grid-img w-100 overflow-hidden position-relative">
                                        <img class="img-fluid w-100"
                                            src="{{ $productt->photo ? (filter_var($productt->photo, FILTER_VALIDATE_URL) ? $productt->photo : asset('assets/images/products/' . $productt->photo)) : asset('assets/images/noimage.png') }}"
                                            alt="Event Image 1">
                                        <span class="position-absolute"><a class="rounded-circle" href="javascript:void(0);"
                                                title=""><i class="fas fa-heart"></i></a></span>
                                        <a class="thm-btn fill-btn"
                                            href="{{ route('front.product', ['slug' => $productt->slug_ar, 'lang' => $sign]) }}"
                                            title="">Book Now<span></span></a>
                                    </div>
                                    <div class="event-grid-info w-100">
                                        <h3 class="mb-0"><a
                                                href="{{ route('front.product', ['slug' => $productt->slug_ar, 'lang' => $sign]) }}"
                                                title="">
                                                @if ($langg->rtl == 1)
                                                    {{ $productt->name_ar }}
                                                @else
                                                    {{ $productt->name }}
                                                @endif
                                            </a></h3>
                                        @if (!empty($productt->date))
                                            <span class="event-date thm-clr d-block">{{ $productt->date }}</span>
                                        @endif
                                        <ul class="event-grid-meta mb-0 list-unstyled d-flex flex-wrap">
                                            @if (!empty($productt->time))
                                                <li><i class="far fa-clock"></i>{{ $productt->time }}</li>
                                            @endif
                                            @if (!empty($productt->price_from))
                                                <li><i class="fas fa-tags"></i>{{ $productt->price_from }}</li>
                                            @endif
                                        </ul>
                                        @if (!empty($productt->location))
                                            <span class="event-loc d-block"><i
                                                    class="fas fa-map-pin"></i>{{ $productt->location }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- Event Grid Wrap -->
                <div class="pagination-wrap d-inline-block mt-40 text-center w-100">
                    <div class="justify-content-center align-items-center mb-0 list-unstyled">

                        {!! $prods->links() !!}
                    </div>

                    {{--   <ul class="pagination justify-content-center align-items-center mb-0 list-unstyled">
                        <li class="page-item prev"><a class="page-link" href="javascript:void(0);" title=""><i class="fas fa-angle-double-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">01</a></li>
                        <li class="page-item active"><span class="page-link">02</span></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">03</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">04</a></li>
                        <li class="page-item dot">..........</li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0);">08</a></li>
                        <li class="page-item next"><a class="page-link" href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></a></li>
                    </ul> --}}
                </div><!-- Pagination Wrap -->
            </div>
        </div>
    </section>
@stop
