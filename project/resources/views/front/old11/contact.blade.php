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

    <!-- =====slider home ===== -->
    <!-- Main Slider -->
    <section class="breadcrumb-area"
        style="background-image: url({{ asset('assets/images/' . $gs->discount_icon) }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content clearfix">
                        <div class="title float-right">
                            <h2>{{ $langg->lang20 }} </h2>
                        </div>
                        <div class="breadcrumb-menu float-left">
                            <ul class="clearfix">
                                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active">{{ $langg->lang20 }} </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!--Start contact form area-->
    <section class="contact-form-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h2>{{ $langg->lang36 }} </h2>
                        </div>
                        <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                            autocomplete="off" class="default-form">
                            {{ csrf_field() }}
                            <div class="form-group w-100">
                                <div class="response w-100"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <input type="text" required name="name" value=""
                                            placeholder="{{ $langg->lang47 }}*" required="">
                                    </div>
                                    <div class="input-box">
                                        <input type="email" name="email" value=""
                                            placeholder=" {{ $langg->lang49 }}">
                                    </div>
                                    <div class="input-box">
                                        <input type="text" name="phone" required="" value=""
                                            placeholder="{{ $langg->lang48 }}* ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box">
                                        <textarea name="text" placeholder="{{ $langg->lang50 }}" required=""></textarea>
                                    </div>
                                    @if ($gs->is_capcha == 1)
                                        <ul class="captcha-area">
                                            <li>
                                                <p><img class="codeimg1"
                                                        src="{{ asset('assets/images/capcha_code.png') }}"
                                                        alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i>
                                                </p>

                                            </li>
                                            <li>
                                                <input name="codes" type="text" class="input-field"
                                                    placeholder="{{ $langg->lang51 }}" required="">

                                            </li>
                                        </ul>
                                    @endif

                                    <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                                    <div class="button-box">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden"
                                            value="">
                                        <button class="btn-one" type="submit"
                                            data-loading-text="Please wait...">{{ $langg->lang52 }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End contact form area-->
@stop
