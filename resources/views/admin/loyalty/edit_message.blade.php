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
                            <form id="geniusformdata" action="{{ route('admin-message-update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}





                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Message') }} *</h4>
                                            <!--<p class="sub-heading">{{ __('(In Any Language)') }}</p>-->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <textarea name="message" class="nic-edit-p">{{ $user->message }}</textarea>
                                    </div>
                                </div>


                                <br>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">{{ __('update') }}</button>
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
