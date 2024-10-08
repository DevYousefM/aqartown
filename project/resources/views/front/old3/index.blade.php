
@extends('layouts.front')

@section('title')
    @if($langg->rtl == 1)

        {{$gs->title_ar}}

    @else
        {{$gs->title}}

    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{asset('assets/images/'.$gs->logo)}}" />
@stop


@section('content') 

    <!--============= Start swiper =============-->
    <div class="main-slider">
        <div class="swiper-container banner-carousel">

            <div class="swiper-wrapper">

            @foreach($sliders as $slide)
                                         @php
                                        $galss = str_replace(' ', '%20', $slide->photo);
                                        @endphp
                            
                <div class="swiper-slide slide">
                    <img src="{{asset('/assets/images/sliders/'.$galss)}}" alt="">

                    <div class="auto-container">
                        <div class="content">
                        @if(!empty($slide->subtitle_text) || !empty($slide->subtitle_text_ar) )  
                            <h2>
                            {{$langg->rtl == 1 ? $slide->subtitle_text_ar :   $slide->subtitle_text}}

                            </h2>
                            @endif
                            
                            <p>{{$langg->rtl == 1 ? $slide->title_text_ar :   $slide->title_text}}</p>
                            @if(!empty($slide->btn_text) || !empty($slide->btn_text_ar) ) 
                            <div class="btn-box">
                                <a href="{{$slide->link}}" class="theme-btn btn-style-two"><span class="txt">{{$langg->rtl == 1 ? $slide->btn_text_ar :   $slide->btn_text}}</span></a>
                            </div>
                            @endif  
                        </div>
                    </div>
                </div>
                @endforeach 

            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </div>

    <!--============= End swiper =============-->


 

    <!--============= Start about-area =============-->
    <section class="about-area">
        <div class="container">
            <div class="image-layer">

            </div>
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="content-box">
                        <div class="sec-title">
                            <h2>{{ $langg->lang1 }}</h2>
                            <div class="separator style-two"></div>
                        </div>
                        <div class="text">
                            <p>@if($langg->rtl == 1)

{!! $gs->home_about_ar !!}
@else

{!! $gs->home_about !!}
@endif</p>

                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="owl-carousel owl-theme image-column">

                    @foreach($images as $image)
                        <div class="image item">
                            <img src="{{asset('/assets/images/ads/'.$image->photo)}}" alt="">
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="row clearfix" style="
    /* margin-top: -80px; */
    margin-right: 12px;
