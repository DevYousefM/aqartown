@extends('layouts.front')

@section('title')
    {{ $langg->lang20 }} -
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



    <section class="breadcrumb-section" style="background-image: url({{ asset('assets/images/' . $gs->big_icon) }});">
        <div class="container">
            <div class="breadcrumb-text">
                <h1> {{ $langg->lang20 }}
                </h1>
            </div>
            <ul class="breadcrumb-nav">
                <li> {{ $langg->lang20 }}
                </li>
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

                            @foreach ($jobs as $k => $data)
                                <div class="text @if ($k % 2) bg-#f7fcfe @endif "
                                    @if ($k % 2) style="background-color: #f7fcfe;padding: 30px;" @endif>
                                    <h2>
                                        @if ($langg->rtl == 1)
                                            {{ $data->title_ar }}
                                        @else
                                            {{ $data->title }}
                                        @endif
                                    </h2>
                                    <p>
                                        @if ($langg->rtl == 1)
                                            {{ $data->desc_ar }}
                                        @else
                                            {{ $data->desc }}
                                        @endif
                                    </p>


                                    <div class="buttons">
                                        <a href="{{ $data->facebook }}">
                                            <i class="feather icon-external-link"></i>
                                            <span>
                                                {{ $langg->lang9 }}
                                            </span>
                                        </a>
                                    </div>

                                </div>
                                <br>
                            @endforeach

                        </div>




                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
