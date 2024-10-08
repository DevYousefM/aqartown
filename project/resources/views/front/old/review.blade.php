@extends('layouts.front')

@section('title')
    {{ $langg->lang222 }} -
    @if($langg->rtl == 1 )
        {{$gs->title_ar}}
    @else
        {{$gs->title}}
    @endif
@stop

@section('content')

    <section>
                <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
                    <div class="fixed-bg" style="background-image: url({{asset('assets/images/'.$gs->discount_icon)}});"></div>
                    <div class="container">
                        <div class="page-title-inner d-inline-block">
                            <h1 class="mb-0">{{ $langg->lang222 }}</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index',$sign) }}" title="">{{ $langg->lang17 }}</a></li>
                                <li class="breadcrumb-item active">{{ $langg->lang222 }} </li>
                            </ol>
                        </div>
                    </div>
                </div><!-- Page Title Wrap -->
            </section>
         
            <section>
                <div class="w-100 pb-120 position-relative">
                    <div class="sec-title btm-icn mb-50 w-100 text-center">
                        <div class="sec-title-inner d-inline-block" style="padding-top: 75px">
                            <span class="d-block thm-clr">{{ $langg->lang5 }}</span>
                            <h2 class="mb-0">{{ $langg->lang4 }}</h2>
                            <i class=""></i>
                        </div>
                    </div><!-- Sec Title -->
                    <div class="testi-wrap2 w-100">
                        <div class="testi-caro2">
                            @foreach($reviews as $review)
                            <div class="testi-box text-center">
                                <div class="testi-box-inr w-100">
                                    <span class="d-inline-block">
                                        @if($review->rate == 1)
                                        <i class="fas fa-star"></i>
                                        @elseif($review->rate == 2)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        @elseif($review->rate == 3)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                         @elseif($review->rate == 4)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        @else
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        @endif
                                    </span>
                                    <p class="mb-0">{{$langg->rtl == 1 ? $review->details_ar : $review->details}}  </p>
                                    <i class="thm-clr rounded-circle flaticon-right-quote"></i>
                                </div>
                                <div class="testi-box-info w-100">
                                    <h4 class="mb-0">{{$langg->rtl == 1 ? $review->title_ar : $review->title}}</h4>
                                    <span class="d-block">{{$langg->rtl == 1 ? $review->subtitle_ar : $review->subtitle}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
  @stop