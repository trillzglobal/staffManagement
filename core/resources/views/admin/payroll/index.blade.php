@extends('admin.admin-layouts.master')


@section('content')


    <div class="row">
        <div class="container">

            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">{{ __('Payment Information') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="dataTable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Employee') }}</th>
                                        <th scope="col">{{ __('Created Date') }}</th>
                                        <th scope="col">{{ __('Monthly Salary') }}</th>
                                        <th scope="col">{{ __('Deduction') }}</th>
                                        <th scope="col">{{ __('Bonus') }}</th>
                                        <th scope="col">{{ __('Total Salary') }}</th>
                                        <th scope="col">{{ __('From Date') }}</th>
                                        <th scope="col">{{ __('To Date') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Comment') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payroll as $p)
                                        <tr>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->created_at }}</td>
                                            <td>{{ $p->salary }}</td>
                                            <td>{{ $p->deduction }}</td>
                                            <td>{{ $p->bonus }}</td>
                                            <td>{{ $p->total_salary }}</td>
                                            <td>{{ $p->fromdate }}</td>
                                            <td>{{ $p->enddate }}</td>
                                            <td>
                                                @if ($p->approve_key == 1)
                                                    <span class="badge badge-danger">{{ __('Pending') }}</span>
                                                @else
                                                    <span class="badge badge-primary">{{ __('Done') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $p->comment }}</td>

                                        </tr>

                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>


@endsection
