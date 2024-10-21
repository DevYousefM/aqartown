<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/cangrow/css/aos/aos.min.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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



    <link rel="stylesheet" href="{{ asset('assets/cangrow/css/style.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/toastr.css') }}">

    @yield('css')
</head>

<body class="home">
    <div class="wrapper">
        <div class="popup">
            <div class="popup__wrapBody">
                <div class="popup__body">
                    <div class="popup__content formBlock">
                        <button class="close" type="button">
                            <img class="w-100" src="{{ asset('assets/cangrow/images/svg/close-mobile.svg') }}"
                                alt="Close">
                        </button>
                        <h5 class="popup__title text-center mx-auto">Enter your contact details and a convenient time to
                            call
                        </h5>
                        <div class="popup__text mx-auto text-center">
                            <p>We will call you right now or during other working hours</p>
                        </div>
                        <form id="popupForm" class="chimeForm d-flex flex-column" name="chimeform"
                            action="/popup-feedback.php">
                            <label class="chimeForm__labelField text-center">How can I call you?</label>
                            <div class="chimeForm__wrapField w-100">
                                <input id="popup-name" class="text-center chimeForm__field w-100 reset" type="text"
                                    name="popup-name" placeholder="Your Name">
                                <div class="d-flex chimeForm__notification">
                                    <span class="chimeForm__required">Required field.</span>
                                    <span class="chimeForm__symbols">At least 2 characters.</span>
                                </div>
                            </div>
                            <label class="chimeForm__labelField text-center">Enter your phone</label>
                            <div class="chimeForm__wrapField w-100">
                                <input id="popup-phone" class="text-center chimeForm__field w-100 reset" type="tel"
                                    name="popup-phone" placeholder="+9(___)___-__-__">
                                <div class="d-flex chimeForm__notification">
                                    <span class="chimeForm__required">Required field.</span>
                                </div>
                            </div>
                            <label class="chimeForm__labelField text-center">Enter your Email</label>
                            <div class="chimeForm__wrapField w-100">
                                <input id="popup-email" class="text-center chimeForm__field w-100 reset" type="text"
                                    name="popup-email" placeholder="Your Email">
                                <div class="d-flex chimeForm__notification">
                                    <span class="chimeForm__required">Required field.</span>
                                    <span class="chimeForm__symbols">Please enter correct Email</span>
                                </div>
                            </div>
                            <input type="text" name="popup-invisible"
                                class="chimeForm__field d-none text-center reset w-100">
                            <div class="chimeForm__wrapButtons d-flex justify-content-between">
                                <button id="call-now" type="button" class="chimeForm__button chimeForm__field">Call
                                    now</button>
                                <button id="call-time" type="button"
                                    class="chimeForm__button chimeForm__field active">Call on
                                    time</button>
                            </div>
                            <input class="chimeForm__hidden" type="text" name="call-now" value="Call now">
                            <input class="text-center chimeForm__field chimeForm__dateTime reset" type="text"
                                name="date-time" placeholder="For example: January 21 at 14:00">
                            <button id="popup-send" type="submit" class="chimeForm__submit">Call me back</button>
                        </form>
                        <!-- <p class="chimeForm__textPrivacyPolicy">By clicking on the button, you consent to processing
       your personal data and agree to the <a href="/privacy-policy.html">Privacy Policy</a> -->
                    </div>
                    <div class="popup__content thankBlock popup__content-close">
                        <a href="/" class="logo"><img src="images/logo.png" alt=""></a>
                        <div class="popup__wrap">
                            <h3 class="popup__thanks mx-auto text-center">Thank you, we have accepted your application!
                            </h3>
                            <p class="popup__textAfterSending text-center">Our specialist will contact you shortly.</p>
                            <p class="popup__goodDay text-center">Have a good day!</p>
                        </div>
                        <button type="button" class="chimeForm__submit close">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <header id="header" class="header position-fixed">
            <div class="container">
                <div class="row">
                    <div class="col top-panel align-items-center d-flex justify-content-between">
                        <a href="{{ route('front.index', $sign) }}" class="logo"><img
                                src="{{ asset('public/assets/images/' . $gs->logo) }}" alt="Logo"></a>
                        <nav id="topmenu" class="topmenu d-flex">
                            <button id="burger" class="topmenu__burger ml-auto" type="button">
                                <span class="topmenu__burgerLine">Burger menu</span>
                            </button>
                            <ul class="topmenu__list">
                                <li class="topmenu__listItem active">
                                    <a href="{{ route('front.index', $sign) }}"
                                        class="topmenu__link">{{ $langg->lang17 }}</a>
                                </li>
                                <li class="topmenu__listItem">
                                    <a href="{{ route('front.about', $sign) }}"
                                        class="topmenu__link">{{ $langg->lang16 }}</a>
                                </li>
                                <li class="topmenu__listItem">
                                    <a href="#" class="topmenu__link"> {{ $langg->lang11 }} <span
                                            class="fal fa-angle-down topmenu__arrow"></spam></a>
                                    <ul class="topmenu__sub-list">
                                        @foreach ($categories as $category)
                                            <li class="active">
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


                                    </ul>
                                </li>
                                <li class="topmenu__listItem">
                                    <a href="{{ route('front.team', $sign) }}"
                                        class="topmenu__link">{{ $langg->lang10 }}</a>
                                </li>
                                <li class="topmenu__listItem">
                                    <a href="{{ route('front.faq', $sign) }}"
                                        class="topmenu__link">{{ $langg->lang19 }}</a>
                                </li>
                                <li class="topmenu__listItem">
                                    <a href="{{ route('front.gallery', $sign) }}"
                                        class="topmenu__link">{{ $langg->lang221 }}</a>
                                </li>

                                <li class="topmenu__listItem">
                                    <a href="{{ route('front.contact', $sign) }}"
                                        class="topmenu__link">{{ $langg->lang20 }}</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- <ul class="header__social align-items-center d-flex flex-wrap" data-da="topmenu__list,0,420">
       <li class="header__socialItem">
        <a class="header__socialLink" href="https://www.instagram.com/cangrowonline/"><i class="fab fa-instagram"></i></a>
       </li>
       <li class="header__socialItem">
        <a class="header__socialLink" href="https://www.facebook.com/CanGrowOnline"><i class="fab fa-facebook-f"></i></a>
       </li>
       <li class="header__socialItem">
        <a class="header__socialLink" href="#"><i class="fab fa-twitter"></i></a>
       </li>
       <li class="header__socialItem">
        <a class="header__socialLink" href="Cangrowonline"><i class="fab fa-linkedin-in"></i></a>
       </li>
       <li class="header__socialItem">
        <a class="header__socialLink" href="tel:+201222880903"><i class="fab fa-whatsapp"></i></a>
       </li>
      </ul> -->
                    </div>
                </div>
            </div>
        </header>




        @yield('content')




        <footer class="footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 col-12 d-flex justify-content-center justify-content-md-start">
                        <a class="footer__logo logo" href="{{ route('front.index', $sign) }}"><img
                                src="{{ asset('public/assets/images/' . $gs->logo) }}" alt="logo"></a>
                    </div>
                    <div class="col-md-4 col-12 text-center">
                        <h2 class="footer__title">{{ $langg->lang200 }}</h2>
                        <p class="footer__text">{{ $langg->lang230 }}</p>
                    </div>
                    <div class="col-md-4 col-12 d-flex justify-content-md-end">
                        <ul class="footer__list d-flex justify-content-between d-md-block flex-wrap">
                            <li class="footer__listItem">
                                <a class="footer__listIink" href="mailto:official@cangrowonline.com">official@cangrowonline.com</a>
							</li>
                            @if (!empty($ps->phone))
							<li class="footer__listItem">
								<a class="footer__listIink" href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a>
							</li>
                            @endif 
							<!-- <li class="footer__listItem">
								<a class="footer__listIink" href="/privacy-policy.html">Privacy Policy</a>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="footer__copyright">@if ($langg->rtl == 1)
                    {!! $gs->copyright_ar !!}
                @else
                    {!! $gs->copyright !!}
                @endif</p>
					</div>
				</div>
			</div>
		</footer>
	<ul id="social-sidebar">

    @if (!empty($ps->phone))
        <li>
    <a class="entypo-twitter pulse" href="tel: {{ $ps->phone }}"><i class="fal fa-phone-alt"></i><span>Phone</span></a>
  </li>
  @endif 

  @if (App\Models\Socialsetting::find(1)->f_status == 1)
  <li>
    <a class="entypo-facebook pulse" href="{{ App\Models\Socialsetting::find(1)->facebook }}"  target="_blank"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
  </li>
  @endif
