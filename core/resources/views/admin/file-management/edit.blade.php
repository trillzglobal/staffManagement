@extends('admin.admin-layouts.master')

@section('content')
   
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
   
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">{{__('Fill the form')}}</h3>
            </div>
           
            <form action="{{route('product.update', $product->id)}}"  method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                @include('admin.product._form')

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- /.card -->
@endsection
