@extends('layouts.front')

@section('title')
    {{ $langg->lang20 }} -
    @if($langg->rtl == 1 )
        {{$gs->title_ar}}
    @else
        {{$gs->title}}
    @endif
@stop

@section('content')

		<main class="main page page__contact">
			<div class="page__header container">
				<div class="row">
					<div class="col-12">
						<h1 class="page__title text-center text-uppercase" data-aos="fade-up">{{ $langg->lang20 }}</h1>
						<nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="300">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="{{ route('front.index',$sign) }}">{{ $langg->lang17 }}</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">{{ $langg->lang20 }}</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<section id="contact" class="contact container">
				<div class="row d-flex">
					<div class="col-md-6 mb-auto mt-auto">
						<div class="contact__list">
							<div class="contact__listItem d-flex">
								<img class="contact__listIcon" src="{{asset('assets/cangrow/images/svg/email.svg')}}" alt="" data-aos="fade"
									data-aos-delay="300" data-aos-offset="0">
								<div class="contact__listWrapLabelLink">
									<h4 class="contact__listLabel" data-aos="fade-left" data-aos-delay="200" data-aos-offset="0">
									{{ $langg->lang49 }}</h4>
									<a class="contact__listIink" href="mailto:{{$ps->email}}" data-aos="fade-in"
										data-aos-delay="600" data-aos-offset="0">{{$ps->email}}</a>
								</div>
							</div>
							<div class="contact__listItem d-flex">
								<img class="contact__listIcon" src="{{asset('assets/cangrow/images/svg/phone.svg')}}" alt="" data-aos="fade"
									data-aos-delay="400" data-aos-offset="0">
								<div class="contact__listWrapLabelLink">
									<h4 class="contact__listLabel" data-aos="fade-left" data-aos-delay="300" data-aos-offset="0">
									{{ $langg->lang48 }}</h4>
									<a class="contact__listIink" href="tel:{{$ps->phone}}" data-aos="fade-in" data-aos-delay="800"
										data-aos-offset="0">{{$ps->phone}}</a>
								</div>
							</div>
							<div class="contact__listItem d-flex">
								<img class="contact__listIcon" src="{{asset('assets/cangrow/images/svg/address.svg')}}" alt="" data-aos="fade"
									data-aos-delay="500" data-aos-offset="0">
								<div class="contact__listWrapLabelLink">
									<h4 class="contact__listLabel" data-aos="fade-in" data-aos-delay="400" data-aos-offset="0">
									{{ $langg->lang6 }}</h4>
									<address class="contact__listIink contact__listIink-address" data-aos="fade-in"
										data-aos-delay="1000" data-aos-offset="0">{{$langg->rtl == 1 ? $ps->street_ar  : $ps->street }}
									</address>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="wrap-map" data-aos="fade-left" data-aos-delay="600">
						
							<div > {!! $ps->map !!} </div>
						</div>
					</div>
				</div>
			</section>
			<section id="appointment" class="appointment container">
				<h2 class="section-title text-uppercase text-center" data-aos="fade-in">{{ $langg->lang8 }}</h2>
				<p class="section-under-title text-center" data-aos="fade-in" data-aos-delay="200">{{ $langg->lang53 }}</p>
				<div class="row">
					<div class="col-lg-6">
						<div class="appointment__wrapIllustration position-relative" data-aos="fade-down">
							<img class="appointment__illustration position-relative" src="{{asset('assets/images/'.$gs->discount_icon)}}"
								alt="Illustration">
							<img class="appointment__arrow position-absolute" src="{{asset('assets/cangrow/images/svg/appointment-arrow.svg')}}" alt="Arrow">
						</div>
					</div>
					<div class="col-lg-6">
					<form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" class="appointment__form d-flex flex-wrap position-relative" method="POST" autocomplete="off">

