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

    <!--============= Start breadvroumb =============-->

    <div class="breadvroumb_area" style="background-image: url({{ asset('assets/images/' . $gs->discount_icon) }});">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1>{{ $langg->lang20 }}</h1>
                    <div class="breadcroumb_link">
                        <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }} </a>/ {{ $langg->lang20 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= End breadvroumb =============-->
    <!--============= start contact_page =============-->
    <div class="contact_page">
        <div class="container">
            <div class="image-layer">

            </div>
            <!-- <div class="row">
                         <div class="contact_inf_area col-lg-6">
                        <div class="single_contact_inf">
                            <div class="contact_icon"><img src="customize/frontend/images/contact/contact_icon1.png" alt=""></div>
                            <div class="ccontact_inf_content">
                                <h5>رقم الطوارئ</h5>
                                <span>طوارئ 24/ 7</span>
                                <a>+201069000434</a>
                            </div>
                        </div>
                        <div class="single_contact_inf">
                            <div class="contact_icon"><img src="customize/frontend/images/contact/contact_icon2.png" alt=""></div>
                            <div class="ccontact_inf_content">
                                <h5>زيارة المنزل</h5>
                                <a>01097000494</a>
                            </div>
                        </div>
                        <div class="single_contact_inf">
                            <div class="contact_icon"><img src="customize/frontend/images/contact/contact_icon3.png" alt=""></div>
                            <div class="ccontact_inf_content">
                                <h5>رقم المركز</h5>
                                <a>+201069000494</a>
                            </div>
                        </div>
                        <div class="single_contact_inf">
                            <div class="contact_icon"><img src="customize/frontend/images/contact/contact_icon4.png" alt=""></div>
                            <div class="ccontact_inf_content">
                                <h5>البريد الاليكتروني</h5>
                                <a>Smilehousedentalcenter@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="opening-hours bg-light col-lg-6">
                            <h3>مواعيد العمل</h3>
                            <ul class="list-style-none">
                                <li><strong>الاحد</strong> <span class="text-red"> مغلق</span></li>
                                <li><strong>الاثنين</strong> <span> 10 AM - 8 PM</span></li>
                                <li><strong>الثلاثاء </strong> <span> 10 AM - 8 PM</span></li>
                                <li><strong>الاربعاء </strong> <span> 10 AM - 8 PM</span></li>
                                <li><strong>الخميس </strong> <span> 10 AM - 8 PM</span></li>
                                <li><strong>الجمعة </strong> <span> 10 AM - 8 PM</span></li>
                                <li><strong>السبت </strong> <span> 10 AM - 8 PM</span></li>
                            </ul>
                        </div>
                    </div>
                   -->
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                        autocomplete="off" class="contact_form2">
                        {{ csrf_field() }}
                        <div class="form-group w-100">
                            <div class="response w-100"></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="{{ $langg->lang47 }}" name="name" required="">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" required="" placeholder=" {{ $langg->lang49 }}">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="phone" required="" placeholder=" {{ $langg->lang48 }}">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="text" required="" placeholder=" {{ $langg->lang50 }}"></textarea>
                            </div>
                            @if ($gs->is_capcha == 1)
                                <ul class="captcha-area">
                                    <li>
                                        <p><img class="codeimg1" src="{{ asset('assets/images/capcha_code.png') }}"
                                                alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>

                                    </li>
                                    <li>
                                        <input name="codes" type="text" class="input-field"
                                            placeholder="{{ $langg->lang51 }}" required="">

                                    </li>
                                </ul>
                            @endif

                            <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                            <div class="col-lg-12">
                                <button type="submit" class="custom_btn">{{ $langg->lang52 }}</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="contact_widget">
                        <h4>عيادة فرع مصر الجديدة</h4>
                        <ul class="widget_menu">

                            <li><i class="fas fa-map-marker-alt"></i><span> 6 ش جلال متفرع من ش اسكندر الاكبر خلف قصر
                                    الرئاسة - الكوربة - مصر الجديدة..السبت الي الخميس من ١٠ صباحا حتي ٦ مساء </span></li>
                            <li><i class="fas fa-phone"></i><span> +201069000434</span></li>
                        </ul>

                    </div>
                    <div class="map">
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13809.01280382967!2d31.323748!3d30.086934!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd1ace0785e5050f8!2z2LPZhdin2YrZhCDZh9in2YjYsyDYr9mK2YbYqtin2YQg2LPZhtiq2LEgLSDYry4g2YXYudiq2LIg2K3Zhdin2K_YqQ!5e0!3m2!1sar!2seg!4v1529508510659" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>           -->
                        {!! $ps->map !!}
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!--============= End contact_page =============-->

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
