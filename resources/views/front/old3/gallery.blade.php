@extends('layouts.front')

@section('title')
    {{ $langg->lang221 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/smilehouse/css/lightgallery.css"') }}">
@stop





@section('content')


    <!--============= Start breadvroumb =============-->

    <div class="breadvroumb_area" style="background-image: url({{ asset('public/assets/images/' . $gs->trending_icon) }});">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1> {{ $langg->lang221 }}</h1>
                    <div class="breadcroumb_link">
                        <a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }} </a>/ {{ $langg->lang221 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= End breadvroumb =============-->

    <!--============= Start gallery =============-->
    <div class="gallery_area">
        <div class="container products-page">
            <div class="sec-title centered">
                <h2>{{ $langg->lang221 }}</h2>
                <div class="separator"></div>
            </div>
            <div class="row">
                <div class="filter-btns col">
                    <ul class="isotope_menu">


                        <button type="button" data-mixitup-control data-filter="all">{{ $langg->lang4 }}</button>
                        @foreach ($galleries as $key => $data)
                            <button type="button" data-mixitup-control data-filter=".a{{ $data->id }}">
                                @if ($langg->rtl == 1)
                                    {{ $data->name_ar }}
                                @else
                                    {{ $data->country_name }}
                                @endif
                            </button>
                        @endforeach
                    </ul>

                </div>
            </div>


            <div class="img-container">
                <div class="row">



                    @foreach ($images as $key => $data)
                        <div class="col-md-4 mix a{{ $data->country_id }}">
                            <a href="{{ asset('public/assets/images/gallery/' . $data->photo) }}"
                                class="img_popup single_gallery ">
                                <div class="gallery_img"
                                    style="background-image: url({{ asset('public/assets/images/gallery/' . $data->photo) }});">
                                    <div class="gallery_hover_content">
                                        <i class="far fa-dot-circle"></i><!--
                                    <h5>غرفة عمليات</h5>
                                    <span>مرافق مجانية ، رعاية المرضى</span>-->
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


    <!--============ End gallery ============-->

@stop
