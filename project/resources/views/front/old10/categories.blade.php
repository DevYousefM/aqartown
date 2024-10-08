
@extends('layouts.front')

@section('title')
  {{ $langg->lang11 }}  -
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

  <section class="page-title" style="background-image:url({{asset('assets/images/'.$gs->best_icon)}});">
    <div class="auto-container">
      <h1>{{ $langg->lang11 }}  </h1>

      <ul class="bread-crumb">
        <li><a href="{{ route('front.index',$sign) }}">{{ $langg->lang17 }}</a></li>
        <li><a href="#">{{ $langg->lang11 }} </a></li>
      </ul>

    </div>

    <!--Go Down Button-->
    <div class="go-down">
      <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span></div>
    </div>

  </section>


  <!-- category section -->
  <div class="categories-section">
    <div class="line-up"></div>
    <div class="section-heading">
      <p>
        {{ $langg->lang220 }}
      </p>
    </div>
    <div class="section-body">
      <ul class="main-ul">


        @foreach($categories as $cat)
        <li data-aos="zoom-in" data-aos-duration="1000">
          <a href="@if($langg->rtl == 1)
          {{ route('front.category',['category' => $cat->slug_ar, 'lang' => $sign]) }}

          @else
          {{ route('front.category',['category' => $cat->slug, 'lang' => $sign]) }}

          @endif" class="product-card">
            <div class="img-div lazy-div">
              <img class="lazy" data-src="{{asset('assets/images/categories/'.$cat->photo)}}" alt="png">
              <div class="next-lazy-img"></div>
            </div>
            <div class="title">
              <p>
                @if($langg->rtl == 1)

                  {{ $cat->name_ar }}
                @else

                  {{ $cat->name }}
                @endif
                </p>
            </div>
          </a>
        </li>
        @endforeach


     
      </ul>
    </div>
  </div>
  <!-- ./category section -->

  @include('includes.form')

  @stop