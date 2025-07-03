<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

        $services = DB::table('our_teams')->get();
        $solutions = App\Models\Product::where('status', 1)->get();
        $about_uss = DB::table('brands')->where('status', 1)->get();
    @endphp








    @if (isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        <title>@yield('title') -
            @if ($langg->rtl == 1)
                {{ $gs->title_ar }}
            @else
                {{ $gs->title }}
            @endif
        </title>
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
    @elseif(isset($productt))
        <meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag) : '' }}">
        <meta name="description"
            content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}">
        <meta property="og:title" content="{{ $productt->name }}" />
        <meta property="og:id" content="{{ $productt->id }}" />
        <meta property="og:description"
            content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}" />
        <meta property="og:image"
            content="{{ asset(access_public() . 'assets/images/products/' . $productt->photo) }}" />
        <meta name="author" content="{{ $gs->title }}">
        <title>
            @if ($langg->rtl == 1)
                {{ substr($productt->name_ar, 0, 20) . '-' }}{{ $gs->title_ar }}
            @else
                {{ substr($productt->name, 0, 11) . '-' }}{{ $gs->title }}
            @endif -
            @if ($langg->rtl == 1)
                {{ $gs->title_ar }}
            @else
                {{ $gs->title }}
            @endif
        </title>
    @else
        <meta name="+author" content="{{ $gs->title }}">
        <title>
            @yield('title')
        </title>
    @endif

    @if (isset($seo->product_analytics))
        @yield('prod_seo')
    @endif






    @if (isset($seo->meta_keys))


        @if ($langg->rtl == 1)
            <meta name="keywords" content="{!! $seo->meta_keys_ar !!}">
        @else
            <meta name="keywords" content="{{ $seo->meta_keys }}">
        @endif



    @endif


    @if (isset($seo->meta_description))


        @if ($langg->rtl == 1)
            <meta name="description"
                content="{{ $seo->meta_description_ar != null ? $seo->meta_description_ar : strip_tags($productt->description_ar) }}">
        @else
            <meta name="description"
                content="{{ $seo->meta_description != null ? $seo->meta_description : strip_tags($seo->description) }}">
        @endif



    @endif

    @if (isset($seo->google_analytics))
        {!! $seo->google_analytics !!}
    @endif


    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{url('/')}}",
      "logo": "{{asset(access_public() . 'assets/images/'.$gs->logo)}}"
    }
    </script>
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{$gs->title}}",
    "url": "{{url('/')}}",
    "description": "",
    "image": "{{asset(access_public() . 'assets/images/'.$gs->logo)}}",
      "logo": "{{asset(access_public() . 'assets/images/'.$gs->logo)}}",
      "sameAs": ["{{ App\Models\Socialsetting::find(1)->facebook }}", "{{ App\Models\Socialsetting::find(1)->twitter }}", "{{ App\Models\Socialsetting::find(1)->instagram }}"],
    "telephone": "{{$ps->phone}}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "{{$ps->street}}",
      "addressLocality": "{{$ps->street_ar}}",
      "addressRegion": "Cairo",
      "postalCode": "11341",
      "addressCountry": "Egypt"
    }
  }
</script>






    {!! $seo->facebook_pixel !!}


    @yield('gsearch')
    <!-- Google Font -->

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(access_public() . 'assets/images/' . $gs->favicon) }}" />
    <!-- bootstrap -->



    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/linearicons.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/ionicons.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/fontello.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/featherIcons.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/swiper.min.css') }}" />
    <!-- <link rel="stylesheet" href="./css/slick.css" /> -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/lineaer-icons.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/fotorama.css') }}" />


    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/lightgallery.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/hamburgers.css') }}" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/almaclinic/css/index.css') }}" />






    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/front/css/toastr.css') }}">

    @yield('css')
</head>


<body>
    <!--
<div class="loading-div">
  <img src="./images/icons/loading.gif" alt="img" />
