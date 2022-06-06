@extends('admin.admin-layouts.master')


@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">{{__('Payroll List')}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Employee')}}</th>
                                <th>{{__('Department')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Monthly Salary')}}</th>

                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($emp as $e)
                                <tr>
                                    <td>{{ $e->user_id }}</td>
                                    <td>{{ $e->user->name }}</td>
                                    <td>{{ $e->department }}</td>
                                    <td>
                                        @if ($e->user->status)
                                            <span class="badge badge-primary">{{__('Active')}}</span>
                                        @else
                                            <span class="badge badge-danger">{{__('Deactive')}}</span>
                                        @endif
                                    </td>
                                    <td>{{ $e->salary }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('admin.addpayment', $e->user_id) }}"><i
                                                class="fa fa-pen"></i></a>
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

