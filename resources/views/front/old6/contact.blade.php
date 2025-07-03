@extends('layouts.front')

@section('title')
    {{ $langg->lang3 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('content')


    <section class="breadcrumb-section"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->discount_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> {{ $langg->lang3 }}
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> {{ $langg->lang3 }}
                </li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>


    <div class="contact-page">
        <div class="container">
            <div class="page-body">
                <ul class="branches">
                    <li>
                        <div class="branch-heading">
                            <p>
                                {{ $langg->lang42 }}
                            </p>
                        </div>
                        <div class="working-hours-phones">
                            <div class="working-hours">
                                {!! $langg->rtl == 1 ? $ps->contact_title_ar : $ps->contact_title !!}
                                <!--   <ul class="week-days">
                                               <li>
                                                    <span>
                                                        السبت
                                                    </span>
                                                    <span>
                                                        12 مساء : 12 صباحا
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        الأحد
                                                    </span>
                                                    <span>
                                                        12 مساء : 12 صباحا
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        الإثنين
                                                    </span>
                                                    <span>
                                                        12 مساء : 12 صباحا
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        الثلاثاء
                                                    </span>
                                                    <span>
                                                        12 مساء : 12 صباحا
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        الأربعاء
                                                    </span>
                                                    <span>
                                                         12 مساء : 12 صباحا
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        الخميس
                                                    </span>
                                                    <span>
               12 مساء : 12 صباحا                                       </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        الجمعة
                                                    </span>
                                                    <span>
                                                        مغلق
                                                    </span>
                                                </li>
                                            </ul> -->
                            </div>
                            <ul class="phones">
                                <li>
                                    <span class="feather icon-phone-call"></span>
                                    <span>
                                        {{ $ps->phone }}
                                    </span>
                                </li>

                            </ul>
                        </div>
                        <div class="location">
                            <span class="feather icon-map-pin"></span>
                            <span>
                                {{ $langg->rtl == 1 ? $ps->street_ar : $ps->street }}
                            </span>
                        </div>
                    </li>
                </ul>

                <div class="form-wrapper" id="contact">
                    <div class="form-heading">
                        <p>
                            {{ $langg->lang8 }}
                        </p>
                    </div>
                    <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                        autocomplete="off" class="contact_form2">
                        {{ csrf_field() }}
                        <div class="form-group w-100">
                            <div class="response w-100"></div>
                        </div>
                        <div class="form-div">
                            <input type="text" name="name" value="" class="form-control fname"
                                placeholder=" {{ $langg->lang43 }} *" required="required">
                            <div class="thin-line"></div>
                        </div>

                        <div class="form-div">
                            <input type="text" name="phone" value="" placeholder="{{ $langg->lang44 }} *"
                                required="required">
                            <div class="thin-line"></div>
                        </div>
                        <div class="form-div">
                            <input type="text" name="subject" value="" id=""
                                placeholder="{{ $langg->lang45 }}*" required="required">
                            <div class="thin-line"></div>
                        </div>
                        <div class="form-div">
                            <textarea name="text" placeholder="{{ $langg->lang4 }}" required="required"></textarea>
                            <div class="thin-line"></div>
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
                        <button type="submit">
                            <span class="feather icon-send"></span>
                            <span>
                                {{ $langg->lang5 }}
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop


@section('js')

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
@stop
