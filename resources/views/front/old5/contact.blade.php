@extends('layouts.front')

@section('title')
    {{ $langg->lang20 }} -
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

    <div class="page-banner-area"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->discount_icon) }});">
        <div class="container">
            <div class="page-banner-content">
                <h2>{{ $langg->lang20 }}</h2>
                <ul class="pages-list">
                    <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                    <i class="fad fa-chevron-right"></i>
                    <li>{{ $langg->lang20 }}</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="contact-area ptb-100">
        <div class="container">
            <div class="section_title">
                <h2> <span>{{ $langg->lang20 }}</span></h2>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy. </p> -->
                <div class="divider_effect_section"></div>
            </div>
            <div class="contact-form">
                <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                    autocomplete="off" class="contact_form2">
                    {{ csrf_field() }}
                    <div class="form-group w-100">
                        <div class="response w-100"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" required
                                    data-error="Please enter your name" placeholder="{{ $langg->lang47 }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control fname" required
                                    data-error="Please enter your email" placeholder="{{ $langg->lang49 }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone" id="phone_number" required
                                    data-error="Please enter your number" class="form-control email"
                                    placeholder="{{ $langg->lang48 }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" required
                                    data-error="Please enter your subject" placeholder="Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea name="text" class="form-control" id="message" cols="30" rows="5" required
                                    data-error="Write your message" placeholder="{{ $langg->lang50 }}"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        @if ($gs->is_capcha == 1)
                            <ul class="captcha-area">
                                <li>
                                    <p><img class="codeimg1"
                                            src="{{ asset(access_public() . 'assets/images/capcha_code.png') }}"
                                            alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>

                                </li>
                                <li>
                                    <input name="codes" type="text" class="input-field"
                                        placeholder="{{ $langg->lang51 }}" required="">

                                </li>
                            </ul>
                        @endif

                        <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn">{{ $langg->lang52 }}</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="contact-info">
                <div class="contact-info-content">
                    <h3>{{ $langg->lang430 }}</h3>
                    <h2>
                        <a href="tel:{{ $ps->phone }}">{{ $ps->phone }}</a>
                        <span>OR</span>
                        <a href="mailto:{{ $ps->email }}"><span class="__cf_email__"
                                data-cfemail="2e495c47406e49434f4742004d4143">{{ $ps->email }}</span></a>
                    </h2>
                    <ul class="social">
                        <!--
                                    <li><a href="#" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                    <li><a href="#" target="_blank"><i class='bx bxl-youtube'></i></a></li>
                                    <li><a href="#" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                    <li><a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                                    <li><a href="#" target="_blank"><i class='bx bxl-instagram'></i></a></li> -->

                        @if (App\Models\Socialsetting::find(1)->f_status == 1)
                            <li> <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->facebook }}"
                                    class="facebook-bg"> <i class='bx bxl-facebook'></i></a></li>
                        @endif
                        @if (App\Models\Socialsetting::find(1)->i_status == 1)
                            <li> <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->instagram }}"> <i
                                        class='bx bxl-instagram'></i></a></li>
                        @endif
                        @if (App\Models\Socialsetting::find(1)->t_status == 1)
                            <li> <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->twitter }}"
                                    class="twitter-bg"><i class='bx bxl-twitter'></i></a></li>
                        @endif
                        @if (App\Models\Socialsetting::find(1)->l_status == 1)
                            <li> <a target="_blank" href="{{ App\Models\Socialsetting::find(1)->linkedin }}"
                                    class="linkedin-bg"> <i class='bx bxl-linkedin'></i></a></li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </section>
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
@stop
