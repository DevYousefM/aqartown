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
    @endif - {{ $langg->lang18 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('content')

    <section>
        <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('assets/images/' . $gs->hot_icon) }});"></div>
            <div class="container">
                <div class="page-title-inner d-inline-block">
                    <h1 class="mb-0">
                        @if ($langg->rtl == 1)
                            {{ $blog->title_ar }}
                        @else
                            {{ $blog->title }}
                        @endif
                    </h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}"
                                title="">{{ $langg->lang17 }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('front.blog', $sign) }}"
                                title="">{{ $langg->lang18 }}</a></li>
                        <li class="breadcrumb-item active">
                            @if ($langg->rtl == 1)
                                {{ $blog->title_ar }}
                            @else
                                {{ $blog->title }}
                            @endif
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- Page Title Wrap -->
    </section>
    <section>
        <div class="w-100 pt-140 pb-120 position-relative">
            <div class="container">
                <div class="page-wrap w-100">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-8">
                            <div class="blog-detail w-100">
                                <div class="blog-detail-info w-100">
                                    <img class="img-fluid w-100"
                                        src="{{ $blog->image ? asset('assets/images/blogs/' . $blog->image) : asset('assets/images/noimage.png') }}"
                                        alt="Blog Detail Image">
                                    <h2 class="mb-0">
                                        @if ($langg->rtl == 1)
                                            {{ $blog->title_ar }}
                                        @else
                                            {{ $blog->title }}
                                        @endif
                                    </h2>
                                    <div class="post-meta2">
                                        <span
                                            class="post-date thm-clr">{{ date('M d,Y', strtotime($blog->created_at)) }}</span>
                                        <span class="post-author">{{ $blog->author }}</span>
                                        <i class="post-cmt">{{ count($blog->comments) }}</i>
                                    </div>
                                </div>
                                <div class="blog-detail-desc w-100">
                                    @if ($langg->rtl == 1)
                                        {!! $blog->details_ar !!}
                                    @else
                                        {!! $blog->details !!}
                                    @endif


                                </div>
                                @if (!empty($blog->video))
                                    <div class="detail-video position-relative w-100">
                                        <a class="d-inline-block position-absolute play-btn" data-fancybox
                                            href="{{ $blog->video }}" title="Video">
                                            <svg version="1.1" class="play" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="10rem"
                                                width="10rem" viewBox="0 0 100 100" enable-background="new 0 0 100 100"
                                                xml:space="preserve">
                                                <path class="stroke-dotted" fill="none" stroke="#fff"
                                                    d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7 C97.3,23.7,75.7,2.3,49.9,2.5">
                                                </path>
                                                <path class="icon" fill="#fff"
                                                    d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z">
                                                </path>
                                            </svg>
                                        </a>
                                        <img class="img-fluid w-100" style="height: 360px;"
                                            src="{{ $blog->image ? asset('assets/images/blogs/' . $blog->image) : asset('assets/images/noimage.png') }}"
                                            alt="Blog Detail Image 5">
                                    </div>
                                @endif
                                <div class="blog-detail-social-tags mt-55 w-100 gray-bg">
                                    <div class="blog-detail-social-wrap d-flex flex-wrap align-items-center w-100">
                                        <span>{{ $langg->lang38 }}:</span>
                                        {{--  <div class="social-links4 d-flex flex-wrap">
                                                    <a class="facebook" href="javascript:void(0);" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                    <a class="pinterest" href="javascript:void(0);" title="Pinterest" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                                    <a class="twitter" href="javascript:void(0);" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                                    <a class="vimeo" href="javascript:void(0);" title="Vimeo" target="_blank"><i class="fab fa-vimeo-v"></i></a>
                                                </div> --}}
                                        <!-- AddToAny BEGIN -->
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                            <a class="a2a_button_facebook"></a>
                                            <a class="a2a_button_twitter"></a>
                                            <a class="a2a_button_email"></a>
                                        </div>
                                        <script>
                                            var a2a_config = a2a_config || {};
                                            a2a_config.num_services = 4;
                                        </script>
                                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                                        <!-- AddToAny END -->
                                    </div>
                                    @if (!empty($blog->tags))
                                        <div class="blog-detail-tags-wrap d-flex flex-wrap align-items-center w-100">
                                            <span>{{ $langg->lang35 }}:</span>
                                            <div class="tagclouds">
                                                @foreach (explode(',', $blog->tags) as $key => $tag)
                                                    <a href="{{ route('front.blogtags', ['slug' => $tag, 'lang' => $sign]) }}"
                                                        title="">
                                                        {{ $tag }}{{ $key != count(explode(',', $blog->tags)) - 1 ? '' : '' }}</a>
                                                @endforeach

                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="detail-reviews mt-60 detail-meta d-inline-block w-100">
                                    <h3>{{ $langg->lang39 }}</h3>
                                    <div class="comment-threads w-100">
                                        <ul class="comments-list mb-0 list-unstyled">

                                            @foreach ($blog->comments()->orderBy('created_at', 'desc')->get() as $comment)
                                                <li>
                                                    <div class="comment w-100">
                                                        <div class="comment-thumb rounded-circle"><img
                                                                class="img-fluid rounded-circle"
                                                                src="{{ asset('assets/images/user-admin.png') }}"
                                                                alt="Comment Image 1"></div>
                                                        <div class="comment-info">
                                                            <h4 class="mb-0">{{ $comment->name }}</h4>
                                                            <span
                                                                class="thm-clr d-inline-block">{{ $comment->created_at->diffForHumans() }}</span>
                                                            {{-- <a class="thm-btn fill-btn comment-reply-link" href="javascript:void(0);" title="">Reply<span></span></a> --}}
                                                            <p class="mb-0">{{ $comment->text }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach

                                            {{-- <li>
                                                        <div class="comment comment-reply w-100">
                                                            <div class="comment-thumb rounded-circle"><img class="img-fluid rounded-circle" src="assets/images/resources/comment-img2.jpg" alt="Comment Image 2"></div>
                                                            <div class="comment-info">
                                                                <h4 class="mb-0">Jacke Blue</h4>
                                                                <span class="thm-clr d-inline-block">January 7, 2020</span>
                                                                <a class="thm-btn fill-btn comment-reply-link" href="javascript:void(0);" title="">Reply<span></span></a>
                                                                <p class="mb-0">Integer sollicitudin ligula non enim sodales non lacinia commodo tempor euismod enim sodales ilime varius nullam feugiat ultrices.</p>
                                                            </div>
                                                        </div>
                                                    </li> --}}
                                        </ul>
                                    </div>
                                </div>


                                <div class="detail-form mt-60 detail-meta d-inline-block w-100">
                                    <h3>{{ $langg->lang40 }}</h3>
                                    <form class="w-100" id="comment-form" action="{{ route('product.comment') }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="blog_id" id="blog_id" value="{{ $blog->id }}">
                                        <div class="row mrg10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <input class="w-100" type="text" name="name"
                                                    placeholder="{{ $langg->lang47 }}">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <input class="w-100" type="email" name="email"
                                                    placeholder="{{ $langg->lang49 }}">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <input class="w-100" type="text" name="title"
                                                    placeholder="{{ $langg->lang53 }}">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <input class="w-100" type="tel" name="phone"
                                                    placeholder="{{ $langg->lang48 }}">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <textarea class="w-100" name="text" placeholder="{{ $langg->lang41 }}"></textarea>
                                                <button class="thm-btn fill-btn submit-btn"
                                                    type="submit">{{ $langg->lang46 }}<span></span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-4">
                            <aside class="sidebar-wrap w-100">
                                {{-- <div class="widget-box w-100">
                                            <h3>Information</h3>
                                            <p class="mb-0">Adipisicing elit, sed do Lorem ipsum dolor sit amet, consectetur Nulla frin gilla purus at leo dignissim Adipisici ng elit, sed do Lorem ipsum dolor sit amet, consectetur Nulla frin gilla pur us at leo dignissim</p>
                                            <span class="adrs d-block"><i class="thm-clr fas fa-map-marker-alt"></i>Walking Street, Los Angeles, California, USA</span>
                                            <a class="thm-btn fill-btn" href="about.html" title="">About Us<span></span></a>
                                        </div> --}}

                                <div class="widget-box w-100">
                                    <h3>{{ $langg->lang36 }}</h3>
                                    <div class="articles-list w-100">
                                        @foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get() as $k => $blog)
                                            @php
                                                $k++;
                                            @endphp
                                            <div class="article-box d-flex flex-wrap w-100">
                                                <i>{{ $k }}.</i>
                                                <div class="article-info">
                                                    <span
                                                        class="post-date thm-clr">{{ date('M d,Y', strtotime($blog->created_at)) }}</span>
                                                    <h4 class="mb-0"><a
                                                            href="{{ route('front.blogshow', ['id' => $blog->slug, 'lang' => $sign]) }}"
                                                            title="">
                                                            @if ($langg->rtl == 1)
                                                                {{ strlen($blog->title_ar) > 50 ? substr($blog->title_ar, 0, 50) . '...' : $blog->title_ar }}
                                                            @else
                                                                {{ strlen($blog->title) > 50 ? substr($blog->title, 0, 50) . '...' : $blog->title }}
                                                            @endif
                                                        </a></h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @if (!empty($bcats))

                                    <div class="widget-box w-100">
                                        <h3>{{ $langg->lang42 }}</h3>
                                        <ul class="cate-list mb-0 list-unstyled w-100">
                                            @foreach ($bcats as $cat)
                                                <li><a href="{{ route('front.blogcategory', ['slug' => $cat->slug, 'lang' => $sign]) }}"
                                                        title="">
                                                        @if ($langg->rtl == 1)
                                                            {{ $cat->name_ar }}
                                                        @else
                                                            {{ $cat->name }}
                                                        @endif
                                                    </a><span>{{ $cat->blogs()->count() }}</span></li>
                                            @endforeach


                                        </ul>
                                    </div>
                                @endif
                                <div class="widget-box w-100">
                                    <h3>{{ $langg->lang37 }}</h3>
                                    <ul class="mb-0 list-unstyled w-100">
                                        @foreach ($archives as $key => $archive)
                                            <li><a href="{{ route('front.blogarchive', ['slug' => $key, 'lang' => $sign]) }}"
                                                    title="">({{ count($archive) }}) - {{ $key }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="widget-box w-100">
                                    <h3>{{ $langg->lang35 }}</h3>
                                    <div class="tagclouds">
                                        @foreach ($tags as $key => $tag)
                                            @if (!empty($tag[$key]))
                                                <a href="{{ route('front.blogtags', ['slug' => $tag, 'lang' => $sign]) }}"
                                                    title="">
                                                    {{ $tag }}{{ $key != count(explode(',', $blog->tags)) - 1 ? ' ' : '' }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="widget-box w-100">
                                    <h3>{{ $langg->lang43 }}</h3>
                                    <div class="recent-events-list w-100">
                                        @foreach ($events as $data)
                                            <div class="recent-event w-100">
                                                <a href="{{ route('front.product', ['slug' => $data->slug, 'lang' => $sign]) }}"
                                                    title=""><img class="img-fluid w-100"
                                                        src="{{ $data->photo ? (filter_var($data->photo, FILTER_VALIDATE_URL) ? $data->photo : asset('assets/images/products/' . $data->photo)) : asset('assets/images/noimage.png') }}"
                                                        alt="Recent Image 1"></a>
                                                <div class="recent-event-info">
                                                    <h4 class="mb-0"><a
                                                            href="{{ route('front.product', ['slug' => $data->slug, 'lang' => $sign]) }}"
                                                            title="">
                                                            @if ($langg->rtl == 1)
                                                                {{ $data->name_ar }}
                                                            @else
                                                                {{ $data->name }}
                                                            @endif
                                                        </a></h4>
                                                    <span class="thm-clr">{{ $data->date }} -
                                                        {{ $data->location }}</span>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="widget-box w-100">
                                    <h3>{{ $langg->lang44 }}</h3>
                                    <ul class="flickr-photos-list d-flex flex-wrap list-unstyled">

                                        @foreach ($blogs as $b)
                                            <li><a href="javascript:void(0);" title=""><img class="img-fluid w-100"
                                                        style="width: 80px ; height: 80px"
                                                        src="{{ $b->photo ? asset('assets/images/blogs/' . $b->photo) : asset('assets/images/noimage.png') }}"
                                                        alt="Flickr Image 1"></a></li>
                                        @endforeach

                                    </ul>
                                </div>
                                {{-- <div class="widget-box tweet-widget w-100">
                                            <div class="tweet-caro">
                                                <div class="tweet-box text-center">
                                                    <i class="fab fa-twitter"></i>
                                                    <h4 class="mb-0">Williams Clark</h4>
                                                    <span class="d-inline-block">10 Minutes Ago</span>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua</p>
                                                </div>
                                                <div class="tweet-box text-center">
                                                    <i class="fab fa-twitter"></i>
                                                    <h4 class="mb-0">Clark Williams</h4>
                                                    <span class="d-inline-block">10 Minutes Ago</span>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua</p>
                                                </div>
                                                <div class="tweet-box text-center">
                                                    <i class="fab fa-twitter"></i>
                                                    <h4 class="mb-0">Johan Doe</h4>
                                                    <span class="d-inline-block">10 Minutes Ago</span>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </div>
                                        </div> --}}
                            </aside><!-- Sidebar Wrap -->
                        </div>
                    </div>
                </div><!-- Page Wrap -->
            </div>
        </div>
    </section>

@stop

@section('js')
    <script src="{{ asset('assets/js/ResizeSensor.min.js') }}"></script>
    <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
    <script>
        $(document).on('submit', '#comment-form', function(e) {
            e.preventDefault();
            $('#comment-form button.submit-btn').prop('disabled', true);
            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $(".post-cmt").html(data[4]);
                    $('#comment-form textarea').val('');


                    $('.comments-list').prepend('<li>' + '<div class="comment w-100">' +
                        '<div class="comment-thumb rounded-circle">' +
                        '<img class="img-fluid rounded-circle" src="{{ asset('assets/images/user-admin.png') }}" alt="Comment Image 1">' +
                        '</div>' +
                        '<div class="comment-info">' +
                        '<h4 class="mb-0">' + data[1] + '</h4>' +
                        '<span class="thm-clr d-inline-block">' + data[2] + '</span>'

                        +
                        '<p class="mb-0">' + data[3] + '</p>' +
                        ' </div>' +
                        ' </div>' +
                        '</li>');

                    $('#comment-form button.submit-btn').prop('disabled', false);
                }

            });
        });
    </script>
@stop
