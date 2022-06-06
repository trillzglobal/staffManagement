@extends('employee.employee-layouts.master')

@section('content')

    <div class="container-fluid">


        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">{{__('Attendance Log')}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{__('Date')}}</th>
                                <th>{{__('In Time')}}</th>
                                <th>{{__('Out Time')}}</th>
                                <th>{{__('Worked Hours')}}</th>
                                <th>{{__('Timein Status')}}</th>
                                <th>{{__('Timeout Status')}}</th>
                                <th>{{__('Timein IP')}}</th>
                                <th>{{__('TimeOut IP')}}</th>
                            </tr>
                        </thead>

                       
                        <tbody>
                            @foreach ($attendance as $atd)


                                <tr>
                                    <th>{{ $atd->date }}</th>
                                    <th>{{ $atd->timein }}</th>
                                    @if ($atd->timeout > 0)
                                        <th>{{ $atd->timeout }}</th>
                                    @else
                                        <th> </th>
                                    @endif


                                    <th>{{ $atd->workedhours }} hour </th>

                                    <th>{{ $atd->timein_status }}</th>
                                    <th>{{ $atd->timeout_status }}</th>
                                    <th>{{ $atd->timein_ip }}</th>
                                    @if ($atd->timeout_ip > 0)
                                        <th>{{ $atd->timeout_ip }}</th>
                                    @else
                                        <th> </th>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
@endsection
