@extends('admin.admin-layouts.master')

@section('content')

    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header bg-primary">
                <h3 class="card-title text-light">{{__('Fill the form')}}</h3>
            </div>

            <form action="{{ route('admin.updateuser') }}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                            <input type="hidden" name="id" class="form-control" value="{{ $user->id }}">
                            @error('name')<i class="text-danger">{{ $message }}</i>@enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="{{ $user->email }}" placeholder="Enter User Email">
                            @error('email')<i class="text-danger">{{ $message }}</i>@enderror
                        </div>



                        <div class="form-group col-md-6">
                            <label for="role">{{__('Select Role')}}</label>
                            <select class="form-control" name="role" id="role">
                                <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>admin</option>
                                <option value="employee" {{$user->role == 'employee' ? 'selected' : ''}}>employee</option>
                                

                            </select>


                        </div>


                        <div class="form-group col-md-6">
                            <label for="status">{{__('Select Status')}}</label>
                            <select class="form-control" name="status" required>
                                <option disabled>--{{__('Change Status')}}--</option>
                                <option value="1" {{$user->status ? 'selected' : ''}}>{{__('Enabled')}}</option>
                                <option value="0" {{!$user->status ? 'selected' : ''}}>{{__('Disabled')}}</option>

                            </select>

                            @error('status')<i class="text-danger">{{ $message }}</i>@enderror
                        </div>

                      


                      
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                </div>

            </form>
        </div>
    </div>

    <!-- /.card -->
@endsection
