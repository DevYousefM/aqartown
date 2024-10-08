@extends('layouts.front')

@section('title')
  {{ $langg->lang20 }}  -
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

          <!-- Start inner Page hero-->
  <section class="d-flex align-items-center page-hero hero-vegas-slider inner-page-hero " id="page-hero">
    <div class="overlay-color"></div>
    <div class="vegas-slider-content" data-vegas-slide-1="{{asset('assets/images/'.$gs->feature_icon)}}"
         data-vegas-slide-2="{{asset('assets/images/'.$gs->best_icon)}}"
         data-vegas-slide-3="{{asset('assets/images/'.$gs->trending_icon)}}">
      <div class="container">
        <div class="row">
          <div class="col-12 hero-text-area ">
            <h1 class="hero-title  wow fadeInUp" data-wow-delay=".2s">{{ $langg->lang20 }} </h1>
            <nav aria-label="breadcrumb ">
              <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
                <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('front.index',$sign) }}"><i
                      class="fas fa-home icon "></i>{{ $langg->lang17 }}</a></li>
                <li class="breadcrumb-item active">{{ $langg->lang20 }} </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End inner Page hero-->
    <!-- Start contact-us -->
@include('includes.form')

@stop