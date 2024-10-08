



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


        <!-- start home main slider -->
  <div class="swiper-container home-main-slider">
    <div class="swiper-wrapper">

      @foreach($sliders as $k=>$slide)
        @php
        $galss = str_replace(' ', '%20', $slide->photo);
        @endphp
      <div class="swiper-slide">
        <div class="slider-img">
          <img src="{{asset('/assets/images/sliders/'.$galss)}}" alt="img">
        </div>
        <div class="slider-text">
          <div class="text-buttons">
            <div class="text">
              <p>

                {{$langg->rtl == 1 ? $slide->subtitle_text_ar :   $slide->subtitle_text}}


              </p>
              <p>

                {{$langg->rtl == 1 ? $slide->title_text_ar :   $slide->title_text}}

              </p>
            </div>
          </div>
        </div>
      </div>

      @endforeach



    </div>

    <div class="mfa-swiper-buttons">
      <div class="swiper-button-prev home-main-slider-prev">
        <span class="feather icon-arrow-right"></span>
      </div>
      <div class="swiper-button-next home-main-slider-next">
        <span class="feather icon-arrow-left"></span>
      </div>
    </div>

    <div class="swiper-pagination home-main-slider-pagination"></div>
  </div>
  <!-- end home main slider -->
  <section class="main-services">
    <h1 class="heading-title text-center">
      {{ $langg->lang37 }}    </h1>
    <div class="container">
      <div class="row">

        @foreach($categories->take(4) as $cat)
        <div class="col-lg-3">
         <a href="@if($langg->rtl == 1)
         {{ route('front.category',['category' => $cat->slug_ar, 'lang' => $sign]) }}

         @else
         {{ route('front.category',['category' => $cat->slug, 'lang' => $sign]) }}

         @endif">
          <div class="imgs">
            <img src="{{asset('assets/images/categories/'.$cat->photo)}}" alt="">
          </div>
          <div class="text">
            <h1 class="service-title">
              @if($langg->rtl == 1)

                {{ $cat->name_ar }}
              @else

                {{ $cat->name }}
              @endif            </h1>
            <p class="brief">
              @if($langg->rtl == 1)
                {!! $cat->meta_description_ar !!}

              @else
                {!! $cat->meta_description !!}

              @endif
            </p>
          </div>
         </a>
        </div>
        @endforeach


      </div>
    </div>
  </section>
  
  <section class="home-about-doctor">
    <div class="w-100 pt-100 gray-layer opc95 pb-100 position-relative">
      <div class="fixed-bg" style="background-image: url(images/parallax-bg6.html);"></div>
      <div class="container">
        <div class="about-wrap2 position-relative w-100">
          <div class="row mrg30">
            <div class="col-md-12 col-sm-12 col-lg-6" data-aos="zoom-in-up">
              <div class="w-100  about-desc">
                <h3 class="mt-2 mb-2"> <i class="fontello icon-lightbulb"></i>
                  {{ $langg->lang38 }}                  <i class="fontello icon-lightbulb"></i>
                </h3>
         @if(!empty($gs->percent_title))
                  @php
                  $title =    explode(',', $gs->percent_title);

                  $title_ar =    explode(',', $gs->percent_title_ar);

                  @endphp

                  @foreach($title as $key => $data1)
                <p class="mb-0"><i class="fas fa-check-circle"></i>
                  @if($langg->rtl == 1)

                    {{ $title_ar[$key] }}
                  @else
                    {{ $title[$key] }}

                  @endif
                </p>
                  @endforeach

                @endif
                  <br>
                <a href="{{ route('front.about',$sign) }}" class="primary-btn">
                  {{ $langg->lang39 }}                </a>
              </div>
            </div>

            <div class="col-md-12 col-sm-12 col-lg-6 order-lg-1" data-aos="zoom-in-up">
              <div class="about-gal w-100">
                <div class="row align-items-end mrg20">

                  <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                      <a href="{{asset('assets/images/'.$gs->home_about_img3)}}" data-fancybox="gallery" title=""><img class="img-fluid w-100"
                          src="{{asset('assets/images/'.$gs->home_about_img3)}}" alt="About Gallery Image 2"></a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- category section -->
  <section class="services">
    <h2 class="heading-title">{{ $langg->lang220 }} </h2>
    <div class="container">
      <div class="services_grid">

        @foreach($subcategories as $subcat)

        <a href="{{ route('front.category',['category' => $subcat->category->slug_ar, 'subcategory' => $subcat->slug_ar , 'lang' => $sign]) }}" class="service-item" data-aos="zoom-in-down" data-aos-duration="3000">
          <div class="service-icon">
            <img src="{{asset('assets/images/subcategories/'.$subcat->photo)}}" alt="@if($langg->rtl == 1)

            {{$subcat->name_ar}}
            @else

            {{$subcat->name}}
            @endif   "
              data-lazy-src="{{asset('assets/images/subcategories/'.$subcat->photo)}}" data-ll-status="loaded"
              class="entered lazyloaded"><noscript><img src="{{asset('assets/images/subcategories/'.$subcat->photo)}}"
                alt="@if($langg->rtl == 1)

                {{$subcat->name_ar}}
                @else

                {{$subcat->name}}
                @endif   "></noscript>
          </div>
          <h3 class="service-name">  @if($langg->rtl == 1)

                {{$subcat->name_ar}}
            @else

                {{$subcat->name}}
            @endif  </h3>
        </a>

        @endforeach


      </div>
      <a href="{{ route('front.categories',$sign) }}" class="reversed-btn morebtn">{{ $langg->lang40 }}</a>
    </div>
  </section>
  <!-- ./category section -->

  <!-- end start blogs section -->
  <div class="blogs-section">
    <div class="container">
      <div class="section-heading">
        <p>
          {{ $langg->lang222 }}
        </p>
      </div>

      <div class="section-body">
        <ul class="main-ul">

          @foreach($blogs->take(6) as $blogg)
          <li>
            <a href="{{route('front.blogshow',['id' => $blogg->slug ,'lang' => $sign ])}}" class="blog-card">
              <div class="img-div lazy-div">
                <img class="" data-src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}" alt="img"
                  src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}">

              </div>
              <p class="blog-title">

                @if($langg->rtl == 1)
                  {{$blogg->title_ar}}
                @else
                  {{$blogg->title}}
                @endif              </p>
            </a>
          </li>
          @endforeach


        </ul>
      </div>
    </div>
  </div>

 
  <!-- end start blogs section -->
  <section class="bmi-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2 class="heading-title">حساب مؤشر الكتلة</h2>
          <form action="#" method="post" id="bmi-form" class="" onsubmit="return false">
            <input type="hidden" name="action" value="bmi">
            <div class="formGroup required">
              <label for="weight" class="formLabel">الوزن بالكجم</label>
              <input type="number" min="1" class="formControl" name="weight" id="weight">
            </div>
            <div class="formGroup required">
              <label for="height" class="formLabel">الطول بالسم</label>
              <input type="number" min="1" class="formControl" name="height" id="height">
            </div>
            <div class="formGroup required">
              <label for="gender" class="formLabel">الجنس</label>
              <select class="formControl wide" name="gender">
                <option value="male">ذكر</option>
                <option value="female">أنثى</option>
              </select>
            </div>
            <div class="formGroup required">
              <label for="activity" class="formLabel">مستوى النشاط</label>
              <select class="formControl wide" name="activity">
                <option value="1">كثير الجلوس</option>
                <option value="2">قليل الحركة</option>
                <option value="3">متوسط الحركة</option>
                <option value="4">كثير الحركة</option>
                <option value="5">رياضي نشط</option>
              </select>
            </div>

            <div class="formBtn flex-start">
              <button type="button" class="btn primary-btn submit-btn" data-toggle="modal" data-target="#exampleModal"
                onclick="getbmivalue()">
                احسب
              </button>


              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="formGroup required">
                        <label for="age" class="formLabel">Bmi Value</label>
                        <input type="text" step="1" min="2" class="formControl" name="age" id="bmivalue" readonly >
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
        <div class="col-md-6 col-md-offset-1">
          <div class="bmi-table">
            <div class="bmi-head">
              <i class="fas fa-tachometer-alt"></i> أقسام مؤشرات الكتلة </div>
            <ul class="mk-list bmi-list">
              <li>أقل من 18.5</li>
              <li>تحت الوزن الطبيعي</li>
              <li>من 18.5 إلى 24.99</li>
              <li>الوزن الطبيعي</li>
              <li>من 25 إلى 29.99</li>
              <li>وزن زائد</li>
              <li>من 30 إلى 34.99</li>
              <li>سمنة من الدرجة الأولى
              </li>
              <li>من 35 إلى 39.99</li>
              <li>سمنة من الدرجة الثانية
              </li>
              <li>من 40 إلى 49.99</li>
              <li>سمنة مرضية مفرطة
              </li>
              <li>أكثر من 50</li>
              <li>سمنة فوق المفرطة
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="review-area ptb-100">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="section-title-warp">


            <h2>{{ $langg->lang12 }}</h2>
          </div>
        </div>


      </div>
      <div class="review-slides owl-carousel owl-theme">



        @foreach($reviews as $review)
        <div class="single-review-item" data-aos="zoom-in-up" data-aos-duration="3000">
          <div class="icon">
            <i class="fa fa-quote-left" aria-hidden="true"></i>

          </div>
          <p>
            {!! $langg->rtl == 1 ? $review->details_ar : $review->details!!}
          </p>
          <div class="review-info">

            <h3>{{$langg->rtl == 1 ? $review->title_ar : $review->title}}</h3>

          </div>
        </div>
        @endforeach



      </div>
    </div>
  </section>


@include('includes.form')



@stop

