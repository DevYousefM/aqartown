@extends('layouts.front')

@section('title')
{{$langg->lang13}}-
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
									<li class="breadcrumb-item active" aria-current="page">{{$langg->lang13}}</li>
								</ol>
								<h2 class="breadcrumb-title">{{$langg->lang13}} -<span onclick="window.location.href='{{ route('front.index',$sign) }}'" style="cursor: pointer;"> {{$langg->lang17}}</span>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Agency List Start ================================== -->
			<div class="home-centers-section">


				<div class="section-wrapper">
					<div class="index-tit">
						<h4><b>{{ $langg->lang7 }}</b></h4>
					</div>
					<div class="section-body">
						<ul class="main-section-ul">

						@foreach($blogs as $blogg)
							<li>
								<a href="{{route('front.blogshow',['id' => $blogg->slug ,'lang' => $sign ])}}">
									<div class="img-div">
										<img src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}" alt="img">
									</div>
									<div class="body">
										<div class="name">
											<i class="linearicons-apartment"></i>
											<span>
											@if($langg->rtl == 1)
                                                            {{strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar,0,50)."...":$blogg->title_ar}}
                                                        @else
                                                            {{strlen($blogg->title) > 50 ? substr($blogg->title,0,50)."...":$blogg->title}}
                                                        @endif
											</span>
											<br>
											<p>
											@if($langg->rtl == 1)
                                                            {{substr(strip_tags($blogg->details_ar),0,120)}}
                                                        @else
                                                            {{substr(strip_tags($blogg->details),0,120)}}
                                                        @endif
											</p>
										</div>
										<div class="read-more">
											<span>
											{{ $langg->lang6 }}
											</span>
											<i class="linearicons-chevron-left"></i>
										</div>
									</div>
								</a>
							</li>
							@endforeach
						
						</ul>
					</div>
				</div>
			</div>
			<!-- ============================ Agency List End ================================== -->
			
        	  <!-- Services Section -->
		  <div class="clinet sections">
			<div class="container">
				<div class="index-tit">
					<h4><b>{{ $langg->lang41 }}</b></h4>
				</div>
			
				<div class="owl-carousel owl-theme" id="clinet">
																	
				@foreach($images as $partner)		
							 	<div class="item">
								<img src="{{asset('assets/images/ads/'.$partner->photo )}}" alt="">
							</div>
							@endforeach
								
						
											</div>
			</div>
	 </div>
	@include('includes.form')
		<!-- ============================ Agency List End ================================== -->
	@stop