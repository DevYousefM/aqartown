@extends('layouts.front')
@section('title')
    @if ($langg->rtl == 1)
        {{ $page->title_ar }}
    @else
        {{ $page->title }}
    @endif
@stop

@section('content')


    <div class="sub-banner pt-90 pb-90" style="background-image: url({{ asset('public/assets/images/' . $gs->new_icon) }});">
        <div class="container">
            <div class="col-md-12">
                <div class="text-center text-line">
                    <h1>
                        @if ($langg->rtl == 1)
                            {{ $page->title_ar }}
                        @else
                            {{ $page->title }}
                        @endif
                    </h1>
                    <ul class="text-c">
                        <li>{{ $langg->lang17 }}</li>
                        <li>|</li>
                        <li class="color-t">
                            @if ($langg->rtl == 1)
                                {{ $page->title_ar }}
                            @else
                                {{ $page->title }}
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <section class="page-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-area-full">

                        @if ($langg->rtl == 1)
                            {!! $page->details_ar !!}
                        @else
                            {!! $page->details !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('js')
    {!! $page->facebook_pixel !!}
@endsection
