@extends('layouts.admin')

@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Edit Certificates image') }} <a class="add-btn"
                            href="{{ route('admin-ads-index') }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a>
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>

                        <li>
                            <a href="{{ route('admin-ads-index') }}">{{ __('Certificates') }}</a>
                        </li>
                        <li>
                            <a href="#">{{ __('Edit Certificates image') }}</a>
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
            <div class="row"> <!--<div id="web" class="tab-pane fade in active">-->

                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            <div class="gocover"
                                style="background: url({{ asset('assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <form id="geniusform" action="{{ route('admin-ads-update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include('includes.admin.form-both')


                                <div class="panel panel-default slider-panel">
                                    <div class="panel-heading text-center">
                                        <h3>{{ __('Title') }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="control-label"
                                                    for="subtitle_text">{{ __('Text') }}*</label>

                                                <textarea class="form-control" name="title" id="subtitle_text" rows="5"
                                                    placeholder="{{ __('Enter Title Text') }}">{{ $data->title }}</textarea>
                                                <textarea class="form-control" name="title_ar" id="subtitle_text" rows="5"
                                                    placeholder="{{ __('Enter Arabic Title Text') }}">{{ $data->title_ar }}</textarea>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Certificates Image') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload full-width-img">
                                            <div id="image-preview" class="img-preview"
                                                style="background: url({{ $data->photo ? asset('assets/images/ads/' . $data->photo) : asset('assets/images/noimage.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload" id="image-upload">
                                            </div>
                                            <p class="text">{{ __('Prefered Size: 200x100 or Square Sized Image') }}</p>
                                        </div>

                                    </div>
                                </div>

                                <!-- <div class="row">
                              <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('After Image') }} *</h4>
                                </div>
                              </div>
                              <div class="col-lg-7">
                                <div class="img-upload full-width-img">
                                    <div id="image-preview" class="img-preview" style="background: url({{ $data->image ? asset('assets/images/ads/' . $data->image) : asset('assets/images/noimage.png') }});">
                                        <label for="image-upload2" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                        <input type="file" name="image" class="img-upload" id="image-upload">
                                      </div>
                                      <p class="text">{{ __('Prefered Size: 200x100 or Square Sized Image') }}</p>
                                </div>

                              </div>
                            </div>
     -->


                                <!--<input  type="hidden" name="mobile_setting" value="1">-->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">edit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!--</div>-->


                </div>
                <!--<div id="mobile" class="tab-pane fade">-->


                <div class="tab-content">



                </div>
            </div>

        </div>
    </div>
    <!--</div>-->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("Select[name='linked']").change(function() {

                var id = $(this).val();
                var url = "{{ url('/mobilesetting/slide') }}";
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(data) {
                        $("[name='linked_id']").html('');
                        $("[name='linked_id']").html(data.options);

                    }
                });
            });

        });
    </script>
@endsection
