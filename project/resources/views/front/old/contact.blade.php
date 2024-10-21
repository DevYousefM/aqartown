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

    <section>
        <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('public/assets/images/' . $gs->contact_icon) }});">
            </div>
            <div class="container">
                <div class="page-title-inner d-inline-block">
                    <h1 class="mb-0">{{ $langg->lang20 }}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}" title="">
                                {{ $langg->lang17 }}</a></li>
                        <li class="breadcrumb-item active">{{ $langg->lang20 }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- Page Title Wrap -->
    </section>
    <section>
        <div class="w-100 pt-140 position-relative">
            <div class="container">
                <div class="contact-info-wrap text-center w-100">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="contact-info-box mb-40 w-100">
                                <i class="thm-clr rounded-circle fas fa-map-marker-alt"></i>
                                <h4 class="mb-0">{{ $langg->lang6 }}</h4>
                                <p class="mb-0">{{ $langg->rtl == 1 ? $ps->street_ar : $ps->street }} </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="contact-info-box mb-40 w-100">
                                <i class="thm-clr rounded-circle flaticon-people"></i>
                                <h4 class="mb-0">{{ $langg->lang7 }}</h4>
                                <p class="mb-0"><span class="d-block">Phone: {{ $ps->phone }}</span><span
                                        class="d-block">{{ $ps->fax }}</span></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="contact-info-box mb-40 w-100">
                                <i class="thm-clr rounded-circle fas fa-envelope-open"></i>
                                <h4 class="mb-0">{{ $langg->lang8 }}</h4>
                                <p class="mb-0"><a href="javascript:void(0);" title="">{{ $ps->email }}</a></p>
                            </div>
                        </div>
                    </div>
                </div><!-- Contact Info Wrap -->
                <div class="contact-map-wrap mt-65 style2 w-100">
                    <div class="sec-title mb-45 w-100 text-center">
                        <div class="sec-title-inner pt-0 d-inline-block">
                            {!! $langg->rtl == 1 ? $ps->contact_title_ar : $ps->contact_title !!}
                        </div>
                    </div><!-- Sec Title -->
                    <div class="row align-items-center">
                        <div class="col-md-12 col-sm-12 col-lg-6">
                            <div class="contact-map w-100" id="contact-map">
                                {!! $ps->map !!}
                                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.673623997605!2d31.338397315115856!3d30.07488848187127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fc2400db189%3A0xf267ab5585e46d7b!2zVGFsZW50IFdNIHwg2YjZhNmK2K8g2YXZhti12YjYsQ!5e0!3m2!1sen!2seg!4v1610882831682!5m2!1sen!2seg" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" style="height: inherit;"></iframe>
                                   --}} </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-6">
                            <div class="contact-form-wrap p-0 w-100">{{-- id="contactform" --}}
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
                                                                src="{{ asset('public/assets/images/capcha_code.png') }}"
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
                </div><!-- Contact With Map -->
            </div>
        </div>
    </section>
    <!--   <section>
                        <div class="w-100 pt-100 pb-100 position-relative">
                            <div class="container">
                                <div class="sponsors-wrap w-100">
                                    <div class="sponsor-caro">
                                        <div class="sr-box text-center w-100">
                                            <a href="javascript:void(0);" title=""><img class="img-fluid d-inline-block" src="assets/images/resources/sponsor-img1-1.png" alt="Sponsor Image 1"></a>
                                        </div>
                                        <div class="sr-box text-center w-100">
                                            <a href="javascript:void(0);" title=""><img class="img-fluid d-inline-block" src="assets/images/resources/sponsor-img1-2.png" alt="Sponsor Image 2"></a>
                                        </div>
                                        <div class="sr-box text-center w-100">
                                            <a href="javascript:void(0);" title=""><img class="img-fluid d-inline-block" src="assets/images/resources/sponsor-img1-3.png" alt="Sponsor Image 3"></a>
                                        </div>
                                        <div class="sr-box text-center w-100">
                                            <a href="javascript:void(0);" title=""><img class="img-fluid d-inline-block" src="assets/images/resources/sponsor-img1-4.png" alt="Sponsor Image 4"></a>
                                        </div>
                                        <div class="sr-box text-center w-100">
                                            <a href="javascript:void(0);" title=""><img class="img-fluid d-inline-block" src="assets/images/resources/sponsor-img1-5.png" alt="Sponsor Image 5"></a>
                                        </div>
                                        <div class="sr-box text-center w-100">
                                            <a href="javascript:void(0);" title=""><img class="img-fluid d-inline-block" src="assets/images/resources/sponsor-img1-6.png" alt="Sponsor Image 6"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>-->
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
@stop
