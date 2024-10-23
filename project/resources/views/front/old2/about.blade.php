@extends('layouts.front')

@section('title')
    {{ $langg->lang16 }} -
    @if ($langg->rtl == 1)
        {{ $gs->title_ar }}
    @else
        {{ $gs->title }}
    @endif
@stop

@section('content')
    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp
    <section class="medicen-aboutUs text-center"
        style="background-image: url({{ asset('assets/images/' . $gs->best_icon) }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6">
                    <img src="" alt="">
                </div>
                <div class="col-lg-6">
                    <h3>{{ $langg->lang16 }} </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"> {{ $langg->lang16 }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('front.index', $sign) }}">{{ $langg->lang17 }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- <section>
                <div class="w-100 position-relative">
                    <div class="container">
                        <div class="special-wrap res-row brd-rd5 overflow-hidden overlap140 overlap-85 w-100 wide-sec">
                            <div class="row mrg">
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="special-box z1 scndry-bg grad-bg2 d-flex position-relative flex-wrap w-100">
                                        <i class="flaticon-first-aid-kit d-inline-block"></i>
                                        <div class="special-box-inner">
    <h4 class = "mb-0"> العلاج والدعم المتخصص </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="special-box z1 scndry-bg grad-bg2 d-flex position-relative flex-wrap w-100">
                                        <i class="flaticon-brain d-inline-block"></i>
                                        <div class="special-box-inner">
    <h4 class = "mb-0"> التشخيص والتحقيق </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="special-box z1 scndry-bg grad-bg2 d-flex position-relative flex-wrap w-100">
                                        <i class="flaticon-pharmacy d-inline-block"></i>
                                        <div class="special-box-inner">
    <h4 class = "mb-0"> العلاج الطبي والجراحي </ h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
    <br>
    <section>
        <div class="w-100 gray-layer opc95 pb-10 position-relative">
            <div class="fixed-bg"
                style="background-image: url({{ asset('assets/images/' . $gs->about_page_background) }});opacity: .4;">
            </div>
            <div class="container">
                <div class="about-wrap2 position-relative w-100">
                    <div class="row mrg30">
                        <div class="col-md-12 col-sm-12 col-lg-6 order-lg-1">
                            <div class="about-gal w-100">
                                <div class="row align-items-end mrg20">
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                                            <a href="{{ asset('assets/images/' . $gs->home_about_img1) }}"
                                                data-fancybox="gallery" title=""><img class="img-fluid w-100"
                                                    src="{{ asset('assets/images/' . $gs->home_about_img1) }}"
                                                    alt="About Gallery Image 1"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                                            <a href="{{ asset('assets/images/' . $gs->home_about_img2) }}"
                                                data-fancybox="gallery" title=""><img class="img-fluid w-100"
                                                    src="{{ asset('assets/images/' . $gs->home_about_img2) }}"
                                                    alt="About Gallery Image 2"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mrg20">
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div
                                            class="about-gal-img brd-rd10 brd-rd10 overflow-hidden position-relative w-100">
                                            <a href="{{ asset('assets/images/' . $gs->home_about_img3) }}"
                                                data-fancybox="gallery" title=""><img class="img-fluid w-100"
                                                    src="{{ asset('assets/images/' . $gs->home_about_img3) }}"
                                                    alt="About Gallery Image 3"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                                            <a class="about-play-btn spinner thm-clr rounded-circle"
                                                href="{{ $gs->home_about_link }}" data-fancybox title=""><i
                                                    class="fas fa-play-circle"></i></a>
                                            <img class="img-fluid w-100"
                                                src="{{ asset('assets/images/' . $gs->home_about_img4) }}"
                                                alt="About Gallery Image 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-6">
                            <div class="about-desc w-100">

                                <h2 class="mb-0 sub-title"><i class="fab fa-slack"></i> {{ $langg->lang16 }}
                                </h2>

                                <p class="mb-0">
                                    @if ($langg->rtl == 1)
                                        {!! $gs->policy_ar !!}
                                    @else
                                        {!! $gs->policy !!}
                                    @endif
                                </p>
                                <!-- <p class="mb-0"></p>
                                        <span class="about-time d-block"><span class="thm-clr"><i class="flaticon-clock"></i>Visit Schedule:</span> Every Week Monday To Friday: 9:00am to 5:00pm</span>
                                    -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="our_departments">
                
                    
                <div class="container">
                    <div class="row mt-50">
                        <div class="our-departments-wrap">
                            <h2 style="text-align: center;">خدماتنا</h2>

                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                        <img src="./images/xcardiogram.png.pagespeed.ic.y69-cZBo8f.webp" alt="" data-pagespeed-url-hash="2321741670" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <h3>عيادة الاطفال</h3>
                        </header>
                        <div class="entry-content">
                        <p> المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأه                       .</p>
                        </div>
                        <footer class="entry-footer">
                        <a href="#">معرفه المزيد</a>
                        </footer>
                        </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                        <img src="./images/xstomach-2.png.pagespeed.ic.jsBTzs251L.webp" alt="" data-pagespeed-url-hash="1831395093" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <h3>عيادة الانف والاذن</h3>
                        </header>
                        <div class="entry-content">
                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                        </div>
                        <footer class="entry-footer">
                        <a href="#">معرفه المزيد</a>
                        </footer>
                        </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                        <img src="images/xblood-sample-2.png.pagespeed.ic.12fphUMQYI.webp" alt="" data-pagespeed-url-hash="623777643" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <h3>عيادة النفسية والعصبية</h3>
                        </header>
                        <div class="entry-content">
                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                        </div>
                        <footer class="entry-footer">
                        <a href="#">معرفه المزيد</a>
                        </footer>
                        </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                        <img src="images/download.webp" alt="" data-pagespeed-url-hash="3490857473" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <h3>عيادة المسالك البولية</h3>
                        </header>
                        <div class="entry-content">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                        </div>
                        <footer class="entry-footer">
                        <a href="#">معرفه المزيد</a>
                        </footer>
                        </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                        <img src="images/xstretcher.png.pagespeed.ic.suCIPQXOCU.webp" alt="" data-pagespeed-url-hash="1201132883" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <h3>عيادة الباطنة</h3>
                        </header>
                        <div class="entry-content">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                        </div>
                        <footer class="entry-footer">
                        <a href="#">معرفه المزيد</a>
                        </footer>
                        </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                        <img src="images/xscanner.png.pagespeed.ic.DNOV9Jj0dr.webp" alt="" data-pagespeed-url-hash="954702979" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <h3>عيادة النساء والولادة</h3>
                        </header>
                        <div class="entry-content">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                        </div>
                        <footer class="entry-footer">
                        <a href="#">معرفه المزيد</a>
                        </footer>
                        </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-md-0">
                        <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                        <img src="images/xbones.png.pagespeed.ic.S-ogBurKgM.webp" alt="" data-pagespeed-url-hash="359842172" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <h3>عيادة طب وجراحة العيون</h3>
                        </header>
                        <div class="entry-content">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                        </div>
                        <footer class="entry-footer">
                        <a href="#">معرفه المزيد</a>
                        </footer>
                        </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-lg-0">
                        <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                        <img src="images/xblood-donation-2.png.pagespeed.ic.kCu2FwNGhB.webp" alt="" data-pagespeed-url-hash="841136679" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <h3>عيادة العظام</h3>
                        </header>
                        <div class="entry-content">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                        </div>
                        <footer class="entry-footer">
                        <a href="#">معرفه المزيد</a>
                        </footer>
                        </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-0">
                        <div class="our-departments-cont">
                        <header class="entry-header d-flex flex-wrap align-items-center">
                        <img src="images/xglasses.png.pagespeed.ic.xPZKt-u-w-.webp" alt="" data-pagespeed-url-hash="3347302103" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <h3>عيادة جراحة الأوعية الدموية</h3>
                        </header>
                        <div class="entry-content">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                        </div>
                        <footer class="entry-footer">
                        <a href="#">معرفه المزيد</a>
                        </footer>
                        </div>
                        </div>
                        </div>
                </div>
            </section>
      -->
    <!-- <section class="Faq_Stuff">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="professional-box">
                                        <h2 class="d-flex align-items-center">بأحترافيه</h2>
                                        <img src="./images/cardiogram-2.png" alt="" data-pagespeed-url-hash="2144542407" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="quality-box">
                                        <h2 class="d-flex align-items-center">بأعلي جودة</h2>
                                        <img src="./images/hospital.png" alt="" data-pagespeed-url-hash="4198736247" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                                    </div>
                                </div>
                                </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                            <div class="accordion">
                                <div class="col-12" style="padding-right: 30px;">
                                    <h2>اسئلة &amp; اجوبه</h2>
                                </div>
                                   <div class="contentBx">
                                    <div class="lable">لما نحن؟</div>
                                    <div class="content">
                                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                                    </div>
                                   </div>
                                   <div class="contentBx">
                                    <div class="lable">لما نحن؟</div>
                                    <div class="content">
                                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                                    </div>
                                   </div>
                                   <div class="contentBx">
                                    <div class="lable">لما نحن؟</div>
                                    <div class="content">
                                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها..</p>
                                    </div>
                                   </div>
                               </div>
                        </div>
                    </div>
                </div>
            </section> -->

    <!-- <section class="doctors">
                <div class="container">
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-lg-3 col-md-6 mb-50">
                            <img src="./images/t1.jpg.webp" alt="">
                            <h3>دكتور : احمد</h3>
                            <div class="social-links-2">
                             <a href="#">
                             <i class="fab fa-facebook-f"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-twitter"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-dribbble"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-behance"></i>
                             </a>
                             </div>
                          </div>
                          <div class="col-lg-3 col-md-6 mb-50">
                            <img src="./images/t2.jpg.webp" alt="">
                            <h3>دكتورة : هاله</h3>
                            <div class="social-links-2">
                             <a href="#">
                             <i class="fab fa-facebook-f"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-twitter"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-dribbble"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-behance"></i>
                             </a>
                             </div>
                          </div>
                          <div class="col-lg-3 col-md-6 mb-50">
                            <img src="./images/t3.jpg.webp" alt="">
                            <h3>دكتور : احمد</h3>
                            <div class="social-links-2">
                             <a href="#">
                             <i class="fab fa-facebook-f"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-twitter"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-dribbble"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-behance"></i>
                             </a>
                             </div>
                          </div>
                          <div class="col-lg-3 col-md-6 mb-50">
                            <img src="./images/t4.jpg.webp" alt="">
                            <h3>دكتورة : هاله</h3>
                            <div class="social-links-2">
                             <a href="#">
                             <i class="fab fa-facebook-f"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-twitter"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-dribbble"></i>
                             </a>
                             <a href="#">
                             <i class="fab fa-behance"></i>
                             </a>
                             </div>
                          </div>
                    </div>
                </div>
            </section>
         -->


    @include('includes.form')

    <section class="container">
        {!! $ps->map !!}
    </section>

@stop
