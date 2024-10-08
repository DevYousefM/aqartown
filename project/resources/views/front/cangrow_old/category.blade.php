
    @extends('layouts.front')

@section('title')
    @if(!empty($childcat))
        @if($langg->rtl == 1)
           {{ $childcat->name_ar }} - {{$gs->title_ar}}

        @else
           {{ $childcat->name }} - {{$gs->title}}

        @endif

    @elseif(!empty($subcat))
        @if($langg->rtl == 1)
          {{ $subcat->name_ar }} - {{$gs->title_ar}}

        @else
            {{ $subcat->name }} - {{$gs->title}}

        @endif

    @elseif(!empty($cat))

        @if($langg->rtl == 1)
            {{ $cat->name_ar }} - {{$gs->title_ar}}

        @else
            {{ $cat->name }} - {{$gs->title}}

        @endif
    @endif

@stop

@section('gsearch')


    @if (!empty($cat) && empty($subcat) && empty($childcat))
        @if(isset($tool->category_analytics ))

            {!! $tool->category_analytics !!}


        @endif

    @endif



    @if (!empty($subcat) && !empty($cat) && empty($childcat))
        @if(isset($tool->subcategory_analytics ))

            {!! $tool->subcategory_analytics !!}


        @endif

    @endif




    @if (!empty($childcat)&& !empty($subcat) && !empty($cat))
        @if(isset($tool->childcategory_analytics ))

            {!! $tool->childcategory_analytics !!}


        @endif

    @endif


@stop

@section('content')

    
@php 




$ps = App\Models\Pagesetting::find(1);


 @endphp 
      <main class="main page page__service">
         <div class="page__header container">
            <div class="row">
               <div class="col-12">
                  <h1 class="page__title text-center text-uppercase" data-aos="fade-up">@if(!empty($childcat))
                        @if($langg->rtl == 1)
                             {{ $childcat->name_ar }}

                        @else
                            {{ $childcat->name }}

                        @endif

                    @elseif(!empty($subcat))
                        @if($langg->rtl == 1)
                          {{ $subcat->name_ar }}

                        @else
                           {{ $subcat->name }}

                        @endif

                    @elseif(!empty($cat))

                        @if($langg->rtl == 1)
                           {{ $cat->name_ar }}

                        @else
                            {{ $cat->name }}

                        @endif
                    @endif</h1>
                  <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="300">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           <a href="{{route('front.index',$sign)}}">{{ $langg->lang17 }}</a>
                        </li>
                      <li class="breadcrumb-item @if (empty($subcat))active @endif " aria-current="page">       @if (empty($subcat))
                           @if($langg->rtl == 1)
                                        {{ $cat->name_ar }}
                                @else

                                        {{ $cat->name }}
                                @endif
                             
                          @else
                            @if($langg->rtl == 1)
                                <a href="{{ route('front.category',['category' => $cat->slug_ar, 'lang' => $sign]) }}">
                                    {{ $cat->name_ar }}</a>
                            @else
                                <a href="{{ route('front.category',['category' => $cat->slug, 'lang' => $sign]) }}">
                                    {{ $cat->name }}</a>
                            @endif

                            @endif
                  </li>
                  @if (!empty($subcat))
                                <li class="breadcrumb-item @if (empty($childcat))active @endif " >
                                    @if (empty($childcat))
                                        @if($langg->rtl == 1)
                                            {{ $subcat->name_ar }}
                                        @else

                                            {{ $subcat->name }}
                                        @endif

                                    @else
                                        @if($langg->rtl == 1)
                                            <a href="{{ route('front.category',['category' => $cat->slug_ar, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}">
                                                {{ $subcat->name_ar }}</a>
                                        @else
                                            <a href="{{ route('front.category',['category' => $cat->slug, 'subcategory' => $subcat->slug_ar, 'lang' => $sign]) }}">
                                                {{ $subcat->name }}</a>
                                        @endif

                                    @endif

                                </li>
                            @endif

                     </ol>
                  </nav>
               </div>
            </div>
         </div>
         <div class="wrap-header-illustration" data-aos="fade" data-aos-delay="500">
            <h2 class="page-title-above-illustration text-center">@if(!empty($childcat))
                        @if($langg->rtl == 1)
                             {{ $childcat->name_ar }}

                        @else
                            {{ $childcat->name }}

                        @endif

                    @elseif(!empty($subcat))
                        @if($langg->rtl == 1)
                          {{ $subcat->name_ar }}

                        @else
                           {{ $subcat->name }}

                        @endif

                    @elseif(!empty($cat))

                        @if($langg->rtl == 1)
                           {{ $cat->name_ar }}

                        @else
                            {{ $cat->name }}

                        @endif
                    @endif
            </h2>
            <div class="col-12">
						<div class="w-100 pt-180 pb-180 page-title-wrap text-center black-layer opc5 position-relative">
                  			 <img src="{{asset('assets/images/'.$gs->top_icon)}}" alt="{{ $langg->lang16 }}">  
                  
              		 	 </div><!-- Page Title Wrap -->
					</div>
         </div>
         <section class="pageService__items text-center">
            <div class="container">
               <div class="pageService__items row">

               @foreach ($prods as $key => $productt)
                  <div class="col-12 col-md-6 col-xl-4" data-aos="fade-up" data-aos-delay="{{$key+1}}00">
                     <div class="pageService__item">
                        <div class="pageService__wrap-illustration">
                           <img src="{{ $productt->photo ? filter_var($productt->photo, FILTER_VALIDATE_URL) ? $productt->photo :asset('assets/images/products/'.$productt->photo):asset('assets/images/noimage.png') }}" alt="Planning">
                        </div>
                        <h3 class="pageService__name text-uppercase">@if($langg->rtl == 1)

{{$productt->name_ar}}

@else
{{$productt->name}}

@endif</h3>
                        <p class="pageService__text">@if($langg->rtl == 1)

{!!$productt->details_ar!!}

@else
{!!$productt->details!!}

@endif</p>
                     </div>
                  </div>
                @endforeach

                 


               </div>
            </div>
         </section>
         <section id="appointment" class="appointment container">
            <h2 class="section-title text-uppercase text-center" data-aos="fade-in">{{ $langg->lang8 }}</h2>
            <p class="section-under-title text-center" data-aos="fade-in" data-aos-delay="200">{{ $langg->lang53 }}</p>
            <div class="row">
               <div class="col-lg-6">
                  <div class="appointment__wrapIllustration position-relative" data-aos="fade-down">
                     <img class="appointment__illustration position-relative"
                        src="{{asset('assets/images/'.$gs->discount_icon)}}" alt="Illustration">
                     <img class="appointment__arrow position-absolute" src="{{asset('assets/cangrow/images/svg/appointment-arrow.svg')}}"
                        alt="Arrow">
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