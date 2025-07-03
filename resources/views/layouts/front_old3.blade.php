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

    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/animate.css') }}">
    <!--    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/') }}slick.css">-->

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/nice-select.css') }}">
    <!--    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/') }}slicknav.min.css">-->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/magnific-popup.css') }}">
    <!--    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/') }}isotope-docs.css">-->
    <!--============= STart header Area =============-->

    <link href="{{ asset(access_public() . 'assets/smilehouse/css/menu.css') }}" rel="stylesheet">
    <!--============= End header Area =============-->

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/video.popup.css') }}">


    <!-- ===================owl slid=================== -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/owl.theme.default.min.css') }}">
    <!-- ===================owl slid=================== -->

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/bootstrap-rtl.css') }}">

    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/smilehouse/css/resp-nav.css') }}">




    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/front/css/toastr.css') }}">

    @yield('css')
</head>

<body>

    <!--============= STart header Area =============-->

    <header class="elementskit-header main-header">
        <div class="header-top">
            <div class="container ">
                <div class="top-outer clearfix">

                    <ul class="top-left">

                        <li><a href="tel:{{ $ps->phone }}"><span class="icon flaticon-phone-receiver"></span>
                                {{ $ps->phone }}</a></li>
                        <li><a href="tel:{{ $ps->fax }}"><span class="icon flaticon-phone-receiver"></span>
                                {{ $ps->fax }}</a></li>
                        <!-- <li><a href="#"><span class="icon flaticon-phone-receiver"></span> 02 (010) 168-88802</a></li> -->

                        <li><a href="mailto:{{ $ps->email }}"><span class="icon flaticon-letter"></span>
                                {{ $ps->email }}</a></li>
                    </ul>

                    <ul class="top-right-info">
                        @if (App\Models\Socialsetting::find(1)->f_status == 1)
                            <li class="mx-3">
                                <a href="{{ App\Models\Socialsetting::find(1)->facebook }}">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                        @endif
                        @if (App\Models\Socialsetting::find(1)->t_status == 1)
                            <li class="mx-3">
                                <a href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                        @endif
                        @if (App\Models\Socialsetting::find(1)->i_status == 1)
                            <li class="mx-3">
                                <a href="{{ App\Models\Socialsetting::find(1)->instagram }}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        @endif
                        @if (App\Models\Socialsetting::find(1)->ystatus == 1)
                            <li class="mx-3">
                                <a href="{{ App\Models\Socialsetting::find(1)->youtube }}">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        @endif

                    </ul>

                </div>

            </div>
        </div>


        <div class="header-upper">
            <div class="container">
                <div class="xs-navbar clearfix">

                    <div class="logo-outer">
                        <div class="logo"><a href="{{ route('front.index', $sign) }}"><img
                                    src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}"></a></div>
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

                        </button>

                        <div class="elementskit-menu-container elementskit-menu-offcanvas-elements">

                            <ul class="elementskit-navbar-nav nav-alignment-dynamic">
                                <li class="active">
                                    <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}

                                    </a>
                                </li>
                                <li><a href="{{ route('front.about', $sign) }}">{{ $langg->lang16 }}
                                    </a>
                                </li>
                                <li class="elementskit-dropdown-has" style="margin-left: 16px;"><i
                                        class="fas fa-chevron-down"></i><a href="#">{{ $langg->lang11 }}</a>
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

                                        <!-- <li><a href="department-details.html">تخصصات عامة
                                            </a></li>
                                       -->

                                    </ul>
                                </li>
                                <li><a href="{{ route('front.gallery', $sign) }}">{{ $langg->lang221 }}
                                    </a></li>
                                <li><a href="{{ route('front.video', $sign) }}">{{ $langg->lang223 }}
                                    </a></li>
                                <li><a href="{{ route('front.blog', $sign) }}">{{ $langg->lang222 }}</a></li>

                                <li><a href="{{ route('front.contact', $sign) }}">{{ $langg->lang20 }}</a></li>


                            </ul>



                            <div class="elementskit-nav-identity-panel">

                                <button class="elementskit-menu-close elementskit-menu-toggler" type="button"><i
                                        class="fas fa-times"></i></button>
                            </div>


                        </div>

                        <div
                            class="elementskit-menu-overlay elementskit-menu-offcanvas-elements elementskit-menu-toggler">
                        </div>

                    </nav>

                </div>
            </div>
        </div>
    </header>

    <!--============= end header Area =============-->


    @yield('content')


    <!--============ Start footer ============-->
    <footer>
        <div class="footer_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="footer_content_box">
                            <div class="footer_logo">
                                <img src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}"
                                    alt="">
                            </div>
                            <div class="Subscribe-box">
                                <p>{!! $langg->rtl == 1 ? $gs->footer_ar : $gs->footer !!}</p>

                                <form class="form-inline" action="{{ route('front.subscribe') }}" id="subscribeform"
                                    method="POST">
                                    {{ csrf_field() }}
                                    <div style="width: 81%;">
                                        @include('includes.admin.form-both')
                                    </div>
                                    <input type="text" class="form-control mb-sm-0" id="inlineFormInputName3"
                                        placeholder="{{ $langg->lang741 }}">
                                    <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="footer_widget">
                            <h4 style="
                            padding-right: 22px;
                        ">
                                {{ $langg->lang11 }}</h4>
                            <ul class="widget_menu">
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
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="footer_widget">
                            <h4>روابط مفيدة</h4>
                            <ul class="widget_menu">
                                <li><a href="{{ route('front.index', $sign) }}"><i
                                            class="fas fa-arrow-circle-left"></i> {{ $langg->lang17 }}</a></li>

                                <li><a href="{{ route('front.about', $sign) }}"><i
                                            class="fas fa-arrow-circle-left"></i>{{ $langg->lang16 }}</a></li>
                                <li><a href="{{ route('front.blog', $sign) }}"><i
                                            class="fas fa-arrow-circle-left"></i>{{ $langg->lang222 }} </a></li>
                                <li><a href="{{ route('front.gallery', $sign) }}"><i
                                            class="fas fa-arrow-circle-left"></i> {{ $langg->lang221 }}</a></li>
                                <li><a href="{{ route('front.contact', $sign) }}"><i
                                            class="fas fa-arrow-circle-left"></i> {{ $langg->lang20 }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-12">
                        <div class="footer_widget">
                            <h4>{{ $langg->lang13 }}</h4>
                            <ul class="widget_menu">

                                <li><i class="fas fa-map-marker-alt"></i><span> {!! $langg->rtl == 1 ? $ps->street_ar : $ps->street !!} </span>
                                </li>
                                <li> <a href="tel:{{ $ps->phone }}" class="icons_single_contact"><i
                                            class="fas fa-phone"></i>{{ $ps->phone }}</a> </li>
                                <li> <a href="mailto:{{ $ps->email }}" class="icons_single_contact"><i
                                            class="far fa-envelope"></i>{{ $ps->email }}</a> </li>




                            </ul>
                            <div class="social-list-2">
                                <ul>

                                    @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                        <li><a href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                                                class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                        <li><a href="{{ App\Models\Socialsetting::find(1)->instagram }}"> <i
                                                    class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                        <li><a href="{{ App\Models\Socialsetting::find(1)->twitter }}"
                                                class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                        <li><a href="{{ App\Models\Socialsetting::find(1)->linkedin }}"
                                                class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright_area">
            <div class="container">
                <div class="row">
                    <div class="col">
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
    </footer>
    <ul id="social-sidebar">

        <li>
            <a class="entypo-twitter pulse" href="tel:{{ $ps->phone }}"><i
                    class="fas fa-phone"></i><span>Phone</span></a>
        </li>
        @if (App\Models\Socialsetting::find(1)->f_status == 1)
            <li>
                <a class="entypo-facebook pulse" href="{{ App\Models\Socialsetting::find(1)->facebook }}"><i
                        class="fab fa-facebook-f"></i><span>Facebook</span></a>
            </li>
        @endif
        <li>
            <a class="entypo-evernote pulse" href="{{ $ps->w_phone }}"><i
                    class="fab fa-whatsapp"></i><span>WhatsApp</span></a>
        </li>
        @if (App\Models\Socialsetting::find(1)->i_status == 1)
            <li>
                <a class="entypo-insta pulse" href="{{ App\Models\Socialsetting::find(1)->instagram }}"><i
                        class="fa fa-instagram fa-fw"></i><span>Instagram</span></a>
            </li>
        @endif
    </ul>
    <!--============ End footer ============-->
    <a href="#" id="toTop" style="display: inline;"><span id="toTopHover" style="opacity: 0;"></span>To
        Top</a>

    <!--============ Start copyright ============-->

    <!--============ End copyright ============-->


    <script src="{{ asset(access_public() . 'assets/smilehouse/js/jquery-3.4.1.min.js') }}"></script>

    <script src="{{ asset(access_public() . 'assets/smilehouse/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/smilehouse/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset(access_public() . 'assets/smilehouse/js/mixitup.min.js') }}"></script>

    <script src="{{ asset(access_public() . 'assets/smilehouse/js/popper.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/smilehouse/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/smilehouse/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/smilehouse/js/main.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/smilehouse/js/nav-tool.js') }}"></script>

    <script src="{{ asset(access_public() . 'assets/smilehouse/js/video.popup.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/smilehouse/js/swiper.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/smilehouse/js/wow.min.js') }}"></script>

    <script src="{{ asset(access_public() . 'assets/smilehouse/js/custom.js') }}"></script>





    <script src="{{ asset(access_public() . 'assets/admin/js/toastr.js') }}"></script>
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
