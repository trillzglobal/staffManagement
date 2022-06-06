@extends('employee.employee-layouts.master')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card">
                        
                       
                        <div class="card-body table-responsive">
                            <table class="table table-hover text-nowrap" id="myTable">
                                <thead>
                                    <tr>

                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Files') }}</th>
                                        <th>{{ __('Download') }}</th>
                                        <th>{{ __('Delete') }}</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->title }}</td>

                                            <td>{{ $d->description }}</td>

                                            <td>
                                                @if ($d->files)
                                                    {{ $d->files }}
                                                @else
                                                    <span>{{ __('No Attachment') }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($d->files)
                                                    <a class="btn btn-primary btn-xs"
                                                        href="{{ route('employee.file.download', $d->files) }}"><i
                                                            class="fa fa-download"></i></a>
                                                @else
                                                    <span>{{ __('No Attachment') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('empolyee.files.delete', $d->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-xs"
                                                        onclick="return confirm('Are You Confirm To Delete')">{{ __('Delete') }}</button>
                                                </form>
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
    </div>



@endsection

@push('script')

    <script>
        'use strict'
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

@endpush
