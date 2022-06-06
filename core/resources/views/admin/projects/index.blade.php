@extends('admin.admin-layouts.master')

@section('content')


    <div class="container-fluid">

        <div class="mb-4 d-sm-flex align-items-center justify-content-between">
            <h1 class="mb-0 text-gray-800 h3">{{ __('Work Space Name') }}: {{ $workspace->name }}</h1>
            <input type="hidden" id="workid" name="workid" value="{{ $workspace->id }}">

        </div>

        <div class="mb-4 shadow card">
            <div class="py-3 card-header text-right">
                <a class="btn btn-sm btn-primary " data-toggle="modal" href="#add_workspace_modal"> <i
                        class="fa fa-plus"></i> {{ __('Add new Project') }}</a>
            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="workspaceDT" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>{{ __('Project Name') }}</th>
                                        <th>{{ __('Created At') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Start Time') }}</th>
                                        <th>{{ __('End Time') }}</th>
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

    </div>


    <div id="add_workspace_modal" class="modal fade">
        <div class="modal-dialog">
            <form id="projectform" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Add Project') }}</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div id="project_error" class="text-bold text-danger"></div>

                        <div class="form-group">
                            <label for="">{{ __('Project Name') }}</label>
                            <input name="name" id="name" class="form-control" type="text" placeholder="Project Name">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror

                            <input name="wid" id="name" class="form-control" type="hidden"
                                value="{{ $workspace->id }}">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Description') }}</label>
                            <input name="description" id="description" class="form-control" type="text"
                                placeholder="Project Description">
                            @error('description')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group date">
                            <label for="">{{ __('Start Date') }}</label>
                            <input class="form-control" id="datepicker" name="startdate" autocomplete="off" />
                            @error('startdate')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">{{ __('End Date') }}</label>

                            <input id="datepickerl" name="enddate" class="form-control" autocomplete="off" />

                            @error('enddate')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Project Budget') }}</label>
                            <input name="budget" id="budget" class="form-control" type="number">

                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Select Employees') }}</label>

                            <select id="choices-multiple-remove-button" placeholder="Select Employees" name="user_id[]"
                                multiple>
                                @foreach ($emp as $emp)
                                    <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                @endforeach

                            </select>
                            @error('user_id')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror

                        </div>



                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input id="saveBtn" class="btn btn-block btn-primary" type="submit" value="create">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <div id="edit_workspace_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Add Project') }}</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="projectform" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('Project Name') }}</label>
                            <input name="name" id="name" class="form-control" type="text" placeholder="Project Name"
                                required>
                            <input name="id" id="name" class="form-control" type="hidden">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Description') }}</label>
                            <input name="description" id="description" class="form-control" type="text"
                                placeholder="Project Description" required>
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('Select Status') }}</label>
                            <select name="status" id="status" class="form-control">
                                <option value="ongoing">{{ __('Ongoing') }}</option>
                                <option value="onhold">{{ __('On Hold') }}</option>
                                <option value="finished">{{ __('Complete') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Start Date') }}</label>
                            <input id="datepicker" class="form-control" name="startdate" width="270" required />

                        </div>
                        <div class="form-group">
                            <label for="">{{ __('End Date') }}</label>

                            <input id="datepickerl" class="form-control" name="enddate" width="270" />


                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Project Budget') }}</label>
                            <input name="budget" id="budget" class="form-control" type="number" required>
                        </div>

                        <div class="form-group">
                            <input id="editpro" class="btn btn-block btn-primary" type="submit" value="Update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="delete_workspace_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Delete Workspace') }}</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>

                    @csrf
                    <div class="form-group">
                        <input type="hidden" value="" name="workspaceID">
                        <h4>{{ __('Are You Sure to delete') }}? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="deleteworkspace" class="btn btn-block btn-info" type="submit" value="Delete">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')

    <style>
        .choices__list--multiple .choices__item {
            border-radius: 0px;
            background-color: #4e73df;
            border: 1px solid #4e73df;
        }

    </style>

@endpush

@push('script')


    <script src="{{ asset('assets/backend/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/choices.min.js') }}">
    </script>


    <script>
        'use strict'
        $(document).ready(function() {

            var a = $('#workid').val();

            var url = "{{ route('projecttable', ':url') }}";
            url = url.replace(':url', a);

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 5,
                searchResultLimit: 5,
                renderChoiceLimit: 5
            });

            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap'
            });

            $('#datepickerl').datepicker({
                uiLibrary: 'bootstrap'
            });

            var tableLoad = $('#workspaceDT').DataTable({
                ajax: url,

                columns: [{
                        "data": "name"
                    },
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "status",

                    },
                    {
                        "data": "startdate"
                    },
                    {
                        "data": "enddate"
                    },

                    {
                        "data": null,
                        render: function(data, type, row) {

                            var url = "{{ route('project.view', [$workspace->id,':url']) }}";
                            url = url.replace(':url', row.id);

                            return [`<a class="btn btn-sm btn-primary text-white" href="${url}" data-id="${row.id}"><i class="fa fa-eye" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`,
                                `<a class="btn btn-sm btn-primary text-white" data-id="${row.id}" id="edit"><i class="fa fa-pen" aria-hidden="true" data-toggle="modal" href="#edit_asset_modal" ></i></a>`,
                                `<a class="btn btn-sm btn-danger text-white"  data-id="${row.id}" id="deleteWorkspaceModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal"  ></i></a>`
                            ];
                        }
                    }

                ]
            });






            $("#projectform").on('submit', function(e) {
                e.preventDefault();

                let name = $("#projectform input[name=name]").val();
                let description = $('#projectform input[name=description]').val();
                let startdate = $("#projectform input[name=startdate]").val();
                let enddate = $("#projectform input[name=enddate]").val();
                let user_id = $("#projectform input[name=user_id]").val();

                if (name == "" || description == "" || startdate == "" || enddate == "" || user_id == "") {
                    $('#project_error').text("All fields are required");
                } else {


                    $.ajax({
                        type: "post",
                        url: "{{ route('project.add') }}",
                        data: $("#projectform").serialize(),
                        success: function(response) {
                            $("#add_workspace_modal").modal('hide')

                            toastr.success(response.success)
                            location.reload();

                        },
                        error: function(error) {


                        }
                    })

                }
            })


            $(document).on('click', '#deleteWorkspaceModal', function() {


                let workspaceid = $(this).attr('data-id');
                $('#delete_workspace_modal input[name="workspaceID"]').val(workspaceid);


                $('#delete_workspace_modal').modal('show');
            })


            $(document).on('click', '#deleteworkspace', function(e) {
                e.preventDefault();
                let workspaceid = $('#delete_workspace_modal input[name="workspaceID"]').val();

                var url = "{{ route('project.delete', ':url') }}";
                url = url.replace(':url', workspaceid);
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
                        $('#delete_workspace_modal').modal('hide');
                        tableLoad.ajax.reload();
                        swal("Good job!", "Workspace Deleted", "success");
                    },
                    error: function(response) {


                    }
                });




            })


            $(document).on('click', '#edit', function(e) {
                e.preventDefault();
                $('#edit_workspace_modal').modal('show');
                let id = $(this).attr('data-id');
                $('#edit_workspace_modal input[name="id"]').val(id);
                $('#checkbox').empty();

                var url = "{{ route('project.edit', ':url') }}";
                url = url.replace(':url', id);

                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: "json",
                    success: function(data) {


                        $('#edit_workspace_modal input[name="id"]').val(data.id);
                        $('#edit_workspace_modal input[name="name"]').val(data.name);
                        $('#edit_workspace_modal input[name="description"]').val(data
                            .description);
                        $('#edit_workspace_modal input[name="startdate"]').val(data
                            .startdate);
                        $('#edit_workspace_modal input[name="enddate"]').val(data.enddate);
                        $('#edit_workspace_modal input[name="status"]').val(data.status);
                        $('#edit_workspace_modal input[name="budget"]').val(data.budget);


                    },
                    error: function(data) {


                    }
                });

            });

            $(document).on('click', '#editpro', function(e) {
                e.preventDefault();


                let id = $('#edit_workspace_modal input[name="id"]').val();


                let name = $("#edit_workspace_modal input[name=name]").val();
                let description = $("#edit_workspace_modal input[name=description]").val();

                let status = $("#status").val();

                let startdate = $("#edit_workspace_modal input[name=startdate]").val();
                let enddate = $("#edit_workspace_modal input[name=enddate]").val();
                let budget = $("#edit_workspace_modal input[name=budget").val();


                var url = "{{ route('project.update', ':url') }}";
                url = url.replace(':url', id);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        'id': id,
                        'name': name,
                        'description': description,
                        'status': status,
                        'startdate': startdate,
                        'enddate': enddate,
                        'budget': budget
                    },
                    success: function(response) {
                        $('#edit_workspace_modal').modal('hide');
                        location.reload();
                    },
                    error: function(response) {


                    }
                });


            });


        })
    </script>



@endpush
