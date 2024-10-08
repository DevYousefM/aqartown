
@extends('layouts.front')

@section('gsearch')



    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{url('/item',$blog->slug)}}"
      },
      "headline": "{{$blog->title}}",
      "image":"{{filter_var($blog->photo, FILTER_VALIDATE_URL) ?$blog->photo:asset('assets/images/blogs/'.$blog->photo)}}",


      "datePublished": "{{$blog->created_at}}",
      "views" :  "{{$blog->views}}",
      "category" : "{{$blog->category->name}}",
      "author": {
        "@type": "Person",
        "name": "{{$blog->author}}"
      }

    }
    </script>



@stop

@section('title')
    @if($langg->rtl == 1)
        {{strlen($blog->title_ar) > 50 ? substr($blog->title_ar,0,50)."...":$blog->title_ar}}
    @else
        {{strlen($blog->title) > 50 ? substr($blog->title,0,50)."...":$blog->title}}
    @endif - {{ $langg->lang222 }} -
    @if($langg->rtl == 1 )
        {{$gs->title_ar}}
    @else
        {{$gs->title}}
    @endif
@stop

@section('css')
<link href="{{asset('assets/canbest/css/plugins/bootstrap.min.css')}}" rel="stylesheet">
@stop

@section('content')

@php 




$ps = App\Models\Pagesetting::find(1);


 @endphp     
        

			<!-- ============================ Page Title Start================================== -->
            <section class="breadcrumb-section" style="background-image: url({{asset('assets/images/'.$gs->hot_icon)}});">
            <div class="container">
                <div class="breadcrumb-text">
                    <h1>@if($langg->rtl == 1)
                                    {{$blog->title_ar}}
                                @else
                                    {{$blog->title}}
                                @endif </h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li>@if($langg->rtl == 1)
                                    {{$blog->title_ar}}
                                @else
                                    {{$blog->title}}
                                @endif </li>
                    <li><a href="{{ route('front.index',$sign) }}">{{$langg->lang17}}</a></li>
                </ul>
                <span class="btg-text">Absen</span>
            </div>

        </section>
 
			<!-- ============================ Page Title End ================================== -->
				<!-- ============================ Agency List Start ================================== -->
				<div class="service_details">
					<div class="container">
						   <div class="image-layer">
			
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="service_details_wraper">
									<img src="{{ asset('assets/images/blogs/'.$blog->photo) }}" alt="">
									<div class="text-p">
										<p> @if($langg->rtl == 1)
                                                    {{ $blog->title_ar}}
                                                @else
                                                    {{ $blog->title}}
                                                @endif
										</p>
			
									</div>
									<p>
									@if($langg->rtl == 1)
                                                {!! $blog->details_ar !!}
                                            @else
                                                {!! $blog->details !!}
                                            @endif
									</p>
									</div>
							</div>
						</div>
					</div>
				</div>
			<!-- ============================ Agency List End ================================== -->
		
			<!-- ============================ Agency List Start ================================== -->
			@include('includes.form')
			<!-- ============================ Agency List End ================================== -->
		@stop