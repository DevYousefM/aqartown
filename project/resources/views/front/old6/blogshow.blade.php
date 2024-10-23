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
      "image":"{{filter_var($blog->photo, FILTER_VALIDATE_URL) ?$blog->photo:asset('assets/images/blogs/'.$blog->photo)}}",


      "datePublished": "{{$blog->created_at}}",
      "views" :  "{{$blog->views}}",
      "category" : "{{$blog->category->name}}",
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

@section('content')


    <section class="breadcrumb-section" style="background-image: url({{ asset('assets/images/' . $gs->hot_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>
                    @if ($langg->rtl == 1)
                        {{ $blog->title_ar }}
                    @else
                        {{ $blog->title }}
                    @endif
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>
                    @if ($langg->rtl == 1)
                        {{ $blog->title_ar }}
                    @else
                        {{ $blog->title }}
                    @endif
                </li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>



    <div class="news-details-page">
        <div class="details-wrapper">
            <div class="news-img">
                <img src="{{ asset('assets/images/blogs/' . $blog->photo) }}" alt="img">
            </div>
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
                            {{ date('d M, Y', strtotime($blog->created_at)) }}
                        </span>
                    </div>
                </div>

                <div class="news-text">
                    <i class="ion-android-create"></i>
                    <p>
                        @if ($langg->rtl == 1)
                            {!! $blog->details_ar !!}
                        @else
                            {!! $blog->details !!}
                        @endif
                    </p>
                    <div class="text-section">


                    </div>

                </div>
            </div>
        </div>
    </div>
