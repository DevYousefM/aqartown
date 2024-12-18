@extends('layouts.vendor')
@section('styles')
    <link href="{{ asset('public/assets/vendor/css/product.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/admin/css/jquery.Jcrop.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/admin/css/Jcrop-style.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @php
        $sign = App\Models\Currency::where('is_default', 1)->first();
    @endphp

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ $langg->lang630 }} <a class="add-btn" href="{{ route('vendor-prod-types') }}"><i
                                class="fas fa-arrow-left"></i> {{ $langg->lang550 }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('vendor-dashboard') }}">{{ $langg->lang441 }}</a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ $langg->lang444 }} </a>
                        </li>
                        <li>
                            <a href="{{ route('vendor-prod-index') }}">{{ $langg->lang446 }}</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor-prod-types') }}">{{ $langg->lang445 }}</a>
                        </li>
                        <li>
                            <a href="{{ route('vendor-prod-digital-create') }}">{{ $langg->lang630 }}</a>
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
                                style="background: url({{ asset('public/assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <form id="geniusform" action="{{ route('vendor-prod-store') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include('includes.vendor.form-both')


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang632 }}* </h4>
                                            <p class="sub-heading">{{ $langg->lang517 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" placeholder="{{ $langg->lang632 }}"
                                            name="name" required="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Product Name') }}* </h4>
                                            <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Enter Product Arabic Name') }}" name="name_ar"
                                            required="">
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Product Alt') }}* </h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Enter Product ALt') }}" name="alt" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Product ALt') }}* </h4>
                                            <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Enter Product Arabic ALt') }}" name="alt_ar"
                                            required="">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang637 }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="cat" name="category_id" required="">
                                            <option value="">{{ $langg->lang691 }}</option>
                                            @foreach ($cats as $cat)
                                                <option data-href="{{ route('vendor-subcat-load', $cat->id) }}"
                                                    value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang638 }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="subcat" name="subcategory_id" disabled="">
                                            <option value="">{{ $langg->lang639 }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang640 }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="childcat" name="childcategory_id" disabled="">
                                            <option value="">{{ $langg->lang641 }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang692 }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="type_check" name="type_check">
                                            <option value="1">{{ $langg->lang693 }}</option>
                                            <option value="2">{{ $langg->lang694 }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row file">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang695 }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="file" name="file" required="">
                                    </div>
                                </div>

                                <div class="row link hidden">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang696 }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <textarea class="input-field" rows="4" name="link" placeholder="{{ $langg->lang696 }}"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang642 }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="panel panel-body">
                                                <div class="span4 cropme text-center" id="landscape"
                                                    style="width: 400px; height: 400px; border: 1px dashed black;">
                                                </div>
                                            </div>
                                        </div>

                                        <a href="javascript:;" id="crop-image" class="d-inline-block mybtn1">
                                            <i class="icofont-upload-alt"></i> {{ $langg->lang643 }}
                                        </a>


                                    </div>
                                </div>

                                <input type="hidden" id="feature_photo" name="photo" value="">



                                <input type="file" name="gallery[]" class="hidden" id="uploadgallery"
                                    accept="image/*" multiple>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ $langg->lang644 }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <a href="#" class="set-gallery" data-toggle="modal"
                                            data-target="#setgallery">
                                            <i class="icofont-plus"></i> {{ $langg->lang645 }}
                                        </a>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ $langg->lang664 }}*
                                            </h4>
                                            <p class="sub-heading">
                                                ({{ $langg->lang665 }} {{ $sign->name }})
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input name="price" step="0.1" type="number" class="input-field"
                                            placeholder="{{ $langg->lang666 }}" required="" min="0">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang667 }}*</h4>
                                            <p class="sub-heading">{{ $langg->lang668 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input name="previous_price" step="0.1" type="number" class="input-field"
                                            placeholder="{{ $langg->lang666 }}" min="0">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ $langg->lang680 }}*
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea name="details" class="nic-edit-p"></textarea>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ $langg->lang681 }}*
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea name="policy" class="nic-edit-p"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang682 }}*</h4>
                                            <p class="sub-heading">{{ $langg->lang668 }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input name="youtube" type="text" class="input-field"
                                            placeholder="{{ $langg->lang682 }}">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" name="seo_check" class="checkclick"
                                                id="allowProductSEO" value="1">
                                            <label for="allowProductSEO">{{ $langg->lang683 }}</label>
                                        </div>
                                    </div>
                                </div>



                                <div class="showbox">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ $langg->lang684 }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <ul id="metatags" class="myTags">
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">
                                                    {{ $langg->lang685 }} *
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="text-editor">
                                                <textarea name="meta_description" class="input-field" placeholder="{{ $langg->lang685 }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="featured-keyword-area">
                                            <div class="heading-area">
                                                <h4 class="title">{{ $langg->lang686 }}</h4>
                                            </div>

                                            <div class="feature-tag-top-filds" id="feature-section">
                                                <div class="feature-area">
                                                    <span class="remove feature-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="text" name="features[]" class="input-field"
                                                                placeholder="{{ $langg->lang687 }}">
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="input-group colorpicker-component cp">
                                                                <input type="text" name="colors[]" value="#000000"
                                                                    class="input-field cp" />
                                                                <span class="input-group-addon"><i></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="javascript:;" id="feature-btn" class="add-fild-btn"><i
                                                    class="icofont-plus"></i> {{ $langg->lang688 }}</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ $langg->lang689 }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul id="tags" class="myTags">
                                        </ul>
                                    </div>
                                </div>

                                <input type="hidden" name="type" value="Digital">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7 text-center">
                                        <button class="addProductSubmit-btn"
                                            type="submit">{{ $langg->lang690 }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ $langg->lang619 }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="top-area">
                        <div class="row">
                            <div class="col-sm-6 text-right">
                                <div class="upload-img-btn">
                                    <label for="image-upload" id="prod_gallery"><i
                                            class="icofont-upload-alt"></i>{{ $langg->lang620 }}</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i
                                        class="fas fa-check"></i> {{ $langg->lang621 }}</a>
                            </div>
                            <div class="col-sm-12 text-center">( <small>{{ $langg->lang622 }}</small> )</div>
                        </div>
                    </div>
                    <div class="gallery-images">
                        <div class="selected-image">
                            <div class="row">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('public/assets/admin/js/jquery.Jcrop.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/jquery.SimpleCropper.js') }}"></script>

    <script type="text/javascript">
        // Gallery Section Insert

        $(document).on('click', '.remove-img', function() {
            var id = $(this).find('input[type=hidden]').val();
            $('#galval' + id).remove();
            $(this).parent().parent().remove();
        });

        $(document).on('click', '#prod_gallery', function() {
            $('#uploadgallery').click();
            $('.selected-image .row').html('');
            $('#geniusform').find('.removegal').val(0);
        });


        $("#uploadgallery").change(function() {
            var total_file = document.getElementById("uploadgallery").files.length;
            for (var i = 0; i < total_file; i++) {
                $('.selected-image .row').append('<div class="col-sm-6">' +
                    '<div class="img gallery-img">' +
                    '<span class="remove-img"><i class="fas fa-times"></i>' +
                    '<input type="hidden" value="' + i + '">' +
                    '</span>' +
                    '<a href="' + URL.createObjectURL(event.target.files[i]) + '" target="_blank">' +
                    '<img src="' + URL.createObjectURL(event.target.files[i]) + '" alt="gallery image">' +
                    '</a>' +
                    '</div>' +
                    '</div> '
                );
                $('#geniusform').append('<input type="hidden" name="galval[]" id="galval' + i +
                    '" class="removegal" value="' + i + '">')
            }

        });

        // Gallery Section Insert Ends	
    </script>

    <script type="text/javascript">
        $('.cropme').simpleCropper();
        $('#crop-image').on('click', function() {
            $('.cropme').click();
        });
    </script>


    <script src="{{ asset('public/assets/admin/js/product.js') }}"></script>
@endsection
