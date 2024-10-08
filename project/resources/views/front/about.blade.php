@extends('layouts.front')



@section('title')

    {{ $langg->lang16 }} -

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



    <div class="sub-banner pt-90 pb-90">

        <div class="container">

            <div class="col-md-12">

                <div class="text-center text-line">

                    <h1>{{ $langg->lang16 }}</h1>

                    <ul class="text-c">

                        <li>{{ $langg->lang17 }}</li>

                        <li>|</li>

                        <li class="color-t">{{ $langg->lang16 }}</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!--sub-Banner-End-->



    <section class="pt-90 pb-90 about-page">

        <div class="container">

            <div class="row">

                <div class="col-md-6 pt-50">

                    <div class="text-con">



                        <p>

                            @if ($langg->rtl == 1)
                                {!! $gs->management_ar !!}
                            @else
                                {!! $gs->management !!}
                            @endif

                        </p>

                    </div>

                </div>

                <div class="col-md-6 pl-70 pt-50">

                    <div class="min-about pl-40 pb-40">

                        <!-- <span class="po-i-ab">

                                                    <img src="images/ديكورات-واجهات-محلات-خشب-1.jpg" alt="" class="img-fluid">

                                                </span> -->

                        <img src="{{ asset('assets/images/' . $gs->home_about_img2) }}" alt="" class="img-fluid">

                        <!-- <div class="play-s">

                                                    <span class="min-text-line">

                                                        <b>E</b>Stablished<br>

                                                        1984

                                                    </span>

                                                    <button class="play-ab"><i class="fa fa-play"></i></button>

                                                </div> -->

                    </div>

                </div>

            </div>

        </div>

    </section>



@stop
@section('js')
    <script type="text/javascript">
        fbq('track', 'About Us Visit');
    </script>
@endsection
