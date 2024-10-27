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
                    <h4 class="heading">{{ $langg->lang518 }} <a class="add-btn"
                            href="{{ route('vendor-prod-index', ['lang' => $sign]) }}"><i class="fas fa-arrow-left"></i>
                            {{ $langg->lang550 }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('vendor-dashboard', ['lang' => $sign]) }}">{{ $langg->lang441 }}</a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ $langg->lang444 }} </a>
                        </li>
                        <li>
                            <a href="{{ route('vendor-prod-index', ['lang' => $sign]) }}">{{ $langg->lang443 }}</a>
                        </li>

                        <li>
                            <a
                                href="{{ route('vendor-prod-physical-create', ['lang' => $sign]) }}">{{ $langg->lang518 }}</a>
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




                                <div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ $langg->lang519 }}* </h4>
                                                <p class="sub-heading">{{ $langg->lang517 }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field" placeholder="{{ __('Enter  Name') }}"
                                                name="name" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ $langg->lang431 }}* </h4>
                                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field"
                                                placeholder="{{ __('Enter  Arabic Name') }}" name="name_ar" required="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ $langg->lang432 }}* </h4>
                                                <p class="sub-heading">{{ $langg->lang517 }}</p>
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
                                                <h4 class="heading">{{ $langg->lang433 }}* </h4>
                                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field"
                                                placeholder="{{ __('Enter  Arabic title') }}" name="title_ar">
                                        </div>
                                    </div>

                                    {{--	<!-- 	
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('related projects') }}*</h4>
														</div>
													</div>
													<div class="col-lg-7">
															<select  name="projects[]" multiple="multiple" >
																

                                              @foreach ($cats as $cat)
                                                  <option value="{{$cat->id}}"  >{{$cat->name}}</option>
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
                                                  <option value="{{$cat->id}}"  >{{$cat->name}}</option>
                                              @endforeach
						                                     </select>
													</div>
												</div>
									
													
													<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('solution image Alt') }}* </h4>
																<p class="sub-heading">{{ $langg->lang517 }}</p>
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
													 --> --}}










                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ $langg->lang434 }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <select id="cat" name="category_id" required="">
                                                <option value="">{{ __('Select Category') }}</option>
                                                @foreach ($cats as $cat)
                                                    <option
                                                        data-href="{{ route('vendor-subcat-load', $cat->id) }}?lang={{ $langg->rtl }}"
                                                        value="{{ $cat->id }}">
                                                        {{ $langg->rtl == 1 ? $cat->name_ar : $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ $langg->lang435 }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <select id="subcat" name="subcategory_id" disabled="" required="">
                                                <option value="">{{ __('Select Sub Category') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ $langg->lang436 }}*</h4>
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
                                                <h4 class="heading">{{ $langg->lang437 }}*</h4>
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
                                                <h4 class="heading">{{ $langg->lang438 }}*</h4>
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
                                                    <h4 class="heading">{{ $langg->lang439 }}*</h4>
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
                                                <h4 class="heading">{{ __('Image') }} *</h4>
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
                                                onchange="document.getElementById('landscapes2').src = window.URL.createObjectURL(this.files[0])"
                                                id="hover_photo" name="hover_photo" value="">
                                            <span class='span-img-size'>Image size 1170px X 520px</span>
                                        </div>
                                    </div> <!--   -->























                                    <input type="file" name="gallery[]" class="hidden" id="uploadgallery"
                                        accept="image/*" multiple>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">
                                                    {{ __('Gallery Images') }} *
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
                                            <input name="open_time" type="text" class="input-field" placeholder=""
                                                value="">
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
                                            <input name="price_from" type="text" class="input-field" placeholder=""
                                                value="">
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


                                    <!--
     -->




                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">
                                                    {{ $langg->lang440 }}*
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
                                                    {{ $langg->lang442 }}*
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="text-editor">
                                                <textarea class="ckeditor form-control" name="details_ar"></textarea>
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
                                                type="submit">{{ __('Create') }}</button>
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
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
