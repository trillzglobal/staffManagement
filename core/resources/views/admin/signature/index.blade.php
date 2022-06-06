@extends('admin.admin-layouts.master')

@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">{{__('Change Signature')}}</h6>
        </div>
        <div class="card-body">

            <br>

            @if (session()->has('success'))
            <div class="alert alert-success">
                {{__('Signature Updated')}}
            </div>

            @endif

            <form action="{{route('signature.store')}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">{{__('Upload')}}</span>
                    </div>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">{{__('Choose file')}}</label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add">
              </div>
            </form>

        </div>
    </div>

</div>

@endsection
