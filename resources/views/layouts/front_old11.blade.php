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




    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/wketchien/') }}/css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/wketchien/') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/wketchien/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/wketchien/') }}/css/swiper.min.css">
    <!--Color Switcher Mockup-->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/wketchien/') }}/css/color-switcher-design.css">
    <link href="{{ asset(access_public() . 'assets/wketchien/') }}/css/plugins/line-icons.css" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/wketchien/') }}/css/plugins/iconfont.css" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/wketchien/') }}/css/plugins/flaticon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/wketchien/') }}/css/venobox.css">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/wketchien/') }}/js/lightgallery.css">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/wketchien/') }}/css/odometer.min.css">
    <!--Color Themes-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css"
        href="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/themify/themify-icons.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset(access_public() . 'assets/wketchien/') }}/css/banner-rotator.css">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/wketchien/') }}/css/color-themes/default-theme.css"
        id="theme-color-file">
    <!-- Favicon -->


    <!-- Fixing Internet Explorer-->







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

    <div class="boxed_wrapper">

        <!-- <div class="preloader"></div>  -->

        <!--Start header style1 area-->
        <header class="header-style1-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="inner-content clearfix">
                            <div class="header-style1-logo float-left">
                                <a href="{{ route('front.index', $sign) }}">
                                    <img src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}"
                                        alt="Awesome Logo">
                                </a>
                            </div>
                            <div class="header-contact-info float-left">
                                <ul>
                                    <li>
                                        <div class="single-item">
                                            <div class="icon">
                                                <span class="icon-book"></span>
                                            </div>
                                            <div class="text">
                                                <span>{{ $langg->lang11 }} </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-item">
                                            <div class="icon">
                                                <span class="icon-support"></span>
                                            </div>
                                            <div class="text">
                                                <span><a href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a></span>
                                                <br>
                                                <span>{{ $langg->lang222 }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-item">
                                            <div class="icon">
                                                <span class="icon-gps"></span>
                                            </div>
                                            <div class="text">
                                                <span>{{ $langg->lang7 }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--End header style1 area-->

        <!--Start mainmenu area-->
        <section class="mainmenu-area stricky">
            <div class="container">
                <div class="inner-content clearfix">
                    <nav class="main-menu style1 clearfix">
                        <div class="navbar-header clearfix">
                            <a href="{{ route('front.index', $sign) }}">
                                <img src="{{ asset(access_public() . 'assets/images/' . $gs->sidebar_logo) }}"
                                    alt="">
                            </a>
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="current"><a
                                        href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                                <li><a href="{{ route('front.about', $sign) }}"> {{ $langg->lang16 }} </a></li>

                                @foreach ($categories as $category)
                                    <li class="dropdown"><a
                                            href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}

                                @else
                                {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                                            @if ($langg->rtl == 1)
                                                {{ $category->name_ar }}
                                            @else
                                                {{ $category->name }}
                                            @endif
                                        </a>
                                        @if (count($category->subs) > 0)
                                            <ul>
                                                @foreach ($category->subs as $subcat)
                                                    <li><a
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
                                    </li>
                                @endforeach



                                <li class="dropdown"><a href="#">{{ $langg->lang223 }}</a>
                                    <ul>
                                        <li><a href="{{ route('front.gallery', $sign) }}">{{ $langg->lang18 }}</a>
                                        </li>
                                        <li><a href="{{ route('front.video', $sign) }}">{{ $langg->lang221 }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('front.offerss', $sign) }}"> {{ $langg->lang7 }}</a></li>
                                <li><a href="{{ route('front.contact', $sign) }}">{{ $langg->lang20 }} </a></li>
                            </ul>
                        </div>
                    </nav>


                </div>
            </div>
        </section>


        <!-- end header -->



        @yield('content')

        <!-- ============================ Footer Start ================================== -->

        <!-- start all footer -->
        <!--Start Footer Contact Info Area-->
        <section class="footer-contact-info-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="single-footer-contact-box left-icon wow fadeInDown" data-wow-delay="100ms">
                            <div class="icon-holder">
                                <span class="icon-gps"></span>
                            </div>
                            <div class="text-holder">
                                <a href="{{ route('front.offerss', $sign) }}">
                                    <h3>{{ $langg->lang13 }} </h3>
                                    <p>{{ $langg->lang220 }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="single-footer-contact-box right-box wow fadeInUp" data-wow-delay="100ms">
                            <div class="icon-holder">
                                <span class="icon-calendar"></span>
                            </div>
                            <div class="text-holder">
                                <a href="{{ route('front.contact', $sign) }}">
                                    <h3>{{ $langg->lang2 }} </h3>
                                    <p>{{ $langg->lang1 }}</p>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Footer Contact Info Area-->

        <!--Start footer area-->
        <footer class="footer-area">
            <div class="container">
                <div class="row">

                    <!--Start single footer widget-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-footer-widget marbtm50">
                            <div class="about-us">
                                <div class="footer-logo fix">
                                    <a href="{{ route('front.index', $sign) }}">
                                        <img src="{{ asset(access_public() . 'assets/images/' . $gs->logo_ar) }}"
                                            alt="Awesome Logo">
                                    </a>
                                </div>
                                <div class="text-box fix">
                                    <p>
                                        @if ($langg->rtl == 1)
                                            {!! $gs->footer_ar !!}
                                        @else
                                            {!! $gs->footer !!}
                                        @endif
                                    </p>
                                </div>
                                <div class="button fix">
                                    <a class="btn-one" href="{{ route('front.about', $sign) }}">{{ $langg->lang3 }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single footer widget-->



                    <!--Start single footer widget-->
                    @foreach ($categories->take(3) as $category)
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="single-footer-widget martop6 pdbtm50">
                                <div class="title">
                                    <h3>
                                        @if ($langg->rtl == 1)
                                            {{ $category->name_ar }}
                                        @else
                                            {{ $category->name }}
                                        @endif
                                    </h3>
                                </div>
                                @if (count($category->subs) > 0)
                                    <ul class="facilities">
                                        @foreach ($category->subs as $subcat)
                                            <li><a href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}

                                @else
                                {{ route('front.category', ['category' => $category->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }} @endif"
                                                    target="_top"
                                                    title=" @if ($langg->rtl == 1) {{ $subcat->name_ar }}
                                @else
                                {{ $subcat->name }} @endif"><span>
                                                        @if ($langg->rtl == 1)
                                                            {{ $subcat->name_ar }}
                                                        @else
                                                            {{ $subcat->name }}
                                                        @endif
                                                    </span></a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endforeach


                    <!--End single footer widget-->

                </div>
            </div>
        </footer>
        <!--End footer area-->

        <!--Start footer bottom area-->
        <section class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner clearfix">
                            <div class="footer-social-links float-left">
                                <ul class="sociallinks-style-one">
                                    @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                        <li>

                                            <span><a href="{{ App\Models\Socialsetting::find(1)->facebook }}"> <i
                                                        class="fab fa-facebook-f"></i></a></span>
                                        </li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                        <li>

                                            <span><a href="{{ App\Models\Socialsetting::find(1)->twitter }}"> <i
                                                        class="fab fa-twitter"></i></a></span>
                                        </li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                        <li>

                                            <span><a href="{{ App\Models\Socialsetting::find(1)->linkedin }}"> <i
                                                        class="fab fa-linkedin"></i></a></span>
                                        </li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                        <li>

                                            <span><a href="{{ App\Models\Socialsetting::find(1)->instagram }}"> <i
                                                        class="fab fa-instagram"></i></a></span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="copyright-text text-center">
                                <p>
                                    @if ($langg->rtl == 1)
                                        {!! $gs->copyright_ar !!}
                                    @else
                                        {!! $gs->copyright !!}
                                    @endif
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End footer bottom area-->

    </div>


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

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target thm-bg-clr" data-target="html"><span class="fa fa-angle-up"></span>
    </div>

    <!-- Color Palate / Color Switcher -->
    <div class="color-palate">
        <div class="color-trigger">
            <i class="fa fa-gear"></i>
        </div>
        <div class="color-palate-head">
            <h6>Choose Your Color</h6>
        </div>
        <div class="various-color clearfix">
            <div class="colors-list">
                <span class="palate default-color active" data-theme-file="css/color-themes/default-theme.css"></span>
                <span class="palate teal-color" data-theme-file="css/color-themes/teal-theme.css"></span>
                <span class="palate navy-color" data-theme-file="css/color-themes/navy-theme.css"></span>
                <span class="palate yellow-color" data-theme-file="css/color-themes/yellow-theme.css"></span>
                <span class="palate blue-color" data-theme-file="css/color-themes/blue-theme.css"></span>
                <span class="palate purple-color" data-theme-file="css/color-themes/purple-theme.css"></span>
                <span class="palate olive-color" data-theme-file="css/color-themes/olive-theme.css"></span>
                <span class="palate red-color" data-theme-file="css/color-themes/red-theme.css"></span>
            </div>
        </div>
        <div class="palate-foo">
            <span>You can easily change and switch the colors.</span>
        </div>
    </div>
    <!-- /.End Of Color Palate -->



    <!-- end all footer -->






    <!-- main jQuery -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/jquery.js"></script>
    <!-- Wow Script -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/wow.js"></script>
    <!-- bootstrap -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/bootstrap.min.js"></script>
    <!-- bx slider -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/jquery.bxslider.min.js"></script>
    <!-- count to -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/jquery.countTo.js"></script>
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/appear.js"></script>
    <!-- owl carousel -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/owl.js"></script>
    <!-- validate -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/validation.js"></script>
    <!-- mixit up -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/jquery.mixitup.min.js"></script>
    <!-- isotope script-->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/isotope.js"></script>
    <!-- Easing -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/jquery.easing.min.js"></script>
    <!-- Gmap helper -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB2uu6KHbLc_y7fyAVA4dpqSVM4w9ZnnUw"></script>
    <!--Gmap script-->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/gmaps.js"></script>
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/map-helper.js"></script>
    <!-- jQuery ui js -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/assets/jquery-ui-1.11.4/jquery-ui.js"></script>
    <!-- Language Switche  -->
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/assets/language-switcher/jquery.polyglot.language.switcher.js">
    </script>
    <!-- jQuery timepicker js -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/assets/timepicker/timePicker.js"></script>
    <!-- Bootstrap select picker js -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/assets/bootstrap-sl-1.12.1/bootstrap-select.js">
    </script>
    <!-- html5lightbox js -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/assets/html5lightbox/html5lightbox.js"></script>
    <!-- html5lightbox js -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!--Color Switcher-->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/color-settings.js"></script>

    <!--Revolution Slider-->
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/jquery.themepunch.revolution.min.js">
    </script>
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/jquery.themepunch.tools.min.js">
    </script>
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/revolution.extension.actions.min.js">
    </script>
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/revolution.extension.carousel.min.js">
    </script>
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js">
    </script>
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js">
    </script>
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/venobox.min.js">
    </script>
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/revolution.extension.migration.min.js">
    </script>
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/revolution.extension.navigation.min.js">
    </script>
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/revolution.extension.parallax.min.js">
    </script>
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/jquery.banner-rotator.js"></script><!-- COMBINING JS  -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/odometer.min.js"></script><!-- COMBINING JS  -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/jquery.easing.1.3.min.js"></script><!-- COMBINING JS  -->
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js">
    </script>
    <script
        src="{{ asset(access_public() . 'assets/wketchien/') }}/plugins/revolution/js/extensions/revolution.extension.video.min.js">
    </script>
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/main-slider-script.js"></script>
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/swiper.min.js"></script>
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/lightgallery.js"></script>
    <!-- thm custom script -->
    <script src="{{ asset(access_public() . 'assets/wketchien/') }}/js/custom.js"></script>


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
