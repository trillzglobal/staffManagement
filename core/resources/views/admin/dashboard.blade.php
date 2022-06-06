@extends('admin.admin-layouts.master')

@section('content')



    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-info" role="alert">
                {{ session('success') }}
            </div>

        @endif
        
        @if (session()->has('failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
            </div>

        @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mb-2">{{__('Dashboard')}}</h1>
            <div class="row ml-auto mr-3">

                <form action="{{ route('selfattendance') }}" method="post">
                    @csrf

                    <button type="submit" class="btn btn-primary mr-4 mb-2">{{__('Time In')}}</button>
                </form>

                <form action="{{ route('selfattendanceout') }}" method="post">
                    @csrf

                    <button type="submit" class="btn btn-danger">{{__('Time Out')}}</button>
                </form>

            </div>
           
        </div>


        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    {{__('Total Earnings')}} </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalin }}</div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-coins fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    {{__('Total Expense')}} </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalex }}</div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-dollar-sign fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    {{__('Total Profit')}} </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalprofit }}</div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-search-dollar fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    {{__('Total Asset')}} </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ count($asset) }}</div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-file fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">On {{__('Going Projects')}}
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($totalpro) }}
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-tasks fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{__('Total Employee')}}
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($totalemp) }}
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-users fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{__('Total Projects')}}
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($tpro) }}</div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-clipboard-list fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{__('Total Tasks')}}
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($ttask) }}
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-info">
                                <i class="fas fa-list-ol fa-2x text-info-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

      

      
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info">{{__('Active Workers')}}</h6>
                        <div class="dropdown no-arrow">


                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable"  cellspacing="0">
                                <thead>
                                    <tr>

                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Role')}}</th>
                                        <th>{{__('status')}}</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    @foreach ($activeuser as $atd)
                                        <tr>
                                            <td>{{ $atd->name }}</td>
                                            <td>{{ $atd->role }}</td>
                                            <td>
                                                <span class="badge badge-primary">{{__('Working')}}</span>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info">{{__('Employee Status')}}</h6>
                        
                    </div>


                    <!-- Card Body -->
                    <div class="card-body ">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">


            <div class="col-lg-12 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4 ">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info align-middle">{{__('Illustrations')}}</h6>
                    </div>
                    <div class="card-body">

                        <canvas id="piechart"></canvas>
                      

                    </div>



                </div>


                <!-- Approach -->

            </div>


        </div>


    </div>



    <!-- /.container-fluid -->

@endsection


@push('script')

    <script>

        'use strict'

        const ctx = document.getElementById('myChart').getContext('2d');

        const ctx2 = document.getElementById('piechart').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Offline', 'Working',],
                datasets: [{
                    label: '# of Votes',
                    data: ["{{ $check }}", "{{ count($activeuser) }}"],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                       
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Sales', 'Expenses'],
                datasets: [{
                    label: 'total',
                    data: ["{{ $totalin }}", "{{ $totalex }}"],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                       
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


@endpush
