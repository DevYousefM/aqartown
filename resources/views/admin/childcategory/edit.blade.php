@extends('layouts.load')

@section('content')
    <div class="content-area">

        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
                            <form id="geniusformdata" action="{{ route('admin-childcat-update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Category') }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="cat" required="">
                                            <option value="">{{ __('Select Category') }}</option>
                                            @foreach ($cats as $cat)
                                                <option data-href="{{ route('admin-subcat-load', $cat->id) }}"
                                                    value="{{ $cat->id }}"
                                                    {{ $cat->id == $data->subcategory->category->id ? 'selected' : '' }}>
                                                    {{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Sub Category') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="subcat" name="subcategory_id" required="">
                                            <option value="">{{ __('Select Sub Category') }}</option>
                                            @foreach ($data->subcategory->category->subs as $sub)
                                                <option value="{{ $sub->id }}"
                                                    {{ $sub->id == $data->subcategory->id ? 'selected' : '' }}>
                                                    {{ $sub->name }}</option>
                                            @endforeach
                                        </select>
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

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Category Description') }}*
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea class="ckeditor form-control" name="details">{{ $data->details }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Category Arabic Description') }}*
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea class="ckeditor form-control" name="details_ar">{{ $data->details_ar }}</textarea>
                                        </div>
                                    </div>
                                </div>








                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Title') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="title"
                                            placeholder="{{ __('Enter Title') }}" value="{{ $data->title }}">
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
                                            placeholder="{{ __('Enter Arabic Title') }}" value="{{ $data->title_ar }}">
                                    </div>
                                </div>









                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Slug') }} *</h4>
                                            <p class="sub-heading">{{ __('(In English)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="slug"
                                            placeholder="{{ __('Enter Slug') }}" required=""
                                            value="{{ $data->slug }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Slug') }} *</h4>
                                            <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="slug_ar"
                                            placeholder="{{ __('Enter Arabic Slug') }}" required=""
                                            value="{{ $data->slug_ar }}">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Meta Tags') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul id="metatags" class="myTags">
                                            @if (!empty($data->meta_tag))
                                                <li>{{ $data->meta_tag }}</li>
                                            @endif
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
                                            <textarea name="meta_description" class="ckeditor form-control" placeholder="{{ __('Meta Description') }}">{{ $data->meta_description }}</textarea>
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
                                            <textarea name="meta_description_ar" class="ckeditor form-control"
                                                placeholder="{{ __('Arabic Meta Description') }}">{{ $data->meta_description_ar }}</textarea>
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

                                            @if (!empty($data->tags))
                                                <li>{{ $data->tags }}</li>
                                            @endif


                                        </ul>
                                    </div>
                                </div>


                                <br><br>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Arabic Tags') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">


                                        <ul id="atags" class="myTags">


                                            @if (!empty($data->tags_ar))
                                                <li>{{ $data->tags_ar }} </li>
                                            @endif

                                        </ul>
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
                                                style="background: url({{ $data->photo ? asset('public/assets/images/childcategories/' . $data->photo) : asset('public/assets/images/noimage.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
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
    <script type="text/javascript">
        {{-- TAGIT --}}

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

        {{-- TAGIT ENDS --}}
    </script>

    <script src="{{ asset('public/assets/admin/js/product.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/jscolor.js') }}"></script>




    <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
