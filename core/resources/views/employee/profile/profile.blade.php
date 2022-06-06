@extends('employee.employee-layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body row">
                    <div class="col-md-6">

                        <div class="row align-items-center">

                            <div class="col-md-6">
<img class="user-profile-img" src="{{asset('assets/files/uploads/'. @$all_profile->avatar) }}" alt="Admin"
                                    class="rounded w-25">
                            </div>
                            <div class="col-md-6">
                                <h5> <strong>{{ auth()->user()->name }}</strong> </h5>
                                <p class="text-secondary mb-1">

                                    {{ @$all_profile->designation }}

                                </p>

                                <p class="text-secondary mb-1">
                                    {{__('ID')}} : {{ Auth::user()->id }}</p>
                            </div>


                        
                        </div>

                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-sm btn-primary"
                            href="{{ route('employee.edit', auth()->user()->id) }}">{{ __('Edit
                        Profile') }}</a>
                    </div>
                </div>
            </div>

            <div class="card col-md-6">

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{ __('Full Name') }}<br><br></h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{ __('Email') }} <br>
                                <br>
                            </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{ __('Mobile') }} <br><br></h6>
                        </div>
                        <div class="col-sm-8 text-secondary">

                            {{ @$all_profile->contact }}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{__('Age')}} <br><br></h6>
                        </div>
                        <div class="col-sm-8 text-secondary">

                            {{ @$all_profile->age }}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{ __('Emergency Contact') }}</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">

                            {{ @$all_profile->emergency_contact }}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{ __('Gender') }} </h6>
                        </div>
                        <div class="col-sm-8 text-secondary">

                            {{ @$all_profile->gender }}

                        </div>
                    </div>


                </div>

            </div>

            <div class="card col-md-6">

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{ __('Joining Date') }} <br><br></h6>
                        </div>
                        <div class="col-sm-8 text-secondary">

                            {{ @$all_profile->joining_date }}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{__('Present Address')}}</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">

                            {{ @$all_profile->present_address }}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{__('Permanent Address')}}</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">

                            {{ @$all_profile->permanent_address }}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{__('NID Number ')}}<br><br></h6>
                        </div>
                        <div class="col-sm-8 text-secondary">

                            {{ @$all_profile->nid }}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">{{__('Department')}} <br><br></h6>
                        </div>
                        <div class="col-sm-8 text-secondary">


                            {{ @$all_profile->department }}


                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0"> {{__('Designation')}}</h6>
                        </div>
                        <div class="col-sm-8 text-secondary">

                            {{ @$all_profile->designation }}

                        </div>
                    </div>

                </div>


            </div>

            <div class="card col-md-12">

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">{{ __('National ID Card') }}
                            </h6>
                        </div>
                        <div class="col-sm-9 text-secondary">

                            @if (@$all_profile->nid_photo != null || @$all_profile->nid_photo != [])
                                @foreach (@$all_profile->nid_photo as $photo)
                                    <a href="{{ route('employee.file.download', $photo) }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-download"></i></a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">{{ __('Professional CV') }}
                            </h6>
                        </div>
                        <div class="col-sm-9 text-secondary">

                            @if (@$all_profile->cv != null || @$all_profile->cv != [])
                                @foreach (@$all_profile->cv as $photo)
                                    <a href="{{ route('employee.file.download', $photo) }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-download"></i></a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">{{ __('Educational Certificate') }}
                            </h6>
                        </div>
                        <div class="col-sm-9 text-secondary">

                            @if (@$all_profile->certificate != null || @$all_profile->certificate != [])
                                @foreach (@$all_profile->certificate as $photo)
                                    <a href="{{ route('employee.file.download', $photo) }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-download"></i></a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>





@endsection


@push('style')

    <style>
        .user-profile-img {
            width: 200px;
            height: auto
        }

        @media (max-width: 575.98px) {
            .user-profile-img {
                width: 100px;
                height: 100px;
            }

            .profile-mbl {
                flex-direction: column !important;
            }
        }

    </style>

@endpush
