<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <meta property="og:image" content="{{ asset('public/assets/images/products/' . $productt->photo) }}" />
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
      "logo": "{{asset('public/assets/images/'.$gs->logo)}}"
    }
    </script>
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{$gs->title}}",
    "url": "{{url('/')}}",
    "description": "",
    "image": "{{asset('public/assets/images/'.$gs->logo)}}",
      "logo": "{{asset('public/assets/images/'.$gs->logo)}}",
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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/images/' . $gs->favicon) }}" />
    <!-- bootstrap -->





    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">


    @yield('css')

    <style>
        .social:hover {
            color: #fcb01b;

        }

        #mask {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 9000;
            background-color: #26262c;
            display: none;
        }

        #boxes .window {
            position: absolute;
            left: 0;
            top: 0;
            width: 440px;
            height: 850px;
            display: none;
            z-index: 9999;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }

        #boxes #dialog {
            width: 450px;
            height: auto;
            padding: 10px 10px 10px 10px;
            background-color: #ffffff;
            font-size: 15pt;
        }

        .agree:hover {
            background-color: #D1D1D1;
        }

        .popupoption:hover {
            background-color: #D1D1D1;
            color: green;
        }

        .popupoption2:hover {
            color: red;
        }
    </style>

</head>

<body>



    <!--<div id="ac-wrapper">
    <div id="popup">
        <center>
             <img src="{{ asset('public/assets/images/' . $gs->popup_background) }}">
            <input type="submit" name="submit" value="Submit" onClick="PopUp()" />
        </center>
    </div>
