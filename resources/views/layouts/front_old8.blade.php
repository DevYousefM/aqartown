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






    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/animation.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/date-picker.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/light-box.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/slick.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/animation.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/absen/css/fotorama.css') }}" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/themify.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/morris.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/magnifypopup.css') }}" rel="stylesheet">

    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/owl.theme.default.min.css') }}" rel="stylesheet">

    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/pxp-carousel.css') }}" rel="stylesheet">

    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/iconfont.css') }}" rel="stylesheet">
    <link href="{{ asset(access_public() . 'assets/absen/css/plugins/flaticon.css') }}" rel="stylesheet">


    <!-- <link href="css/plugins/font-awesome.css" rel="stylesheet"> -->
    <link href="{{ asset(access_public() . 'assets/absen/css/styles.css') }}" rel="stylesheet">









    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/front/css/toastr.css') }}">

    @yield('css')
</head>

<body class="yellow-skin">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader"></div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        <!-- Start Navigation -->
        <div class="header header-light">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{ route('front.index', $sign) }}">
                            <img src="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}" class="logo"
                                alt="" />
                        </a>
                        <div class="nav-toggle"></div>
                        <div class="mobile_nav">
                            <ul>
                                <li class="_my_prt_list"><a href="#"><span>2</span>My List</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#login"><i
                                            class="fas fa-user-circle fa-lg"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu">


                            <li class="active"><a
                                    href="{{ route('front.products', $sign) }}">{{ $langg->lang16 }}<span
                                        class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <!-- <li><a class="active" href="service-details.html">Commercial Display<span
                                                       class="submenu-indicator"></span> </a>
                                               <ul class="nav-dropdown nav-submenu">
                                                   <li><a class="active" href="service-details.html">A27 Pro Series</a>
                                                   </li>
                                                   <li><a href="service-details.html">A27 Plus Series</a></li>
                                                   <li><a href="service-details.html">N Plus Series</a></li>
                                                   <li><a href="service-details.html">K Plus Series</a></li>
                                                   <li><a href="service-details.html">KL Series</a></li>
                                                   <li><a href="service-details.html">KL II Series</a></li>
       
                                               </ul>
                                           </li> -->
                                    @foreach ($about_uss as $k => $about_us)
                                        <li><a class="active"
                                                href="{{ route('front.product2', ['slug' => $about_us->slug, 'lang' => $sign]) }}">
                                                @if ($langg->rtl == 1)
                                                    {{ $about_us->title_ar }}
                                                @else
                                                    {{ $about_us->title }}
                                                @endif
                                            </a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <!--<li><a >Projects</a></li>-->
                            <li><a href="#">{{ $langg->lang18 }}<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    @foreach ($categories as $category)
                                        <li><a class="active"
                                                href="  @if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                                      
                                                        @else
                                                            {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                                                @if ($langg->rtl == 1)
                                                    {{ $category->name_ar }}
                                                @else
                                                    {{ $category->name }}
                                                @endif
                                                <span
                                                    class="{{ count($category->subs) > 0 ? 'submenu-indicator' : '' }}">
                                                </span>
                                            </a>
                                            @if (count($category->subs) > 0)
                                                <ul class="nav-dropdown nav-submenu">
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
                            <li><a href="{{ route('front.markets', $sign) }}">{{ $langg->lang11 }}<span
                                        class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    @foreach ($solutions as $solution)
                                        <li><a
                                                href="{{ route('front.markets_details', ['lang' => $sign, 'slug' => $solution->slug]) }}">
                                                @if ($langg->rtl == 1)
                                                    {{ $solution->name_ar }}
                                                @else
                                                    {{ $solution->name }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">{{ $langg->lang221 }}</span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a class="active" href="{{ route('front.support', $sign) }}">
                                            {{ $langg->lang20 }} </a></li>
                                    <li><a href="{{ route('front.faq', $sign) }}">{{ $langg->lang222 }}</a></li>


                                </ul>
                            </li>

                            <li><a href="#">{{ $langg->lang223 }}<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ route('front.about', $sign) }}">{{ $langg->lang223 }}</a></li>
                                    <!-- <li><a class="active" href="about.html"> Absen Green </a></li> -->
                                    <li><a class="active" href="{{ route('front.video', $sign) }}">
                                            {{ $langg->lang12 }} </a></li>
                                    <li><a class="active" href="{{ route('front.blog', $sign) }}">
                                            {{ $langg->lang13 }} </a></li>
                                </ul>
                            </li>

                            @foreach (DB::table('pages')->where('header', '=', 1)->get() as $data)
                                <li>

                                    @if ($langg->rtl == 1)
                                        <a
                                            href="{{ route('front.page', ['slug' => $data->slug_ar, 'lang' => $sign]) }}">

                                            {{ $data->title_ar }}</a>
                                    @else
                                        <a href="{{ route('front.page', ['slug' => $data->slug, 'lang' => $sign]) }}">

                                            {{ $data->title }}</a>
                                    @endif



                                </li>
                            @endforeach


                            <li><a href="{{ route('front.contact', $sign) }}">{{ $langg->lang220 }}</a></li>





                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">

                            <!--
                                       <li>
                                           <a href="#" class="alio_green" data-toggle="modal" data-target="#login">
                                               <i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
                                           </a>
                                       </li>
                                   
       -->

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->




        @yield('content')

        <!-- ============================ Footer Start ================================== -->
        <footer class="main-footer style-two" style="background-image: url(./img/black-linen.png);">
            <div class="footer-top">
                <div class="container">
                    <div class="widget-section">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget ml-100">
                                    <div class="widget-title">
                                        <h3>{{ $langg->lang16 }}

                                        </h3>
                                        <div class="shape"></div>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="links clearfix">
                                            @foreach ($about_uss->take(5) as $k => $about_us)
                                                <li><a
                                                        href="{{ route('front.product2', ['slug' => $about_us->slug, 'lang' => $sign]) }}">
                                                        @if ($langg->rtl == 1)
                                                            {{ $about_us->title_ar }}
                                                        @else
                                                            {{ $about_us->title }}
                                                        @endif
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget ml-100">
                                    <div class="widget-title">
                                        <h3>{{ $langg->lang18 }}
                                        </h3>
                                        <div class="shape"></div>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="links clearfix">
                                            @foreach ($categories->take(5) as $category)
                                                <li><a
                                                        href="  @if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                                      
                                                        @else
                                                            {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                                                        @if ($langg->rtl == 1)
                                                            {{ $category->name_ar }}
                                                        @else
                                                            {{ $category->name }}
                                                        @endif
                                                        <span></span>
                                                    </a>

                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget ml-70">
                                    <div class="widget-title">
                                        <h3>{{ $langg->lang220 }}
                                        </h3>
                                        <div class="shape"></div>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="links clearfix">
                                            <li><a href="{{ route('front.contact', $sign) }}">{{ $langg->lang1 }}</a>
                                            </li>
                                            @foreach (DB::table('pages')->where('footer', '=', 1)->get() as $data)
                                                <li>

                                                    @if ($langg->rtl == 1)
                                                        <a
                                                            href="{{ route('front.page', ['slug' => $data->slug_ar, 'lang' => $sign]) }}">

                                                            {{ $data->title_ar }}</a>
                                                    @else
                                                        <a
                                                            href="{{ route('front.page', ['slug' => $data->slug, 'lang' => $sign]) }}">

                                                            {{ $data->title }}</a>
                                                    @endif



                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                                <div class="footer-widget links-widget ml-70">
                                    <div class="widget-title">
                                        <h3>{{ $langg->lang2 }}</h3>
                                        <div class="shape"></div>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="links clearfix">
                                            <li><a href="#">
                                                    @if ($langg->rtl == 1)
                                                        {{ $ps->street_ar }}
                                                    @else
                                                        {{ $ps->street }}
                                                    @endif
                                                </a></li>
                                            <li><a href="#">{{ $langg->lang3 }}: <a
                                                        href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a></a>
                                            </li>
                                            <li><a href="#">{{ $langg->lang6 }}: <a
                                                        href="tel:{{ $ps->fax }}">{{ $ps->fax }}</a></a>
                                            </li>
                                            <li><a href="#">{{ $langg->lang7 }}: <a
                                                        href="mailto:{{ $ps->email }}">{{ $ps->email }}</a></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="copyright centred">
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
        </footer>
        <!-- ============================ Footer End ================================== -->

        <a href="{{ $ps->w_phone }}" target="_blank" class="btn-whatsapp-pulse">
            <i class="fab fa-whatsapp"></i>
        </a>

        @if (App\Models\Socialsetting::find(1)->f_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank" class="btn-facebook-pulse">
                <i class="fab fa-facebook-f"></i> </a>
        @endif
        @if (App\Models\Socialsetting::find(1)->t_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank" class="btn-facebook-pulse"
                style="bottom: 293px;"> <i class="fab fa-twitter"></i> </a>
        @endif
        @if (App\Models\Socialsetting::find(1)->l_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}" target="_blank" class="btn-facebook-pulse"
                style="bottom: 238px;"><i class="fab fa-linkedin"></i> </a>
        @endif


        @if (App\Models\Socialsetting::find(1)->i_status == 1)
            <a href="{{ App\Models\Socialsetting::find(1)->instagram }}" target="_blank"
                class="btn-instagram-pulse2"> <i class="fab fa-instagram"></i> </a>
        @endif
        <!-- <a href="https://instagram.com" target="_blank" class="btn-instagram-pulse2">
        <i class="fab fa-instagram"></i>

    </a>

    <a href="https://www.facebook.com" target="_blank" class="btn-facebook-pulse">
        <i class="fab fa-facebook-f"></i>

    </a>-->


        <a href="tel:{{ $ps->phone }}" class="btn-phone-pulse">
            <i class="far fa-phone"></i>
        </a>
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <script src="../../unpkg.com/swiper%407.3.3/swiper-bundle.min.js"></script>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset(access_public() . 'assets/absen/js/jquery.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/popper.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/select2.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/slick.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/fotorama.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/swiper.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/slider-bg.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/lightbox.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/imagesloaded.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/daterangepicker.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/absen/js/custom.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

    <script src="{{ asset(access_public() . 'assets/absen/js/script.js') }}"></script>

    <script>
        // home main slider

        var mainHomeSLider = new Swiper('.home-main-slider', {
            spaceBetween: 0,
            centeredSlides: false,
            speed: 1600,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            loop: true,
            // autoplay: {
            //   delay: 4000,
            //   disableOnInteraction: false,
            // },
            navigation: {
                nextEl: '.home-main-slider-next',
                prevEl: '.home-main-slider-prev',
            },
            pagination: {
                el: '.home-main-slider-pagination',
                clickable: true
            },
        });
    </script>


    <script>
        // lazy loading images
        document.addEventListener('DOMContentLoaded', function() {
            let lazyImages = [].slice.call(document.querySelectorAll('img.lazy'));

            if ('IntersectionObserver' in window) {
                let lazyImageObserver = new IntersectionObserver(function(
                    entries,
                    observer
                ) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            // lazyImage.srcset = lazyImage.dataset.srcset;

                            setTimeout(() => {
                                lazyImage.classList.remove('lazy');
                                lazyImageObserver.unobserve(lazyImage);
                                lazyImage.nextElementSibling.remove();
                            }, 1500);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            } else {
                for (let lazyImg of document.querySelectorAll('img.lazy')) {
                    lazyImg.src = lazyImg.dataset.src;
                }
            }
        });
    </script>

    <script>
        // home gallery section


        if (document.querySelector('.home-light-gallery')) {
            lightGallery(document.querySelector('.home-light-gallery'), {
                thumbnail: true,
            });
        }



        // home gallery section
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
