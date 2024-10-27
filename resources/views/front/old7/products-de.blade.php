@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $product->title_ar }}
    @else
        {{ $product->title }}
    @endif -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('content')
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp



    <!-- ============================ Page Title Start================================== -->
    <div class="page-title"
        style="background:linear-gradient(#21459799, #21459799), url({{ asset('public/assets/images/' . $gs->top_icon) }});"
        data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                @if ($langg->rtl == 1)
                                    {{ $product->title_ar }}
                                @else
                                    {{ $product->title }}
                                @endif
                            </li>
                        </ol>
                        <h2 class="breadcrumb-title">
                            @if ($langg->rtl == 1)
                                {{ $product->title_ar }}
                            @else
                                {{ $product->title }}
                            @endif -
                            <span onclick="window.location.href='{{ route('front.index', $sign) }}'"
                                style="cursor: pointer;"> {{ $langg->lang17 }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
    <!-- ============================ Agency List Start ================================== -->
    <div class="service_details">
        <div class="container">

            <div class="row">

                <div class="col-md-6">
                    <div class="service_details_wraper">
                        <div class="text-p">
                            <p>
                                @if ($langg->rtl == 1)
                                    {{ $product->title_ar }}
                                @else
                                    {{ $product->title }}
                                @endif
                            </p>

                        </div>
                        <hr>
                        <p>
                            @if ($langg->rtl == 1)
                                {!! $product->meta_description_ar !!}
                            @else
                                {!! $product->meta_description !!}
                            @endif

                        </p>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="service_details_wraper">
                        <img src="{{ asset('public/assets/images/brands/' . $product->photo) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Agency List End ================================== -->


    @include('includes.form')
@stop