</div>
 
    <div style="display:none">
     
    </div>

  
    <div class="subscribe-preloader-wrap" id="subscriptionForm" style="display: none;">
        <div class="subscribePreloader__thumb" style="background-image: url({{ asset('public/assets/images/' . $gs->popup_background) }});">
            <span class="preload-close"><i class="fas fa-times"></i></span>
           
        </div>
    </div>--><!---->
    @if ($gs->is_popup == 1)



        @if (isset($visited))
            <div id="boxes">
                <div style="top: 50%; left: 50%; display: none;" id="dialog" class="window">
                    <div id="san">
                        <a href="#" class="close agree"><img
                                src="{{ asset('public/assets/images/close-icon.png') }}" width="25"
                                style="float:right; margin-right: -25px; margin-top: -20px;"></a>
                        <img src="{{ asset('public/assets/images/' . $gs->popup_background) }}" width="450">
                    </div>
                </div>
                <div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;"
                    id="mask"></div>
            </div>
        @endif

    @endif

    <main>
        <header class="stick style1 w-100">
            <div class="container">
                <div class="logo-menu-wrap w-100 d-flex flex-wrap justify-content-between align-items-start">
                    <div class="logo">
                        <h1 class="mb-0"><a href="{{ route('front.index', $sign) }}" title="Home"><img
                                    class="img-fluid imglogo" id="logo"
                                    src="{{ asset('public/assets/images/' . $gs->logo) }}" alt="Logo"
                                    srcset="{{ asset('public/assets/images/' . $gs->logo) }}"
                                    style="width: 200px;"></a></h1>
                    </div><!-- Logo -->
                    <nav class="d-inline-flex align-items-center">
                        <div class="header-left">
                            <ul class="mb-0 list-unstyled d-inline-flex">
                                <li><a href="{{ route('front.index', $sign) }}"
                                        title="">{{ $langg->lang17 }}</a>
                                </li>
                                <li><a href="{{ route('front.about', $sign) }}"
                                        title="">{{ $langg->lang16 }}</a>
                                </li>
                                <li class="menu-item-has-children"><a href="{{ route('front.what-we-do', $sign) }}"
                                        title="">{{ $langg->lang11 }}</a>
                                    <ul class="children mb-0 list-unstyled">
                                        {{--  @foreach ($categories as $category)

                                    <li  class="menu-item-has-children"><a href="event-schedule.html" title="">Events planning </a>
                                        <ul class="children mb-0 list-unstyled">
                                            <li><a href="products.html" title="">Parties</a></li>
                                            <li><a href="products-list.html" title="">Wedding </a></li>
                                            <li><a href="product-detail.html" title="">Birthday</a></li>
                                            <li><a href="cart.html" title="">Proms</a></li>
                                            <li><a href="checkout.html" title="">Conferences</a></li>
                                            <li><a href="checkout.html" title="">Festivals </a></li>
                                            <li><a href="checkout.html" title="">Honoring</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="event-schedule2.html" title="">PR & Digital marketing </a></li>
                                    <li><a href="events.html" title="">Advertising </a></li>
                                    <li><a href="events2.html" title="">Printing </a></li>
                                    @endforeach --}}
                                        @foreach ($categories as $category)
                                            <li
                                                class="{{ count($category->subs) > 0 ? 'menu-item-has-children' : '' }}">
                                                @if ($langg->rtl == 1)
                                                    <a
                                                        href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}">
                                                        {{ $category->name_ar }}</a>
                                                @else
                                                    <a
                                                        href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}">
                                                        {{ $category->name }}</a>
                                                @endif
                                                @if (count($category->subs) > 0)
                                                    <ul class="children mb-0 list-unstyled">
                                                        @foreach ($category->subs as $subcat)
                                                            <li>

                                                                @if ($langg->rtl == 1)
                                                                    <a
                                                                        href="{{ route('front.category', ['category' => $category->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}">
                                                                        {{ $subcat->name_ar }}</a>
                                                                @else
                                                                    <a
                                                                        href="{{ route('front.category', ['category' => $category->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }}">
                                                                        {{ $subcat->name }}</a>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('front.blog', $sign) }}"
                                        title="">{{ $langg->lang18 }}</a>
                                </li>
                                <li><a href="{{ route('front.gallery', $sign) }}"
                                        title="">{{ $langg->lang221 }}</a>

                                </li>
                                <li><a href="{{ route('front.review', $sign) }}" title="">{{ $langg->lang222 }}
                                    </a></li>

                                <li><a href="{{ route('front.contact', $sign) }}"
                                        title="">{{ $langg->lang20 }}</a></li>

                                {{--  @foreach (DB::table('pages')->where('header', '=', 1)->get() as $data)
                            <li>
                                @if ($langg->rtl == 1)
                                    <a href="{{ route('front.page',['slug' => $data->slug_ar,'lang' => $sign ]) }}" title=""> {{ $data->title_ar }}</a>
                                @else
                                    <a href="{{ route('front.page',['slug' => $data->slug,'lang' => $sign ]) }}" title=""> {{ $data->title }}</a>
                                @endif
                              </li>
                            @endforeach --}}

                                @if ($gs->is_language == 1)
                                    <li class="menu-item-has-children"><a href="#" title="">
                                            @if (Session::has('language'))
                                                @php
                                                    echo DB::table('languages')
                                                        ->where('id', '=', Session::get('language'))
                                                        ->first()->language;

                                                @endphp
                                            @else
                                                @php
                                                    echo DB::table('languages')->where('is_default', '=', 1)->first()
                                                        ->language;
                                                @endphp
                                            @endif
                                        </a>
                                        <ul class="children mb-0 list-unstyled">
                                            @foreach (DB::table('languages')->get() as $language)
                                                <li><a href="{{ route('front.language', $language->id) }}"
                                                        title="{{ $language->language }}">{{ $language->language }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                @endif
                                {{--  <li><a href="#" title=""> Hiring</a></li> --}}
                            </ul>
                        </div>
                        <div class="header-right-btns">
                            <a class="search-btn" href="javascript:void(0);" title=""><i
                                    class="flaticon-magnifying-glass"></i></a>
                            {{--   <a class="user-btn" href="javascript:void(0);" title=""><i class="flaticon-user"></i></a> --}}
                            <a class="menu-btn" href="javascript:void(0);" title=""><i
                                    class="flaticon-menu"></i></a>
                        </div>
                    </nav>
                </div><!-- Logo Menu Wrap -->
            </div>
        </header><!-- Header -->

        <div class="menu-wrap">
            <span class="menu-close"><i class="fas fa-times"></i></span>
            <img class="img-fluid imglogo" id="logo"
                src="{{ asset('public/assets/images/' . $gs->sidebar_logo) }}" alt="Logo"
                srcset="{{ asset('public/assets/images/' . $gs->sidebar_logo) }}"
                style="width: 150px;margin-top: -67px;">
            <ul class="mb-0 list-unstyled w-100">
                <li><a href="{{ route('front.index', $sign) }}" title="">{{ $langg->lang17 }}</a>
                </li>
                <li><a href="{{ route('front.about', $sign) }}" title="">About us</a>
                </li>
                <li class="menu-item-has-children"><a href="{{ route('front.what-we-do', $sign) }}"
                        title="">What we do </a>
                    <ul class="children mb-0 list-unstyled">
                        @foreach ($categories as $category)
                            <li class="{{ count($category->subs) > 0 ? 'menu-item-has-children' : '' }}">
                                @if ($langg->rtl == 1)
                                    <a
                                        href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}">
                                        {{ $category->name_ar }}</a>
                                @else
                                    <a
                                        href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}">
                                        {{ $category->name }}</a>
                                @endif
                                @if (count($category->subs) > 0)
                                    <ul class="children mb-0 list-unstyled">
                                        @foreach ($category->subs as $subcat)
                                            <li>
                                                @if ($langg->rtl == 1)
                                                    <a
                                                        href="{{ route('front.category', ['category' => $category->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}">
                                                        {{ $subcat->name_ar }}</a>
                                                @else
                                                    <a
                                                        href="{{ route('front.category', ['category' => $category->slug, 'subcategory' => $subcat->slug, 'lang' => $sign]) }}">
                                                        {{ $subcat->name }}</a>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('front.blog', $sign) }}" title="">{{ $langg->lang18 }}</a>
                </li>
                <li><a href="{{ route('front.gallery', $sign) }}" title="">{{ $langg->lang221 }}</a></li>
                <li><a href="{{ route('front.review', $sign) }}" title="">{{ $langg->lang222 }} </a></li>
                <li><a href="{{ route('front.contact', $sign) }}" title="">{{ $langg->lang20 }}</a></li>
                @foreach (DB::table('pages')->where('header', '=', 1)->get() as $data)
                    <li>
                        @if ($langg->rtl == 1)
                            <a href="{{ route('front.page', ['slug' => $data->slug_ar, 'lang' => $sign]) }}"
                                title=""> {{ $data->title_ar }}</a>
                        @else
                            <a href="{{ route('front.page', ['slug' => $data->slug, 'lang' => $sign]) }}"
                                title=""> {{ $data->title }}</a>
                        @endif
                    </li>
                @endforeach
                @if ($gs->is_language == 1)
                    <li class="menu-item-has-children"><a href="#" title="">
                            @if (Session::has('language'))
                                @php
                                    echo DB::table('languages')->where('id', '=', Session::get('language'))->first()
                                        ->language;

                                @endphp
                            @else
                                @php
                                    echo DB::table('languages')->where('is_default', '=', 1)->first()->language;
                                @endphp
                            @endif
                        </a>
                        <ul class="children mb-0 list-unstyled">
                            @foreach (DB::table('languages')->get() as $language)
                                <li><a href="{{ route('front.language', $language->id) }}"
                                        title="{{ $language->language }}">{{ $language->language }}</a></li>
                            @endforeach

                        </ul>
                    </li>
                @endif
                {{-- <li><a href="#" title=""> Hiring</a></li>   --}}
            </ul>
            <div class="social-links4 d-flex flex-wrap">

                @if (App\Models\Socialsetting::find(1)->f_status == 1)
                    <a class="social" href="{{ App\Models\Socialsetting::find(1)->facebook }}" title="Facebook"
                        target="_blank" style="
    border: 0;
