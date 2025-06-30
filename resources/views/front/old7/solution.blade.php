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
        {{ $solution->name_ar }}
    @else
        {{ $solution->name }}
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
    <div class="page-title"
        style="background:linear-gradient(#21459799, #21459799), url({{ asset('public/assets/images/' . $gs->big_icon) }});"
        data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                @if ($langg->rtl == 1)
                                    {{ $solution->name_ar }}
                                @else
                                    {{ $solution->name }}
                                @endif
                            </li>
                        </ol>
                        <h2 class="breadcrumb-title">
                            @if ($langg->rtl == 1)
                                {{ $solution->name_ar }}
                            @else
                                {{ $solution->name }}
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
    <section class="section-padding bg-light-white blog-details" style="padding: 80px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-details bx-wrapper bg-custom-white padding-20">
                        <!-- article -->
                        <article class="post p-relative">
                            <div class="post-wrapper">
                                <div class="post-img animate-img mb-xl-20">{!! $solution->youtube !!} </div>
                                <div class="blog-meta bg-custom-white">
                                    <div class="post-meta-box mb-xl-20">
                                        <!-- <div class="post-categories"> <a href="#" class="text-custom-black fs-18">VIRTUAL PRODUCTION </a> </div> -->
                                        <!--<div class="post-meta"> <a href="#" class="text-light-dark mr-2" tabindex="-1"> <span class="text-custom-blue"> <i class="fas fa-comment"></i> </span> 20 </a> <a href="#" class="text-light-dark mr-2" tabindex="-1"> <span class="text-custom-blue"> <i class="fas fa-thumbs-up"></i> </span> 50 </a> <a href="#" class="text-light-dark mr-2" tabindex="-1"> <span class="text-custom-blue"> <i class="fas fa-eye"></i> </span> 500 </a>-->

                                    </div>
                                </div>


                                <div class="post-heading p-relative"
                                    style="
                              padding: 20px 0;
                          ">
                                    <h2><a href="#" class="text-custom-black">
                                            @if ($langg->rtl == 1)
                                                {{ $solution->name_ar }}
                                            @else
                                                {{ $solution->name }}
                                            @endif
                                        </a></h2>
                                    <br>
                                    @if (!empty($solution->title))
                                        <h3>
                                            @if ($langg->rtl == 1)
                                                {{ $solution->title_ar }}
                                            @else
                                                {{ $solution->title }}
                                            @endif
                                        </h3>

                                    @endif



                                </div>
                                <div class="quote-box mb-xl-20">
                                    <blockquote class="bg-light-white"> <span> <i
                                                class="fa fa-quote-left text-custom-white"></i> </span>

                                        <p class="text-custom-black fs-16 no-margin">
                                            @if ($langg->rtl == 1)
                                                {!! $solution->details_ar !!}
                                            @else
                                                {!! $solution->details !!}
                                            @endif
                                        </p>

                                    </blockquote>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- article -->




                </div>

            </div>
            <div class="row">
                <div class="col">
                    <img style="width: 100%;" src="{{ asset('public/assets/images/products/' . $solution->hover_photo) }}"
                        alt="">
                </div>


            </div>
        </div>

    </section>
    <!-- ============================ Agency List End ================================== -->
    @if (!empty(json_decode($solution->projects)))
        <div class="papri-team-typ-1-wraper pt-100 pb-70">
            <div class="container-fluid">
                <div class="index-tit">
                    <h4>{{ $langg->lang36 }}</h4>
                </div>
                <div class="row">
                    @php
                        $ids = json_decode($solution->projects);

                        $categories = App\Models\Category::wherein('id', $ids)->get();
                    @endphp


                    @forelse($categories as $key=>$category)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a
                                href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                                  @else
                                            
                                                {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                                <div class="single-team-typ-1-wraper">
                                    <img src="{{ asset('public/assets/images/categories/' . $category->photo) }}"
                                        alt="img">
                                    <div class="team-typ-1-hvr text-white">
                                        <p>
                                            @if ($langg->rtl == 1)
                                                {{ $category->name_ar }}
                                            @else
                                                {{ $category->name }}
                                            @endif​​
                                        </p>
                                    </div>
                                    <h5 class="brand-title text-center black p-2">
                                        @if ($langg->rtl == 1)
                                            {{ $category->name_ar }}
                                        @else
                                            {{ $category->name }}
                                        @endif​​
                                    </h5>
                                </div>
                            </a>
                        </div>

                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    @endif
    <!-- =======================Our Products Start============================ -->
    @if (!empty(json_decode($solution->products)))
        <div class="services-section">
            <div class="index-tit">
                <h4>{{ $langg->lang37 }}</h4>
            </div>
            <div class="section-body">
                <ul class="main-section-ul">
                    @php
                        $ids = json_decode($solution->products);

                        $about_uss = App\Models\Brand::wherein('id', $ids)->get();
                    @endphp


                    @forelse($about_uss as $k=> $about_us)
                        <li>
                            <a href=" {{ route('front.product2', ['slug' => $about_us->slug, 'lang' => $sign]) }}"
                                class="main-flip-card">
                                <div class="card-content">
                                    <div class="card-front">
                                        <div class="img-div">
                                            <img src="{{ asset('public/assets/images/brands/' . $about_us->photo) }}"
                                                alt="img">
                                        </div>
                                        <div class="title">
                                            <p>
                                                @if ($langg->rtl == 1)
                                                    {{ $about_us->title_ar }}
                                                @else
                                                    {{ $about_us->title }}
                                                @endif

                                                <br>
                                                <span>
                                                    @if ($langg->rtl == 1)
                                                        {{ $about_us->name_ar }}
                                                    @else
                                                        {{ $about_us->name }}
                                                    @endif
                                                </span>
                                            </p>

                                        </div>
                                        <div class="spans">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="card-back">
                                        <div class="text">
                                            <span>
                                                @if ($langg->rtl == 1)
                                                    {{ $about_us->title_ar }}
                                                @else
                                                    {{ $about_us->title }}
                                                @endif
                                            </span>
                                            <p>

                                                @if ($langg->rtl == 1)
                                                    {{ $about_us->name_ar }}
                                                @else
                                                    {{ $about_us->name }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="read-more">
                                            <span>
                                                <i class="linearicons-magnifier"></i>
                                                {{ $langg->lang6 }}
                                            </span>
                                        </div>
                                        <div class="spans">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @empty
                    @endforelse


                </ul>
            </div>
        </div>
        <!-- =======================Our Products End============================ -->
    @endif

    @include('includes.form')

@stop
