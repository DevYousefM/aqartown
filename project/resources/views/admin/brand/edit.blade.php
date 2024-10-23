@extends('layouts.load')

@section('content')
    <div class="content-area">

        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
                            <form id="geniusformdata" action="{{ route('admin-brand-update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Title') }}* </h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" placeholder="{{ __('Enter  Title') }}"
                                            value="{{ $data->title }}" name="title">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('title') }}* </h4>
                                            <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Enter Arabic Title') }}" value="{{ $data->title_ar }}"
                                            name="title_ar">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Name') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="name"
                                            placeholder="{{ __('Enter Name') }}" required=""
                                            value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Arabic Name') }} *</h4>
                                            <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="name_ar"
                                            placeholder="{{ __('Enter Arabic Name') }}" required=""
                                            value="{{ $data->name_ar }}">
                                    </div>
                                </div>


                                <!--
                              <div class="row">
                                  <div class="col-lg-4">
                                      <div class="left-area">
                                          <h4 class="heading">{{ __('About Section video link') }}* </h4>

                                      </div>
                                  </div>
                                  <div class="col-lg-7">
                                      <input type="text" class="input-field" placeholder="{{ __('Enter About Section video link') }}"   name="video" value="{{ $data->video }}">
                                  </div>
                              </div> -->


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Description') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea name="meta_description" class="ckeditor input-field" placeholder="{{ __('Description') }}">{{ $data->meta_description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Arabic  Description') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea name="meta_description_ar" class="ckeditor input-field" placeholder="{{ __('Arabic  Description') }}">{{ $data->meta_description_ar }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Current Image') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview"
                                                style="background: url({{ $data->photo ? asset('assets/images/brands/' . $data->photo) : asset('assets/images/noimage.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload" id="image-upload">
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                {{--




                          <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                  <h4 class="heading">
                                      {{ __('Meta Keywords') }} *
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                  <div class="tawk-area">
                                    <textarea  name="meta_keys">{{ $data->meta_keys }}</textarea>
                                  </div>
                              </div>
                            </div>




                          <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                  <h4 class="heading">
                                      {{ __('Arabic Meta Keywords') }} *
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                  <div class="tawk-area">
                                    <textarea  name="meta_keys_ar">{{ $data->meta_keys_ar }}</textarea>
                                  </div>
                              </div>
                            </div>

--}}





                                <br>
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

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
