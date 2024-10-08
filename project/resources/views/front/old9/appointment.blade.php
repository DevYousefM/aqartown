@extends('layouts.front')

@section('title')
  {{ $langg->lang223 }}  -
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


          <!-- end header -->
  <section class="page-title" style="background-image:url({{asset('assets/images/'.$gs->big_icon)}});">
    <div class="auto-container">
      <h1>{{ $langg->lang223 }} </h1>

      <ul class="bread-crumb">
        <li><a href="{{ route('front.index',$sign) }}">{{ $langg->lang17 }}</a></li>
        <li><a href="#">{{ $langg->lang223 }} </a></li>
      </ul>

    </div>

    <!--Go Down Button-->
    <div class="go-down">
      <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span>
      </div>
    </div>

  </section>


  @include('includes.form')
 @stop