"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if (App\Models\Socialsetting::find(1)->i_status == 1)
                    <a class="social" href="{{ App\Models\Socialsetting::find(1)->instagram }}" title="instagram"
                        target="_blank" style="
    border: 0;
"><i class="fab fa-instagram"></i></a>
                @endif
                @if (App\Models\Socialsetting::find(1)->t_status == 1)
                    <a class="social" href="{{ App\Models\Socialsetting::find(1)->twitter }}" title="Twitter"
                        target="_blank" style="
    border: 0;
"><i class="fab fa-twitter"></i></a>
                @endif
                @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                    <a class="social" href="{{ App\Models\Socialsetting::find(1)->youtube }}" title="youtube"
                        target="_blank" style="
    border: 0;
"><i class="fab fa-youtube"></i></a>
                @endif
            </div>
        </div><!-- Menu Wrap -->



        <div class="header-search d-flex flex-wrap justify-content-center align-items-center w-100">
            <span class="search-close-btn"><i class="fas fa-times"></i></span>
            <form action="{{ route('front.blogsearch', $sign) }}">
                <input type="text" name="search" placeholder="Search">
            </form>
        </div><!-- Header Search -->


        {{-- <div class="login-popup-wrap position-fixed h-100 text-center d-flex flex-wrap align-items-center justify-content-center w-100">
        <div class="login-popup-inner d-inline-block w-100">
            <h3 class="mb-0">Sign In</h3>
            <form>
                <input class="w-100" type="email" placeholder="Email Address">
                <input class="w-100" type="password" placeholder="Password">
                <button class="thm-btn fill-btn" type="submit">Login<span></span></button>
                <a class="d-inline-block" href="javascript:void(0);" title="">Forget A Password</a>
            </form>
        </div>
    </div> --}}<!-- Login Popup -->





        @yield('content')


        <!-- Footer Area Start -->
        <footer>
            <div class="w-100 pt-90 pb-40 blue-layer opc2 position-relative">
                <div class="fixed-bg back-blend-multiply bg-color4"
                    style="background-image: url({{ asset('public/assets/images/' . $gs->feature_icon) }});"></div>
                <div class="container">
                    <div class="footer-wrap2 w-100">
                        <div class="row res-caro">
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="widget w-100 mb-50">
                                    <form action="{{ route('front.subscribe') }}" id="subscribeform"
                                        method="POST">

                                        {{ csrf_field() }}

                                        <div class="sign-up w-100">
                                            <div style="width: 81%;">
                                                @include('includes.admin.form-both')
                                            </div>

                                            <h3 class="mb-0">{{ $langg->lang741 }}</h3>
                                            <p class="mb-0">{{ $langg->lang909 }}</p>
                                            <input type="email" placeholder="{{ $langg->lang741 }}"
                                                name="email" required="" style="width: 52%;">
                                            <button type="submit" class="thm-btn fill-btn" id="sub-btn"
                                                title="">{{ $langg->lang742 }} <span></span></button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="widget d-flex flex-wrap w-100 mb-50">
                                    <ul class="mb-0 list-unstyled w-100">


                                        @foreach ($categories as $category)
                                            <li>
                                                @if ($langg->rtl == 1)
                                                    <a
                                                        href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}">
                                                        {{ $category->name_ar }}</a>
                                                @else
                                                    <a
                                                        href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}">
                                                        {{ $category->name }}</a>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="mb-0 list-unstyled w-100">
                                        <li><a href="{{ route('front.about', $sign) }}" title="">About us</a>
                                        </li>
                                        <li><a href="{{ route('front.blog', $sign) }}"
                                                title="">{{ $langg->lang18 }}</a>
                                        </li>
                                        <li><a href="{{ route('front.gallery', $sign) }}"
                                                title="">{{ $langg->lang221 }}</a></li>
                                        <li><a href="{{ route('front.review', $sign) }}"
                                                title="">{{ $langg->lang222 }} </a></li>
                                        @foreach (DB::table('pages')->where('footer', '=', 1)->get() as $data)
                                            <li>
                                                @if ($langg->rtl == 1)
                                                    <a href="{{ route('front.page', ['slug' => $data->slug_ar, 'lang' => $sign]) }}"
                                                        title=""> {{ $data->title_ar }}</a>
                                                @else
                                                    <a href="{{ route('front.page', ['slug' => $data->slug, 'lang' => $sign]) }}"
                                                        title=""> {{ $data->title }}</a>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="widget w-100 mb-50">
                                    <div class="track w-100">
                                        <i class="flaticon-maps-and-flags"></i>
                                        <h4 class="mb-0">{{ $langg->lang200 }}</h4>
                                        <span class="d-block">{{ $langg->lang230 }}</span>
                                    </div>
                                    <div class="social-links4 d-flex flex-wrap">
                                        @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                            <a class="social"
                                                href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                                                title="Facebook" target="_blank" style="
    border: 0;
