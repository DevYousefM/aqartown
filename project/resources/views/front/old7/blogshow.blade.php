
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
			<div class="page-title" style="background:linear-gradient(#21459799, #21459799), url({{asset('assets/images/'.$gs->hot_icon)}});" data-overlay="5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">@if($langg->rtl == 1)
                                    {{$blog->title_ar}}
                                @else
                                    {{$blog->title}}
                                @endif</li>
								</ol>
								<h2 class="breadcrumb-title">@if($langg->rtl == 1)
                                    {{$blog->title_ar}}
                                @else
                                    {{$blog->title}}
                                @endif -<span onclick="window.location.href='{{ route('front.index',$sign) }}'" style="cursor: pointer;"> {{ $langg->lang17 }}</span>
							</div>
							
						</div>
					</div>
				</div>
			</div>
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