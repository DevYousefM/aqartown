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

    <!--============= Start breadvroumb =============-->

    <div class="breadvroumb_area">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1>
                        @if ($langg->rtl == 1)
                            {{ $blog->title_ar }}
                        @else
                            {{ $blog->title }}
                        @endif
                    </h1>
                    <div class="breadcroumb_link">
                        <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }} </a>/ {{ $langg->lang222 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= End breadvroumb =============-->

    <!--========== start blogs area ================== -->
    <!-- blog area start -->



    <!-- blog area end -->

    <!--========== End blogs area ================== -->
    <div class="blog-area">
        <div class="container">
            <div class="sec-title centered">
                <h2>{{ $langg->lang9 }}</h2>
                <div class="separator"></div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog_detaisl_area">
                        <div class="blog_full_content">
                            <img class=""
                                data-src="{{ $blog->photo ? asset('public/assets/images/blogs/' . $blog->photo) : asset('public/assets/images/noimage.png') }}"
                                data-srcset="{{ $blog->photo ? asset('public/assets/images/blogs/' . $blog->photo) : asset('public/assets/images/noimage.png') }} 2x"
                                alt="I'm an image!"
                                src="{{ $blog->photo ? asset('public/assets/images/blogs/' . $blog->photo) : asset('public/assets/images/noimage.png') }}"
                                srcset="{{ $blog->photo ? asset('public/assets/images/blogs/' . $blog->photo) : asset('public/assets/images/noimage.png') }} 2x">
                            <h4>
                                @if ($langg->rtl == 1)
                                    {{ $blog->title_ar }}
                                @else
                                    {{ $blog->title }}
                                @endif
                            </h4>


                        </div>

                        <p>
                            @if ($langg->rtl == 1)
                                {!! $blog->details_ar !!}
                            @else
                                {!! $blog->details !!}
                            @endif
                        </p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12">

                    <div class="widget_raper">
                        <h4>{{ $langg->lang5 }}</h4>

                        <div class="recent_post">
                            @foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get() as $k => $blog)
                                @php
                                    $k++;
                                @endphp
                                <a href="{{ route('front.blogshow', ['id' => $blog->slug, 'lang' => $sign]) }}"
                                    class="single_recent_post">
                                    <span class="rp_img"
                                        style="background-image: url({{ $blog->photo ? asset('public/assets/images/blogs/' . $blog->photo) : asset('public/assets/images/noimage.png') }});"></span>
                                    <h4>
                                        @if ($langg->rtl == 1)
                                            {{ strlen($blog->title_ar) > 70 ? substr($blog->title_ar, 0, 70) . '...' : $blog->title_ar }}
                                        @else
                                            {{ strlen($blog->title) > 70 ? substr($blog->title, 0, 70) . '...' : $blog->title }}
                                        @endif
                                    </h4>
                                </a>
                            @endforeach






                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-12 col-md-12">


            </div>
        </div>
    </div>
@stop
