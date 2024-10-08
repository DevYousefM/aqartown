@extends('layouts.front')

@section('title')


{{ $langg->lang12 }} -
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

    <section class="breadcrumb-section" style="background-image: url(top_icon);">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> {{ $langg->lang12 }} 
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> {{ $langg->lang12 }} 
                </li>
                <li><a href="{{ route('front.index',$sign) }}">{{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>


    <div class="home-centers-section">
        <div class="section-wrapper">
            <div class="section-heading">
                <p>
                {{ $langg->lang10 }}
                </p>


            </div>
            <div class="section-body">
                <ul class="main-section-ul">

                @foreach($services as $service)
                    <li>
                        <a href="{{route('front.service',['service' => $service->title ,'lang' => $sign ])}}">
                            <div class="img-div">
                                <img src="{{asset('assets/images/services/'.$service->photo)}}" alt="img">
                            </div>
                            <div class="body">
                                <div class="name">
                                    <i class="linearicons-apartment"></i>
                                    <span>
                                    @if($langg->rtl == 1)
                                                    {{$service->title_ar}}
                                                @else
                                                    {{$service->title}}
                                                @endif
                                    </span>
                                </div>
                                <div class="read-more">
                                    <span>
                                    {{ $langg->lang14 }}
                                    </span>
                                    <i class="linearicons-chevron-left"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                  @endforeach
                </ul>
            </div>
        </div>
    </div>

    @stop