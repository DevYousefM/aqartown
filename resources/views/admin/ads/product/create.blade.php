@extends('layouts.admin')
@section('styles')
    <link href="{{ asset(access_public() . 'assets/admin/css/product.css') }}" rel="stylesheet" />
    <link href="{{ asset(access_public() . 'assets/admin/css/jquery.Jcrop.css') }}" rel="stylesheet" />
    <link href="{{ asset(access_public() . 'assets/admin/css/Jcrop-style.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Physical Product') }} <a class="add-btn"
                            href="{{ route('admin-prod-types') }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Products') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-prod-index') }}">{{ __('All Products') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-prod-types') }}">{{ __('Add Product') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-prod-physical-create') }}">{{ __('Physical Product') }}</a>
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
                                style="background: url({{ asset(access_public() . 'assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <form id="geniusform" action="{{ route('admin-prod-store') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include('includes.admin.form-both')


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Product Name') }}* </h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Enter Product Name') }}" name="name" required="">
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
                                            <h4 class="heading">{{ __('Product Sku') }}* </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field"
                                            placeholder="{{ __('Enter Product Sku') }}" name="sku" required=""
                                            value="{{ str_random(3) . substr(time(), 6, 8) . str_random(3) }}">

                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" name="product_condition_check" class="checkclick"
                                                id="conditionCheck" value="1">
                                            <label for="conditionCheck">{{ __('Allow Product Condition') }}</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="showbox">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Product Condition') }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <select name="product_condition">
                                                <option value="2">{{ __('New') }}</option>
                                                <option value="1">{{ __('Used') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Category') }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="cat" name="category_id" required="">
                                            <option value="">{{ __('Select Category') }}</option>
                                            @foreach ($cats as $cat)
                                                <option data-href="{{ route('admin-subcat-load', $cat->id) }}"
                                                    value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Sub Category') }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="subcat" name="subcategory_id" disabled="">
                                            <option value="">{{ __('Select Sub Category') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Child Category') }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="childcat" name="childcategory_id" disabled="">
                                            <option value="">{{ __('Select Child Category') }}</option>
                                        </select>
                                    </div>
                                </div>


                                <div id="catAttributes"></div>
                                <div id="subcatAttributes"></div>
                                <div id="childcatAttributes"></div>



                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Feature Image') }} *</h4>
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
                                            <i class="icofont-upload-alt"></i> {{ __('Upload Image Here') }}
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
                                                {{ __('Product Gallery Images') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <a href="#" class="set-gallery" data-toggle="modal"
                                            data-target="#setgallery">
                                            <i class="icofont-plus"></i> {{ __('Set Gallery') }}
                                        </a>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul class="list">
                                            <li>
                                                <input class="checkclick1" name="shipping_time_check" type="checkbox"
                                                    id="check1" value="1">
                                                <label for="check1">{{ __('Allow Estimated Shipping Time') }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>



                                <div class="showbox">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Product Estimated Shipping Time') }}* </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field"
                                                placeholder="{{ __('Estimated Shipping Time') }}" name="ship">
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul class="list">
                                            <li>
                                                <input name="size_check" type="checkbox" id="size-check" value="1">
                                                <label for="size-check">{{ __('Allow Product Sizes') }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="showbox" id="size-display">
                                    <div class="row">
                                        <div class="col-lg-4">
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="product-size-details" id="size-section">
                                                <div class="size-area">
                                                    <span class="remove size-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-6">
                                                            <label>
                                                                {{ __('Size Name') }} :
                                                                <span>
                                                                    {{ __('(eg. S,M,L,XL,XXL,3XL,4XL)') }}
                                                                </span>
                                                            </label>
                                                            <input type="text" name="size[]" class="input-field"
                                                                placeholder="{{ __('Size Name') }}">
                                                        </div>
                                                        <div class="col-md-4 col-sm-6">
                                                            <label>
                                                                {{ __('Size Qty') }} :
                                                                <span>
                                                                    {{ __('(Number of quantity of this size)') }}
                                                                </span>
                                                            </label>
                                                            <input type="number" name="size_qty[]" class="input-field"
                                                                placeholder="{{ __('Size Qty') }}" value="1"
                                                                min="1">
                                                        </div>
                                                        <div class="col-md-4 col-sm-6">
                                                            <label>
                                                                {{ __('Size Price') }} :
                                                                <span>
                                                                    {{ __('(This price will be added with base price)') }}
                                                                </span>
                                                            </label>
                                                            <input type="number" name="size_price[]" class="input-field"
                                                                placeholder="{{ __('Size Price') }}" value="0"
                                                                min="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="javascript:;" id="size-btn" class="add-more"><i
                                                    class="fas fa-plus"></i>{{ __('Add More Size') }} </a>
                                        </div>
                                    </div>
                                </div>


                                <!-- Color Size -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul class="list">
                                            <li>
                                                <input name="size_color_check" type="checkbox" id="size-color-check"
                                                    value="1">
                                                <label
                                                    for="size-color-check">{{ __('Allow Product Colors By Sizes') }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="showbox" id="size-color-display">
                                    <div class="row">
                                        <div class="col-lg-4">
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="product-size-details" id="size-color-section">

                                                <div class="size-area">
                                                    <span class="remove size-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4">
                                                            <label>
                                                                {{ __('Size Name') }} :
                                                                <span>
                                                                    {{ __('(eg. S,M,L,XL,XXL,3XL,4XL)') }}
                                                                </span>
                                                            </label>
                                                            <input type="text" name="size_color[]" class="input-field"
                                                                placeholder="Size Name">
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <label>
                                                                {{ __('Color') }} :
                                                                <span>
                                                                    {{ __('(eg. #000000,#00324)') }}
                                                                </span>
                                                            </label>
                                                            <div class="color-area">

                                                                <div class="input-group colorpicker-component cp">
                                                                    <input type="text" name="color_size[]"
                                                                        value="#000000" class="input-field cp" />
                                                                    <span class="input-group-addon"><i></i></span>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-4 col-sm-4">
                                                            <label>
                                                                {{ __('Color Qty') }} :

                                                            </label>
                                                            <div class="color-area">

                                                                <div class="input-group ">
                                                                    <input type="text" name="color_qty[]"
                                                                        value="0" class="input-field " />

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <a href="javascript:;" id="size-color-btn" class="add-more"><i
                                                    class="fas fa-plus"></i>{{ __('Add More Color For Sizes') }} </a>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul class="list">
                                            <li>
                                                <input class="checkclick1" name="color_check" type="checkbox"
                                                    id="check3" value="1">
                                                <label for="check3">{{ __('Allow Product Colors') }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="showbox">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">
                                                    {{ __('Product Colors') }}*
                                                </h4>
                                                <p class="sub-heading">
                                                    {{ __('(Choose Your Favorite Colors)') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="select-input-color" id="color-section">
                                                <div class="color-area">
                                                    <span class="remove color-remove"><i class="fas fa-times"></i></span>
                                                    <div class="input-group colorpicker-component cp">
                                                        <input type="text" name="color[]" value="#000000"
                                                            class="input-field cp" />
                                                        <span class="input-group-addon"><i></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:;" id="color-btn" class="add-more mt-4 mb-3"><i
                                                    class="fas fa-plus"></i>{{ __('Add More Color') }} </a>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul class="list">
                                            <li>
                                                <input class="checkclick1" name="whole_check" type="checkbox"
                                                    id="whole_check" value="1">
                                                <label for="whole_check">{{ __('Allow Product Whole Sell') }}</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="showbox">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="featured-keyword-area">
                                                <div class="feature-tag-top-filds" id="whole-section">
                                                    <div class="feature-area">
                                                        <span class="remove whole-remove"><i
                                                                class="fas fa-times"></i></span>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="number" name="whole_sell_qty[]"
                                                                    class="input-field"
                                                                    placeholder="{{ __('Enter Quantity') }}"
                                                                    min="0">
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <input type="number" name="whole_sell_discount[]"
                                                                    class="input-field"
                                                                    placeholder="{{ __('Enter Discount Percentage') }}"
                                                                    min="0" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="javascript:;" id="whole-btn" class="add-fild-btn"><i
                                                        class="icofont-plus"></i> {{ __('Add More Field') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Product Current Price') }}*
                                            </h4>
                                            <p class="sub-heading">
                                                ({{ __('In') }} {{ $sign->name }})
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input name="price" type="number" class="input-field"
                                            placeholder="{{ __('e.g 20') }}" step="0.1" required=""
                                            min="0">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Product Previous Price') }}*</h4>
                                            <p class="sub-heading">{{ __('(Optional)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input name="previous_price" step="0.1" type="number" class="input-field"
                                            placeholder="{{ __('e.g 20') }}" min="0">
                                    </div>
                                </div>

                                <div class="row" id="stckprod">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Product Stock') }}*</h4>
                                            <p class="sub-heading">{{ __('(Leave Empty will Show Always Available)') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input name="stock" type="text" class="input-field"
                                            placeholder="{{ __('e.g 20') }}">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" name="measure_check" class="checkclick"
                                                id="allowProductMeasurement" value="1">
                                            <label
                                                for="allowProductMeasurement">{{ __('Allow Product Measurement') }}</label>
                                        </div>
                                    </div>
                                </div>



                                <div class="showbox">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Product Measurement') }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <select id="product_measure">
                                                <option value="">{{ __('None') }}</option>
                                                <option value="Gram">{{ __('Gram') }}</option>
                                                <option value="Kilogram">{{ __('Kilogram') }}</option>
                                                <option value="Litre">{{ __('Litre') }}</option>
                                                <option value="Pound">{{ __('Pound') }}</option>
                                                <option value="Custom">{{ __('Custom') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1"><input name="scale" type="number" class="input-field"
                                                min="1" value="1"></div>
                                        <div class="col-lg-3 hidden" id="measure">
                                            <input name="measure" type="text" id="measurement" class="input-field"
                                                placeholder="{{ __('Enter Unit') }}">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Product Description') }}*
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea class="nic-edit-p" name="details"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Product Arabic Description') }}*
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea class="nic-edit-p" name="details_ar"></textarea>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Product Buy/Return Policy') }}*
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea class="nic-edit-p" name="policy"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Arabic Product Buy/Return Policy') }}*
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="text-editor">
                                            <textarea class="nic-edit-p" name="policy_ar"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Youtube Video URL') }}*</h4>
                                            <p class="sub-heading">{{ __('(Optional)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input name="youtube" type="text" class="input-field"
                                            placeholder="{{ __('Enter Youtube Video URL') }}">
                                        <div class="checkbox-wrapper">
                                            <input type="checkbox" name="seo_check" value="1" class="checkclick"
                                                id="allowProductSEO" value="1">
                                            <label for="allowProductSEO">{{ __('Allow Product SEO') }}</label>
                                        </div>
                                    </div>
                                </div>



                                <div class="showbox">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Meta Tags') }} *</h4>
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
                                                    {{ __('Meta Description') }} *
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="text-editor">
                                                <textarea name="meta_description" class="input-field" placeholder="{{ __('Meta Description') }}"></textarea>
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
                                                <textarea name="meta_description_ar" class="input-field" placeholder="{{ __('Arabic Meta Description') }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--    	<div class="row">
                     <div class="col-lg-4">
                      <div class="left-area">
                       
                      </div>
                     </div>
                     <div class="col-lg-7">
                     
              <div class="checkbox-wrapper">
              <input type="checkbox" name="feature" value="1" class="checkclick3" id="allowProductfeature" >
              <label for="allowProductfeature">{{ __('Subscription feature settings ') }}</label>
              </div>
                     </div>
                    </div>
              
              <div class="showbox subs" >
              <div class="row">
              <div class="col-lg-4">
              <div class="left-area">
              <h4 class="heading">{{ __('Subscription type') }}: </h4>
              </div>
              </div>
              <div class="col-lg-7">
              <select name="subscription_type" class>
              <option value="Days">Days</option>
              <option value="Months">Months</option>
              <option value="Years">Years</option>
              </select>
              </div>
              </div>

              <div class="row">
              <div class="col-lg-4">
              <div class="left-area">
              <h4 class="heading">
              {{ __('subscription period') }} :
              </h4>
              </div>
              </div>
              <div class="col-lg-7">
              <div class="text-editor">
              <input name="subscription_period" type="number" min="0" class="input-field" placeholder="{{ __('subscription period') }}" value="0">
              </div>
              </div>
              </div>
              
              <div class="row">
              <div class="col-lg-4">
              <div class="left-area">
              <h4 class="heading">
              {{ __('subscription trial period') }} :
              </h4>
              </div>
              </div>
              <div class="col-lg-7">
              <div class="text-editor">
              <input name="trial_period" type="number" min="0" class="input-field" placeholder="{{ __('trial period') }}" value="0">
              </div>
              </div>
              </div>
              
              </div>-->




                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="featured-keyword-area">
                                            <div class="heading-area">
                                                <h4 class="title">{{ __('Feature Tags') }}</h4>
                                            </div>

                                            <div class="feature-tag-top-filds" id="feature-section">
                                                <div class="feature-area">
                                                    <span class="remove feature-remove"><i
                                                            class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="text" name="features[]" class="input-field"
                                                                placeholder="{{ __('Enter Your Keyword') }}">
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
                                                    class="icofont-plus"></i> {{ __('Add More Field') }}</a>
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




                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Related Products') }} :</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">


                                        <select class="form-control" name="related[]" multiple="multiple">

                                            @forelse($pro as $app)
                                                <option value="{{ $app->id }}">{{ $app->name }}</option>

                                            @empty
                                            @endforelse
                                        </select>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="Physical">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7 text-center">
                                        <button class="addProductSubmit-btn"
                                            type="submit">{{ __('Create Product') }}</button>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Image Gallery') }}</h5>
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
                                            class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i
                                        class="fas fa-check"></i> {{ __('Done') }}</a>
                            </div>
                            <div class="col-sm-12 text-center">(
                                <small>{{ __('You can upload multiple Images.') }}</small> )
                            </div>
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
    <script src="{{ asset(access_public() . 'assets/admin/js/jquery.Jcrop.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/admin/js/jquery.SimpleCropper.js') }}"></script>

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


        $(".checkclick3").on("change", function() {
            if (this.checked) {
                $(".subs").removeClass('showbox');
            } else {
                $(".subs").addClass('showbox');
            }
        });
    </script>


    <script src="{{ asset(access_public() . 'assets/admin/js/product.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/admin/js/jscolor.js') }}"></script>
@endsection
