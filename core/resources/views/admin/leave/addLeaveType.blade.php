@extends('admin.admin-layouts.master')

@section('content')

    <div class="container-fluid">

        <div class="mb-4 shadow card">
            <div class="card-header text-right">
                <a class="btn btn-sm btn-primary" data-toggle="modal"
                    href="#add_LeaveType_modal">{{ __('Add Leave Type') }}</a>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered" id="leaveTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Leave Type') }}</th>
                                    <th>{{ __('Total Leave Days') }}</th>
                                    <th>{{ __('Percalender') }}</th>
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

        <!-- Content Row -->

    </div>

    <div id="add_LeaveType_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Add Leave type') }}</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="leave_error" class="text-danger text-bold"></div><br>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="leave_type" class="form-control" type="text" placeholder="Leave Type">
                        </div>
                        <div class="form-group">
                            <input name="total_leave_days" class="form-control" type="number"
                                placeholder="Total Leave Days">
                        </div>
                        <div class="form-group">
                            <select name="percalender" id="percalender" class="form-control">
                                <option value="">-{{ __('select') }}-</option>
                                <option value="weekly">{{ __('Weekly') }}</option>
                                <option value="monthly">{{ __('Monthly') }}</option>
                                <option value="yearly">{{ __('Yearly') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input id="addLeaveType" class="btn btn-block btn-primary" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete Leave type -->
    <div id="delete_LeaveType_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Delete Leave Type') }}</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="ss" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                            <input type="hidden" name="leaveTypeID">
                            <h4>{{ __('Are You Sure To Delete') }}? </h4>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                            <input id="deleteLeaveType" class="btn btn-danger" type="submit" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_LeaveType_modal" class="modal fade">
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
                            <input type="hidden" name="leaveTypeID">
                            <input name="leave_typeEdit" class="form-control" type="text" placeholder="Leave Type">
                        </div>
                        <div class="form-group">
                            <input name="total_leave_daysEdit" class="form-control" type="text"
                                placeholder="Total Leave Days">
                        </div>
                        <div class="form-group">
                            <select name="percalenderEdit" id="percalenderEdit" class="form-control">
                                <option value="">-{{ __('select') }}-</option>
                                <option value="weekly">{{ __('Weekly') }}</option>
                                <option value="monthly">{{ __('Monthly') }}</option>
                                <option value="yearly">{{ __('Yearly') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="editLeaveType" class="btn btn-block btn-primary" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script>
        $(function() {

            let employee_id = $("input[name=employee_id]").val();

            var tableLoadLeaveType = $('#leaveTable').DataTable({
                ajax: "{{ route('admin.leave.index') }}",
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "leavetype"
                    },
                    {
                        "data": "limit"
                    },
                    {
                        "data": "percalendar"
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return [`<a id="editLeaveTypeModal" class="btn btn-sm btn-primary" data-id="${row.id}"><i class="fa fa-pen text-white" aria-hidden="true" data-toggle="modal" href="#"></i></a>`,
                                `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="deleteLeaveTypeModal"><i class="fa fa-times text-white" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`
                            ];
                        }
                    }

                ]
            });

            $(document).on('click', '#addLeaveType', function(e) {
                e.preventDefault();

                let leave_type = $("input[name=leave_type]").val();
                let percalender = $('#percalender').val();
                let total_leave_days = $("input[name=total_leave_days]").val();

                if (leave_type == "" || percalender == "" || total_leave_days == "") {
                    $('#leave_error').text("All fields are required");
                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('admin.leave.store') }}",
                        method: 'POST',
                        data: {
                            'leave_type': leave_type,
                            'percalender': percalender,
                            'total_leave_days': total_leave_days
                        },
                        dataType: "json",
                        success: function(response) {
                            $('#add_LeaveType_modal').modal('hide');
                            toastr.success('Leave Type Added Suceessfully')
                            tableLoadLeaveType.ajax.reload();

                        }

                    });
                }

            });



            $(document).on('click', 'a#deleteLeaveTypeModal', function(e) {
                e.preventDefault();
                $('#delete_LeaveType_modal').modal('show');
                let leaveTypeID = $(this).attr('data-id');
                $('#delete_LeaveType_modal input[name="leaveTypeID"]').val(leaveTypeID);


            });

            $(document).on('click', '#deleteLeaveType', function(e) {
                e.preventDefault();
                let leaveTypeID = $('#delete_LeaveType_modal input[name="leaveTypeID"]').val();

                let url = "{{ route('admin.delete-leaveType', ':id') }}";

                url = url.replace(':id', leaveTypeID);
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
                        $('#delete_LeaveType_modal').modal('hide');
                        toastr.success('Leave Type Deleted Suceessfully')
                        tableLoadLeaveType.ajax.reload();

                    }

                });


            });



            $(document).on('click', 'a#editLeaveTypeModal', function(e) {
                e.preventDefault();
                $('#edit_LeaveType_modal').modal('show');
                let leaveTypeID = $(this).attr('data-id');
                $('#edit_LeaveType_modal input[name="leaveTypeID"]').val(leaveTypeID);

                let url = "{{ route('admin.edit-leaveType', ':id') }}";

                url = url.replace(':id', leaveTypeID);

                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $("#percalenderEdit").val(data.percalendar).change();;
                        $('#edit_LeaveType_modal input[name="leave_typeEdit"]').val(data
                            .leavetype);
                        $('#edit_LeaveType_modal input[name="total_leave_daysEdit"]').val(data
                            .limit);


                        $('#edit_leaveRequest_modal').modal('show');
                    }
                });

            });

            $(document).on('click', '#editLeaveType', function(e) {
                e.preventDefault();

                let leaveTypeID = $('#edit_LeaveType_modal input[name="leaveTypeID"]').val();

                let leave_type = $("#edit_LeaveType_modal input[name=leave_typeEdit]").val();
                let percalender = $('#percalenderEdit').val();
                let total_leave_days = $("#edit_LeaveType_modal input[name=total_leave_daysEdit]").val();

                let url = "{{route('admin.edit-leaveType',':id')}}";

                url = url.replace(':id', leaveTypeID)


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        'leaveTypeID': leaveTypeID,
                        'leave_type': leave_type,
                        'percalender': percalender,
                        'total_leave_days': total_leave_days
                    },
                    success: function(response) {

                        $('#edit_LeaveType_modal').modal('hide');

                        toastr.success('Leave Type Updated Suceessfully')
                        tableLoadLeaveType.ajax.reload();




                    }
                });


            });
        })
    </script>

@endpush
