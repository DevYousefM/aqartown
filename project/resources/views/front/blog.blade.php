@extends('layouts.front')



@section('title')

    {{ $langg->lang223 }} -

    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif

@stop

@section('css')

    <link href="{{ asset('assets/canbest/css/plugins/bootstrap.min.css') }}" rel="stylesheet">
@stop

@section('content')

    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp



    <div class="sub-banner pt-90 pb-90">

        <div class="container">

            <div class="col-md-12">

                <div class="text-center text-line">

                    <h1>{{ $langg->lang223 }}</h1>

                    <ul class="text-c">

                        <li>{{ $langg->lang17 }}</li>

                        <li>|</li>

                        <li class="color-t">{{ $langg->lang223 }}</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!--sub-Banner-End-->



    <!-- blog area start -->

    <section class="blog__area">



        <div class="blog-area ptb-100">

            <div class="container">

                <div class="sec-title centered">

                    <h2>{{ $langg->lang223 }} </h2>

                    <div class="separator"></div>

                </div>

                <div class="blog-slider owl-carousel owl-theme">



                    @foreach ($blogs as $blogg)
                        <div class="blog-card text-center">

                            <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">

                                <img src="{{ $blogg->photo ? asset('public/assets/images/blogs/' . $blogg->photo) : asset('public/assets/images/noimage.png') }}"
                                    alt="Shape">

                            </a>

                            <div class="b-card-text">

                                <h3><a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">
                                        @if ($langg->rtl == 1)
                                            {{ $blogg->title_ar }}
                                        @else
                                            {{ $blogg->title }}
                                        @endif
                                    </a>

                                </h3>

                                <p>
                                    @if ($langg->rtl == 1)
                                        {!! strlen($blogg->details_ar) > 260
                                            ? substr(strip_tags($blogg->details_ar), 0, 260) . '...'
                                            : $blogg->details_ar !!}
                                    @else
                                        {!! strlen($blogg->details) > 260 ? substr(strip_tags($blogg->details), 0, 260) . '...' : $blogg->details !!}
                                    @endif

                                </p>

                                <div class="view-more">

                                    <a href="{{ route('front.blogshow', ['id' => $blogg->slug, 'lang' => $sign]) }}">

                                        المزيد

                                        <i class='bx bx-right-arrow-alt'></i>

                                    </a>

                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
    </section>
@stop
@section('js')
    <script type="text/javascript">
        fbq('track', 'News Page Visit');
    </script>
@endsection
