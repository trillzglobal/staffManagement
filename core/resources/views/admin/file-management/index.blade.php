@extends('admin.admin-layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark m-text">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="mb-4 shadow card">
            <div class="py-3 card-header bg-primary">
                <h6 class="m-0 font-weight-bold text-white">{{ __('List of files') }}</h6>
            </div>
            <div class="py-3 card-header">
                <form action="{{ route('delete.all') }}" method="post">
                    @csrf
                    <button class="btn btn-outline-danger btn-xs">{{__('Delete all files')}}</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Sender Name') }}</th>
                                <th>{{ __('Receiver Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Files') }}</th>
                                <th>{{ __('Download') }}</th>
                                <th>{{ __('Delete') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $key => $file)

                                <tr>
                                    <td>{{ @$files->firstItem() + $key }}</td>
                                    <td>{{ @$file->title }}</td>
                                    <td>{{  @\App\User::find($file->sender_id)->name }}</td>
                                    <td>{{ @$file->user->name }}</td>
                                    <td>{{ @$file->description }}</td>
                                    <td>{{ @$file->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        @if ($file->files)
                                            {{ @$file->files }}
                                        @else
                                            <span>{{__('No Attachments')}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($file->files)
                                            <a class="btn btn-primary btn-xs"
                                                href="{{ route('file.download', @$file->files) }}"><i
                                                    class="fa fa-download"></i></a>
                                        @else
                                            <span>{{__('No Attachments')}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('file-management.destroy', @$file->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-xs" id="file_delete">{{__('Delete')}}</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

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
