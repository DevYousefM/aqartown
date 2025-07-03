@extends('layouts.admin')

@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Website Footer') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('General Settings') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-gs-footer') }}">{{ __('Footer') }}</a>
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
                                                {{ __('Footer Text') }} *
                                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="footer" required=""> {{ $gs->footer }} </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Footer Arabic Text') }} *
                                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="footer_ar" required=""> {{ $gs->footer_ar }} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Copyright Text') }} *
                                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="copyright" required=""> {{ $gs->copyright }} </textarea>
                                        </div>
                                    </div>
                                </div>



                                <div class="row justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('Copyright Arabic Text') }} *
                                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="tawk-area">
                                            <textarea class="ckeditor form-control" name="copyright_ar" required=""> {{ $gs->copyright_ar }} </textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                        Address 
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <input type="text"  class="form-control"value="{{ $gs->address }}"  name="address" required=""/> 
                                  </div>
                              </div>
                            </div>
                            
                               <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                       ِArabic Address
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <input type="text"  class="form-control" value="{{ $gs->address_ar }} " name="address_ar" required=""/>  
                                  </div>
                              </div>
                            </div>
                            
                                 <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      Working Hours
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <input type="text"  class="form-control" value="{{ $gs->working_hours }} " name="working_hours" required=""/>  
                                  </div>
                              </div>
                            </div>
                            
                              <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                    Email
                                   
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <input type="text"  class="form-control" value="{{ $gs->email }}"  name="email" required=""/>  
                                  </div>
                              </div>
                            </div>
                            
                              <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      Phone
                                  
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <input type="text"  class="form-control" value="{{ $gs->phone }}" name="phone" required=""/>  
                                  </div>
                              </div>
                            </div>
                            
                            
                             <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                   
                                   Message subscribee 
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <input type="text"  class="form-control" value="{{ $gs->subscribee_message }}"  name="subscribee_message" required=""/> 
                                  </div>
                              </div>
                            </div>
                            
                              <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                   
                                    Arabic Message subscribee 
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <input type="text"  class="form-control" value="{{ $gs->subscribee_message_ar }}"  name="subscribee_message_ar" required=""/> 
                                  </div>
                              </div>
                            </div>
                            --}}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="featured-keyword-area">
                                            <div class="heading-area">
                                                <h4 class="title">{{ __('Contact Form Emails') }}</h4>
                                            </div>

                                            <div class="feature-tag-top-filds" id="feature-section2">
                                                @if (!empty($gs->contact_emails))
                                                    @php
                                                        $title = explode(',', $gs->contact_emails);

                                                    @endphp
                                                    @foreach ($title as $key => $data1)
                                                        <div class="feature-area">
                                                            <span class="remove feature-remove"><i
                                                                    class="fas fa-times"></i></span>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <input type="text" name="contact_emails[]"
                                                                        class="input-field"
                                                                        placeholder="{{ __('emails') }}"
                                                                        value="{{ $title[$key] }}">
                                                                </div>


                                                            </div>

                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="feature-area">
                                                        <span class="remove feature-remove"><i
                                                                class="fas fa-times"></i></span>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <input type="text" name="contact_emails[]"
                                                                    class="input-field" placeholder="{{ __('emails') }}">
                                                            </div>


                                                        </div>

                                                    </div>
                                                @endif
                                            </div>

                                            <a href="javascript:;" id="feature-btn2" class="add-fild-btn"><i
                                                    class="icofont-plus"></i> {{ __('Add More Field') }}</a>
                                        </div>
                                    </div>
                                </div>



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




        $("#feature-btn2").on('click', function() {

            $("#feature-section2").append('' +
                '<div class="feature-area">' +
                '<span class="remove feature-remove"><i class="fas fa-times"></i></span>' +
                '<div  class="row">' +
                '<div class="col-lg-12">' +
                '<input type="text" name="contact_emails[]" class="input-field" placeholder="emails">' +
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
                    '<div class="col-lg-12">' +
                    '<input type="text" name="contact_emails[]" class="input-field" placeholder="emails">' +
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
