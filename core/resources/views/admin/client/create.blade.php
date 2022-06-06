@extends('admin.admin-layouts.master')

@section('content')
   
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white">{{__('Create Lead')}}</h3>
            </div>
           
            <form action="{{route('client.store')}}"  method="post" >
                @csrf
                @include('admin.client._form')

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">{{__('Create Lead')}}</button>
                </div>
            </form>
        </div>
    </div>
  
@endsection
