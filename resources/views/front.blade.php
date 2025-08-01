<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <meta property="og:url" content="{{ url('/') }}" />

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
{!! json_encode([
  "@context" => "https://schema.org",
  "@graph" => [
    [
      "@type" => "RealEstateAgent",
      "@id" => url('/'),
      "name" => "عقار تاون",
      "url" => url('/ar'),
      "logo" => asset(access_public() . 'assets/images/' . $gs->logo),
      "description" => "عقار تاون هي شركة مصرية متخصصة في إدارة وتأجير العقارات التجارية، تربط بين الملاك، المطورين، ورواد الأعمال الباحثين عن مواقع استراتيجية.",
      "address" => [
        "@type" => "PostalAddress",
        "streetAddress" => "24 شارع أحمد فخري – مدينة نصر",
        "addressLocality" => "القاهرة",
        "addressRegion" => "القاهرة",
        "postalCode" => "11341",
        "addressCountry" => "EG"
      ],
      "inLanguage" => "ar",
      "telephone" => ["01148222118", "01100659191"]
    ],
    [
      "@type" => "RealEstateAgent",
      "@id" => url('/en'),
      "name" => "Aqar Town",
      "url" => url('/en'),
      "logo" => asset(access_public() . 'assets/images/' . $gs->logo),
      "description" => "Aqar Town is an Egyptian company specialized in managing and leasing commercial properties, connecting landlords, developers, and entrepreneurs.",
      "address" => [
        "@type" => "PostalAddress",
        "streetAddress" => "24 Ahmed Fakhry Street – Nasr City",
        "addressLocality" => "Cairo",
        "addressRegion" => "Cairo",
        "postalCode" => "11341",
        "addressCountry" => "EG"
      ],
      "inLanguage" => "en",
      "telephone" => ["01148222118", "01100659191"]
    ]
  ]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>










    {!! $seo->facebook_pixel !!}





    @yield('gsearch')

    <!-- Google Font -->



    <!-- favicon -->

    <link rel="icon" type="image/x-icon" href="{{ asset(access_public() . 'assets/images/' . $gs->favicon) }}" />

    <!-- bootstrap -->









    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/animate.min.css" type="text/css">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/magnific-popup.css" type="text/css">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/font-awesome.min.css"
        type="text/css">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/owl.carousel.min.css"
        type="text/css">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/swiper.min.css" type="text/css">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/select2.css" type="text/css">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/default.css" type="text/css">

    @if ($langg->rtl == 1)
        <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/style.css" type="text/css">
    @else
        <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/styleltr.css" type="text/css">
    @endif





    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/aqar/') }}/css/responsive.css" type="text/css">













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



    <!-- Scroll-top -->

    <button class="scroll-top scroll-to-target" data-target="html">

        <i class="fa fa-angle-up"></i>

    </button>

    <!-- Scroll-top-end -->

    <!-- header-start -->

    <header class="header-one">

        <div class="header-top-two">

            <div class="container">

                <div class="row">

                    <div class="col-md-4"></div>

                    <div class="col-md-5">

                        <div class="mail-send">

                            <ul>

                                <li>

                                    <span class="icon-call">

                                        <i class="far fa-envelope"></i>

                                    </span>

                                    <div class="cont-con">

                                        <a href="mailto:{{ $ps->email }}">{{ $ps->email }}</a>

                                    </div>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="mail-send fl-right">

                            <ul>

                                @if (!Auth::guard('web')->check())

                                    {{-- --}}<li>

                                        <span class="icon-call">

                                            <i class="fal fa-user"></i>

                                        </span>

                                        <div class="cont-con">



                                            <a
                                                href="{{ route('user.login', ['lang' => $sign]) }}">{{ $langg->lang35 }}</a>



                                        </div>

                                    </li>
                                @else
                                    @if (Auth::user()->IsVendor())
                                        <li>

                                            <span class="icon-call">

                                                <i class="fal fa-user"></i>

                                            </span>

                                            <div class="cont-con">



                                                <a
                                                    href="{{ route('vendor-dashboard', ['lang' => $sign]) }}">{{ $langg->lang36 }}</a>



                                            </div>

                                        </li>
                                    @endif

                                    <li>

                                        <span class="icon-call">

                                            <i class="fal fa-user"></i>

                                        </span>

                                        <div class="cont-con">



                                            <a href="{{ route('user-logout') }}">{{ $langg->lang37 }}</a>



                                        </div>

                                    </li>

                                @endif

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div id="sticky-header" class="main-header menu-area one-header">

            <div class="container custom-container">

                <div class="row">

                    <div class="col-12">

                        <div class="mobile-nav-toggler"><i class="fa fa-bars"></i></div>

                        <div class="menu-wrap">

                            <nav class="menu-nav">

                                <div class="logo">

                                    <a href="{{ route('front.index', $sign) }}"><img
                                            src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}"
                                            alt=""></a>

                                </div>

                                <div class="navbar-wrap main-menu d-none d-lg-flex">

                                    <ul class="navigation">

                                        <li class="active">

                                            <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a>

                                        </li>

                                        <li><a href="{{ route('front.about', $sign) }}">{{ $langg->lang16 }} </a>
                                        </li>

                                        <li><a href="{{ route('front.latestwork', $sign) }}">{{ $langg->lang11 }}
                                            </a>
                                        </li>





                                        <li class="menu-item-has-children">

                                            <a href="javascript:void(0)">{{ $langg->lang18 }}</a>

                                            <ul class="submenu">



                                                @foreach ($categories->where('type', 'service') as $category)
                                                    <li><a
                                                            href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}



                                                @else

                                                {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                                                            @if ($langg->rtl == 1)
                                                                {{ $category->name_ar }}
                                                            @else
                                                                {{ $category->name }}
                                                            @endif
                                                        </a></li>
                                                @endforeach

                                            </ul>



                                        </li>



                                        <li class="menu-item-has-children">

                                            <a href="javascript:void(0)">{{ $langg->lang221 }} </a>

                                            <ul class="submenu">

                                                @foreach ($subcategories as $category)
                                                    <li><a
                                                            href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->category->slug_ar, 'subcategory' => $category->slug_ar, 'lang' => $sign]) }}



                                                @else

                                                {{ route('front.category', ['category' => $category->category->slug, 'subcategory' => $category->slug, 'lang' => $sign]) }} @endif">
                                                            @if ($langg->rtl == 1)
                                                                {{ $category->name_ar }}
                                                            @else
                                                                {{ $category->name }}
                                                            @endif
                                                        </a></li>
                                                @endforeach

                                            </ul>



                                        </li>



                                        @if (count(DB::table('pages')->where('header', '=', 1)->get()) > 0)

                                            <li class="menu-item-has-children">

                                                <a href="#">{{ $langg->lang222 }}</a>

                                                <ul class="submenu">

                                                    @foreach (DB::table('pages')->where('header', '=', 1)->get() as $data)
                                                        @if ($langg->rtl == 1)
                                                            <li><a
                                                                    href="{{ route('front.page', ['slug' => $data->slug_ar, 'lang' => $sign]) }}">{{ $data->title_ar }}
                                                                </a></li>
                                                        @else
                                                            <li><a
                                                                    href="{{ route('front.page', ['slug' => $data->slug, 'lang' => $sign]) }}">{{ $data->title }}
                                                                </a></li>
                                                        @endif
                                                    @endforeach

                                                </ul>



                                            </li>

                                        @endif



                                        <li><a href="{{ route('front.blog', $sign) }}">{{ $langg->lang223 }}</a></li>





                                        <li><a href="{{ route('front.contact', $sign) }}"> {{ $langg->lang20 }}</a>
                                        </li>





                                        @if ($gs->is_language == 1)

                                            <li class="menu-item-has-children">

                                                <a href="#">
                                                    @if (Session::has('language'))
                                                        @php

                                                            echo DB::table('languages')
                                                                ->where('id', '=', Session::get('language'))
                                                                ->first()->language;

                                                        @endphp
                                                    @else
                                                        @php

                                                            echo DB::table('languages')
                                                                ->where('is_default', '=', 1)
                                                                ->first()->language;

                                                        @endphp
                                                    @endif
                                                </a>

                                                <ul class="submenu">

                                                    @foreach (DB::table('languages')->get() as $language)
                                                        <li><a href="{{ route('front.language', $language->id) }}"
                                                                title="{{ $language->language }}">{{ $language->language }}
                                                            </a></li>
                                                    @endforeach

                                                </ul>



                                            </li>







                                            @if (!Auth::guard('web')->check())
                                                <a href="{{ route('user.login', ['lang' => $sign]) }}"
                                                    class="btn btn-primary class"> {{ $langg->lang204 }}</a>
                                            @else
                                                <a href="{{ route('vendor-dashboard', ['lang' => $sign]) }}"
                                                    class="btn btn-primary class"> {{ $langg->lang204 }}</a>

                                                <!--    <a href="{{ route('vendor-dashboard', ['lang' => $sign]) }}" class="btn btn-primary class">اعرض وحدتك</a>-->
                                            @endif



                                            <!---->



                                        @endif

                                    </ul>

                                </div>

                                <div class="header-action d-none d-md-block">

                                    <ul>

                                        <li class="header-btn">

                                            <a href="tel:{{ $ps->phone }}" class="animation-cer btn-call">

                                                <img src="images/call.png" alt="" />

                                            </a>



                                        </li>

                                    </ul>

                                </div>

                            </nav>

                        </div>

                        <!-- Mobile Menu  -->

                        <div class="mobile-menu">

                            <nav class="menu-box">

                                <div class="close-btn"><i class="fa fa-times"></i></div>

                                <div class="nav-logo">

                                    <a href="{{ route('front.index', $sign) }}"><img
                                            src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}"
                                            alt="" title=""></a>

                                </div>

                                <div class="menu-outer">



                                </div>

                                <!-- <div class="login-p">

                                <ul>

                                    <li>

                                        <a href="login.html">

                                            <span class="icon-call">

                                                <img src="images/user-o.png" alt="">

                                            </span>

                                            <div class="cont-con">

                                                Login / Register

                                            </div>

                                        </a>

                                    </li>

                                </ul>

                            </div> -->

                                <div class="social-links">

                                    <ul class="clearfix">

                                        {{-- <li><a href="#"><span class="fa fa-twitter"></span></a></li>

                                    <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>

                                    <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>

                                    <li><a href="#"><span class="fa fa-instagram"></span></a></li>

                                    <li><a href="#"><span class="fa fa-youtube"></span></a></li> --}}

                                        @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                            <li>



                                                <a href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                                                    target="_blank"> <i class="fa fa-facebook-f"></i></a>

                                            </li>
                                        @endif

                                        @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                            <li>



                                                <a href="{{ App\Models\Socialsetting::find(1)->twitter }}"
                                                    target="_blank"> <i class="fa fa-facebook-f"></i></a>

                                            </li>
                                        @endif

                                        @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                            <li>



                                                <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}"
                                                    target="_blank"> <i class="fa fa-linkedin"></i></a>

                                            </li>
                                        @endif

                                        @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                            <li>



                                                <a href="{{ App\Models\Socialsetting::find(1)->instagram }}"
                                                    target="_blank"> <i class="fa fa-instagram"></i></a>

                                            </li>
                                        @endif

                                    </ul>

                                </div>

                            </nav>

                        </div>

                        <div class="menu-backdrop"></div>

                        <!-- End Mobile Menu -->

                    </div>

                </div>

            </div>

        </div>

    </header>

    <!-- Header-end -->

    <div class="minsection">



        @yield('content')



        <!-- ============================ Footer Start ================================== -->



        <!--Footer Start-->

        <section class="footer-four pt-80">

            <div class="container">

                <div class="row pb-70">

                    <div class="col-md-3  pr-30">

                        <div class="footer-cont footer-logo">

                            <span class="logo-f mar-top mb-30">

                                <a href="{{ route('front.index', $sign) }}">

                                    <img src="{{ asset(access_public() . 'assets/images/' . $gs->logo_ar) }}"
                                        alt="">

                                </a>

                            </span>



                            <p>

                                @if ($langg->rtl == 1)
                                    {!! $gs->footer_ar !!}
                                @else
                                    {!! $gs->footer !!}
                                @endif
                            </p>

                        </div>

                    </div>

                    <div class="col-md-3 pl-30 pr-30 b-l-r">

                        <div class="footer-cont footer-logo mt-15">

                            <h4> {{ $langg->lang12 }}

                            </h4>

                            <ul class="menu-footer wi-50">

                                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>

                                <li><a href="{{ route('front.about', $sign) }}">{{ $langg->lang16 }} </a></li>

                                <li><a href="{{ route('front.latestwork', $sign) }}">{{ $langg->lang11 }} </a></li>

                                <li><a href="{{ route('front.blog', $sign) }}">{{ $langg->lang223 }}</a></li>

                                <li><a href="{{ route('front.contact', $sign) }}">{{ $langg->lang20 }} </a></li>



                                @foreach (DB::table('pages')->where('footer', '=', 1)->get() as $data)
                                    @if ($langg->rtl == 1)
                                        <li><a
                                                href="{{ route('front.page', ['slug' => $data->slug_ar, 'lang' => $sign]) }}">{{ $data->title_ar }}
                                            </a></li>
                                    @else
                                        <li><a
                                                href="{{ route('front.page', ['slug' => $data->slug, 'lang' => $sign]) }}">{{ $data->title }}
                                            </a></li>
                                    @endif
                                @endforeach



                            </ul>



                        </div>

                    </div>

                    <div class="col-md-3 pl-30 pr-30 b-l-r">

                        <div class="footer-cont footer-logo mt-15">

                            <h4> {{ $langg->lang20 }}



                            </h4>

                            <ul class="menu-footer wi-50">

                                <li><a href="#"> {{ $langg->rtl == 1 ? $ps->street_ar : $ps->street }} </a>
                                </li>



                                <li><a href="{{ route('front.latestwork', $sign) }}">{{ $langg->lang11 }} </a></li>

                                <li><a href="tel:{{ $ps->fax }}">{{ $ps->fax }}</a></li>

                                <li><a href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a></li>

                            </ul>



                        </div>

                    </div>

                    <div class="col-md-3 pl-30">

                        <div class="footer-cont footer-logo mt-20 subs">

                            <h4>

                                {{ $langg->lang13 }}

                            </h4>

                            <form class="form-inline" action="{{ route('front.subscribe') }}" id="subscribeform"
                                method="POST">

                                {{ csrf_field() }}

                                <div class="news-f1">

                                    @include('includes.admin.form-both')

                                    <input type="text" placeholder="Email" class="fill form-control" required>

                                    <button type="submit" class="btn upcase "
                                        id="sub-btn">{{ $langg->lang742 }}</button>

                                </div>

                            </form>

                            <ul class="social-t fl-left">

                                {{--  <li><a href="#" class="facebook-change-co"><i class="fa fa-facebook-f"></i></a></li>

                        <li><a href="#" class="twitter-change-co"><i class="fa fa-twitter"></i></a></li>

                        <li><a href="#" class="pinterest-change-co"><i class="fa fa-pinterest"></i></a></li>

                        <li><a href="#" class="linkedin-change-co"><i class="fa fa-linkedin"></i></a></li> --}}

                                @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                    <li>



                                        <span><a class="facebook-change-co" target="_blank"
                                                href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                                                titele="الصفحه الرسميه"> <i class="fa fa-facebook-f"></i></a></span>

                                    </li>
                                @endif

                                @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                    <li>



                                        <span><a class="twitter-change-co" target="_blank"
                                                href="{{ App\Models\Socialsetting::find(1)->twitter }}"
                                                titele="الصفحه الاعلانيه"> <i class="fa fa-facebook-f"></i></a></span>

                                    </li>
                                @endif

                                @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                    <li>



                                        <span><a class="linkedin-change-co" target="_blank"
                                                href="{{ App\Models\Socialsetting::find(1)->linkedin }}"> <i
                                                    class="fa fa-linkedin"></i></a></span>

                                    </li>
                                @endif

                                @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                    <li>



                                        <span><a class="pinterest-change-co" target="_blank"
                                                href="{{ App\Models\Socialsetting::find(1)->instagram }}"
                                                titele=""> <i class="fa fa-instagram"></i></a></span>

                                    </li>
                                @endif

                            </ul>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 border-t-b">

                        <div class="copy-one-to">

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



        </section>

        <!--Footer End-->

    </div>



    @if (!empty($ps->w_phone))
        <a href="{{ $ps->w_phone }}" target="_blank" class="btn-whatsapp-pulse">

            <i class="fa fa-whatsapp"></i>

        </a>
    @endif

    @if (App\Models\Socialsetting::find(1)->i_status == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->instagram }}" target="_blank" class="btn-instagram-pulse2">

            <i class="fa fa-instagram"></i>



        </a>
    @endif

    @if (App\Models\Socialsetting::find(1)->f_status == 1)
        <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank" class="btn-facebook-pulse">
            <i class="fa fa-facebook-f"></i>
        </a>
    @endif



    @if (!empty($ps->phone))
        <a href="tel:{{ $ps->phone }}" class="btn-phone-pulse">

            <i class="fa fa-phone"></i>

        </a>
    @endif


    <a href="#" target="_blank" class="btn-facebook-pulse hehehehe">
        <i class="fa fa-facebook-f"></i>
    </a>

    <!-- Modal booking Start-->

    <div class="modal fade modal-real" id="myModal-chat" role="dialog">

        <div class="modal-dialog">



            <!-- Modal content-->

            <div class="modal-content">

                <button type="button" class="close modal-close" data-dismiss="modal">

                    <img src="images/cancel.png" alt="" class="cl-b" />

                </button>

                <div class="modal-body">

                    <div class="min-top-modal">

                        <span class="left-m-i">

                            <a href="services-details.html">

                                <img src="images/f-p1.png" alt="" class="img-fluid">

                            </a>

                        </span>

                        <div class="right-m-text">

                            <h3><a href="services-details.html">Ample Apartment At Last Floor</a></h3>

                            <h3 class="price-m">$230.00/<span>Month</span></h3>

                        </div>

                    </div>

                    <div class="modal-agent">

                        <span class="left-m-i">

                            <a href="services-details.html">

                                <img src="images/t2.png" alt="" class="img-fluid">

                            </a>

                        </span>

                        <div class="right-m-text">

                            <h3><a href="services-details.html">Joana Williams</a></h3>

                            <h3 class="price-m"><span>Company Agent</span></h3>

                        </div>

                    </div>

                    <div class="modal-form">

                        <form>

                            <div class="form-group">

                                <input type="text" placeholder="Email" class="form-control m-form" />

                            </div>

                            <div class="form-group">

                                <input type="text" placeholder="Phone" class="form-control m-form" />

                            </div>

                            <div class="form-group">

                                <textarea placeholder="Message" class="form-control text-area"></textarea>

                            </div>

                            <div class="form-group mb-0">

                                <button class="mod-b">

                                    Send Message

                                </button>



                            </div>



                        </form>

                    </div>

                </div>



            </div>



        </div>

    </div>

    <!-- Modal booking End-->

    <!-- Modal Agent Chat Start-->

    <div class="modal fade modal-real" id="myModal-agent" role="dialog">

        <div class="modal-dialog">



            <!-- Modal content-->

            <div class="modal-content">

                <button type="button" class="close modal-close" data-dismiss="modal">

                    <img src="images/cancel.png" alt="" class="cl-b" />

                </button>

                <div class="modal-body">

                    <div class="modal-agent bg-w">

                        <span class="left-m-i">

                            <a href="services-details.html">

                                <img src="images/t2.png" alt="" class="img-fluid">

                            </a>

                        </span>

                        <div class="right-m-text">

                            <h3><a href="services-details.html">Joana Williams</a></h3>

                            <h3 class="price-m"><span>Company Agent</span></h3>

                            <ul class="test-rating">

                                <li><i class="fa fa-star"></i></li>

                                <li><i class="fa fa-star"></i></li>

                                <li><i class="fa fa-star"></i></li>

                                <li><i class="fa fa-star"></i></li>

                                <li><i class="fa fa-star"></i></li>

                            </ul>

                        </div>

                    </div>

                    <div class="modal-form">

                        <form>

                            <div class="form-group">

                                <input type="text" placeholder="Email" class="form-control m-form" />

                            </div>

                            <div class="form-group">

                                <input type="text" placeholder="Phone" class="form-control m-form" />

                            </div>

                            <div class="form-group">

                                <textarea placeholder="Message" class="form-control text-area"></textarea>

                            </div>

                            <div class="form-group mb-0">

                                <button class="mod-b">

                                    Send Message

                                </button>



                            </div>



                        </form>

                    </div>

                </div>



            </div>



        </div>

    </div>

    <!-- Modal Agent Chat End-->

    <!-- JS here -->











    <script src="{{ asset(access_public() . 'assets/aqar/') }}/js/jquery-3.6.0.min.js" defer></script>

    <script src="{{ asset(access_public() . 'assets/aqar/') }}/js/bootstrap.min.js" defer></script>

    <script src="{{ asset(access_public() . 'assets/aqar/') }}/js/wow-animate.min.js" defer></script>

    <script src="{{ asset(access_public() . 'assets/aqar/') }}/js/isotope.pkgd.min.js" defer></script>

    <script src="{{ asset(access_public() . 'assets/aqar/') }}/js/jquery.magnific-popup.min.js" defer></script>

    <script src="{{ asset(access_public() . 'assets/aqar/') }}/js/owl.carousel.min.js" defer></script>

    <script src="{{ asset(access_public() . 'assets/aqar/') }}/js/select2.min.js" defer></script>

    <script src="{{ asset(access_public() . 'assets/aqar/') }}/js/swiper.min.js" defer></script>

    <script src="{{ asset(access_public() . 'assets/aqar/') }}/js/main.js" defer></script>



    <!-- Meta Pixel Code -->

    <script defer>
        ! function(f, b, e, v, n, t, s)

        {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?

                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };

            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';

            n.queue = [];
            t = b.createElement(e);
            t.async = !0;

            t.src = v;
            s = b.getElementsByTagName(e)[0];

            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',

            'https://connect.facebook.net/en_US/fbevents.js');

        fbq('init', '594573298147439');

        fbq('track', 'PageView');
    </script>

    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=594573298147439&ev=PageView&noscript=1" /></noscript>

    <!-- End Meta Pixel Code -->





    <script defer>
        var toggler = document.getElementsByClassName("caret");

        var i;



        for (i = 0; i < toggler.length; i++) {

            toggler[i].addEventListener("click", function() {

                this.parentElement.querySelector(".nested").classList.toggle("active");

                this.classList.toggle("caret-down");

            });

        }
    </script>





    <script src="{{ asset(access_public() . 'assets/admin/js/toastr.js') }}" defer></script>

    <script type="text/javascript" defer>
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





    <script defer>
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

                success: function(data)

                {

                    console.log(14);

                    if ((data.errors)) {

                        console.log(15);

                        $('.alert-danger').show();

                        $('.alert-danger ul').html('');

                        for (var error in data.errors)

                        {

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





    <script defer>
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

                success: function(data)

                {

                    console.log(2);

                    if ((data.errors)) {

                        console.log(3);

                        $('.alert-success').hide();

                        $('.alert-danger').show();

                        $('#email-form .response').html('');

                        for (var error in data.errors)

                        {

                            console.log(4);

                            $('#email-form .response').append('<li>' + data.errors[error] + '</li>')

                        }

                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();

                        $('#email-form .refresh_code').trigger('click');



                    } else

                    {

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

                success: function(data)

                {

                    console.log(2);

                    if ((data.errors)) {

                        console.log(3);

                        $('.alert-success').hide();

                        $('.alert-danger').show();

                        $('#appointment-form .response').html('');

                        for (var error in data.errors)

                        {

                            console.log(4);

                            $('#appointment-form .response').append('<li>' + data.errors[error] + '</li>')

                        }

                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();

                        $('#appointment-form .refresh_code').trigger('click');



                    } else

                    {

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
