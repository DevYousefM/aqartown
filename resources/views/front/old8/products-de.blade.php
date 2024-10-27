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
    <section class="breadcrumb-section" style="background-image: url({{ asset('public/assets/images/' . $gs->top_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>
                    @if ($langg->rtl == 1)
                        {{ $product->title_ar }}
                    @else
                        {{ $product->title }}
                    @endif
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>
                    @if ($langg->rtl == 1)
                        {{ $product->title_ar }}
                    @else
                        {{ $product->title }}
                    @endif
                </li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">Absen</span>
        </div>

    </section>
    <!-- ============================ Page Title End ================================== -->
    <!-- ============================ Agency List Start ================================== -->

    <!-- start details page -->
    <div class="product-details-page">
        <div class="page-body">
            <div class="mfa-container">
                <div class="body-text">
                    <div class="main-heading">
                        <p class="service-title">
                            @if ($langg->rtl == 1)
                                {{ $product->title_ar }}
                            @else
                                {{ $product->title }}
                            @endif
                        </p>


                    </div>

                    <div class="specifications">
                        <div class="title">
                            <span>
                                @if ($langg->rtl == 1)
                                    {{ $product->name_ar }}
                                @else
                                    {{ $product->name }}
                                @endif
                            </span>
                        </div>
                        @if ($langg->rtl == 1)
                            {!! $product->meta_description_ar !!}
                        @else
                            {!! $product->meta_description !!}
                        @endif
                    </div>
                </div>
            </div>

            <div class="mfa-container">
                <div class="body-images">
                    <!-- <div class="fotorama" data-direction="rtl" data-fit="cover" data-nav="thumbs" data-allowfullscreen="true"> -->
                    <div class="fotorama" data-direction="ltr" data-fit="cover" data-nav="thumbs"
                        data-allowfullscreen="true">
                        @if (!empty($product->photo))
                            <a href="{{ asset('public/assets/images/brands/' . $product->photo) }}">
                                <img src="{{ asset('public/assets/images/brands/' . $product->photo) }}" />
                            </a>
                        @endif

                        @if (!empty($product->galleries))
                            @foreach ($product->galleries as $image)
                                <a href="{{ asset('public/assets/images/galleries/' . $image->photo) }}">
                                    <img src="{{ asset('public/assets/images/galleries/' . $image->photo) }}" />
                                </a>
                            @endforeach
                        @endif
                        <!--  -->


                    </div>
                </div>

            </div>



        </div>
    </div>

    <!-- ============================ Agency List End ================================== -->


    @include('includes.form')

@stop
