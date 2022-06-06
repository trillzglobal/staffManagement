@extends('admin.admin-layouts.master')

@section('content')
  
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark m-text">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white">{{ __('Fill the form') }}</h3>
            </div>

            <form action="{{ route('file-management.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.file-management._form')

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{__('Send')}}</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
@endsection
@push('style')

    <style>
        
        @media (max-width: 575.98px) { 
          
        .m-text{
            font-size: 1.5rem;
        }
        }

    </style>
@endpush
