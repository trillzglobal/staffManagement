@extends('admin.admin-layouts.master')

@section('content')
   
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark m-text">{{ __('Attendance Form') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('employee') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('attendanceform') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   
    <div class="col-md-10 justify-content-center">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">{{ __('Fill the form') }}</h3>
            </div>
         

            <?php
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://ip-api.com/json');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            $result = json_decode($result);
            
            ?>
            <br>

            @if (session('failed'))
                <div class="alert alert-danger ml-4 col-md-6">
                    {{ session('failed') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success ml-4 col-md-6">
                    {{ session('success') }}
                </div>
            @endif
            <!-- form start -->
            <form action="{{ route('admin.attendancestore') }}" method="post">
                @csrf
                <div class="row">
                    <main class="main">
                        <div class="clockbox d-flex w-100 mbl-flex">
                            <svg id="clock" xmlns="http://www.w3.org/2000/svg" width="600px" height="350px"
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

                            <div class="form-group  col-md-4 ml-3">
                                <input type="hidden" value="<?php echo $result->query; ?>" name="ip">
                                <label for="id">{{ __('Employee ID') }}</label>
                                <input type="text" name="userid" class="form-control" placeholder="Enter Employee ID"
                                    required><br>
                                <button type="submit" name="action" value="timein"
                                    class="btn btn-success mb-2">{{ __('Time In') }}</button>
                                <button type="submit" name="action" value="timeout"
                                    class="btn btn-danger mb-2">{{ __('Time Out') }}</button>
                            </div>


                        </div><!-- .clockbox -->
                    </main>
                </div>
            </form>
        </div>
    </div>


@endsection

@push('style')

    <style>
        .main {
            display: flex;
            padding: 2em;
            height: 90vh;
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
        @media (max-width: 575.98px) { 
            .mbl-flex{
            flex-direction: column !important;
        }
        .m-text{
            font-size: 1.5rem;
        }
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
        

        let hrPosition = (hr * 360 / 12) + (min * (360 / 60) / 12);
        let minPosition = (min * 360 / 60) + (sec * (360 / 60) / 60);
        let secPosition = sec * 360 / 60;

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
    <!-- /.card -->

@endpush
