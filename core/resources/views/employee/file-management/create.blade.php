@extends('employee.employee-layouts.master')

@section('content')
  
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white">{{ $title }}</h3>
            </div>
          
            <form action="{{route('employee.files.store')}}"  method="POST" enctype="multipart/form-data">
                @csrf
                @include('employee.file-management._form')

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">{{__('Send File')}}</button>
                </div>
            </form>
        </div>
    </div>


@endsection
