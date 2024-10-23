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
    <link rel="stylesheet" href="{{ asset('assets/Al-Araby/css/lightgallery.css"') }}">
@stop





@section('content')

    <section class="medicen-aboutUs text-center"
        style="background-image: url({{ asset('assets/images/' . $gs->hot_icon) }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6">
                    <img src="./images/logo3.png" alt="">
                </div>
                <div class="col-lg-6">
                    <h3>الفيديوهات</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"> الفيديوهات</li>
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="vedios">

        <div class="container">
            <div class="row">

                @foreach ($videos as $video)
                    <div class="col-lg-3">
                        <!-- <iframe width="100%" height="315" src="https://www.youtube.com/embed/Nt3HmB8OpVM?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe> -->
                        {!! $video->link !!}
                    </div>
                @endforeach
            </div>
        </div>
    </section>






@stop
@section('js')
    <script src="{{ asset('assets/Al-Araby/js/lightgallery.js') }}"></script>
    <script>
        // home gallery section

        if (document.querySelector('.home-light-gallery')) {
            lightGallery(document.querySelector('.home-light-gallery'), {
                thumbnail: true
            });
        }
    </script>

@stop
