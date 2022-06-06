@extends('admin.admin-layouts.master')
@section('content')

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="{{ route('admin.userCreate') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"
                            aria-hidden="true"></i> {{__('Add user')}}</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('User ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Role')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>

                                        @if ($user->status == 1)
                                            <p>{{__('Enabled')}}</p>
                                        @else
                                            <p>{{__('Disabled')}}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.useredit', $user->id) }}" class="btn btn-sm btn-primary"><i
                                                class="fa fa-pen" aria-hidden="true"></i></a>

                                        <a href="{{ route('admin.destroy', $user->id) }}" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are You Confirm To Delete')"><i class="fa fa-times"
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
