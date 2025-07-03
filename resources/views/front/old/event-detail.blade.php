@extends('layouts.front')
@section('gsearch')
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
           {
        "@type": "ListItem",
        "position": 1,
        "item":{
                    "@type": "Website",
                    "@id": "{{url('/en')}}",
                    "name": "translation missing: en.general.breadcrumbs.home"
                }
      } ,{
        "@type": "ListItem",
        "position": 2,
     //   "name": " {{$productt->category->name}}",
        "item": {
                    "@type": "CollectionPage",
                    "@id": "{{route('front.category',['category' => $productt->category->slug,'lang' => $sign])}}",
                    "name": "{{$productt->category->name}}"
                }
      } @if(!empty($productt->subcategory)) ,{
        "@type": "ListItem",
        "position": 3,
      //  "name": "{{$productt->subcategory->name}}",
        "item": {
                    "@type": "CollectionPage",
                    "@id": "{{ route('front.subcat',['slug1' => $productt->category->slug, 'slug2' => $productt->subcategory->slug,'lang'=>$sign]) }}",
                    "name": "{{$productt->subcategory->name}}"
                }

      }@endif @if(!empty($productt->childcategory)) ,{
        "@type": "ListItem",
        "position": 4,
      //  "name": "  {{$productt->childcategory->name}}",
         "item": {
                    "@type": "CollectionPage",
                    "@id": "{{ route('front.childcat',['slug1' => $productt->category->slug, 'slug2' => $productt->subcategory->slug, 'slug3' => $productt->childcategory->slug,'lang' => $sign]) }}",
                    "name": "{{$productt->childcategory->name}}"
                }
      }@endif,{
        "@type": "ListItem",
        "position": @if(!empty($productt->subcategory) && !empty($productt->childcategory)) 5  @elseif(!empty($productt->subcategory) && empty($productt->childcategory)) 4 @else 3 @endif,
        "item": {
                    "@type": "WebPage",
                    "@id": "{{route('front.product',['slug' => $productt->slug , 'lang' => $sign])}}",
                    "name": "{{ $productt->name }}"
                }
      }]
    }
    </script>
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
        {{ $productt->name_ar }} - {{ $gs->title_ar }}
    @else
        {{ $productt->name }} - {{ $gs->title }}
    @endif

    -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif

@stop

