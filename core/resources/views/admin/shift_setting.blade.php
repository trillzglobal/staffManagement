@extends('admin.admin-layouts.master')

@section('content')


    <div class="container">


        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-info" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="" method="POST">
                    @csrf

                    <fieldset>
                        <legend>{{ __('Day Shift Time Schedule') }}</legend>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">{{__('Day Shift Start Time')}}</label>
                                <input type="text" name="from_day" id="" class="timepicker form-control" autocomplete="off"
                                    value="{{ \Carbon\Carbon::parse(@$shifts->from_day)->format('h:i a') }}">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="">{{__('Day Shift Start Time')}}</label>
                                <input type="text" name="to_day" id="" class="timepicker form-control" autocomplete="off"
                                    value="{{ \Carbon\Carbon::parse(@$shifts->to_day)->format('h:i a') }}">

                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>{{ __('Night Shift Time Schedule') }}</legend>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">{{__('Night Shift Start Time')}}</label>
                                <input type="text" name="from_night" id="" class="timepicker form-control"
                                    autocomplete="off"
                                    value="{{ \Carbon\Carbon::parse(@$shifts->from_night)->format('h:i a') }}">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="">{{__('Night Shift Start Time')}}</label>
                                <input type="text" name="to_night" id="" class="timepicker form-control" autocomplete="off"
                                    value="{{ \Carbon\Carbon::parse(@$shifts->to_night)->format('h:i a') }}">

                            </div>
                        </div>
                    </fieldset>



                    <button class="btn btn-primary" type="submit">{{ __('Save Shift Settings') }}</button>
                </form>
            </div>
        </div>



    </div>


@endsection

@push('style-plugin')

<link rel="stylesheet" href="{{asset('assets/backend/css/timepicker.min.css')}}">
    
@endpush
@push('style')
    

    <style>
        fieldset {
            border: 3px solid #98a9c9;
            border-radius: 15px;
            margin-bottom: 50px;
            padding: 10px;
        }

        legend {
            padding: 20px;
            background: #12429c;
            border-radius: 12px;
            font-size: 1.05rem;
            color: rgb(255, 255, 255);
        }

    </style>
@endpush


@push('script')
    <script src="{{asset('assets/backend/js/timepicker.min.js')}}"></script>

    <script>
        'use strict'
        $('.timepicker').timepicker({
            timeFormat: 'h:mm a',
            startTime: '0:00',
            interval: 15,
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
@endpush
