<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

        $services = DB::table('our_teams')->get();
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




    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/lineaer-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/fotorama.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/hamburgers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/arabslab/css/index.css') }}">





    <link rel="stylesheet" href="{{ asset('assets/front/css/toastr.css') }}">

    @yield('css')
</head>

<body>
    <div class="header-md">
        <div class="logo-lines">
            <div class="container">
                <div class="logo-img">
                    <a href="{{ route('front.index', $sign) }}">
                        <img src="{{ asset('assets/images/' . $gs->logo) }}" alt="img">
                    </a>
                </div>
                <div class="lines hamburger hamburger--elastic">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
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
                <li class="drop-li">
                    <a href="#" class="drop-a">
                        <span>
                            {{ $langg->lang16 }}
                        </span>
                        <i class="lnr lnr-chevron-down"></i>
                    </a>
                    <ul class="dropped-ul">

                        <li>
                            <a href="{{ route('front.about', $sign) }}">
                                <span>
                                    {{ $langg->lang11 }}

                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.aboutus', $sign) }}">
                                <span>
                                    {{ $langg->lang18 }}
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.profits', $sign) }}">
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
                        <li>
                            <a href="{{ route('front.jobs', $sign) }}">
                                <span>
                                    {{ $langg->lang20 }}
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.categories', $sign) }}">
                                <span>
                                    {{ $langg->lang223 }}
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="drop-li">
                    <a href="{{ route('front.services', $sign) }}" class="drop-a">
                        <span>
                            {{ $langg->lang12 }}
                        </span>
                        <i class="lnr lnr-chevron-down"></i>
                    </a>
                    <ul class="dropped-ul">

                        @foreach ($services as $service)
                            <li>
                                <a
                                    href="{{ route('front.service', ['service' => $service->title, 'lang' => $sign]) }}">
                                    <span>
                                        @if ($langg->rtl == 1)
                                            {{ $service->title_ar }}
                                        @else
                                            {{ $service->title }}
                                        @endif
                                    </span>
                                </a>
                            </li>
                        @endforeach



                    </ul>
                </li>
                <li>
                    <a href="{{ route('front.management', $sign) }}">
                        <span>
                            {{ $langg->lang13 }}
                        </span>
                    </a>
                </li>
                <li class="drop-li">
                    <a href="#" class="drop-a">
                        <span>
                            {{ $langg->lang220 }}
                        </span>
                        <i class="lnr lnr-chevron-down"></i>
                    </a>
                    <ul class="dropped-ul">
                        <li>
                            <a href="{{ route('front.gallery', $sign) }}">
                                {{ $langg->lang1 }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.video', $sign) }}">
                                {{ $langg->lang2 }}
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('front.contact', $sign) }}">
                        <span>
                            {{ $langg->lang3 }}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="header-lg">

        <div class="header-lg-bottom">
            <div class="container">
                <ul class="main-header-lg-ul">
                    <li class="img-li">
                        <a href="{{ route('front.index', $sign) }}">
                            <img src="{{ asset('assets/images/' . $gs->logo) }}" alt="img">
                        </a>
                    </li>
                    <li class="active-li">
                        <a href="{{ route('front.index', $sign) }}">
                            <span>
                                {{ $langg->lang17 }}
                            </span>
                        </a>
                    </li>
                    <li class="hover-li">
                        <a href="#" class="hover-a">
                            <span>
                                {{ $langg->lang16 }}
                            </span>
                            <i class="lnr lnr-chevron-down"></i>
                        </a>
                        <ul class="hovered-ul">

                            <li>
                                <a href="{{ route('front.about', $sign) }}">
                                    <span>
                                        {{ $langg->lang11 }}

                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.aboutus', $sign) }}">
                                    <span>
                                        {{ $langg->lang18 }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.profits', $sign) }}">
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
                            <li>
                                <a href="{{ route('front.jobs', $sign) }}">
                                    <span>
                                        {{ $langg->lang20 }}
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.categories', $sign) }}">
                                    <span>
                                        {{ $langg->lang223 }}
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="hover-li">
                        <a href="{{ route('front.services', $sign) }}" class="hover-a">
                            <span>
                                {{ $langg->lang12 }}
                            </span>
                            <i class="lnr lnr-chevron-down"></i>
                        </a>
                        <ul class="hovered-ul">
                            @foreach ($services as $service)
                                <li>
                                    <a
                                        href="{{ route('front.service', ['service' => $service->title, 'lang' => $sign]) }}">
                                        <span>
                                            @if ($langg->rtl == 1)
                                                {{ $service->title_ar }}
                                            @else
                                                {{ $service->title }}
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('front.management', $sign) }}">
                            <span>
                                {{ $langg->lang13 }}
                            </span>
                        </a>
                    </li>
                    <li class="hover-li">
                        <a href="#" class="hover-a">
                            <span>
                                {{ $langg->lang220 }}
                            </span>
                            <i class="lnr lnr-chevron-down"></i>
                        </a>
                        <ul class="hovered-ul">
                            <li>
                                <a href="{{ route('front.gallery', $sign) }}">
                                    {{ $langg->lang1 }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.video', $sign) }}">
                                    {{ $langg->lang2 }}
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('front.contact', $sign) }}">
                            <span>
                                {{ $langg->lang3 }}
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end header -->




    @yield('content')






    <footer>
        <div class="footer_area">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6 col-lg-4 col-12">
                        <div class="footer_widget">
                            <h4 style="
                        padding-right: 22px;
                    ">
                                {{ $langg->lang6 }} </h4>
                            <ul class="widget_menu">
                                <li>
                                    <a href="#" title="تخصصات عامة">
                                        {{ $langg->lang47 }}</a>

                                </li>



                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-12">
                        <div class="footer_widget">
                            <h4> {{ $langg->lang7 }}</h4>
                            <ul class="widget_menu">
                                <li><a href="#"><i class="fas fa-arrow-circle-left"></i>
                                        {{ $langg->lang41 }}</a></li>



                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-12">
                        <div class="footer_widget">
                            <h4>{{ $langg->lang8 }}</h4>
                            <ul class="widget_menu">
                                @if (!empty($ps->phone))
                                    <li> <a href="tel:{{ $ps->phone }}" class="icons_single_contact"><i
                                                class="fas fa-phone"></i>{{ $ps->phone }}</a> </li>
                                @endif
                                @if (!empty($ps->fax))
                                    <li> <a href="tel:{{ $ps->fax }}" class="icons_single_contact"><i
                                                class="fas fa-phone"></i>{{ $ps->fax }}</a> </li>
                                @endif
                                @if (!empty($ps->email))
                                    <li> <a href="mailto:{{ $ps->email }}" class="icons_single_contact"><i
                                                class="far fa-envelope"></i>{{ $ps->email }}</a> </li>
                                @endif

                            </ul>
                            <div class="social-list-2">
                                <ul>


                                    @if (App\Models\Socialsetting::find(1)->f_status == 1)
                                        <li>

                                            <a href="{{ App\Models\Socialsetting::find(1)->facebook }}"> <i
                                                    class="fab fa-facebook-f"></i> </a>
                                        </li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->t_status == 1)
                                        <li>

                                            <a href="{{ App\Models\Socialsetting::find(1)->twitter }}"> <i
                                                    class="fab fa-twitter"></i> </a>
                                        </li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->l_status == 1)
                                        <li>

                                            <a href="{{ App\Models\Socialsetting::find(1)->linkedin }}"><i
                                                    class="fab fa-linkedin"></i> </a>
                                        </li>
                                    @endif
                                    @if (App\Models\Socialsetting::find(1)->i_status == 1)
                                        <li>

                                            <a href="{{ App\Models\Socialsetting::find(1)->instagram }}"> <i
                                                    class="fab fa-instagram"></i> </a>
                                        </li>
                                    @endif
                                    <!-- <li><a href="#" class="facebook-bg"> <i class="ion-social-facebook-outline"></i></a></li>
                  <li><a href="#" class="facebook-bg">  <i class="ion-social-youtube-outline"></i></a></li>
                  <li><a href="#"><i class="far fa-envelope"></i></a></li> -->



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
                        <p> </p>
                        <div>
                            @if ($langg->rtl == 1)
                                {!! $gs->copyright_ar !!}
                            @else
                                {!! $gs->copyright !!}
                            @endif
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <button class="scroltop fa fa-arrow-up style5"></button>
    <script src="{{ asset('assets/arabslab/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/jquery.counterup.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/aos.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/fotorama.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/lightgallery.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/lg-thumbnail.js') }}"></script>
    <script src="{{ asset('assets/arabslab/js/index.js') }}"></script>










    <script src="{{ asset('assets/admin/js/toastr.js') }}"></script>
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
