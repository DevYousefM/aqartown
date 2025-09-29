@extends('layouts.admin')

@section('content')
    <style>
        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 14px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked~.checkmark {
            background-color: #2D3274;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
    <input type="hidden" id="headerdata" value="{{ __('projects') }}">

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('projects') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('projects') }}</a></li>
                        <li>
                            <a href="{{ route('admin-cat-index') }}">{{ __('projects') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @if (Session::has('error'))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems.<br><br>
                <ul>

                    <li>{{ Session::get('error') }}</li>

                </ul>
            </div>
        @endif
        <div class="product-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mr-table allproduct">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success " align="center">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @include('includes.admin.form-success')

                        <div class="table-responsiv">
                            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="2%">
                                            <div class="">
                                                <label class="container">{{ __('Check All') }}
                                                    <input type="checkbox" name="checkall" id="checkall">


                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </th>
                                        <th width="20%">{{ __('Name') }}</th>
                                        <!-- <th width="20%">{{ __('Slug') }}</th> -->

                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Options') }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="row" style="margin-top: 31px;">
                            <div class="col-lg-12" style="display:contents">
                                <!--
                 <form  action="{{ route('admin-cat-all') }}" method="post" enctype="multipart/form-data" id="mass_deactivate_form"  style="margin-right: 5px;" >
                 {{ csrf_field() }}
                                                <input type="hidden" id="selected_products" name="selected_products" value="">
                                               <input class="btn btn-xs btn-warning" id="deactivate-selected" type="submit" value="{{ __('deactivate Selected') }}">
                 </form>

                 <form  action="{{ route('admin-cat-activate') }}" method="post" enctype="multipart/form-data" id="mass_activate_form" style="margin-right: 5px;">
                 {{ csrf_field() }}
                                                <input type="hidden" id="selected_products_activate" name="selected_products_activate" value="">
                                               <input class="btn btn-xs btn-success" id="activate-selected" type="submit" value="{{ __('activate Selected') }}">
                 </form>

                 <form  action="{{ route('admin-cat-deleted') }}" method="post" enctype="multipart/form-data" id="mass_delete_form" style="margin-right: 5px;">
                 {{ csrf_field() }}
                                                <input type="hidden" id="selected_products_delete" name="selected_products_delete" value="">
                                               <input class="btn btn-xs btn-danger" id="delete-selected" type="submit" value="{{ __('Delete Selected') }}">
                 </form>
                 -->





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- GALLERY MODAL --}}

    <div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                    <form method="POST" enctype="multipart/form-data" id="form-gallery">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="pid" name="category_id" value="">
                                        <input type="file" name="gallery[]" class="hidden" id="uploadgallery"
                                            accept="image/*" multiple>
                                        <label for="image-upload" id="prod_gallery"><i
                                                class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i
                                        class="fas fa-check"></i> {{ __('Done') }}</a>
                            </div>
                            <div class="col-sm-12 text-center">(
                                <small>{{ __('You can upload multiple Images') }}.</small> )
                            </div>
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


    {{-- GALLERY MODAL ENDS --}}

    {{-- ADD / EDIT MODAL --}}

    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="submit-loader">
                    <img src="{{ asset(access_public() . 'assets/images/' . $gs->admin_loader) }}" alt="">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD / EDIT MODAL ENDS --}}

    {{-- ATTRIBUTE MODAL --}}

    <div class="modal fade" id="attribute" tabindex="-1" role="dialog" aria-labelledby="attribute"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="submit-loader">
                    <img src="{{ asset(access_public() . 'assets/images/' . $gs->admin_loader) }}" alt="">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ATTRIBUTE MODAL ENDS --}}


    {{-- DELETE MODAL --}}

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header d-block text-center">
                    <h4 class="modal-title d-inline-block">{{ __('Confirm Delete') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="text-center">
                        {{ __('You are about to delete this Category. Everything under this category will be deleted') }}.
                    </p>
                    <p class="text-center">{{ __('Do you want to proceed?') }}</p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger btn-ok">{{ __('Delete') }}</a>
                </div>

            </div>
        </div>
    </div>

    {{-- DELETE MODAL ENDS --}}
@endsection


@section('scripts')
    {{-- DATA TABLE --}}

    <script type="text/javascript">
        var table = $('#geniustable').DataTable({
            ordering: false,
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin-cat2-datatables') }}',
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                // { data: 'slug', name: 'slug' },

                {
                    data: 'status',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false
                }

            ],
            language: {
                processing: '<img src="{{ asset(access_public() . 'assets/images/' . $gs->admin_loader) }}">'
            },
            drawCallback: function(settings) {
                $('.select').niceSelect();
            }
        });

        $(function() {
            $(".btn-area").append('<div class="col-sm-4 table-contents">' +
                '<a class="add-btn" data-href="{{ route('admin-cat2-create') }}" id="add-data" data-toggle="modal" data-target="#modal1">' +
                '<i class="fas fa-plus"></i> Add New' +
                '</a>' +
                '</div>');
        });

        {{-- DATA TABLE ENDS --}}
    </script>

    <script type="text/javascript">
        $("#checkall").change(function() {
            if (this.checked) {

                $(".all").prop('checked', true);

            } else {
                $(".all").prop('checked', false);

            }
        });

        $(".all").change(function() {

            $("#checkall").prop('checked', false);


        });


        $(document).on('click', '#deactivate-selected', function(e) {
            e.preventDefault();
            var selected_rows = getSelectedRows();

            if (selected_rows.length > 0) {
                $('input#selected_products').val(selected_rows);


                var form = $('form#mass_deactivate_form')
                form.submit()
                var data = form.serialize();
                $.ajax({
                    method: form.attr('method'),
                    url: form.attr('action'),
                    dataType: 'json',
                    data: data,
                    success: function(result) {
                        if (result.success == true) {
                            toastr.success(result.msg);
                            product_table.ajax.reload();
                            form
                                .find('#selected_products')
                                .val('');
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });


            } else {
                $('input#selected_products').val('');

            }

        });

        $(document).on('click', '#activate-selected', function(e) {
            e.preventDefault();
            var selected_rows = getSelectedRows();

            if (selected_rows.length > 0) {
                $('input#selected_products_activate').val(selected_rows);


                var form = $('form#mass_activate_form')
                form.submit()
                var data = form.serialize();
                $.ajax({
                    method: form.attr('method'),
                    url: form.attr('action'),
                    dataType: 'json',
                    data: data,
                    success: function(result) {
                        if (result.success == true) {
                            toastr.success(result.msg);
                            product_table.ajax.reload();
                            form
                                .find('#selected_products_activate')
                                .val('');
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });


            } else {
                $('input#selected_products_activate').val('');

            }

        });
        $(document).on('click', '#delete-selected', function(e) {
            e.preventDefault();
            var selected_rows = getSelectedRows();

            if (selected_rows.length > 0) {
                $('input#selected_products_delete').val(selected_rows);


                var form = $('form#mass_delete_form')
                form.submit()
                var data = form.serialize();
                $.ajax({
                    method: form.attr('method'),
                    url: form.attr('action'),
                    dataType: 'json',
                    data: data,
                    success: function(result) {
                        if (result.success == true) {
                            toastr.success(result.msg);
                            product_table.ajax.reload();
                            form
                                .find('#selected_products_delete')
                                .val('');
                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });


            } else {
                $('input#selected_products_delete').val('');

            }

        });



        function getSelectedRows() {
            var selected_rows = [];
            var i = 0;
            $('.row-select:checked').each(function() {
                selected_rows[i++] = $(this).val();
            });

            return selected_rows;
        }
    </script>



    <script type="text/javascript">
        // Gallery Section Update

        $(document).on("click", ".set-gallery", function() {
            var pid = $(this).find('input[type=hidden]').val();
            $('#pid').val(pid);
            $('.selected-image .row').html('');
            $.ajax({
                type: "GET",
                url: "{{ route('admin-gallery-show') }}",
                data: {
                    id: pid
                },
                success: function(data) {
                    if (data[0] == 0) {
                        $('.selected-image .row').addClass('justify-content-center');
                        $('.selected-image .row').html('<h3>{{ __('No Images Found.') }}</h3>');
                    } else {
                        $('.selected-image .row').removeClass('justify-content-center');
                        $('.selected-image .row h3').remove();
                        var arr = $.map(data[1], function(el) {
                            return el
                        });

                        for (var k in arr) {
                            $('.selected-image .row').append('<div class="col-sm-6">' +
                                '<div class="img gallery-img">' +
                                '<span class="remove-img"><i class="fas fa-times"></i>' +
                                '<input type="hidden" value="' + arr[k]['id'] + '">' +
                                '</span>' +
                                '<a href="' +
                                '{{ asset(access_public() . 'assets/images/galleries') . '/' }}' +
                                arr[k]['photo'] + '" target="_blank">' +
                                '<img src="' +
                                '{{ asset(access_public() . 'assets/images/galleries') . '/' }}' +
                                arr[k][
                                    'photo'
                                ] + '" alt="gallery image">' +
                                '</a>' +
                                '</div>' +
                                '</div>');
                        }
                    }

                }
            });
        });


        $(document).on('click', '.remove-img', function() {
            var id = $(this).find('input[type=hidden]').val();
            $(this).parent().parent().remove();
            $.ajax({
                type: "GET",
                url: "{{ route('admin-gallery-delete') }}",
                data: {
                    id: id
                }
            });
        });

        $(document).on('click', '#prod_gallery', function() {
            $('#uploadgallery').click();
        });


        $("#uploadgallery").change(function() {
            $("#form-gallery").submit();
        });

        $(document).on('submit', '#form-gallery', function() {
            $.ajax({
                url: "{{ route('admin-gallery-store') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data != 0) {
                        $('.selected-image .row').removeClass('justify-content-center');
                        $('.selected-image .row h3').remove();
                        var arr = $.map(data, function(el) {
                            return el
                        });
                        for (var k in arr) {
                            $('.selected-image .row').append('<div class="col-sm-6">' +
                                '<div class="img gallery-img">' +
                                '<span class="remove-img"><i class="fas fa-times"></i>' +
                                '<input type="hidden" value="' + arr[k]['id'] + '">' +
                                '</span>' +
                                '<a href="' +
                                '{{ asset(access_public() . 'assets/images/galleries') . '/' }}' +
                                arr[k]['photo'] + '" target="_blank">' +
                                '<img src="' +
                                '{{ asset(access_public() . 'assets/images/galleries') . '/' }}' +
                                arr[k][
                                    'photo'
                                ] + '" alt="gallery image">' +
                                '</a>' +
                                '</div>' +
                                '</div>');
                        }
                    }

                }

            });
            return false;
        });


        // Gallery Section Update Ends
    </script>
@endsection
