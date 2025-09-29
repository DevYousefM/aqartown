@extends('layouts.admin')
@section('styles')
    <link href="{{ asset(access_public() . 'assets/admin/css/product.css') }}" rel="stylesheet" />
    <link href="{{ asset(access_public() . 'assets/admin/css/jquery.Jcrop.css') }}" rel="stylesheet" />
    <link href="{{ asset(access_public() . 'assets/admin/css/Jcrop-style.css') }}" rel="stylesheet" />
    <style>
        /*DSADSADASD*/



        button:focus,
        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
        }

        .tabs {
            display: block;
            display: -webkit-flex;
            display: -moz-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            -moz-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 0;
            overflow: hidden;
        }

        .tabs .label [class^="tab"] label,
        .tabs .label [class*=" tab"] label {

            cursor: pointer;
            display: block;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1em;
            padding: 2rem 0;
            text-align: center;
        }

        .tabs [class^="tab"] [type="radio"],
        .tabs [class*=" tab"] [type="radio"] {
            border-bottom: 1px solid rgba(239, 237, 239, 0.5);
            cursor: pointer;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            display: block;
            width: 100%;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .tabs [class^="tab"] [type="radio"]:hover,
        .tabs [class^="tab"] [type="radio"]:focus,
        .tabs [class*=" tab"] [type="radio"]:hover,
        .tabs [class*=" tab"] [type="radio"]:focus {
            border-bottom: 1px solid #1F224F;
        }

        .tabs [class^="tab"] [type="radio"]:checked,
        .tabs [class*=" tab"] [type="radio"]:checked {
            border-bottom: 2px solid #1F224F;
        }

        .tabs [class^="tab"] [type="radio"]:checked+div,
        .tabs [class*=" tab"] [type="radio"]:checked+div {
            opacity: 1;
        }

        .tabs [class^="tab"] [type="radio"]+div,
        .tabs [class*=" tab"] [type="radio"]+div {
            display: block;
            opacity: 0;
            padding: 2rem 0;
            width: 90%;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .tabs .tab-2 {
            width: 50%;
        }

        .tabs .tab-2 [type="radio"]+div {
            width: 200%;
            margin-left: 200%;
        }

        .tabs .tab-2 [type="radio"]:checked+div {
            margin-left: 0;
        }

        .tabs .tab-2:last-child [type="radio"]+div {
            margin-left: 100%;
        }

        .tabs .tab-2:last-child [type="radio"]:checked+div {
            margin-left: -100%;
        }
    </style>
    @if ($gs->light_dark == 0)
    @else
    @endif
@endsection
@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Add products') }} </h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>

                        <li>
                            <a href="{{ route('admin-prod-index') }}">{{ __('All products') }} </a>
                        </li>

                        <li>
                            <a href="{{ route('admin-prod-physical-create') }}">{{ __('Add') }}</a>
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

                                <div class="tabs">

                                    <div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __(' Name') }}* </h4>
                                                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="input-field"
                                                    placeholder="{{ __('Enter  Name') }}" name="name" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __(' Name') }}* </h4>
                                                    <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="input-field"
                                                    placeholder="{{ __('Enter  Arabic Name') }}" name="name_ar"
                                                    required="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('title') }}* </h4>
                                                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="input-field"
                                                    placeholder="{{ __('Enter   title') }}" name="title">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __(' title') }}* </h4>
                                                    <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="input-field"
                                                    placeholder="{{ __('Enter  Arabic title') }}" name="title_ar">
                                            </div>
                                        </div>

                                        <!--
                                                <div class="row">
                                                 <div class="col-lg-4">
                                                  <div class="left-area">
                                                    <h4 class="heading">{{ __('related projects') }}*</h4>
                                                  </div>
                                                 </div>
                                                 <div class="col-lg-7">
                                                   <select  name="projects[]" multiple="multiple" >
                                                    

                                                                                  @foreach ($cats as $cat)
    <option value="{{ $cat->id }}"  >{{ $cat->name }}</option>
    @endforeach
                                          </select>
                                                 </div>
                                                </div>

                                                <div class="row">
                                                 <div class="col-lg-4">
                                                  <div class="left-area">
                                                    <h4 class="heading">{{ __('related products') }}*</h4>
                                                  </div>
                                                 </div>
                                                 <div class="col-lg-7">
                                                   <select  name="products[]" multiple="multiple" >
                                                    

                                                                                  @foreach ($brands as $cat)
    <option value="{{ $cat->id }}"  >{{ $cat->name }}</option>
    @endforeach
                                          </select>
                                                 </div>
                                                </div>
                                             
                                                 
                                                 <div class="row">
                                                 <div class="col-lg-4">
                                                  <div class="left-area">
                                                    <h4 class="heading">{{ __('solution image Alt') }}* </h4>
                                                    <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                                  </div>
                                                 </div>
                                                 <div class="col-lg-7">
                                                  <input type="text" class="input-field" placeholder="{{ __('Enter solution image ALt') }}" name="alt" required="">
                                                 </div>
                                                </div>
                                                <div class="row">
                                                 <div class="col-lg-4">
                                                  <div class="left-area">
                                                    <h4 class="heading">{{ __('solution image ALt') }}* </h4>
                                                    <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                                  </div>
                                                 </div>
                                                 <div class="col-lg-7">
                                                  <input type="text" class="input-field" placeholder="{{ __('Enter solution image Arabic ALt') }}" name="alt_ar" required="">
                                                 </div>
                                                </div>
                                                 -->










                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('main') }}*</h4>
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
                                                    <h4 class="heading">{{ __('Sub') }}*</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <select id="subcat" name="subcategory_id" disabled=""
                                                    required="">
                                                    <option value="">{{ __('Select Sub Category') }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('location') }}*</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <select id="cat" name="location_id" required="">
                                                    <option value="">{{ __('Select location') }}</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->country_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('property type') }}*</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <select id="cat" name="type_id" required="">
                                                    <option value="">{{ __('Select type') }}</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('price range') }}*</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <select id="cat" name="range_id" required="">
                                                    <option value="">{{ __('Select range') }}</option>
                                                    @foreach ($works as $work)
                                                        <option value="{{ $work->id }}">{{ $work->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="left-area">
                                                        <h4 class="heading">{{ __('Condition') }}*</h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <select name="product_condition">
                                                        <option value="2">{{ __('rent') }}</option>
                                                        <option value="1">{{ __('sell') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!--
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
                                                </div> -->






                                        <!-- 	                    <div class="row">
                                           <div class="col-lg-4">
                                           <div class="left-area">
                                           <h4 class="heading">{{ __('Feature front Image') }} *</h4>
                                           </div>
                                           </div>
                                           <div class="col-lg-7">
                                     <div class="row">
                                     <div class="panel panel-body">
                                      <div class="span4 cropme text-center" id="landscape" style="width: 400px; height: 400px; border: 1px dashed black;">
                                      </div>
                                      </div>
                                     </div>

                                       <a href="javascript:;" id="crop-image" class="d-inline-block mybtn1">
                                        <i class="icofont-upload-alt"></i> {{ __('Upload Image Here') }}
                                       </a>
                                       <span class='span-img-size'>image size 205px X 205px</span>


                                           </div>
                                           </div>

                                           <input type="hidden" id="feature_photo" name="photo" value="">

                                     -->


                                        <!--image-->

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Feature  Image') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="row">
                                                    <div class="panel panel-body">
                                                        <img class="span4 mobile text-center" id="landscapes2"
                                                            style="width: 400px; height: 400px; border: 1px dashed black;">

                                                    </div>
                                                </div>

                                                <input class="d-inline-block mybtn1 sm-btn" type="file"
                                                    id="hover_photo" name="hover_photo" value="">
                                                <span class='span-img-size'>Image size 1170px X 520px</span>
                                            </div>
                                        </div>

                                        <input type="file" name="gallery[]" class="hidden" id="uploadgallery"
                                            accept="image/*" multiple>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('Event Gallery Images') }} *
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <a href="#" class="set-gallery" data-toggle="modal"
                                                    data-target="#setgallery">
                                                    <i class="icofont-plus"></i> {{ __('Set Gallery') }}
                                                </a>
                                            </div>
                                        </div> <!-- -->







                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('السعر') }}*
                                                    </h4>
                                                    <p class="sub-heading">

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input name="price" type="text" class="input-field" placeholder=""
                                                    value="">
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('نوع التشطيب') }}
                                                    </h4>
                                                    <p class="sub-heading">

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input name="parking" type="text" class="input-field" placeholder=""
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('نوع المعلن') }}
                                                    </h4>
                                                    <p class="sub-heading">

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input name="open_time" type="text" class="input-field"
                                                    placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('تطل على') }}</h4>
                                                    <p class="sub-heading">{{ __('(Optional)') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input name="price_from" type="text" class="input-field"
                                                    placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('طريقة الدفع') }}*
                                                    </h4>
                                                    <p class="sub-heading">

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input name="time" type="text" class="input-field" placeholder=""
                                                    value="">
                                            </div>
                                        </div>
                                        {{--	<div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-area">
                                                                    <h4 class="heading">
                                                                        {{ __('solution home date') }}*
                                                                    </h4>
                                                                    <p class="sub-heading">

                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <input name="date" type="date" class="input-field" placeholder="{{ __('02/05/2020') }}" value="">
                                                            </div>
                                                        </div> --}}

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('المساحات') }}*
                                                    </h4>
                                                    <p class="sub-heading">

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input name="location" type="text" class="input-field" placeholder=""
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('سعر المتر') }}*
                                                    </h4>
                                                    <p class="sub-heading">

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input name="reg_link" type="text" class="input-field" placeholder=""
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __(' رقم الإعلان') }}*
                                                    </h4>
                                                    <p class="sub-heading">

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input name="touch" type="text" class="input-field" placeholder=""
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('solution Description') }}*
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="text-editor">
                                                    <textarea class="ckeditor form-control" name="details"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __('solution Arabic Description') }}*
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="text-editor">
                                                    <textarea class="ckeditor form-control" name="details_ar"></textarea>
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
                                                    <textarea name="facebook_pixel" class="form-control" placeholder="{{ __('Facebook Pixel') }}"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkbox-wrapper mb-2 col-12 d-flex justify-content-center align-items-center"
                                            style="gap:15px">
                                            <input type="checkbox" name="seo_check" value="1" class="checkclick"
                                                id="allowProductSEO" value="1">
                                            <label for="allowProductSEO"
                                                class="mb-0">{{ __('Allow solution SEO') }}</label>
                                        </div>
                                        <div class="showbox seos">
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
                                                    <div class="text-editor">
                                                        <textarea name="meta_description_ar" class="form-control" placeholder="{{ __('Arabic Meta Description') }}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{--                                         
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
															<textarea class="ckeditor form-control" name="policy"></textarea>
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
															<textarea class="ckeditor form-control" name="policy_ar"></textarea>
														</div>
													</div>
												</div> --}}

                                        <!--
                                                <div class="row">
                                                 <div class="col-lg-4">
                                                  <div class="left-area">
                                                    <h4 class="heading">{{ __('register link URL') }}*</h4>
                                                    <p class="sub-heading">{{ __('(Optional)') }}</p>
                                                  </div>
                                                 </div>
                                                 <div class="col-lg-7">
                                                  <input  name="reg_link" type="text" class="input-field" placeholder="{{ __('Enter register link URL') }}">
                                           <div class="checkbox-wrapper">
                                           <input type="checkbox" name="seo_check" value="1" class="checkclick" id="allowProductSEO" value="1">
                                           <label for="allowProductSEO">{{ __('Allow solution SEO') }}</label>
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
                                                 <div class="row">
                                                  <div class="col-lg-4">
                                                   <div class="left-area">
                                                    <h4 class="heading">
                                                     {{ __('solution map') }} :
                                                    </h4>
                                                   </div>
                                                  </div>
                                                  <div class="col-lg-7">
                                                   <div class="text-editor">
                                                    <input name="map" type="text" class="input-field" placeholder="{{ __('solution map') }}" >
                                                   </div>
                                                  </div>
                                                 </div> -->

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



                                        <!--
                                                <div class="row">
                                                 <div class="col-lg-4">
                                                  <div class="left-area">

                                                  </div>
                                                 </div>
                                                 <div class="col-lg-7">
                                                  <div class="featured-keyword-area">
                                                   <div class="heading-area">
                                                    <h4 class="title">{{ __('Feature ') }}</h4>
                                                   </div>

                                                   <div class="feature-tag-top-filds" id="feature-section">
                                                    <div class="feature-area">
                                                     <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                     <div class="row">
                                                      <div class="col-lg-6">
                                                      <input type="text" name="features[]" class="input-field" placeholder="{{ __('Enter Your Keyword') }}">
                                                      </div>

                                                      <div class="col-lg-6">

                                               <input type="text" name="colors[]" placeholder="{{ __('Enter Your Keyword') }}" class="input-field "/>


                                                      </div>
                                                     </div>
                                                    </div>
                                                   </div>

                                                   <a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
                                                  </div>
                                                 </div>
                                                </div> -->

                                        <!--
                                          <div class="row">
                                          <div class="col-lg-4">
                                          <div class="left-area">
                                          <h4 class="heading">{{ __('Tags') }} *</h4>
                                          </div>
                                          </div>
                                          <div class="col-lg-7" >
                                          
                                          
                                          <ul id="tags" class="myTags" >
                                          
                                               
                                               
                                               
                                          </ul>
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
                                                  <input  name="youtube" type="text" class="input-field" placeholder="{{ __('Enter Youtube Video URL') }}">
                                           
                                                 </div>
                                                </div> -->

                                        {{-- 	<div class="row">
													<div class="col-lg-4">
														<div class="left-area" >
																<h4 class="heading">{{ __("Related Products") }} :</h4>
														</div>
													</div>
													<div class="col-lg-7">
															
																	
						                                               <select class="form-control" name="related[]" multiple="multiple"
                                                                            >
						                                                
                                                                        @forelse($pro as $app)
                                                                            <option value="{{$app->id}}">{{$app->name}}</option>
                                    
                                                                        @empty
                                    
                                                                        @endforelse
                                                                    </select>
						                                     </select>
													</div>
												</div> --}}

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">

                                                </div>
                                            </div>
                                            <div class="col-lg-7 text-center">
                                                <button class="addProductSubmit-btn"
                                                    type="submit">{{ __('Create solution') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="Physical">
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
                                <small>{{ __('You can upload multiple Images.') }}</small> )<span
                                    class='ml-2 span-img-size'>image size 205px X 205px</span>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-images">
                        <div class="selected-image selected-image-web">
                            <div class="row">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setgallerymobile" tabindex="-1" role="dialog" aria-labelledby="setgallerymobile"
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
                                    <label for="image-upload" id="prod_gallery_mobile"><i
                                            class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i
                                        class="fas fa-check"></i> {{ __('Done') }}</a>
                            </div>
                            <div class="col-sm-12 text-center">(
                                <small>{{ __('You can upload multiple Images.') }}</small> ) <span
                                    class='span-img-size'>Image size 205px X 205px</span>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-images">
                        <div class="selected-image selected-image-mobile ">
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
            $('.selected-image-web .row').html('');
            $('#geniusform').find('.removegal').val(0);
        });


        $("#uploadgallery").change(function() {
            var total_file = document.getElementById("uploadgallery").files.length;
            for (var i = 0; i < total_file; i++) {
                $('.selected-image-web .row').append('<div class="col-sm-6">' +
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



        $(document).on('click', '#prod_gallery_mobile', function() {
            $('#uploadgallerymobile').click();
            $('.selected-image-mobile .row').html('');
            $('#geniusform').find('.removegal').val(0);
        });


        $("#uploadgallerymobile").change(function() {
            var total_file = document.getElementById("uploadgallerymobile").files.length;
            for (var i = 0; i < total_file; i++) {
                $('.selected-image-mobile .row').append('<div class="col-sm-6">' +
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
                $('#geniusform').append('<input type="hidden" name="galvalm[]" id="galval' + i +
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

        $('#crop-image2').on('click', function() {
            $('.cropme').click();
        });

        $('.mobile').on('click', function() {
            $('#feature_mobile_photo').click();
        });


        $(".checkclick3").on("change", function() {
            if (this.checked) {
                $(".subs").removeClass('showbox');
            } else {
                $(".subs").addClass('showbox');
            }
        });
        $(".checkclick").on("change", function() {
            if (this.checked) {
                $(".seos").removeClass('showbox');
            } else {
                $(".seos").addClass('showbox');
            }
        });
    </script>
    <script type="text/javascript">
        $("input.space").on({
            keydown: function(e) {
                if (e.which === 32)
                    return false;
            },
            change: function() {
                this.value = this.value.replace(/\s/g, "");
            }
        });
    </script>

    <script src="{{ asset(access_public() . 'assets/admin/js/product.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/admin/js/jscolor.js') }}"></script>


    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();

        });
    </script>
    <script>
        document.getElementById('hover_photo').addEventListener('change', function(event) {
            if (event.target.files && event.target.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('landscapes2').src = e.target.result;
                    console.log("Image src set to:", e.target.result.substring(0, 50) + "...");
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    </script>
@endsection
