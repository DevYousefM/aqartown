@extends('layouts.vendor')

@section('content')
    <input type="hidden" id="headerdata" value="{{ $langg->lang720 }}">
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ $langg->lang721 }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('vendor-dashboard') }}">{{ $langg->lang441 }} </a>
                        </li>

                        <li>
                            <a href="javascript:;">{{ $langg->lang452 }}</a>
                        </li>

                        <li>
                            <a href="{{ route('vendor-package-index') }}">{{ $langg->lang721 }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mr-table allproduct">

                        @include('includes.admin.form-success')

                        <div class="table-responsiv">
                            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ $langg->lang722 }}</th>
                                        <th>{{ $langg->lang723 }}</th>
                                        <th>{{ $langg->lang724 }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD / EDIT MODAL --}}

    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="submit-loader">
                    <img src="{{ asset('public/assets/images/' . $gs->admin_loader) }}" alt="">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $langg->lang726 }}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD / EDIT MODAL ENDS --}}


    {{-- DELETE MODAL --}}

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header d-block text-center">
                    <h4 class="modal-title d-inline-block">{{ $langg->lang734 }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="text-center">{{ $langg->lang728 }}</p>
                    <p class="text-center">{{ $langg->lang729 }}</p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ $langg->lang730 }}</button>
                    <a class="btn btn-danger btn-ok">{{ $langg->lang731 }}</a>
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
            ajax: '{{ route('vendor-package-datatables') }}',
            columns: [{
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false
                }

            ],
            language: {
                processing: '<img src="{{ asset('public/assets/images/' . $gs->admin_loader) }}">'
            }
        });

        $(function() {
            $(".btn-area").append('<div class="col-sm-4 table-contents">' +
                '<a class="add-btn" data-href="{{ route('vendor-package-create') }}" id="add-data" data-toggle="modal" data-target="#modal1">' +
                '<i class="fas fa-plus"></i> {{ $langg->lang733 }}' +
                '</a>' +
                '</div>');
        });

        {{-- DATA TABLE ENDS --}}
    </script>
@endsection
