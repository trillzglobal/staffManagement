@extends('employee.employee-layouts.master')

@section('content')

    @php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ip-api.com/json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $result = json_decode($result);
    echo $result;
    @endphp



    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8">
                <div class="card card-success mb-2">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">{{ __('Attendance') }}</h3>

                    </div>

                    <div class="card-body">
                        <div class="row justify-content-center m-clock-control">
                            @if (session('failed'))
                                <div class="alert alert-danger ml-4 col-md-12">
                                    {{ session('failed') }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success ml-4 col-md-12">
                                    {{ session('success') }}
                                </div>
                            @endif


                                <div class="col-md-6 col-6">
                                    <form action="{{ route('employee.attendancestore') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="<?php echo $result->query; ?>" name="timein_ip">
                                        <button type="submit" class="btn btn-success px-3 py-3"> <i
                                                class="fas fa-check-circle"></i>
                                            {{__('Time In')}}</button>
                                    </form>
                                </div>
                                <div class="col-md-6 col-6">
                                    <form action="{{ route('employee.attendanceupdate') }}" method="post"
                                        class="text-right">
                                        @csrf
                                        <input type="hidden" value="<?php echo $result->query; ?>" name="timeout_ip">
                                        <button type="submit" class="btn btn-danger px-3 py-3"><i
                                                class="fas fa-sign-out-alt"></i>{{__('Time Out')}}</button>
                                    </form>
                                </div>

                            <main class="main col-md-6">
                                <div class="clockbox">
                                    <svg id="clock" xmlns="http://www.w3.org/2000/svg" width="300" height="300"
                                        viewBox="0 0 600 600">
                                        <g id="face">
                                            <circle class="circle" cx="300" cy="300" r="253.9" />
                                            <path class="hour-marks"
                                                d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6" />
                                            <circle class="mid-circle" cx="300" cy="300" r="16.2" />
                                        </g>
                                        <g id="hour">
                                            <path class="hour-arm" d="M300.5 298V142" />
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9" />
                                        </g>
                                        <g id="minute">
                                            <path class="minute-arm" d="M300.5 298V67" />
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9" />
                                        </g>
                                        <g id="second">
                                            <path class="second-arm" d="M300.5 350V55" />
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9" />
                                        </g>
                                    </svg>
                                </div><!-- .clockbox -->
                            </main>



                        </div>

                    </div>





                </div>
            </div>

            <div class="col-xl-12 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header bg-primary text-white py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold">{{ __('Attendance Log') }}</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Worked Hours') }}</th>
                                        <th>{{ __('Timein Status') }}</th>
                                        <th>{{ __('Timeout Status') }}</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($attendance as $atd)


                                        <tr>
                                            <th>{{ $atd->date }}</th>

                                            <th>{{ $atd->workedhours }} {{__('hour')}} </th>

                                            <th><span
                                                    class="badge {{ $atd->timein_status == 'late in' ? 'badge-danger' : 'badge-success' }} px-5 py-3">{{ $atd->timein_status }}</span>
                                            </th>
                                            <th><span
                                                    class="badge {{ $atd->timeout_status == 'early out' ? 'badge-danger' : 'badge-success' }} px-5 py-3">{{ $atd->timeout_status }}</span>
                                            </th>


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

@push('style')

    <style>
        .main {
            display: flex;
            min-height: 35vh;
            justify-content: center;
            align-items: middle;
        }

        .clockbox,
        #clock {
            width: 100%;
        }


        .circle {
            fill: none;
            stroke: #000;
            stroke-width: 9;
            stroke-miterlimit: 10;
        }

        .mid-circle {
            fill: #000;
        }

        .hour-marks {
            fill: none;
            stroke: #000;
            stroke-width: 9;
            stroke-miterlimit: 10;
        }

        .hour-arm {
            fill: none;
            stroke: #000;
            stroke-width: 17;
            stroke-miterlimit: 10;
        }

        .minute-arm {
            fill: none;
            stroke: #000;
            stroke-width: 11;
            stroke-miterlimit: 10;
        }

        .second-arm {
            fill: none;
            stroke: #000;
            stroke-width: 4;
            stroke-miterlimit: 10;
        }


        .sizing-box {
            fill: none;
        }


        #hour,
        #minute,
        #second {
            transform-origin: 300px 300px;
            transition: transform .5s ease-in-out;
        }

    </style>

@endpush


@push('script')

    <script async>

        'use strict'

        const HOURHAND = document.querySelector("#hour");
        const MINUTEHAND = document.querySelector("#minute");

        const SECONDHAND = document.querySelector("#second");

        let hr = {{ date('H', strtotime(now())) }};
        let min = {{ date('i', strtotime(now())) }};
        let sec = {{ date('s', strtotime(now())) }};


        let hrPosition = (hr * (360 / 12)) + (min * (360 / 60) / 12);
        let minPosition = (min * (360 / 60)) + (sec * (360 / 60) / 60);
        let secPosition = sec * (360 / 60);

        function runThetime() {
            hrPosition = hrPosition + (3 / 360);
            minPosition = minPosition + (6 / 60);
            secPosition = secPosition + (6);

            HOURHAND.style.transform = "rotate(" + hrPosition + "deg)";
            MINUTEHAND.style.transform = "rotate(" + minPosition + "deg)";
            SECONDHAND.style.transform = "rotate(" + secPosition + "deg)";
        }

        var interval = setInterval(runThetime, 1000);
    </script>

@endpush
