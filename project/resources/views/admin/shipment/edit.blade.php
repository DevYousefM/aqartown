@extends('layouts.load')

@section('content')
            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error') 
                      <form id="geniusformdata" action="{{route('admin-shipment-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}



<!-- 
                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('Events') }} *</h4>

                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  <select name="product_id">
                                      @foreach($pro as $p)
                                          <option value="{{$p->id}}" {{ $p->id == $data->product_id ? 'selected' : '' }}>{{$p->name}}</option>
                                      @endforeach
                                  </select>

                              </div>
                          </div> 

 -->
                       <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Name') }} *</h4>
                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="name" placeholder="{{ __('Name') }}" required="" value="{{ $data->name }}">
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
                            <input type="text" class="input-field" name="name_ar" placeholder="{{ __('Arabic Name') }}" required="" value="{{ $data->name_ar }}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('address') }} *</h4>
                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="title" placeholder="{{ __('title') }}" required="" value="{{ $data->title }}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Arabic address') }} *</h4>
                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="title_ar" placeholder="{{ __('Arabic title') }}" required="" value="{{ $data->title_ar }}">
                          </div>
                        </div>


                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('map') }} *</h4>

                                  </div>
                              </div>
                              <div class="col-lg-3">
                                  <input type="text" class="input-field less-width" name="facebook" placeholder="{{ __('map') }}"  value="{{ $data->facebook }}">
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('phone') }} *</h4>

                                  </div>
                              </div>
                              <div class="col-lg-3">
                                  <input type="text" class="input-field less-width" name="desc" placeholder="{{ __('phone') }}"  value="{{ $data->desc }}">
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('email') }} *</h4>

                                  </div>
                              </div>
                              <div class="col-lg-3">
                                  <input type="text" class="input-field less-width" name="desc_ar" placeholder="{{ __('email') }}"  value="{{ $data->desc_ar }}">
                              </div>
                          </div>
                        <!--
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Description') }} *</h4>
                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <textarea type="text" class="input-field" name="desc" placeholder="{{ __('Description') }}"  > {{ $data->desc }}</textarea>
                          </div>
                        </div> 
                        
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Arabic Description') }} *</h4>
                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <textarea type="text" class="input-field" name="desc_ar" placeholder="{{ __('Arabic Description') }}"  > {{ $data->desc_ar }}</textarea>
                          </div>
                        </div>



                         <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading"> {{ __('Image') }} *</h4>
                                            <small>{{ __('(Preferred SIze: 285 X 410 Pixel)') }}</small>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset('assets/images/speakers/'.$data->photo):asset('assets/images/noimage.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload" id="image-upload">
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
                                          <h4 class="title">{{ __('Informations') }}</h4>
                                      </div>

                                      <div class="feature-tag-top-filds" id="feature-section2">
                                          @if(!empty($data->desc))
                                              @php
                                              $title =    explode(',', $data->desc);

                                              $title_ar =    explode(',', $data->desc_ar);

                                              @endphp
                                              @foreach($title as $key => $data1)

                                                  <div class="feature-area">
                                                      <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                      <div class="row">
                                                          <div class="col-lg-6">
                                                              <input type="text" name="desc[]" class="input-field" placeholder="{{ __('English') }}" value="{{ $title[$key] }}">
                                                          </div>

                                                          <div class="col-lg-6">

                                                              <input type="text" name="desc_ar[]" placeholder="{{ __('arabic') }}" value="{{ $title_ar[$key] }}" class="input-field"/>


                                                          </div>
                                                      </div>

                                                  </div>


                                              @endforeach
                                          @else

                                              <div class="feature-area">
                                                  <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                  <div class="row">
                                                      <div class="col-lg-6">
                                                          <input type="text" name="desc[]" class="input-field" placeholder="{{ __('en') }}" >
                                                      </div>

                                                      <div class="col-lg-6">

                                                          <input type="text" name="desc_ar[]" placeholder="{{ __('ar') }}"  class="input-field"/>


                                                      </div>
                                                  </div>

                                              </div>

                                          @endif
                                      </div>

                                      <a href="javascript:;" id="feature-btn2" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
                                  </div>
                              </div>
                          </div>
                          -->




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


    <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();

        });



        // Feature Section

        $("#feature-btn2").on('click', function(){

            $("#feature-section2").append(''+
                    '<div class="feature-area">'+
                    '<span class="remove feature-remove"><i class="fas fa-times"></i></span>'+
                    '<div  class="row">'+
                    '<div class="col-lg-6">'+
                    '<input type="text" name="desc[]" class="input-field" placeholder="English">'+
                    '</div>'+
                    '<div class="col-lg-6">'+

                    '<input type="text" name="desc_ar[]" value="" placeholder="Arabic" class="input-field"/>'+

                    '</div>'+
                    '</div>'+

                    '</div>'+
                    '</div>'
                    +'');

        });

        $(document).on('click','.feature-remove', function(){

            $(this.parentNode).remove();
            if (isEmpty($('#feature-section2'))) {

                $("#feature-section2").append(''+
                        '<div class="feature-area">'+
                        '<span class="remove feature-remove"><i class="fas fa-times"></i></span>'+
                        '<div  class="row">'+
                        '<div class="col-lg-6">'+
                        '<input type="text" name="desc[]" class="input-field" placeholder="English">'+
                        '</div>'+
                        '<div class="col-lg-6">'+

                        '<input type="text" name="desc_ar[]" value="" placeholder="Arabic" class="input-field"/>'+

                        '</div>'+
                        '</div>'+

                        '</div>'+
                        '</div>'
                        +'');
                $('.cp').colorpicker();
            }

        });

    </script>

@endsection