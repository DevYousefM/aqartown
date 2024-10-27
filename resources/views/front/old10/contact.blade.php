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

    <section class="page-title" style="background-image:url({{ asset('assets/images/' . $gs->discount_icon) }});">
        <div class="auto-container">
            <h1>{{ $langg->lang20 }} </h1>

            <ul class="bread-crumb">
                <li><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a></li>
                <li><a href="#">{{ $langg->lang20 }} </a></li>
            </ul>

        </div>

        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span>
            </div>
        </div>

    </section>


    <!-- contact us page -->
    <div class="contact-page">
        <div class="mfa-container">
            <div class="page-body">
                <ul class="branches">
                    <li>
                        <div class="branch-heading">
                            <p>
                                {{ $langg->lang1 }}
                            </p>
                        </div>
                        <div class="working-hours-phones">
                            <div class="working-hours">
                                {!! $langg->rtl == 1 ? $ps->contact_title_ar : $ps->contact_title !!}
                                {{--  <ul class="week-days">
                                      <li>
                                          <span>
                                              السبت
                                          </span>
                                          <span>
                                              8 ص : 11 م
                                          </span>
                                      </li>
                                      <li>
                                          <span>
                                              الأحد
                                          </span>
                                          <span>
                                              8 ص : 11 م
                                          </span>
                                      </li>
                                      <li>
                                          <span>
                                              الإثنين
                                          </span>
                                          <span>
                                              8 ص : 11 م
                                          </span>
                                      </li>
                                      <li>
                                          <span>
                                              الثلاثاء
                                          </span>
                                          <span>
                                              8 ص : 11 م
                                          </span>
                                      </li>
                                      <li>
                                          <span>
                                              الأربعاء
                                          </span>
                                          <span>
                                              8 ص : 11 م
                                          </span>
                                      </li>
                                      <li>
                                          <span>
                                              الخميس
                                          </span>
                                          <span>
                                              Closed
                                          </span>
                                      </li>
                                      <li>
                                          <span>
                                              الجمعة
                                          </span>
                                          <span>
                                              Closed
                                          </span>
                                      </li>
                                  </ul> --}}
                            </div>
                            <ul class="phones">
                                <li>
                                    <span class="feather icon-phone-call"></span>
                                    <span>
                                        {{ $ps->phone }}
                                    </span>
                                </li>


                            </ul>
                        </div>


                    </li>

                </ul>

                <div class="form-wrapper">
                    <div class="form-heading">
                        <p>
                            {{ $langg->lang2 }}
                        </p>
                    </div>
                    <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                        autocomplete="off" class="contact_form2">
                        {{ csrf_field() }}
                        <div class="form-group w-100">
                            <div class="response w-100"></div>
                        </div>
                        <div class="form-div">
                            <input type="text" required name="name" placeholder=" {{ $langg->lang47 }}*"
                                class="fname" />
                        </div>
                        <div class="form-div">
                            <input type="email" name="email" placeholder="{{ $langg->lang49 }} *" />
                        </div>
                        <div class="form-div">
                            <input type="text" required name="phone" placeholder="{{ $langg->lang48 }} *" />
                        </div>
                        <div class="form-div">
                            <input type="text" name="subject-title" id=""
                                placeholder="{{ $langg->lang41 }} * " />
                        </div>
                        <div class="form-div">
                            <textarea name="text" placeholder="{{ $langg->lang50 }}"></textarea>
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
                        <button type="submit">
                            <span class="feather icon-send"></span>
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
    <!-- contact us page -->

@stop
