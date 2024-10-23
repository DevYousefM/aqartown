@extends('layouts.admin')

@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Add Slider') }} <a class="add-btn" href="{{ route('admin-sl-index') }}"><i
                                class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Home Page Settings') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-sl-index') }}">{{ __('Sliders') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-sl-create') }}">{{ __('Add Slider') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  <ul class="nav nav-tabs">-->
        <!--      <li class="active"><a data-toggle="tab" href="#web">web</a></li>-->
        <!--      <li><a data-toggle="tab" href="#mobile">mobile</a></li>-->
        <!--</ul>-->

        <div class="add-product-content">
            <div class="row">

                <!--<div id="web" class="tab-pane fade in active">-->

                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            <div class="gocover"
                                style="background: url({{ asset('assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <form id="geniusform" action="{{ route('admin-sl-create') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include('includes.admin.form-both')

                                {{-- Sub Title Section --}}

                                {{--     <div class="panel panel-default slider-panel">
                                        <div class="panel-heading text-center"><h3>{{ __('title') }}</h3></div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label class="control-label" for="subtitle_text">{{ __('Text') }}*</label>

                                                    <textarea class="form-control" name="subtitle_text" id="subtitle_text" rows="5"  placeholder="{{ __('Enter Title Text') }}"></textarea>
                                                    <textarea class="form-control" name="subtitle_text_ar" id="subtitle_text" rows="5"  placeholder="{{ __('Enter Arabic Title Text') }}"></textarea>
                                                </div>
                                            </div>



                                        </div>
                                    </div> --}}

                                {{-- Sub Title Section Ends --}}


                                {{-- Title Section --}}

                                <!--   <div class="panel panel-default slider-panel">
                                            <div class="panel-heading text-center"><h3>{{ __('Description') }}</h3></div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="control-label" for="title_text">{{ __('Text') }}*</label>

                                                        <textarea class="form-control" name="title_text" id="title_text" rows="5"
                                                            placeholder="{{ __('Enter Title Text') }}"></textarea>
                                                        <textarea class="form-control" name="title_text_ar" id="title_text" rows="5"
                                                            placeholder="{{ __('Enter Arabic Title Text') }}"></textarea>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>  -->

                                {{-- Title Section Ends --}}


                                {{-- Details Section --}}

                                <!--<div class="panel panel-default slider-panel">
                                            <div class="panel-heading text-center"><h3>{{ __('Description2') }}</h3></div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="control-label" for="details_text">{{ __('Text') }}*</label>

                                                        <textarea class="form-control" name="details_text" id="details_text" rows="5"
                                                            placeholder="{{ __('Enter Title Text') }}"></textarea>
                                                        <textarea class="form-control" name="details_text_ar" id="details_text" rows="5"
                                                            placeholder="{{ __('Enter Arabic Title Text') }}"></textarea>
                                                    </div>
                                                </div>



                                            </div>
                                        </div> -->

                                {{-- Title Section Ends --}}


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Current Featured Image') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload full-width-img">
                                            <div id="image-preview" class="img-preview"
                                                style="background: url({{ asset('assets/admin/images/upload.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload" id="image-upload">
                                            </div>
                                            <p class="text">{{ __('Prefered Size: (1920x800) or Square Sized Image') }}
                                            </p>
                                        </div>

                                    </div>
                                </div>



                                <!--          <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('slide Link') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="input-field" name="link" placeholder="{{ __('Link') }}"  value="">
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('slide arabic  Link') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="input-field" name="link_ar" placeholder="{{ __('Link') }}"  value="">
                                            </div>
                                        </div>
                                     <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('video link') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="input-field" name="video" placeholder="{{ __('video') }}"  value="">
                                            </div>
                                        </div>
                                      <div class="row">
                                            <div class="col-lg-4">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Date') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="date" class="input-field" name="date"  placeholder="{{ __('Enter Date') }}" id="discount_date" value="">

                                            </div>
                                        </div>

                                        <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('button Name') }} *</h4>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="btn_text" placeholder="{{ __('button Name') }}"  value="">
                              </div>
                            </div>
                 <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('button Arabic Name') }} *</h4>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <input type="text" class="input-field" name="btn_text_ar" placeholder="{{ __('button Arabic Name') }}"  value="">
                              </div>
                            </div>
    -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn"
                                            type="submit">{{ __('Create Slider') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!--</div>-->


                </div>
                <!--<div id="mobile" class="tab-pane fade">-->


            </div>

        </div>
    </div>
    <!--</div>-->
@endsection
