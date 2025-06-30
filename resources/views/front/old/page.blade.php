@extends('layouts.front')
@section('title')
    @if ($langg->rtl == 1)
        {{ $page->title_ar }}
    @else
        {{ $page->title }}
    @endif -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('content')



    <section>
        <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('public/assets/images/' . $gs->new_icon) }});"></div>
            <div class="container">
                <div class="page-title-inner d-inline-block">
                    <h1 class="mb-0">
                        @if ($langg->rtl == 1)
                            {{ $page->title_ar }}
                        @else
                            {{ $page->title }}
                        @endif
                    </h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}" title="">
                                {{ $langg->lang17 }}</a></li>
                        <li class="breadcrumb-item active">
                            @if ($langg->rtl == 1)
                                {{ $page->title_ar }}
                            @else
                                {{ $page->title }}
                            @endif
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- Page Title Wrap -->
    </section>



    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-info">

                        <p>
                            @if ($langg->rtl == 1)
                                {!! $page->details_ar !!}
                            @else
                                {!! $page->details !!}
                            @endif


                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
