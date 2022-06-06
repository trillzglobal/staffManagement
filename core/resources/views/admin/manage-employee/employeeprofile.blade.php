@extends('admin.admin-layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">

                        <div class="d-flex justify-content-start user-flex">

                            <div>
                                <img src="{{ asset('assets/files/uploads/' . @$profile->emp_info->avatar) }}"
                                    class="rounded-circle image-size">
                            </div>

                            <div class="mt-3">
                                <h5> <strong> {{ @$profile->name }} </strong> </h5>
                                <p class="mb-1 text-secondary">
                                    {{ @$profile->emp_info->designation }}
                                </p>

                                <p class="mb-1 text-secondary">
                                    ID : {{ @$profile->emp_info->user_id }} </p>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.employeeEdit', $profile->id) }}"> <i
                                    class="fa fa-pen"></i> {{ __('Edit Profile') }}</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12">


            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">{{ __('Full Name') }}<br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ @$profile->emp_info->full_name }}
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
                                    {{ @$profile->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"> {{ __('Mobile') }} <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ @$profile->emp_info->contact }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">{{ __('Age') }} <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ @$profile->emp_info->age }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">{{ __('Emergency Contact') }}</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ @$profile->emp_info->emergency_contact }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">{{ __('Gender') }} </h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ @$profile->emp_info->gender }}
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">{{ __('Joining Date') }} <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    {{ @$profile->created_at->diffForHumans() }}

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">{{ __('Present Address') }}</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    {{ @$profile->emp_info->present_address }}

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">{{ __('Permanent Address') }}</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    {{ @$profile->emp_info->permanent_address }}

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">{{ __('NID Number') }} <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    {{ @$profile->emp_info->nid }}

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">{{ __('Department') }} <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    {{ @$profile->emp_info->department }}

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"> {{ __('Designation') }}</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ @$profile->emp_info->designation }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"> {{ __('Shift') }}</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ @$profile->emp_info->shift }}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('Nid Card') }}
                                    </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    @if ($profile->emp_info->nid_photo != NULL || $profile->emp_info->nid_photo != [] )
                                    @foreach ($profile->emp_info->nid_photo as $photo)
                                         <a href="{{ route('download.file',$photo) }}" class="btn btn-sm btn-primary d-inline"><i class="fas fa-download"></i></a>
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


                                    @if ($profile->emp_info->cv != NULL || $profile->emp_info->cv != [])
                                        @foreach ($profile->emp_info->cv as $photo)
                                        <a href="{{ route('download.file',$photo) }}" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
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

                                    @if ($profile->emp_info->certificate != NULL || $profile->emp_info->certificate != [])
                                    @foreach ($profile->emp_info->certificate as $photo)
                                    <a href="{{ route('download.file',$photo) }}" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
                                    @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>




@endsection

@push('style')

    <style>
        .image-size {
            width: 100px;
            height: 100px;
            margin-right: 20px;
        }
        @media (max-width: 575.98px) { 
            .user-flex{
                 flex-direction: column !important;
            }
            .image-size {
            width: 70px;
            height: 70px;
        }
         }
    </style>

@endpush
