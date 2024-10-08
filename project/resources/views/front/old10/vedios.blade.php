@extends('layouts.front')

@section('title')
    {{ $langg->lang221 }} -
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
    <section class="page-title" style="background-image:url({{asset('assets/images/'.$gs->trending_icon)}});">
        <div class="auto-container">
            <h1>{{ $langg->lang221 }}</h1>

            <ul class="bread-crumb">
                <li><a href="{{route('front.index',$sign)}}">{{ $langg->lang17 }}</a></li>
                <li><a href="#">{{ $langg->lang221 }}</a></li>
            </ul>

        </div>

        <!--Go Down Button-->
        <div class="go-down">
            <div class="curve scroll-to-target" data-target="#bottom-footer"><span class="icon fa fa-arrow-down"></span>
            </div>
        </div>

    </section>

    <!-- end start videos section -->

    <section class="gallery-section">
        <div class="container">

            <div class="sortable-masonry">
                <div class="items-container row">

                    @foreach($videos as $video)
                    <div class="gallery-item all masonry-item loft single-home col-lg-4 col-md-4 col-sm-12">
                        <div class="image-box">
                            {!!$video->link!!}
                          {{--  <iframe src="https://www.youtube.com/embed/pKF_doN3Tz8" frameborder="0" style="width: 100%;     border-radius: 15px;
                                        height: 210px;
                                    box-shadow: 0 0 27px rgba(0, 0, 0, 0.5);"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen=""></iframe>--}}

                        </div>
                    </div>
                    @endforeach



                </div>
            </div>



        </div>
    </section>

    <!-- end start videos section -->

    @include('includes.form')


    @stop