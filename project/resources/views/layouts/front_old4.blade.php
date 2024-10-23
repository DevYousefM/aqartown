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


    <link
        href="https://fonts.googleapis.com/css?family=Exo:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset('assets/naglaa/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/icomoon-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/animation.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/naglaa/css/magnific-popup.css') }}">
    <link href="{{ asset('assets/naglaa/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/naglaa/css/responsive.css') }}" rel="stylesheet">






    <link rel="stylesheet" href="{{ asset('assets/front/css/toastr.css') }}">

    @yield('css')
</head>

<body>

    <!--============= STart header Area =============-->
    <div class="page-wrapper">

        <div class="preloader"></div>

        <header class="elementskit-header main-header">
            <div class="header-top">
                <div class="container ">
                    <div class="top-outer clearfix">

                        <ul class="top-left">
                            <li><a href="tel:{{ $ps->phone }}"><span class="icon flaticon-phone-receiver"></span>
                                    {{ $ps->phone }}</a></li>
                            <li><a href="tel:{{ $ps->fax }}"><span class="icon flaticon-phone-receiver"></span>
                                    {{ $ps->fax }}</a></li>
                            <!-- <li><span class="icon flaticon-clock-1"></span>Mon-Fri (8am - 6pm)</li> -->
                            <li><a href="mailto:{{ $ps->email }}"><span class="icon flaticon-letter"></span><span
                                        class="__cf_email__"
                                        data-cfemail="cba2a5ada48baeb3aaa6bba7aee5a8a4a6">{{ $ps->email }}</span></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>


            <div class="header-upper">
                <div class="container">
                    <div class="xs-navbar clearfix">
                        <div class="logo-outer">
                            <div class="logo"><a href="{{ route('front.index', $sign) }}"><img
                                        src="{{ asset('assets/images/' . $gs->logo) }}" alt=""
                                        title=""></a>
                            </div>
                        </div>
                        <nav class="elementskit-navbar">

                            <div class="xs-mobile-search">
                                <a href="#modal-popup-2" class="xs-modal-popup"><i class="icon icon-search"></i></a>
                            </div>

                            <button class=" elementskit-menu-toggler xs-bold-menu">
                                <div class="xs-gradient-group">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <span>
                                    Menu
                                </span>
                            </button>


                            <div class="elementskit-menu-container elementskit-menu-offcanvas-elements">

                                <ul class="elementskit-navbar-nav nav-alignment-dynamic">
                                    <li>
                                        <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a>
                                    </li>
                                    <li><a href="{{ route('front.about', $sign) }}">{{ $langg->lang16 }}</a>
                                    </li>
                                    <li class="elementskit-dropdown-has"><a href="#">{{ $langg->lang11 }}</a>
                                        <ul class="elementskit-dropdown elementskit-submenu-panel">
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
                                    <li class="elementskit-dropdown-has"><a href="#">{{ $langg->lang18 }}</a>
                                        <ul class="elementskit-dropdown elementskit-submenu-panel">
                                            <li><a
                                                    href="{{ route('front.gallery', $sign) }}">{{ $langg->lang221 }}</a>
                                            </li>
                                            <li><a href="{{ route('front.video', $sign) }}">{{ $langg->lang223 }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('front.afterbefore', $sign) }}">{{ $langg->lang222 }}</a>
                                    </li>
                                    <li><a href="{{ route('front.contact', $sign) }}">{{ $langg->lang20 }}</a></li>


                                </ul>

                                <div class="elementskit-nav-identity-panel">
                                    <h1 class="elementskit-site-title">
                                        <a href="#" class="elementskit-nav-logo">
                                            @if ($langg->rtl == 1)
                                                {{ $gs->title_ar }}
                                            @else
                                                {{ $gs->title }}
                                            @endif
                                        </a>
                                    </h1>
                                    <button class="elementskit-menu-close elementskit-menu-toggler" type="button"><i
                                            class="icon icon-cross"></i></button>
                                </div>

                            </div>


                            <div
                                class="elementskit-menu-overlay elementskit-menu-offcanvas-elements elementskit-menu-toggler">
                            </div>


                        </nav>
                        <ul class="xs-menu-tools">
                            <li>
                                <a href="#modal-popup-2" class="navsearch-button xs-modal-popup"><i
                                        class="icon icon-search"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </header>


        <!--============= end header Area =============-->


        @yield('content')


        <!--============ Start footer ============-->


        <footer style="
        direction: rtl;
            text-align: right;
    ">
            <div class="footer__area pt-130 footer-bg">
                <div class="container-fluid">
                    <div class="footer__bottom pb-50">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 mb-50">
                                <div class="footer__widget">
                                    <div class="footer__widget-title mb-30">
                                        <div class="logo">
                                            <a href="index.html"><img
                                                    src="{{ asset('assets/images/' . $gs->logo_ar) }}"
                                                    style="
        width: 145px;
            margin-right: 92px;
    
    "
                                                    alt="logo"></a>
                                            <p>{!! $langg->rtl == 1 ? $gs->footer_ar : $gs->footer !!}<br>
                                            </p>
                                        </div>
                                        <!-- <div class="Subscribe-box">
                                                <p>{!! $langg->rtl == 1 ? $gs->footer_ar : $gs->footer !!}</p>

                                                <form class="form-inline" action="{{ route('front.subscribe') }}" id="subscribeform" method="POST">
                                                {{ csrf_field() }}
                                                <div style="width: 81%;">
                                                        @include('includes.admin.form-both')
                                                    </div>
                                                    <input type="text" required  class="form-control mb-sm-0" id="inlineFormInputName3"
                                                        placeholder="{{ $langg->lang741 }}">
                                                    <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                                                </form>

                                            </div> -->
                                    </div>
                                    <div class="footer__widget-content">
                                        <div class="footer__logo-area">

                                            <p></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-6 col-md-6 offset-xl-1 mb-50">
                                <div class="footer__widget">
                                    <div class="footer__widget-title mb-25">
                                        <h2>{{ $langg->lang11 }}</h2>
                                    </div>
                                    <div class="footer__widget-content">
                                        <div class="footer__services">
                                            <ul>

                                                @foreach ($categories->take(6) as $category)
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-6 col-md-6 mb-50">
                                <div class="footer__widget">
                                    <div class="footer__widget-title mb-25">
                                        <h2>{{ $langg->lang20 }}</h2>
                                    </div>
                                    <div class="footer__widget-content">
                                        <div class="footer__contact-info">
                                            <ul style="
        text-align: right;
    ">
                                                <li>
                                                    <div class="footer__contact-address">
                                                        <!-- <span>25 شارع اسماء فاهمي - الدور 8</span> -->
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="footer__contact-item">
                                                        <h6>{{ $langg->lang49 }}:</h6>
                                                        <p><a href="mailto:{{ $ps->email }}" class="__cf_email__"
                                                                data-cfemail="2c45424a436c4e4d5f454f5844494149024f4341">{{ $ps->email }}</a>
                                                        </p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="footer__contact-item">
                                                        <h6>{{ $langg->lang48 }}:</h6>
                                                        <p><a href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a>
                                                        </p>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 offset-xl-1 mb-50">
                                <div class="footer__widget">

                                    <div class="footer__widget-content">
                                        <div class="footer__services">
                                            <h3
                                                style="
                                            color: #fff;
                                        ">
                                                {{ $langg->lang7 }}
                                            </h3>
                                            <ul>
                                                @if (!empty($gs->percent_title))
                                                    @php
                                                        $title = explode(',', $gs->percent_title);

                                                        $title_ar = explode(',', $gs->percent_title_ar);

                                                    @endphp
                                                    @foreach ($title as $key => $data1)
                                                        <li>
                                                            <span>
                                                                {{ $title[$key] }} :
                                                            </span>
                                                            <span>
                                                                {{ $title_ar[$key] }}
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>

                                            <div class="footer__subscribe-form footer__subscribe-form-2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer__copyright">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="footer__copyright-text">
                                    <p style="text-align: center;">
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
            </div>
        </footer>
    </div>


    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon icon-chevron-up"></span></div>

    <div class="xs-sidebar-group info-group">
        <div class="xs-overlay xs-bg-black"></div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="#" class="close-side-widget">
                        <span class="icon icon-cross"></span>
                    </a>
                </div>
                <div class="sidebar-textwidget">

                    <div class="sidebar-info-contents">
                        <div class="content-inner">
                            <div class="logo">
                                <a href="{{ route('front.index', $sign) }}"><img
                                        src="{{ asset('assets/images/' . $gs->logo) }}" alt="" /></a>
                            </div>
                            <div class="content-box">
                                <h2>About Us</h2>
                                <p class="text">We must explain to you how all seds this mistakens idea off
                                    denouncing
                                    pleasures and praising pain was born and I will give you a completed accounts off
                                    the system and expound.</p>
                                <a href="#" class="theme-btn btn-style-one"><i>Consultation</i></a>
                            </div>
                            <div class="contact-info">
                                <h2>Contact Info</h2>
                                <ul class="list-style-one">
                                    <li><span class="icon flaticon-map-1"></span>Rock St 12, Newyork City, USA</li>
                                    <li><span class="icon flaticon-telephone"></span>(000) 000-000-0000</li>
                                    <li><span class="icon flaticon-letter"></span><a
                                            href="https://html.xpeedstudio.com/cdn-cgi/l/email-protection"
                                            class="__cf_email__"
                                            data-cfemail="e5a880818c9f868aa58288848c89cb868a88">[email&#160;protected]</a>
                                    </li>
                                    <li><span class="icon flaticon-clock-2"></span>Week Days: 09.00 to 18.00 Sunday:
                                        Closed</li>
                                </ul>
                            </div>

                            <ul class="social-box">
                                <li class="facebook"><a href="#" class="icon icon-facebook"></a></li>
                                <li class="twitter"><a href="#" class="icon icon-twitter"></a></li>
                                <li class="linkedin"><a href="#" class="icon icon-linkedin"></a></li>
                                <li class="instagram"><a href="#" class="icon icon-instagram"></a></li>
                                <li class="youtube"><a href="#" class="icon icon-youtube"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="xs-sidebar-group cart-group">
        <div class="xs-overlay xs-bg-black"></div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading media">
                    <div class="media-body">
                        <a href="#" class="close-side-widget">
                            <span class="icon icon-cross"></span>
                        </a>
                    </div>
                </div>
                <div class="xs-empty-content">

                    <div class="cart-product">
                        <div class="inner">
                            <div class="cross-icon"><span class="icon icon-cross"></span></div>
                            <div class="image"><img src="images/resource/treatment-one.jpg" alt="" /></div>
                            <h3><a href="shop-single.html">Treatment One</a></h3>
                            <div class="quantity-text">Quantity 1</div>
                            <div class="price">$39.00</div>
                        </div>
                    </div>

                    <div class="cart-product">
                        <div class="inner">
                            <div class="cross-icon"><span class="icon icon-cross"></span></div>
                            <div class="image"><img src="images/resource/treatment-two.jpg" alt="" /></div>
                            <h3><a href="shop-single.html">Treatment Two</a></h3>
                            <div class="quantity-text">Quantity 1</div>
                            <div class="price">$69.00</div>
                        </div>
                    </div>

                    <div class="cart-product">
                        <div class="inner">
                            <div class="cross-icon"><span class="icon icon-cross"></span></div>
                            <div class="image"><img src="images/resource/treatment-three.jpg" alt="" />
                            </div>
                            <h3><a href="shop-single.html">Treatment Three</a></h3>
                            <div class="quantity-text">Quantity 1</div>
                            <div class="price">$99.00</div>
                        </div>
                    </div>
                    <p class="xs-btn-wraper">
                        <a class="btn btn-style-three" href="#">Return To Shop</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="zoom-anim-dialog mfp-hide modal-searchPanel" id="modal-popup-2">
        <div class="xs-search-panel">
            <form action="#" method="POST" class="xs-search-group">
                <input type="search" class="form-control" name="search" id="search" placeholder="Search">
                <button type="submit" class="search-button"><i class="icon icon-search"></i></button>
            </form>
        </div>
    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/naglaa/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/owl.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/paroller.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/wow.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/main.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/nav-tool.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/aos.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/appear.js') }}"></script>
    <script src="{{ asset('assets/naglaa/js/script.js') }}"></script>
    <script>
        AOS.init();
    </script>






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
