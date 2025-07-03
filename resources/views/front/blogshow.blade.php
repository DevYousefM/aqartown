@extends('layouts.front')


<meta name="keywords" content="{{ $blog->meta_tag }}">
@if ($langg->rtl == 1)
    <meta name="description" content="{{ $blog->meta_description_ar }}">
@else
    <meta name="description" content="{{ $blog->meta_description }}">
@endif
<title>@yield('title') -

    @if ($langg->rtl == 1)
        {{ $blog->title_ar }}
    @else
        {{ $blog->title }}
    @endif

</title>

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

      "image":"{{filter_var($blog->photo, FILTER_VALIDATE_URL) ?$blog->photo:asset(access_public() . 'assets/images/blogs/'.$blog->photo)}}",





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

    <link href="{{ asset(access_public() . 'assets/canbest/css/plugins/bootstrap.min.css') }}" rel="stylesheet">

@stop


@section('js')
    {!! $blog->facebook_pixel !!}
@endsection

@section('content')



    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp



    <div class="sub-banner pt-90 pb-90"
        style="background-image:url({{ asset(access_public() . 'assets/images/' . $gs->hot_icon) }});">

        <div class="container">

            <div class="col-md-12">

                <div class="text-center text-line">

                    <h1>
                        @if ($langg->rtl == 1)
                            {{ $blog->title_ar }}
                        @else
                            {{ $blog->title }}
                        @endif
                    </h1>

                    <ul class="text-c">

                        <li>{{ $langg->lang17 }}</li>

                        <li>|</li>

                        <li class="color-t">
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

    </div>

    <!--sub-Banner-End-->



    <!-- blog area start -->



    <div class="blog-area">

        <div class="container">

            <div class="sec-title centered">

                <div class="separator"></div>

            </div>

            <div class="row">

                <div class="col-lg-8 col-md-12">

                    <div class="blog_detaisl_area">

                        <div class="blog_full_content">

                            <img class=""
                                data-src="{{ asset(access_public() . 'assets/images/blogs/' . $blog->photo) }}"
                                data-srcset="{{ asset(access_public() . 'assets/images/blogs/' . $blog->photo) }} 2x"
                                alt=" {{ $blog->title }}"
                                src="{{ asset(access_public() . 'assets/images/blogs/' . $blog->photo) }}"
                                srcset="{{ asset(access_public() . 'assets/images/blogs/' . $blog->photo) }} 2x">

                            <h4>
                                @if ($langg->rtl == 1)
                                    {{ $blog->title_ar }}
                                @else
                                    {{ $blog->title }}
                                @endif
                            </h4>


                        </div>



                        <div class="main_p">
                            @if ($langg->rtl == 1)
                                {!! $blog->details_ar !!}
                            @else
                                {!! $blog->details !!}
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-12">



                    <div class="widget_raper">

                        <h4> {{ $langg->lang38 }}</h4>



                        <div class="recent_post">





                            @foreach (App\Models\Blog::orderBy('created_at', 'desc')->where('id', '!=', $blog->id)->limit(4)->get() as $blog)
                                <a href="{{ route('front.blogshow', ['id' => $blog->slug, 'lang' => $sign]) }}"
                                    class="single_recent_post">

                                    <span class="rp_img"
                                        style="background-image: url({{ asset(access_public() . 'assets/images/blogs/' . $blog->photo) }});"></span>

                                    <h4>
                                        @if ($langg->rtl == 1)
                                            {{ $blog->title_ar }}
                                        @else
                                            {{ $blog->title }}
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

    <!-- blog area end -->



    <!--========== End blogs area ================== -->



@stop
{{-- <script>
    fbq('track', 'The Art of Restaurant Blog');
    console.log("here");
</script> --}}
