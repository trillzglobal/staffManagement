@extends('admin.admin-layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">{{ __('Site Name') }}</h6>
                    </div>
                    <div class="card-body">

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ __('Site Name Updated') }}
                            </div>

                        @endif

                        <form action="" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="">{{ __('Site Name') }}</label>
                                <input type="text" name="sitename" id="" class="form-control"
                                    value="{{ @$sitename->sitename }}">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update Site Name">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
