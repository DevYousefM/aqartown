@extends('layouts.admin')

@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Posts') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Blog') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-blog-index') }}">{{ __('Posts') }}</a>
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
                            @include('includes.admin.form-error')
                            <form id="geniusform" action="{{ route('admin-blog-update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @include('includes.admin.form-success')
                                {{ csrf_field() }}


                                <!-- <div class="row">
                                              <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Category') }}*</h4>
                                                </div>
                                              </div>
                                              <div class="col-lg-7">
                                                  <select name="category_id" required="">
                                                      <option value="">{{ __('Select Category') }}</option>
                                                        @foreach ($cats as $cat)
    <option value="{{ $cat->id }}" {{ $data->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
    @endforeach
                                                    </select>
                                              </div>
                                            </div> -->

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Title') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="title" placeholder="Title"
                                            value="{{ $data->title }}" required="">
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
                                        <input type="text" class="input-field" name="title_ar" placeholder="Arabic Title"
                                            value="{{ $data->title_ar }}" required="">
                                    </div>
                                </div>


                                <!-- <div class="row">
                           <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">{{ __('Blog Alt') }}* </h4>
                              <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                            </div>
                           </div>
                           <div class="col-lg-7">
                            <input type="text" class="input-field" placeholder="{{ __('Enter Product ALt') }}" name="alt" value="{{ $data->alt }}" required="">
                           </div>
                          </div>
                          <div class="row">
                           <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">{{ __('Blog ALt') }}* </h4>
                              <p class="sub-heading">{{ __('(Arabic)') }}</p>
                            </div>
                           </div>
                           <div class="col-lg-7">
                            <input type="text" class="input-field" placeholder="{{ __('Enter Product Arabic ALt') }}" name="alt_ar" value="{{ $data->alt_ar }}" required="">
                           </div>
                          </div>
                          
                          
                          
                                             <div class="row">
                                              <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Author') }} *</h4>
                                                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                                </div>
                                              </div>
                                              <div class="col-lg-7">
                                                <input type="text" class="input-field" name="author" placeholder="{{ __('Author') }}"  value="{{ $data->author }}">
                                              </div>
                                            </div>
                                             -->

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Current Featured Home Image') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview"
                                                style="background: url({{ $data->photo ? asset('public/assets/images/blogs/' . $data->photo) : asset('public/assets/images/noimage.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload"
                                                    id="image-upload">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="row">
                                                  <div class="col-lg-4">
                                                      <div class="left-area">
                                                          <h4 class="heading">{{ __('Current Featured Inside Image') }} *</h4>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-7">
                                                      <div class="img-upload">
                                                          <div id="image-preview" class="img-preview" style="background: url({{ $data->image ? asset('public/assets/images/blogs/' . $data->image) : asset('public/assets/images/noimage.png') }});">
                                                              <label for="image-uploade" class="img-label" id="image-labell"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                              <input type="file" name="image" class="img-upload" id="image-uploade">
                                                          </div>
                                                      </div>

                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-lg-4">
                                                      <div class="left-area">
                                                          <h4 class="heading">
                                                              {{ __('Mini Description') }} *
                                                          </h4>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-7">
                                                      <textarea class="form-control" name="mobile_details" placeholder="{{ __('Mini Description') }}">{{ $data->mobile_details }}</textarea>

                                                  </div>
                                              </div>


                                              <div class="row">
                                                  <div class="col-lg-4">
                                                      <div class="left-area">
                                                          <h4 class="heading">
                                                              {{ __('Mini Arabic Description') }} *
                                                          </h4>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-7">
                                                      <textarea class=" form-control" name="mobile_details_ar" placeholder="{{ __('Mini Arabic Description') }}">{{ $data->mobile_details_ar }}</textarea>

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
                                        <textarea id="test" class="ckeditor form-control" name="details" placeholder="{{ __('Details') }}">{{ $data->details }}</textarea>
                                        </div><!--class="nic-edit-p"-->
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
                                            <textarea id="test1" class="ckeditor form-control" name="details_ar" placeholder="{{ __('Arabic Details') }}">{{ $data->details_ar }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('slug blog url') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field" name="slug"
                                                placeholder="{{ __('slug') }}" value="{{ $data->slug }}">



                                        </div>
                                    </div>
                                    <!--
                                              <div class="row">
                                                  <div class="col-lg-4">
                                                      <div class="left-area">
                                                          <h4 class="heading">{{ __('video') }} *</h4>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-7">
                                                      <input type="text" class="input-field" name="video" placeholder="{{ __('video') }}"  value="{{ $data->video }}">



                                                  </div>
                                              </div>

                                            <div class="row">
                                              <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Source') }} *</h4>
                                                </div>
                                              </div>
                                            </div> -->
                                    <div class="col-lg-7">

                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" name="secheck" class="checkclick"
                                                id="allowProductSEO"
                                                {{ $data->meta_tag != null || strip_tags($data->meta_description) != null ? 'checked' : '' }}>
                                            <label for="allowProductSEO">{{ __('Allow Blog SEO') }}</label>
                                        </div>

                                    </div>

                                    <div
                                        class="{{ $data->meta_tag == null && strip_tags($data->meta_description) == null ? 'showbox seos' : '' }}">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Meta Tags') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <ul id="metatags" class="myTags">
                                                    @foreach (explode(',', $data->meta_tag) as $element)
                                                        <li>{{ $element }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('Meta Description') }} *
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="text-editor">
                                                    <textarea class="form-control" name="meta_description" placeholder="{{ __('Meta Description') }}">{{ $data->meta_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('Arabic Meta Description') }} *
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="text-editor">
                                                    <textarea class="form-control" name="meta_description_ar" placeholder="{{ __('Arabic Meta Description') }}">{{ $data->meta_description_ar }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">
                                                    {{ __('Facebook Pixel') }} *
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="text-editor">
                                                <textarea class="form-control" name="facebook_pixel" placeholder="{{ __('Facebook Pixel') }}">{{ $data->facebook_pixel }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Tags') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <ul id="tags" class="myTags">
                                                @foreach (explode(',', $data->tags) as $element)
                                                    <li>{{ $element }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <button class="addProductSubmit-btn"
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

@section('scripts')
    <script type="text/javascript">
        {{-- TAGIT --}}

        $("#metatags").tagit({
            fieldName: "meta_tag[]",
            allowSpaces: true
        });
        $(".checkclick").on("change", function() {
            if (this.checked) {
                $(".seos").removeClass('showbox');
            } else {
                $(".seos").addClass('showbox');
            }
        });
        $("#tags").tagit({
            fieldName: "tags[]",
            allowSpaces: true
        });
        {{-- TAGIT ENDS --}}
    </script>
    <!--<script>
        CKEDITOR.replace('details', {
            extraPlugins: 'colorbutton'
        });
        CKEDITOR.replace('details_ar', {
            extraPlugins: 'colorbutton'
        });

        $.widget.bridge('uibutton', $.ui.button);
        /* ClassicEditor
        .create( document.querySelector( '#test' ) );*/
    </script>-->

    <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
