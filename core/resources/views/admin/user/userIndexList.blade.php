@extends('admin.admin-layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Role')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>

                                        @if ($user->status)
                                            <span class="badge badge-success">{{ __('Enabled') }}</span>
                                        @else
                                            <p class="badge badge-danger">{{__('Disabled')}}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.useredit', $user->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fa fa-pen"
                                                aria-hidden="true"></i></a>

                                        <a href="#" class="btn btn-sm btn-danger" id="userdel"
                                            del_id="{{ $user->id }}"><i class="fa fa-times"
                                                aria-hidden="true"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('script')


    <script>
        'use strict'
        $(document).on("click", "#userdel", function(arg) {
            arg.preventDefault();
            var id = $(this).attr("del_id");
            let url = "{{route('admin.destroy',':id')}}";

            url = url.replace(':id',id);
            new swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            type: "GET",
                            success(response) {
                                swal("Deleted", "Data has been Deleted Successfully", "success");
                                location.reload();
                            }
                        });

                    } else {
                        swal("Your data is safe!");
                    }
                });


        });
    </script>

@endpush
