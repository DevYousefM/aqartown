

@extends('layouts.front')

@section('title')
    @if(!empty($childcat))
        @if($langg->rtl == 1)
           {{ $childcat->name_ar }} - {{$gs->title_ar}}

        @else
           {{ $childcat->name }} - {{$gs->title}}

        @endif

    @elseif(!empty($subcat))
        @if($langg->rtl == 1)
          {{ $subcat->name_ar }} - {{$gs->title_ar}}

        @else
            {{ $subcat->name }} - {{$gs->title}}

        @endif

    @elseif(!empty($cat))

        @if($langg->rtl == 1)
            {{ $cat->name_ar }} - {{$gs->title_ar}}

        @else
            {{ $cat->name }} - {{$gs->title}}

        @endif
    @endif

@stop

@section('gsearch')


    @if (!empty($cat) && empty($subcat) && empty($childcat))
        @if(isset($tool->category_analytics ))

            {!! $tool->category_analytics !!}


        @endif

    @endif



    @if (!empty($subcat) && !empty($cat) && empty($childcat))
        @if(isset($tool->subcategory_analytics ))

            {!! $tool->subcategory_analytics !!}


        @endif

    @endif




    @if (!empty($childcat)&& !empty($subcat) && !empty($cat))
        @if(isset($tool->childcategory_analytics ))

            {!! $tool->childcategory_analytics !!}


        @endif

    @endif


@stop

@section('content')
@php 




  $ps = App\Models\Pagesetting::find(1);
  

   @endphp
    <div class="page-banner-area" style="background-image:url({{asset('assets/images/'.$gs->top_icon)}})">
        <div class="container">
            <div class="page-banner-content">
                <h2>@if($langg->rtl == 1)
                            {{ $cat->name_ar }}

                        @else
                            {{ $cat->name }}

                        @endif</h2>
                <ul class="pages-list">
                    <li><a href="{{route('front.index',$sign)}}">{{ $langg->lang17 }}</a></li>
                    <i class="fad fa-chevron-right"></i>

                    <li>@if($langg->rtl == 1)
                            {{ $cat->name_ar }}

                        @else
                            {{ $cat->name }}

                        @endif</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="services-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="services-details-image">
                        <img src="{{asset('assets/images/categories/'.$cat->photo)}}" alt="image">
                    </div>
                    <div class="services-details-content">
                        <h3>@if($langg->rtl == 1)
                            {{ $cat->name_ar }}

                        @else
                            {{ $cat->name }}

                        @endif</h3>
                        <p>@if($langg->rtl == 1)
                           {!! $cat->details_ar !!}

                        @else
                            {!! $cat->details !!}

                        @endif</p>
                    </div>
                  
                
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <!-- <div class="widget widget_search">
                            <form class="search-form">
                                <input type="search" class="search-field" placeholder="Search...">
                                <button type="submit"><i class='bx bx-search-alt'></i></button>
                            </form>
                        </div>
                        <div class="widget widget_grin_posts_thumb">
                            <h3 class="widget-title">Recent posts</h3>
                            <article class="item">
                                <a href="services-details.html" class="thumb">
                                    <span class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <span>November 27, 2021</span>
                                    <h4 class="title usmall">
                                        <a href="services-details.html">New Technology Make for Dental Operation</a>
                                    </h4>
                                </div>
                            </article>
                            <article class="item">
                                <a href="services-details.html" class="thumb">
                                    <span class="fullimage cover bg2" role="img"></span>
                                </a>
                                <div class="info">
                                    <span>November 27, 2021</span>
                                    <h4 class="title usmall">
                                        <a href="services-details.html">Regular Dental care make Your Smile Brighter</a>
                                    </h4>
                                </div>
                            </article>
                            <article class="item">
                                <a href="services-details.html" class="thumb">
                                    <span class="fullimage cover bg3" role="img"></span>
                                </a>
                                <div class="info">
                                    <span>November 27, 2021</span>
                                    <h4 class="title usmall">
                                        <a href="services-details.html">Dental Hygiene for All Age to Make Smile</a>
                                    </h4>
                                </div>
                            </article>
                        </div> -->
                        <div class="widget widget_categories">
                            <h3 class="widget-title">{{ $langg->lang11 }}</h3>
                            <ul>
                            @foreach($categories->where('id' ,'!=', $cat->id) as $key=>$category)
                                <li><a href="@if($langg->rtl == 1)
                                               {{ route('front.category',['category' => $category->slug_ar, 'lang' => $sign]) }}
                                              
                                            @else
                                              {{ route('front.category',['category' => $category->slug, 'lang' => $sign]) }}
                                                   
                                            @endif">@if($langg->rtl == 1)
                            {{ $category->name_ar }}

                        @else
                            {{ $category->name }}

                        @endif</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- <div class="widget widget_tag_cloud">
                            <h3 class="widget-title">Popular Tags</h3>
                            <div class="tagcloud">
                                <a href="index.html">Business</a>
                                <a href="index.html">Privacy</a>
                                <a href="index.html">Technology</a>
                                <a href="index.html">Tips</a>
                                <a href="index.html">Uncategorized</a>
                            </div>
                        </div> -->
                        <div class="widget widget_instagram">
                            <h3 class="widget-title">   {{ $langg->lang221 }}</h3>
                            <ul>

                            @foreach($cat->galleries as $image )
                                <li>
                                    <div class="box">
                                        <img src="{{asset('assets/images/galleries/'.$image->photo)}}" alt="image">
                                        <i class="bx bxl-instagram"></i>
                                        <a href="{{asset('assets/images/galleries/'.$image->photo)}}" target="_blank" class="link-btn"></a>
                                    </div>
                                </li>
                                @endforeach    
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@stop