@section('content')


    <section><!--assets/images/parallax8.jpg-->
        <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
            <div class="fixed-bg"
                style="background-image: url({{ $productt->hover_photo ? (filter_var($productt->hover_photo, FILTER_VALIDATE_URL) ? $productt->hover_photo : asset(access_public() . 'assets/images/products/' . $productt->hover_photo)) : asset(access_public() . 'assets/images/' . $gs->big_icon) }});">
            </div>
            <div class="container">
                <div class="page-title-inner d-inline-block">
                    <h1 class="mb-0">
                        @if ($langg->rtl == 1)
                            {{ $productt->name_ar }}
                        @else
                            {{ $productt->name }}
                        @endif
                    </h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}"
                                title="">{{ $langg->lang17 }}</a></li>

                        <li class="breadcrumb-item"><a
                                href=" @if ($langg->rtl == 1) {{ route('front.category', ['category' => $productt->category->slug_ar, 'lang' => $sign]) }}

                                     @else
                                     {{ route('front.category', ['category' => $productt->category->slug, 'lang' => $sign]) }} @endif"
                                title="">
                                @if ($langg->rtl == 1)
                                    {{ $productt->category->name_ar }}
                                @else
                                    {{ $productt->category->name }}
                                @endif
                            </a>
                        </li>

                        @if (!empty($productt->subcategory))
                            <li class="breadcrumb-item"><a
                                    href=" @if ($langg->rtl == 1) {{ route('front.category', ['category' => $productt->category->slug_ar, 'slug2' => $productt->subcategory->slug_ar, 'lang' => $sign]) }}

                                     @else
                                     {{ route('front.category', ['category' => $productt->category->slug, 'slug2' => $productt->subcategory->slug, 'lang' => $sign]) }} @endif"
                                    title="">
                                    @if ($langg->rtl == 1)
                                        {{ $productt->subcategory->name_ar }}
                                    @else
                                        {{ $productt->subcategory->name }}
                                    @endif
                                </a>
                            </li>

                        @endif
                        <li class="breadcrumb-item active">
                            @if ($langg->rtl == 1)
                                {{ $productt->name_ar }}
                            @else
                                {{ $productt->name }}
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
                <div class="event-detail w-100">
                    <div class="event-detail-info w-100">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-12 col-lg-6">

                                @if (!empty($productt->title))
                                    <span class="thm-clr d-block">
                                        @if ($langg->rtl == 1)
                                            {{ $productt->title_ar }}
                                        @else
                                            {{ $productt->title }}
                                        @endif
                                    </span>
                                @endif
                                <h2 class="mv-0">
                                    @if ($langg->rtl == 1)
                                        {{ $productt->name_ar }}
                                    @else
                                        {{ $productt->name }}
                                    @endif
                                </h2>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-6">
                                <div class="about-info-wrap w-100">
                                    <div class="row">
                                        @if (!empty($productt->price))
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="about-info w-100">
                                                    <i class="thm-clr flaticon-tickets"></i>
                                                    <div class="about-info-inner">
                                                        <span>Tickets Information:</span>
                                                        <p class="mb-0">{{ $productt->price }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($productt->open_time))
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="about-info w-100">
                                                    <i class="thm-clr far fa-calendar-alt"></i>
                                                    <div class="about-info-inner">
                                                        <span>Opening Times</span>
                                                        <p class="mb-0">{{ $productt->open_time }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (!empty($productt->location))
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="about-info w-100">
                                                    <i class="thm-clr flaticon-pin-1"></i>
                                                    <div class="about-info-inner" style="width: 83%;">

                                                        <p class="mb-0">{{ $productt->location }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if (!empty($productt->parking))
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="about-info w-100">
                                                    <i class="thm-clr flaticon-parking-square-signal"></i>
                                                    <div class="about-info-inner">
                                                        <span>Your Parking:</span>
                                                        <p class="mb-0">{{ $productt->parking }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (!empty($productt->hover_photo))
                            <div class="event-detail-img position-relative w-100">
                                <img class="img-fluid w-100"
                                    src="{{ $productt->hover_photo ? (filter_var($productt->hover_photo, FILTER_VALIDATE_URL) ? $productt->hover_photo : asset(access_public() . 'assets/images/products/' . $productt->hover_photo)) : asset(access_public() . 'assets/images/noimage.png') }}"
                                    @if ($langg->rtl == 1) alt="{{ $productt->alt_ar }}"
                                         @else
                                         alt="{{ $productt->alt }}" @endif>
                            </div>
                        @endif
                    </div>
                    <div class="event-detail-content position-relative w-100">
                        <div class="event-detail-desc position-relative w-100">
                            <h4 class="mb-0">{{ $langg->lang201 }}</h4>
                            @if ($langg->rtl == 1)
                                {!! $productt->details_ar !!}
                            @else
                                {!! $productt->details !!}
                            @endif
                        </div>
                        @if (!empty($productt->features))
                            <div class="event-detail-feat position-relative w-100">
                                <h4 class="mb-0">{{ $langg->lang202 }}</h4>
                                <ul class="event-detail-features-list mb-0 list-unstyled w-100">
                                    @foreach ($productt->features as $key => $data1)
                                        <li><i class="far fa-calendar-check"></i>{{ $productt->features[$key] }}<span
                                                class="d-block">{{ $productt->colors[$key] }}</span></li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif

                        @if (count($productt->speakers) > 0)
                            <div class="event-detail-speaker position-relative w-100">
                                <h4 class="mb-0">{{ $langg->lang203 }}</h4>
                                <div class="speaker-inner pl-0 w-100">
                                    <div class="row mrg50">

                                        @foreach ($productt->speakers as $data)
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="speaker-box position-relative mb-40 w-100 overflow-hidden">
                                                    <img class="img-fluid w-100"
                                                        src="{{ asset(access_public() . 'assets/images/speakers/' . $data->photo) }}"
                                                        alt="Speaker Image 1">
                                                    <div class="speaker-info position-absolute">
                                                        <h3 class="mb-0 text-white"><a href="{{ $data->facebook }}">
                                                                @if ($langg->rtl == 1)
                                                                    {{ $data->name_ar }}
                                                                @else
                                                                    {{ $data->name }}
                                                                @endif
                                                            </a>
                                                        </h3>
                                                        <span class="d-block">
                                                            @if ($langg->rtl == 1)
                                                                {{ $data->desc_ar }}
                                                            @else
                                                                {{ $data->desc }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <h3 class="mb-0 text-white position-absolute">
                                                        @if ($langg->rtl == 1)
                                                            {{ $data->name_ar }}
                                                        @else
                                                            {{ $data->name }}
                                                        @endif
                                                    </h3>
                                                    {{--  <div class="speaker-social position-absolute">
                                                        <a href="{{$data->facebook}}" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                    </div>
--}}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="event-detail-getintouch position-relative w-100">
                            <h4 class="mb-0">{{ $langg->lang231 }}</h4>
                            <div class="event-detail-getintouch-inner w-100">
                                @if (!empty($productt->touch))
                                    <p class="mb-0"> {!! $productt->touch !!}</p>
                                @endif
                                @if (!empty($productt->reg_link))
                                    <a class="thm-btn fill-btn" href="{!! $productt->reg_link !!}"
                                        title="">{{ $langg->lang232 }} <i
                                            class="flaticon-trajectory"></i><span></span></a>
                                @endif
                                <div class="social-links4 mt-20 d-flex flex-wrap">
                                    @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                        <a class="facebook" href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                                            title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                        <a class="pinterest" href="{{ App\Models\Socialsetting::find(1)->instagram }}"
                                            title="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                        <a class="twitter" href="{{ App\Models\Socialsetting::find(1)->twitter }}"
                                            title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                                        <a class="vimeo" href="{{ App\Models\Socialsetting::find(1)->youtube }}"
                                            title="youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                                    @endif
                                </div>
                            </div>

                            @if (!empty($productt->map))
                                <div class="event-detail-loc mt-50 w-100">
                                    {!! $productt->map !!} </div>
                            @endif
                        </div>
                    </div>
                </div><!-- Event Detail -->
            </div>
        </div>
    </section>

    @if (count($productt->category->products()->where('status', '=', 1)->where('id', '!=', $productt->id)->take(3)->get()) >
            0)
        <section>
            <div class="w-100 pt-110 pb-90 gray-layer opc9 position-relative">
                <div class="fixed-bg patern-bg" style="background-image: url(assets/images/patter-bg1.jpg);"></div>
                <div class="container">
                    <div class="sec-title btm-icn mb-50 w-100 text-center">
                        <div class="sec-title-inner d-inline-block">
                            <span class="d-block thm-clr">{{ $langg->lang204 }}</span>
                            <h2 class="mb-0">{{ $langg->lang250 }}</h2>
                            <i class=""></i>
                        </div>
                    </div><!-- Sec Title -->
                    <div class="event-grid-wrap w-100">
                        <div class="row res-caro">
                            @foreach ($productt->category->products()->where('status', '=', 1)->where('id', '!=', $productt->id)->take(3)->get() as $data)
                                <div class="col-md-4 col-sm-6 col-lg-4">
                                    <div class="event-grid-box mb-30 w-100">
                                        <div class="event-grid-img w-100 overflow-hidden position-relative">
                                            <img class="img-fluid w-100"
                                                src="{{ $data->photo ? (filter_var($data->photo, FILTER_VALIDATE_URL) ? $data->photo : asset(access_public() . 'assets/images/products/' . $data->photo)) : asset(access_public() . 'assets/images/noimage.png') }}"
                                                alt="Event Image 1">
                                            <span class="position-absolute"><a class="rounded-circle"
                                                    href="javascript:void(0);" title=""><i
                                                        class="fas fa-heart"></i></a></span>
                                            <a class="thm-btn fill-btn"
                                                href="{{ route('front.product', ['slug' => $data->slug, 'lang' => $sign]) }}"
                                                title="">Book Now<span></span></a>
                                        </div>
                                        <div class="event-grid-info w-100">
                                            <h3 class="mb-0"><a
                                                    href="{{ route('front.product', ['slug' => $data->slug, 'lang' => $sign]) }}"
                                                    title="">
                                                    @if ($langg->rtl == 1)
                                                        {{ $data->name_ar }}
                                                    @else
                                                        {{ $data->name }}
                                                    @endif
                                                </a></h3>
                                            @if (!empty($data->date))
                                                <span class="event-date thm-clr d-block">{{ $data->date }}</span>
                                            @endif
                                            <ul class="event-grid-meta mb-0 list-unstyled d-flex flex-wrap">
                                                @if (!empty($data->time))
                                                    <li><i class="far fa-clock"></i>{{ $data->time }}</li>
                                                @endif
                                                @if (!empty($data->price_from))
                                                    <li><i class="fas fa-tags"></i>{{ $data->price_from }}</li>
                                                @endif
                                            </ul>
                                            @if (!empty($data->location))
                                                <span class="event-loc d-block"><i
                                                        class="fas fa-map-pin"></i>{{ $data->location }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!-- Event Grid Wrap -->
                </div>
            </div>
        </section>
    @endif


    <section>
        <div class="w-100 pt-100 pb-100 position-relative">
            <div class="container">
                <div class="sponsors-wrap w-100">
                    <div class="sponsor-caro">

                        @foreach ($productt->galleries as $gal)
                            <div class="text-center w-100">
                                <a href="javascript:void(0);" title=""><img class="img-fluid d-inline-block"
                                        src="{{ asset(access_public() . 'assets/images/galleries/' . $gal->photo) }}"
                                        alt="Sponsor Image 1"></a>
                            </div>
                        @endforeach
                    </div>
                </div><!-- Sponsors Wrap -->
            </div>
        </div>
    </section>
@stop
