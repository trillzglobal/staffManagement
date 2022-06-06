@extends('admin.admin-layouts.master')

@section('content')

    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.employeeEdit', $profile->id) }}">
        @csrf

        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="d-flex justify-content-start mbl-flex">
                                <div>
                                    <img src="{{ asset('assets/files/uploads/' . @$profile->emp_info->avatar) }}"
                                        class="rounded-circle image-size" id="employee_edit_img">
                                </div>
                                <div class="mt-4">
                                    <input name="photo" id="employee_edit_input" class="form-control" type="file">
                                </div>
                            </div>
                            <div>
                                <input value="Update Profile" type="submit" class="btn btn-sm btn-primary">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3">{{ __('Full Name') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="full_name"
                                                    value="{{ @$profile->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ $profile->id }}">
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Email') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="email" class="form-control" type="text"
                                            value="{{ @$profile->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Mobile') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="contact" class="form-control" type="number"
                                            value="{{ @$profile->emp_info->contact }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Salary') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="salary" class="form-control" type="number"
                                            value="{{ @$profile->emp_info->salary }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Age') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="age" class="form-control" type="number"
                                            value="{{ @$profile->emp_info->age }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Emergency Contact') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="emergency_contact" class="form-control" type="number"
                                            value="{{ @$profile->emp_info->emergency_contact }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Gender') }} </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="gender" class="form-control">
                                            <option value="">-{{__('select')}}-</option>
                                            <option value="male"
                                                {{ @$profile->emp_info->gender == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female"
                                                {{ @$profile->emp_info->gender == 'female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Marital Status') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="marital_status" class="form-control">
                                            <option value="">-{{__('select')}}-</option>
                                            <option value="married"
                                                {{ @$profile->emp_info->marital_status == 'married' ? 'selected' : '' }}>
                                                {{ __('Married') }}</option>
                                            <option value="single"
                                                {{ @$profile->emp_info->marital_status == 'single' ? 'selected' : '' }}>
                                                {{ __('Single') }}</option>
                                            <option value="separeted"
                                                {{ @$profile->emp_info->marital_status == 'separeted' ? 'selected' : '' }}>
                                                {{ __('Separeted') }}</option>

                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Shift') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="shift" class="form-control">
                                            <option value="">-{{__('select')}}-</option>
                                            <option value="day"
                                                {{ @$profile->emp_info->shift == 'day' ? 'selected' : '' }}>
                                                {{ __('Day Shift') }}
                                            </option>
                                            <option value="night"
                                                {{ @$profile->emp_info->shift == 'night' ? 'selected' : '' }}>
                                                {{ __('Night
                                                                                                Shift') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Joining Date') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="joining_date" class="form-control" type="date"
                                            value="{{ @$profile->emp_info->joining_date }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Date of Birth') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="dob" class="form-control" type="date"
                                            value="{{ @$profile->emp_info->dob }}" />
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Present Address') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="present_address" class="form-control" type="text"
                                            value="{{ @$profile->emp_info->present_address }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Permanent Address') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="permanent_address" class="form-control" type="text"
                                            value="{{ @$profile->emp_info->permanent_address }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('NID Number') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="nid" class="form-control" type="number"
                                            value="{{ @$profile->emp_info->nid }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Department') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="department" class="form-control">
                                            <option value="">-{{__('select')}}-</option>
                                            @foreach ($all_department as $department)
                                                <option value="{{ $department->dept_name }}"
                                                    {{ @$profile->emp_info->department == @$department->dept_name ? 'selected' : '' }}>
                                                    {{ $department->dept_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Designation') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="designation" class="form-control">
                                            <option value="">-{{ __('select Designation') }}-</option>
                                            @foreach ($all_designation as $designation)
                                                <option value="{{ @$designation->designation_name }}"
                                                    {{ @$profile->emp_info->designation == @$designation->designation_name ? 'selected' : '' }}>
                                                    {{ @$designation->designation_name }}</option>
                                            @endforeach
                                        </select>
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
                                        <input type="file" class="form-control" multiple name="nid_photo[]">
                                    </div>
                                </div>
                                <hr>


                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Professional CV') }}
                                        </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" multiple name="cv[]">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('Educational Certificate') }}
                                        </h6>
                                    </div>
                                    <div class="text-left col-sm-9 text-secondary">
                                        <input type="file" class="form-control" multiple name="certificate[]">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>
        </div>
        




    </form>


@endsection

@push('style')

    <style>
        .image-size {
            width: 100px;
            height: 100px;
        }

        @media (max-width: 575.98px) {

            .mbl-flex {
                flex-direction: column !important;
            }

        }

    </style>

@endpush

@push('script')

    <script>
        'use strict'
        $('#employee_edit_input').on('change',function(e) {
            e.preventDefault();
            let img_src = URL.createObjectURL(e.target.files[0]);
            $('#employee_edit_img').attr('src', img_src);
        })
    </script>

@endpush
