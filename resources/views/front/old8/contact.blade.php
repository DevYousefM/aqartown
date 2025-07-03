@extends('layouts.front')

@section('title')
    {{ $langg->lang1 }} -
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

    <!-- ============================ Page Title Start================================== -->
    <section class="breadcrumb-section"
        style="background-image: url({{ asset(access_public() . 'assets/images/' . $gs->discount_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>{{ $langg->lang1 }}</h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>{{ $langg->lang1 }}</li>
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">Absen</span>
        </div>

    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Our appointment Start ================================== -->

    <div class="contact-page">
        <div class="mfa-container">
            <div class="page-body">
                <ul class="branches">
                    <li>
                        <div class="branch-heading">
                            <p>
                                @if ($langg->rtl == 1)
                                    {{ $gs->title_ar }}
                                @else
                                    {{ $gs->title }}
                                @endif


                            </p>
                        </div>
                        <div class="working-hours-phones">

                            <ul class="phones">
                                <li>
                                    <span class="fas fa-phone-alt"></span>
                                    <span>
                                        {{ $ps->phone }}
                                    </span>
                                </li>

                            </ul>
                        </div>
                        <div class="location">
                            <i class="far fa-map"></i>
                            <span>
                                @if ($langg->rtl == 1)
                                    {{ $ps->street_ar }}
                                @else
                                    {{ $ps->street }}
                                @endif
                            </span>
                        </div>
                    </li>

                </ul>

                <div class="form-wrapper">
                    <div class="form-heading">
                        <p>
                            {{ $langg->lang1 }}
                        </p>
                    </div>
                    <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                        autocomplete="off" class="contact_form2">
                        {{ csrf_field() }}
                        <div class="form-group w-100">
                            <div class="response w-100"></div>
                        </div>
                        <div class="form-div">
                            <input type="text" name="name" required="" placeholder="{{ $langg->lang47 }}"
                                class="fname">
                        </div>
                        <div class="form-div">
                            <input type="email" name="email" placeholder="{{ $langg->lang49 }}">
                        </div>
                        <div class="form-div">
                            <input type="text" name="phone" required="" placeholder="{{ $langg->lang48 }}">
                        </div>
                        <!-- <div class="form-div">
                                  <input type="text" name="subject-title" id="" placeholder="Leave Massege ">
                                </div> -->
                        <div class="form-div">
                            <textarea name="text" placeholder="{{ $langg->lang50 }}"></textarea>
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
                            <span class="fal fa-share-square"></span>
                            <span>
                                {{ $langg->lang52 }}
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="map-wrapper">
            {!! $ps->map !!}
        </div>
    </div>

    <!-- ============================ Our appointment End ================================== -->

@stop
