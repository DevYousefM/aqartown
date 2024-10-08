
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

        <section class="page-title">
            <div class="outer-container">
                <div class="image">
                    <img src="{{asset('assets/images/'.$gs->best_icon)}}" alt="" />
                </div>
            </div>
        </section>


        <section class="page-breadcrumb">
            <div class="image-layer" style="background-image:url({{asset('assets/naglaa/images/background/1.png')}})"></div>
            <div class="container">
                <div class="clearfix">
                    <div class="pull-left fll">
                        <h2>{{ $langg->lang16 }}</h2>
                    </div>
                    <div class="pull-right">
                        <ul class="breadcrumbs">
                            <li class="left-curves"></li>
                            <li class="right-curves"></li>
                            <li><a href="{{ route('front.index',$sign) }}">{{ $langg->lang17 }}-</a></li>
                            <li>{{ $langg->lang16 }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        @foreach($about_uss as $k=> $about_us)
                     
        <div class="home-about-section aos-init aos-animate" id="about-section" data-aos="zoom-in">

            <div class="first-section container">

                <div class="img-div aos-init aos-animate" data-aos="fade-right" data-aos-duration="2000">
                    <img src="{{asset('assets/images/brands/'.$about_us->photo)}}" alt="img">
                </div>
                <div class="ceo aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
                    <div class="text">
                        <div class="heading">
                            <p>
                            @if($langg->rtl == 1)

{{ $about_us->name_ar }}
@else

{{ $about_us->name }}
@endif
                            </p>
                        </div>
                        <div class="body">
                            <p>
                            @if($langg->rtl == 1)

{!! $about_us->meta_description_ar !!}
@else

{!! $about_us->meta_description !!}
@endif 
                            </p>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
       
      @endforeach

        @include('includes.form')
        
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