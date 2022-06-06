@extends('admin.admin-layouts.master')

@section('content')


    <div class="container-fluid">

        <div class="mb-4 shadow card">
            <div class="card-header">
                <a class="btn btn-sm btn-primary" data-toggle="modal"
                    href="#add_equipment_modal">{{ __('Add new Equipment') }}</a>
            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered w-100" id="equipmentDT" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Equipment Name') }}</th>
                                    <th>{{ __('Type Name') }}</th>
                                    <th>{{ __('Model') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Total Price') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <div id="add_equipment_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Add Equipment') }}</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="equip_error" class="text-bold text-danger"></div> <br>
                    <form method="POST" id="addEquipmentForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="equipment_name" class="form-control" type="text" placeholder="Equipment Name">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Asset Type') }}</label>
                            <select name="asset_type" id="asset_typeEquipment" class="form-control">
                                <option value="">-{{__('select')}}-</option>
                                @foreach ($all_asset as $asset)
                                    <option value="{{ $asset->asset_type }}">{{ $asset->asset_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="model" class="form-control" type="text" placeholder="Model">
                        </div>
                        <div class="form-group">
                            <input name="quantity" class="form-control" type="number" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <input name="price" class="form-control" type="number" placeholder="price">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-block btn-primary" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete -fluid -->
    <div id="delete_equipment_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Delete Equipment') }}</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="ss" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="equipmentID">
                            <h4>{{ __('Are You Sure To Delete This Equipment') }}? </h4>
                        </div>
                        <div class="form-group text-right mt-5">
                            <button class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                            <input id="deleteEquipment" class="btn btn-danger" type="submit" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /.Edit Asset type -->

    <div id="edit_equipment_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit equipment') }}</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('Equipment Name') }}</label>
                            <input type="hidden" name="equipmentID">
                            <input name="equipment_name" class="form-control" type="text" placeholder="Equipment Name">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Asset Type') }}</label>
                            <select name="asset_type" id="asset_typeEquipmentEdit" class="form-control">
                                <option value="">-{{__('select')}}-</option>
                                @foreach ($all_asset as $asset)
                                    <option value="{{ $asset->asset_type }}">{{ $asset->asset_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Model') }}</label>
                            <input name="model" class="form-control" type="text" placeholder="Model">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Quantity') }}</label>
                            <input name="quantity" class="form-control" type="number" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Price') }}</label>
                            <input name="price" class="form-control" type="number" placeholder="price">
                        </div>

                        <div class="form-group">
                            <input id="editEquipment" class="btn btn-block btn-primary" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script>
        $(document).ready(function() {

            'use strict'

            var tableLoadEquipment = $('#equipmentDT').DataTable({
                ajax: "{{route('admin.equipmentTable')}}",
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "equipment_name"
                    },
                    {
                        "data": "asset_type"
                    },
                    {
                        "data": "model"
                    },
                    {
                        "data": "price"
                    },
                    {
                        "data": "quantity"
                    },
                    {
                        "data": "total_price"
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return [`<a id="editEquipmentModal" class="btn btn-sm btn-primary text-white" data-id="${row.id}"><i class="fa fa-pen" aria-hidden="true" data-toggle="modal" href="#"></i></a>`,
                                `<a class="btn btn-sm btn-danger text-white" data-id="${row.id}" id="deleteEquipmentModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`
                            ];
                        }
                    }

                ]
            });


            $(document).on('submit', '#addEquipmentForm', function(e) {
                e.preventDefault();
                let equipment_name = $("input[name=equipment_name]").val();
                let asset_typeEquipment = $('#asset_typeEquipment').val();
                let model = $("input[name=model]").val();
                let price = $("input[name=price]").val();
                let quantity = $("input[name=quantity]").val();
                let total_price = price * quantity;

                if (equipment_name == "" || asset_typeEquipment == "" || model == "" || price == "" ||
                    quantity == "") {
                    $('#equip_error').text("All fields are required");
                } else {

                    $.ajax({
                        url: "{{route('admin.add-equipment')}}",
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data: new FormData(this),
                        success: function(response) {
                            $('#add_equipment_modal').modal('hide');
                            
                            location.reload();
                            toastr.success(response.success)
                        }

                    });


                }


            });


            $(document).on('click', 'a#deleteEquipmentModal', function(e) {
                e.preventDefault();
                $('#delete_equipment_modal').modal('show');
                let equipmentID = $(this).attr('data-id');

                $('#delete_equipment_modal input[name="equipmentID"]').val(equipmentID);

            });

            $(document).on('click', '#deleteEquipment', function(e) {
                e.preventDefault();
                let equipmentID = $('#delete_equipment_modal input[name="equipmentID"]').val();

                let url = "{{route('admin.delete-equipment',':id')}}"

                url = url.replace(":id", equipmentID);

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
                        $('#delete_equipment_modal').modal('hide');
                        tableLoadEquipment.ajax.reload();
                        toastr.success('Equipemnt Deleted Successfully');
                    },
                    error: function(response) {

                    }
                });


            });



            $(document).on('click', 'a#editEquipmentModal', function(e) {
                e.preventDefault();

                let equipmentID = $(this).attr('data-id');

                let url = "{{route('admin.edit-equipment',':id')}}"

                url = url.replace(":id", equipmentID);

                $('#edit_equipment_modal input[name="equipmentID"]').val(equipmentID);

                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: "json",
                    success: function(data) {

                        $('#edit_equipment_modal input[name="equipment_name"]').val(data
                            .equipment_name);
                        $("#asset_typeEquipmentEdit").val(data.asset_type).change();;
                        $('#edit_equipment_modal input[name="model"]').val(data.model);
                        $('#edit_equipment_modal input[name="quantity"]').val(data.quantity);
                        $('#edit_equipment_modal input[name="price"]').val(data.price);
                        $('#edit_equipment_modal input[name="total_price"]').val(data
                            .total_price);
                        $('#edit_equipment_modal').modal('show');
                    },
                    error: function(data) {

                    }
                });

            });

            $(document).on('click', '#editEquipment', function(e) {
                e.preventDefault();
                let equipmentID = $('#edit_equipment_modal input[name="equipmentID"]').val();
                let equipment_name = $("#edit_equipment_modal input[name=equipment_name]").val();
                let asset_typeEquipmentEdit = $('#asset_typeEquipmentEdit').val();
                let model = $("#edit_equipment_modal input[name=model]").val();
                let price = $("#edit_equipment_modal input[name=price]").val();
                let quantity = $("#edit_equipment_modal input[name=quantity]").val();
                let total_price = price * quantity;

                
                let url = "{{route('admin.update-equipment',':id')}}"

                url = url.replace(":id", equipmentID);

                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        'equipment_name': equipment_name,
                        'asset_typeEquipmentEdit': asset_typeEquipmentEdit,
                        'model': model,
                        'quantity': quantity,
                        'price': price,
                        'total_price': total_price
                    },
                    success: function(response) {

                        $('#edit_equipment_modal').modal('hide');
                        tableLoadEquipment.ajax.reload();

                        toastr.success('Equipment Updated Successfully')

                    },
                    error: function(response) {

                    }
                });


            });

        });
    </script>

@endpush
