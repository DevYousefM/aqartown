@extends('layouts.load')

@section('content')
    <div class="content-area">

        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
                            <form id="geniusformdata" action="{{ route('admin-partner-update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Link') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="link"
                                            placeholder="{{ __('Link') }}" value="{{ $data->link }}">
                                    </div>
                                </div>
                                <!--   <div class="row">
                     <div class="col-lg-4">
                      <div class="left-area">
                        <h4 class="heading">{{ __('type') }}*</h4>
                      </div>
                     </div>
                     <div class="col-lg-7">
                       <select  name="type" >
                        

                                      
                                      <option value="product"  {{ $data->type == 'product' ? 'selected' : '' }}>{{ __('product') }}</option>
                                      <option value="project" {{ $data->type == 'project' ? 'selected' : '' }} >{{ __('project') }}</option>
              </select>
                     </div>
                    </div>
                                 <div class="row">
                                  <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('Current Featured Image') }} *</h4>
                                    </div>
                                  </div>
                                  <div class="col-lg-7">
                                    <div class="img-upload full-width-img">
                                        <div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset(access_public() . 'assets/images/partner/' . $data->photo) : asset(access_public() . 'assets/images/noimage.png') }});">
                                            <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                            <input type="file" name="photo" class="img-upload" id="image-upload">
                                            <span class='span-img-size bottom'>Image size 240px X 150px</span>
                                          </div>
                                    </div>
                                    

                                  </div>
                                </div> -->


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn mt-4"
                                            type="submit">{{ __('Save') }}</button>
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
