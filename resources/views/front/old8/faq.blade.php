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
@php 




  $ps = App\Models\Pagesetting::find(1);
  

   @endphp



        <!-- ============================ Page Title Start================================== -->
        <section class="breadcrumb-section" style="background-image: url(./img/slider/20210428041843_805397.jpg);">
            <div class="container">
                <div class="breadcrumb-text">
                    <h1>{{ $langg->lang222 }}</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li>{{ $langg->lang222 }}</li>
                    <li><a href="{{route('front.index',$sign)}}">{{ $langg->lang17 }}</a></li>
                </ul>
                <span class="btg-text">Absen</span>
            </div>

        </section>
        <!-- ============================ Page Title End ================================== -->
    
        <section class="faqs_absen">
            <div class="container">
                <div class="row">
                    <div class="col">
                    @foreach($faqs as $k=>$fq)
                        <div class="accordion" id="accordionExample{{$k}}">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne{{$k}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$k}}" aria-expanded="true" aria-controls="collapseOne{{$k}}">
                                {{$langg->rtl == 1 ? $fq->title_ar  : $fq->title}}
                                </button>
                              </h2>
                              <div id="collapseOne{{$k}}" class="accordion-collapse collapse " aria-labelledby="headingOne{{$k}}" data-bs-parent="#accordionExample{{$k}}">
                                <div class="accordion-body">
                                    <p>@if($langg->rtl == 1)   {!! $fq->details_ar !!}  @else 
              {!! $fq->details !!}
              @endif   </p>
                                </div>
                              </div>
                            </div>
                     
                          </div>
                          @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- end gallery section -->

       @stop