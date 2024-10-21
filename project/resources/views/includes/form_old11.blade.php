<!-- form map wrapper -->
<div class="form-map-wrapper">
    <div class="map-wrapper">
        {!! $ps->map !!}
    </div>

    <div class="mfa-form-wrapper">
        <div class="form-img">
            <img src="{{ asset('public/assets/images/' . $gs->logo) }}" alt="logo">
        </div>

        <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
            autocomplete="off" class="contact_form2 mfa-form">
            {{ csrf_field() }}
            <div class="form-group w-100">
                <div class="response w-100"></div>
            </div>
            <div class="form-div">
                <label for="name">
                    <span>
                        {{ $langg->lang47 }}
                    </span>
                    <input type="text" id="name" required name="name" class="fname">
                    <i class="linearicons-user"></i>
                </label>
            </div>
            <div class="form-div">
                <label for="email">
                    <span>
                        {{ $langg->lang49 }}
                    </span>
                    <input type="text" id="email" name="email">
                    <i class="linearicons-envelope"></i>
                </label>
            </div>
            <div class="form-div">
                <label for="phone">
                    <span>
                        {{ $langg->lang48 }}
                    </span>
                    <input type="text" id="phone" required name="phone">
                    <i class="linearicons-phone"></i>
                </label>
            </div>
            <div class="form-div">
                <label for="message">
                    <span>
                        {{ $langg->lang50 }}
                    </span>
                    <textarea id="message"></textarea>
                    <i class="linearicons-bubble-text"></i>
                </label>
            </div>
            @if ($gs->is_capcha == 1)
                <ul class="captcha-area">
                    <li>
                        <p><img class="codeimg1" src="{{ asset('public/assets/images/capcha_code.png') }}"
                                alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>

                    </li>
                    <li>
                        <input name="codes" type="text" class="input-field" placeholder="{{ $langg->lang51 }}"
                            required="">

                    </li>
                </ul>
            @endif
            <button type="submit">
                <span>
                    {{ $langg->lang52 }}
                    <i class="linearicons-paper-plane"></i>
                </span>
            </button>
        </form>
    </div>
</div>
<!-- ./form map wrapper -->
