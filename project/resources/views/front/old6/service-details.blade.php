@extends('layouts.front')

@section('title')
@if($langg->rtl == 1)
                                                    {{$service->title_ar}}
                                                @else
                                                    {{$service->title}}
                                                @endif -
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

    <section class="breadcrumb-section" style="background-image: url({{asset('assets/images/'.$gs->top_icon)}});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> @if($langg->rtl == 1)
                                                    {{$service->title_ar}}
                                                @else
                                                    {{$service->title}}
                                                @endif
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> @if($langg->rtl == 1)
                                                    {{$service->title_ar}}
                                                @else
                                                    {{$service->title}}
                                                @endif
                </li>
                <li><a href="{{ route('front.index',$sign) }}"> {{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>

    <div class="service-details-page">
        <div class="heading-section">
          <div class="container">
            <div class="right">
              <div class="section-heading">
                <p>
                @if($langg->rtl == 1)
                                                    {{$service->title_ar}}
                                                @else
                                                    {{$service->title}}
                                                @endif
                </p>
              </div>
              <div class="section-text">
                <p>
                @if($langg->rtl == 1)
                                                    {{$service->details_ar}}
                                                @else
                                                    {{$service->details}}
                                                @endif
                </p>
              </div>
            </div>
            <div class="left">
              <img src="{{asset('assets/images/services/'.$service->photo)}}" alt="img">
            </div>
          </div>
        </div>
          
      </div>

@stop