">

                    @foreach($works->chunk(2) as $chunk)
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-style-one">
                                @foreach($chunk as $serv)
                                    <li><img src="{{asset('/assets/images/gallery/'.$serv->photo)}}" alt="">{{$langg->rtl == 1 ? $serv->name_ar  :$serv->name }}</li>
                                @endforeach   
                                </ul>
                            </div>
                    @endforeach      
                        </div>



        </div>

    </section>
    <!--============= End about-area =============-->

    <!--============= Start department-area =============-->
    <div class="department-section">
        <div class="container">
            <div class="sec-title centered">
                <h2>{{ $langg->lang2 }}</h2>
                <div class="separator"></div>
            </div>
            <div class="row">

            @foreach($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <div class="department-box">
                        <div class="inner-box">
                            <div class="image">
                                <a href="@if($langg->rtl == 1)
                                               {{ route('front.category',['category' => $category->slug_ar, 'lang' => $sign]) }}
                                              
                                            @else
                                              {{ route('front.category',['category' => $category->slug, 'lang' => $sign]) }}
                                                   
                                            @endif">
                                    <img src="{{asset('assets/images/categories/'.$category->photo)}}" alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <h3><i class="fas fa-tooth"></i>@if($langg->rtl == 1)
                                                <a href="{{ route('front.category',['category' => $category->slug_ar, 'lang' => $sign]) }}">
                                                    {{ $category->name_ar }}</a>
                                            @else
                                                <a href="{{ route('front.category',['category' => $category->slug, 'lang' => $sign]) }}">
                                                    {{ $category->name }}</a>
                                            @endif<i class="fas fa-tooth"></i></h3>

                                <a href="@if($langg->rtl == 1)
                                               {{ route('front.category',['category' => $category->slug_ar, 'lang' => $sign]) }}
                                              
                                            @else
                                              {{ route('front.category',['category' => $category->slug, 'lang' => $sign]) }}
                                                   
                                            @endif" class="read-more">{{ $langg->lang3 }}
                                    <span class="arrow fas fa-angle-double-left"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
               

            </div>

        </div>
    </div>
    <!--=============End Department-area =============-->

    <!--============= Start gallery =============-->
    <div class="sec-title centered">
        <h2>{{ $langg->lang6 }}</h2>
        <div class="separator"></div>
    </div>
    <div class="gallery_area">
        <div class="container products-page">
           
            <div class="container  teath-slider owl-carousel owl-theme">
                <div class="row">

                @foreach($services as $service)
                    <a href="{{asset('assets/images/services/'.$service->photo)}}" class="img_popup single_gallery col-md-4">
                        <div class="gallery_img" style="background-image: url({{asset('assets/images/services/'.$service->photo)}});">
                            <div class="gallery_hover_content">
                                <i class="far fa-dot-circle"></i>

                                <h1>{{$langg->rtl == 1 ? $service->name_ar  : $service->name }}</h1>
                            </div>
                        </div>
                    </a> 
                @endforeach
                </div>
            </div>


        </div>
    </div>

    <!--============ End gallery ============-->

    <!--========== start blogs area ================== -->
    <!-- blog area start -->
    <section class="blog__area">

        <div class="blog-area ptb-100">
            <div class="container">
                <div class="sec-title centered">
                    <h2>{{ $langg->lang7 }}</h2>
                    <div class="separator"></div>
                </div>
                <div class="blog-slider owl-carousel owl-theme">

                @foreach($blogs as $blogg)

                    <div class="blog-card text-center">
                        <a href="{{route('front.blogshow',['id' => $blogg->slug ,'lang' => $sign ])}}">
                            <img src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}" alt="{{ $langg->rtl == 1 ? $blogg->alt_ar : $blogg->alt}}">
                        </a>
                        <div class="b-card-text">
                            <h3><a href="{{route('front.blogshow',['id' => $blogg->slug ,'lang' => $sign ])}}">@if($langg->rtl == 1)
                                                    {{strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar,0,50)."...":$blogg->title_ar}}
                                                @else
                                                    {{strlen($blogg->title) > 50 ? substr($blogg->title,0,50)."...":$blogg->title}}
                                                @endif</a>
                            </h3>
                            <p>@if($langg->rtl == 1)
                                                {{substr(strip_tags($blogg->mobile_details_ar),0,120)}}
                                            @else
                                                {{substr(strip_tags($blogg->mobile_details),0,120)}}
                                            @endif</p>
                            <div class="view-more">
                                <a href="{{route('front.blogshow',['id' => $blogg->slug ,'lang' => $sign ])}}">
                                {{ $langg->lang3 }}
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>

    </section>
    <!-- blog area end -->

    <!--========== End blogs area ================== -->

    
 
    <section class="testimonial-section" data-aos="zoom-in-down">
        <div class="container">
            <div class="sec-title centered">
                <h2>{{ $langg->lang53 }}</h2>
                <div class="separator"></div>
            </div>
            <div class="testimonials-carousel owl-carousel owl-theme">
                @foreach($reviews as $review)
                <div class="testimonial-block">
                    <div class="inner-box">
                    <img src="{{asset('assets/images/reviews/'.$review->photo)}}" alt="{{$review->title}}" />
                        <!-- <div class="content-box">  
                            <h3>maysa ahmed
                                <div class="rate">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                  </div>

                            </h3>
                        
                            <div class="quote-icon icon-quote2"></div>
                            <p class="text">احسن طقم عمل واستقبال ممكن تتعامل معاه مع اني خارج الدوله بس مقدرش أقرب
                                لاسناني انا وزوجي واولادي غير عندهم من حسن استقبال لطقم عمل والتمريض لدكاتره عندهم ضمير
                                لا يبخلو بالنصيحه حتى بالتليفون نظرا لوجودنا خارج الدوله معظم السنه غير أن العياده فيها
                                تعقيم وتطهير فوق الوصف فعلا كل الشكر الاستاذه شاديه الخلوقه</p>
                        </div>
                        <div class="image-box">
                          
                        </div> -->
                    </div>
                </div>
                @endforeach
                 
            </div>
        </div>
    </section>



    <!--=============start appointment-area =============-->
    <div class="appointment-section">
        <div class="image-layer">

        </div>
        <div class="container-fluid">
            <div class="sec-title centered">
                <h2>{{ $langg->lang35 }}</h2>
                <div class="separator"></div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="form-column">
                        <div class="inner-column">
                            <h3>{{ $langg->lang36 }}</h3>
                            <div class="calender-form">

                                <form id="email-form" action="{{route('front.contact.submit')}}" method="POST">

                                {{csrf_field()}}
                                            <div class="form-group w-100">
                                                <div class="response w-100"></div>
                                            </div>
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label><span class="icon flaticon-doctor"></span> {{ $langg->lang37 }}</label>
                                                <select class="custom-select-box" name="service" required>
                                                    <option>{{ $langg->lang37 }}</option>
                                                    @foreach($categories as $category)    
                                                    <option value="{{ $category->name }}">@if($langg->rtl == 1)
                                            
                                                    {{ $category->name_ar }}
                                            @else
                                               
                                                    {{ $category->name }}
                                            @endif</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label><span class="icon flaticon-phone-receiver"></span>  {{ $langg->lang47 }}</label>
                                                <input type="text" name="name" placeholder=" {{ $langg->lang47 }}*" required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">

                                            <div class="form-group">
                                                <label><span class="icon flaticon-phone-receiver"></span>   {{ $langg->lang48 }}</label>
                                                <input type="tel" name="phone" placeholder="  {{ $langg->lang48 }}*" required="">
                                            </div>
                                        </div>



                                        <div class="col-lg-6 col-md-6 col-sm-12">

                                            <div class="form-group">
                                                <label><span class="icon flaticon-envelope"></span>   {{ $langg->lang49 }}</label>
                                                <input type="email" name="email" placeholder="  {{ $langg->lang49 }} *">
                                            </div>
                                        </div>




                                        <div class="col-lg-12 col-md-6 col-sm-12">

                                            <div class="form-group">
                                                <textarea name="text" placeholder="{{ $langg->lang50 }}*"></textarea>
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
                                        <div class="form-group">
                                            <!-- <a class="custom_btn" href="#">تاكيد الحجز</a> -->
                                            <button class="custom_btn" type="submit">{{ $langg->lang38 }}</button>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d27607.248468686645!2d31.319848499999996!3d30.125501499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1580312918364!5m2!1sar!2seg" frameborder="0" style="border:0; height: 531px;width: 100%;" allowfullscreen=""></iframe> -->
                    {!! $ps->map !!}
            </div>

        </div>
    </div>
    </div>
    <!--=============End appointment-area =============-->




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