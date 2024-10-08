
        @extends('layouts.front')

@section('title')
    {{ $langg->lang11 }} -
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



    <div class="page-banner-area" style="background-image:url({{asset('assets/images/'.$gs->top_icon)}})">
        <div class="container">
            <div class="page-banner-content">
                <h2>{{ $langg->lang11 }}</h2>
                <ul class="pages-list">
                    <li><a href="{{ route('front.index',$sign) }}">{{ $langg->lang17 }}</a></li>
                    <i class="fad fa-chevron-right"></i>
                    <li>{{ $langg->lang11 }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="services bg-eef9ff pt-100 pb-70">
        <div class="container">
            <div class="section_title">
                <h2> <span>{{ $langg->lang9 }}</span></h2>
                <p>{{ $langg->lang10 }}</p>
                <div class="divider_effect_section"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 p-0">
                    <h1>{{ $langg->lang14 }}</h1>
                    <p>{{ $langg->lang15 }}</p>
                </div>

                <div class="col-lg-3 imag p-0">
                </div>

                @foreach($categories as $key=>$category)
                <div class="col-lg-3  p-0">
                  <a href="@if($langg->rtl == 1)
                                                {{ route('front.category',['category' => $category->slug_ar, 'lang' => $sign]) }}
                                                  @else
                                            
                                                {{ route('front.category',['category' => $category->slug, 'lang' => $sign]) }}
                                            @endif">
                    <div class="boxmoth boxmoth-1" style="background-image: url({{asset('assets/images/categories/'.$category->photo)}});">
                        <h6>0{{$key+1}}.</h6>
                        <h5>@if($langg->rtl == 1)
                                  
                                  {{ $category->name_ar }}
                          @else
                            
                                  {{ $category->name }}
                          @endif​​</h5>
                        <p>@if($langg->rtl == 1)
                                  
                                  {{ $category->meta_description_ar }}
                          @else
                            
                                  {{ $category->meta_description }}
                          @endif​
                        </p>
                    </div>
                  </a>
                </div>
                @foreach($categories as $key=>$category)


                <div class="col-lg-6 p-0">
                    <div class="back">
                        <span class="elementor-icon-list-text">{{ $langg->lang19 }}</span>
                        <h3><a href="tel:{{$ps->phone}}​">{{$ps->phone}}​</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.form')
@stop