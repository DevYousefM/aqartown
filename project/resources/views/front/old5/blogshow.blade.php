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

    <div class="page-banner-area" style="background-image:url({{ asset('assets/images/' . $gs->hot_icon) }})">
        <div class="container">
            <div class="page-banner-content">
                <h2>
                    @if ($langg->rtl == 1)
                        {{ $blog->title_ar }}
                    @else
                        {{ $blog->title }}
                    @endif
                </h2>
                <ul class="pages-list">
                    <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                    <i class="fad fa-chevron-right"></i>
                    <li>
                        @if ($langg->rtl == 1)
                            {{ $blog->title_ar }}
                        @else
                            {{ $blog->title }}
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <section class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                            <img src="{{ asset('assets/images/blogs/' . $blog->photo) }}" alt="image">
                            <!-- <div class="tag">{{ date('d M, Y', strtotime($blog->created_at)) }}</div>
                                <div class="tag-two"><a href="blog-details.html">Technology</a></div> -->
                        </div>
                        <div class="article-content">
                            <div class="entry-meta">
                                <ul>
                                    <li>
                                        <span>Posted On:</span>
                                        {{ date('d M, Y', strtotime($blog->created_at)) }}
                                    </li>
                                    <li>
                                        <span>Posted By:</span>
                                        <a href="#">{{ $blog->source }}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3>
                                @if ($langg->rtl == 1)
                                    {{ $blog->title_ar }}
                                @else
                                    {{ $blog->title }}
                                @endif
                            </h3>
                            <p>
                                @if ($langg->rtl == 1)
                                    {!! $blog->details_ar !!}
                                @else
                                    {!! $blog->details !!}
                                @endif
                            </p>


                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <div class="widget widget_search">
                            <form action="{{ route('front.blogsearch', $sign) }}">
                                <input type="search" name="search" class="search-field" placeholder="Search..."
                                    required="">
                                <button type="submit"><i class='bx bx-search-alt'></i></button>
                            </form>
                        </div>
                        <!-- <div class="widget widget_info">
                                <div class="image">
                                    <img src="assets/images/doctor/doctor-4.jpg" alt="image">
                                </div>
                                <div class="content">
                                    <h3>Daisy Gabriela</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur incidunt ut labore et dolore magnam </p>
                                    <div class="share-link">
                                        <a href="https://www.facebook.com/" target="_blank"><i
                                                class='bx bxl-facebook'></i></a>
                                        <a href="https://twitter.com/?lang=en" target="_blank"><i
                                                class='bx bxl-twitter'></i></a>
                                        <a href="https://www.linkedin.com/" target="_blank"><i
                                                class='bx bxl-linkedin'></i></a>
                                        <a href="https://www.instagram.com/" target="_blank"><i
                                                class='bx bxl-instagram'></i></a>
                                    </div>
                                </div>
                            </div> -->
                        <div class="widget widget_grin_posts_thumb">
                            <h3 class="widget-title">{{ $langg->lang204 }}</h3>

                            @foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get() as $blog)
                                <article class="item">
                                    <a href="{{ route('front.blogshow', ['id' => $blog->id, 'lang' => $sign]) }}"
                                        class="thumb">
                                        <span class="fullimage cover bg1" role="img"
                                            style="background-image: url({{ asset('assets/images/blogs/' . $blog->photo) }});"></span>
                                    </a>
                                    <div class="info">
                                        <span> {{ date('M d - Y', strtotime($blog->created_at)) }}</span>
                                        <h4 class="title usmall">
                                            <a href="{{ route('front.blogshow', ['id' => $blog->id, 'lang' => $sign]) }}">
                                                @if ($langg->rtl == 1)
                                                    {{ strlen($blog->title_ar) > 45 ? substr($blog->title_ar, 0, 45) . ' ..' : $blog->title_ar }}
                                                @else
                                                    {{ strlen($blog->title) > 45 ? substr($blog->title, 0, 45) . ' ..' : $blog->title }}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>

@stop
