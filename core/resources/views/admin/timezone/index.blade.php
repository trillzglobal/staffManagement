@extends('admin.admin-layouts.master')

@section('content')


    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">{{ __('Change TimeZone') }}</h6>
            </div>
            <div class="card-body">

                <br>

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{__('TimeZone Updated')}}
                    </div>

                @endif

                <form action="{{ route('admin.time') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="mr-2">
                        <select class="form-control" id="timezone_select" name="timezone">
                            @php
                                $timezones = json_decode(file_get_contents(resource_path('views/admin/timezone/timezone.json')));
                            @endphp
                            @foreach ($timezones as $timezone)
                                <option value="'{{ @$timezone }}'" @if (config('app.timezone') == $timezone) selected @endif>{{ __($timezone) }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Change">
                    </div>
                </form>

            </div>
        </div>

    </div>


@endsection

@push('script')

    <script>
        'use strict'
        $(document).on('change', '#timezone_select', function() {
            let val = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.time')}}",
                data: {
                    "timezone": val
                },
                method: "POST",
                success: function(output) {
                    if (output.success) {
                        location.reload();
                    }
                }


            });
        });
    </script>

@endpush
