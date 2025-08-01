@extends('layouts.admin')

@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('About Us Section') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('About Us Section') }}</a>
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
                            <form id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include('includes.admin.form-both')

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('about us section') }} *
                                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="management" required="">{{ $gs->management }}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('about us section') }} *
                                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="management_ar" required="">{{ $gs->management_ar }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!--
                                  <div class="row justify-content-center">
                                      <div class="col-lg-3">
                                        <div class="left-area">
                                          <h4 class="heading">
                                              {{ __('About') }} *
                                              <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                          </h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="home_about" required="">{{ $gs->home_about }}</textarea>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row justify-content-center">
                                      <div class="col-lg-3">
                                        <div class="left-area">
                                          <h4 class="heading">
                                              {{ __('About') }} *
                                              <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                          </h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="home_about_ar" required="">{{ $gs->home_about_ar }}</textarea>
                                          </div>
                                      </div>
                                    </div>-->
                                <div class="add-logo-area">
                                    <div class="gocover"
                                        style="background: url({{ asset(access_public() . 'assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="special-box bg-gray">
                                                <div class="heading-area">
                                                    <h4 class="title">
                                                        {{ __('home_about_img2') }}
                                                    </h4>
                                                </div>


                                                <div class="currrent-logo">
                                                    <img src="{{ $gs->home_about_img2 ? asset(access_public() . 'assets/images/' . $gs->home_about_img2) : asset(access_public() . 'assets/images/noimage.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="set-logo">
                                                    <input class="img-upload1" type="file" name="home_about_img2">
                                                </div>


                                            </div>
                                        </div>



                                        <!--       <div class="col-xl-6 col-md-6">
                              <div class="special-box bg-gray">
                                  <div class="heading-area">
                                      <h4 class="title">
                                          {{ __('home_about_img4') }}
                                      </h4>
                                  </div>

                                  <div class="currrent-logo">
                                      <img src="{{ $gs->home_about_img4 ? asset(access_public() . 'assets/images/' . $gs->home_about_img4) : asset(access_public() . 'assets/images/noimage.png') }}" alt="">
                                  </div>
                                  <div class="set-logo">
                                      <input class="img-upload1" type="file" name="home_about_img4">
                                  </div>


                              </div>
                          </div>

                          <div class="col-xl-6 col-md-6">
                              <div class="special-box bg-gray">
                                  <div class="heading-area">
                                      <h4 class="title">
                                          {{ __('home_about_img5') }}
                                      </h4>
                                  </div>

                                  <div class="currrent-logo">
                                      <img src="{{ $gs->home_about_img5 ? asset(access_public() . 'assets/images/' . $gs->home_about_img5) : asset(access_public() . 'assets/images/noimage.png') }}" alt="">
                                  </div>
                                  <div class="set-logo">
                                      <input class="img-upload1" type="file" name="home_about_img5">
                                  </div>


                              </div>
                          </div>

                             <div class="col-xl-6 col-md-6">
                              <div class="special-box bg-gray">
                                  <div class="heading-area">
                                      <h4 class="title">
                                          {{ __('home_about_img3') }}
                                      </h4>
                                  </div>


                                  <div class="currrent-logo">
                                      <img src="{{ $gs->home_about_img3 ? asset(access_public() . 'assets/images/' . $gs->home_about_img3) : asset(access_public() . 'assets/images/noimage.png') }}" alt="">
                                  </div>
                                  <div class="set-logo">
                                      <input class="img-upload1" type="file" name="home_about_img3">
                                  </div>


                              </div>
                          </div>


                                    <div class="col-xl-6 col-md-6">
                            <div class="special-box bg-gray">
                                <div class="heading-area">
                                    <h4 class="title">
                                      {{ __('about_img1') }}
                                    </h4>
                                </div>

                               
                                    
                                  <div class="currrent-logo">
                                    <img src="{{ $gs->home_about_img1 ? asset(access_public() . 'assets/images/' . $gs->home_about_img1) : asset(access_public() . 'assets/images/noimage.png') }}" alt="">
                                  </div>
                                  <div class="set-logo">
                                    <input class="img-upload1" type="file" name="home_about_img1">
                                  </div>

                                 
                             
                            </div>
                        </div>


                      <input type="text" name="home_about_link" value="{{ $gs->home_about_link }}" placeholder="{{ __('link') }}"  class="input-field"/>-->
                                    </div>
                                </div>



                                <!--    <div class="row">
                     <div class="col-lg-4">
                      <div class="left-area">

                      </div>
                     </div>
                     <div class="col-lg-7">
                      <div class="featured-keyword-area">
                       <div class="heading-area">
                        <h4 class="title">{{ __('Informations') }}</h4>
                       </div>

                       <div class="feature-tag-top-filds" id="feature-section2">
                        @if (!empty($gs->percent_title))
    @php
        $title = explode(',', $gs->percent_title);

        $title_ar = explode(',', $gs->percent_title_ar);

    @endphp
                         @foreach ($title as $key => $data1)
    <div class="feature-area">
                         <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                         <div class="row">
                          <div class="col-lg-6">
                          <input type="text" name="percent_title[]" class="input-field" placeholder="{{ __('days') }}" value="{{ $title[$key] }}">
                          </div>

                          <div class="col-lg-6">
                   
                   <input type="text" name="percent_title_ar[]" placeholder="{{ __('times') }}" value="{{ $title_ar[$key] }}" class="input-field"/>
                   
                   
                          </div>
                         </div>
                                                                
                        </div>
    @endforeach
@else
    <div class="feature-area">
                         <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                         <div class="row">
                          <div class="col-lg-6">
                          <input type="text" name="percent_title[]" class="input-field" placeholder="{{ __('days') }}" >
                          </div>

                          <div class="col-lg-6">
                   
                   <input type="text" name="percent_title_ar[]" placeholder="{{ __('times') }}"  class="input-field"/>
                   
                   
                          </div>
                         </div>
                                          
                        </div>
    @endif
                       </div>

                       <a href="javascript:;" id="feature-btn2" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
                      </div>
                     </div>
                    </div> -->



                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
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


        // Feature Section

        $("#feature-btn").on('click', function() {

            $("#feature-section").append('' +
                '<div class="feature-area">' +
                '<span class="remove feature-remove"><i class="fas fa-times"></i></span>' +
                '<div  class="row">' +
                '<div class="col-lg-6">' +
                '<input type="text" name="choose_title[]" class="input-field" placeholder="English">' +
                '</div>' +
                '<div class="col-lg-6">' +

                '<input type="text" name="choose_detail[]" value="" placeholder="English" class="input-field"/>' +

                '</div>' +
                '</div>' +
                '<div  class="row">' +
                '<div class="col-lg-6">' +
                '<input type="text" name="choose_title_ar[]" class="input-field" placeholder="Arabic" >' +
                '</div>' +
                '<div class="col-lg-6">' +

                '<input type="text" name="choose_detail_ar[]" value="" placeholder="Arabic" class="input-field"/>' +

                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '');

        });

        $(document).on('click', '.feature-remove', function() {

            $(this.parentNode).remove();
            if (isEmpty($('#feature-section'))) {

                $("#feature-section").append('' +
                    '<div class="feature-area">' +
                    '<span class="remove feature-remove"><i class="fas fa-times"></i></span>' +
                    '<div  class="row">' +
                    '<div class="col-lg-6">' +
                    '<input type="text" name="choose_title[]" class="input-field" placeholder="English">' +
                    '</div>' +
                    '<div class="col-lg-6">' +

                    '<input type="text" name="choose_detail[]" value="" placeholder="English" class="input-field"/>' +

                    '</div>' +
                    '</div>' +
                    '<div  class="row">' +
                    '<div class="col-lg-6">' +
                    '<input type="text" name="choose_title_ar[]" class="input-field" placeholder="Arabic" >' +
                    '</div>' +
                    '<div class="col-lg-6">' +

                    '<input type="text" name="choose_detail_ar[]" value="" placeholder="Arabic" class="input-field"/>' +

                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '');
                $('.cp').colorpicker();
            }

        });




        // Feature Section

        $("#feature-btn2").on('click', function() {

            $("#feature-section2").append('' +
                '<div class="feature-area">' +
                '<span class="remove feature-remove"><i class="fas fa-times"></i></span>' +
                '<div  class="row">' +
                '<div class="col-lg-6">' +
                '<input type="text" name="percent_title[]" class="input-field" placeholder="English">' +
                '</div>' +
                '<div class="col-lg-6">' +

                '<input type="text" name="percent_title_ar[]" value="" placeholder="Arabic" class="input-field"/>' +

                '</div>' +
                '</div>' +

                '</div>' +
                '</div>' +
                '');

        });

        $(document).on('click', '.feature-remove', function() {

            $(this.parentNode).remove();
            if (isEmpty($('#feature-section2'))) {

                $("#feature-section2").append('' +
                    '<div class="feature-area">' +
                    '<span class="remove feature-remove"><i class="fas fa-times"></i></span>' +
                    '<div  class="row">' +
                    '<div class="col-lg-6">' +
                    '<input type="text" name="percent_title[]" class="input-field" placeholder="English">' +
                    '</div>' +
                    '<div class="col-lg-6">' +

                    '<input type="text" name="percent_title_ar[]" value="" placeholder="Arabic" class="input-field"/>' +

                    '</div>' +
                    '</div>' +

                    '</div>' +
                    '</div>' +
                    '');
                $('.cp').colorpicker();
            }

        });
    </script>
@endsection
