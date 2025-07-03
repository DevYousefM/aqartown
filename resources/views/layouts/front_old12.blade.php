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



    <!-- bootstarp -->
    <link rel="stylesheet"
        href="{{ asset(access_public() . 'assets/beautifulhouse/') }}/css/vendors/bootstrap.min.css">

    <!-- Fancybox -->
    <link rel="stylesheet"
        href="{{ asset(access_public() . 'assets/beautifulhouse/') }}/css/vendors/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/beautifulhouse/') }}/css/linearicons.css" />
    <!-- animate.css file -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/beautifulhouse/') }}/css/vendors/animate.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/beautifulhouse/') }}/css/vendors/swiper.min.css">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/beautifulhouse/') }}/css/lightgallery.css" />
    <!-- vegas -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/beautifulhouse/') }}/css/vendors/vegas.min.css">
    <!-- fontAwesome -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/beautifulhouse/') }}/css/vendors/all.min.css">

    <!-- Font Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&amp;display=swap">

    <!-- main-RTL -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/beautifulhouse/') }}/css/index.css">
    <!-- Fixing Internet Explorer-->







    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/front/css/toastr.css') }}">

    @yield('css')
</head>


<body class="rounded-btns">
    <!--
<div class="loading-div">
  <img src="./images/icons/loading.gif" alt="img" />
