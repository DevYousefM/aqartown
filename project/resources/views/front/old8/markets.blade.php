
@extends('layouts.front')
@section('gsearch')


    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "{{$gs->title}}",
    "url": "{{url('/')}}",
    "potentialAction": {
      "@type": "SearchAction",
      "query-input": "required name=search",
      "target": "{{url('/category/?search={search}')}}"
    }
  }
</script>




    @if(isset($tool->product_analytics ))

        {!! $tool->product_analytics !!}


    @endif




@stop
@section('title')

 
{{ $langg->lang11 }} -
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




        <!-- ============================ Page Title Start================================== -->
        <section class="breadcrumb-section" style="background-image: url({{asset('assets/images/'.$gs->big_icon)}});">
            <div class="container">
                <div class="breadcrumb-text">
                    <h1>{{ $langg->lang11 }}</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li>{{ $langg->lang11 }}</li>
                    <li><a href="{{ route('front.index',$sign) }}">{{ $langg->lang17 }}</a></li>
                </ul>
                <span class="btg-text">Absen</span>
            </div>

        </section>
        <!-- ============================ Page Title End ================================== -->
        <div class="gallery-pgae">
            <!-- start gallery section -->
            <div class="home-gallery-section">

                <div class="gallery-layout-2 container">
                    <div class="home-light-gallery-2 row">


                    @foreach($markets as $solution)
                      <div class="col-sm-6 col-sm-12">
                            <a href="{{ route('front.markets_details',['lang'=>$sign , 'slug' => $solution->slug]) }}" data-aos="zoom-in" data-aos-duration="1500">
                            <img src="{{asset('assets/images/products/'.$solution->hover_photo)}}">
                            <div class="text text-left">
                                <h2> @if($langg->rtl == 1)

{{$solution->name_ar}} 

@else
{{$solution->name}} 

@endif</h2>
                                <p>
                                @if($langg->rtl == 1)

                                {!! $solution->details_ar !!}

                                @else
                                {!! $solution->details !!}

                                @endif 
                        
                                </p>
                                <button onclick="window.location.href='{{ route('front.markets_details',['lang'=>$sign , 'slug' => $solution->slug]) }}'">
                                    <span>
                                    {{ $langg->lang38 }}
                                    </span>
                                </button>

                            </div>
                        </a>
                      </div>
                      @endforeach

                   
                </div>
            </div>
        </div>
        </div>
        <!-- end gallery section -->
@stop