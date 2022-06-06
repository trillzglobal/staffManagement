@extends('admin.admin-layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

   
    <div class="container-fluid">

      
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">{{__('User List')}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{__('ID')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Role')}}</th>
                            <th>{{__('Date')}}</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($singleClient as $key=>$client )
                            <tr>
                                <td>{{ ++$key}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->role}}</td>
                                <td>{{$client->created_at->format('d-m-y')}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
