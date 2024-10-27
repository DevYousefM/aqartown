@extends('layouts.front')

@section('title')
    {{ $langg->lang10 }} -
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

    <div id="popup-team-video" class="popup">
        <div class="popup__wrapBody">
            <div class="popup__body">
                <div class="popup__content">
                    <button class="close" id="close-popup-team-video" type="button">
                        <img class="w-100" src="{{ asset('public/assets/cangrow/images/svg/close-mobile.svg') }}" alt="Close">
                    </button>
                    <iframe src="https://www.youtube.com/embed/9rQjC5C1YrI?enablejsapi=1&amp;" title="YouTube video player"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <main class="main page page__team">
        <div class="page__header container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page__title text-center text-uppercase" data-aos="fade-up">{{ $langg->lang10 }}</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="300">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $langg->lang10 }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="team" class="ourTeam">
            <h2 class="section-title text-center" data-aos="fade-in" data-aos-delay="500">{{ $langg->lang14 }}
            </h2>
            <div class="container">
                <div class="row">
                    @foreach ($our_teams as $k => $data)
                        <div class="col-md-4">
                            <div class="ourTeam__worker d-flex flex-column h-100 justify-content-between"
                                data-aos="zoom-out" data-aos-delay="100">
                                <div class="sk-spinner sk-spinner-pulse"></div>
                                <img class="ourTeam__image position-absolute h-100 w-100 b-lazy"
                                    data-src="{{ asset('public/assets/images/services/' . $data->photo) }}"
                                    src="{{ asset('public/assets/images/services/' . $data->photo) }}"
                                    alt="@if ($langg->rtl == 1) {!! $data->name_ar !!}
										@else

										{!! $data->name !!} @endif">
                                <div class="ourTeam__workerContent">
                                    <h3 class="ourTeam__name text-center">
                                        @if ($langg->rtl == 1)
                                            {!! $data->name_ar !!}
                                        @else
                                            {!! $data->name !!}
                                        @endif
                                    </h3>
                                    <p class="ourTeam__position text-center">
                                        @if ($langg->rtl == 1)
                                            {!! $data->title_ar !!}
                                        @else
                                            {!! $data->title !!}
                                        @endif
                                    </p>
                                    <ul class="ourTeam__socialList d-flex justify-content-center mt-auto">
                                        @if (!empty($data->facebook))
                                            <li class="ourTeam__socialItem">
                                                <a href="{!! $data->facebook !!}"
                                                    class="ourTeam__socialIink ourTeam__socialIink-facebook">
                                                    <svg viewBox="0 0 12.001 24">
                                                        <path
                                                            d="M16,3.985h2.191V.169A28.292,28.292,0,0,0,15,0C11.837,0,9.673,1.987,9.673,5.639V9H6.187v4.266H9.673V24h4.274V13.267h3.345L17.823,9H13.946V6.062c0-1.233.333-2.077,2.051-2.077Z"
                                                            transform="translate(-6.187)" fill="currentColor" />
                                                    </svg>

                                                </a>
                                            </li>
                                        @endif
                                        @if (!empty($data->linkedin))
                                            <li class="ourTeam__socialItem">
                                                <a href="{!! $data->linkedin !!}"
                                                    class="ourTeam__socialIink ourTeam__socialIink-instagram">
                                                    <svg viewBox="0 0 24 24">
                                                        <path
                                                            d="M12,5.838A6.158,6.158,0,1,0,18.162,12,6.157,6.157,0,0,0,12,5.838Zm0,10.155a4,4,0,1,1,4-4A4,4,0,0,1,12,15.993Z"
                                                            transform="translate(0 -0.001)" fill="currentColor" />
                                                        <path
                                                            d="M16.948.076c-2.208-.1-7.677-.1-9.887,0A7.172,7.172,0,0,0,2.025,2.017C-.283,4.325.012,7.435.012,12c0,4.668-.26,7.706,2.013,9.979C4.342,24.291,7.5,23.988,12,23.988c4.624,0,6.22,0,7.855-.63,2.223-.863,3.9-2.85,4.065-6.419.1-2.209.1-7.677,0-9.887-.2-4.213-2.459-6.768-6.976-6.976Zm3.5,20.372c-1.513,1.513-3.612,1.378-8.468,1.378-5,0-7.005.074-8.468-1.393-1.685-1.677-1.38-4.37-1.38-8.453,0-5.525-.567-9.5,4.978-9.788,1.274-.045,1.649-.06,4.856-.06l.045.03c5.329,0,9.51-.558,9.761,4.986.057,1.265.07,1.645.07,4.847,0,4.942.093,6.959-1.394,8.453Z"
                                                            transform="translate(0 -0.001)" fill="currentColor" />
                                                        <circle cx="1.439" cy="1.439" r="1.439"
                                                            transform="translate(16.967 4.155)" fill="currentColor" />
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                                        @if (!empty($data->twiter))
                                            <li class="ourTeam__socialItem">
                                                <a href="{!! $data->twiter !!}"
                                                    class="ourTeam__socialIink ourTeam__socialIink-twitter">
                                                    <svg width="24" height="19.5" viewBox="0 0 24 19.5">
                                                        <path
                                                            d="M21.534,7.113A9.822,9.822,0,0,0,24,4.559h0a10.276,10.276,0,0,1-2.835.777A4.894,4.894,0,0,0,23.33,2.616a9.845,9.845,0,0,1-3.12,1.191A4.92,4.92,0,0,0,11.7,7.171a5.066,5.066,0,0,0,.114,1.122A13.93,13.93,0,0,1,1.671,3.146,4.92,4.92,0,0,0,3.183,9.722,4.863,4.863,0,0,1,.96,9.116V9.17A4.943,4.943,0,0,0,4.9,14.005a4.893,4.893,0,0,1-1.29.162,4.343,4.343,0,0,1-.931-.084,4.969,4.969,0,0,0,4.6,3.428,9.89,9.89,0,0,1-6.1,2.1A9.306,9.306,0,0,1,0,19.542,13.856,13.856,0,0,0,7.548,21.75,13.908,13.908,0,0,0,21.534,7.113Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="pageTeam__wrapVideo" data-aos="fade">
            <div class="sk-spinner sk-spinner-pulse"></div>
            <img class="pageTeam__bg-video b-lazy" data-src="{{ asset('public/assets/images/' . $gs->hot_icon) }}"
                src="{{ asset('public/assets/images/' . $gs->hot_icon) }}" alt="">
            <button type="button" class="pageTeam__showVideoBtn">
                <img src="{{ asset('public/assets/cangrow/images/svg/show_video.svg') }}" alt="">
            </button>
        </div>
        <section id="appointment" class="appointment container">
            <h2 class="section-title text-uppercase text-center" data-aos="fade-in">{{ $langg->lang8 }}</h2>
            <p class="section-under-title text-center" data-aos="fade-in" data-aos-delay="200">{{ $langg->lang53 }}</p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="appointment__wrapIllustration position-relative" data-aos="fade-down">
                        <img class="appointment__illustration position-relative"
                            src="{{ asset('public/assets/images/' . $gs->discount_icon) }}" alt="Illustration">
                        <img class="appointment__arrow position-absolute"
                            src="{{ asset('public/assets/cangrow/images/svg/appointment-arrow.svg') }}" alt="Arrow">
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form"
                        class="appointment__form d-flex flex-wrap position-relative" method="POST" autocomplete="off">

                        {{ csrf_field() }}
                        <div class="form-group w-100">
                            <div class="response w-100"></div>
                        </div>
                        <div class="appointment__wrapField aos-init aos-animate" data-aos="fade-right">
                            <label class="appointment__label d-block">{{ $langg->lang47 }}</label>
                            <input required type="text" name="name" placeholder="Your name" id="first-name"
                                class="appointment__field reset fname w-100">
                            <div class="d-flex appointment__notification position-absolute">
                                <span class="appointment__required">Required field.</span>
                                <span class="appointment__symbols">At least 2 characters.</span>
                            </div>
                        </div>
                        <div class="appointment__wrapField aos-init aos-animate" data-aos="fade-left">
                            <label class="appointment__label d-block">{{ $langg->lang48 }}</label>
                            <input required id="phone" type="tel" name="phone" placeholder="+__(___)___-__-_"
                                class="appointment__field reset  phone w-100">
                            <div class="d-flex appointment__notification position-absolute">
                                <span class="appointment__required">Required field.</span>
                            </div>
                        </div>
                        <div class="appointment__wrapField aos-init aos-animate invalid empty" data-aos="fade-right">
                            <label class="appointment__label d-block">{{ $langg->lang49 }}</label>
                            <input required id="email" type="email" name="email" placeholder="example@gmail.com"
                                class="appointment__field reset  email w-100">
                            <div class="d-flex appointment__notification position-absolute">
                                <span class="appointment__required">Required field.</span>
                                <span class="appointment__symbols">Please enter correct Email</span>
                            </div>
                        </div>
                        <div class="appointment__wrapField aos-init aos-animate empty invalid" data-aos="fade-left">
                            <label class="appointment__label d-block">Meeting date</label>
                            <input required id="date" type="text" name="date"
                                class="appointment__field reset w-100" placeholder="21.05.2021">
                            <div class="d-flex appointment__notification position-absolute">
                                <span class="appointment__required">Required field.</span>
                            </div>
                        </div>
                        <div class="appointment__wrapField aos-init aos-animate" data-aos="fade-right">
                            <label class="appointment__label d-block">Time</label>
                            <input required id="time" type="text" name="time"
                                class="appointment__field reset w-100" placeholder="12:45">
                            <div class="d-flex appointment__notification position-absolute">
                                <span class="appointment__required">Required field.</span>
                            </div>
                        </div>
                        <div class="appointment__wrapField d-none">
                            <label class="appointment__label d-block">Label</label>
                            <input type="text" name="invisible" class="appointment__field reset w-100">
                        </div>
                        <div class="appointment__wrapField appointment__wrapField-wrapTextarea w-100 aos-init aos-animate"
                            data-aos="fade-left">
                            <label class="appointment__label d-block">{{ $langg->lang50 }}</label>
                            <textarea id="message" name="text" placeholder="Hi"
                                class="appointment__field appointment__field-message contact_message  reset w-100"></textarea>
                            <div class="d-flex appointment__notification position-absolute">
                                <span class="appointment__required">Required field.</span>
                                <span class="appointment__symbols">At least 20 characters.</span>
                            </div>
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
                        <div class="appointment__wrapButtonText d-flex flex-wrap flex-md-nowrap align-items-center aos-init"
                            data-aos="fade" data-aos-delay="600">
                            <button id="appointment-send" type="submit"
                                class="appointment__submit">{{ $langg->lang52 }}</button>
                            <!-- <p class="appointment__text">By clicking on the button, you consent to
                 processing your personal data and agree
                 to the <a href="/privacy-policy.html">Privacy Policy</a></p> -->
                        </div>
                        <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                        <div id="textAfterSending"
                            class="appointment__textAfterSending position-absolute align-items-center justify-content-center">
                            <p>Message sent.</p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@stop
