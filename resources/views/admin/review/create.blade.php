@extends('layouts.load')

@section('content')
    <div class="content-area">

        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
                            <form id="geniusformdata" action="{{ route('admin-review-create') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Title') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="title"
                                            placeholder="{{ __('Title') }}" required="" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Arabic Title') }} *</h4>
                                            <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="title_ar"
                                            placeholder="{{ __('Arabic Title') }}" required="" value="">
                                    </div>
                                </div>

                                <!-- <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Sub Title') }} *</h4>
                                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="subtitle" placeholder="{{ __('Sub Title') }}" required="" value="">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Arabic Sub Title') }} *</h4>
                                    <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="subtitle_ar" placeholder="{{ __('Arabic Sub Title') }}" required="" value="">
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                  <h4 class="heading">{{ __('Rate') }} *</h4>
                                  <p class="sub-heading">{{ __('(1 : 5)') }}</p>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="number" class="input-field" name="rate" placeholder="{{ __('Rate') }}" value=" " required="">
                              </div>
                            </div>-->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Current Featured Image') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview"
                                                style="background: url({{ asset(access_public() . 'assets/admin/images/upload.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload" id="image-upload">
                                            </div>
                                            <p class="text">{{ __('Prefered Size:  or Square Sized Image') }}</p>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Description') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <textarea class="input-field" name="details" placeholder="{{ __('Description') }}"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Arabic Description') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <textarea class="input-field" name="details_ar" placeholder="{{ __('Arabic Description') }}"></textarea>
                                    </div>
                                </div> <!-- nic-edit -->

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">{{ __('Create') }}</button>
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
