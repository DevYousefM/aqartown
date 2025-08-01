@extends('layouts.load')

@section('content')
    <div class="content-area">

        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
                            <form id="geniusformdata" action="{{ route('admin-service-update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <!--  -->

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Title') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="title"
                                            placeholder="{{ __('Title') }}" value="{{ $data->title }}">
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
                                            placeholder="{{ __('Arabic Title') }}" value="{{ $data->title_ar }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('mini desc') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="name"
                                            placeholder="{{ __('mini desc') }}" value="{{ $data->name }}"
                                            required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Arabic mini desc') }} *</h4>
                                            <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="name_ar"
                                            placeholder="{{ __('Arabic mini desc') }}" value="{{ $data->name_ar }}"
                                            required="">
                                    </div>
                                </div>
                                <!--     <div class="row">
                                  <div class="col-lg-4">
                                    <div class="left-area">
                                      <h4 class="heading">{{ __('facebook') }} *</h4>

                                    </div>
                                  </div>
                                  <div class="col-lg-7">
                                    <input type="text" class="input-field" name="facebook" placeholder="{{ __('facebook link') }}"  value="{{ $data->facebook }}">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-4">
                                    <div class="left-area">
                                      <h4 class="heading">{{ __('twiter') }} *</h4>

                                    </div>
                                  </div>
                                  <div class="col-lg-7">
                                    <input type="text" class="input-field" name="twiter" placeholder="{{ __('twiter link') }}"  value="{{ $data->twiter }}">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-4">
                                    <div class="left-area">
                                      <h4 class="heading">{{ __('linkedin') }} *</h4>

                                    </div>
                                  </div>
                                  <div class="col-lg-7">
                                    <input type="text" class="input-field" name="linkedin" placeholder="{{ __('linkedin link') }}"  value="{{ $data->linkedin }}">
                                  </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Current Featured Image') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview"
                                                style="background: url({{ $data->photo ? asset(access_public() . 'assets/images/services/' . $data->photo) : asset(access_public() . 'assets/images/noimage.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload"
                                                    id="image-upload">
                                            </div>
                                            <p class="text">{{ __('Prefered Size: (600x600) or Square Sized Image') }}
                                            </p>
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
                                        <textarea class="input-field" name="details" placeholder="{{ __('Description') }}">{{ $data->details }}</textarea>
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
                                        <textarea class="input-field" name="details_ar" placeholder="{{ __('Arabic Description') }}">{{ $data->details_ar }}</textarea>
                                    </div>
                                </div> <!--  -->



                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
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
