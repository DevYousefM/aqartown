@extends('layouts.front')

@section('title')
    @if ($langg->rtl == 1)
        {{ $productt->name_ar }}
    @else
        {{ $productt->name }}
    @endif
@stop


@section('content')
    @php
        $ps = App\Models\Pagesetting::find(1);
    @endphp
    <div class="sub-banner pt-90 pb-90">

        <div class="container">

            <div class="col-md-12">

                <div class="text-center text-line">

                    <h1>
                        @if ($langg->rtl == 1)
                            {{ $productt->name_ar }}
                        @else
                            {{ $productt->name }}
                        @endif
                    </h1>

                    <ul class="text-c">

                        <li>{{ $langg->lang17 }}</li>

                        <li>|</li>

                        <li class="color-t">
                            @if ($langg->rtl == 1)
                                {{ $productt->name_ar }}
                            @else
                                {{ $productt->name }}
                            @endif
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!--sub-Banner-End-->



    <section class="services-single-section">
        <div class="container">
            <div class="d-flex flex-column-reverse flex-lg-row">
                <div class="widgets-column col-lg-4 col-md-8 col-12">
                    <div class="inner-column">
                        <aside class="single-side-box feature">
                            <div class="aside-title">
                                <h5> {{ $langg->lang46 }} </h5>
                            </div>
                            <div class="feature-property">
                                <div class="row">
                                    @foreach ($vendors as $vendor)
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="single-property">
                                                <div class="property-img">
                                                    <a
                                                        href=" @if ($langg->rtl == 1) {{ route('front.product', ['slug' => $vendor->slug_ar, 'lang' => $sign]) }}
                                                    @else
                                                    {{ route('front.product', ['slug' => $vendor->slug, 'lang' => $sign]) }} @endif ">
                                                        <img src="{{ filter_var($vendor->photo, FILTER_VALIDATE_URL) ? $vendor->photo : asset(access_public() . 'assets/images/products/' . $vendor->photo) }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="property-desc text-center">
                                                    <div class="property-desc-top">
                                                        <h6><a
                                                                href="@if ($langg->rtl == 1) {{ route('front.product', ['slug' => $vendor->slug_ar, 'lang' => $sign]) }}
                                                            @else

                                                            {{ route('front.product', ['slug' => $vendor->slug, 'lang' => $sign]) }} @endif">
                                                                @if ($langg->rtl == 1)
                                                                    {{ $vendor->name_ar }}
                                                                @else
                                                                    {{ $vendor->name }}
                                                                @endif
                                                            </a>
                                                        </h6>
                                                        <h4 class="price">{{ $vendor->price }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-lg-12 col-md-6 col-12">
                                        <div class="send-message-pro">
                                            <h3> {{ $langg->lang20 }}</h3>
                                            <form action="{{ route('front.contact.submit') }}" name="appointment"
                                                id="email-form" method="POST" autocomplete="off" class="">
                                                {{ csrf_field() }}
                                                <div class="form-group w-100">
                                                    <div class="response w-100"></div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="name"
                                                        placeholder="{{ $langg->lang47 }}*" required
                                                        class="form-control fill-form">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="email"
                                                        placeholder="{{ $langg->lang49 }} *"
                                                        class="form-control fill-form">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="phone"
                                                        placeholder="{{ $langg->lang48 }} *" required
                                                        class="form-control fill-form">
                                                </div>
                                                <div class="form-group">
                                                    <textarea placeholder="{{ $langg->lang50 }}*" name="text" class="form-control fill-form"></textarea>
                                                </div>
                                                @if ($gs->is_capcha == 1)
                                                    <ul class="captcha-area">
                                                        <li>
                                                            <p><img class="codeimg1"
                                                                    src="{{ asset(access_public() . 'assets/images/capcha_code.png') }}"
                                                                    alt=""> <i
                                                                    class="fas fa-sync-alt pointer refresh_code"></i></p>
                                                        </li>
                                                        <li>
                                                            <input name="codes" type="text" class="input-field"
                                                                placeholder="{{ $langg->lang51 }}" required="">
                                                        </li>
                                                    </ul>
                                                @endif
                                                <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                                                <div class="form-group">
                                                    <button id="submit-btn" type="submit"
                                                        class="send-m">{{ $langg->lang52 }} </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="content-column col-lg-8 col-12">
                    <div class="inner-column">
                        <div class="services-carousel">
                            <div class="image-column">
                                <div class="carousel-outer">
                                    <h2>
                                        @if ($langg->rtl == 1)
                                            {{ $productt->name_ar }}
                                        @else
                                            {{ $productt->name }}
                                        @endif
                                    </h2>
                                    <div class="listing_attributes"><label itemprop="address" class="address"><i
                                                class="fa fa-map-marker" aria-hidden="true"></i> <a href="#"
                                                class="text-inherit">
                                                @if ($langg->rtl == 1)
                                                    {{ $productt->locations->name_ar }}
                                                @else
                                                    {{ $productt->locations->country_name }}
                                                @endif
                                            </a></label> <label class="attributes"><label><i class="fa fa-building"></i> <a
                                                    href="#" class="text-inherit">
                                                    @if ($langg->rtl == 1)
                                                        {{ $productt->subcategory->name_ar }}
                                                    @else
                                                        {{ $productt->subcategory->name }}
                                                    @endif
                                                </a></label> <label itemprop="floorSize">
                                                <img alt="size" src="{{ url('public/assets/aqar/images/size.svg') }}">
                                                {{ $productt->location }}
                                            </label></label></div>
                                    <ul class="image-carousel owl-carousel owl-theme">
                                        @foreach ($productt->galleries as $gal)
                                            <li><a href="{{ asset(access_public() . 'assets/images/galleries/' . $gal->photo) }}"
                                                    class="lightbox-image" title="Image Caption Here"><img
                                                        src="{{ asset(access_public() . 'assets/images/galleries/' . $gal->photo) }}"
                                                        alt="{{ $langg->rtl == 1 ? $productt->name_ar : $productt->name }}"></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="thumbs-carousel owl-carousel owl-theme">
                                        @foreach ($productt->galleries as $gal)
                                            <li><img src="{{ asset(access_public() . 'assets/images/galleries/' . $gal->photo) }}"
                                                    alt=""></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="min-details">
                            <h3> {{ $langg->lang42 }}
                            </h3>
                            <div class="min-det-f-list">
                                <ul class="property-list-f list-unstyled">
                                    <li><b>{{ $langg->lang43 }} :</b> {{ $productt->parking }}</li>
                                    <li><b> {{ $langg->lang44 }} :</b> {{ $productt->price_from }} </li>
                                    <li><b>{{ $langg->lang45 }}:</b> {{ $productt->location }}</li>
                                    <li><b> {{ $langg->lang4 }}:</b> {{ $productt->touch }}
                                    </li>
                                </ul>
                                <ul class="property-list-f list-unstyled">
                                    <li><b>{{ $langg->lang5 }}

                                            :</b> {{ $productt->open_time }}</li>
                                    <li><b> {{ $langg->lang9 }}
                                            :</b> {{ $productt->time }} </li>
                                    <li><b>{{ $langg->lang10 }}
                                            :</b> {{ $productt->reg_link }}
                                    </li>
                                    <li><b>{{ $langg->lang14 }}:</b> {{ $productt->price }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="min-details">
                            @if ($langg->rtl == 1)
                                {!! $productt->details_ar !!}
                            @else
                                {!! $productt->details !!}
                            @endif
                        </div>
                        <!-- <div class="min-details border-no">

                                                                                                <h3>Gallery</h3>

                                                                                                <div class="min-gallery-i row">

                                                                                                    <div class="col-md-5">

                                                                                                        <span class="pl-5gallery">

                                                                                                            <a href="images/p-g1.png" class="image-popup-vertical-fit">

                                                                                                                <img src="images/p-g1.png" alt="" class="min-gallery-i img-fluid">

                                                                                                            </a>

                                                                                                        </span>

                                                                                                        <span class="pl-5gallery wi-50-img p-r-5 p-l-0">

                                                                                                            <a href="images/p-g2.png" class="image-popup-vertical-fit">

                                                                                                                <img src="images/p-g2.png" alt="" class="min-gallery-i img-fluid">

                                                                                                            </a>

                                                                                                        </span>

                                                                                                        <span class="pl-5gallery wi-50-img p-r-5 p-r-0">

                                                                                                            <a href="images/p-g3.png" class="image-popup-vertical-fit">

                                                                                                                <img src="images/p-g3.png" alt="" class="min-gallery-i img-fluid">

                                                                                                            </a>

                                                                                                        </span>

                                                                                                    </div>

                                                                                                    <div class="col-md-3">

                                                                                                        <span class="pl-5gallery">

                                                                                                            <a href="images/p-g4.png" class="image-popup-vertical-fit">

                                                                                                                <img src="images/p-g4.png" alt="" class="min-gallery-i img-fluid">

                                                                                                            </a>

                                                                                                        </span>

                                                                                                    </div>

                                                                                                    <div class="col-md-4">

                                                                                                        <span class="pl-5gallery">

                                                                                                            <a href="images/p-g5.png" class="image-popup-vertical-fit">

                                                                                                                <img src="images/p-g5.png" alt="" class="min-gallery-i img-fluid">

                                                                                                            </a>

                                                                                                        </span>

                                                                                                        <span class="pl-5gallery  wi-50-img p-r-5 p-l-0">

                                                                                                            <a href="images/p-g6.png" class="image-popup-vertical-fit">

                                                                                                                <img src="images/p-g6.png" alt="" class="min-gallery-i img-fluid">

                                                                                                            </a>

                                                                                                        </span>

                                                                                                        <span class="pl-5gallery  wi-50-img p-r-5 p-r-0">

                                                                                                            <a href="images/p-g7.png" class="image-popup-vertical-fit">

                                                                                                                <img src="images/p-g7.png" alt="" class="min-gallery-i img-fluid">

                                                                                                            </a>

                                                                                                        </span>

                                                                                                    </div>

                                                                                                </div>

                                                                                            </div> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('js')
    {!! $productt->facebook_pixel !!}
    <script>
        window.dataLayer = window.dataLayer || [];

        window.dataLayer.push({
            event: 'view_item',
            ecommerce: {
                items: [{
                    item_id: '{{ $productt->id ?? 'unknown' }}',
                    item_name: {!! json_encode($property->name_ar ?? 'غير معروف') !!},
                    item_category: {!! json_encode($productt->subcategory->name_ar ?? 'غير محدد') !!},
                    price: {{ $property->price ?? 0 }},
                    item_location: {!! json_encode($productt->locations->name_ar ?? 'غير معروف') !!},
                }]
            }
        });
    </script>

@endsection
