@extends('admin.admin-layouts.master')
@section('content')


    <div class="container">

        <div class="row">

            <div class="card col-md-12">

                <div class="card-header">
                    <button class="btn btn-primary add">{{ __('Create Language') }}</button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>{{ __('Language Name') }}</th>
                                <th>{{ __('Default') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $lang)
                                <tr>
                                    <td>{{ $lang->name }}</td>
                                    <td>
                                        @if($lang->is_default)
                                         <span class="badge badge-primary">{{__('Default')}}</span>
                                         @else
                                            <span class="badge badge-warning">{{__('Changeable')}}</span>
                                         @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary edit" data-href="{{route('language.edit', $lang)}}" data-lang="{{$lang}}"><i class="fa fa-pen"></i></button> 
                                        
                                        @if(!$lang->is_default)
                                        <button class="btn btn-danger delete" data-href="{{route('language.delete', $lang)}}"><i class="fa fa-trash"></i></button>
                                        @endif

                                        <a href="{{route('language.translator',$lang->short_code)}}" class="btn btn-primary">{{('Transalator')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" tabindex="-1" id="add" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Add Language')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">{{__('Language Name')}}</label>
                                <input type="text" name="language" class="form-control" placeholder="{{__('Enter Language')}}">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="">{{__('Language short Code')}}</label>
                                <input type="text" name="short_code" class="form-control" placeholder="{{__('Enter Language Short Code')}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    
    <div class="modal fade" tabindex="-1" id="edit" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Edit Language')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">{{__('Language Name')}}</label>
                                <input type="text" name="language" class="form-control" placeholder="{{__('Enter Language')}}">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="">{{__('Language short Code')}}</label>
                                <input type="text" name="short_code" class="form-control" placeholder="{{__('Enter Language Short Code')}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    
    
    <div class="modal fade" tabindex="-1" id="delete" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Delet Language')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      
                            <p>{{__('Are You Sure to Delete')}}?</p>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        
                        <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@push('script')

    <script>
        $(function() {
            'use strict'
            
            $('#myTable').DataTable();


            $('.add').on('click',function(){
                const modal = $('#add');

                modal.modal('show')
            })
            
            $('.edit').on('click',function(){
                const modal = $('#edit');
                modal.find('form').attr('action',$(this).data('href'))
                modal.find('input[name=language]').val($(this).data('lang').name)
                modal.find('input[name=short_code]').val($(this).data('lang').short_code)
                modal.modal('show')
            })

            $('.delete').on('click',function(){
                const modal = $('#delete');

                modal.find('form').attr('action', $(this).data('href'));

                modal.modal('show');
            })

        })
    </script>

@endpush