</div>
-->

    <!-- <body> -->
    <!-- start header -->
    <div class="header-md">
        <div class="logo-lines">
            <div class="container">
                <div class="lines hamburger hamburger--elastic">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <div class="logo-img">
                    <a href="{{ route('front.index', $sign) }}">
                        <img src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}" alt="img">
                    </a>
                </div>
                <div class="phone-email">
                    <a href="tel:{{ $ps->phone }}">
                        <div class="phone">
                            <i class="ion-ios-telephone-outline"></i>
                            <span>{{ $ps->phone }}</span>
                        </div>
                    </a>
                    @if (!empty($ps->fax))
                        <a href="https://api.whatsapp.com/send/?phone={{ $ps->fax }}&text&app_absent=0">
                            <div class="whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                <span>{{ $ps->fax }}</span>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="main-header-md-ul-div">
            <ul class="main-header-md-ul">
                <li class="active-li">
                    <a href="{{ route('front.index', $sign) }}">
                        <span>
                            {{ $langg->lang17 }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('front.about', $sign) }}">
                        <span>
                            {{ $langg->lang16 }}
                        </span>
                    </a>
                </li>
                <li class="drop-li">
                    <a href="{{ route('front.categories', $sign) }}" class="drop-a">
                        <span>
                            {{ $langg->lang11 }}
                        </span>
                        <i class="ion-chevron-left"></i>
                    </a>
                    <ul class="dropped-ul">


                        @foreach ($categories as $category)
                            <li class="drop-li">


                                <a href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}

                            @else
                            {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif"
                                    class="drop-a">
                                    <span>
                                        @if ($langg->rtl == 1)
                                            {{ $category->name_ar }}
                                        @else
                                            {{ $category->name }}
                                        @endif
                                    </span>

                                    {{-- @if (count($category->subs) > 0)    <i class="ion-chevron-left"></i> @endif --}}
                                </a>
                                {{-- @if (count($category->subs) > 0)
                                <ul class="dropped-ul">
                                    @foreach ($category->subs as $subcat)
                                        <li>
                                            <a href="@if ($langg->rtl == 1)
                                            {{ route('front.category',['category' => $category->slug_ar, 'subcategory' => $subcat->slug_ar , 'lang' => $sign]) }}

                                            @else
                                            {{ route('front.category',['category' => $category->slug, 'subcategory' => $subcat->slug , 'lang' => $sign]) }}

                                            @endif">
                      <span>
   @if ($langg->rtl == 1)
                              {{$subcat->name_ar}}
                          @else
                              {{$subcat->name}}
                          @endif
                      </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                            @endif --}}
                            </li>
                        @endforeach
                        {{--   <li>
                        <a href="./service-details.html">
                <span>
                                  ديرما بن

                </span>
                        </a>
                    </li>
                   --}}

                    </ul>
                </li>
                <li class="drop-li">
                    <a href="#" class="drop-a">
                        <span>
                            {{ $langg->lang223 }}
                        </span>
                        <i class="ion-chevron-left"></i>
                    </a>
                    <ul class="dropped-ul">

                        <li>
                            <a href="{{ route('front.gallery', $sign) }}">
                                <span>
                                    {{ $langg->lang18 }}

                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.video', $sign) }}">
                                <span>

                                    {{ $langg->lang221 }}

                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('front.offerss', $sign) }}">
                        <span>
                            {{ $langg->lang7 }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('front.contact', $sign) }}">
                        <span>
                            {{ $langg->lang20 }}
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="header-lg">
        <div class="header-lg-top">
            <div class="container">
                <ul class="social-ul">

                    @if (App\Models\Socialsetting::find(1)->t_status == 1)
                        <li>
                            <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" class="twitter-link">
                                <i class="fontello icon-twitter"></i>
                            </a>
                        </li>
                    @endif

                    {{--   <li>
                       <a href="#" class="snapchat-link">
                           <i class="fontello icon-snapchat-ghost"></i>
                       </a>
                   </li> --}}
                    @if (App\Models\Socialsetting::find(1)->i_status == 1)
                        <li>
                            <a href=" {{ App\Models\Socialsetting::find(1)->instagram }}" class="instagram-link">
                                <i class="fontello icon-instagram"></i>
                            </a>
                        </li>
                    @endif
                    @if (App\Models\Socialsetting::find(1)->f_status == 1)
                        <li>
                            <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" class="facebook-link">
                                <i class="fontello icon-facebook"></i>
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="phone-email">
                    <div class="phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <span>{{ $ps->phone }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-lg-bottom container">
            <ul class="main-header-lg-ul">
                <li class="active-li">
                    <a href="{{ route('front.index', $sign) }}">
                        <span>
                            {{ $langg->lang17 }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('front.about', $sign) }}">
                        <span>
                            {{ $langg->lang16 }}
                        </span>
                    </a>
                </li>


                <li class="hover-li">
                    <a href="{{ route('front.categories', $sign) }}" class="hover-a">
                        <span>
                            {{ $langg->lang11 }}
                        </span>
                        <i class="lnr lnr-chevron-down"></i>
                    </a>
                    <ul class="hovered-ul">

                        @foreach ($categories as $category)
                            <li class="drop-li">


                                <a href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}

                            @else
                            {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif"
                                    class="drop-a">
                                    <span>
                                        @if ($langg->rtl == 1)
                                            {{ $category->name_ar }}
                                        @else
                                            {{ $category->name }}
                                        @endif
                                    </span>

                                    {{--             @if (count($category->subs) > 0)    <i class="ion-chevron-left"></i> @endif --}}
                                </a>
                                {{--  @if (count($category->subs) > 0)
                                <ul class="dropped-ul">
                                    @foreach ($category->subs as $subcat)
                                        <li>
                                            <a href="@if ($langg->rtl == 1)
                                            {{ route('front.category',['category' => $category->slug_ar, 'subcategory' => $subcat->slug_ar , 'lang' => $sign]) }}

                                            @else
                                            {{ route('front.category',['category' => $category->slug, 'subcategory' => $subcat->slug , 'lang' => $sign]) }}

                                            @endif">
                      <span>
   @if ($langg->rtl == 1)
                              {{$subcat->name_ar}}
                          @else
                              {{$subcat->name}}
                          @endif
                      </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                            @endif --}}
                            </li>
                        @endforeach
                        {{--  <li>
                        <a href="./service-details.html">
                <span>
                                  ديرما بن

                </span>
                        </a>
                    </li>
                  --}}
                    </ul>
                </li>


                <li class="img-li">
                    <a href="{{ route('front.index', $sign) }}">
                        <img src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}" alt="img">
                    </a>
                </li>
                <li class="hover-li">
                    <a href="services.html" class="hover-a">
                        <span>
                            {{ $langg->lang223 }}
                        </span>
                        <i class="lnr lnr-chevron-down"></i>
                    </a>
                    <ul class="hovered-ul">


                        <li>
                            <a href="{{ route('front.gallery', $sign) }}">
                                <span>
                                    {{ $langg->lang18 }}

                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.video', $sign) }}">
                                <span>

                                    {{ $langg->lang221 }}

                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('front.offerss', $sign) }}">
                        <span>
                            {{ $langg->lang7 }}
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('front.contact', $sign) }}">
                        <span>
                            {{ $langg->lang20 }}
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- end header -->



    @yield('content')

    <!-- ============================ Footer Start ================================== -->

    <!-- start all footer -->
    <footer>
        <div class="top-footer">
            <div class="mfa-container">
                <div class="section-one">
                    <div class="section-body">
                        <a href="{{ route('front.index', $sign) }}" class="logo-img">
                            <img src="{{ asset(access_public() . 'assets/images/' . $gs->contact_icon) }}"
                                alt="img">
                        </a>
                        <div class="text">
                            <p>
                                @if ($langg->rtl == 1)
                                    {!! $gs->footer_ar !!}
                                @else
                                    {!! $gs->footer !!}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="section-two">
                    <div class="section-heading">
                        <p>
                            {{ $langg->lang11 }}
                        </p>
                    </div>
                    <div class="section-body">
                        <ul class="main-section-ul">

                            @foreach ($categories->take(5) as $category)
                                <li>
                                    <a
                                        href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}

                            @else
                            {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                                        <span>
                                            @if ($langg->rtl == 1)
                                                {{ $category->name_ar }}
                                            @else
                                                {{ $category->name }}
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            @endforeach



                        </ul>
                    </div>
                </div>
                <div class="section-two">
                    <div class="section-heading">
                        <p>
                            {{ $langg->lang13 }}
                        </p>
                    </div>
                    <div class="section-body">
                        <ul class="main-section-ul">
                            <li>
                                <a href="{{ route('front.index', $sign) }}">
                                    <span>
                                        {{ $langg->lang17 }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.about', $sign) }}">
                                    <span>
                                        {{ $langg->lang16 }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.categories', $sign) }}">
                                    <span>
                                        {{ $langg->lang11 }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.gallery', $sign) }}">
                                    <span>
                                        {{ $langg->lang18 }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.video', $sign) }}">
                                    <span>
                                        {{ $langg->lang221 }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog', $sign) }}">
                                    <span>
                                        {{ $langg->lang222 }}
                                    </span>
                                </a>
                            </li>
                            {{--  <li>
                            <a href="albums.html">
                  <span>
                    اراء المرضي
                  </span>
                            </a>
                        </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="section-three">
                    <!-- <div class="img-div">
                    <img src="./images/logo/logo.png" alt="logo">
                  </div> -->
                    <div class="section-body">

                        <div class="contact-info">
                            <div class="address">
                                {!! $ps->map !!}
                            </div>
                            <div class="phone">
                                <span>
                                    {{ $ps->phone }}
                                </span>
                            </div>
                        </div>
                        <ul class="social-links">
                            @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                <li>
                                    <a href="{{ App\Models\Socialsetting::find(1)->facebook }}">
                                        <i class="ion-social-facebook-outline"></i>
                                    </a>
                                </li>
                            @endif

                            @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                <li>
                                    <a href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                        <i class="ion-social-twitter-outline"></i>
                                    </a>
                                </li>
                            @endif

                            @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                <li>
                                    <a href="{{ App\Models\Socialsetting::find(1)->instagram }}">
                                        <i class="ion-social-instagram-outline"></i>
                                    </a>
                                </li>
                            @endif

                            @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                                <li>
                                    <a href="{{ App\Models\Socialsetting::find(1)->youtube }}">
                                        <i class="ion-social-youtube-outline"></i>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-footer">
            <div class="mfa-container">
                <p>
                    @if ($langg->rtl == 1)
                        {!! $gs->copyright_ar !!}
                    @else
                        {!! $gs->copyright !!}
                    @endif
                </p>
            </div>
        </div>
    </footer>
    <!-- end all footer -->
    @if (!empty($ps->w_phone))
        <a href="{{ $ps->w_phone }}" target="_blank" class="btn-whatsapp-pulse">
            <i class="fab fa-whatsapp"></i>
        </a>
    @endif
    @if (App\Models\Socialsetting::find(1)->i_status == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->instagram }}" target="_blank" class="btn-instagram-pulse2">
            <i class="fab fa-instagram"></i>

        </a>
    @endif
    @if (App\Models\Socialsetting::find(1)->f_status == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank" class="btn-facebook-pulse">
            <i class="fab fa-facebook-f"></i>

        </a>
    @endif

    @if (!empty($ps->phone))
        <a href="tel:{{ $ps->phone }}" class="btn-phone-pulse">
            <i class="fas fa-phone-alt"></i>
        </a>
    @endif





    <script src="{{ asset(access_public() . 'assets/almaclinic/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/js/aos.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/popper.min.js"></script>
    <!-- <script src="./js/jquery.counterup.js"></script> -->
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/jquery.fancybox.min.js"></script>
    <!-- <script src="./js/jquery-ui.min.js"></script> -->
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/swiper.min.js"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/jquery.js"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/slick.min.js"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/fotorama.js"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/lightgallery.js"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/lg-thumbnail.js"></script>
    <script src="{{ asset(access_public() . 'assets/almaclinic/') }}/js/owl.carousel.min.js"></script>


    <script src="{{ asset(access_public() . 'assets/almaclinic/js/index.js') }}"></script>



    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    </script>


    <script src="{{ asset(access_public() . 'assets/admin/js/toastr.js') }}"></script>
    <script type="text/javascript">
        var mainurl = "{{ url('/' . $sign) }}";
        var mainurl2 = "{{ url('/') }}";
        var gs = {!! json_encode($gs) !!};
        var langg = {!! json_encode($langg) !!};
        var mainurl2 = "{{ url('/') }}";

        $(".selectors").on('change', function() {
            var url = $(this).val();
            window.location = url;
        });
    </script>
    <Script>
        $(document).on('submit', '#subscribeform', function(e) {
            e.preventDefault();
            console.log(12);
            $('#sub-btn').prop('disabled', true);
            console.log(13);
            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(14);
                    if ((data.errors)) {
                        console.log(15);
                        $('.alert-danger').show();
                        $('.alert-danger ul').html('');
                        for (var error in data.errors) {
                            $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                        }

                    } else {
                        console.log(16);
                        toastr.success(langg.subscribe_success);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.alert-success p').html(langg.subscribe_success);

                    }

                    $('#sub-btn').prop('disabled', false);


                }

            });

        });
    </script>


    <script>
        $(document).on('submit', '#email-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#email-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#email-form .response').html(
                        '<div class="text-info"><img src="{{ asset(access_public() . 'assets/images/preloader.gif') }}"> Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#email-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#email-form .response').append('<li>' + data.errors[error] + '</li>')
                        }
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#email-form .response').html(data);
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .val('');
                        $('#email-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });

        $(document).on('submit', '#appointment-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#appointment-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#appointment-form .response').html(
                        '<div class="text-info"><img src="{{ asset(access_public() . 'assets/images/preloader.gif') }}"> Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#appointment-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#appointment-form .response').append('<li>' + data.errors[error] +
                                '</li>')
                        }
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#appointment-form .response').html(data);
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .val('');
                        $('#appointment-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });
    </script>
    {!! $seo->google_analytics !!}

    @if ($gs->is_talkto == 1)
        <!--Start of Tawk.to Script-->
        {!! $gs->talkto !!}
        <!--End of Tawk.to Script-->
    @endif
    @if ($gs->is_drift == 1)
        <!--Start of drift.to Script-->
        {!! $gs->drift !!}
        <!--End of drift.to Script-->
    @endif
    @if ($gs->is_messenger == 1)
        <!--Start of drift.to Script-->
        {!! $gs->messenger !!}
        <!--End of drift.to Script-->
    @endif
    @yield('js')
</body>

</html>