</div>
-->

    <!-- <body> -->
    <!-- start header -->



    <header class=" page-header light-header menu-on-end  header-basic" id="page-header">
        <div class="header-search-box">
            <div class="close-search"></div>
            <form class="nav-search search-form" role="search" method="get" action="#">
                <div class="search-wrapper">
                    <label class="search-lbl">Search for:</label>
                    <input class="search-input" type="search" placeholder="Search..." name="searchInput"
                        autofocus="autofocus" />
                    <button class="search-btn" type="submit"><i class="fas fa-search icon"></i></button>
                </div>
            </form>
        </div>
        <!--start navbar-->
        <div class="bar-top">
            <div class="container">
                <div class="bar-top-group">
                    <div class="info-panel menu-wrapper">
                        <div class="list-js info-list"><i class="fas fa-times close-icon"></i>
                            <div class="info-list-inner">
                                <div class="info info-panel-logo">
                                    <div class="logo"><img class="logo-img light-logo"
                                            src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}"
                                            alt="logo"></div>
                                    <h3 class="info-title ">Who We Are?</h3>
                                    <div class="info-text">
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Minus praesentium
                                            consequuntur cumque labore modi voluptatum fugit animi tempore id
                                            perspiciatis!</p>
                                    </div>
                                </div>
                                <h3 class="info-title">contact info</h3>
                                <div class="info">
                                    <div class="info-icon"><i class="fas fa-map-marker-alt  icon"></i></div>
                                    <div class="info-text"><span class="text">
                                            {{ $langg->rtl == 1 ? $ps->street_ar : $ps->street }} </span><span
                                            class="sub-text"> {{ $langg->rtl == 1 ? $ps->street_ar : $ps->street }}
                                        </span></div>
                                </div>
                                <div class="info">
                                    <div class="info-icon"><i class="far fa-envelope  icon"></i></div>
                                    <div class="info-text"><span class="text ">{{ $ps->email }}</span><a
                                            class="sub-text info-link"
                                            href="mailto:{{ $ps->email }}">{{ $ps->email }}</a></div>
                                </div>
                                <div class="info">
                                    <div class="info-icon"> <i class="fas fa-mobile-alt  icon"></i></div>
                                    <div class="info-text"><span class="text ">{{ $ps->phone }}</span><a
                                            class="sub-text info-link"
                                            href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a></div>
                                </div>
                            </div>
                            <div class="social-icons">
                                <h3 class="info-title">follow us</h3>
                                <div class="sc-wrapper dir-row sc-flat">
                                    <ul class="sc-list">

                                        @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                            <li class="sc-item " title="Facebook">
                                                <a class="sc-link"
                                                    href="{{ App\Models\Socialsetting::find(1)->facebook }}"><i
                                                        class="fab fa-facebook-f sc-icon"></i></a>
                                            </li>
                                        @endif
                                        @if (App\Models\Socialsetting::find(1)->y_status == 1)
                                            <li class="sc-item " title="youtube"><a class="sc-link"
                                                    href="{{ App\Models\Socialsetting::find(1)->youtube }}"><i
                                                        class="fab fa-youtube sc-icon"></i></a></li>
                                        @endif
                                        @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                            <li class="sc-item " title="instagram"><a class="sc-link"
                                                    href="{{ App\Models\Socialsetting::find(1)->instagram }}"><i
                                                        class="fab fa-instagram sc-icon"></i></a></li>
                                        @endif
                                        @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                            <li class="sc-item " title="twitter"><a class="sc-link"
                                                    href="{{ App\Models\Socialsetting::find(1)->twitter }}"><i
                                                        class="fab fa-twitter sc-icon"></i></a></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bar-bottom">
            <div class="container">
                <nav class="menu-navbar">
                    <div class="header-logo"><a class="logo-link" href="{{ route('front.index', $sign) }}"><img
                                class="logo-img light-logo"
                                src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}"
                                alt="logo" /><img class="logo-img  dark-logo"
                                src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}"
                                alt="logo" /></a></div>
                    <div class="links menu-wrapper ">
                        <ul class="list-js links-list">
                            <li class="menu-item"><a class="menu-link"
                                    href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a>

                            <li class="menu-item"><a class="menu-link" href="{{ route('front.about', $sign) }}">
                                    {{ $langg->lang16 }}</a></li>
                            <li class="menu-item"><a class="menu-link"
                                    href="{{ route('front.latestwork', $sign) }}">اعمال السابقة</a></li>

                            @foreach ($categories as $category)
                                <li class="menu-item has-sub-menu"><a class="menu-link  "
                                        href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}

                                @else
                                {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                                        @if ($langg->rtl == 1)
                                            {{ $category->name_ar }}
                                        @else
                                            {{ $category->name }}
                                        @endif
                                        <i class="fas fa-chevron-down down-Arrow-icon"> </i>
                                    </a>
                                    @if (count($category->subs) > 0)
                                        <ul class="sub-menu ">
                                            @foreach ($category->subs as $subcat)
                                                <li class="menu-item sub-menu-item"><a
                                                        class="menu-link sub-menu-link  "
                                                        href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}

                                                                           @else
                                                                           {{ route('front.category', ['category' => $category->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }} @endif">
                                                        @if ($langg->rtl == 1)
                                                            {{ $subcat->name_ar }}
                                                        @else
                                                            {{ $subcat->name }}
                                                        @endif 1
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                            {{-- <li class="menu-item has-sub-menu"><a class="menu-link  " href="#0">الدريسينج رووم<i
                                            class="fas fa-chevron-down down-Arrow-icon"> </i></a>
                                <ul class="sub-menu ">
                                    <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  "
                                                                           href="services-details.html">خدماتنا 1</a></li>
                                    <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  "
                                                                           href="services-details.html">خدماتنا 2 </a></li>
                                    <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  "
                                                                           href="services-details.html">خدماتنا 3 </a></li>
                                </ul>
                            </li> --}}

                            <li class="menu-item has-sub-menu"><a class="menu-link  "
                                    href="#0">{{ $langg->lang223 }}<i
                                        class="fas fa-chevron-down down-Arrow-icon"> </i></a>
                                <ul class="sub-menu ">
                                    <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  "
                                            href="{{ route('front.gallery', $sign) }}">{{ $langg->lang18 }}</a></li>
                                    <li class="menu-item sub-menu-item"><a class="menu-link sub-menu-link  "
                                            href="{{ route('front.video', $sign) }}">{{ $langg->lang221 }} </a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a class="menu-link  "
                                    href="{{ route('front.contact', $sign) }}">{{ $langg->lang20 }} </a></li>
                        </ul>
                    </div>
                    <div class="controls-box">
                        <div class="control header-search-btn">
                            <svg class="search-icon" width="60" height="60" viewBox="0 0 60 60">
                                <g transform="translate(-1460 -905)">
                                    <g transform="translate(1460 905)">
                                        <g transform="translate(0 0)">
                                            <path class="search-path"
                                                d="M59.634,56.1,42.2,38.669A23.8,23.8,0,1,0,38.669,42.2L56.1,59.634a1.25,1.25,0,0,0,1.768,0l1.767-1.767A1.25,1.25,0,0,0,59.634,56.1ZM23.75,42.5A18.75,18.75,0,1,1,42.5,23.75,18.771,18.771,0,0,1,23.75,42.5Z"
                                                transform="translate(0 0)"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="control  info-toggler"><span> </span><span> </span><span></span></div>
                        <div class="control  menu-toggler"><span></span><span></span><span></span></div>
                    </div>
                    <!-- <a class="btn-solid header-cta-btn" href="#">Get started</a> -->
                </nav>
            </div>
        </div>
        <!--End navbar-->
    </header>
    <!-- end header -->



    @yield('content')

    <!-- ============================ Footer Start ================================== -->

    <!-- Start  page-footer Section-->
    <footer class="page-footer dark-color-footer" id="page-footer">
        <div class="overlay-photo-image-bg"></div>
        <div class="container">
            <div class="row footer-cols">
                <div class="col-12 col-md-8 col-lg-4  footer-col wow fadeInUp " data-wow-delay="0.3s"><img
                        class="img-fluid footer-logo"
                        src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}" alt="logo" />
                    <div class="footer-col-content-wrapper">
                        <p class="footer-text-about-us ">
                            @if ($langg->rtl == 1)
                                {!! $gs->footer_ar !!}
                            @else
                                {!! $gs->footer !!}
                            @endif
                        </p>
                        <div class="social-icons">
                            <div class="sc-wrapper dir-row sc-size-32">
                                <ul class="sc-list">

                                    {{--  <li class="sc-item " title="Facebook"><a class="sc-link" href="#0"><i
                                                class="fab fa-facebook-f sc-icon"></i></a></li>
                                <li class="sc-item " title="youtube"><a class="sc-link" href="#0"><i
                                                class="fab fa-youtube sc-icon"></i></a></li>
                                <li class="sc-item " title="instagram"><a class="sc-link" href="#0"><i
                                                class="fab fa-instagram sc-icon"></i></a></li>
                                <li class="sc-item " title="twitter"><a class="sc-link" href="#0"><i
                                                class="fab fa-twitter sc-icon"></i></a></li> --}}

                                    @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                        <li class="sc-item " title="Facebook">
                                            <a class="sc-link"
                                                href="{{ App\Models\Socialsetting::find(1)->facebook }}"><i
                                                    class="fab fa-facebook-f sc-icon"></i></a>
                                        </li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->y_status == 1)
                                        <li class="sc-item " title="youtube"><a class="sc-link"
                                                href="{{ App\Models\Socialsetting::find(1)->youtube }}"><i
                                                    class="fab fa-youtube sc-icon"></i></a></li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                        <li class="sc-item " title="instagram"><a class="sc-link"
                                                href="{{ App\Models\Socialsetting::find(1)->instagram }}"><i
                                                    class="fab fa-instagram sc-icon"></i></a></li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                        <li class="sc-item " title="twitter"><a class="sc-link"
                                                href="{{ App\Models\Socialsetting::find(1)->twitter }}"><i
                                                    class="fab fa-twitter sc-icon"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  <div class="col-12 col-md-6 col-lg-2  footer-col wow fadeInUp " data-wow-delay="0.5s">
                <h2 class=" footer-col-title    ">المطابخ
                </h2>
                <div class="footer-col-content-wrapper">
                    <ul class="footer-menu ">
                        <li class="footer-menu-item"><i class="fas fa-arrow-left icon "></i><a class="footer-menu-link"
                                                                                               href="#0">طلب الكتالوج</a>
                        </li>
                        <li class="footer-menu-item"><i class="fas fa-arrow-left icon "></i><a class="footer-menu-link"
                                                                                               href="#0">اطلب موعدًا</a>
                        </li>
                        <li class="footer-menu-item"><i class="fas fa-arrow-left icon "></i><a class="footer-menu-link"
                                                                                               href="#0">معارضنا</a>
                        </li>
                        <li class="footer-menu-item"><i class="fas fa-arrow-left icon "></i><a class="footer-menu-link"
                                                                                               href="#0">تابعنا على</a>
                        </li>
                    </ul>
                </div>
            </div> --}}

                @foreach ($categories->take(2) as $category)
                    <div class="col-12 col-md-6 col-lg-2 footer-col wow fadeInUp " data-wow-delay=".7s">
                        <h2 class=" footer-col-title    ">
                            @if ($langg->rtl == 1)
                                {{ $category->name_ar }}
                            @else
                                {{ $category->name }}
                            @endif
                        </h2>
                        <div class="footer-col-content-wrapper">
                            @if (count($category->subs) > 0)
                                <ul class="footer-menu">
                                    @foreach ($category->subs as $subcat)
                                        <li class="footer-menu-item"><i class="fas fa-arrow-left icon "></i>
                                            <a class="footer-menu-link"
                                                href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}

                                                                                               @else
                                                                                               {{ route('front.category', ['category' => $category->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }} @endif">
                                                @if ($langg->rtl == 1)
                                                    {{ $subcat->name_ar }}
                                                @else
                                                    {{ $subcat->name }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="col-12 col-md-8   col-lg-4 footer-col wow fadeInUp " data-wow-delay=".9s">
                    <h2 class=" footer-col-title    ">تابعنا عبر</h2>
                    <div class="footer-col-content-wrapper">
                        <div class="contact-info-card"><i class="fas fa-envelope icon"></i><a
                                class="text-lowercase  info"
                                href="mailto:{{ $ps->email }}">{{ $ps->email }}</a></div>
                        {{--   <div class="contact-info-card"><i class="fas fa-globe-africa icon"></i><a class="text-lowercase  info"
                                                                                              href="#0">www.yoursite.com</a></div> --}}
                        <div class="contact-info-card"><i class="fas fa-map-marker-alt icon"></i><span
                                class="text-lowercase  info"> {{ $langg->rtl == 1 ? $ps->street_ar : $ps->street }}
                            </span></div>
                        <div class="contact-info-card"><i class="fas fa-mobile-alt icon"></i><a class="info"
                                href="tel:{{ $ps->phone }}">{{ $ps->phone }} </a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights ">
            <div class="container">
                <p class="creadits">

                    @if ($langg->rtl == 1)
                        {!! $gs->copyright_ar !!}
                    @else
                        {!! $gs->copyright !!}
                    @endif
                </p>
            </div>
        </div>
    </footer>
    <!-- End  page-footer Section-->
    <!-- Start loading-screen Component-->
    <!-- <div class="loading-screen" id="loading-screen"><span class="bar top-bar"></span><span
    class="bar down-bar"></span><span class="progress-line"></span><span class="loading-counter"> </span></div> -->
    <!-- End loading-screen Component-->
    <!-- Start back-to-top Component-->
    <div class="back-to-top" id="back-to-top"><i class="fas fa-arrow-up icon"></i></div>
    <!-- End back-to-top Component-->



    <!-- end all footer -->






    <!--     JQuery     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/jquery-3.4.1.min.js"></script>

    <!--     bootstrap     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/bootstrap.bundle.min.js"></script>

    <!--     fancybox     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/jquery.fancybox.min.js"></script>

    <!--     countTo     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/jquery.countTo.js"></script>

    <!--     wow     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/wow.min.js"></script>

    <!--     swiper     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/swiper.min.js"></script>
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/vegas.min.js"></script>
    <!--     Vanilla-tilt     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/vanilla-tilt.min.js"></script>

    <!--     isotope     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/isotope-min.js"></script>
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/lightgallery.js"></script>

    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/lg-thumbnail.js"></script>
    <!--     ajaxchimp     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/vendors/jquery.ajaxchimp.min.js"></script>

    <!--     main     -->
    <script src="{{ asset(access_public() . 'assets/beautifulhouse/') }}/js/main.js"></script>



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
