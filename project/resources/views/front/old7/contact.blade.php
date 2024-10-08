@extends('layouts.front')

@section('title')
{{ $langg->lang220 }}  -
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
  <div class="page-title" style="background:linear-gradient(#21459799, #21459799), url({{asset('assets/images/'.$gs->discount_icon)}});" data-overlay="5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				
				<div class="breadcrumbs-wrap">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">{{ $langg->lang220 }}</li>
					</ol>
					<h2 class="breadcrumb-title">{{ $langg->lang220 }} -<span onclick="window.location.href='{{ route('front.index',$sign) }}'" style="cursor: pointer;"> {{ $langg->lang17 }}</span>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Agency List Start ================================== -->
			<section class="pt-0">
				<div class="container">
					<div class="row align-items-center pretio_top">
						
						<div class="col-lg-6 col-md-4 col-sm-12">
							<div class="contact-box">
								<i class="ti-mobile theme-cl"></i>
								<h4>{{ $langg->lang38 }}</h4>

                                <a href="tel:{{$ps->phone}}"><span>{{$ps->phone}}</span></a>
							</div>
						</div>
						
					
						
						<div class="col-lg-6 col-md-4 col-sm-12">
							<div class="contact-box">
								<i class="ti-email theme-cl"></i>
								<h4>{{ $langg->lang39 }}</h4>
								<a href="mailto:{{$ps->email}}"><span>{{$ps->email}}</span></a>

                            </div>
						</div>
						
					</div>
					
					<!-- row Start -->
					<div class="row">
					<div class="col-lg-8 col-md-7">
						<div class="property_block_wrap">
							
							<div class="property_block_wrap_header">
								<h4 class="property_block_title">{{ $langg->lang53 }}</h4>
							</div>
                <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="contact_form2">
                    {{csrf_field()}}
                      <div class="form-group w-100">
                        <div class="response w-100"></div>
                      </div>
							<div class="block-body">
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="form-group">
											<label>{{ $langg->lang47 }}</label>
											<input type="text" required name="name" class="form-control simple fname">
										</div>
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="form-group">
											<label>{{ $langg->lang49 }}</label>
											<input type="email" required name="email" class="form-control simple email">
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label>{{ $langg->lang48 }}</label>
									<input type="text" required name="phone" class="form-control simple">
								</div>
								
								<div class="form-group">
									<label>{{ $langg->lang50 }}</label>
									<textarea name="text" required class="form-control simple"></textarea>
								</div>
								@if($gs->is_capcha == 1)

                    <ul class="captcha-area">
                        <li>
                            <p><img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>

                        </li>
                        <li>
                            <input name="codes" type="text" class="input-field" placeholder="{{ $langg->lang51 }}" required="">

                        </li>
                    </ul>

                    @endif 
	
                    <input type="hidden" name="to" value="{{ $ps->contact_email }}">
								<div class="form-group">
									<button class="btn btn-theme" type="submit">{{ $langg->lang52 }}</button>
								</div>
							</div>
                            </form>
						</div>
										
					</div>
					
					<div class="col-lg-4 col-md-5">
                    {!! $ps->map !!}												  

					</div>
					
				</div>
				<!-- /row -->		
				</div>	
			</section>
			<!-- ============================ Agency List End ================================== -->
		
            
         @stop