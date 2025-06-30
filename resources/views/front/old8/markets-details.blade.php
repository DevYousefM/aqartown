@extends('layouts.front')
@section('gsearch')


    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "{{$gs->title}}",
    "url": "{{url('/')}}",
    "potentialAction": {
      "@type": "SearchAction",
      "query-input": "required name=search",
      "target": "{{url('/category/?search={search}')}}"
    }
  }
</script>
    @if (isset($tool->product_analytics))
        {!! $tool->product_analytics !!}
    @endif




@stop
@section('title')

    @if ($langg->rtl == 1)
        {{ $market->name_ar }}
    @else
        {{ $market->name }}
    @endif

    -
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
    <section class="breadcrumb-section" style="background-image: url({{ asset('public/assets/images/' . $gs->big_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>
                    @if ($langg->rtl == 1)
                        {{ $market->name_ar }}
                    @else
                        {{ $market->name }}
                    @endif
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>
                    @if ($langg->rtl == 1)
                        {{ $market->name_ar }}
                    @else
                        {{ $market->name }}
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
                                @if ($langg->rtl == 1)
                                    {{ $market->name_ar }}
                                @else
                                    {{ $market->name }}
                                @endif

                            </p>

                        </div>
                        <hr>
                        @if ($langg->rtl == 1)
                            {!! $market->details_ar !!}
                        @else
                            {!! $market->details !!}
                        @endif

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="service_details_wraper">
                        <img src="{{ asset('public/assets/images/products/' . $market->hover_photo) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end gallery section -->

    @if (!empty($market->galleries))
        <div class="gallery-page">

            <div class="gallery-section">

                <div class="gallery-layout">
                    <div class="mfa-gallery">

                        @foreach ($market->galleries as $image)
                            <a href="{{ asset('public/assets/images/galleries/' . $image->photo) }}">
                                <div class="img-div lazy-div">
                                    <img class="lazy"
                                        data-src="{{ asset('public/assets/images/galleries/' . $image->photo) }}"
                                        src="{{ asset('public/assets/images/galleries/' . $image->photo) }}">


                                </div>
                            </a>
                        @endforeach



                    </div>
                </div>
            </div>

        </div> <!---->
    @endif
    <!-- end gallery section -->
    <!-- ============================ Agency List Start ================================== -->
@stop
