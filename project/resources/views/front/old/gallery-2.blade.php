@extends('layouts.front')

@section('title')

    {{ $langg->lang221 }}


@stop

@section('content')

    <section>
        <div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('assets/images/' . $gs->trending_icon) }});">
            </div>
            <div class="container">
                <div class="page-title-inner d-inline-block">
                    <h1 class="mb-0">{{ $langg->lang221 }}</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}"
                                title="">{{ $langg->lang17 }}</a></li>
                        <li class="breadcrumb-item active">{{ $langg->lang221 }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- Page Title Wrap -->
    </section>
    <section>
        <div class="w-100 pt-140 pb-120 position-relative">
            <div class="container">
                <div class="gallery-wrap w-100">
                    <div class="row masonry">

                        @foreach ($galleries as $gallery)
                            <div class="col-md-6 col-sm-6 col-lg-4 fltr-itm">
                                <div class="gallery-item2 text-center mb-30 w-100 positi    on-relative overflow-hidden">
                                    <img class="img-fluid w-100" style="width: 370px;height: 380px"
                                        src="{{ asset('assets/images/banners/' . $gallery->photo) }}"
                                        alt="Portfolio Image 1">
                                    <div class="gallery-info2 position-absolute">
                                        <h4 class="mb-0">
                                            @if ($langg->rtl == 1)
                                                {{ $gallery->title_ar }}
                                            @else
                                                {{ $gallery->title }}
                                            @endif
                                        </h4>
                                        <span class="d-block">
                                            @if ($langg->rtl == 1)
                                                {{ $gallery->subtitle_ar }}
                                            @else
                                                {{ $gallery->subtitle }}
                                            @endif
                                        </span>
                                        <a href="{{ asset('assets/images/banners/' . $gallery->photo) }}"
                                            data-fancybox="gallery" title=""><i class="flaticon-loupe"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div><!-- Gallery Wrap -->
                <div class="pagination-wrap d-inline-block mt-20 w-100">

                    {!! $galleries->links() !!}
                    {{-- <ul class="pagination justify-content-start align-items-center mb-0 list-unstyled">


                                 <li class="page-item prev"><a class="page-link" href="javascript:void(0);" title=""><i class="fas fa-angle-double-left"></i></a></li>
                                 <li class="page-item"><a class="page-link" href="javascript:void(0);">01</a></li>
                                 <li class="page-item active"><span class="page-link">02</span></li>
                                 <li class="page-item"><a class="page-link" href="javascript:void(0);">03</a></li>
                                 <li class="page-item"><a class="page-link" href="javascript:void(0);">04</a></li>
                                 <li class="page-item dot">..........</li>
                                 <li class="page-item"><a class="page-link" href="javascript:void(0);">08</a></li>
                                 <li class="page-item next"><a class="page-link" href="javascript:void(0);"><i class="fas fa-angle-double-right"></i></a></li>


                             </ul> --}}
                </div><!-- Pagination Wrap -->
            </div>

        </div>
        {{--  <div class="view-all mt-40 text-center w-100">
                        <a class="thm-btn wid-btn lft-icon fill-btn" href="javascript:void(0);" title=""><i class="fas fa-spinner"></i> Load More<span></span></a>
                    </div> --}}
        </div>
    </section>
@stop
