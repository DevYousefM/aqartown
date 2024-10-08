@extends('layouts.front')

@section('title')
{{ $langg->lang223 }} -
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

    <div class="page-banner-area" style="background-image:url({{asset('assets/images/'.$gs->new_icon)}})">
        <div class="container">
            <div class="page-banner-content">
                <h2>{{ $langg->lang223 }}</h2>
                <ul class="pages-list">
                    <li><a href="{{route('front.index',$sign)}}">{{ $langg->lang17 }}</a></li>
                    <i class="fad fa-chevron-right"></i>
                    <li>{{ $langg->lang223 }}</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="faq-area ptb-100">
        <div class="container">
            <div class="section_title">
                <h2><span>{{ $langg->lang250 }}</span></h2>
                <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy. </p> -->
                <div class="divider_effect_section"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-form">
                        <form  action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST">

                        {{csrf_field()}}
						<div class="form-group w-100">
							<div class="response w-100"></div>
						</div>
                    
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="{{ $langg->lang47 }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required
                                            data-error="Please enter your email" placeholder="{{ $langg->lang49 }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" required
                                            data-error="Please enter your number" class="form-control" placeholder="{{ $langg->lang48 }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" id="subject" class="form-control" required
                                            data-error="Please enter your subject" placeholder="Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="text" class="form-control" id="message" cols="30" rows="5" required
                                            data-error="Write your message" placeholder="{{ $langg->lang50 }}"></textarea>
                                        <div class="help-block with-errors"></div>
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

<input type="hidden" name="to" value="{{ $ps->contact_email }}">
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">{{ $langg->lang52 }}</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="faq-accordion col-md-6">
                    <div class="accordion">

                    @foreach($faqs as $fq)
                        <div class="accordion-item">
                            <div class="accordion-title active">
                                <i class='bx bx-plus'></i>
                                {{$langg->rtl == 1 ? $fq->title_ar  : $fq->title}}
                            </div>
                            <div class="accordion-content show">
                                <p>@if($langg->rtl == 1)   {!! $fq->details_ar !!}  @else 
              {!! $fq->details !!}
              @endif  </p>
                            </div>
                        </div>
                        @endforeach

                        


                    </div>
                </div>
            </div>
           
        </div>
    </section>

@stop

        
        @section('js')
        
        <script>
        
               $(document).on('submit','#email-form',function(e){
               e.preventDefault();
               $('.gocover').show();
               $('.submit-btn').prop('disabled',true);
               var name = $('.fname').val();
        
               var email = $('.email').val();
        
               if(name == '' || email == '') {
               $('#email-form .response').html('<div class="failed alert alert-warning">Please fill the required fields.</div>');
               $('button.submit-btn').prop('disabled',false);
               return false;
               }
        
               $.ajax({
               method:"POST",
               url:$(this).prop('action'),
               data:new FormData(this),
               contentType: false,
               cache: false,
               processData: false,
               beforeSend:function(){
               $('#email-form .response').html('<div class="text-info"><img src="{{asset('assets/images/preloader.gif')}}"> Loading...</div>');
                   console.log(1);
               },
               success:function(data)
               {
                   console.log(2);
               if ((data.errors)) {
                   console.log(3);
               $('.alert-success').hide();
               $('.alert-danger').show();
               $('#email-form .response').html('');
               for(var error in data.errors)
               {
                   console.log(4);
               $('#email-form .response').append('<li>'+ data.errors[error] +'</li>')
               }
               $('#email-form input[type=text], #email-form input[type=email], #email-form textarea').eq(0).focus();
               $('#email-form .refresh_code').trigger('click');
        
               }
               else
               {
                   console.log(5);
               $('.alert-danger').hide();
               $('.alert-success').show();
               $('#email-form .response').html(data);
               $('#email-form input[type=text], #email-form input[type=email], #email-form textarea').eq(0).focus();
               $('#email-form input[type=text], #email-form input[type=email], #email-form textarea').val('');
               $('#email-form .refresh_code').trigger('click');
        
               }
                   console.log(6);
               $('.gocover').hide();
               $('button.submit-btn').prop('disabled',false);
               }
        
               });
        
               });
        
        </script>
        @stop