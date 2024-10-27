@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{ asset('assets/images/' . $gs->logo) }}" />
@stop


@section('content')

    <section class="banner-section-two">
        <div class="banner-carousel-two owl-carousel owl-theme">
            @foreach ($sliders as $slide)
                @php
                    $galss = str_replace(' ', '%20', $slide->photo);
                @endphp
                <div class="slide-item"
                    style="background-image: url({{ asset('/assets/images/sliders/' . $galss) }});">
                    <div class="container">

                        <div class="content-box">
                            @if (!empty($slide->subtitle_text) || !empty($slide->subtitle_text_ar))
                                <div class="title wow fadeInUp" data-wow-delay="250ms">
                                    {{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}</div>
                            @endif

                            <h2 class="wow fadeInUp" data-wow-delay="500ms">
                                {{ $langg->rtl == 1 ? $slide->title_text_ar : $slide->title_text }}</h2>
                            <!-- <div class="link-box wow fadeInUp" data-wow-delay="500ms">
                                        <a href="tel:+2212-600-4274" class="theme-btn btn-style-five"><span class="icon flaticon-phone-call"> Call 212-600-4274</span></a>
                                    </div> -->
                        </div> <!-- -->
                    </div>
                </div>
            @endforeach



        </div>
    </section>




    <div class="home-about-section" id="about-section" data-aos="zoom-in">
        <div class="first-section container">
            <div class="img-div" data-aos="fade-right" data-aos-duration="2000">
                <img src="{{ asset('assets/images/' . $gs->home_about_img1) }}" alt="img">
            </div>
            <div class="ceo" data-aos="fade-left" data-aos-duration="2000">
                <div class="text">
                    <div class="heading">
                        <p>
                            {{ $langg->lang1 }}
                        </p>
                    </div>
                    <div class="body">
                        <p>
                            @if ($langg->rtl == 1)
                                {!! $gs->home_about_ar !!}
                            @else
                                {!! $gs->home_about !!}
                            @endif
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="department-section" style="margin-bottom: 20px;">
        <div class="container">
            <div class="sec-title centered">
                <h2>{{ $langg->lang2 }}</h2>
            </div>
            <div class="row">
                @foreach ($categories as $key => $category)
                    <div class="col-lg-4 col-md-6 aos-init aos-animate"
                        @if ($key == 0) data-aos="fade-left"

                     @elseif($key == 1)

                        data-aos="zoom-in"

                        @elseif($key == 2)


                        data-aos="fade-right"
                        @elseif($key == 3)

                        data-aos="fade-left"
                        @elseif($key == 4)
                        data-aos="zoom-in"
                     @else

                     data-aos="fade-right" @endif>
                        <div class="department-box">
                            <div class="inner-box">
                                <div class="image">
                                    <a
                                        href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                              
                                            @else
                                              {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif">
                                        <img src="{{ asset('assets/images/categories/' . $category->photo) }}"
                                            alt=""></a>
                                </div>
                                <div class="lower-content">
                                    <h3><i class="fad fa-syringe"></i>
                                        @if ($langg->rtl == 1)
                                            <a
                                                href="{{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}">
                                                {{ $category->name_ar }}</a>
                                        @else
                                            <a
                                                href="{{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }}">
                                                {{ $category->name }}</a>
                                        @endif
                                        <i class="fad fa-syringe"></i>
                                    </h3>

                                    <a href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $category->slug_ar, 'lang' => $sign]) }}
                                              
                                            @else
                                              {{ route('front.category', ['category' => $category->slug, 'lang' => $sign]) }} @endif"
                                        class="read-more">
                                        <span class="arrow fas fa-angle-double-left"></span>
                                        {{ $langg->lang3 }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </div>


    <section class="gallery-section">
        <div class="container">
            <div class="title-box">
                <h2>{{ $langg->lang6 }}</h2>
            </div>
            <div class="row">
                @foreach ($services->take(6) as $key => $service)
                    <div
                        class="project-block col-lg-4 col-md-6 col-sm-12"@if ($key == 0) data-aos="fade-left"

                    @elseif($key == 1)

                       data-aos="zoom-in"

                       @elseif($key == 2)


                       data-aos="fade-right"
                       @elseif($key == 3)

                       data-aos="fade-left"
                       @elseif($key == 4)
                       data-aos="zoom-in"
                    @else

                    data-aos="fade-right" @endif>
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('assets/images/services/' . $service->photo) }}"
                                    alt="" />

                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <div class="overlay-content">
                                            <div class="icon-box">
                                                <span class="fas fa-spa"></span>
                                            </div>
                                            <h3><a
                                                    href="#">{{ $langg->rtl == 1 ? $service->name_ar : $service->name }}</a>
                                            </h3>
                                            <a class="plus"
                                                href="{{ asset('assets/images/services/' . $service->photo) }}"
                                                data-fancybox="gallery-1" data-caption=""><span
                                                    class="flaticon-plus-symbol"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="button-box text-center">
                <a href="{{ route('front.gallery', $sign) }}" class="theme-btn btn-style-three"> {{ $langg->lang3 }}<span
                        class="arrow icon-chevron-right"></span></a>
            </div>
        </div>
    </section>




    <section class="testimonial-section" data-aos="zoom-in-down">
        <div class="container">

            <div class="section-title text-center">
                <h2>{{ $langg->lang53 }}</h2>
            </div>
            <div class="testimonials-carousel owl-carousel owl-theme">
                @foreach ($reviews as $review)
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="content-box">
                                <div class="quote-icon icon-quote2"></div>
                                <p class="text">{!! $langg->rtl == 1 ? $review->details_ar : $review->details !!}</p>
                                <h3>{{ $langg->rtl == 1 ? $review->title_ar : $review->title }}</h3>

                            </div>
                            <div class="image-box">
                                <img src="{{ asset('assets/images/reviews/' . $review->photo) }}" alt="" />
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    @include('includes.form')


@stop

@section('js')

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
                        '<div class="text-info"><img src="{{ asset('assets/images/preloader.gif') }}"> Loading...</div>'
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
@stop
