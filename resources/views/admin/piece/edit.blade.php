@extends('layouts.load')

@section('styles')
    <link href="{{ asset(access_public() . 'assets/admin/css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
@endsection


@section('content')
    <div class="content-area">

        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
                            <form id="geniusformdata" action="{{ route('admin-coupon-update-piece', $data->id) }}"
                                method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Code') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="code"
                                            placeholder="{{ __('Enter Code') }}" required="" value="{{ $data->code }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Users') }} *</h4>
                                            <p class="sub-heading">{{ __('(User Can Use This Code)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="type" name="user_id" required="">
                                            <option value=" " {{ $data->user_id == null ? 'selected' : '' }}>
                                                {{ __('For All') }}</option>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->user_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--       <div class="row">
                                  <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('Type') }} *</h4>
                                    </div>
                                  </div>
                                  <div class="col-lg-7">
                                      <select id="type" name="type" required="">
                                        <option value="">{{ __('Choose a type') }}</option>
                                        <option value="0" {{ $data->type == 0 ? 'selected' : '' }}>{{ __('Discount By Percentage') }}</option>
                                        <option value="1" {{ $data->type == 1 ? 'selected' : '' }}>{{ __('Discount By Amount') }}</option>
                                      </select>
                                  </div>
                                </div>-->

                                <!-- <div class="row hidden">
                                  <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading"></h4>
                                    </div>
                                  </div>
                                  <div class="col-lg-3">
                                    <input type="text" class="input-field less-width" name="price" placeholder="" required="" value="{{ $data->price }}"><span></span>
                                  </div>
                                </div>-->

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Quantity') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="times" required="">
                                            <option value="0" {{ $data->times == null ? 'selected' : '' }}>
                                                {{ __('Unlimited') }}</option>
                                            <option value="1" {{ $data->times != null ? 'selected' : '' }}>
                                                {{ __('Limited') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row hidden">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Value') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field less-width" name="times"
                                            placeholder="{{ __('Enter Value') }}"
                                            value="{{ $data->times }}"><span></span>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('User Can Buy To Use It') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="buy"
                                            placeholder="{{ __('Enter Number') }}" value="{{ $data->buy }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('User Will Take It Free') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="take"
                                            placeholder="{{ __('Enter Number') }}" value="{{ $data->take }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Start Date') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="start_date" id="from"
                                            placeholder="{{ __('Select a date') }}" required=""
                                            value="{{ $data->start_date }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('End Date') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="end_date" id="to"
                                            placeholder="{{ __('Select a date') }}" required=""
                                            value="{{ $data->end_date }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading"> {{ __('Coupon Image') }} *</h4>
                                            <small>{{ __('(Preferred SIze: 285 X 410 Pixel)') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview"
                                                style="background: url({{ $data->photo ? asset(access_public() . 'assets/images/coupon/' . $data->photo) : asset(access_public() . 'assets/images/noimage.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload"
                                                    id="image-upload">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <br>
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
    <script type="text/javascript">
        {{-- Coupon Function --}}

            (function() {

                var val = $('#type').val();
                var selector = $('#type').parent().parent().next();
                if (val == "") {
                    selector.hide();
                } else {
                    if (val == 0) {
                        selector.find('.heading').html('{{ __('Percentage') }} *');
                        selector.find('input').attr("placeholder", "{{ __('Enter Percentage') }}").next().html('%');
                        selector.css('display', 'flex');
                    } else if (val == 1) {
                        selector.find('.heading').html('{{ __('Amount') }} *');
                        selector.find('input').attr("placeholder", "{{ __('Enter Amount') }}").next().html('$');
                        selector.css('display', 'flex');
                    }
                }
            })();

        {{-- Coupon Type --}}

        $('#type').on('change', function() {
            var val = $(this).val();
            var selector = $(this).parent().parent().next();
            if (val == "") {
                selector.hide();
            } else {
                if (val == 0) {
                    selector.find('.heading').html('{{ __('Percentage') }} *');
                    selector.find('input').attr("placeholder", "{{ __('Enter Percentage') }}").next().html('%');
                    selector.css('display', 'flex');
                } else if (val == 1) {
                    selector.find('.heading').html('{{ __('Amount') }} *');
                    selector.find('input').attr("placeholder", "{{ __('Enter Amount') }}").next().html('$');
                    selector.css('display', 'flex');
                }
            }
        });


        {{-- Coupon Qty --}}



            (function() {

                var val = $("#times").val();
                var selector = $("#times").parent().parent().next();
                if (val == 1) {
                    selector.css('display', 'flex');
                } else {
                    selector.find('input').val("");
                    selector.hide();
                }

            })();


        $(document).on("change", "#times", function() {
            var val = $(this).val();
            var selector = $(this).parent().parent().next();
            if (val == 1) {
                selector.css('display', 'flex');
            } else {
                selector.find('input').val("");
                selector.hide();
            }
        });
    </script>

    <script type="text/javascript">
        var dateToday = new Date();
        var dates = $("#from,#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            minDate: dateToday,
            onSelect: function(selectedDate) {
                var option = this.id == "from" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults
                        .dateFormat, selectedDate, instance.settings);
                dates.not(this).datepicker("option", option, date);
            }
        });
    </script>
@endsection
