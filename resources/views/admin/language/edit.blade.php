@extends('layouts.admin')



@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Edit Language') }} <a class="add-btn" href="{{ route('admin-lang-index') }}"><i
                                class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('Language Settings') }}</a></li>
                        <li>
                            <a href="{{ route('admin-lang-index') }}">{{ __('Website Language') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-lang-edit', $data->id) }}">{{ __('Edit') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            <div class="gocover"
                                style="background: url({{ asset('assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <form id="geniusform" action="{{ route('admin-lang-update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include('includes.admin.form-both')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Language') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="language"
                                            placeholder="{{ __('Language') }}" value="{{ $data->language }}"
                                            required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Language sign') }} *</h4>
                                            <p class="sub-heading">{{ __('(english)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="sign"
                                            placeholder="{{ __('en') }}" required="" value="{{ $data->sign }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Language Direction') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select name="rtl" class="input-field">
                                            <option value="0" {{ $lang->rtl == '0' ? 'selected' : '' }}>
                                                {{ __('Left To Right') }}</option>
                                            <option value="1" {{ $lang->rtl == '1' ? 'selected' : '' }}>
                                                {{ __('Right To Left') }}</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="row add_lan_tab justify-content-center">
                                    <div class="col-lg-10">
                                        <nav>
                                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                    href="#nav-home" role="tab" aria-controls="nav-home"
                                                    aria-selected="true">{{ __('Website') }}</a>
                                                <a class="nav-item nav-link" style="display:none" id="nav-profile-tab"
                                                    data-toggle="tab" href="#nav-profile" role="tab"
                                                    aria-controls="nav-profile"
                                                    aria-selected="false">{{ __('User Panel') }}</a>
                                                <a class="nav-item nav-link" style="display:none" id="nav-about-tab"
                                                    data-toggle="tab" href="#nav-about" role="tab"
                                                    aria-controls="nav-about"
                                                    aria-selected="false">{{ __('Vendor Panel') }}</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

                                            {{-- FRONTEND STARTS --}}

                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab">


                                                <hr>

                                                <h4 class="text-center">HEADER</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang17 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang17"
                                                            placeholder="Home" value="{{ $lang->lang17 }}">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang16 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang16"
                                                            placeholder="About us" value="{{ $lang->lang16 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang11 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang11"
                                                            placeholder="What we do" value="{{ $lang->lang11 }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang18 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang18"
                                                            placeholder="Blog" value="{{ $lang->lang18 }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang221 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang221"
                                                            placeholder="Gallery" value="{{ $lang->lang221 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang222 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang222"
                                                            placeholder="Review" value="{{ $lang->lang222 }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang20 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang20"
                                                            placeholder="Contact Us" value="{{ $lang->lang20 }}">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center" style="display:none">HOME</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang223 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang223"
                                                            placeholder="what we do" value="{{ $lang->lang223 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang12 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang12"
                                                            placeholder="view more" value="{{ $lang->lang12 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang13 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang13"
                                                            placeholder="Read The Latest News"
                                                            value="{{ $lang->lang13 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang220 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang220"
                                                            placeholder="Recent Articles" value="{{ $lang->lang220 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang1 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang1"
                                                            placeholder="Call Us On 1234 456 780"
                                                            value="{{ $lang->lang1 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang2 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang2"
                                                            placeholder="or Enter Your Details Team"
                                                            value="{{ $lang->lang2 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading"> {{ $lang->lang3 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang3"
                                                            placeholder=" Will Contact You To Discuss Your Event"
                                                            value="{{ $lang->lang3 }}">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center" style="display:none">CONTACT US</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang6 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang6"
                                                            placeholder="Location" value="{{ $lang->lang6 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang7 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang7"
                                                            placeholder="Call Now" value="{{ $lang->lang7 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang8 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang8"
                                                            placeholder="Mail Info" value="{{ $lang->lang8 }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang41 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang41"
                                                            placeholder="Your Comment" value="{{ $lang->lang41 }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang47 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang47"
                                                            placeholder="Name" value="{{ $lang->lang47 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang48 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang48"
                                                            placeholder="Phone Number" value="{{ $lang->lang48 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang49 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang49"
                                                            placeholder="Email Address" value="{{ $lang->lang49 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang50 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang50"
                                                            placeholder="Your Message" value="{{ $lang->lang50 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang51 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang51"
                                                            placeholder="Enter Code" value="{{ $lang->lang51 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang52 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang52"
                                                            placeholder="Send Message" value="{{ $lang->lang52 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang53 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang53"
                                                            placeholder="Subject" value="{{ $lang->lang53 }}">
                                                    </div>
                                                </div>



                                                <hr style="display:none">

                                                <h4 class="text-center" style="display:none">BLOG</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang35 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang35"
                                                            placeholder="Tags" value="{{ $lang->lang35 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang36 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang36"
                                                            placeholder="Recent Articles" value="{{ $lang->lang36 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang37 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang37"
                                                            placeholder="Archives" value="{{ $lang->lang37 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang38 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang38"
                                                            placeholder="Social Sharing" value="{{ $lang->lang38 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang39 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang39"
                                                            placeholder="Comments" value="{{ $lang->lang39 }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang831 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang831"
                                                            placeholder="Comments" value="{{ $lang->lang831 }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang832 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang832"
                                                            placeholder="Comments" value="{{ $lang->lang832 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang40 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang40"
                                                            placeholder="Client's Comment" value="{{ $lang->lang40 }}">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang46 }}*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang46"
                                                            placeholder="Submit A Comment" value="{{ $lang->lang46 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang42 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang42"
                                                            placeholder="Categories" value="{{ $lang->lang42 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang43 }}*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang43"
                                                            placeholder="Recent Events" value="{{ $lang->lang43 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang44 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang44"
                                                            placeholder="Flickr Photos" value="{{ $lang->lang44 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang45 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang45"
                                                            placeholder="Tags" value="{{ $lang->lang45 }}">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center" style="display:none">Review</h4>

                                                <hr>






                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang4 }}*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang4"
                                                            placeholder="What People Say?" value="{{ $lang->lang4 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang5 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang5"
                                                            placeholder="Client's Testimonials"
                                                            value="{{ $lang->lang5 }}">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center" style="display:none">about us</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang9 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang9"
                                                            placeholder="History" value="{{ $lang->lang9 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang10 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang10"
                                                            placeholder="Our Team" value="{{ $lang->lang10 }}">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang14 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang14"
                                                            placeholder="Meet the people who make awesome stuffs"
                                                            value="{{ $lang->lang14 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang15 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang15"
                                                            placeholder="Sponsored By" value="{{ $lang->lang15 }}">
                                                    </div>
                                                </div>







                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang19 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang19"
                                                            placeholder="Faq's" value="{{ $lang->lang19 }}">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang25 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang25"
                                                            placeholder="Amazing Partners & Sponsors"
                                                            value="{{ $lang->lang25 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang200 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang200"
                                                            placeholder="Coach Tracker" value="{{ $lang->lang200 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang230 }}*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang230"
                                                            placeholder="Track Your Coach in Real Time."
                                                            value="{{ $lang->lang230 }}">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center" style="display:none">events details</h4>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang201 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang201"
                                                            placeholder="Overview" value="{{ $lang->lang201 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang202 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang202"
                                                            placeholder="Features" value="{{ $lang->lang202 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang203 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang203"
                                                            placeholder="Speaker" value="{{ $lang->lang203 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang231 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang231"
                                                            placeholder="Get In Touch" value="{{ $lang->lang231 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang232 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang232"
                                                            placeholder="Register Now" value="{{ $lang->lang232 }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang204 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang204"
                                                            placeholder="Pricing Plans" value="{{ $lang->lang204 }}">
                                                    </div>
                                                </div>







                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ $lang->lang250 }} *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang250"
                                                            placeholder="Biggest Festivals"
                                                            value="{{ $lang->lang250 }}">
                                                    </div>
                                                </div>
                                                <hr>

                                                <h4 class="text-center">Vendor</h4>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(In Any Language) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang517"
                                                            placeholder="(In Any Language)"
                                                            value="{{ $lang->lang517 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">ADD NEW *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang518"
                                                            placeholder="ADD NEW" value="{{ $lang->lang518 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Dashbord *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang441"
                                                            placeholder="Dashbord" value="{{ $lang->lang441 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">All Units *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang443"
                                                            placeholder="All Units" value="{{ $lang->lang443 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang519"
                                                            placeholder="name" value="{{ $lang->lang519 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">arabic name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang431"
                                                            placeholder="Welcome!" value="{{ $lang->lang431 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">title *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang432"
                                                            placeholder="Visit Store" value="{{ $lang->lang432 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">arabic title *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang433"
                                                            placeholder="User Panel" value="{{ $lang->lang433 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">choose main*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang434"
                                                            placeholder="Edit Profile" value="{{ $lang->lang434 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">choose type *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang435"
                                                            placeholder="Logout" value="{{ $lang->lang435 }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">location *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang436"
                                                            placeholder="New Order(s)." value="{{ $lang->lang436 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">property type *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang437"
                                                            placeholder="Clear All" value="{{ $lang->lang437 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">price range *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang438"
                                                            placeholder="You Have a new order."
                                                            value="{{ $lang->lang438 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Condition *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang439"
                                                            placeholder="No New Notifications."
                                                            value="{{ $lang->lang439 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Description *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang440"
                                                            placeholder="Visit Store" value="{{ $lang->lang440 }}">
                                                    </div>
                                                </div>





                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Arabic Description *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang442"
                                                            placeholder="Orders" value="{{ $lang->lang442 }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Units *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang444"
                                                            placeholder="Products" value="{{ $lang->lang444 }}">
                                                    </div>
                                                </div>





                                                <hr>

                                                <h4 class="text-center">Subscription</h4>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subscribe Success Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Subscribe Success Message"
                                                            name="subscribe_success"
                                                            value="{{ $lang->subscribe_success }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subscribe Error Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Subscribe Error Message" name="subscribe_error"
                                                            value="{{ $lang->subscribe_error }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subscribe for updates & special offers! *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang909"
                                                            placeholder="Subscribe for updates & special offers!"
                                                            value="{{ $lang->lang909 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Your Email Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Enter Your Email Address" name="lang741"
                                                            value="{{ $lang->lang741 }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">SUBSCRIBE *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" placeholder="SUBSCRIBE"
                                                            name="lang742" value="{{ $lang->lang742 }}">
                                                    </div>
                                                </div>





                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Back Home *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" placeholder="Back Home"
                                                            name="lang430" value="{{ $lang->lang430 }}">
                                                    </div>
                                                </div>




                                            </div>


                                            {{-- FRONTEND ENDS --}}


                                            {{-- USER PANEL STARTS --}}

                                            <div class="tab-pane fade" style="display:none" id="nav-profile"
                                                role="tabpanel" aria-labelledby="nav-profile-tab">


                                                <hr>

                                                <h4 class="text-center">USER DASHBOARD</h4>

                                                <hr>




                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Affiliate Bonus *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang215"
                                                            placeholder="Affiliate Bonus" value="Affiliate Bonus">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Brands *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang806"
                                                            placeholder="Brands" value="Brands">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">All Notifications*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang807"
                                                            placeholder="All Notifications" value="All Notifications">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Notifications*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang808"
                                                            placeholder="Notifications" value="Notifications">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Loyalty Program*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang809"
                                                            placeholder="Loyalty Program" value="Loyalty Program">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Referrals program*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang810"
                                                            placeholder="Referrals program" value="Referrals program">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Wallet*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang811"
                                                            placeholder="Wallet" value="Wallet">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Promo Codes*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang812"
                                                            placeholder="Promo Codes" value="Promo Codes">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Address List*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang813"
                                                            placeholder="Address List" value="Address List">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Card Number*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang814"
                                                            placeholder="Card Number" value="Card Number">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Discount off*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang815"
                                                            placeholder="Discount off" value="Discount off">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Limited Purchase*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang816"
                                                            placeholder="Limited Purchase" value="Limited Purchase">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Exp*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang817"
                                                            placeholder="Exp" value="Exp">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Copy Code*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang818"
                                                            placeholder="Copy Code" value="Copy Code">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">free product*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang819"
                                                            placeholder="Use This Code To Buy One From This Product For Free"
                                                            value="Use This Code To Buy One From This Product For Free">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">points*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang820"
                                                            placeholder="points" value="points">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">message*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang821"
                                                            placeholder="message" value="message">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Points For Copoun*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang822"
                                                            placeholder="Points For Copoun" value="Points For Copoun">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">times to Use*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang823"
                                                            placeholder="times to Use" value="times to Use">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Times*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang824"
                                                            placeholder="Times" value="Times">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Referrals Code*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang825"
                                                            placeholder="Referrals Code" value="Referrals Code">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Partners*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang826"
                                                            placeholder="Partners" value="Partners">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">No Use Wallet*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang827"
                                                            placeholder="No Use Wallet" value="No Use Wallet">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Use Wallet*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang828"
                                                            placeholder="Use Wallet" value="Use Wallet">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipment Price*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang829"
                                                            placeholder="Shipment Price" value="Shipment Price">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Refelars Code To Get Points*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang830"
                                                            placeholder="Refelars Code To Get Points"
                                                            value="Refelars Code To Get Points">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center">PURCHASED ITEMS</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Purchased Items *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang277"
                                                            placeholder="Purchased Items" value="Purchased Items">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">#Order *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang278"
                                                            placeholder="#Order" value="#Order">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Date *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang279"
                                                            placeholder="Date" value="Date">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Total *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang280"
                                                            placeholder="Order Total" value="Order Total">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Status *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang281"
                                                            placeholder="Order Status" value="Order Status">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">View *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang282"
                                                            placeholder="View" value="View">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">VIEW ORDER *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang283"
                                                            placeholder="VIEW ORDER" value="VIEW ORDER">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">My Order Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang284"
                                                            placeholder="My Order Details" value="My Order Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order# *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang285"
                                                            placeholder="Order#" value="Order#">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">print order *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang286"
                                                            placeholder="print order" value="print order">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Date *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang301"
                                                            placeholder="Order Date" value="Order Date">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Billing Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang287"
                                                            placeholder="Billing Address" value="Billing Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Name: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang288"
                                                            placeholder="Name:" value="Name:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Email: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang289"
                                                            placeholder="Email:" value="Email:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Phone: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang290"
                                                            placeholder="Phone:" value="Phone:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Address: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang291"
                                                            placeholder="Address:" value="Address:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payment Information *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang292"
                                                            placeholder="Payment Information"
                                                            value="Payment Information">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Paid Amount: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang293"
                                                            placeholder="Paid Amount:" value="Paid Amount:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payment Method: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang294"
                                                            placeholder="Payment Method:" value="Payment Method:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Charge ID: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang295"
                                                            placeholder="Charge ID:" value="Charge ID:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Transaction ID: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang296"
                                                            placeholder="Transaction ID:" value="Transaction ID:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit Transaction ID *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang297"
                                                            placeholder="Edit Transaction ID"
                                                            value="Edit Transaction ID">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang298"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Transaction ID & Press Enter *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang299"
                                                            placeholder="Enter Transaction ID & Press Enter"
                                                            value="Enter Transaction ID & Press Enter">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Submit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang300"
                                                            placeholder="Submit" value="Submit">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang302"
                                                            placeholder="Shipping Address" value="Shipping Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">PickUp Location *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang303"
                                                            placeholder="PickUp Location" value="PickUp Location">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Address: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang304"
                                                            placeholder="Address:" value="Address:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang305"
                                                            placeholder="Shipping Method" value="Shipping Method">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Ship To Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang306"
                                                            placeholder="Ship To Address" value="Ship To Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Pick Up *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang307"
                                                            placeholder="Pick Up" value="Pick Up">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Ordered Products: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang308"
                                                            placeholder="Ordered Products:" value="Ordered Products:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">ID# *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang309"
                                                            placeholder="ID#" value="ID#">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang310"
                                                            placeholder="Name" value="Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Quantity *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang311"
                                                            placeholder="Quantity" value="Quantity">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Size *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang312"
                                                            placeholder="Size" value="Size">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Color *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang313"
                                                            placeholder="Color" value="Color">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang314"
                                                            placeholder="Price" value="Price">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang315"
                                                            placeholder="Total" value="Total">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Download *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang316"
                                                            placeholder="Download" value="Download">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">View License *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang317"
                                                            placeholder="View License" value="View License">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Back *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang318"
                                                            placeholder="Back" value="Back">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">License Key *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang319"
                                                            placeholder="License Key" value="License Key">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">The Licenes Key is : *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang320"
                                                            placeholder="The Licenes Key is :"
                                                            value="The Licenes Key is :">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Close *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang321"
                                                            placeholder="Close" value="Close">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center">Affiliate Code</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Affiliate Informations *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang322"
                                                            placeholder="Affiliate Informations"
                                                            value="Affiliate Informations">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Your Affilate Link *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang323"
                                                            placeholder="Your Affilate Link *"
                                                            value="Your Affilate Link *">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">This is your affilate link just copy the
                                                                link and paste anywhere you
                                                                want. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang324"
                                                            placeholder="This is your affilate link just copy the link and paste anywhere you want."
                                                            value="This is your affilate link just copy the link and paste anywhere you want.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Affiliate Banner *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang325"
                                                            placeholder="Affiliate Banner *" value="Affiliate Banner *">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">This is your affilate banner Preview. *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang326"
                                                            placeholder="This is your affilate banner Preview."
                                                            value="This is your affilate banner Preview.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Affiliate Banner HTML Code *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang327"
                                                            placeholder="Affiliate Banner HTML Code *"
                                                            value="Affiliate Banner HTML Code *">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">This is your affilate banner html code
                                                                just copy the code and paste
                                                                anywhere you want. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang328"
                                                            placeholder="This is your affilate banner html code just copy the code and paste anywhere you want."
                                                            value="This is your affilate banner html code just copy the code and paste anywhere you want.">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">WITHDRAW</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">My Withdraws *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang329"
                                                            placeholder="My Withdraws" value="My Withdraws">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang330"
                                                            placeholder="Withdraw Now" value="Withdraw Now">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Date *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang331"
                                                            placeholder="Withdraw Date" value="Withdraw Date">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang332"
                                                            placeholder="Method" value="Method">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Account *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang333"
                                                            placeholder="Account" value="Account">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Amount *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang334"
                                                            placeholder="Amount" value="Amount">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Status *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang335"
                                                            placeholder="Status" value="Status">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">WITHDRAW NOW</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang336"
                                                            placeholder="Withdraw Now" value="Withdraw Now">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Back *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang337"
                                                            placeholder="Back" value="Back">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang338"
                                                            placeholder="Withdraw Method" value="Withdraw Method">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select Withdraw Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang339"
                                                            placeholder="Select Withdraw Method"
                                                            value="Select Withdraw Method">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Paypal *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang340"
                                                            placeholder="Paypal" value="Paypal">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Skrill *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang341"
                                                            placeholder="Skrill" value="Skrill">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payoneer *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang342"
                                                            placeholder="Payoneer" value="Payoneer">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Bank *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang343"
                                                            placeholder="Bank" value="Bank">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Amount *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang344"
                                                            placeholder="Withdraw Amount" value="Withdraw Amount">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Account Email *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang345"
                                                            placeholder="Enter Account Email"
                                                            value="Enter Account Email">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter IBAN/Account No *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang346"
                                                            placeholder="Enter IBAN/Account No"
                                                            value="Enter IBAN/Account No">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Account Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang347"
                                                            placeholder="Enter Account Name" value="Enter Account Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang348"
                                                            placeholder="Enter Address" value="Enter Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Swift Code *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang349"
                                                            placeholder="Enter Swift Code" value="Enter Swift Code">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Additional Reference(Optional) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang350"
                                                            placeholder="Additional Reference(Optional)"
                                                            value="Additional Reference(Optional)">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Fee *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang351"
                                                            placeholder="Withdraw Fee" value="Withdraw Fee">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">and *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang352"
                                                            placeholder="and" value="and">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">will deduct from your account. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang353"
                                                            placeholder="will deduct from your account."
                                                            value="will deduct from your account.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang354"
                                                            placeholder="Withdraw" value="Withdraw">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Current Balance *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang355"
                                                            placeholder="Current Balance" value="Current Balance">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">ORDER TRACKING</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Tracking *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang772"
                                                            placeholder="Order Tracking" value="Order Tracking">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Get Tracking Code *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang773"
                                                            placeholder="Get Tracking Code" value="Get Tracking Code">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">View Tracking *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang774"
                                                            placeholder="View Tracking" value="View Tracking">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">No Order Found *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang775"
                                                            placeholder="No Order Found" value="No Order Found">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">FAVORITE SELLERS</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Favorite Sellers *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang252"
                                                            placeholder="Favorite Sellers" value="Favorite Sellers">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shop Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang253"
                                                            placeholder="Shop Name" value="Shop Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Owner Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang254"
                                                            placeholder="Owner Name" value="Owner Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang255"
                                                            placeholder="Address" value="Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Actions *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang256"
                                                            placeholder="Actions" value="Actions">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Confirm Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang257"
                                                            placeholder="Confirm Delete" value="Confirm Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You are about to delete this Seller. *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang258"
                                                            placeholder="You are about to delete this Seller."
                                                            value="You are about to delete this Seller.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Do you want to proceed? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang259"
                                                            placeholder="Do you want to proceed?"
                                                            value="Do you want to proceed?">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang260"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang261"
                                                            placeholder="Delete" value="Delete">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center">Messages</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Messages *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang356"
                                                            placeholder="Messages" value="Messages">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Compose Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang357"
                                                            placeholder="Compose Message" value="Compose Message">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang358"
                                                            placeholder="Name" value="Name">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang359"
                                                            placeholder="Message" value="Message">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Sent *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang360"
                                                            placeholder="Sent" value="Sent">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Action *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang361"
                                                            placeholder="Action" value="Action">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Send Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang362"
                                                            placeholder="Send Message" value="Send Message">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Email *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang363"
                                                            placeholder="Email" value="Email">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subject *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang364"
                                                            placeholder="Subject" value="Subject">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Your Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang365"
                                                            placeholder="Your Message" value="Your Message">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Send Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang366"
                                                            placeholder="Send Message" value="Send Message">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Confirm Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang367"
                                                            placeholder="Confirm Delete" value="Confirm Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You are about to delete this Conversation.
                                                                *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang368"
                                                            placeholder="You are about to delete this Conversation."
                                                            value="You are about to delete this Conversation.">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Do you want to proceed? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang369"
                                                            placeholder="Do you want to proceed?"
                                                            value="Do you want to proceed?">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang370"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang371"
                                                            placeholder="Delete" value="Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Conversation with *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang372"
                                                            placeholder="Conversation with" value="Conversation with">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Back *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang373"
                                                            placeholder="Back" value="Back">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang374"
                                                            placeholder="Message" value="Message">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add Reply *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang375"
                                                            placeholder="Add Reply" value="Add Reply">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center">Tickets And Disputes</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Tickets *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang376"
                                                            placeholder="Tickets" value="Tickets">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add Ticket *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang377"
                                                            placeholder="Add Ticket" value="Add Ticket">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Disputes *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang378"
                                                            placeholder="Disputes" value="Disputes">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add Dispute *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang379"
                                                            placeholder="Add Dispute" value="Add Dispute">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subject *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang380"
                                                            placeholder="Subject" value="Subject">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang381"
                                                            placeholder="Message" value="Message">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Time *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang382"
                                                            placeholder="Time" value="Time">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Action *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang383"
                                                            placeholder="Action" value="Action">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add Ticket (In Modal) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang384"
                                                            placeholder="Add Ticket" value="Add Ticket">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add Dispute (In Modal) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang385"
                                                            placeholder="Add Dispute" value="Add Dispute">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang386"
                                                            placeholder="Order Number" value="Order Number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subject *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang387"
                                                            placeholder="Subject" value="Subject">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Your Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang388"
                                                            placeholder="Your Message" value="Your Message">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Send *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang389"
                                                            placeholder="Send" value="Send">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Confirm Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang390"
                                                            placeholder="Confirm Delete" value="Confirm Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You are about to delete this Ticket. *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang391"
                                                            placeholder="You are about to delete this Ticket."
                                                            value="You are about to delete this Ticket.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You are about to delete this Dispute. *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang392"
                                                            placeholder="You are about to delete this Dispute."
                                                            value="You are about to delete this Dispute.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Do you want to proceed? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang393"
                                                            placeholder="Do you want to proceed?"
                                                            value="Do you want to proceed?">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang394"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang395"
                                                            placeholder="Delete" value="Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Number: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang396"
                                                            placeholder="Order Number:" value="Order Number:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subject: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang397"
                                                            placeholder="Subject:" value="Subject:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Back *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang398"
                                                            placeholder="Back" value="Back">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Admin *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang399"
                                                            placeholder="Admin" value="Admin">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang400"
                                                            placeholder="Message" value="Message">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add Reply *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang401"
                                                            placeholder="Add Reply" value="Add Reply">
                                                    </div>
                                                </div>




                                                <hr>

                                                <h4 class="text-center">EDIT PROFILE</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit Profile *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang262"
                                                            placeholder="Edit Profile" value="Edit Profile">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Upload *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang263"
                                                            placeholder="Upload" value="Upload">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">User Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang264"
                                                            placeholder="User Name" value="User Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Email Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang265"
                                                            placeholder="Email Address" value="Email Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Phone Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang266"
                                                            placeholder="Phone Number" value="Phone Number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Fax *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang267"
                                                            placeholder="Fax" value="Fax">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">City *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang268"
                                                            placeholder="City" value="City">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Zip *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang269"
                                                            placeholder="Zip" value="Zip">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang270"
                                                            placeholder="Address" value="Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Save *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang271"
                                                            placeholder="Save" value="Save">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center">RESET PASSWORD</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Reset Password *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang272"
                                                            placeholder="Reset Password" value="Reset Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Current Password *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang273"
                                                            placeholder="Current Password" value="Current Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">New Password *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang274"
                                                            placeholder="New Password" value="New Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Re-Type New Password *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang275"
                                                            placeholder="Re-Type New Password"
                                                            value="Re-Type New Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Submit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang276"
                                                            placeholder="Submit" value="Submit">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">Subscription Plans</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Free *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang402"
                                                            placeholder="Free" value="Free">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Day(s) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang403"
                                                            placeholder="Day(s)" value="Day(s)">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Current Plan *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang404"
                                                            placeholder="Current Plan" value="Current Plan">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Expired on: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang405"
                                                            placeholder="Expired on:" value="Expired on:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Ends on: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang406"
                                                            placeholder="Ends on:" value="Ends on:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Renew *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang407"
                                                            placeholder="Renew" value="Renew">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Get Started *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang408"
                                                            placeholder="Get Started" value="Get Started">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Package Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang409"
                                                            placeholder="Package Details" value="Package Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Back *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang410"
                                                            placeholder="Back" value="Back">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Plan: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang411"
                                                            placeholder="Plan:" value="Plan:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Price: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang412"
                                                            placeholder="Price:" value="Price:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Durations: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang413"
                                                            placeholder="Durations:" value="Durations:">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product(s) Allowed: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang414"
                                                            placeholder="Product(s) Allowed:"
                                                            value="Product(s) Allowed:">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Note: *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang415"
                                                            placeholder="Note:" value="Note:">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Your Previous Plan will be deactivated! *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang416"
                                                            placeholder="Your Previous Plan will be deactivated!"
                                                            value="Your Previous Plan will be deactivated!">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(Optional) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang417"
                                                            placeholder="(Optional)" value="(Optional)">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select Payment Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang418"
                                                            placeholder="Select Payment Method"
                                                            value="Select Payment Method">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select an option *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang419"
                                                            placeholder="Select an option" value="Select an option">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Paypal *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang420"
                                                            placeholder="Paypal" value="Paypal">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Stripe *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang421"
                                                            placeholder="Stripe" value="Stripe">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Card *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang422"
                                                            placeholder="Card" value="Card">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cvv *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang423"
                                                            placeholder="Cvv" value="Cvv">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Month *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang424"
                                                            placeholder="Month" value="Month">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Year *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang425"
                                                            placeholder="Year" value="Year">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Submit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang426"
                                                            placeholder="Submit" value="Submit">
                                                    </div>
                                                </div>


                                            </div>

                                            {{-- USER PANEL ENDS --}}

                                            {{-- VENDOR PANEL STARTS --}}

                                            <div class="tab-pane fade" style="display:none" id="nav-about"
                                                role="tabpanel" aria-labelledby="nav-about-tab">


                                                <hr>

                                                <h4 class="text-center">GLOBAL</h4>

                                                <hr>




                                                <hr>

                                                <h4 class="text-center">HEADER</h4>

                                                <hr>




                                                <hr>

                                                <h4 class="text-center">NOTIFICATION</h4>

                                                <hr>



                                                <hr>

                                                <h4 class="text-center">SIDEBAR</h4>

                                                <hr>







                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add New Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang445"
                                                            placeholder="Add New Product" value="Add New Product">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">All Products *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang446"
                                                            placeholder="All Products" value="All Products">
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Catalogs *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang785"
                                                            placeholder="Product Catalogs" value="Product Catalogs">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Affiliate Products *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang447"
                                                            placeholder="Affiliate Products" value="Affiliate Products">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add Affiliate Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang448"
                                                            placeholder="Add Affiliate Product"
                                                            value="Add Affiliate Product">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">All Affiliate Products *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang449"
                                                            placeholder="All Affiliate Products"
                                                            value="All Affiliate Products">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Bulk Product Upload *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang450"
                                                            placeholder="Bulk Product Upload"
                                                            value="Bulk Product Upload">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraws *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang451"
                                                            placeholder="Withdraws" value="Withdraws">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Settings *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang452"
                                                            placeholder="Settings" value="Settings">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Services *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang453"
                                                            placeholder="Services" value="Services">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Banner *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang454"
                                                            placeholder="Banner" value="Banner">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Cost *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang455"
                                                            placeholder="Shipping Cost" value="Shipping Cost">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Social Links *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang456"
                                                            placeholder="Social Links" value="Social Links">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">EDIT PROFILE</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Verify Account *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang784"
                                                            placeholder="Verify Account" value="Verify Account">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shop Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang457"
                                                            placeholder="Shop Name" value="Shop Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Owner Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang458"
                                                            placeholder="Owner Name" value="Owner Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shop Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang459"
                                                            placeholder="Shop Number" value="Shop Number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shop Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang460"
                                                            placeholder="Shop Address" value="Shop Address">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Registration Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang461"
                                                            placeholder="Registration Number"
                                                            value="Registration Number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(Optional) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang462"
                                                            placeholder="(Optional)" value="(Optional)">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shop Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang463"
                                                            placeholder="Shop Details" value="Shop Details">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Save *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang464"
                                                            placeholder="Save" value="Save">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">Vendor Verification</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Vendor Verification *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang786"
                                                            placeholder="Vendor Verification"
                                                            value="Vendor Verification">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang787"
                                                            placeholder="Details" value="Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Verification Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang788"
                                                            placeholder="Enter Verification Details"
                                                            value="Enter Verification Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Attachment *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang789"
                                                            placeholder="Attachment" value="Attachment">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(Maximum Size is: 10MB) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang792"
                                                            placeholder="(Maximum Size is: 10MB)"
                                                            value="(Maximum Size is: 10MB)">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add More Attachment *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang790"
                                                            placeholder="Add More Attachment"
                                                            value="Add More Attachment">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Submit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang791"
                                                            placeholder="Submit" value="Submit">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Verify Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang803"
                                                            placeholder="Verify Now " value="Verify Now">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Your Documents Submitted Successfully. *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang804"
                                                            placeholder="Your Documents Submitted Successfully."
                                                            value="Your Documents Submitted Successfully.">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center">DASHBOARD</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Orders Pending! *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang465"
                                                            placeholder="Orders Pending!" value="Orders Pending!">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Orders Procsessing! *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang466"
                                                            placeholder="Orders Procsessing!"
                                                            value="Orders Procsessing!">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Orders Completed! *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang467"
                                                            placeholder="Orders Completed!" value="Orders Completed!">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Products! *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang468"
                                                            placeholder="Total Products!" value="Total Products!">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Item Sold! *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang469"
                                                            placeholder="Total Item Sold!" value="Total Item Sold!">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Earnings! *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang470"
                                                            placeholder="Total Earnings!" value="Total Earnings!">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">View All *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang471"
                                                            placeholder="View All " value="View All ">
                                                    </div>
                                                </div>

                                            </div>

                                            <div style="display:none">
                                                <hr>

                                                <h4 class="text-center">SUCCESS MESSAGES</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Size *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang138"
                                                            placeholder="Size" value="Size">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Color *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang139"
                                                            placeholder="Color" value="Color">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Quantity *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang140"
                                                            placeholder="Quantity" value="Quantity">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Unit Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang141"
                                                            placeholder="Unit Price" value="Unit Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Sub Total *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang142"
                                                            placeholder="Sub Total" value="Sub Total">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Cost *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang143"
                                                            placeholder="Shipping Cost" value="Shipping Cost">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Tax *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang144"
                                                            placeholder="Tax" value="Tax">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Discount *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang145"
                                                            placeholder="Discount" value="Discount">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang146"
                                                            placeholder="Total" value="Total">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Billing Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang147"
                                                            placeholder="Billing Details" value="Billing Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang148"
                                                            placeholder="Shipping Details" value="Shipping Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Ship To Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang149"
                                                            placeholder="Ship To Address" value="Ship To Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Pick Up *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang150"
                                                            placeholder="Pick Up" value="Pick Up">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Pickup Location *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang151"
                                                            placeholder="Pickup Location" value="Pickup Location">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Full Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang152"
                                                            placeholder="Full Name" value="Full Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Phone Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang153"
                                                            placeholder="Phone Number" value="Phone Number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Email *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang154"
                                                            placeholder="Email" value="Email">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang155"
                                                            placeholder="Address" value="Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Country *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang156"
                                                            placeholder="Country" value="Country">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select Country *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang157"
                                                            placeholder="Select Country" value="Select Country">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">City *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang158"
                                                            placeholder="City" value="City">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Postal Code *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang159"
                                                            placeholder="Postal Code" value="Postal Code">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Ship to a Different Address? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang160"
                                                            placeholder="Ship to a Different Address?"
                                                            value="Ship to a Different Address?">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payment Information *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang161"
                                                            placeholder="Payment Information"
                                                            value="Payment Information">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Note *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang217"
                                                            placeholder="Order Note" value="Order Note">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Optional *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang218"
                                                            placeholder="Optional" value="Optional">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang162"
                                                            placeholder="Order Now" value="Order Now">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Card Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang163"
                                                            placeholder="Card Number" value="Card Number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cvv *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang164"
                                                            placeholder="Cvv" value="Cvv">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Month *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang165"
                                                            placeholder="Month" value="Month">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Year *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang166"
                                                            placeholder="Year" value="Year">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Transaction ID# *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang167"
                                                            placeholder="Transaction ID#" value="Transaction ID#">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang743"
                                                            placeholder="Address" value="Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Orders *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang744"
                                                            placeholder="Orders" value="Orders">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payment *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang745"
                                                            placeholder="Payment" value="Payment">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Personal Information *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang746"
                                                            placeholder="Personal Information"
                                                            value="Personal Information">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Your Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang747"
                                                            placeholder="Enter Your Name" value="Enter Your Name">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Your Email *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang748"
                                                            placeholder="Enter Your Email" value="Enter Your Email">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Create an account ? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang749"
                                                            placeholder="Create an account ?"
                                                            value="Create an account ?">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Your Password *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang750"
                                                            placeholder="Enter Your Password"
                                                            value="Enter Your Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Confirm Your Password *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang751"
                                                            placeholder="Confirm Your Password"
                                                            value="Confirm Your Password">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang752"
                                                            placeholder="Shipping Details" value="Shipping Details">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Continue *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang753"
                                                            placeholder="Continue" value="Continue">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang754"
                                                            placeholder="Price" value="Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Quantity *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang755"
                                                            placeholder="Quantity" value="Quantity">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang756"
                                                            placeholder="Total Price" value="Total Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Back *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang757"
                                                            placeholder="Back" value="Back">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Info *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang758"
                                                            placeholder="Shipping Info" value="Shipping Info">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payment Info *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang759"
                                                            placeholder="Payment Info" value="Payment Info">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">PayPal Express *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang760"
                                                            placeholder="PayPal Express" value="PayPal Express">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Credit Card *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang761"
                                                            placeholder="Credit Card" value="Credit Card">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cash On Delivery *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang762"
                                                            placeholder="Cash On Delivery" value="Cash On Delivery">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Instamojo *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang763"
                                                            placeholder="Instamojo" value="Instamojo">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Paytm *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="paytm"
                                                            placeholder="Paytm" value="Paytm">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Razorpay *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="razorpay"
                                                            placeholder="Razorpay" value="Razorpay">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Paystack *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang764"
                                                            placeholder="Paystack" value="Paystack">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Mollie Payment *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang802"
                                                            placeholder="Mollie Payment" value="Mollie Payment">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang765"
                                                            placeholder="Shipping Method" value="Shipping Method">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Packaging *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang766"
                                                            placeholder="Packaging" value="Packaging">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Final Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang767"
                                                            placeholder="Final Price" value="Final Price">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Card number not valid *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang781"
                                                            placeholder="Card number not valid"
                                                            value="Card number not valid">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">CVC number not valid *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang782"
                                                            placeholder="CVC number not valid"
                                                            value="CVC number not valid">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center">Wishlists</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Wishlists *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang168"
                                                            placeholder="Wishlists" value="Wishlists">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">Success</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Success *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang169"
                                                            placeholder="Success" value="Success">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Get Back To Our Homepage *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang170"
                                                            placeholder="Get Back To Our Homepage"
                                                            value="Get Back To Our Homepage">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center">LOGIN</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Login & Register *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang171"
                                                            placeholder="Login & Register" value="Login & Register">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">LOGIN NOW *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang172"
                                                            placeholder="LOGIN NOW" value="LOGIN NOW">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Type Email Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang173"
                                                            placeholder="Type Email Address" value="Type Email Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Get Back To Our Homepage *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang174"
                                                            placeholder="Type Password" value="Type Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Remember Password *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang175"
                                                            placeholder="Remember Password" value="Remember Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Forgot Password? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang176"
                                                            placeholder="Forgot Password?" value="Forgot Password?">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Authenticating... *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang177"
                                                            placeholder="Authenticating..." value="Authenticating...">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Login *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang178"
                                                            placeholder="Login" value="Login">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Vendor Login *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang234"
                                                            placeholder="Vendor Login" value="Vendor Login">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Or *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang179"
                                                            placeholder="Or" value="Or">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Sign In with social media *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang180"
                                                            placeholder="Sign In with social media"
                                                            value="Sign In with social media">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Signup Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang181"
                                                            placeholder="Signup Now" value="Signup Now">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Full Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang182"
                                                            placeholder="Full Name" value="Full Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Email Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang183"
                                                            placeholder="Email Address" value="Email Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Phone Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang184"
                                                            placeholder="Phone Number" value="Phone Number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang185"
                                                            placeholder="Address" value="Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Password *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang186"
                                                            placeholder="Password" value="Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Confirm Password *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang187"
                                                            placeholder="Confirm Password" value="Confirm Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Processing... *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang188"
                                                            placeholder="Processing..." value="Processing...">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Register *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang189"
                                                            placeholder="Register" value="Register">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Vendor Registration *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang235"
                                                            placeholder="Vendor Registration"
                                                            value="Vendor Registration">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Login (Pop Up) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang197"
                                                            placeholder="Login" value="Login">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Register (Pop Up) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang198"
                                                            placeholder="Register" value="Register">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center">FORGOT</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Forgot Password (Header) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang190"
                                                            placeholder="Forgot Password (Header)"
                                                            value="Forgot Password">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Forgot Password (Title) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang191"
                                                            placeholder=">Forgot Password (Title)"
                                                            value="Forgot Password ">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Please Write your Email *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang192"
                                                            placeholder="Please Write your Email"
                                                            value="Please Write your Email">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Email Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang193"
                                                            placeholder="Email Address" value="Email Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Login Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang194"
                                                            placeholder="Login Now" value="Login Now">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Checking... *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang195"
                                                            placeholder="Checking..." value="Checking...">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">SUBMIT *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang196"
                                                            placeholder="SUBMIT" value="SUBMIT">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">VENDOR STORE</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Store Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang226"
                                                            placeholder="Store Name" value="Store Name">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Service Center *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang227"
                                                            placeholder="Service Center" value="Service Center">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Contact Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang228"
                                                            placeholder="Contact Now" value="Contact Now">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Follow Us *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang229"
                                                            placeholder="Follow Us" value="Follow Us">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shop Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang238"
                                                            placeholder="Shop Name" value="Shop Name">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Owner Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang239"
                                                            placeholder="Owner Name" value="Owner Name">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shop Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang240"
                                                            placeholder="Shop Number" value="Shop Number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shop Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang241"
                                                            placeholder="Shop Address" value="Shop Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Registration Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang242"
                                                            placeholder="Registration Number"
                                                            value="Registration Number">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang243"
                                                            placeholder="Message" value="Message">
                                                    </div>
                                                </div>




                                                <hr>

                                                <h4 class="text-center">FOOTER</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Footer Links *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang21"
                                                            placeholder="Footer Links" value="Footer Links">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Home *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang22"
                                                            placeholder="Home" value="Home">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Contact Us *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang23"
                                                            placeholder="Contact Us" value="Contact Us">
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">PAGES *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang901"
                                                            placeholder="PAGES" value="PAGES">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">PAGES *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang908"
                                                            placeholder="PAGES" value="PAGES">
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">About *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang906"
                                                            placeholder="About" value="About">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">About Us*</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang912"
                                                            placeholder="About US" value="About Us">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Features *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang907"
                                                            placeholder="Features" value="Features">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subscribe Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang910"
                                                            placeholder="Subscribe Message" value="Subscribe Message">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shopping Cart *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang900"
                                                            placeholder="Shopping Cart" value="Shopping Cart">
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Recent Post *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang24"
                                                            placeholder="Recent Post" value="Recent Post">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Featured *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang26"
                                                            placeholder="Featured" value="Featured">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Best Seller *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang27"
                                                            placeholder="Best Seller" value="Best Seller">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Flash Deal *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang244"
                                                            placeholder="Flash Deal" value="Flash Deal">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Top Rated *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang28"
                                                            placeholder="Top Rated" value="Top Rated">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Big Save *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang29"
                                                            placeholder="Big Save" value="Big Save">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Hot *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang30"
                                                            placeholder="Hot" value="Hot">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">New *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang31"
                                                            placeholder="New" value="New">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Trending *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang32"
                                                            placeholder="Trending" value="Trending">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Sale *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang33"
                                                            placeholder="Sale" value="Sale">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Read More *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang34"
                                                            placeholder="Read More" value="Read More">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Brands *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang236"
                                                            placeholder="Brands" value="Brands">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center">PRODUCT ADD CART</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add To Wishlist *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang54"
                                                            placeholder="Find Us Here" value="Add To Wishlist">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Quick View *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang55"
                                                            placeholder="Quick View" value="Quick View">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add To Cart *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang56"
                                                            placeholder="Add To Cart" value="Add To Cart">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Compare *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang57"
                                                            placeholder="Compare" value="Compare">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Buy Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang251"
                                                            placeholder="Buy Now" value="Buy Now">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">PRODUCT CATALOG</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Search *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang58"
                                                            placeholder="Search" value="Search">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Tag *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang59"
                                                            placeholder="Tag" value="Tag">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">No Product Found *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang60"
                                                            placeholder="No Product Found" value="No Product Found.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Filter Results By *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang61"
                                                            placeholder="Filter Results By" value="Filter Results By">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">To *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang62"
                                                            placeholder="To" value="To">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Popular Tags *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang63"
                                                            placeholder="Popular Tags" value="Popular Tags">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Sort By *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang64"
                                                            placeholder="Sort By" value="Sort By">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Latest Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang65"
                                                            placeholder="Latest Product" value="Latest Product">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Oldest Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang66"
                                                            placeholder="Oldest Product" value="Oldest Product">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Lowest Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang67"
                                                            placeholder="Lowest Price" value="Lowest Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Highest Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang68"
                                                            placeholder="Highest Price" value="Highest Price">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center">PRODUCT COMPARE</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Compare *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang69"
                                                            placeholder="Compare" value="Compare">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Compare *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang70"
                                                            placeholder="Product Compare" value="Product Compare">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang71"
                                                            placeholder="Product Name" value="Product Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang72"
                                                            placeholder="Price" value="Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Rating *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang73"
                                                            placeholder="Rating" value="Rating">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Description *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang74"
                                                            placeholder="Description" value="Description">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add To Cart *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang75"
                                                            placeholder="Add To Cart" value="Add To Cart">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Remove *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang76"
                                                            placeholder="Remove" value="Remove">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">PRODUCT DETAILS</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product SKU *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang77"
                                                            placeholder="Product SKU" value="Product SKU">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Out Of Stock *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang78"
                                                            placeholder="Out Of Stock" value="Out Of Stock">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">In Stock *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang79"
                                                            placeholder="In Stock" value="In Stock">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Review(s) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang80"
                                                            placeholder="Review(s)" value="Review(s)">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add To Favorite Seller *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang224"
                                                            placeholder="Add To Favorite Seller"
                                                            value="Add To Favorite Seller">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Favorite *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang225"
                                                            placeholder="Favorite" value="Favorite">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Contact Seller *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang81"
                                                            placeholder="Contact Seller" value="Contact Seller">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Platform *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang82"
                                                            placeholder="Platform" value="Platform">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Region *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang83"
                                                            placeholder="Region" value="Region">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">License Type *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang84"
                                                            placeholder="License Type" value="License Type">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Condition *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang85"
                                                            placeholder="Product Condition" value="Product Condition">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Watch Video *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang219"
                                                            placeholder="Watch Video" value="Watch Video">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Estimated Shipping Time *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang86"
                                                            placeholder="Estimated Shipping Time"
                                                            value="Estimated Shipping Time">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang87"
                                                            placeholder="Price" value="Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Size *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang88"
                                                            placeholder="Size" value="Size">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Color *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang89"
                                                            placeholder="Color" value="Color">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add to Cart *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang90"
                                                            placeholder="Add to Cart" value="Add to Cart">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">SHARE *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang91"
                                                            placeholder="SHARE" value="SHARE">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">DESCRIPTION *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang92"
                                                            placeholder="DESCRIPTION" value="DESCRIPTION">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">BUY & RETURN POLICY *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang93"
                                                            placeholder="BUY & RETURN POLICY"
                                                            value="BUY & RETURN POLICY">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Reviews *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang94"
                                                            placeholder="Reviews" value="Reviews">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Comment *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang95"
                                                            placeholder="Comment" value="Comment">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Ratings & Reviews *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang96"
                                                            placeholder="Ratings & Reviews" value="Ratings & Reviews">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">No Review Found. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang97"
                                                            placeholder="No Review Found." value="No Review Found.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Review *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang98"
                                                            placeholder="Review" value="Review">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Your Review *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang99"
                                                            placeholder="Your Review" value="Your Review">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">SUBMIT *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang100"
                                                            placeholder="SUBMIT" value="SUBMIT">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Login *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang101"
                                                            placeholder="Login" value="Login">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">To Review *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang102"
                                                            placeholder="To Review" value="To Review">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">To Comment *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang103"
                                                            placeholder="To Comment" value="To Comment">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Write Comment *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang104"
                                                            placeholder="Write Comment" value="Write Comment">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Write Your Comments Here... *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang105"
                                                            placeholder="Write Your Comments Here..."
                                                            value="Write Your Comments Here...">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Post Comment *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang106"
                                                            placeholder="Post Comment" value="Post Comment">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Reply *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang107"
                                                            placeholder="Reply" value="Reply">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">View *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang108"
                                                            placeholder="View" value="View">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Reply *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang109"
                                                            placeholder="Reply" value="Reply">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Replies *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang110"
                                                            placeholder="Replies" value="Replies">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang111"
                                                            placeholder="Edit" value="Edit">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang112"
                                                            placeholder="Delete" value="Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit Your Comment *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang113"
                                                            placeholder="Edit Your Comment" value="Edit Your Comment">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Submit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang114"
                                                            placeholder="Submit" value="Submit">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang115"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit Your Reply *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang116"
                                                            placeholder="Edit Your Reply" value="Edit Your Reply">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Write your reply *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang117"
                                                            placeholder="Write your reply" value="Write your reply">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Send Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang118"
                                                            placeholder="Send Message" value="Send Message">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subject *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang119"
                                                            placeholder="Subject *" value="Subject *">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Your Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang120"
                                                            placeholder="Your Message " value="Your Message ">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Quick View *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang199"
                                                            placeholder="Product Quick View" value="Product Quick View">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Related Products *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang216"
                                                            placeholder="Related Products" value="Related Products">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Seller's Products *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang245"
                                                            placeholder="Seller's Products" value="Seller's Products">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Sold By *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang246"
                                                            placeholder="Sold By" value="Sold By">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">No Vendor Found *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang247"
                                                            placeholder="No Vendor Found" value="No Vendor Found">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Item *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang248"
                                                            placeholder="Total Item" value="Total Item">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Visit Store *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang249"
                                                            placeholder="Visit Store" value="Visit Store">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Wholesell *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang770"
                                                            placeholder="Wholesell" value="Wholesell">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Quantity *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang768"
                                                            placeholder="Quantity" value="Quantity">
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Discount *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang769"
                                                            placeholder="Discount" value="Discount">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Off *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang771"
                                                            placeholder="Off" value="Off">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Report This Item *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang776"
                                                            placeholder="Report This Item" value="Report This Item">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">REPORT PRODUCT *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang777"
                                                            placeholder="REPORT PRODUCT" value="REPORT PRODUCT">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Please give the following details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang778"
                                                            placeholder="Please give the following details"
                                                            value="Please give the following details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Report Title *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang779"
                                                            placeholder="Enter Report Title" value="Enter Report Title">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Report Note *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang780"
                                                            placeholder="Enter Report Note" value="Enter Report Note">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Verified *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang783"
                                                            placeholder="Verified" value="Verified">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center">CART</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cart *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang121"
                                                            placeholder="Cart " value="Cart">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang122"
                                                            placeholder="Product Name " value="Product Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Size & Color *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang123"
                                                            placeholder="Size & Color" value="Size & Color">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Quantity *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang124"
                                                            placeholder="Quantity " value="Quantity">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Unit Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang125"
                                                            placeholder="Unit Price " value="Unit Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Sub Total *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang126"
                                                            placeholder="Sub Total " value="Sub Total">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">PRICE DETAILS *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang127"
                                                            placeholder="PRICE DETAILS " value="PRICE DETAILS">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total MRP *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang128"
                                                            placeholder="Total MRP " value="Total MRP">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Discount *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang129"
                                                            placeholder="Discount" value="Discount">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Tax *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang130"
                                                            placeholder="Your Message " value="Tax">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang131"
                                                            placeholder="Total " value="Total">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Have a promotion code? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang132"
                                                            placeholder="Have a promotion code?"
                                                            value="Have a promotion code?">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Coupon Code *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang133"
                                                            placeholder="Coupon Code" value="Coupon Code">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Apply *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang134"
                                                            placeholder="Apply" value="Apply">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Place Order *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang135"
                                                            placeholder="Place Order" value="Place Order">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center">CHECKOUT</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Checkout *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang136"
                                                            placeholder="Checkout" value="Checkout">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang137"
                                                            placeholder="Product Name" value="Product Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add To Cart Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Add To Cart Message" name="add_cart"
                                                            value="Successfully Added To Cart">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Already Added To Cart Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Already Added To Cart Message"
                                                            name="already_cart" value="Already Added To Cart">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Out Of Stock Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Out Of Stock Message" name="out_stock"
                                                            value="Out Of Stock">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add To Wishlist Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Add To Wishlist Message" name="add_wish"
                                                            value="Successfully Added To Wishlist">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Already Added To Wishlist Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Already Added To Wishlist Message"
                                                            name="already_wish" value="Already Added To Wishlist">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Wishlist Remove Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Wishlist Remove Message" name="wish_remove"
                                                            value="Successfully Removed From The Wishlist">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add To Compare Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Add To Compare Message" name="add_compare"
                                                            value="Successfully Added To Compare">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Already Added To Compare Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Already Added To Compare Message"
                                                            name="already_compare" value="Already Added To Compare">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Compare Remove Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Compare Remove Message" name="compare_remove"
                                                            value="Successfully Removed From The Compare">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Color Change Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Color Change Message" name="color_change"
                                                            value="Successfully Changed The Color">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Coupon Found Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Coupon Found Message" name="coupon_found"
                                                            value="Coupon Found">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">No Coupon Found Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="No Coupon Found Message" name="no_coupon"
                                                            value="No Coupon Found">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Coupon Already Applied Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Coupon Already Applied Message"
                                                            name="already_coupon" value="Coupon Already Applied">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Email Not Found Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Email Not Found" name="email_not_found"
                                                            value="Email Not Found">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Oops Something Goes Wrong Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Oops Something Goes Wrong !!"
                                                            name="something_wrong" value="Oops Something Goes Wrong !!">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Message Sent Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Message Sent !!" name="message_sent"
                                                            value="Message Sent !!">
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Success Title *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="tawk-area">
                                                            <textarea name="order_title">THANK YOU FOR YOUR PURCHASE.</textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Success Text *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="tawk-area">
                                                            <textarea name="order_text">We'll email you an order confirmation with details and tracking info.</textarea>
                                                        </div>
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center">ERROR PAGE</h4>

                                                <hr>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">404 *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" placeholder="404"
                                                            name="lang427" value="404">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Oops! You're lost... *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field"
                                                            placeholder="Oops! You're lost..." name="lang428"
                                                            value="Oops! You're lost...">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">The page you are looking for might have
                                                                been moved, renamed, or might
                                                                never existed. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="tawk-area">
                                                            <textarea name="lang429">The page you are looking for might have been moved, renamed, or might never existed.</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                                <h4 class="text-center">ORDERS</h4>

                                                <hr>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang534"
                                                            placeholder="Order Number" value="Order Number">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Qty *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang535"
                                                            placeholder="Total Qty" value="Total Qty">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Cost *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang536"
                                                            placeholder="Total Cost" value="Total Cost">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payment Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang537"
                                                            placeholder="Payment Method" value="Payment Method">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Actions *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang538"
                                                            placeholder="Actions" value="Actions">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang539"
                                                            placeholder="Details" value="Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Pending *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang540"
                                                            placeholder="Pending" value="Pending">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Processing *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang541"
                                                            placeholder="Processing" value="Processing">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Completed *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang542"
                                                            placeholder="Completed" value="Completed">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Declined *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang543"
                                                            placeholder="Declined" value="Declined">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Update Status *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang544"
                                                            placeholder="Update Status" value="Update Status">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You are about to update the Order's
                                                                Status. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang545"
                                                            placeholder="You are about to update the Order's Status."
                                                            value="You are about to update the Order's Status.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Do you want to proceed? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang546"
                                                            placeholder="Do you want to proceed?"
                                                            value="Do you want to proceed?">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang547"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Proceed *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang548"
                                                            placeholder="Proceed" value="Proceed">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center">ORDER DETAILS</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang549"
                                                            placeholder="Order Details" value="Order Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payment Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang795"
                                                            placeholder="Payment Method" value="Payment Method">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Charge ID *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang796"
                                                            placeholder="Charge ID" value="Charge ID">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Transaction ID *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang797"
                                                            placeholder="Transaction ID" value="Transaction ID">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payment Status *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang798"
                                                            placeholder="Payment Status" value="Payment Status">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Unpaid *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang799"
                                                            placeholder="Unpaid" value="Unpaid">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Paid *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang800"
                                                            placeholder="Paid" value="Paid">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Note *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang801"
                                                            placeholder="Order Note" value="Order Note">
                                                    </div>
                                                </div>







                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Back *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang550"
                                                            placeholder="Back" value="Back">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order ID *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang551"
                                                            placeholder="Order ID" value="Order ID">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang552"
                                                            placeholder="Total Product" value="Total Product">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Cost *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang553"
                                                            placeholder="Total Cost" value="Total Cost">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Ordered Date *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang554"
                                                            placeholder="Ordered Date" value="Ordered Date">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">View Invoice *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang555"
                                                            placeholder="View Invoice" value="View Invoice">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Billing Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang556"
                                                            placeholder="Billing Details" value="Billing Details">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Customer Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang557"
                                                            placeholder="Customer Name" value="Customer Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Email *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang558"
                                                            placeholder="Email" value="Email">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Phone *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang559"
                                                            placeholder="Phone" value="Phone">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang560"
                                                            placeholder="Address" value="Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Country *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang561"
                                                            placeholder="Country" value="Country">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">City *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang562"
                                                            placeholder="City" value="City">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Postal Code *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang563"
                                                            placeholder="Postal Code" value="Postal Code">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang564"
                                                            placeholder="Shipping Details" value="Shipping Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Pickup Location *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang565"
                                                            placeholder="Pickup Location" value="Pickup Location">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Products Ordered *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang566"
                                                            placeholder="Products Ordered" value="Products Ordered">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product ID# *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang567"
                                                            placeholder="Product ID#" value="Product ID#">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shop Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang568"
                                                            placeholder="Shop Name" value="Shop Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Status *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang569"
                                                            placeholder="Status" value="Status">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Title *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang570"
                                                            placeholder="Product Title" value="Product Title">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Quantity *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang571"
                                                            placeholder="Quantity" value="Quantity">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Size *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang572"
                                                            placeholder="Size" value="Size">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Color *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang573"
                                                            placeholder="Color" value="Color">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang574"
                                                            placeholder="Total Price" value="Total Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Vendor Removed *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang575"
                                                            placeholder="Vendor Removed" value="Vendor Removed">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Send Email *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang576"
                                                            placeholder="Send Email" value="Send Email">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">License Key *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang577"
                                                            placeholder="License Key" value="License Key">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">The Licenes Key is *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang578"
                                                            placeholder="The Licenes Key is" value="The Licenes Key is">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter New License Key *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang579"
                                                            placeholder="Enter New License Key"
                                                            value="Enter New License Key">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Close *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang580"
                                                            placeholder="Close" value="Close">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang584"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Save License *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang585"
                                                            placeholder="Save License" value="Save License">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Email Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang583"
                                                            placeholder="Email Address" value="Email Address">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subject *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang581"
                                                            placeholder="Subject" value="Subject">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Your Message *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang582"
                                                            placeholder="Your Message" value="Your Message">
                                                    </div>
                                                </div>



                                                <hr>

                                                <h4 class="text-center">ORDER INVOICE</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Invoice *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang586"
                                                            placeholder="Order Invoice" value="Order Invoice">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Billing Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang587"
                                                            placeholder="Billing Address" value="Billing Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Invoice Number *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang588"
                                                            placeholder="Invoice Number" value="Invoice Number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Date *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang589"
                                                            placeholder="Order Date" value="Order Date">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order ID *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang590"
                                                            placeholder="Order ID" value="Order ID">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang591"
                                                            placeholder="Product" value="Product">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Size *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang592"
                                                            placeholder="Size" value="Size">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Color *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang593"
                                                            placeholder="Color" value="Color">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang594"
                                                            placeholder="Price" value="Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Qty *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang595"
                                                            placeholder="Qty" value="Qty">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Packaging Cost *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang596"
                                                            placeholder="Packaging Cost" value="Packaging Cost">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subtotal *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang597"
                                                            placeholder="Subtotal" value="Subtotal">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Cost *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang598"
                                                            placeholder="Shipping Cost" value="Shipping Cost">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">TAX *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang599"
                                                            placeholder="TAX" value="TAX">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Total *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang600"
                                                            placeholder="Total" value="Total">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Order Details *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang601"
                                                            placeholder="Order Details" value="Order Details">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang602"
                                                            placeholder="Shipping Method" value="Shipping Method">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Pick Up *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang603"
                                                            placeholder="Pick Up" value="Pick Up">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Ship To Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang604"
                                                            placeholder="Ship To Address" value="Ship To Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payment Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang605"
                                                            placeholder="Payment Method" value="Payment Method">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang606"
                                                            placeholder="Shipping Address" value="Shipping Address">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Print Invoice *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang607"
                                                            placeholder="Print Invoice" value="Print Invoice">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">PRODUCTS & AFFILIATE PRODUCTS</h4>

                                                <hr>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang608"
                                                            placeholder="Name" value="Name">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Sku *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang793"
                                                            placeholder="Product Sku" value="Product Sku">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Product Sku *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang794"
                                                            placeholder="Enter Product Sku" value="Enter Product Sku">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Type *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang609"
                                                            placeholder="Type" value="Type">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang610"
                                                            placeholder="Price" value="Price">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Status *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang611"
                                                            placeholder="Status" value="Status">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Actions *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang612"
                                                            placeholder="Actions" value="Actions">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Activated *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang713"
                                                            placeholder="Activated" value="Activated">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Deactivated *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang714"
                                                            placeholder="Deactivated" value="Deactivated">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang715"
                                                            placeholder="Edit" value="Edit">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">View Gallery *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang716"
                                                            placeholder="View Gallery" value="View Gallery">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Close *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang613"
                                                            placeholder="Close" value="Close">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Confirm Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang614"
                                                            placeholder="Confirm Delete" value="Confirm Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You are about to delete this Product. *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang615"
                                                            placeholder="You are about to delete this Product."
                                                            value="You are about to delete this Product.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Do you want to proceed? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang616"
                                                            placeholder="Do you want to proceed?"
                                                            value="Do you want to proceed?">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang617"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang618"
                                                            placeholder="Delete" value="Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Image Gallery *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang619"
                                                            placeholder="Image Gallery" value="Image Gallery">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Upload File *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang620"
                                                            placeholder="Upload File" value="Upload File">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Done *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang621"
                                                            placeholder="Done" value="Done">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You can upload multiple Images. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang622"
                                                            placeholder="You can upload multiple Images."
                                                            value="You can upload multiple Images.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add New Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang623"
                                                            placeholder="Add New Product" value="Add New Product">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">No Images Found. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang624"
                                                            placeholder="No Images Found." value="No Images Found.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Types *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang625"
                                                            placeholder="Product Types" value="Product Types">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Physical *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang626"
                                                            placeholder="Physical" value="Physical">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Digital *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang627"
                                                            placeholder="Digital" value="Digital">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">License *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang628"
                                                            placeholder="License" value="License">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Physical Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang629"
                                                            placeholder="Physical Product" value="Physical Product">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Digital Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang630"
                                                            placeholder="Digital Product" value="Digital Product">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">License Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang631"
                                                            placeholder="License Product" value="License Product">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang632"
                                                            placeholder="Product Name" value="Product Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Allow Product Condition *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang633"
                                                            placeholder="Allow Product Condition"
                                                            value="Allow Product Condition">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Condition *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang634"
                                                            placeholder="Product Condition" value="Product Condition">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">New *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang635"
                                                            placeholder="New" value="New">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Used *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang636"
                                                            placeholder="Used" value="Used">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Category *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang637"
                                                            placeholder="Category" value="Category">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select Category *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang691"
                                                            placeholder="Select Category" value="Select Category">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Sub Category *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang638"
                                                            placeholder="Sub Category" value="Sub Category">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select Sub Category *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang639"
                                                            placeholder="Select Sub Category"
                                                            value="Select Sub Category">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Child Category *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang640"
                                                            placeholder="Child Category" value="Child Category">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select Child Category *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang641"
                                                            placeholder="Select Child Category"
                                                            value="Select Child Category">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Feature Image *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang642"
                                                            placeholder="Feature Image" value="Feature Image">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Upload Image Here *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang643"
                                                            placeholder="Upload Image Here" value="Upload Image Here">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Gallery Images *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang644"
                                                            placeholder="Product Gallery Images"
                                                            value="Product Gallery Images">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Set Gallery *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang645"
                                                            placeholder="Set Gallery" value="Set Gallery">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Allow Estimated Shipping Time *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang646"
                                                            placeholder="Allow Estimated Shipping Time"
                                                            value="Allow Estimated Shipping Time">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Estimated Shipping Time *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang647"
                                                            placeholder="Product Estimated Shipping Time"
                                                            value="Product Estimated Shipping Time">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Allow Product Sizes *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang648"
                                                            placeholder="Allow Product Sizes"
                                                            value="Allow Product Sizes">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Size Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang649"
                                                            placeholder="Size Name" value="Size Name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(eg. S,M,L,XL,XXL,3XL,4XL) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang650"
                                                            placeholder="(eg. S,M,L,XL,XXL,3XL,4XL)"
                                                            value="(eg. S,M,L,XL,XXL,3XL,4XL)">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Size Qty *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang651"
                                                            placeholder="Size Qty" value="Size Qty">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(Number of quantity of this size) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang652"
                                                            placeholder="(Number of quantity of this size)"
                                                            value="(Number of quantity of this size)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Size Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang653"
                                                            placeholder="Size Price" value="Size Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(This price will be added with base price)
                                                                *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang654"
                                                            placeholder="(This price will be added with base price)"
                                                            value="(This price will be added with base price)">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add More Size *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang655"
                                                            placeholder="Add More Size" value="Add More Size">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Allow Product Colors *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang656"
                                                            placeholder="Allow Product Colors"
                                                            value="Allow Product Colors">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Colors *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang657"
                                                            placeholder="Product Colors" value="Product Colors">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(Choose Your Favorite Colors) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang658"
                                                            placeholder="(Choose Your Favorite Colors)"
                                                            value="(Choose Your Favorite Colors)">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add More Color *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang659"
                                                            placeholder="Add More Color" value="Add More Color">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Allow Product Whole Sell *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang660"
                                                            placeholder="Allow Product Whole Sell"
                                                            value="Allow Product Whole Sell">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Quantity *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang661"
                                                            placeholder="Enter Quantity" value="Enter Quantity">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Discount Percentage *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang662"
                                                            placeholder="Enter Discount Percentage"
                                                            value="Enter Discount Percentage">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add More Field *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang663"
                                                            placeholder="Add More Field" value="Add More Field">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Current Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang664"
                                                            placeholder="Product Current Price"
                                                            value="Product Current Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">In *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang665"
                                                            placeholder="In" value="In">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">e.g 20 *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang666"
                                                            placeholder="e.g 20" value="e.g 20">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Previous Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang667"
                                                            placeholder="Product Previous Price"
                                                            value="Product Previous Price">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(Optional) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang668"
                                                            placeholder="(Optional)" value="(Optional)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Stock *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang669"
                                                            placeholder="Product Stock" value="Product Stock">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(Leave Empty will Show Always Available) *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang670"
                                                            placeholder="(Leave Empty will Show Always Available)"
                                                            value="(Leave Empty will Show Always Available)">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Allow Product Measurement *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang671"
                                                            placeholder="Allow Product Measurement"
                                                            value="Allow Product Measurement">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Measurement *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang672"
                                                            placeholder="Product Measurement"
                                                            value="Product Measurement">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">None *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang673"
                                                            placeholder="None" value="None">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Gram *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang674"
                                                            placeholder="Gram" value="Gram">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Kilogram *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang675"
                                                            placeholder="Kilogram" value="Kilogram">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Litre *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang676"
                                                            placeholder="Litre" value="Litre">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Pound *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang677"
                                                            placeholder="Pound" value="Pound">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Custom *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang678"
                                                            placeholder="Custom" value="Custom">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Unit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang679"
                                                            placeholder="Enter Unit" value="Enter Unit">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Description *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang680"
                                                            placeholder="Product Description"
                                                            value="Product Description">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Buy/Return Policy *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang681"
                                                            placeholder="Product Buy/Return Policy"
                                                            value="Product Buy/Return Policy">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Youtube Video URL *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang682"
                                                            placeholder="Youtube Video URL" value="Youtube Video URL">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Allow Product SEO *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang683"
                                                            placeholder="Allow Product SEO" value="Allow Product SEO">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Meta Tags *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang684"
                                                            placeholder="Meta Tags" value="Meta Tags">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Meta Description *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang685"
                                                            placeholder="Meta Description" value="Meta Description">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Feature Tags *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang686"
                                                            placeholder="Feature Tags" value="Feature Tags">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Your Keyword *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang687"
                                                            placeholder="Enter Your Keyword" value="Enter Your Keyword">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add More Field *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang688"
                                                            placeholder="Add More Field" value="Add More Field">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Tags *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang689"
                                                            placeholder="Tags" value="Tags">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Create Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang690"
                                                            placeholder="Create Product" value="Create Product">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select Upload Type *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang692"
                                                            placeholder="Select Upload Type" value="Select Upload Type">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Upload By File *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang693"
                                                            placeholder="Upload By File" value="Upload By File">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Upload By Link *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang694"
                                                            placeholder="Upload By Link" value="Upload By Link">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select File *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang695"
                                                            placeholder="Select File" value="Select File">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Link *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang696"
                                                            placeholder="Link" value="Link">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product License *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang697"
                                                            placeholder="Product License" value="Product License">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">License Key *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang698"
                                                            placeholder="License Key" value="License Key">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">License Quantity *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang699"
                                                            placeholder="License Quantity" value="License Quantity">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add More Field *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang700"
                                                            placeholder="Add More Field" value="Add More Field">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Platform *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang701"
                                                            placeholder="Product Platform" value="Product Platform">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Region *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang702"
                                                            placeholder="Product Region" value="Product Region">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">License Type *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang703"
                                                            placeholder="License Type" value="License Type">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit Product *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang704"
                                                            placeholder="Edit Product" value="Edit Product">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang705"
                                                            placeholder="Edit" value="Edit">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Save *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang706"
                                                            placeholder="Save" value="Save">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Product Affiliate Link *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang707"
                                                            placeholder="Product Affiliate Link"
                                                            value="Product Affiliate Link">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">(External Link) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang708"
                                                            placeholder="(External Link)" value="(External Link)">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Feature Image Source *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang709"
                                                            placeholder="Feature Image Source"
                                                            value="Feature Image Source">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">File *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang710"
                                                            placeholder="File" value="File">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Link *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang711"
                                                            placeholder="Link" value="Link">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Feature Image Link *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang712"
                                                            placeholder="Feature Image Link" value="Feature Image Link">
                                                    </div>
                                                </div>




                                                <hr>

                                                <h4 class="text-center">BULK PRODUCT UPLOAD</h4>

                                                <hr>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Download Sample CSV *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang531"
                                                            placeholder="Download Sample CSV"
                                                            value="Download Sample CSV">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Upload a File *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang532"
                                                            placeholder="Upload a File" value="Upload a File">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Start Import *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang533"
                                                            placeholder="Start Import" value="Start Import">
                                                    </div>
                                                </div>




                                                <hr>

                                                <h4 class="text-center">WITHDRAW</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">My Withdraws *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang472"
                                                            placeholder="My Withdraws" value="My Withdraws">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang473"
                                                            placeholder="Withdraw Now" value="Withdraw Now">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Date *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang474"
                                                            placeholder="Withdraw Date" value="Withdraw Date">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang475"
                                                            placeholder="Method" value="Method">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Account *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang476"
                                                            placeholder="Account" value="Account">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Amount *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang477"
                                                            placeholder="Amount" value="Amount">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Status *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang478"
                                                            placeholder="Status" value="Status">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">WITHDRAW NOW</h4>

                                                <hr>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Now *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang479"
                                                            placeholder="Withdraw Now" value="Withdraw Now">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Back *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang480"
                                                            placeholder="Back" value="Back">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang481"
                                                            placeholder="Withdraw Method" value="Withdraw Method">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Select Withdraw Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang482"
                                                            placeholder="Select Withdraw Method"
                                                            value="Select Withdraw Method">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Paypal *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang483"
                                                            placeholder="Paypal" value="Paypal">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Skrill *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang484"
                                                            placeholder="Skrill" value="Skrill">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Payoneer *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang485"
                                                            placeholder="Payoneer" value="Payoneer">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Bank *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang486"
                                                            placeholder="Bank" value="Bank">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Amount *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang487"
                                                            placeholder="Withdraw Amount" value="Withdraw Amount">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Account Email *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang488"
                                                            placeholder="Enter Account Email"
                                                            value="Enter Account Email">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter IBAN/Account No *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang489"
                                                            placeholder="Enter IBAN/Account No"
                                                            value="Enter IBAN/Account No">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Account Name *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang490"
                                                            placeholder="Enter Account Name" value="Enter Account Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Address *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang491"
                                                            placeholder="Enter Address" value="Enter Address">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Enter Swift Code *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang492"
                                                            placeholder="Enter Swift Code" value="Enter Swift Code">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Additional Reference(Optional) *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang493"
                                                            placeholder="Additional Reference(Optional)"
                                                            value="Additional Reference(Optional)">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw Fee *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang494"
                                                            placeholder="Withdraw Fee" value="Withdraw Fee">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">and *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang495"
                                                            placeholder="and" value="and">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">will deduct from your account. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang496"
                                                            placeholder="will deduct from your account."
                                                            value="will deduct from your account.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Withdraw *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang497"
                                                            placeholder="Withdraw" value="Withdraw">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Current Balance *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang498"
                                                            placeholder="Current Balance" value="Current Balance">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">Services</h4>

                                                <hr>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">SERVICE *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang499"
                                                            placeholder="SERVICE" value="SERVICE">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Featured Image *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang500"
                                                            placeholder="Featured Image" value="Featured Image">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Title *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang501"
                                                            placeholder="Title" value="Title">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Actions *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang502"
                                                            placeholder="Actions" value="Actions">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang717"
                                                            placeholder="Edit" value="Edit">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Close *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang503"
                                                            placeholder="Close" value="Close">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Confirm Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang504"
                                                            placeholder="Confirm Delete" value="Confirm Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You are about to delete this Service. *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang505"
                                                            placeholder="You are about to delete this Service."
                                                            value="You are about to delete this Service.">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Do you want to proceed? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang506"
                                                            placeholder="Do you want to proceed?"
                                                            value="Do you want to proceed?">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang507"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang508"
                                                            placeholder="Delete" value="Delete">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add New Service *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang509"
                                                            placeholder="Add New Service" value="Add New Service">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Title *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang510"
                                                            placeholder="Title" value="Title">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Current Featured Image *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang511"
                                                            placeholder="Current Featured Image"
                                                            value="Current Featured Image">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Upload Image *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang512"
                                                            placeholder="Upload Image" value="Upload Image">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Prefered Size: (600x600) or Square Sized
                                                                Image *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang513"
                                                            placeholder="Prefered Size: (600x600) or Square Sized Image"
                                                            value="Prefered Size: (600x600) or Square Sized Image">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Description *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang514"
                                                            placeholder="Description" value="Description">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Create Service *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang515"
                                                            placeholder="Create Service" value="Create Service">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Save *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang516"
                                                            placeholder="Save" value="Save">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">SHIPPING METHODS AND PACKAGING</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">SHIPPING METHOD *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang718"
                                                            placeholder="SHIPPING METHOD" value="SHIPPING METHOD">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Methods *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang719"
                                                            placeholder="Shipping Methods" value="Shipping Methods">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">PACKAGING *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang720"
                                                            placeholder="PACKAGING" value="PACKAGING">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Packagings *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang721"
                                                            placeholder="Packagings" value="Packagings">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Title *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang722"
                                                            placeholder="Title" value="Title">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang723"
                                                            placeholder="Price" value="Price">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Actions *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang724"
                                                            placeholder="Actions" value="Actions">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Edit *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang725"
                                                            placeholder="Edit" value="Edit">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Close *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang726"
                                                            placeholder="Close" value="Close">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Confirm Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang734"
                                                            placeholder="Confirm Delete" value="Confirm Delete">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You are about to delete this Shipping
                                                                Method. *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang727"
                                                            placeholder="You are about to delete this Shipping Method."
                                                            value="You are about to delete this Shipping Method.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">You are about to delete this Packaging. *
                                                            </h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang728"
                                                            placeholder="You are about to delete this Packaging."
                                                            value="You are about to delete this Packaging.">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Do you want to proceed? *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang729"
                                                            placeholder="Do you want to proceed?"
                                                            value="Do you want to proceed?">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Cancel *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang730"
                                                            placeholder="Cancel" value="Cancel">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Delete *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang731"
                                                            placeholder="Delete" value="Delete">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add New Shipping Method *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang732"
                                                            placeholder="Add New Shipping Method"
                                                            value="Add New Shipping Method">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Add New Packaging *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang733"
                                                            placeholder="Add New Packaging" value="Add New Packaging">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Title *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang735"
                                                            placeholder="Title" value="Title">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Subtitle *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang736"
                                                            placeholder="Subtitle" value="Subtitle">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Duration *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang737"
                                                            placeholder="Duration" value="Duration">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Price *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang738"
                                                            placeholder="Price" value="Price">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Create *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang739"
                                                            placeholder="Create" value="Create">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Save *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang740"
                                                            placeholder="Save" value="Save">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center">BANNER</h4>

                                                <hr>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Current Banner *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang520"
                                                            placeholder="Current Banner" value="Current Banner">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Prefered Size: (1920x220) or Square Sized
                                                                Image *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang521"
                                                            placeholder="Prefered Size: (1920x220) or Square Sized Image"
                                                            value="Prefered Size: (1920x220) or Square Sized Image">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Upload Banner *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang522"
                                                            placeholder="Upload Banner" value="Upload Banner">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Save *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang523"
                                                            placeholder="Save" value="Save">
                                                    </div>
                                                </div>


                                                <hr>

                                                <h4 class="text-center">SHIPPING COST</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Shipping Cost *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang524"
                                                            placeholder="Shipping Cost" value="Shipping Cost">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Save *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang525"
                                                            placeholder="Save" value="Save">
                                                    </div>
                                                </div>

                                                <hr>

                                                <h4 class="text-center">SOCIAL LINKS</h4>

                                                <hr>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Facebook *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang526"
                                                            placeholder="Facebook " value="Facebook ">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Google Plus *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang527"
                                                            placeholder="Google Plus" value="Google Plus">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Twitter *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang528"
                                                            placeholder="Twitter" value="Twitter">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Linkedin *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang529"
                                                            placeholder="Linkedin" value="Linkedin">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">Save *</h4>
                                                            <p class="sub-heading">(In Any Language)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="lang530"
                                                            placeholder="Save" value="Save">
                                                    </div>
                                                </div>



                                            </div>






                                            {{-- VENDOR PANEL ENDS --}}
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
