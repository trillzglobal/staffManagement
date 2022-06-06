@extends('admin.admin-layouts.master')

@section('content')


<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">{{__('Change Copyright')}}</h6>
        </div>
        <div class="card-body">

            <br>

            @if (session()->has('success'))
            <div class="alert alert-success">
              {{__('Copyright Changed')}}
            </div>

            @endif

            <form action="{{route('copyright.store')}}" method="post" enctype="multipart/form-data">
                @csrf


            <div class="form-group">
                <label for="image">{{__('Add Copyright')}}</label>
                <input type="text" name="name" class="form-control" required value="{{@$copy->name}}">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="add">
              </div>
            </form>

        </div>
    </div>

</div>


@endsection
