@extends('layouts.front')

@section('title')
    {{ $langg->lang222 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('content')
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp
    <section class="page-title">
        <div class="outer-container">
            <div class="image">
                <img src="{{ asset('public/assets/images/' . $gs->new_icon) }}" alt="" />
            </div>
        </div>
    </section>
    <section class="page-breadcrumb">
        <div class="image-layer" style="background-image:url({{ asset('public/assets/naglaa/images/background/1.png') }})"></div>
        <div class="container">
            <div class="clearfix">
                <div class="pull-left fll">
                    <h2>{{ $langg->lang222 }}</h2>
                </div>
                <div class="pull-right">
                    <ul class="breadcrumbs">
                        <li class="left-curves"></li>
                        <li class="right-curves"></li>
                        <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}-</a></li>
                        <li>{{ $langg->lang222 }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- blog area start -->
    <section class="blog__area">

        <div class="blog-area ptb-100">
            <div class="container" style="max-width: 1269px;">
                <div class="section-title-one">
                    <h2 class="text-center" style="margin-bottom: 28px;font-size: 46px;" data-aos="fade-right">
                        {{ $langg->lang7 }}</h2>
                </div>
                <div class="blog-slider owl-carousel owl-theme">


                    @foreach ($blogs as $blogg)
                        <div class="blog-card text-center">
                            <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                <img src="{{ $blogg->photo ? asset('public/assets/images/blogs/' . $blogg->photo) : asset('public/assets/images/noimage.png') }}"
                                    alt="Shape">
                            </a>
                            <div class="b-card-text">
                                <h3><a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                        @if ($langg->rtl == 1)
                                            {{ strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar, 0, 50) . '...' : $blogg->title_ar }}
                                        @else
                                            {{ strlen($blogg->title) > 50 ? substr($blogg->title, 0, 50) . '...' : $blogg->title }}
                                        @endif
                                    </a>
                                </h3>
                                <p>
                                    @if ($langg->rtl == 1)
                                        {{ substr(strip_tags($blogg->details_ar), 0, 120) }}
                                    @else
                                        {{ substr(strip_tags($blogg->details), 0, 120) }}
                                    @endif
                                </p>
                                <div class="view-more">
                                    <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                        {{ $langg->lang3 }}
                                        <i class='bx bx-right-arrow-alt'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

    </section>
    <!-- blog area end -->

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
                        '<div class="text-info"><img src="{{ asset('public/assets/images/preloader.gif') }}"> Loading...</div>'
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
        // Blog Slider
        $('.blog-slider').owlCarousel({
            items: 1,
            loop: true,
            margin: 20,
            rtl: true,
            nav: false,
            autoplay: true,
            autoplayHoverPause: true,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 4,
                }
            }
        })
    </script>
@stop
