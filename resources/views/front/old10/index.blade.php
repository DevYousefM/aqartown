@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('gsearch')
    <meta property="og:image" content="{{ asset('public/assets/images/' . $gs->logo) }}" />
@stop


@section('content')


    <!-- start home main slider -->
    <div class="swiper-container home-main-slider">
        <div class="swiper-wrapper">

            @foreach ($sliders as $k => $slide)
                @php
                    $galss = str_replace(' ', '%20', $slide->photo);
                @endphp
                <div class="swiper-slide">
                    <div class="slider-img">
                        <img src="{{ asset('/public/assets/images/sliders/' . $galss) }}" alt="img">
                    </div>
                    <div class="slider-text">
                        <div class="loopy-div"></div>
                        <div class="text-buttons">
                            <div class="text">
                                <p>
                                    {{ $langg->rtl == 1 ? $slide->subtitle_text_ar : $slide->subtitle_text }}

                                </p>
                                <p>
                                    {{ $langg->rtl == 1 ? $slide->title_text_ar : $slide->title_text }}
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
    <!-- <div class="about-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="about-description aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1500">
                                <div class="heading">
                                    <p>
                                        أ.د/ محمود رشدي الأنصاري
                                    </p>
                                </div>
                                <div class="text">
                                    <p>رئيس مجلس إدارة معامل مختبرات العرب الدولية
                                    </p>

            <p>حاصل علي بكالوريوسالطب و الجراحة</p>

            <p>حاصل على ماجيستيرالمناعة و الكائنات الدقيقة
                بكلية الطب جامعة عين شمسعام 2012&nbsp;</p>

            <p>حاصل على دكتوراة في المناعة و الكائنات الدقيقة 2015</p>
            <p>عضو هيئة تدريسبكلية الطب جامعة مصرللعلوم
                والتكنولوجيا وزميل جامعة UCF</p>

            <p>عضو الأكاديمية الأمريكية لدراسة المناعة و الحساسية
                برقم 143497</p>
                <p>عضو الجمعية الأوروبية للمناعة و العلاج الجيني
                    عضوية رقم-A121179</p>

                                </div>
                                <a href="https://m.youtube.com/" class="see-more">
                                  <span>
                                    <i class="ion-social-youtube-outline"></i>
                                  </span>
                                <p>
                                  عن د.علي
                                </p>
                                </a>
                               
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="home-about aos-init aos-animate" data-aos="zoom-in-left" data-aos-duration="1500">
                                <div class="img-div">
                                    <img src="./images/about/about-dr.jpg" alt="img">
                                </div>


                            </div>
                        </div>
                  
                    </div>

                </div>
            </div> -->
    <!-- start home about section -->
    <div class="home-about-section">
        <div class="container">

            <div class="section-text">
                <div class="section-heading" data-aos="fade-down" data-aos-duration="1500">
                    <div class="heading-left">
                        <span class="draw-line"></span>
                    </div>
                    <img src="{{ asset('public/assets/images/' . $gs->logo) }}" alt="">

                    <div class="heading-right">
                        <span class="draw-line"></span>
                    </div>
                </div>
                <div class="section-body" data-aos="zoom-in-up" data-aos-duration="1500">
                    @if ($langg->rtl == 1)
                        {!! $gs->home_about_ar !!}
                    @else
                        {!! $gs->home_about !!}
                    @endif
                </div>
            </div>
            <div class="home-about-slick-slider" data-aos="zoom-in-right" data-aos-duration="1500">


                @foreach ($images as $image)
                    <div class="img-div">
                        <img src="{{ asset('/public/assets/images/ads/' . $image->photo) }}" alt="img">
                    </div>
                @endforeach



            </div>
        </div>
    </div>
    <!-- end home about section -->



    <!-- category section -->
    <!-- category section -->
    <div class="categories-section">
        <div class="line-up"></div>
        <div class="section-heading">
            <p>
                {{ $langg->lang37 }}
            </p>
        </div>
        <div class="section-body">
            <ul class="main-ul">

                @foreach ($categories->take(8) as $cat)
                    <li data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                        <a href="@if ($langg->rtl == 1) {{ route('front.category', ['category' => $cat->slug_ar, 'lang' => $sign]) }}

          @else
          {{ route('front.category', ['category' => $cat->slug, 'lang' => $sign]) }} @endif"
                            class="product-card">
                            <div class="img-div lazy-div">
                                <img class="lazy"
                                    data-src="{{ asset('public/assets/images/categories/' . $cat->photo) }}"
                                    alt="png">
                                <div class="next-lazy-img"></div>
                            </div>
                            <div class="title">
                                <p>
                                    @if ($langg->rtl == 1)
                                        {{ $cat->name_ar }}
                                    @else
                                        {{ $cat->name }}
                                    @endif
                                </p>
                            </div>
                        </a>
                    </li>
                @endforeach



            </ul>
        </div>
    </div>
    <!-- ./category section -->

    <!-- ./category section -->

    <!-- end start blogs section -->
    <!-- <div class="blogs-section">
                <div class="container">
                  <div class="section-heading">
                    <p>
                      المقالات
                    </p>
                  </div>

                  <div class="section-body">
                    <ul class="main-ul">
                      <li>
                        <a href="blog-details.html" class="blog-card">
                          <div class="img-div lazy-div">
                            <img class="" data-src="./images/1627920083تخسيس-البطن.jpg" alt="img"
                              src="./images/1627920083تخسيس-البطن.jpg">

                          </div>
                          <p class="blog-title">

                            نصائح عامة للتخسيس
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="blog-details.html" class="blog-card">
                          <div class="img-div lazy-div">
                            <img class="" data-src="./images/1627920002mady2.png" alt="img" src="./images/1627920002mady2.png">

                          </div>
                          <p class="blog-title">

                            من اجل رجيم ناجح
                          </p>
                        </a>
                      </li>
                      <li>
                        <a href="blog-details.html" class="blog-card">
                          <div class="img-div lazy-div">
                            <img class="" data-src="./images/1627919929mady.png" alt="img" src="./images/1627919929mady.png">

                          </div>
                          <p class="blog-title">

                            عادات خاطئة تسسب زيادة الوزن
                          </p>
                        </a>
                      </li>

                    </ul>
                  </div>
                </div>
              </div> -->



    @include('includes.form')


    <!-- testimonials section -->
    <div class="testimonials-section">
        <div class="mfa-container">


            <!-- start testimonials slider -->
            <div class="slider-wrapper">
                <div class="slider-heading">
                    {{ $langg->lang12 }}

                </div>
                <div class="slider-itself">
                    <div class="swiper-container testimonials-slider">
                        <div class="swiper-wrapper">

                            @foreach ($reviews as $review)
                                <div class="swiper-slide">
                                    <div class="img-div">
                                        <img src="{{ $review->photo ? asset('public/assets/images/reviews/' . $review->photo) : asset('public/assets/images/noimage.png') }}"
                                            alt="img">
                                    </div>

                                    <div class="content">
                                        <i class="linearicons-quote-close"></i>
                                        <p class="text"> {!! $langg->rtl == 1 ? $review->details_ar : $review->details !!} </p>
                                        <div class="name">
                                            {{ $langg->rtl == 1 ? $review->title_ar : $review->title }}
                                        </div>
                                        <i class="linearicons-quote-open"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- rtl code -->
                        <div class="swiper-button-prev testimonials-slider-prev">
                            <span class="feather icon-arrow-right"></span>
                        </div>
                        <div class="swiper-button-next testimonials-slider-next">
                            <span class="feather icon-arrow-left"></span>
                        </div>
                        <!-- rtl code -->

                        <!-- ltr code -->
                        <!-- <div class="swiper-button-next testimonials-slider-next">
                      <span class="linearicons-chevron-right"></span>
                    </div>
                    <div class="swiper-button-prev testimonials-slider-prev">
                      <span class="linearicons-chevron-left"></span>
                    </div> -->
                        <!-- ltr code -->

                        <!-- <div class="swiper-pagination testimonials-slider-pagination"></div> -->
                    </div>
                </div>
            </div>
            <!-- end testimonials slider -->



        </div>
    </div>
    <!-- ./testimonials section -->







@stop
@section('js')
    <script>
        if (document.querySelector('.home-about-slick-slider')) {
            $('.home-about-slick-slider').slick({});
        }

        if (document.querySelector('.home-about-slick-slider')) {
            const UIslickPrev = document.querySelector('.slick-prev');
            UIslickPrev.textContent = 'prev';
            const UIslickNext = document.querySelector('.slick-next');
            UIslickNext.textContent = 'next';
        }
    </script>
@stop
