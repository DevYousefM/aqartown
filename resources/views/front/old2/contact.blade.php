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
    <section class="medicen-aboutUs text-center"
        style="background-image: url({{ asset('public/assets/images/' . $gs->discount_icon) }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6">
                    <img src="./images/logo3.png" alt="">
                </div>
                <div class="col-lg-6">
                    <h3>{{ $langg->lang20 }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{ $langg->lang20 }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div id="home-contact-section" class="home-contact-section">
        <div class="dial">
            <div class="row">
                <div class="col-md-4">

                    <div class="form-section">
                        <p class="section-title">
                            {{ $langg->lang8 }}
                        </p>


                        <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                            autocomplete="off">

                            {{ csrf_field() }}
                            <div class="form-group w-100">
                                <div class="response w-100"></div>
                            </div>
                            <!-- <input type="hidden" name="after_sending" value="https://webdesign.be4em.info/high.tower.new/thanks-page.html" id="after-sending">
                      -->
                            <div class="row">


                                <div class="col-md-6">

                                    <div class="form-div">
                                        <span>
                                            {{ $langg->lang47 }}*
                                        </span>
                                        <div class="input-wrapper">
                                            <input id="name" type="text" name="name" required="">
                                            <i class="fontello icon-user-3"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-div">
                                        <span>
                                            {{ $langg->lang48 }}*
                                        </span>
                                        <div class="input-wrapper">
                                            <input type="text" id="phone" name="phone" required=""
                                                pattern="[0-9]{11}">
                                            <i class="fontello icon-mobile"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">

                                    <div class="form-div">
                                        <span>
                                            {{ $langg->lang49 }}*
                                        </span>
                                        <div class="input-wrapper">
                                            <input type="email" id="email" name="email" required="">
                                            <i class="fontello icon-mail-1"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
              
                          <div class="form-div">
                            <span>
                              نوع المشروع*
                            </span>
                            <div class="input-wrapper">
                              <select name="project" id="project" required="">
                                <option value="سكني">سكني</option>
                                <option value="طبي">طبي</option>
                                <option value="تجاري">تجاري</option>
                              </select>
                              <i class="fal fa-tasks"></i>
                            </div>
                          </div>
                                       </div>
                                                                    
                                                                                                                <div class="col-md-12">
              
                           <div class="form-div cost">
                            <span>
                          تحديد الميزانية*
                            </span>
                            <div class="input-wrapper">
                                <input type="text" name="amount" required="">
              
                               </div>
                          </div>
                          </div>
                           -->

                                <div class="col-md-12">

                                    <div class="form-div">
                                        <span>
                                            {{ $langg->lang50 }}
                                        </span>
                                        <div class="input-wrapper">
                                            <textarea id="message" name="text" required=""></textarea>
                                            <i class="fontello icon-doc-text"></i>
                                        </div>
                                    </div>
                                </div>

                                .
                            </div>
                            @if ($gs->is_capcha == 1)
                                <ul class="captcha-area">
                                    <li>
                                        <p><img class="codeimg1" src="{{ asset('public/assets/images/capcha_code.png') }}"
                                                alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>

                                    </li>
                                    <li>
                                        <input name="codes" type="text" class="input-field"
                                            placeholder="{{ $langg->lang51 }}" required="">

                                    </li>
                                </ul>
                            @endif

                            <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                            <div class="col-md-12">
                                <div class="btn-box text-center"><button
                                        class="thm-btn v2 thm-bg brd-rd5 position-relative overflow-hidden"
                                        type="submit">{{ $langg->lang52 }}</button></div>

                            </div>

                        </form>


                        <div class="layout-div"></div>

                    </div>
                </div>
                <div class="col-md-8">
                    {!! $ps->map !!}
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
