

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


    <!--============= Start breadvroumb =============-->

    <div class="breadvroumb_area"  style="background-image: url({{asset('assets/images/'.$gs->new_icon)}});">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1>{{ $langg->lang222 }}</h1>
                    <div class="breadcroumb_link">
                        <a href="{{ route('front.index',$sign) }}">{{ $langg->lang17 }} </a>/ {{ $langg->lang222 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= End breadvroumb =============-->

       <!--========== start blogs area ================== -->
    <!-- blog area start -->
    <section class="blog__area"  style="padding-bottom: 20px;">

        <div class="blog-area ptb-100">
            <div class="container">
                <div class="sec-title centered">
                    <h2>{{ $langg->lang7 }}</h2>
                    <div class="separator"></div>
                </div>
                <div class="blog-slider owl-carousel owl-theme">


                @foreach($blogs as $blogg)
                    <div class="blog-card text-center">
                        <a href="{{route('front.blogshow',['id' => $blogg->slug ,'lang' => $sign ])}}">
                            <img src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}" alt="Shape">
                        </a>
                        <div class="b-card-text">
                            <h3><a href="{{route('front.blogshow',['id' => $blogg->slug ,'lang' => $sign ])}}"> @if($langg->rtl == 1)
                                                            {{strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar,0,50)."...":$blogg->title_ar}}
                                                        @else
                                                            {{strlen($blogg->title) > 50 ? substr($blogg->title,0,50)."...":$blogg->title}}
                                                        @endif </a>
                            </h3>
                            <p>  @if($langg->rtl == 1)
                                                            {{substr(strip_tags($blogg->details_ar),0,120)}}
                                                        @else
                                                            {{substr(strip_tags($blogg->details),0,120)}}
                                                        @endif </p>
                            <div class="view-more">
                                <a href="{{route('front.blogshow',['id' => $blogg->slug ,'lang' => $sign ])}}">
                                {{ $langg->lang3 }}
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>

    </section>
    <!-- blog area end -->

    <!--========== End blogs area ================== -->
  @stop