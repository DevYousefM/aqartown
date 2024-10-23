@extends('layouts.front')
@section('title')
    {{ $langg->lang11 }} -

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
                    <h1> {{ $langg->lang11 }}</h1>
                    <ul class="text-c">
                        <li>{{ $langg->lang17 }}</li>
                        <li>|</li>
                        <li class="color-t">{{ $langg->lang11 }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--sub-Banner-End-->

    <section id="our-partners" class="our-partners">
        <div class="container">
            <div class="col-lg-12 main-title text-center">
                <h2 class="Font_01">{{ $langg->lang11 }} </h2>
                <p class="Font_01"> {{ $langg->lang53 }}</p>
            </div>
            <div class="col-lg-12 team_slider owl-carousel owl-theme">
                {{-- <div class="item team_member">
                    <a href="latestwork.html"><img class="img-fluid thumb"
                            src="./images/clogo-2019-09-05-12-41-01-ixx34yy8dszpra6fjyzcoaxx-2.jpg"
                            alt="بالم هيلز"></a>
                    <div class="details">
                        <a class="Font_01" href="latestwork.html">بالم هيلز</a>
                    </div>
                </div>
                --}}
                @foreach ($images as $image)
                    <div class="item team_member">
                        <a href="{{ route('front.latestwork', $sign) }}"><img class="img-fluid thumb"
                                src="{{ asset('/assets/images/ads/' . $image->photo) }}"
                                alt="{{ $langg->rtl == 1 ? $image->title_ar : $image->title }} "></a>
                        <div class="details">
                            <a class="Font_01"
                                href="{{ route('front.latestwork', $sign) }}">{{ $langg->rtl == 1 ? $image->title_ar : $image->title }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
@section('js')
    <script type="text/javascript">
        fbq('track', 'Latest Work Page Visit');
    </script>
@endsection
