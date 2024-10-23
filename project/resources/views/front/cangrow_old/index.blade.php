@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{ asset('assets/images/' . $gs->logo) }}" />
@stop

@section('content')
    @if (!empty($sliders) && count($sliders) > 0)
        <div id="firstScreen" class="wrap-firstScreen overflow-hidden position-relative">
            <div class="firstScreen container">
                <div class="row align-items-center h-100">
                    <div class="col-lg-5">
                        @if (!empty($sliders[0]->subtitle_text) || !empty($sliders[0]->subtitle_text_ar))
                            <h2 class="firstScreen__aboveTitle" data-aos="fade-up">
                                {{ $langg->rtl == 1 ? $sliders[0]->subtitle_text_ar : $sliders[0]->subtitle_text }}</h2>
                        @endif
                        @if (!empty($sliders[0]->title_text) || !empty($sliders[0]->title_text_ar))
                            <h1 class="firstScreen__title" data-aos="fade-up" data-aos-delay="100">
                                {{ $langg->rtl == 1 ? $sliders[0]->title_text_ar : $sliders[0]->title_text }}</h1>
                        @endif
                        @if (!empty($sliders[0]->details_text) || !empty($sliders[0]->details_text_ar))
                            <p class="firstScreen__text" data-aos="fade-up" data-aos-delay="200">
                                {{ $langg->rtl == 1 ? $sliders[0]->details_text_ar : $sliders[0]->details_text }}</p>
                        @endif
                        <button id="toCreateAGroup" type="button" class="firstScreen__btn" data-aos="fade-up"
                            data-aos-delay="350" data-aos-offset="0">Call
                            Back</button>
                    </div>
                    <div class="col-7 h-100 align-items-center d-none d-lg-flex fs-ilustratio-col" data-aos="fade-in"
                        data-aos-delay="500">
                        <img src="{{ asset('/assets/images/sliders/' . $sliders[0]->photo) }}"
                            style="max-width: 1000px;" alt="">
                    </div>
                </div>
                <button class="firstScreen__btnDown position-absolute" type="button" data-aos="fade-up"
                    data-aos-delay="500" data-aos-offset="0">
                    <svg width="23" height="13.958" viewBox="0 0 23 13.958">
                        <path
                            d="M11,22.271.768,12.035a1.264,1.264,0,0,1,0-1.788L1.962,9.053a1.264,1.264,0,0,1,1.786,0l8.15,8.112,8.15-8.112a1.264,1.264,0,0,1,1.786,0l1.194,1.194a1.264,1.264,0,0,1,0,1.788L12.792,22.271A1.264,1.264,0,0,1,11,22.271Z"
                            transform="translate(-0.398 -8.683)" fill="#657783" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <main class="main">
        <section id="about" class="about position-relative">

            <h2 class="section-title text-uppercase text-center" data-aos="fade-in">{{ $langg->lang16 }}</h2>
            <p class="section-under-title text-center" data-aos="fade-in" data-aos-delay="200">{{ $langg->lang223 }}</p>
            @foreach ($about_uss->take(1) as $about_us)
                <div class="container about__content">
                    <div class="row align-items-center">
                        <div class="col-xl-6 d-flex justify-content-lg-end" data-aos="zoom-in" data-aos-delay="300">
                            <img class="img-fluid w-100"
                                src="{{ asset('assets/images/brands/' . $about_us->photo) }}"
                                alt="{{ $about_us->name }}">
                        </div>
                        <div class="col-xl-6 content-column">
                            <h3 class="about__title" data-aos="fade-in" data-aos-delay="100">
                                @if ($langg->rtl == 1)
                                    {{ $about_us->title_ar }}
                                @else
                                    {{ $about_us->title }}
                                @endif
                                <br>
                                @if ($langg->rtl == 1)
                                    {{ $about_us->name_ar }}
                                @else
                                    {{ $about_us->name }}
                                @endif
                            </h3>
                            <p class="about__text" data-aos="fade-in" data-aos-delay="200">
                                @if ($langg->rtl == 1)
                                    {!! $about_us->meta_description_ar !!}
                                @else
                                    {!! $about_us->meta_description !!}
                                @endif
                            </p>
                            <a class="about__link" href="{{ route('front.about', $sign) }}">{{ $langg->lang12 }}</a>
                        </div>
                    </div>
                </div>
            @endforeach

            @if (!empty($gs->choose_title))
                @php
                    $title = explode(',', $gs->choose_title);
                    $detail = explode(',', $gs->choose_detail);
                    $title_ar = explode(',', $gs->choose_title_ar);
                    $detail_ar = explode(',', $gs->choose_detail_ar);
                @endphp
                <div class="wrap-about__bottomInfo overflow-hidden position-relative">
                    <img class="about__bottomInfoBG position-absolute"
                        src="{{ asset('assets/cangrow/images/svg/about-bottom-illustration.svg') }}"
                        alt="About bottom illustration">
                    <div class="container about__bottomInfo align-items-end d-flex">
                        <div class="row">
                            <div class="col-12"></div>
                            <div class="col-xl-4 col-lg-12 align-items-center d-flex about__bottomInfoItem">
                                <h4 class="about__bottomInfoTitle" data-aos="fade-left">{{ $langg->lang13 }}</h4>
                            </div>

                            @foreach ($title as $key => $data1)
                                <div class="col-xl-2 col-sm-3 about__bottomInfoItem" data-aos="fade-in"
                                    data-aos-delay="300">
                                    <p>{{ $langg->rtl == 1 ? $title_ar[$key] : $title[$key] }}</p>
                                    <p>{{ $langg->rtl == 1 ? $detail_ar[$key] : $detail[$key] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            @endif
        </section>
        <section class="works overflow-hidden position-relative">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="section-title text-uppercase text-center" data-aos="fade-in">{{ $langg->lang220 }}</h2>
                        <p class="section-under-title text-center" data-aos="fade-in" data-aos-delay="200">
                            {{ $langg->lang1 }}</p>
                    </div>
                </div>
                <div class="row position-relative">


                    @foreach ($works as $key => $work)
                        <div
                            class="col-md-6 @if ($key == 0) position-relative @endif"@if ($key % 2) data-aos="fade-right"  @else data-aos="fade-left" @endif>
                            <img class="works__illustration position-absolute"
                                src="{{ asset('assets/images/gallery/' . $work->photo) }}"
                                alt="{{ $langg->rtl == 1 ? $work->name_ar : $work->name }}">
                            <div class="works__blockText align-items-center d-flex position-relative text-center">
                                <div class="works__triangle position-absolute">Triangle</div>
                                <p>{{ $langg->rtl == 1 ? $work->name_ar : $work->name }}</p>
                            </div>
                            @if ($key == 0)
                                <img class="works__arrowOne position-absolute"
                                    src="{{ asset('assets/cangrow/images/svg/works-01.svg') }}" alt="Arrow One">
                            @endif
                            @if ($key == 1)
                                <img class="works__arrowTwo position-absolute"
                                    src="{{ asset('assets/cangrow/images/svg/works-02.svg') }}" alt="Arrow Two">
                            @endif
                        </div>


                        <!-- <div class="col-md-6" data-aos="fade-left">
                   <img class="works__illustration position-absolute" src="{{ asset('assets/cangrow/images/svg/works-illustration-2.svg') }}"
                    alt="The quality will grow service and professionalism employees">
                   <div class="works__blockText align-items-center d-flex position-relative text-center">
                    <div class="works__triangle position-absolute">Triangle</div>
                    <p>The quality will <strong>grow service and professionalism</strong> employees</p>
                   </div>
                  
                  </div>


                  <div class="col-md-6" data-aos="fade-right">
                   <img class="works__illustration position-absolute" src="{{ asset('assets/cangrow/images/svg/works-illustration-3.svg') }}"
                    alt="It will decrease by 40-70% attraction cost new client">
                   <div class="works__blockText align-items-center d-flex position-relative text-center">
                    <div class="works__triangle position-absolute">Triangle</div>
                    <p>It will <strong>decrease by 40-70%</strong> attraction cost new client</p>
                   </div>
                  </div>


                  <div class="col-md-6" data-aos="fade-left">
                   <img class="works__illustration position-absolute" src="{{ asset('assets/cangrow/images/svg/works-illustration-4.svg') }}"
                    alt="The number will increase repeat visits - will become more regular customers">
                   <div class="works__blockText align-items-center d-flex position-relative text-center">
                    <div class="works__triangle position-absolute">Triangle</div>
                    <p>The <strong>number will increase repeat</strong> visits - will become more regular customers
                    </p>
                   </div>
                  </div> -->
                    @endforeach

                </div>
            </div>
        </section>
        <div class="effectiveMarketing">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="effectiveMarketing__title">{{ $langg->lang2 }}
                        </h3>
                        <a class="effectiveMarketing__link" href="{{ route('front.about', $sign) }}"
                            style="border: 1px solid #056839;">{{ $langg->lang12 }}</a>
                    </div>
                    @if (!empty($gs->percent_title))
                        @php
                            $title = explode(',', $gs->percent_title);
                            $value = explode(',', $gs->percent_value);
                            $title_ar = explode(',', $gs->percent_title_ar);

                        @endphp

                        <div class="col-md-6">
                            <div class="effectiveMarketing__progresBars">

                                @foreach ($title as $key => $data1)
                                    <div class="effectiveMarketing__progresBar">
                                        <h4 class="effectiveMarketing__progresBarName text-uppercase">
                                            {{ $langg->rtl == 1 ? $title_ar[$key] : $title[$key] }}</h4>
                                        <div class="effectiveMarketing__progresBarWrapFilling">
                                            <div class="effectiveMarketing__progresBarFilling width-zero data-width"
                                                data-width="{{ $value[$key] }}%">
                                                <p class="effectiveMarketing__progresBarPercent">{{ $value[$key] }}%</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        @if ($gs->multiple_packaging == 1)
            <div class="counters">
                <img class="counters__illustration-left" src="{{ asset('assets/cangrow/images/svg/counters-left.svg') }}"
                    alt="Counters Illustration left">
                <div class="container">
                    <div class="row">

                        @foreach ($counters as $counter)
                            <div class="col-6 col-sm-3 text-center">
                                <div class="counters__counter">
                                    <h3 class="counters__number">{{ $counter->value }}</h3>
                                    <p class="counters__text">
                                        {{ $langg->rtl == 1 ? $counter->title_ar : $counter->title }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <img class="counters__illustration-right"
                    src="{{ asset('assets/cangrow/images/svg/counters-right.svg') }}" alt="Counters Illustration right">
            </div>
        @endif

        <section class="ourClients">
            <img class="ourClients__bg-clients" src="{{ asset('assets/cangrow/images/svg/bg-clients.svg') }}"
                alt="">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="section-title text-uppercase text-center" data-aos="fade-in">{{ $langg->lang3 }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col position-relative">
                        <div class="ourClients__slider swiper-conteiner overflow-hidden">
                            <div class="ourClients__wrapper swiper-wrapper">


                                @foreach ($partners as $partner)
                                    <div class="ourClients__slide swiper-slide">
                                        <span class="sk-spinner sk-spinner-pulse"></span>
                                        <img class="swiper-lazy ourClients__image"
                                            data-src="{{ asset('assets/images/partner/' . $partner->photo) }}"
                                            src="{{ asset('assets/images/partner/' . $partner->photo) }}"
                                            alt="Pingdom">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="reviews" class="reviews overflow-hidden position-relative">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="section-title text-uppercase text-center" data-aos="fade-in">{{ $langg->lang5 }}</h2>
                        <p class="section-under-title text-center" data-aos="fade-in" data-aos-delay="200">
                            {{ $langg->lang4 }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="reviews__slider swiper-conteiner overflow-hidden">
                            <div class="reviews__wrapper swiper-wrapper">

                                @foreach ($reviews as $review)
                                    <div class="reviews__slide swiper-slide container">
                                        <div class="row">
                                            <div class="col-lg-6" data-aos="fade">
                                                <div class="reviews__blockImage overflow-hidden position-relative">
                                                    <div class="sk-spinner sk-spinner-pulse"></div>
                                                    <img class="swiper-lazy reviews__image position-absolute"
                                                        data-src="{{ asset('assets/images/reviews/' . $review->photo) }}"
                                                        src="{{ asset('assets/images/reviews/' . $review->photo) }}"
                                                        alt="{{ $langg->rtl == 1 ? $review->title_ar : $review->title }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6" data-aos="fade">
                                                <h3 class="reviews__name">
                                                    {{ $langg->rtl == 1 ? $review->title_ar : $review->title }}</h3>
                                                <div class="reviews__review position-relative">
                                                    <img class="reviews__quote reviews__quote-top position-absolute"
                                                        src="{{ asset('assets/cangrow/images/svg/quote.svg') }}"
                                                        alt="Quote">
                                                    <div class="reviews__fullReview close">
                                                        <p>{!! $langg->rtl == 1 ? $review->details_ar : $review->details !!}</p>
                                                        <button type="button" class="reviews__button">
                                                            <span class="reviews__buttonText reviews__buttonRead">Read full
                                                                review</span>
                                                            <span class="reviews__buttonText reviews__buttonCloce">Close
                                                                full
                                                                review</span>
                                                        </button> <!-- -->
                                                    </div>
                                                    <img class="reviews__quote reviews__quote-bottom position-absolute"
                                                        src="{{ asset('assets/cangrow/images/svg/quote.svg') }}"
                                                        alt="Quote">
                                                </div>
                                                <div
                                                    class="reviews__wrapNavigation align-items-center d-flex justify-content-center position-relative">
                                                    <div class="swiper-button-prev">
                                                        <svg width="19.032" height="31.999" viewBox="0 0 19.032 31.999">
                                                            <path
                                                                d="M15.223,10.772a2.774,2.774,0,0,1,3.877,0L32.647,24.208a2.685,2.685,0,0,1,.085,3.734L19.384,41.182a2.765,2.765,0,0,1-3.877.014,2.686,2.686,0,0,1,0-3.833L26.853,25.977,15.223,14.591A2.657,2.657,0,0,1,15.223,10.772Z"
                                                                transform="translate(-14.414 -9.983)" fill="#9A85F4" />
                                                        </svg>
                                                    </div>
                                                    <div class="swiper-button-next">
                                                        <svg width="19.032" height="31.999" viewBox="0 0 19.032 31.999">
                                                            <path
                                                                d="M15.223,10.772a2.774,2.774,0,0,1,3.877,0L32.647,24.208a2.685,2.685,0,0,1,.085,3.734L19.384,41.182a2.765,2.765,0,0,1-3.877.014,2.686,2.686,0,0,1,0-3.833L26.853,25.977,15.223,14.591A2.657,2.657,0,0,1,15.223,10.772Z"
                                                                transform="translate(-14.414 -9.983)" fill="#9A85F4" />
                                                        </svg>
                                                    </div>
                                                    <div class="swiper-pagination"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section id="news" class="lastNews position-relative overflow-hidden">
                <div class="container position-relative">
                 <h2 class="section-title text-uppercase text-center" data-aos="fade-in">Last news</h2>
                 <p class="section-under-title text-center" data-aos="fade-in" data-aos-delay="200">Best insights</p>
                 <div class="row">
                  <div class="col-md-4" data-aos="fade-up">
                   <a href="#" class="lastNews__BlockImage overflow-hidden position-relative">
                    <span class="sk-spinner sk-spinner-pulse"></span>
                    <img class="lastNews__image position-absolute b-lazy" data-src="images/last-new-1.jpeg"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                     alt="How to develop a company correctly?">
                   </a>
                   <div class="lastNews__separator">Separator</div>
                   <h3 class="lastNews__title">
                    <a href="#" class="lastNews__titleLink">How to develop a company correctly?</a>
                   </h3>
                   <p class="lastNews__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                   <a href="#" class="lastNews__BlockImage overflow-hidden position-relative">
                    <span class="sk-spinner sk-spinner-pulse"></span>
                    <img class="lastNews__image position-absolute b-lazy" data-src="images/last-new-2.jpeg"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
                   </a>
                   <div class="lastNews__separator">Separator</div>
                   <h3 class="lastNews__title">
                    <a href="#" class="lastNews__titleLink">15 Digital Marketing Mistakes to Avoid</a>
                   </h3>
                   <p class="lastNews__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                  </div>
                  <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                   <a href="#" class="lastNews__BlockImage overflow-hidden position-relative">
                    <span class="sk-spinner sk-spinner-pulse"></span>
                    <img class="lastNews__image position-absolute b-lazy" data-src="images/last-new-3.jpeg"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                     alt="Marketing strategy rules">
                   </a>
                   <div class="lastNews__separator">Separator</div>
                   <h3 class="lastNews__title">
                    <a href="#" class="lastNews__titleLink">Marketing Strategy Rules</a>
                   </h3>
                   <p class="lastNews__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                  </div>
                 </div>
                </div>
               </section> -->
        <div class="subscribe container position-relative">
            <div class="row">
                <div class="col-md-6">
                    <p class="subscribe__text text-center" data-aos="fade-in">{{ $langg->lang7 }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="subscribe__BlockImage overflow-hidden position-relative" data-aos="fade"
                        data-aos-delay="300">
                        <div class="sk-spinner sk-spinner-pulse"></div>
                        <img class="subscribe__image position-absolute b-lazy"
                            data-src="{{ asset('assets/images/' . $gs->big_icon) }}"
                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                            alt="">
                    </div>
                </div>
                <div class="col-md-6 align-items-center d-flex">
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
                                    <p><img class="codeimg1" src="{{ asset('assets/images/capcha_code.png') }}"
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
        </div>
    </main>
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
