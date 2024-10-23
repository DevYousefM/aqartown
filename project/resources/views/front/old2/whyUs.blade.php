@extends('layouts.front')

@section('title')
    {{ $langg->lang18 }} -
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
    <section class="medicen-aboutUs text-center"
        style="background-image: url({{ asset('assets/images/' . $gs->new_icon) }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6">
                    <img src="./images/logo3.png" alt="">
                </div>
                <div class="col-lg-6">
                    <h3>{{ $langg->lang18 }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"> {{ $langg->lang18 }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="Faq_Stuff">
        <!-- <div class="fixed-bg" style="background-image: url(images/d4bc10_cdb32f58b48d490db75ca0a1ee087565_mv2_d_5760_3840_s_4_2.webp);opacity: 0.7;"></div> -->
        <div class="container">
            <div class="row">

                @if (!empty($gs->choose_title) && !empty($gs->choose_title_ar))
                    @php
                        $title = explode(',', $gs->choose_title);
                        $detail = explode(',', $gs->choose_detail);
                        $title_ar = explode(',', $gs->choose_title_ar);
                        $detail_ar = explode(',', $gs->choose_detail_ar);

                    @endphp
                    <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                        <div class="row">

                            @foreach ($title as $key => $data1)
                                <div class="col-12 col-md-6">
                                    <div class="professional-box">
                                        <h2 class="d-flex align-items-center">
                                            {{ $langg->rtl == 1 ? $title_ar[$key] : $title[$key] }}</h2>
                                        <img src="./images/cardiogram-2.png" alt=""
                                            data-pagespeed-url-hash="2144542407"
                                            onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                        <p>{{ $langg->rtl == 1 ? $detail_ar[$key] : $detail[$key] }}</p>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                @endif
                <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                    <div class="accordion">
                        <div class="col-12" style="padding-left: 30px;">
                            <h2 class="sub-title"
                                style="
    font-size: 20px;
    line-height: 0;
    padding-top: 10px;
    right: 209px;
    margin-left: auto;
    float: right;
    direction: ltr;
    top: 57px;
">
                                {{ $langg->lang19 }} <i class="fab fa-slack"></i> </h2>
                        </div>
                        <div class="acord" style="padding-top: 133px;">

                            @foreach ($faqs as $fq)
                                <div class="contentBx">
                                    <div class="lable">{{ $langg->rtl == 1 ? $fq->title_ar : $fq->title }}</div>
                                    <div class="content">
                                        <p>
                                            @if ($langg->rtl == 1)
                                                {!! $fq->details_ar !!}
                                            @else
                                                {!! $fq->details !!}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('includes.form')
    <section class="container">
        {!! $ps->map !!}
    </section>

@stop
@section('js')
    <script>
        const accordion = document.getElementsByClassName('contentBx');
        for (i = 0; i < accordion.length; i++) {
            accordion[i].addEventListener('click', function() {
                this.classList.toggle('active')
            })
        }
    </script>
@stop
