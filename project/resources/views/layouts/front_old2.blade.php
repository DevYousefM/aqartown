<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

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
        <meta property="og:image" content="{{ asset('assets/images/products/' . $productt->photo) }}" />
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
      "logo": "{{asset('assets/images/'.$gs->logo)}}"
    }
    </script>
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{$gs->title}}",
    "url": "{{url('/')}}",
    "description": "",
    "image": "{{asset('assets/images/'.$gs->logo)}}",
      "logo": "{{asset('assets/images/'.$gs->logo)}}",
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
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/' . $gs->favicon) }}" />
    <!-- bootstrap -->



    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/animate.min.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://unpkg.com/accordion-js@3.1.1/dist/accordion.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/accordion-js@3.1.1/dist/accordion.min.css">
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/color2.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/front/css/toastr.css') }}">

    @yield('css')
</head>

<body>
    <main>
        <div id="preloader">
            <div class="preloader-inner">
                <img src="{{ asset('assets/images/' . $gs->logo) }}" alt="">
            </div>
        </div>
        <header class="style2 w-100">
            <div class="topbar scndry-bg w-100">
                <div class="container">
                    <div class="topbar-inner d-flex flex-wrap align-items-center justify-content-between w-100">
                        <p class="mb-0">{{ $langg->lang2 }}</p>
                        <div class="topbar-right d-inline-flex align-items-center flex-wrap">
                            <div class="social-links d-inline-flex">
                                <span class="d-inline-block">{{ $langg->lang3 }}</span>
                                @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                    <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" title="Twtiiter"
                                        target="_blank"><i class="fab fa-twitter"></i></a>
                                    @endif @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" title="Facebook"
                                            target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        @endif @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                                            <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" title="Youtube"
                                                target="_blank"><i class="fab fa-youtube"></i></a>
                                            @endif @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                                <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}"
                                                    title="Linkedin" target="_blank"><i
                                                        class="fab fa-linkedin-in"></i></a>
                                            @endif
                            </div>
                            <!-- <a class="search-btn d-inline-block position-relative" href="javascript:void(0);" title=""><i class="flaticon-magnifying-glass"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-contact-menu-wrap v2 position-relative w-100">
                <div class="container">
                    <div
                        class="logo-contact-menu-inner d-flex flex-wrap align-items-center justify-content-between position-relative w-100">
                        <div class="logo v2 z1 scndry-bg position-absolute text-center">
                            <h1 class="mb-0"><a class="d-block" href="{{ route('front.index', $sign) }}"
                                    title="{{ $langg->lang17 }}"><img class="img-fluid"
                                        src="{{ asset('assets/images/' . $gs->logo) }}" alt="Logo"
                                        srcset="{{ asset('assets/images/' . $gs->logo) }}"></a></h1>
                        </div>
                        <nav class="d-flex flex-wrap align-items-center justify-content-between w-100">
                            <div class="header-left" style="margin-right: 142px;">
                                <ul class="mb-0 list-unstyled d-inline-flex">
                                    <li class="active"><a href="{{ route('front.index', $sign) }}"
                                            title="">{{ $langg->lang17 }}</a>


                                    </li>


                                    <li><a href="{{ route('front.about', $sign) }}"
                                            title="">{{ $langg->lang16 }}</a></li>

                                    <li class="menu-item-has-children"><a href="javascript:void(0);"
                                            title="">{{ $langg->lang11 }}</a>
                                        <ul class="mb-0 list-unstyled">

                                            @foreach ($categories as $category)
                                                <li>
                                                    @if ($langg->rtl == 1)
                                                        <a href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}"
                                                            title="{{ $category->name_ar }}">
                                                            {{ $category->name_ar }}</a>
                                                    @else
                                                        <a href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}"
                                                            title="{{ $category->name }}">
                                                            {{ $category->name }}</a>
                                                    @endif

                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li><a href="{{ route('front.whyus', $sign) }}"
                                            title="">{{ $langg->lang18 }}</a></li>
                                    <li class="menu-item-has-children"><a href="javascript:void(0);"
                                            title=""><a>{{ $langg->lang222 }}</a>
                                            <ul class="mb-0 list-unstyled">

                                                <li><a href="{{ route('front.gallery', $sign) }}"
                                                        title="">{{ $langg->lang221 }}</a></li>
                                                <li><a href="{{ route('front.video', $sign) }}"
                                                        title="">{{ $langg->lang223 }}</a></li>
                                            </ul>
                                    </li>
                                    <!-- <li><a href="team.html" title="">اطباء المركز العربي</a></li> -->
                                    <li><a href="{{ route('front.contact', $sign) }}"
                                            title="">{{ $langg->lang20 }}</a></li>
                                </ul>
                            </div>
                            <div class="header-right d-inline-flex flex-wrap align-items-center">
                                @if (!empty($ps->phone))
                                    <div class="header-contact position-relative text-color1"><i
                                            class="flaticon-telephone thm-clr position-absolute"></i><a
                                            href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a></div>
                                @endif
                                <a class="thm-btn v2 thm-bg brd-rd5 d-inline-block position-relative overflow-hidden"
                                    href="{{ route('front.contact', $sign) }}" title=""><i
                                        class="flaticon-calendar"></i>{{ $langg->lang12 }}</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- <div class="header-search d-flex flex-wrap align-items-center position-fixed w-100">
            <span class="search-close-btn position-absolute"><i class="fas fa-times"></i></span>
            <form class="w-100 position-relative">
                <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                <input type="text" placeholder="Search">
            </form>
        </div> -->
        <div class="sticky-menu v2">
            <div class="container">
                <div class="sticky-menu-inner d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="logo">
                        <h1 class="mb-0"><a class="d-block" href="{{ route('front.index', $sign) }}"
                                title="{{ $langg->lang17 }}"><img class="img-fluid"
                                    src="{{ asset('assets/images/' . $gs->logo) }}" alt="Logo"
                                    srcset="{{ asset('assets/images/' . $gs->logo) }}"></a></h1>
                    </div>
                    <nav class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="header-left" style="margin-right: 142px;">
                            <ul class="mb-0 list-unstyled d-inline-flex">

                                <li class="active"><a href="{{ route('front.index', $sign) }}"
                                        title="">{{ $langg->lang17 }}</a>


                                </li>


                                <li><a href="{{ route('front.about', $sign) }}"
                                        title="">{{ $langg->lang16 }}</a></li>

                                <li class="menu-item-has-children"><a href="javascript:void(0);"
                                        title="">{{ $langg->lang11 }}</a>
                                    <ul class="mb-0 list-unstyled">
                                        @foreach ($categories as $category)
                                            <li>
                                                @if ($langg->rtl == 1)
                                                    <a href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}"
                                                        title="{{ $category->name_ar }}">
                                                        {{ $category->name_ar }}</a>
                                                @else
                                                    <a href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}"
                                                        title="{{ $category->name }}">
                                                        {{ $category->name }}</a>
                                                @endif

                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('front.whyus', $sign) }}"
                                        title="">{{ $langg->lang18 }}</a></li>
                                <li class="menu-item-has-children"><a href="javascript:void(0);"
                                        title=""><a>{{ $langg->lang222 }}</a>
                                        <ul class="mb-0 list-unstyled">

                                            <li><a href="{{ route('front.gallery', $sign) }}"
                                                    title="">{{ $langg->lang221 }}</a></li>
                                            <li><a href="{{ route('front.video', $sign) }}"
                                                    title="">{{ $langg->lang223 }}</a></li>
                                        </ul>
                                </li>
                                <!-- <li><a href="team.html" title="">اطباء المركز العربي</a></li> -->
                                <li><a href="{{ route('front.contact', $sign) }}"
                                        title="">{{ $langg->lang20 }}</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="rspn-hdr">
            <div class="rspn-mdbr">
                <div class="rspn-scil d-inline-flex flex-wrap">
                    @if (App\Models\Socialsetting::find(1)->t_status == 1)
                        <a class="twitter-hvr" href="{{ App\Models\Socialsetting::find(1)->twitter }}"
                            title="Twtiiter" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif @if (App\Models\Socialsetting::find(1)->f_status == 1)
                            <a class="facebook-hvr" href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                                title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            @endif @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                                <a class="youtube-hvr" href="{{ App\Models\Socialsetting::find(1)->youtube }}"
                                    title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                                @endif @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                    <a class="linkedin-hvr" href="{{ App\Models\Socialsetting::find(1)->linkedin }}"
                                        title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                @endif
                </div>
                <!-- <form class="rspn-srch">
                    <input type="text" placeholder="Enter Your Keyword">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form> -->
            </div>
            <div class="lg-mn">
                <div class="logo"
                    style="
                margin-top: -117px;
                margin-bottom: -100px;
            ">
                    <h1 class="mb-0 d-block"><a href="{{ route('front.index', $sign) }}"
                            title="{{ $langg->lang17 }}"><img src="{{ asset('assets/images/' . $gs->logo) }}"
                                alt="Logo"></a></h1>
                </div>
                <div class="rspn-cnt">
                    <span><i class="thm-clr far fa-envelope"></i><a
                            href="/cdn-cgi/l/email-protection#4e272028210e37213b3c2b232f2722272a602d2123"
                            title=""><span class="__cf_email__"
                                data-cfemail="2c45424a436c5543595e49414d45404548024f4341">[email&#160;protected]</span></a></span>
                    <span><i class="thm-clr fas fa-phone-alt"></i>{{ $ps->phone }}</span>
                </div>
                <span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>
            </div>
            <div class="rsnp-mnu">
                <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
                <ul class="mb-0 list-unstyled w-100">

                    <li class="active-parent"><a href="{{ route('front.index', $sign) }}"
                            title="">{{ $langg->lang17 }}


                        </a>


                    </li>


                    <li><a href="{{ route('front.about', $sign) }}" title="">{{ $langg->lang16 }}</a></li>


                    <li class="menu-item-has-children"><a href="javascript:void(0);"
                            title="">{{ $langg->lang11 }}</a>
                        <ul class="mb-0 list-unstyled">

                            @foreach ($categories as $category)
                                <li>
                                    @if ($langg->rtl == 1)
                                        <a href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}"
                                            title="{{ $category->name_ar }}">
                                            {{ $category->name_ar }}</a>
                                    @else
                                        <a href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}"
                                            title="{{ $category->name }}">
                                            {{ $category->name }}</a>
                                    @endif

                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('front.whyus', $sign) }}" title="">{{ $langg->lang18 }}</a></li>
                    <li class="menu-item-has-children"><a href="javascript:void(0);"
                            title=""><a>{{ $langg->lang222 }}</a>
                            <ul class="mb-0 list-unstyled">

                                <li><a href="{{ route('front.gallery', $sign) }}"
                                        title="">{{ $langg->lang221 }}</a></li>
                                <li><a href="{{ route('front.video', $sign) }}"
                                        title="">{{ $langg->lang223 }}</a></li>
                            </ul>
                    </li>
                    <!-- <li><a href="team.html" title="">اطباء المركز العربي</a></li> -->
                    <li><a href="{{ route('front.contact', $sign) }}" title="">{{ $langg->lang20 }}</a></li>
                </ul>
            </div>
        </div>



        @yield('content')



        <footer>
            <div class="w-100 style2 pt-90 dark-layer opc9 pb-130 position-relative">
                <div class="fixed-bg"
                    style="background-image: url({{ asset('assets/images/' . $gs->feature_icon) }});"></div>
                <div class="container">
                    <div class="footer-data w-100">
                        <div class="row justify-content-between mrg30">
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="widget-box v2 w-100">
                                    <h4 class="widget-title2 position-relative"
                                        style="
                                        margin-right: 41px;
                                    ">
                                        <i class="flaticon-idea thm-clr position-absolute"></i>{{ $langg->lang13 }}
                                    </h4>
                                    <ul class="contact-info-list mb-0 list-unstyled w-100">
                                        @if (!empty($ps->phone))
                                            <li><span>{{ $langg->lang48 }}:</span> <a
                                                    href="tel:{{ $ps->phone }}"> {{ $ps->phone }}</a></li>
                                        @endif
                                        @if (!empty($ps->email))
                                            <li><span>{{ $langg->lang49 }}:</span> <a
                                                    href="mailto:{{ $ps->email }}" title=""><span
                                                        class="__cf_email__"
                                                        data-cfemail="afc6c1c9c0efcad7cec2dfc3ca81ccc0c2">
                                                        {{ $ps->email }}</span></a></li>
                                        @endif
                                        <li>{{ $langg->rtl == 1 ? $ps->street_ar : $ps->street }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="widget-box v2 w-100">
                                    <h4 class="widget-title2 position-relative"><i
                                            class="flaticon-idea thm-clr position-absolute"></i>{{ $langg->lang11 }}
                                    </h4>
                                    <ul class="mb-0 list-unstyled w-100">
                                        @foreach ($categories->take(3) as $category)
                                            <li>
                                                @if ($langg->rtl == 1)
                                                    <a href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}"
                                                        title="{{ $category->name_ar }}">
                                                        {{ $category->name_ar }}</a>
                                                @else
                                                    <a href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}"
                                                        title="{{ $category->name }}">
                                                        {{ $category->name }}</a>
                                                @endif

                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="social-links3 d-flex flex-wrap align-items-center w-100">
                                        @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                            <a class="rounded-circle twitter-hvr"
                                                href="{{ App\Models\Socialsetting::find(1)->twitter }}"
                                                title="Twtiiter" target="_blank"><i class="fab fa-twitter"></i></a>
                                            @endif @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                                <a class="rounded-circle facebook-hvr"
                                                    href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                                                    title="Facebook" target="_blank"><i
                                                        class="fab fa-facebook-f"></i></a>
                                                @endif @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                                                    <a class="rounded-circle youtube-hvr"
                                                        href="{{ App\Models\Socialsetting::find(1)->youtube }}"
                                                        title="Youtube" target="_blank"><i
                                                            class="fab fa-youtube"></i></a>
                                                    @endif @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                                        <a class="rounded-circle linkedin-hvr"
                                                            href="{{ App\Models\Socialsetting::find(1)->linkedin }}"
                                                            title="Linkedin" target="_blank"><i
                                                                class="fab fa-linkedin-in"></i></a>
                                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-lg-4">
                                <div class="widget-box v2 w-100">
                                    <h4 class="widget-title2 position-relative"><i
                                            class="flaticon-idea thm-clr position-absolute"></i>{{ $langg->lang220 }}
                                    </h4>
                                    <div class="working-hours w-100">
                                        <span class="d-block w-100">Mon - Thu:<i class="d-block">09:00am -
                                                05:00pm</i></span>
                                        <span class="d-block w-100">Friday:<i class="d-block">01:00pm -
                                                10:00pm</i></span>
                                        <span class="d-block w-100">Sat - Sun:<i class="d-block">09:00am -
                                                05:00pm</i></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="bottom-bar v2 w-100">
            <div class="container">
                <div class="bottom-bar-inner d-flex flex-wrap align-items-center justify-content-center w-100">
                    <!-- <div class="logo v2 z1 bg-color10 position-relative">
                            <h1 class="mb-0"><a class="d-block" href="{{ route('front.index', $sign) }}" title="{{ $langg->lang17 }}"><img class="img-fluid" src="{{ asset('assets/images/' . $gs->logo) }}" alt="Logo" srcset="{{ asset('assets/images/' . $gs->logo) }}"></a></h1>
                        </div> -->
                    <div class="copyright-links d-inline-flex flex-wrap align-items-center justify-content-between">
                        <p class="mb-0"><a href="{{ route('front.index', $sign) }}" title="Neurology">
                                @if ($langg->rtl == 1)
                                    {!! $gs->copyright_ar !!}
                                @else
                                    {!! $gs->copyright !!}
                                @endif
                        </p>
                        <!-- <ul class="bottom-links d-flex flex-wrap justify-content-end mb-0 list-unstyled">
                                <li><a href="{{ route('front.about', $sign) }}" title="">{{ $langg->lang16 }}</a></li>
                                <li><a href="gallery.html" title="">{{ $langg->lang221 }}</a></li>
                                <li><a href="blog.html" title="">مقالات</a></li>
                                <li><a href="{{ route('front.contact', $sign) }}" title="">{{ $langg->lang20 }}</a></li>
                            </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/Al-Araby/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/Al-Araby/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/Al-Araby/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/Al-Araby/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/Al-Araby/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/Al-Araby/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/Al-Araby/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/Al-Araby/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/Al-Araby/js/custom-scripts.js') }}"></script>


    <script src="{{ asset('assets/admin/js/toastr.js') }}"></script>
    <script type="text/javascript">
        var mainurl = "{{ url('/' . $sign) }}";
        var mainurl2 = "{{ url('/') }}";
        var gs = {!! json_encode($gs) !!};
        var langg = {!! json_encode($langg) !!};
        var mainurl2 = "{{ url('/') }}";
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
