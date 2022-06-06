@extends('admin.admin-layouts.master')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 m-text text-dark">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">


        <div class="mb-4 shadow card">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('User ID') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($employees as $employee)

                            

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="w-15">
                                        <img src="{{ asset('assets/files/uploads/' . @$employee->emp_info->avatar) }}"
                                            alt="employee" class="rounded w-100">
                                    </td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>
                                        @if ($employee->status)
                                            <span class="badge badge-success">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('Deactive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start mb-2">
                                            <div class="mr-2">
                                                <a href="{{ route('admin.employeeView', @$employee->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-eye"
                                                        aria-hidden="true"></i></a>
                                            </div>

                                            <div>
                                                <a href="{{ route('admin.employeeEdit', @$employee->id) }}"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-pen"
                                                        aria-hidden="true"></i></a>
                                            </div>

                                        </div>
                                        @if ($employee->role != 'admin')
                                            <div class="d-flex justify-content-start">

                                                

                                                <div>
                                                    <a class="btn btn-sm btn-danger " id="employee_btn_by"
                                                        employee_id="{{ @$employee->id }}">
                                                        <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                    </td>
                                </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

@endsection

@push('style')

    <style>
        .w-15 {
            width: 15% !important;
        }
        @media (max-width: 575.98px) { 
            .m-text{
            font-size: 1.5rem;
        }
        }
        

    </style>

@endpush

@push('script')

    <script>
        $(function() {
            'use strict'
            $(document).on('click', '#employee_btn_by', function(e) {
                e.preventDefault();
                let id = $('#employee_btn_by').attr('employee_id');

               
                new swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: 'manage-employee/delete/' + id,
                                method: 'POST',
                                success: function(out) {
                                    swal("Deleted", "Data has been Deleted Successfully",
                                        "success");
                                    window.location.href =
                                        "{{ route('admin.employeeIndex') }}"
                                }
                            })

                        } else {
                            swal("Your data is safe!");
                        }
                    });
            });

            $(document).on('click', '#disableEmployee', function(e) {
                e.preventDefault();
                let id = $('#employee_btn_by').attr('employee_id');
                new swal({
                        title: "Are you sure?",
                        text: "You want to disable this Employee",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {

                        if (willDelete) {
                            $.ajax({
                                url: 'manage-employee/disable/' + id,
                                method: 'GET',
                                success: function(out) {
                                    window.location.href =
                                        "{{ route('admin.employeeIndex') }}"
                                }
                            })

                        } else {
                            swal("Your data is safe!");
                        }
                    });
            });



        });
    </script>

@endpush
