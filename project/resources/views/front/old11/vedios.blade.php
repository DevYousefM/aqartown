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


            <!-- =====slider home ===== -->
        <!-- Main Slider -->
        <section class="breadcrumb-area" style="background-image: url({{asset('assets/images/'.$gs->trending_icon)}});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content clearfix">
                            <div class="title float-right">
                               <h2>{{ $langg->lang221 }} </h2>
                            </div>
                            <div class="breadcrumb-menu float-left">
                                <ul class="clearfix">
                                    <li><a href="{{route('front.index',$sign)}}">{{ $langg->lang17 }}</a></li>
                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                    <li class="active">{{ $langg->lang221 }} </li>
                                </ul>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
     

        <!--Start About Area-->
        <section class="gallery-section">
            <div class="container">
    
                <div class="sortable-masonry">
                    <div class="items-container row">
                        @foreach($videos as $video)
                        <div class="gallery-item all masonry-item loft single-home col-lg-4 col-md-4 col-sm-12">
                            <div class="image-box">
    
                               {{-- <iframe src="https://www.youtube.com/embed/pKF_doN3Tz8" frameborder="0" style="width: 100%;     border-radius: 15px;
                                            height: 210px;
                                        box-shadow: 0 0 27px rgba(0, 0, 0, 0.5);" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
    --}}  {!!$video->link!!}
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
    
    
    
            </div>
        </section>
            <!-- end gallery section -->
        
        <!--End About Area-->
   
@stop