@extends('admin.admin-layouts.master')

@section('content')

    <div class="row">
        <div class="container">
            <div class="col-md-8">

                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">{{ __('Employee Information') }}</h6>
                    </div>
                    <div class="card-body">


                        <table class="table table-responsive w-100" id="dataTable3">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Employee') }}</th>
                                    <th scope="col">{{ __('Department') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Salary') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emp as $e)
                                    <tr>
                                        <th scope="row">{{ $e->user_id }}</th>
                                        <td>{{ $e->name }}</td>
                                        <td>{{ $e->department }}</td>
                                        <td>
                                            @if ($e->status)
                                                <span class="badge badge-success">{{ __('Active') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('Deactive') }}</span>
                                            @endif

                                        </td>
                                        <td>{{ $e->salary }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

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

                        <table class="table table-responsive w-100" id="dataTable2">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Created Date') }}</th>
                                    <th scope="col">{{ __('Monthly Salary') }}</th>
                                    <th scope="col">{{ __('Deduction') }}</th>
                                    <th scope="col">{{ __('Bonus') }}</th>
                                    <th scope="col">{{ __('Total Salary') }}</th>
                                    <th scope="col">{{ __('From Date') }}</th>
                                    <th scope="col">{{ __('To Date') }}</th>
                                    <th scope="col">{{ __('Approve key') }}</th>
                                    <th scope="col">{{ __('Comment') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payroll as $p)
                                    <tr>
                                        <td>{{ $p->created_at }}</td>
                                        <td>{{ $p->salary }}</td>
                                        <td>{{ $p->deduction }}</td>
                                        <td>{{ $p->bonus }}</td>
                                        <td>{{ $p->total_salary }}</td>
                                        <td>{{ $p->fromdate }}</td>
                                        <td>{{ $p->todate }}</td>
                                        <td>
                                            @if ($p->approve_key == 1)
                                                <span class="badge badge-primary">{{__('Pending')}}</span>
                                            @else
                                            <span class="badge badge-primary">{{__('Done')}}</span>
                                            @endif
                                        </td>
                                        <td>{{ $p->comment }}</td>
                                        <td><a href="{{ route('admin.paymentedit', $p->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                            <a href="{{route('admin.paymentdelete',[$p->id ,$p->user_id ])  }}"
                                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>

                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>




            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow ml-3 mb-4">
                        <div class="card-header bg-primary">
                            <h6 class="m-0 font-weight-bold text-white mb-4">{{ __('Filter Date') }}</h6>
                        </div>
                        <div class="card-body ">
                           
                            <form action="{{ route('admin.filterbydate', $e->id) }}" method="post">
                                @csrf
                                <div class="form-group">

                                    <div class="input-group date">
                                        <input type="text" name="fromdate" class="datepicker form-control" required
                                            autocomplete="off" />

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="input-group date">
                                        <input type="text" name="todate" class="datepicker form-control" required
                                            autocomplete="off" />

                                    </div>
                                </div>
                                <input type="submit" class="btn btn-outline-primary btn-sm mb-3" name="submit"
                                    placeholder="filter">
                            </form>



                            <div class="table-responsive">
                                <table class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('In Time') }}</th>
                                            <th>{{ __('Out Time') }}</th>
                                            <th>{{ __('Worked Hours') }}</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($attendance as $atd)
                                            <tr>
                                                <td>{{ $atd->date }}</td>
                                                <td>{{ $atd->name }}</td>
                                                <td>{{ $atd->timein }}</td>
                                                <td>{{ $atd->timeout }}</td>
                                                <td>{{ $atd->workedhours }}</td>


                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow mb-4 mr-3">
                        <div class="card-header bg-primary">
                            <h6 class="m-0 font-weight-bold text-white mb-4">{{ __('Attendance Days Information') }}</h6>
                        </div>
                        <div class="card-body ">
                           

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('From Date') }}</th>
                                        <th scope="col">{{ __('Till Date') }}</th>
                                        <th scope="col">{{ __('Days') }}</th>
                                        <th scope="col">{{ __('Salary') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        @if (session()->has('from'))
                                            {{ session('from') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if (Session::has('to'))
                                            {{ Session::get('to') }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ count($attendance) }}</td>
                                    <td>{{ $e->salary }}</td>


                                </tbody>
                            </table>

                            <h6>{{ __('Add Salary') }}</h6>

                            <form action="{{ route('admin.pay', $e->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">{{ __('Salary') }}</label>
                                    <input name="salary" id="salary" class="form-control" type="text"
                                        value="{{ $e->salary }}" readonly>
                                    <input name="user_id" id="salary" class="form-control" type="hidden"
                                        value="{{ $e->id }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('From Date') }}</label>
                                    <input name="fromdate" id="fromdate" class="form-control " type="text"
                                        value="@if (session()->has('from')){{ session('from') }} @endif" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('Till date') }}</label>
                                    <input name="todate" id="todate" class="form-control" type="text"
                                        value="@if (session()->has('from')){{ session('from') }} @endif" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('Deduction') }}</label>
                                    <input name="deduction" id="deduction" class="form-control deduction" type="text">
                                    <input name="attendance_count" value="{{ count($attendance) }}"
                                        class="form-control deduction" type="hidden">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('Bonus') }}</label>
                                    <input name="bonus" id="bonus" class="form-control bonus" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('Comment') }}</label>
                                    <input name="comment" id="comment" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('Total') }}</label>
                                    <input name="total" id="total" class="form-control total" type="text" readonly>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" name="approve_key" type="checkbox" value="1"
                                        id="flexCheckDefault">
                                    <label class="form-check-label mb-3" for="flexCheckDefault">
                                        {{ __('Pending') }}
                                    </label>
                                </div>

                                <div class="form-group">
                                    <input id="payment" class="btn btn-block  btn-primary" type="submit" value="Pay">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

@endsection

@push('style-plugin')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap-datepicker3.min.css') }}" />
@endpush

@push('script-plugin')

    <script src="{{ asset('assets/backend/js/bootstrap-datepicker.min.js') }}"></script>



@endpush


@push('script')
    <script>
        $(function() {

            'use strict'

            $('.datepicker').datepicker(); 
            $('#dataTable2').DataTable(); 
            $('#dataTable3').DataTable();

            function nettotalfind() {
                var sum = 0;
                $('.total').each(function() {
                    sum += parseFloat($(this).val());
                });

                $('#total').val(sum);

            }

            $(document).on("keyup", ".deduction", function(arg) {
                var deduction = $('#deduction').val();
                var bonus = $('#bonus').val();
                var salary = $('#salary').val();
                var total = +bonus + +salary - deduction;
                $('#total').val(total);
                nettotalfind();

            });

            $(document).on("keyup", ".bonus", function(arg) {
                var deduction = $('#deduction').val();
                var bonus = $('#bonus').val();
                var salary = $('#salary').val();
                var total = +bonus + +salary - deduction;
                $('#total').val(total);
                nettotalfind();
            });

        })
    </script>

@endpush
