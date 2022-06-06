@extends('admin.admin-layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark m-text">{{ __('Attendance log') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('admin') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('attendance') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">{{ __('Attendance Log') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('User Name') }}</th>
                                <th>{{ __('In Time') }}</th>
                                <th>{{ __('Out Time') }}</th>
                                <th>{{ __('Worked Hours') }}</th>
                                <th>{{ __('Status (IN/OUT)') }}</th>
                                <th>{{ __('IP') }}</th>
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

                                    <td>
                                        @if ($atd->timein_status == 'late in')
                                            <p>{{ $atd->timein_status }}</p>

                                        @else
                                            <p>{{ $atd->timein_status }}</p>

                                            @endif / @if ($atd->timeout_status == 'early out')
                                                <p>{{ $atd->timeout_status }}</p>

                                            @else
                                                <p>{{ $atd->timeout_status }}</p>

                                            @endif
                                    </td>
                                    <td>{{ $atd->timein_ip }} / {{ $atd->timeout_ip }}</td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

@endsection

@push('style')

    <style>
        @media (max-width: 575.98px) {
            .mbl-flex {
                flex-direction: column !important;
            }

            .m-text {
                font-size: 1.5rem;
            }
        }

    </style>
@endpush
