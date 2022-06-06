 @extends('admin.admin-layouts.master')
 @section('content')

     <div class="container-fluid">

         <div class="card shadow mb-4">
             <div class="card-header py-3 bg-primary">
                 <h6 class="m-0 font-weight-bold text-white">{{ __('List of Leads') }}</h6>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                         <thead>
                             <tr>
                                 <th>{{ __('ID') }}</th>
                                 <th>{{ __('Name') }}</th>
                                 <th>{{ __('Priority') }}</th>
                                 <th>{{ __('Meeting Date') }}</th>
                                 <th>{{ __('Email') }}</th>
                                 <th>{{ __('Phone') }}</th>
                                 <th>{{ __('Company') }}</th>
                                 <th>{{ __('Address') }}</th>
                                 <th>{{ __('Website') }}</th>

                                 <th>{{ __('Action') }}</th>

                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($clientInfo as $key => $client)
                                 <tr>
                                     <td>{{ ++$key }}</td>
                                     <td>{{ $client->client_name }}</td>
                                     <td>{{ $client->client_priority }}</td>
                                     <td>{{ $client->client_meeting_date }}</td>
                                     <td>{{ $client->client_email }}</td>
                                     <td>{{ $client->client_mobile }}</td>
                                     <td>{{ $client->client_company }}</td>
                                     <td>{{ $client->client_address }}</td>
                                     <td>{{ $client->client_website }}</td>

                                     <td>
                                         <a class="btn btn-primary"
                                             href="{{ route('client.edit', $client->id) }}"><i
                                                 class="fa fa-pen"></i></a>
                                         
                                             <button data-href="{{ route('client.destroy', $client->id) }}" class="btn btn-danger delete"><i
                                                     class="fa fa-trash"></i></button>
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

     <div class="modal fade" tabindex="-1" role="dialog" id="delete">
         <div class="modal-dialog" role="document">
             <form action="" method="post">
                 @csrf
                 @method('delete')
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">{{ __('Delete Modal') }}</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <p>{{ __('Are You Sure to Delete Lead') }}</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                         <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 @endsection


 @push('script')

 <script>
     'use strict'

     $(function(){
        $('.delete').on('click',function(){
            const modal = $('#delete');

            modal.find('form').attr('action', $(this).data('href'));

            modal.modal('show');
        })
     })

 </script>
     
 @endpush
