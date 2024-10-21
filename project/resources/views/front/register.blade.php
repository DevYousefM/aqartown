@extends('layouts.front')



@section('title')

    {{ $langg->lang201 }} -

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

    <!--sub-Banner-start-->

    <div class="sub-banner pt-90 pb-90">

        <div class="container">

            <div class="col-md-12">

                <div class="text-center text-line">

                    <h1>{{ $langg->lang201 }}</h1>

                    <ul class="text-c">

                        <li>{{ $langg->lang17 }}</li>

                        <li>|</li>

                        <li class="color-t">{{ $langg->lang201 }}</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!--sub-Banner-End-->



    <section class="pt-90 pb-90 login-page-bg-2">

        <div class="container">

            <div class="row">

                <div class="col-md-6 pr-60">

                    <div class="login-page">

                        <div class="heading-t mb-50">

                            <h2>{{ $langg->lang202 }} </h2>

                            <!-- <p>

                                                        Join to Pomah you will get the best recommendation<br>

                                                        for rent house in near of you.

                                                    </p> -->

                        </div>

                        <div class="log-cont">

                            @include('includes.admin.form-login')

                            <form class="mregisterform" id="registerform" action="{{ route('user-register-submit') }}"
                                method="POST">

                                {{ csrf_field() }}

                                <div class="form-group po-re-log d-none">

                                    <img src="{{ asset('assets/') }}/images/user-i.png" alt="" class="po-i-log">

                                    <select required class="form-control fill-log" name="vendor">

                                        <!--    <option value="">{{ $langg->lang203 }} </option>-->

                                        <option value="1">{{ $langg->lang231 }}</option>

                                        <option value="0">{{ $langg->lang232 }}</option>

                                    </select>

                                </div>

                                <div class="form-group po-re-log">

                                    <img src="images/user-i.png" alt="" class="po-i-log">

                                    <input required type="email" name="email" placeholder="{{ $langg->lang49 }}*"
                                        class="form-control fill-log">
                                    @error('email')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group po-re-log">

                                    <img src="images/pas.png" alt="" class="po-i-log">

                                    <input required type="password" name="password" placeholder="{{ $langg->lang19 }}*"
                                        class="form-control fill-log">

                                </div>

                                <div class="form-group po-re-log">

                                    <img src="images/pas.png" alt="" class="po-i-log">

                                    <input required type="password" name="password_confirmation"
                                        placeholder="{{ $langg->lang19 }}*" class="form-control fill-log">

                                </div>

                                <div class="form-group po-re-log">

                                    <img src="images/mob.png" alt="" class="po-i-log">

                                    <input required type="number" name="phone" placeholder="{{ $langg->lang48 }} "
                                        class="form-control fill-log">

                                </div>

                                @if ($gs->is_capcha == 1)
                                    <ul class="captcha-area">

                                        <li>

                                            <p><img class="codeimg1"
                                                    src="{{ asset('public/assets/images/capcha_code.png') }}"
                                                    alt=""> <i class="fas fa-sync-alt pointer refresh_code "></i>
                                            </p>

                                        </li>

                                    </ul>



                                    <div class="form-input">

                                        <input type="text" class="Password" name="codes"
                                            placeholder="{{ $langg->lang51 }}" required="">

                                        <i class="icofont-refresh"></i>

                                    </div>
                                @endif

                                <input class="processdata" id="processdata" type="hidden" value="{{ $langg->lang188 }}">

                                <div class="form-group po-re-log">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="button-log">

                                                <button class="log-b submit-btn">

                                                    {{ $langg->lang201 }}

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>





                            </form>

                        </div>

                    </div>



                </div>

                <div class="col-md-6 pl-100">

                    <div class="log-img">

                        <img src="{{ asset('assets/') }}/images/253418027_2228630604111347_3213032108329630617_n.png"
                            alt="" class="img-fluid">

                        <div class="po-a-re">

                            <a href="{{ route('user.login', ['lang' => $sign]) }}">

                                {{ $langg->lang15 }}

                                <span class="reg-i"><img src="{{ asset('assets/') }}/images/user-i.png" alt=""
                                        class="po-i-reg"></span>



                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



@stop

@section('js')

    <script>
        // REGISTER FORM

        $("#registerform").on('submit', function(e) {

            var $this = $(this).parent();

            e.preventDefault();

            $this.find('button.submit-btn').prop('disabled', true);

            $this.find('.alert-info').show();

            $this.find('.alert-info p').html($('#processdata').val());

            $.ajax({

                method: "POST",

                url: $(this).prop('action'),

                data: new FormData(this),

                dataType: 'JSON',

                contentType: false,

                cache: false,

                processData: false,

                success: function(data) {



                    if (data == 1) {

                        window.location = mainurl2 + '/';

                    } else {



                        if ((data.errors)) {

                            $this.find('.alert-success').hide();

                            $this.find('.alert-info').hide();

                            $this.find('.alert-danger').show();

                            $this.find('.alert-danger ul').html('');

                            for (var error in data.errors) {

                                $this.find('.alert-danger p').html(data.errors[error]);

                            }

                            $this.find('button.submit-btn').prop('disabled', false);

                        } else {

                            $this.find('.alert-info').hide();

                            $this.find('.alert-danger').hide();

                            $this.find('.alert-success').show();

                            $this.find('.alert-success p').html(data);

                            $this.find('button.submit-btn').prop('disabled', false);

                        }



                    }

                    $('.refresh_code').click();



                }



            });
        });
        // REGISTER FORM ENDS
    </script>
@stop
@section('js')
    <script type="text/javascript">
        fbq('track', 'Register Page Visit');
    </script>
@endsection
