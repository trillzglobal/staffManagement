@extends('admin.admin-layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="card col-md-12">
                <div class="card-header">
                    <a class="btn btn-sm btn-primary" data-toggle="modal" href="#add_asset_modal">{{__('Add new Asset')}}</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered " id="assetTypeDT" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Type Name') }}</th>
                                <th>{{ __('Action') }}</th>

                            </tr>
                        </thead>
                        <tbody id="assetTypeTable">

                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <!-- Content Row -->

    </div>

    <div id="add_asset_modal" class="modal fade">
        <div class="modal-dialog">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Add Asset Type') }}</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">
                            <input name="asset_type" id="asset_type" class="form-control" type="text"
                                placeholder="Asset Type">
                        </div>
                        <div class="form-group">
                            <input id="addAssetType" class="btn btn-block btn-primary" type="submit" value="Save">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="delete_asset_modal" class="modal fade">
        <div class="modal-dialog">
            <form id="ss" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Delete Equipment') }}</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">
                            <input type="hidden" name="assetTypeId">
                            <h4>{{ __('Are You Sure To Delete') }}? </h4>
                        </div>
                       

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                        <input id="deleteAssetType" class="btn btn-danger" type="submit" value="Delete">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="edit_asset_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit Asset Type') }}</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('Asset Type Name') }}</label>
                            <input type="hidden" name="assetTypeId">
                            <input name="asset_typeEdit" id="asset_typeEdit" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <input id="editAssetType" class="btn btn-block btn-primary" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script>
        'use strict'
        $(document).on('click', '#addAssetType', function(e) {
            e.preventDefault();
            let asset_type = $('#asset_type').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.assetTypeTable')}}",
                method: 'POST',
                data: {
                    'asset_type': asset_type
                },
                dataType: "json",
                success: function(response) {
                    $('#add_asset_modal').modal('hide');
                    $('#asset_type').val('')
                    tableLoad.ajax.reload();
                    toastr.success(response.success)
                },
                error: function(response) {

                }
            });


        });

        var tableLoad = $('#assetTypeDT').DataTable({
            ajax: "{{route('admin.asset.get')}}",
            columns: [{
                    "data": "id"
                },
                {
                    "data": "asset_type"
                },
                {
                    "data": null,
                    render: function(data, type, row) {
                        return [`<a id="editAssetTypeModal" class="btn btn-sm btn-primary text-white" data-id="${row.id}"><i class="fa fa-pen" aria-hidden="true" data-toggle="modal" href="#"></i></a>`,
                            `<a class="btn btn-sm btn-danger text-white" data-id="${row.id}" id="deleteAssetTypeModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#delete_asset_modal" ></i></a>`
                        ];
                    }
                }

            ]
        });

        $(document).on('click', 'a#deleteAssetTypeModal', function(e) {
            e.preventDefault();
            $('#delete_asset_modal').modal('show');
            let assetTypeID = $(this).attr('data-id');

            $('#delete_asset_modal input[name="assetTypeId"]').val(assetTypeID);


        });

        $(document).on('click', '#deleteAssetType', function(e) {
            e.preventDefault();
            let assetTypeID = $('#delete_asset_modal input[name="assetTypeId"]').val();

            let url = "{{route('admin.delete-assetType',':id')}}";
            url = url.replace(':id', assetTypeID)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#delete_asset_modal').modal('hide');
                    tableLoad.ajax.reload();
                    toastr.success(response.success)
                },
                error: function(response) {

                }
            });


        });

        $(document).on('click', 'a#editAssetTypeModal', function(e) {
            e.preventDefault();

            let assetTypeID = $(this).attr('data-id');

            let url = "{{route('admin.ediit-assetType',':id')}}";
            url = url.replace(':id', assetTypeID);

            $('#edit_asset_modal input[name="assetTypeId"]').val(assetTypeID);

            $.ajax({
                url: url,
                method: 'get',
                dataType: "json",
                success: function(data) {

                    $('#edit_asset_modal input[name="asset_typeEdit"]').val(data.asset_type);
                    $('#edit_asset_modal').modal('show');
                },
                error: function(data) {

                }
            });

        });

        $(document).on('click', '#editAssetType', function(e) {
            e.preventDefault();
            let assetTypeID = $('#edit_asset_modal input[name="assetTypeId"]').val();
            let asset_typeEdit = $('#asset_typeEdit').val();

            

            let url = "{{route('admin.update-assetType',':id')}}";
            url = url.replace(':id', assetTypeID);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    'asset_typeEdit': asset_typeEdit
                },
                success: function(response) {

                    $('#edit_asset_modal').modal('hide');
                    tableLoad.ajax.reload();
                    toastr.success(response.success)
                },
                error: function(response) {

                }
            });


        });
    </script>

@endpush
