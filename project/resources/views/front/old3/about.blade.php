

        @extends('layouts.front')

@section('title')
    {{ $langg->lang16 }} -
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
    <!--============= Start breadvroumb =============-->

    <div class="breadvroumb_area" style="background-image: url({{asset('assets/images/'.$gs->best_icon)}});">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1>{{ $langg->lang16 }}</h1>
                    <div class="breadcroumb_link">
                        <a href="{{ route('front.index',$sign) }}">{{ $langg->lang17 }} </a>/ {{ $langg->lang16 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= End breadvroumb =============-->
    <!--=============start about-us =============-->
    <div class="about_page">
        <div class="container">
               <div class="image-layer">

            </div>
         <div class="sec-title centered">
                <h2>{{ $langg->lang39 }}</h2>
                <div class="separator"></div>
            </div>
              
            @foreach($about_uss as $k=> $about_us)
                    @if($k  %2) 
                    <div class="row">



<div class="col-lg-6 col-md-6 col-sm-12">
    <div class="about_content">
        <p> @if($langg->rtl == 1)

            {{ $about_us->name_ar }}
            @else

            {{ $about_us->name }}
            @endif</p>

                            </div>
                            <div class="text-p">

                                <p>
                                @if($langg->rtl == 1)

            {!! $about_us->meta_description_ar !!}
            @else

            {!! $about_us->meta_description !!}
            @endif</p>

    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12">
<div class="box-img">
                    <img src="{{asset('assets/images/brands/'.$about_us->photo)}}" alt="">

</div>
</div>
</div>
      @else
 <div class="row">



                <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="box-img">
                                     <img src="{{asset('assets/images/brands/'.$about_us->photo)}}" alt="">

                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="about_content">
                        <p> @if($langg->rtl == 1)

                            {{ $about_us->name_ar }}
                            @else

                            {{ $about_us->name }}
                            @endif</p>

                                                </div>
                                                <div class="text-p">

                                                    <p>
                                                    @if($langg->rtl == 1)

                            {!! $about_us->meta_description_ar !!}
                            @else

                            {!! $about_us->meta_description !!}
                            @endif </p>

                    </div>
                </div>

            </div>
      

        @endif
      @endforeach

            </div>
        </div>
    <!--=============End about-us =============-->
@stop