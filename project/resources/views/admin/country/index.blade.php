@extends('layouts.admin')

@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('About Us section') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('About Us section') }}</a>
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
                            <form id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include('includes.admin.form-both')


                                <!-- -->
                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('About Us section') }} *
                                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="policy" required="">{{ $gs->policy }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('About Us section') }} *
                                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="policy_ar" required="">{{ $gs->policy_ar }}</textarea>
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
                                            <img src="{{ $gs->home_about_img1 ? asset('public/assets/images/' . $gs->home_about_img1) : asset('public/assets/images/noimage.png') }}"
                                                alt="">
                                        </div>
                                        <div class="set-logo">
                                            <input class="img-upload1" type="file" name="home_about_img1">
                                        </div>



                                    </div>
                                </div>
                                <input type="text" name="home_about_link" value="{{ $gs->home_about_link }}"
                                    placeholder="{{ __('link') }}" class="input-field" />
                                <!--        <div class="col-xl-6 col-md-6">
                        <div class="special-box bg-gray">
                            <div class="heading-area">
                                <h4 class="title">
                                  {{ __('home_about_img2') }}
                                </h4>
                            </div>


                              <div class="currrent-logo">
                                <img src="{{ $gs->home_about_img2 ? asset('public/assets/images/' . $gs->home_about_img2) : asset('public/assets/images/noimage.png') }}" alt="">
                              </div>
                              <div class="set-logo">
                                <input class="img-upload1" type="file" name="home_about_img2">
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
                    <h4 class="title">{{ __('why Choose us') }}</h4>
                   </div>

                   <div class="feature-tag-top-filds" id="feature-section">
                    @if (!empty($gs->choose_title))
    @php
        $title = explode(',', $gs->choose_title);
        $detail = explode(',', $gs->choose_detail);
        $title_ar = explode(',', $gs->choose_title_ar);
        $detail_ar = explode(',', $gs->choose_detail_ar);
    @endphp
                     @foreach ($title as $key => $data1)
    <div class="feature-area">
                     <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                     <div class="row">
                      <div class="col-lg-6">
                      <input type="text" name="choose_title[]" class="input-field" placeholder="{{ __('English title') }}" value="{{ $title[$key] }}">
                      </div>

                      <div class="col-lg-6">
               
               <input type="text" name="choose_detail[]" placeholder="{{ __('English detail') }}" value="{{ $detail[$key] }}" class="input-field"/>
               
               
                      </div>
                     </div>
                                      <div class="row">
                      <div class="col-lg-6">
                      <input type="text" name="choose_title_ar[]" class="input-field" placeholder="{{ __('Arabic title') }}" value="{{ $title_ar[$key] }}">
                      </div>

                      <div class="col-lg-6">
               
               <input type="text" name="choose_detail_ar[]" value="{{ $detail_ar[$key] }}" placeholder="{{ __('Arabic detail') }}" class="input-field"/>
               
               
                      </div>
                     </div>
                    </div>
    @endforeach
@else
    <div class="feature-area">
                     <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                     <div class="row">
                      <div class="col-lg-6">
                      <input type="text" name="choose_title[]" class="input-field" placeholder="{{ __('English title') }}" >
                      </div>

                      <div class="col-lg-6">
               
               <input type="text" name="choose_detail[]" placeholder="{{ __('English detail') }}"  class="input-field"/>
               
               
                      </div>
                     </div>
                                      <div class="row">
                      <div class="col-lg-6">
                      <input type="text" name="choose_title_ar[]" class="input-field" placeholder="{{ __('Arabic title') }}" >
                      </div>

                      <div class="col-lg-6">
               
               <input type="text" name="choose_detail_ar[]" placeholder="{{ __('Arabic detail') }}" class="input-field"/>
               
               
                      </div>
                     </div>
                    </div>
    @endif
                   </div>

                   <a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
                  </div>
                 </div>
                </div>



                           -->


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
                '<div  class="row">' +
                '<div class="col-lg-12">' +
                '<input type="text" name="percent_value[]" class="input-field" placeholder="value" >' +
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
                    '<div  class="row">' +
                    '<div class="col-lg-12">' +
                    '<input type="text" name="percent_value[]" class="input-field" placeholder="Value" >' +
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
