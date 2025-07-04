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
                style="background: url({{ asset(access_public() . 'assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
            </div>
            <div class="row justify-content-center">

                <div class="col-xl-4 col-md-6">
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                                {{ __('banner background photo') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')
                            <div class="currrent-logo">
                                <img src="{{ $gs->feature_icon ? asset(access_public() . 'assets/images/' . $gs->feature_icon) : asset(access_public() . 'assets/images/noimage.png') }}"
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
                <!-- -->
                <div class="col-xl-4 col-md-6">
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                                {{ __(' Header BLock') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')
                            <div class="currrent-logo">
                                <img src="{{ $gs->best_icon ? asset(access_public() . 'assets/images/' . $gs->best_icon) : asset(access_public() . 'assets/images/noimage.png') }}"
                                    alt="">
                            </div>
                            <div class="set-logo">
                                <input class="img-upload1" type="file" name="best_icon">
                            </div>

                            <div class="submit-area mb-4">
                                <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{--    <div class="col-xl-4 col-md-6">
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                              {{ __('Gallery Header BLock') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}   

                             @include('includes.admin.form-both')  
                          <div class="currrent-logo">
                            <img src="{{ $gs->top_icon ? asset(access_public() . 'assets/images/'.$gs->top_icon):asset(access_public() . 'assets/images/noimage.png')}}" alt="">
                          </div>
                          <div class="set-logo">
                            <input class="img-upload1" type="file" name="top_icon">
                          </div>

                          <div class="submit-area mb-4">
                            <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                          </div>
                        </form>
                    </div>
                </div>
                
                
                  <div class="col-xl-4 col-md-6" >
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                              {{ __('offer banner Header BLock') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}   

                             @include('includes.admin.form-both')  
                          <div class="currrent-logo">
                            <img src="{{ $gs->big_icon ? asset(access_public() . 'assets/images/'.$gs->big_icon):asset(access_public() . 'assets/images/noimage.png')}}" alt="">
                          </div>
                          <div class="set-logo">
                            <input class="img-upload1" type="file" name="big_icon">
                          </div>

                          <div class="submit-area mb-4">
                            <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                          </div>
                        </form>
                    </div>
                </div> --}}

                <!--     <div class="col-xl-4 col-md-6" >
                            <div class="special-box bg-gray">
                                <div class="heading-area">
                                    <h4 class="title">
                                      {{ __('appointment background Header BLock') }}
                                    </h4>
                                </div>

                                <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                                  {{ csrf_field() }}

                                     @include('includes.admin.form-both')
                                  <div class="currrent-logo">
                                    <img src="{{ $gs->new_icon ? asset(access_public() . 'assets/images/' . $gs->new_icon) : asset(access_public() . 'assets/images/noimage.png') }}" alt="">
                                  </div>
                                  <div class="set-logo">
                                    <input class="img-upload1" type="file" name="new_icon">
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
                                      {{ __('Blog Banner Header BLock') }}
                                    </h4>
                                </div>

                                <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                                  {{ csrf_field() }}

                                     @include('includes.admin.form-both')
                                  <div class="currrent-logo">
                                    <img src="{{ $gs->hot_icon ? asset(access_public() . 'assets/images/' . $gs->hot_icon) : asset(access_public() . 'assets/images/noimage.png') }}" alt="">
                                  </div>
                                  <div class="set-logo">
                                    <input class="img-upload1" type="file" name="hot_icon">
                                  </div>

                                  <div class="submit-area mb-4">
                                    <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                          -->
                <div class="col-xl-4 col-md-6">
                    <div class="special-box bg-gray">
                        <div class="heading-area">
                            <h4 class="title">
                                {{ __(' page Header BLock') }}
                            </h4>
                        </div>

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')
                            <div class="currrent-logo">
                                <img src="{{ $gs->trending_icon ? asset(access_public() . 'assets/images/' . $gs->trending_icon) : asset(access_public() . 'assets/images/noimage.png') }}"
                                    alt="">
                            </div>
                            <div class="set-logo">
                                <input class="img-upload1" type="file" name="trending_icon">
                            </div>

                            <div class="submit-area mb-4">
                                <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--
                           <div class="col-xl-4 col-md-6">
                            <div class="special-box bg-gray">
                                <div class="heading-area">
                                    <h4 class="title">
                                      {{ __('Contact Us Header BLock') }}
                                    </h4>
                                </div>

                                <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                                  {{ csrf_field() }}

                                     @include('includes.admin.form-both')
                                  <div class="currrent-logo">
                                    <img src="{{ $gs->discount_icon ? asset(access_public() . 'assets/images/' . $gs->discount_icon) : asset(access_public() . 'assets/images/noimage.png') }}" alt="">
                                  </div>
                                  <div class="set-logo">
                                    <input class="img-upload1" type="file" name="discount_icon">
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
                                      {{ __('footer image') }}
                                    </h4>
                                </div>

                                <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST" enctype="multipart/form-data">
                                  {{ csrf_field() }}

                                     @include('includes.admin.form-both')
                                  <div class="currrent-logo">
                                    <img src="{{ $gs->contact_icon ? asset(access_public() . 'assets/images/' . $gs->contact_icon) : asset(access_public() . 'assets/images/noimage.png') }}" alt="">
                                  </div>
                                  <div class="set-logo">
                                    <input class="img-upload1" type="file" name="contact_icon">
                                  </div>

                                  <div class="submit-area mb-4">
                                    <button type="submit" class="submit-btn">{{ __('Submit') }}</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                      -->
            </div>
        </div>
    </div>
@endsection
