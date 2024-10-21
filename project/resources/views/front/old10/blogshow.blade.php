@extends('layouts.front')

@section('gsearch')



    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{url('/item',$blog->slug)}}"
      },
      "headline": "{{$blog->title}}",
      "image":"{{filter_var($blog->photo, FILTER_VALIDATE_URL) ?$blog->photo:asset('public/assets/images/blogs/'.$blog->photo)}}",


      "datePublished": "{{$blog->created_at}}",
      "views" :  "{{$blog->views}}",
    {{--  "category" : "{{$blog->category->name}}",--}}
      "author": {
        "@type": "Person",
        "name": "{{$blog->author}}"
      }

    }
    </script>



@stop

@section('title')
    @if ($langg->rtl == 1)
        {{ strlen($blog->title_ar) > 50 ? substr($blog->title_ar, 0, 50) . '...' : $blog->title_ar }}
    @else
        {{ strlen($blog->title) > 50 ? substr($blog->title, 0, 50) . '...' : $blog->title }}
    @endif - {{ $langg->lang222 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('css')
    <link href="{{ asset('assets/canbest/css/plugins/bootstrap.min.css') }}" rel="stylesheet">
@stop

@section('content')

    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp


    <!-- end header -->
    <section class="page-title" style="background-image:url({{ asset('public/assets/images/' . $gs->hot_icon) }});">
        <div class="auto-container">
            <h1>
                @if ($langg->rtl == 1)
                    {{ $blog->title_ar }}
                @else
                    {{ $blog->title }}
                @endif
            </h1>

            <ul class="bread-crumb">
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                <li><a href="#">
                        @if ($langg->rtl == 1)
                            {{ $blog->title_ar }}
                        @else
                            {{ $blog->title }}
                        @endif
                    </a></li>
            </ul>

        </div>

        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span>
            </div>
        </div>

    </section>



    <!-- end start blogs section -->

    <div class="news-details-page">
        <div class="details-wrapper">
            <div class="news-body">
                <div class="news-heading-date">
                    <div class="heading">
                        <p>
                            @if ($langg->rtl == 1)
                                {{ $blog->title_ar }}
                            @else
                                {{ $blog->title }}
                            @endif
                        </p>
                    </div>
                    <div class="date">
                        <i class="ion-ios-calendar-outline"></i>
                        <span>
                            {{ date('M d,Y', strtotime($blog->created_at)) }}
                        </span>
                    </div>
                </div>

                <div class="news-text">


                    <p>
                        @if ($langg->rtl == 1)
                            {!! $blog->details_ar !!}
                        @else
                            {!! $blog->details !!}
                        @endif
                    </p>


                </div>
            </div>
            <div class="news-img">
                <img src="{{ asset('public/assets/images/blogs/' . $blog->photo) }}"
                    alt="@if ($langg->rtl == 1) {{ $blog->title_ar }}
        @else
        {{ $blog->title }} @endif  ">
            </div>

        </div>
    </div>
    <!-- end start blogs section -->

    @include('includes.form')

@stop