@if (!empty($ps->w_phone))
  <li>
    <a class="entypo-evernote pulse" href="tel: {{ $ps->w_phone }}"><i class="fab fa-whatsapp"></i><span>WhatsApp</span></a>
  </li>
 @endif 
</ul>
	</div>
	<script src="{{ asset('assets/cangrow/js/scripts.min.js') }}"></script>
	<script src="{{ asset('assets/cangrow/js/aos/aos.min.js') }}"></script>
	<script src="{{ asset('assets/cangrow/js/aos/aos-settings.js') }}"></script>
	<!-- Magnific Popup core JS file -->
	<script src="{{ asset('assets/cangrow/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('assets/cangrow/js/counters.js') }}"></script>
	<script src="{{ asset('assets/admin/js/toastr.js') }}"></script>
    <script type="text/javascript">
  var mainurl = "{{ url('/' . $sign) }}";
   var mainurl2 = "{{ url('/') }}";
  var gs      = {!! json_encode($gs) !!};
  var langg    = {!! json_encode($langg) !!};
  var mainurl2 = "{{ url('/') }}";

</script>
    <Script>
   $(document).on('submit','#subscribeform',function(e){
        e.preventDefault();
        console.log(12);
        $('#sub-btn').prop('disabled',true);
        console.log(13);
        $.ajax({
            method:"POST",
            url:$(this).prop('action'),
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                console.log(14);
                if ((data.errors)) {
                    console.log(15);
                    $('.alert-danger').show();
                    $('.alert-danger ul').html('');
                    for(var error in data.errors)
                    {
                        $('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>');
                    }

                }
                else {
                    console.log(16);
                    toastr.success(langg.subscribe_success);
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    $('.alert-success p').html(langg.subscribe_success);

                }

                $('#sub-btn').prop('disabled',false);


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
  <!--End of drift.to Script--> @endif
    @yield('js')
</body>

</html>
