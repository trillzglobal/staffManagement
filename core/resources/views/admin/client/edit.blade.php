@extends('admin.admin-layouts.master')

@section('content')
  
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white">{{__('Update Lead')}}</h3>
            </div>
           
            <form action="{{route('client.update',$client->id)}}"  method="post" >
                @csrf
                @method('put')
                @include('admin.client._form')

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">{{__('Update Lead')}}</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
@endsection