{{csrf_field()}}
						<div class="form-group w-100">
							<div class="response w-100"></div>
						</div>
	<div class="appointment__wrapField aos-init aos-animate" data-aos="fade-right">
		<label class="appointment__label d-block">{{ $langg->lang47 }}</label>
		<input required type="text" name="name" placeholder="Your name" id="first-name" class="appointment__field reset fname w-100">
		<div class="d-flex appointment__notification position-absolute">
			<span class="appointment__required">Required field.</span>
			<span class="appointment__symbols">At least 2 characters.</span>
		</div>
	</div>
	<div class="appointment__wrapField aos-init aos-animate" data-aos="fade-left">
		<label class="appointment__label d-block">{{ $langg->lang48 }}</label>
		<input required id="phone" type="tel" name="phone" placeholder="+__(___)___-__-_" class="appointment__field reset  phone w-100">
		<div class="d-flex appointment__notification position-absolute">
			<span class="appointment__required">Required field.</span>
		</div>
	</div>
	<div class="appointment__wrapField aos-init aos-animate invalid empty" data-aos="fade-right">
		<label class="appointment__label d-block">{{ $langg->lang49 }}</label>
		<input required id="email" type="email" name="email" placeholder="example@gmail.com" class="appointment__field reset  email w-100">
		<div class="d-flex appointment__notification position-absolute">
			<span class="appointment__required">Required field.</span>
			<span class="appointment__symbols">Please enter correct Email</span>
		</div>
	</div>
	<div class="appointment__wrapField aos-init aos-animate empty invalid" data-aos="fade-left">
		<label class="appointment__label d-block">Meeting date</label>
		<input required id="date" type="text" name="date" class="appointment__field reset w-100" placeholder="21.05.2021">
		<div class="d-flex appointment__notification position-absolute">
			<span class="appointment__required">Required field.</span>
		</div>
	</div>
	<div class="appointment__wrapField aos-init aos-animate" data-aos="fade-right">
		<label class="appointment__label d-block">Time</label>
		<input required id="time" type="text" name="time" class="appointment__field reset w-100" placeholder="12:45">
		<div class="d-flex appointment__notification position-absolute">
			<span class="appointment__required">Required field.</span>
		</div>
	</div>
	<div class="appointment__wrapField d-none">
		<label class="appointment__label d-block">Label</label>
		<input type="text" name="invisible" class="appointment__field reset w-100">
	</div>
	<div class="appointment__wrapField appointment__wrapField-wrapTextarea w-100 aos-init aos-animate" data-aos="fade-left">
		<label class="appointment__label d-block">{{ $langg->lang50 }}</label>
		<textarea id="message" name="text" placeholder="Hi" class="appointment__field appointment__field-message contact_message  reset w-100"></textarea>
		<div class="d-flex appointment__notification position-absolute">
			<span class="appointment__required">Required field.</span>
			<span class="appointment__symbols">At least 20 characters.</span>
		</div>
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
	<div class="appointment__wrapButtonText d-flex flex-wrap flex-md-nowrap align-items-center aos-init" data-aos="fade" data-aos-delay="600">
		<button id="appointment-send" type="submit" class="appointment__submit"  >{{ $langg->lang52 }}</button>
		<!-- <p class="appointment__text">By clicking on the button, you consent to
			processing your personal data and agree
			to the <a href="/privacy-policy.html">Privacy Policy</a></p> -->
	</div>
	<input type="hidden" name="to" value="{{ $ps->contact_email }}">
	<div id="textAfterSending" class="appointment__textAfterSending position-absolute align-items-center justify-content-center">
		<p>Message sent.</p>
	</div>
</form>
					</div>
				</div>
			</section>
		</main>
@stop
@section('js')
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;callback=initMap&amp;libraries=&amp;v=weekly" async></script>
	<script>
		function initMap() {
			var uluru = {
				lat: 46.6345791,
				lng: 32.6136564
			};
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 7,
				center: uluru
			});
			var marker = new google.maps.Marker({
				position: uluru,
				map: map
			});
		}
	</script>
	@stop