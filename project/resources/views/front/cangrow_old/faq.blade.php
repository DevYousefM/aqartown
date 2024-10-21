@extends('layouts.front')

@section('title')
    {{ $langg->lang19 }} -
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
    <main class="main page page__faq">
        <div class="page__header container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page__title text-center text-uppercase" data-aos="fade-up">{{ $langg->lang19 }}</h1>
                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="300">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $langg->lang19 }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="faq" class="faq position-relative overflow-hidden">
            <div class="container">
                <h2 class="section-title text-center" data-aos="fade-in">{{ $langg->lang9 }}</h2>
                <div class="row position-relative">
                    <div class="col-lg-6">
                        <p data-aos="fade">
                            @if ($langg->rtl == 1)
                                {!! $gs->policy_ar !!}
                            @else
                                {!! $gs->policy !!}
                            @endif
                        </p>

                    </div>
                    <div class="col-lg-6">
                        <div class="faq__BlockImage overflow-hidden position-relative" data-aos="fade">
                            <div class="sk-spinner sk-spinner-pulse"></div>
                            <img class="faq__image b-lazy" data-src="{{ asset('public/assets/images/' . $gs->new_icon) }}"
                                src="{{ asset('public/assets/images/' . $gs->new_icon) }}" alt="">
                        </div>

                    </div>
                    @foreach ($faqs as $fq)
                        <div class="col-lg-6">

                            <div class="accordion js-accordion" style="padding-left: 35px;
padding-right: 35px;">

                                <div class="accordion__item js-accordion-item overflow-hidden" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <div class="accordion-header js-accordion-header">
                                        {{ $langg->rtl == 1 ? $fq->title_ar : $fq->title }}
                                    </div>
                                    <div class="accordion-body js-accordion-body">
                                        <div class="accordion-body__contents">
                                            <p>
                                                @if ($langg->rtl == 1)
                                                    {!! $fq->details_ar !!}
                                                @else
                                                    {!! $fq->details !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <img class="faq__illustration position-absolute"
                src="{{ asset('assets/cangrow/images/svg/faq-illustration.svg') }}" alt="FAQ Illustration">
        </section>
        <div class="subscribe container position-relative">
            <div class="row">
                <div class="col-md-6">
                    <p class="subscribe__text text-center" data-aos="fade-in">{{ $langg->lang7 }}</p>
                </div>
            </div>
            <div class="row">
                <div style="">
                    @include('includes.admin.form-both')
                </div>
                <div class="col-md-6">
                    <div class="subscribe__BlockImage overflow-hidden position-relative" data-aos="fade"
                        data-aos-delay="300">
                        <div class="sk-spinner sk-spinner-pulse"></div>
                        <img class="subscribe__image position-absolute b-lazy"
                            data-src="{{ asset('public/assets/images/' . $gs->trending_icon) }}"
                            src="{{ asset('public/assets/images/' . $gs->trending_icon) }}" alt="">
                    </div>
                </div>
                <div class="col-md-6 align-items-center d-flex">

                    <form class="subscribe__form d-flex w-100" action="{{ route('front.subscribe') }}" id="subscribeform"
                        name="subscribeForm" method="POST">
                        {{ csrf_field() }}
                        <input type="email" name="email" class="subscribe__field h-100"
                            placeholder="{{ $langg->lang741 }}" required="">
                        <button type="submit" id="sub-btn"
                            class="subscribe__submit h-100">{{ $langg->lang742 }}</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@stop
@section('js')


@stop
