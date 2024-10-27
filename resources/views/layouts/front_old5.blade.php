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

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/images/' . $gs->favicon) }}" />
    <!-- bootstrap -->




    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/lineaer-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/fotorama.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/hamburgers.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/arabslab/css/index.css') }}">





    <link rel="stylesheet" href="{{ asset('public/assets/front/css/toastr.css') }}">

    @yield('css')
</head>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="sbl-half-circle-spin"></div>
        </div>
    </div>


    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <ul class="top-header-information">
                        <li>
                            <i class='bx bxs-map'></i>
                            {{ $langg->rtl == 1 ? $ps->street_ar : $ps->street }}
                        </li>
                        <li>
                            <i class='bx bx-envelope-open'></i>
                            <a href="mailto:{{ $ps->email }}"><span class="__cf_email__"
                                    data-cfemail="d5a6a0a5a5baa7a195b2a7bcbbfbb6bab8">{{ $ps->email }}</span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="top-header-optional">
                        <li>
                            @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                                    class="facebook-bg"> <i class='bx bxl-facebook'></i></a>
                            @endif
                            @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->instagram }}"> <i
                                        class='bx bxl-instagram'></i></a>
                            @endif
                            @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->twitter }}"
                                    class="twitter-bg"><i class='bx bxl-twitter'></i></a>
                            @endif
                            @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->linkedin }}"
                                    class="linkedin-bg"> <i class='bx bxl-linkedin'></i></a>
                            @endif

                        </li>
                        @if ($gs->is_language == 1)
                            <li class="languages-list">
                                <select name="language" class="language selectors nice">
                                    @foreach (DB::table('languages')->get() as $language)
                                        <option value="{{ route('front.language', $language->id) }}"
                                            {{ Session::has('language') ? (Session::get('language') == $language->id ? 'selected' : '') : (DB::table('languages')->where('is_default', '=', 1)->first()->id == $language->id ? 'selected' : '') }}>
                                            {{ $language->language }}</option>
                                    @endforeach
                                </select>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="middle-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="middle-header">
                        <h1>
                            <a href="{{ route('front.index', $sign) }}"><img
                                    src="{{ asset('public/assets/images/' . $gs->logo) }}" alt=""></a>
                        </h1>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <ul class="middle-header-content">
                        <li>
                            <i class="flaticon-emergency-call"></i>
                            {{ $langg->lang1 }}
                            <span><a href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a></span>
                        </li>
                        <li>
                            <i class="flaticon-wall-clock"></i>
                            {{ $langg->lang2 }}
                            <span> {{ $langg->lang3 }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="{{ route('front.index', $sign) }}">
                            <img src="{{ asset('public/assets/images/' . $gs->logo) }}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('front.index', $sign) }}" class="nav-link active">
                                    {{ $langg->lang17 }}
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.about', $sign) }}" class="nav-link">{{ $langg->lang16 }}</a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('front.categories', $sign) }}" class="nav-link">
                                    {{ $langg->lang11 }}
                                    <i class='bx bx-caret-down'></i>
                                </a>
                                <ul class="dropdown-menu">

                                    @foreach ($categories as $category)
                                        <li class="nav-item">
                                            @if ($langg->rtl == 1)
                                                <a href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}"
                                                    class="nav-link" title="{{ $category->name_ar }}">
                                                    {{ $category->name_ar }}</a>
                                            @else
                                                <a href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}"
                                                    class="nav-link" title="{{ $category->name }}">
                                                    {{ $category->name }}</a>
                                            @endif

                                        </li>
                                    @endforeach
                                </ul>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('front.blog', $sign) }}" class="nav-link">{{ $langg->lang222 }}</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.team', $sign) }}" class="nav-link">
                                    {{ $langg->lang18 }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.gallery', $sign) }}"
                                    class="nav-link">{{ $langg->lang221 }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.faq', $sign) }}" class="nav-link">{{ $langg->lang223 }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.contact', $sign) }}"
                                    class="nav-link">{{ $langg->lang20 }}</a>
                            </li>
                        </ul>
                        <!-- <div class="others-options d-flex align-items-center">
                            <div class="option-item">
                                <div class="search-btn">
                                    <a class="#" href="#searchmodal" data-bs-toggle="modal"
                                        data-bs-target="#searchmodal">
                                        <i class="flaticon-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="option-item">
                                <div class="navbar-btn">
                                    <a href="appointment.html" class="default-btn">Book Appointment</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </nav>
            </div>
        </div>
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <!-- <div class="container">
                    <div class="option-inner">
                        <div class="others-options d-flex align-items-center">
                            <div class="option-item">
                                <div class="search-btn">
                                    <a class="#" href="#searchmodal" data-bs-toggle="modal"
                                        data-bs-target="#searchmodal">
                                        <i class="flaticon-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="option-item">
                                <div class="navbar-btn">
                                    <a href="appointment.html" class="default-btn">Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>



    @yield('content')



    <footer class="footer-area pt-100 pb-70"
        style="background: linear-gradient(324deg, #1d31575e, #1a1a1af2),url({{ asset('public/assets/images/' . $gs->contact_icon) }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <h2>
                            <a href="{{ route('front.index', $sign) }}"><img
                                    src="{{ asset('public/assets/images/' . $gs->logo_ar) }}" alt=""></a>
                        </h2>
                        <p>{!! $langg->rtl == 1 ? $gs->footer_ar : $gs->footer !!}</p>
                        <!-- <div class="signature">
                            <img src="assets/images/footer/signature.png" alt="image">
                        </div>
                        <div class="footer-info">
                            <img src="assets/images/footer/footer-1.jpg" alt="image">
                            <h4>Dr. Thomas Albin</h4>
                            <span>CEO & Founder</span>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>{{ $langg->lang220 }}</h3>
                        <ul class="quick-links">
                            <li>
                                <a href="{{ route('front.about', $sign) }}">{{ $langg->lang16 }}</a>
                            </li>

                            @foreach ($categories->take(3) as $category)
                                <li>
                                    @if ($langg->rtl == 1)
                                        <a
                                            href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}"title="{{ $category->name_ar }}">
                                            {{ $category->name_ar }}</a>
                                    @else
                                        <a href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}"
                                            title="{{ $category->name }}">
                                            {{ $category->name }}</a>
                                    @endif

                                </li>
                            @endforeach

                            <li>
                                <a href="{{ route('front.blog', $sign) }}">{{ $langg->lang222 }}</a>
                            </li>
                            <li>
                                <a href="{{ route('front.faq', $sign) }}">{{ $langg->lang223 }}</a>
                            </li>

                            {{--  <li>
                                <a href="privacy-policy.html">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="services.html">Pediatrics</a>
                            </li>
                            <li>
                                <a href="services.html">Woman's Health</a>
                            </li>
                            <li>
                                <a href="terms-of-service.html">Terms Of Use</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>{{ $langg->lang12 }}</h3>
                        <div class="footer-widget-blog">


                            @foreach (App\Models\Blog::orderBy('created_at', 'desc')->limit(3)->get() as $blog)
                                <article class="item">
                                    <a href="{{ route('front.blogshow', ['id' => $blog->id, 'lang' => $sign]) }}"
                                        class="thumb">
                                        <span class="fullimage bg1" role="img"
                                            style="background-image: url({{ asset('public/assets/images/blogs/' . $blog->photo) }});"></span>
                                    </a>
                                    <div class="info">
                                        <span><a
                                                href="{{ route('front.blogshow', ['id' => $blog->id, 'lang' => $sign]) }}">{{ date('M d - Y', strtotime($blog->created_at)) }}</a></span>
                                        <h4><a
                                                href="{{ route('front.blogshow', ['id' => $blog->id, 'lang' => $sign]) }}">
                                                @if ($langg->rtl == 1)
                                                    {{ strlen($blog->title_ar) > 100 ? substr($blog->title_ar, 0, 100) . ' ..' : $blog->title_ar }}
                                                @else
                                                    {{ strlen($blog->title) > 45 ? substr($blog->title, 0, 45) . ' ..' : $blog->title }}
                                                @endif
                                            </a></h4>
                                    </div>
                                </article>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>{{ $langg->lang13 }}</h3>
                        <ul class="footer-information">


                            @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                <li>
                                    <i class="fab fa-facebook-f"></i>
                                    <span><a href="{{ App\Models\Socialsetting::find(1)->facebook }}">
                                            Facebook</a></span>
                                </li>
                            @endif
                            @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                <li>
                                    <i class="fab fa-twitter"></i>
                                    <span><a href="{{ App\Models\Socialsetting::find(1)->twitter }}">
                                            Twitter</a></span>
                                </li>
                            @endif
                            @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                <li>
                                    <i class="fab fa-linkedin"></i>
                                    <span><a href="{{ App\Models\Socialsetting::find(1)->linkedin }}">
                                            linkedin</a></span>
                                </li>
                            @endif
                            @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                <li>
                                    <i class="fab fa-instagram"></i>
                                    <span><a href="{{ App\Models\Socialsetting::find(1)->instagram }}">
                                            instagram</a></span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="copyright-area">
        <div class="container">
            <div class="copyright-area-content">
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
    <ul id="social-sidebar">
        @if (!empty($ps->phone))
            <li>
                <a class="entypo-twitter pulse" href="tel: {{ $ps->phone }}"><i
                        class="fal fa-phone-alt"></i><span>Phone</span></a>
            </li>
        @endif
        @if (App\Models\Socialsetting::find(1)->f_status == 1)
            <li>
                <a class="entypo-facebook pulse" href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                    target="_blank"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
            </li>
        @endif
        @if (!empty($ps->w_phone))
            <li>
                <a class="entypo-evernote pulse" href="{{ $ps->w_phone }}"><i
                        class="fab fa-whatsapp"></i><span>WhatsApp</span></a>
            </li>
        @endif
    </ul>

    <div class="go-top">
        <i class='bx bx-up-arrow-alt'></i>
    </div>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('public/assets/qoudorat/assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/popper.min.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/jquery.meanmenu.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/jquery.appear.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/odometer.min.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/nice-select.min.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/jquery.ajaxchimp.min.js') }}"></script>


    <script src="{{ asset('public/assets/qoudorat/assets/js/form-validator.min.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/contact-form-script.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/wow.min.js') }}"></script>

    <script src="{{ asset('public/assets/qoudorat/assets/js/main.js') }}"></script>


    <script src="{{ asset('public/assets/qoudorat/assets/js/') }}"></script>







    <script src="{{ asset('public/assets/admin/js/toastr.js') }}"></script>
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
