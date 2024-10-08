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
        

            <section>
                <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
                    <div class="fixed-bg" style="background-image: url({{asset('assets/images/'.$gs->top_icon)}});"></div>
                    <div class="container">
                        <div class="page-title-inner d-inline-block">
                            <h1 class="mb-0">{{ $langg->lang11 }} </h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index',$sign)}}" title="">{{ $langg->lang17 }}</a></li>
                                <li class="breadcrumb-item active">{{ $langg->lang11 }} </li>
                            </ol>
                        </div>
                    </div>
                </div><!-- Page Title Wrap -->
            </section>
            <section>
                <div class="w-100 pt-140 pb-120 position-relative">
                    <div class="container">
                        <div class="event-grid-wrap w-100">
                            <div class="row">
                                @foreach($events as $data)
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="event-grid-box mb-30 w-100">
                                        <div class="event-grid-img w-100 overflow-hidden position-relative">
                                            <img class="img-fluid w-100" src="{{ $data->photo ? filter_var($data->photo, FILTER_VALIDATE_URL) ? $data->photo :asset('assets/images/products/'.$data->photo):asset('assets/images/noimage.png') }}" alt="Event Image 1">
                                            <span class="position-absolute"><a class="rounded-circle" href="javascript:void(0);" title=""><i class="fas fa-heart"></i></a></span>
                                            <a class="thm-btn fill-btn"
                                               href="{{ route('front.product', ['slug' => $data->slug , 'lang' => $sign]) }}"
                                               title="">Book Now<span></span></a>

                                        </div>
                                        <div class="event-grid-info w-100">
                                            <h3 class="mb-0"><a   href="{{ route('front.product', ['slug' => $data->slug , 'lang' => $sign]) }}" title="">@if($langg->rtl == 1)

                                                        {{$data->name_ar}}

                                                    @else
                                                        {{$data->name}}

                                                    @endif</a></h3>
                                           @if(!empty($data->date)) <span class="event-date thm-clr d-block">{{$data->date}}</span> @endif
                                            <ul class="event-grid-meta mb-0 list-unstyled d-flex flex-wrap">
                                                @if(!empty($data->time))   <li><i class="far fa-clock"></i>{{$data->time}}</li>@endif
                                                @if(!empty($data->price_from))    <li><i class="fas fa-tags"></i>{{$data->price_from}}</li>@endif
                                            </ul>
                                            @if(!empty($data->location))  <span class="event-loc d-block"><i class="fas fa-map-pin"></i>{{$data->location}}</span>@endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div><!-- Event Grid Wrap -->
                        <div class="pagination-wrap d-inline-block mt-40 text-center w-100">

                            {!! $events->links() !!}
                           {{-- <ul class="pagination justify-content-center align-items-center mb-0 list-unstyled">
                                <li class="page-item prev"><a class="page-link" href="javascript:void(0);" title=""><i class="fas fa-angle-double-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">01</a></li>
                                <li class="page-item active"><span class="page-link">02</span></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">03</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">04</a></li>
                                <li class="page-item dot">..........</li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">08</a></li>
                                <li class="page-item next"><a class="page-link" href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul>--}}
                        </div><!-- Pagination Wrap -->
                    </div>
                </div>
            </section>
@stop