"><i
                                                    class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                            <a class="social"
                                                href="{{ App\Models\Socialsetting::find(1)->instagram }}"
                                                title="instagram" target="_blank" style="
    border: 0;
"><i
                                                    class="fab fa-instagram"></i></a>
                                        @endif
                                        @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                            <a class="social"
                                                href="{{ App\Models\Socialsetting::find(1)->twitter }}"
                                                title="Twitter" target="_blank" style="
    border: 0;
"><i
                                                    class="fab fa-twitter"></i></a>
                                        @endif
                                        @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                                            <a class="social"
                                                href="{{ App\Models\Socialsetting::find(1)->youtube }}"
                                                title="youtube" target="_blank" style="
    border: 0;
"><i
                                                    class="fab fa-youtube"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Footer Wrap -->
                </div>
            </div>
        </footer><!-- Footer -->
        <!-- Footer Area End -->

        <div class="bottom-bar w-100">
            <div class="container">
                <div class="bottom-bar-inner d-flex flex-wrap align-items-center justify-content-between w-100">
                    <p class="mb-0"><a href="javascript:void(0);" title="">
                            @if ($langg->rtl == 1)
                                {!! $gs->copyright_ar !!}
                            @else
                                {!! $gs->copyright !!}
                            @endif
                        </a></p>
                    <ul class="bottom-links list-unstyled d-inline-flex mb-0">
                        <!-- <li><a href="javascript:void(0);" title="">Corporate Form</a></li>
                <li><a href="javascript:void(0);" title="">Event Booking Form</a></li>
                <li><a href="javascript:void(0);" title="">{{ $langg->lang19 }}</a></li>-->
                        <li><a href="{{ route('front.contact', $sign) }}" title="">{{ $langg->lang20 }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- Bottom Bar -->
    </main><!-- Main Wrapper -->


    <script type="text/javascript">
        var mainurl = "{{ url('/' . $sign) }}";
        var mainurl2 = "{{ url('/') }}";
        var gs = {!! json_encode($gs) !!};
        var langg = {!! json_encode($langg) !!};
        var mainurl2 = "{{ url('/') }}";
    </script>
    <script type="text/javascript">
        (function() {
            var whatsappNum = {{ $ps->w_phone }};
            var whatsappNumToString = '"' + whatsappNum + '"';
            var options = {
                facebook: '{{ $ps->page_id }}', // Facebook page ID
                whatsapp: whatsappNumToString, // WhatsApp number
                call_to_action: "Message us", // Call to action
                button_color: "#fcb01b", // Color of button
                position: "left", // Position may be 'right' or 'left'
                order: "facebook,whatsapp", // Order of buttons
            };
            var proto = document.location.protocol,
                host = "whatshelp.io",
                url = proto + "//static." + host;
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url + '/widget-send-button/js/init.js';
            s.onload = function() {
                WhWidgetSendButton.init(host, proto, options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
    </script>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    {{-- <script src="{{asset('assets/js/jquery.downCount.js')}}"></script> --}}
    <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-scripts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/toastr.js') }}"></script>

    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() == 0) {

                $('#logo').prop('srcset', '{{ asset('public/assets/images/' . $gs->logo) }}');
                $('.stick').removeClass('sticky');
            } else {

                $('#logo').prop('srcset', '{{ asset('public/assets/images/' . $gs->logo_ar) }}');
                $('header.stick').addClass('sticky');
            } /**/
        });



        //  SUBSCRIBE FORM SUBMIT SECTION

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

        //  SUBSCRIBE FORM SUBMIT SECTION ENDS

        /*    $(function(){
                console.log(0);
            $('[data-countdown]').each(function () {
                console.log(1);
                var $this = $(this),
                        finalDate = $(this).data('countdown');
                console.log(2);
                $this.countdown(finalDate, function (event) {
                    $this.html(event.strftime('<ul class="countdown d-inline-flex mb-0 list-unstyled" ><li><span class="days">%D </span><p class="days_ref mb-0">Days</p></li><li><span class="hours">%H :</span><p class="hours_ref mb-0">Hours</p></li><li><span class="minutes">%M :</span><p class="minutes_ref mb-0">Minutes</p></li><li><span class="seconds">%S</span><p class="seconds_ref mb-0">Seconds</p></li></ul>'));

                    console.log(3);
                });
            });
            });*/
        /*
           $('[data-countdown]').each(function() {
               var $this = $(this), finalDate = $(this).data('countdown');
               $this.countdown(finalDate, function(event) {
                   $this.html(event.strftime('%D days %H:%M:%S'));
               });
           });

           */

        $(document).ready(function() {

            var id = '#dialog';

            //Get the screen height and width
            var maskHeight = $(document).height();
            var maskWidth = $(window).width();

            //Set heigth and width to mask to fill up the whole screen
            $('#mask').css({
                'width': maskWidth,
                'height': maskHeight
            });

            //transition effect		
            $('#mask').fadeIn(500);
            $('#mask').fadeTo("slow", 0.9);

            //Get the window height and width
            var winH = $(window).height();
            var winW = $(window).width();

            //Set the popup window to center
            $(id).css('top', winH / 2 - $(id).height() / 2);
            $(id).css('left', winW / 2 - $(id).width() / 2);

            //transition effect
            $(id).fadeIn(2000);

            //if close button is clicked
            $('.window .close').click(function(e) {
                //Cancel the link behavior
                e.preventDefault();

                $('#mask').hide();
                $('.window').hide();
            });

            //if mask is clicked
            $('#mask').click(function() {
                $(this).hide();
                $('.window').hide();
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
