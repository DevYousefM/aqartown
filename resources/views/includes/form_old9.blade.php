<section data-bg="{{ asset(access_public() . 'assets/images/' . $gs->new_icon) }}"
    class="appointment-area ptb-100 jarallax rocket-lazyload entered lazyloaded"
    style="background-image: url(&quot;https://drahmednabilelhoufy.com/wp-content/uploads/2020/09/computer-desk-laptop-stethoscope-48604-scaled-1.jpg&quot;);"
    data-jarallax="{&quot;speed&quot;: 0.3}" data-ll-status="loaded">
    <div class="container">
        <div class="appointment-content">
            <span class="sub-title">{{ $langg->lang3 }} </span>
            <h2>{{ $langg->lang6 }} </h2>
            {{-- https://drahmednabilelhoufy.com/wp-admin/admin-post.php novalidate="novalidate" --}}
            <form action="{{ route('front.appointment.submit') }}" method="post" class="reserve-form"
                id="appointment-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group w-100">
                    <div class="response w-100"></div>
                </div>
                <input type="hidden" name="action" value="reserve">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="linearicons-user"></i>
                            </div>
                            <label>{{ $langg->lang47 }}</label>
                            <input type="text" required class="form-control fname"
                                placeholder="{{ $langg->lang47 }} *" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="country">
                                {{ $langg->lang7 }}
                            </label>

                            <select id="country" name="country" class="form-control wide">
                                <option value="" disabled selected>{{ $langg->lang7 }} </option>
                                <option value="مصر">مصر</option>
                                <option value="العراق">العراق</option>
                                <option value="ليبيا">ليبيا</option>
                                <option value="الكويت">الكويت</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="linearicons-phone"></i>
                            </div>
                            <label>{{ $langg->lang48 }}</label>
                            <input type="text" required class="form-control" placeholder="{{ $langg->lang48 }}* "
                                id="text" name="phone">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="linearicons-envelope"></i>
                            </div>
                            <label>{{ $langg->lang49 }} </label>
                            <input type="email" class="form-control" placeholder="{{ $langg->lang49 }}"
                                id="email" name="email">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="fas fa-weight"></i>
                            </div>
                            <label>{{ $langg->lang8 }}</label>
                            <input type="number" class="form-control" placeholder="{{ $langg->lang8 }}" id="text"
                                name="weight">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="icon">
                                <i class="fas fa-arrows-alt-v"></i>
                            </div>
                            <label>{{ $langg->lang53 }}</label>
                            <input type="number" class="form-control" placeholder="{{ $langg->lang53 }}"
                                id="text" name="height">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <div class="icon">
                                <i class="fas fa-hourglass"></i>
                            </div>
                            <label>{{ $langg->lang35 }}</label>
                            <input type="number" class="form-control" placeholder="{{ $langg->lang35 }}"
                                id="text" name="age">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <div class="icon">
                                <i class="linearicons-bubble-text"></i>
                            </div>
                            <label>{{ $langg->lang50 }}</label>
                            <textarea type="text" class="form-control" placeholder="{{ $langg->lang50 }}" id="text" name="message"></textarea>
                        </div>
                    </div>
                    @if ($gs->is_capcha == 1)
                        <ul class="captcha-area">
                            <li>
                                <p><img class="codeimg1"
                                        src="{{ asset(access_public() . 'assets/images/capcha_code.png') }}"
                                        alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>

                            </li>
                            <li>
                                <input name="codes" type="text" class="input-field"
                                    placeholder="{{ $langg->lang51 }}" required="">

                            </li>
                        </ul>
                    @endif
                    <div class="col-lg-12 col-md-12">
                        <div class="submit-btn">
                            <button class="btn btn-primary">{{ $langg->lang36 }} <i
                                    class="linearicons-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<br>

<section class="map">
    <div class="container-fluid">
        {!! $ps->map !!}
    </div>
</section>
