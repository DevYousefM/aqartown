@extends('layouts.admin')
@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Website BLocks Icons') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('General Settings') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-gs-logo') }}">{{ __('Website Block Icons') }}</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="add-logo-area">
            <div class="gocover"
                style="background: url({{ asset('public/assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
            </div>
            <div class="row justify-content-center">

                <div class="col-xl-4 col-md-6">
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                                {{ __('Footer background photo') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')
                            <div class="currrent-logo">
                                <img src="{{ $gs->feature_icon ? asset('public/assets/images/' . $gs->feature_icon) : asset('public/assets/images/noimage.png') }}"
                                    alt="">
                            </div>
                            <div class="set-logo">
                                <input class="img-upload1" type="file" name="feature_icon">
                            </div>

                            <div class="submit-area mb-4">
                                <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                                {{ __('About section') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')
                            <div class="currrent-logo">
                                <img src="{{ $gs->about_background ? asset('public/assets/images/' . $gs->about_background) : asset('public/assets/images/noimage.png') }}"
                                    alt="">
                            </div>
                            <div class="set-logo">
                                <input class="img-upload1" type="file" name="about_background">
                            </div>

                            <div class="submit-area mb-4">
                                <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                                {{ __('Services section') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')
                            <div class="currrent-logo">
                                <img src="{{ $gs->service_background ? asset('public/assets/images/' . $gs->service_background) : asset('public/assets/images/noimage.png') }}"
                                    alt="">
                            </div>
                            <div class="set-logo">
                                <input class="img-upload1" type="file" name="service_background">
                            </div>

                            <div class="submit-area mb-4">
                                <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-xl-4 col-md-6">
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                                {{ __('contact section') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')
                            <div class="currrent-logo">
                                <img src="{{ $gs->contact_background ? asset('public/assets/images/' . $gs->contact_background) : asset('public/assets/images/noimage.png') }}"
                                    alt="">
                            </div>
                            <div class="set-logo">
                                <input class="img-upload1" type="file" name="contact_background">
                            </div>

                            <div class="submit-area mb-4">
                                <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                                {{ __('About Page background') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')
                            <div class="currrent-logo">
                                <img src="{{ $gs->about_page_background ? asset('public/assets/images/' . $gs->about_page_background) : asset('public/assets/images/noimage.png') }}"
                                    alt="">
                            </div>
                            <div class="set-logo">
                                <input class="img-upload1" type="file" name="about_page_background">
                            </div>

                            <div class="submit-area mb-4">
                                <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection
