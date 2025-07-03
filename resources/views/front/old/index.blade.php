@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{ asset(access_public() . 'assets/images/' . $gs->logo) }}" />
@stop

@section('content')


    <section>
        <div class="w-100 position-relative">
            <div class="feat-wrap position-relative w-100">
                <div class="feat-caro">
                    @foreach ($sliders as $slide)
                        @php
                            $galss = str_replace(' ', '%20', $slide->photo);
                        @endphp


                        @if (!empty($slide->date))
                            @if (Carbon\Carbon::now()->format('Y-m-d') < Carbon\Carbon::parse($slide->date)->format('Y-m-d'))
                                <div class="feat-item-wrap">
                                    <div class="feat-item pb-240 d-flex flex-wrap align-items-end">
                                        <div class="feat-img position-absolute w-100"
                                            style="background-image: url({{ asset('/' . access_public() . '/assets/images/sliders/' . $galss) }})">
                                        </div>
                                        <div class="container">
                                            <div class="row justify-content-between align-items-end">
                                                @if (!empty($slide->video))
                                                    <div class="col-md-12 col-sm-12 col-lg-5 order-lg-1">
                                                        <span class="d-block text-right">
                                                            <a class="d-inline-block play-btn" data-fancybox
                                                                href="{{ $slide->video }}" title="Video">
                                                                <svg version="1.1" class="play"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                    y="0px" height="10rem" width="10rem"
                                                                    viewBox="0 0 100 100"
                                                                    enable-background="new 0 0 100 100"
                                                                    xml:space="preserve">
                                                                    <path class="stroke-dotted" fill="none"
                                                                        stroke="#fff"
                                                                        d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7 C97.3,23.7,75.7,2.3,49.9,2.5">
                                                                    </path>
                                                                    <path class="icon" fill="#fff"
                                                                        d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                        </span>
                                                    </div>
                                                @endif

                                                <div class="col-md-12 col-sm-12 col-lg-7">
                                                    <div class="feat-cap w-100" style="padding-left: 8%;">
                                                        @if (!empty($slide->subtitle_text) || !empty($slide->subtitle_text_ar))
                                                            <i
                                                                class="text-white">{{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}</i>
                                                        @endif
                                                        @if (!empty($slide->title_text) || !empty($slide->title_text_ar))
                                                            <h3 class="mb-0 text-white"><a href="{{ $slide->link }}"
                                                                    title="">{{ $langg->rtl == 1 ? $slide->title_text_ar : $slide->title_text }}</a>
                                                            </h3>
                                                        @endif
                                                        @if (!empty($slide->details_text) || !empty($slide->details_text_ar))
                                                            <span class="d-block text-white"><i
                                                                    class="fas fa-map-marker-alt"></i>{{ $langg->rtl == 1 ? $slide->details_text_ar : $slide->details_text }}</span>
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div data-countdown="{{ $slide->date }}">


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="feat-item-wrap">
                                <div class="feat-item pb-240 d-flex flex-wrap align-items-end">
                                    <div class="feat-img position-absolute w-100"
                                        style="background-image: url({{ asset('/' . access_public() . '/assets/images/sliders/' . $galss) }})">
                                    </div>
                                    <div class="container">
                                        <div class="row justify-content-between align-items-end">
                                            @if (!empty($slide->video))
                                                <div class="col-md-12 col-sm-12 col-lg-5 order-lg-1">
                                                    <span class="d-block text-right">
                                                        <a class="d-inline-block play-btn" data-fancybox
                                                            href="{{ $slide->video }}" title="Video">
                                                            <svg version="1.1" class="play"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                height="10rem" width="10rem" viewBox="0 0 100 100"
                                                                enable-background="new 0 0 100 100" xml:space="preserve">
                                                                <path class="stroke-dotted" fill="none" stroke="#fff"
                                                                    d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7 C97.3,23.7,75.7,2.3,49.9,2.5">
                                                                </path>
                                                                <path class="icon" fill="#fff"
                                                                    d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </span>
                                                </div>
                                            @endif

                                            <div class="col-md-12 col-sm-12 col-lg-7">
                                                <div class="feat-cap w-100">
                                                    @if (!empty($slide->subtitle_text) || !empty($slide->subtitle_text_ar))
                                                        <i
                                                            class="text-white">{{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}</i>
                                                    @endif
                                                    @if (!empty($slide->title_text) || !empty($slide->title_text_ar))
                                                        <h3 class="mb-0 text-white"><a href="{{ $slide->link }}"
                                                                title="">{{ $langg->rtl == 1 ? $slide->title_text_ar : $slide->title_text }}</a>
                                                        </h3>
                                                    @endif
                                                    @if (!empty($slide->details_text) || !empty($slide->details_text_ar))
                                                        <span class="d-block text-white"><i
                                                                class="fas fa-map-marker-alt"></i>{{ $langg->rtl == 1 ? $slide->details_text_ar : $slide->details_text }}</span>
                                                    @endif
                                                    <br>
                                                    <br>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach
                </div>
            </div><!-- Featured Area Wrap -->
        </div>
    </section>

    <!-- <section style="background-image: url(assets/images/_DSC2816.jpg);background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">-->
    <section>
        <div class="w-100 pt-120 pb-120 gray-layer opc9 position-relative">
            <div class="fixed-bg patern-bg" style="background-image: url(assets/images/patter-bg1.jpg);"></div>
            <div class="container">
                @foreach ($about_uss as $about_us)
                    <div class="about-wrap2 w-100">

                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-12 col-lg-6">
                                <div class="about-img style2">
                                    @if (!empty($about_us->video))
                                        <a class="d-inline-block position-absolute play-btn" data-fancybox
                                            href="{{ $about_us->video }}" title="Video">
                                            <svg version="1.1" class="play" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="10rem"
                                                width="10rem" viewBox="0 0 100 100" enable-background="new 0 0 100 100"
                                                xml:space="preserve">
                                                <path class="stroke-dotted" fill="none" stroke="#fff"
                                                    d="M49.9,2.5C23.6,2.8,2.1,24.4,2.5,50.4C2.9,76.5,24.7,98,50.3,97.5c26.4-0.6,47.4-21.8,47.2-47.7 C97.3,23.7,75.7,2.3,49.9,2.5">
                                                </path>
                                                <path class="icon" fill="#fff"
                                                    d="M38,69c-1,0.5-1.8,0-1.8-1.1V32.1c0-1.1,0.8-1.6,1.8-1.1l34,18c1,0.5,1,1.4,0,1.9L38,69z">
                                                </path>
                                            </svg>
                                        </a>
                                    @endif
                                    <img class="img-fluid w-100"
                                        src="{{ asset(access_public() . 'assets/images/brands/' . $about_us->photo) }}"
                                        alt="{{ $about_us->name }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-6">
                                <div class="about-desc3 w-100">
                                    <div class="sec-title mb-25 w-100">
                                        <div class="sec-title-inner pt-0 d-inline-block">
                                            <span class="d-block thm-clr">
                                                @if ($langg->rtl == 1)
                                                    {{ $about_us->title_ar }}
                                                @else
                                                    {{ $about_us->title }}
                                                @endif

                                            </span>

                                            <h3 class="mb-0">
                                                @if ($langg->rtl == 1)
                                                    {{ $about_us->name_ar }}
                                                @else
                                                    {{ $about_us->name }}
                                                @endif
                                            </h3>
                                        </div>
                                    </div><!-- Sec Title -->
                                    <p class="mb-0">
                                        @if ($langg->rtl == 1)
                                            {!! $about_us->meta_description_ar !!}
                                        @else
                                            {!! $about_us->meta_description !!}
                                        @endif
                                    </p>
                                    <a class="thm-btn fill-btn" href="{{ route('front.about', $sign) }}"
                                        title="">More Information <i
                                            class="flaticon-trajectory"></i><span></span></a>
                                </div>
                            </div>
                        </div>

                    </div><!-- About Wrap -->
                @endforeach
                <div class="features-wrap pt-120 w-100">
                    <h3 class="mb-0 text-center">{{ $langg->lang223 }} </h3>
                    <div class="features-inner w-100">
                        <div class="row mrg15">
                            @foreach ($categoriess as $category)
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="feature-box mt-15 w-100">
                                        @if ($langg->rtl == 1)
                                            <a
                                                href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}">
                                                {{ $category->name_ar }}</a>
                                        @else
                                            <a
                                                href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}">
                                                {{ $category->name }}</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <span id="dots"></span>
                        <div class="row mrg15 more-show" id="more" style="display: none">
                            @foreach ($categoriesss as $category)
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="feature-box mt-15 w-100">
                                        @if ($langg->rtl == 1)
                                            <a
                                                href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}">
                                                {{ $category->name_ar }}</a>
                                        @else
                                            <a
                                                href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}">
                                                {{ $category->name }}</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (count($categoriesss) > 0)
                            <div class="col-md-12 col-sm-12 col-lg-12 order-md-1">
                                <div class="btns-wrap mt-60 text-center w-100">

                                    <button class="thm-btn mt-20 brd-btn read-more-btn" id="myBtn"
                                        title="">{{ $langg->lang12 }}<i
                                            class="flaticon-trajectory"></i><span></span></button>
                                </div><!-- Buttons Wrap -->
                            </div>
                        @endif
                    </div>
                </div><!-- Features Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-110 pb-120 position-relative">
            <div class="container">
                <div class="sec-title btm-icn mb-50 w-100 text-center">
                    <div class="sec-title-inner d-inline-block">
                        <span class="d-block thm-clr">{{ $langg->lang13 }}</span>
                        <h2 class="mb-0">{{ $langg->lang220 }}</h2>
                        <i class=""></i>
                    </div>
                </div><!-- Sec Title -->
                <div class="blog-wrap w-100">
                    <div class="blog-caro">
                        @foreach ($blogs as $blogg)
                            <div class="post-style1 w-100 position-relative">
                                <div class="post-meta">
                                    <span class="post-date thm-clr">{{ date('d', strtotime($blogg->created_at)) }}<i
                                            class="d-block">{{ date('M, Y', strtotime($blogg->created_at)) }}</i></span>
                                    <span class="post-cmt">{{ count($blogg->comments) }}</span>
                                </div>
                                <div class="post-img overflow-hidden position-relative w-100">
                                    <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}"
                                        title=""><img class="img-fluid w-100"
                                            src="{{ $blogg->photo ? asset(access_public() . 'assets/images/blogs/' . $blogg->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                            alt="{{ $langg->rtl == 1 ? $blogg->alt_ar : $blogg->alt }}"></a>
                                </div>
                                <div class="post-info w-100">
                                    <h3 class="mb-0"><a
                                            href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}"
                                            title="">
                                            @if ($langg->rtl == 1)
                                                {{ strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar, 0, 50) . '...' : $blogg->title_ar }}
                                            @else
                                                {{ strlen($blogg->title) > 50 ? substr($blogg->title, 0, 50) . '...' : $blogg->title }}
                                            @endif
                                        </a>
                                    </h3>
                                    <p class="mb-0">
                                        @if ($langg->rtl == 1)
                                            {{ substr(strip_tags($blogg->mobile_details_ar), 0, 120) }}
                                        @else
                                            {{ substr(strip_tags($blogg->mobile_details), 0, 120) }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- Blog Wrap -->
            </div>
        </div>
    </section>
    @if ($gs->multiple_packaging == 1)
        <div class="facts-wrap mt-70 style2 text-center w-100 pb-120" style="padding-bottom: 115px;">
            <div class="row mrg">
                @foreach ($counters as $counter)
                    <div class="col-md-6 col-sm-6 col-lg-4">
                        <div class="fact-box mt-30 w-100">

                            <h3 class="mb-0"><span class="counter">{{ $counter->value }}</span>+</h3>
                            <a href="#">
                                <span class="d-block"
                                    style="font-size: 25px;letter-spacing: 3px;">{{ $langg->rtl == 1 ? $counter->title_ar : $counter->title }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div><!-- Facts Wrap -->
    @endif


    <section>
        <div class="w-100 position-relative">
            <div class="contact-map-wrap w-100">
                <h2 class="mb-0 text-center"><span class="thm-clr">{{ $langg->lang1 }}</span> {{ $langg->lang2 }} <br>
                    {{ $langg->lang3 }} </h2>
                <div class="contact-map-inner gray-layer opc97 position-relative w-100">
                    <div class="fixed-bg" style="background-image: url(assets/images/parallax6.jpg);"></div>
                    <div class="row mrg align-items-center">
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="contact-map w-100" id="contact-map">
                                {!! $ps->map !!}

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <div class="contact-form-wrap w-100">
                                <div class="contact-form-inner d-inline-block">
                                    <form class="w-100" id="email-form" action="{{ route('front.contact.submit') }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group w-100">
                                            <div class="response w-100"></div>
                                        </div>
                                        <div class="row mrg20">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <input class="w-100 fname" type="text" name="name"
                                                    placeholder="{{ $langg->lang47 }} *" required>
                                            </div>
                                            {{-- <div class="col-md-6 col-sm-6 col-lg-6">
                                                         <input class="w-100 lname" type="text" name="lname" placeholder="Last Name" required>
                                                     </div> --}}
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <input class="w-100 email" type="email" name="email"
                                                    placeholder="{{ $langg->lang49 }} *" required>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <input class="w-100 phone" type="tel" name="phone"
                                                    placeholder="{{ $langg->lang48 }} *" required>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <textarea class="w-100 contact_message" name="text" placeholder="{{ $langg->lang50 }} *" required></textarea>

                                                @if ($gs->is_capcha == 1)
                                                    <ul class="captcha-area">
                                                        <li>
                                                            <p><img class="codeimg1"
                                                                    src="{{ asset(access_public() . 'assets/images/capcha_code.png') }}"
                                                                    alt=""> <i
                                                                    class="fas fa-sync-alt pointer refresh_code"></i></p>

                                                        </li>
                                                        <li>
                                                            <input name="codes" type="text" class="input-field"
                                                                placeholder="{{ $langg->lang51 }}" required="">

                                                        </li>
                                                    </ul>
                                                @endif


                                                <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                                                <button class="thm-btn fill-btn" id="submit"
                                                    type="submit">{{ $langg->lang52 }}<span></span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Contact With Map -->
        </div>
    </section>
    <section>
        <div class="w-100 pt-100 pb-100 position-relative">
            <div class="container">
                <div class="sponsors-wrap w-100">
                    <div class="sponsor-caro">
                        <!--sr-box -->
                        @foreach ($partners as $partner)
                            <div class="text-center w-100">
                                <a href="{{ $partner->link }}" title=""><img class="img-fluid d-inline-block"
                                        src="{{ asset(access_public() . 'assets/images/partner/' . $partner->photo) }}"
                                        alt="Sponsor Image 1"></a>
                            </div>
                        @endforeach
                    </div>
                </div><!-- Sponsors Wrap -->
            </div>
        </div>
    </section>
    <!--            </section>
                        -->


@stop

@section('js')

    <script>
        $(function() {
            console.log(0);
            $('[data-countdown]').each(function() {

                var $this = $(this),
                    finalDate = $(this).data('countdown');

                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime(
                        '<ul class="countdown d-inline-flex mb-0 list-unstyled" ><li><span class="days">%D </span><p class="days_ref mb-0">Days</p></li><li><span class="hours">%H </span><p class="hours_ref mb-0">Hours</p></li><li><span class="minutes">%M </span><p class="minutes_ref mb-0">Minutes</p></li><li><span class="seconds">%S</span><p class="seconds_ref mb-0">Seconds</p></li></ul>'
                    ));


                });
            });

        });
    </script>

    <script>
        $(document).on('submit', '#email-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();

            var email = $('.email').val();

            if (name == '' || email == '') {
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

    <script>
        $(document).ready(function() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            $(".read-more-btn").click(function() {

                if (dots.style.display === "none") {
                    dots.style.display = "inline";
                    btnText.innerHTML = "{{ $langg->lang12 }}";
                    moreText.style.display = "none";
                } else {
                    dots.style.display = "none";
                    btnText.innerHTML = "View less";
                    moreText.style.display = "flex";
                }

                /*  $(".more-show").prev().slideToggle();
                  if ($(this).text() == {{ $langg->lang12 }}) {
                      $(this).text("Read Less");
                  } else {
                      $(this).text("{{ $langg->lang12 }}");
                  }*/
            });
        });
    </script>
@stop
