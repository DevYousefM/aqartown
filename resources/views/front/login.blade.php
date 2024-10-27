@extends('layouts.front')



@section('title')

    {{ $langg->lang15 }} -

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

                    <h1>{{ $langg->lang15 }} </h1>

                    <ul class="text-c">

                        <li>{{ $langg->lang17 }}</li>

                        <li>|</li>

                        <li class="color-t">{{ $langg->lang15 }} </li>

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

                    <div class="login-page text-right">

                        <div class="heading-t mb-50">

                            <h2>{{ $langg->lang15 }} </h2>

                            <!-- <p>

                                                 

                                                </p> -->

                        </div>

                        <div class="log-cont">

                            @include('includes.admin.form-login')
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form class="loginformss" id="loginformss" action="{{ route('user.login.submit') }}"
                                method="POST">

                                {{ csrf_field() }}

                                <div class="form-group po-re-log">

                                    <img src="images/user-i.png" alt="" class="po-i-log">

                                    <input type="email" name="email" required placeholder="{{ $langg->lang49 }}*"
                                        class="form-control fill-log">

                                    @error('email')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group po-re-log">

                                    <img src="images/pas.png" alt="" class="po-i-log">

                                    <input type="password" name="password" required placeholder=" {{ $langg->lang19 }}*"
                                        class="form-control fill-log">
                                    @error('password')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group po-re-log">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <label class="check-b"><input type="checkbox" class="check-log" name="remember"
                                                    id="mrp" {{ old('remember') ? 'checked' : '' }}>
                                                {{ $langg->lang25 }}</label>

                                        </div>

                                        <!-- <div class="col-md-6">

                                                                <a href="#" class="lost-p">هل نسيت كلمةالسر؟</a>

                                                            </div>-->

                                    </div>

                                </div>

                                <input type="hidden" name="modal" value="1">

                                <input class="authdata" id="authdata" type="hidden" value="{{ $langg->lang177 }}">

                                <div class="form-group po-re-log">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="button-log">

                                                <button class="log-b submit-btn" type="submit">

                                                    {{ $langg->lang200 }}

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>





                            </form>

                            <div class="form-group">

                                <div class="row">

                                    <div class="col-md-12 text-center">

                                        <b>{{ $langg->lang230 }} :</b>

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="row">

                                    <div class="col-md-12  text-center">

                                        <div class="log-social">

                                            <ul class="social-t fl-left">

                                                @if (App\Models\Socialsetting::find(1)->f_check == 1)
                                                    <li><a href="{{ route('social-provider', 'facebook') }}"
                                                            class="facebook-change-co"><i class="fa fa-facebook-f"></i></a>
                                                    </li>
                                                @endif

                                                @if (App\Models\Socialsetting::find(1)->g_check == 1)
                                                    <li><a href="{{ route('social-provider', 'google') }}"
                                                            class="pinterest-change-co"><i class="fa fa-google"></i></a>
                                                    </li>
                                                @endif

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>

                <div class="col-md-6 pl-100">

                    <div class="log-img">

                        <img src="{{ asset('assets/images/253418027_2228630604111347_3213032108329630617_n.png') }}"
                            alt="" class="img-fluid">

                        <div class="po-a-re">

                            <a href="{{ route('user-register', ['lang' => $sign]) }}">

                                {{ $langg->lang201 }}



                                <span class="reg-i"><img src="{{ asset('assets/') }}/images/register-i.png" alt=""
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
        // LOGIN FORM

        $(document).on('submit', '#loginformss', function(e) {



            var $this = $(this).parent();

            e.preventDefault();

            $this.find('button.submit-btn').prop('disabled', true);

            $this.find('.alert-info').show();

            $this.find('.alert-info p').html($('#authdata').val());

            $.ajax({

                method: "POST",

                url: $(this).prop('action'),

                data: new FormData(this),

                dataType: 'JSON',

                contentType: false,

                cache: false,

                processData: false,

                success: function(data) {

                    if ((data.errors)) {

                        $this.find('.alert-success').hide();

                        $this.find('.alert-info').hide();

                        $this.find('.alert-danger').show();

                        $this.find('.alert-danger ul').html('');

                        for (var error in data.errors) {

                            $this.find('.alert-danger p').html(data.errors[error]);

                        }

                    } else {

                        $this.find('.alert-info').hide();

                        $this.find('.alert-danger').hide();

                        $this.find('.alert-success').show();

                        $this.find('.alert-success p').html('Success !');

                        if (data == 1) {

                            // location.reload();

                            window.location = mainurl2 + '/{{ $sign }}';

                        } else {

                            window.location = mainurl2 + '/{{ $sign }}';

                        }



                    }

                    $this.find('button.submit-btn').prop('disabled', false);

                }



            });



        });

        // LOGIN FORM ENDS
    </script>

@stop
