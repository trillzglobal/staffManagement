@extends('employee.employee-layouts.master')

@section('content')


 <div class="row justify-content-center">
     <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-gradient-primary text-light text-bold">
                <div class="card-title">
                    <h4>{{__('Change Password')}}</h4>
                </div>
            </div>
          <div class="card-body">
              <form action="{{ route('employee.password.change' , $admin -> id ) }}" method="POST">
                @csrf
                      <div class="form-group">
                        <label for="">{{__('Old Passwor')}}d</label>
                        <input type="password" name="old_password" class="form-control" id="" >
                        @error('old_password')
                            <strong class="text-danger text-small">{{ $message }}</strong>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="">{{__('New Password')}}</label>
                          <input type="password" name="password" class="form-control" id="" >
                      @error('password')
                          <strong class="text-danger text-small">{{ $message }}</strong>
                      @enderror
                        </div>
                        <div class="form-group">
                          <label for="">{{__('Confirm Password')}}</label>
                          <input type="password" name="password_confirmation" class="form-control" id="" >

                        </div>
                      <button type="submit" class="btn text-light bg-gradient-primary">{{__('Submit')}}</button>
              </form>
          </div>
        </div>
     </div>
 </div>
@endsection
