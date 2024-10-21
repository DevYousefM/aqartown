@extends('layouts.load')



@section('content')
    <div class="content-area">



        <div class="add-product-content">

            <div class="row">

                <div class="col-lg-12">

                    <div class="product-description">

                        <div class="body-area">

                            @include('includes.admin.form-error')

                            <form id="geniusformdata" action="{{ route('admin-cat-create') }}" method="POST"
                                enctype="multipart/form-data">

                                {{ csrf_field() }}



                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="left-area">

                                            <h4 class="heading">{{ __('Name') }} *</h4>

                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>

                                        </div>

                                    </div>

                                    <div class="col-lg-7">

                                        <input type="text" class="input-field" name="name"
                                            placeholder="{{ __('Enter Name') }}" required="" value="">

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
                                            placeholder="{{ __('Enter Arabic Name') }}" required="" value="">

                                    </div>

                                </div>













                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="left-area">

                                            <h4 class="heading">{{ __('Slug') }} *</h4>

                                            <p class="sub-heading">{{ __('In English') }}</p>

                                        </div>

                                    </div>

                                    <div class="col-lg-7">

                                        <input type="text" class="input-field" name="slug"
                                            placeholder="{{ __('Enter Slug') }}" required="" value="">

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="left-area">

                                            <h4 class="heading">{{ __('Slug') }} *</h4>

                                            <p class="sub-heading">{{ __('Arabic') }}</p>

                                        </div>

                                    </div>

                                    <div class="col-lg-7">

                                        <input type="text" class="input-field" name="slug_ar"
                                            placeholder="{{ __('Enter Arabic Slug') }}" required="" value="">

                                    </div>

                                </div>

                                <input type="hidden" name="type" value="service">
                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="left-area">

                                            <h4 class="heading">

                                                {{ __('Description') }}

                                            </h4>

                                        </div>

                                    </div>

                                    <div class="col-lg-7">

                                        <div class="text-editor">

                                            <textarea class="ckeditor form-control" name="details"> </textarea>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="left-area">

                                            <h4 class="heading">

                                                {{ __('Arabic Description') }}

                                            </h4>

                                        </div>

                                    </div>

                                    <div class="col-lg-7">

                                        <div class="text-editor">

                                            <textarea class="ckeditor form-control" name="details_ar"> </textarea>

                                        </div>

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
                                        <div class="tawk-area">
                                            <textarea name="meta_description" class="form-control" placeholder="{{ __('Meta Description') }}"></textarea>
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
                                        <div class="tawk-area">
                                            <textarea name="meta_description_ar" class="form-control" placeholder="{{ __('Arabic Meta Description') }}"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-12">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Facebook Pixel') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="tawk-area">
                                            <textarea name="facebook_pixel" class="form-control" placeholder="{{ __('Facebook Pixel') }}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="row">

                                        <div class="col-lg-4">

                                            <div class="left-area">

                                                <h4 class="heading">{{ __('Current Icon') }} </h4>

                                            </div>

                                        </div>

                                        <div class="col-lg-7">

                                            <div class="img-upload">

                                                <div id="image-preview" class="img-preview"
                                                    style="background: url({{ asset('public/assets/images/noimage.png') }});">

                                                    <label for="image-upload" class="img-label" id="image-label"><i
                                                            class="icofont-upload-alt"></i>{{ __('Upload Icon') }}</label>

                                                    <input type="file" name="photo" class="img-upload"
                                                        id="image-upload">

                                                </div>

                                            </div>



                                        </div>

                                    </div>









                                    <br>

                                    <div class="row">

                                        <div class="col-lg-4">

                                            <div class="left-area">



                                            </div>

                                        </div>

                                        <div class="col-lg-7">

                                            <button class="addProductSubmit-btn"
                                                type="submit">{{ __('Create') }}</button>

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
        $("#metatags").tagit({

            fieldName: "meta_tag[]",

            allowSpaces: true

        });



        $("#tags").tagit({

            fieldName: "tags[]",

            allowSpaces: true

        });



        $("#tags_ar").tagit({

            fieldName: "tags_ar[]",

            allowSpaces: true

        });
    </script>



    <script src="{{ asset('assets/admin/js/product.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jscolor.js') }}"></script>
@endsection
