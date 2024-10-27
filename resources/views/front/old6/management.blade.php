@extends('layouts.front')

@section('title')
    {{ $langg->lang13 }} -
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

    <section class="breadcrumb-section" style="background-image: url({{ asset('public/assets/images/' . $gs->new_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>{{ $langg->lang13 }} </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li>{{ $langg->lang13 }} </li>
                <li><a href="{{ route('front.index', $sign) }}"> {{ $langg->lang17 }}</a></li>
            </ul>
            <span class="btg-text">ArabsLab</span>
        </div>

    </section>




    <section class="service-details">
        <div class="container">
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 content-side aos-init aos-animate" data-aos="zoom-in-left"
                    data-aos-duration="1500">
                    <div class="service-details-content">
                        <div class="content-one">
                            <!-- <figure class="image-box"><img src="images/events/1.jpg" alt=""></figure> -->
                            <div class="text">


                                @if ($langg->rtl == 1)
                                    {!! $gs->management_ar !!}
                                @else
                                    {!! $gs->management !!}
                                @endif


                            </div>


                        </div>




                    </div>
                </div>
            </div>
        </div>
    </section>



@stop
