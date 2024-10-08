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
    <!--sub-Banner-start-->
    <div class="sub-banner pt-90 pb-90">
        <div class="container">

            <div class="col-md-12">

                <div class="text-center text-line">

                    <h1>{{ $langg->lang20 }} </h1>

                    <ul class="text-c">

                        <li>{{ $langg->lang17 }}</li>

                        <li>|</li>

                        <li class="color-t">{{ $langg->lang20 }} </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!--sub-Banner-End-->



    <!-- blog area start -->

    <section class="pt-90 pb-90 contact-page-det">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <div class="contact-page">

                        <div class="heading-t  fadeInUp animated">

                            <h2>{{ $langg->lang20 }} </h2>

                        </div>

                        <div class="comment-re post-com">

                            {{--   <form class="row" id="my-form-contact" action="" method="POST"> --}}

                            <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form"
                                method="POST" autocomplete="off" class="contact_form2 mfa-form main-form row">

                                {{ csrf_field() }}

                                <div class="form-group w-100">

                                    <div class="response w-100"></div>

                                </div>

                                <div class="form-group col-md-6">

                                    <input type="text" placeholder="{{ $langg->lang47 }}*" name="name"
                                        class="form-control form-com" required>

                                </div>

                                <div class="form-group col-md-6">

                                    <input type="email" placeholder="{{ $langg->lang49 }} *" name="email"
                                        class="form-control form-com">

                                </div>

                                <div class="form-group col-md-6">

                                    <input type="number" maxlength="10" placeholder="{{ $langg->lang48 }} *"
                                        name="phone" class="form-control form-com" required>

                                </div>

                                <div class="form-group col-md-6">

                                    <input type="text" placeholder="{{ $langg->lang41 }}" name="subject"
                                        class="form-control form-com">

                                </div>

                                <div class="form-group col-md-12">

                                    <textarea placeholder="Message" name="text" class="form-control form-com-message ">{{ $langg->lang50 }}</textarea>

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





                                <div class="col-md-12">

                                    <button class="animation-cer-btn" id="submit-btn" type="submit">

                                        {{ $langg->lang52 }} <span class="line2"></span>

                                    </button>

                                    <p id="my-form-status-contact"></p>

                                </div>

                            </form>



                        </div>

                    </div>



                </div>

                <div class="col-md-6 pl-80">

                    <div class="map">
                        {!! $ps->map !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end -->
    <!--========== End blogs area ================== -->
@stop
@section('js')
    <script type="text/javascript">
        fbq('track', 'Contact Us Visit');
    </script>
@endsection
