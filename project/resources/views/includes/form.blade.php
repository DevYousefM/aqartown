<!-- Start contact-us -->
<section class="contact-us  mega-section  pb-0" id="contact-us">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-7  mx-auto wow fadeInUp  " data-wow-delay="0.2s">
                <div class="contact-form-panel">
                    <div class="section-heading side-heading  light-title">
                        <h2 class="section-title wow fadeInUp" data-wow-delay=".2s">تواصل معنا <span class="title-design-element "></span></h2>
                        <!-- <p class="section-subtitle wow fadeInUp" data-wow-delay=".6s">We Will answer your questions as soon as possible</p> -->
                    </div>
                    <div class="contact-form-area input-boxed">
                        <!--Form To have user messages-->
                        <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="contact_form2 mfa-form main-form">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                                <div class="response w-100"></div>
                            </div>
                            <span class="done-msg"></span>
                            <div class="row ">
                                <div class="col-12 col-lg-6">
                                    <div class="   input-wrapper">
                                        <input class="text-input fname" id="user-name" name="name" type="text"/>
                                        <label for="user-name">{{ $langg->lang47 }}<span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="   input-wrapper">
                                        <input class="text-input" id="user-email" name="phone" type="number"/>
                                        <label for="user-email"> {{ $langg->lang48 }}  <span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="   input-wrapper">
                                        <input class="text-input" id="msg-subject" name="subject" type="text"/>
                                        <label for="msg-subject"> الموضوع <span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="   input-wrapper">
                                        <textarea class=" text-input" id="msg-text" name="text"></textarea>
                                        <label for="msg-text"> {{ $langg->lang50 }} <span class="req">*</span></label><span class="b-border"></span><i></i><span class="error-msg"></span>
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
                                <div class="col-12 submit-wrapper">
                                    <button class=" btn-solid" id="submit-btn" type="submit" name="UserSubmit">{{ $langg->lang52 }} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5  mx-auto  mb-5 mb-lg-0 wow fadeInUp  " data-wow-delay="0.4s">
                <div class=" contact-info-panel">
                    <div class="overlay-photo-image-bg "></div>
                    <div class="overlay-color"></div>
                    <div class="info-section ">
                        <div class="info-panel"><i class="fas fa-map-marker-alt icon"></i>
                            <div class="info-content">
                                <h6 class="info-title">العنوان</h6>
                                <p class="info-text">
                                    {{$langg->rtl == 1 ? $ps->street_ar  : $ps->street }}
                                </p>
                            </div>
                        </div>
                        <div class="info-panel"><i class="fas fa-mobile-alt icon"></i>
                            <div class="info-content">
                                <h6 class="info-title">رقم الهاتف</h6>
                                <p class="info-text"> <a class="tel link" href="tel:{{$ps->phone}}">{{$ps->phone}}</a></p>
                            </div>
                        </div>
                        <div class="info-panel"><i class="fas fa-envelope icon"></i>
                            <div class="info-content">
                                <h6 class="info-title">البريد الألكتروني</h6>
                                <p class="info-text"> <a class="tel link" href="mailto:{{$ps->email}}">{{$ps->email}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-box pt-5 mt-5">
        <div class="mapouter">
            <div class="gmap_canvas">
                {!! $ps->map !!}
            </div>
        </div>
    </div>
</section>
<!-- End contact-us -->
