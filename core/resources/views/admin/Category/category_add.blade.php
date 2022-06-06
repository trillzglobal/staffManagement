@extends('admin.admin-layouts.master')
@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="form-header text-uppercase">
                        {{ __('Add Category For Expense') }}
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="category-us-form">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-12">
                                <label>{{ __('Category Name') }}</label>

                                <input type="text" id="" class="form-control" name="expense_category_name" required>

                            </div>

                            <div class="form-group col-md-12">
                                <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>
                                    {{ __('Cancel') }}</button>

                                <button type="submit" name="submit" class="btn btn-primary" id="saveCategory">
                                    {{ __('Create') }}</button>
                            </div>
                        </div>



                        <div class="mb-3 form-footer">

                            <a href="{{ url('/expense/') }}" class="btn btn-outline-warning">
                                {{ __('Return') }}</a>
                        </div>
                    </form>





                </div>
            </div>
        </div>
    </div>

    <!-- table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-table"></i>{{__('Result')}}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('Sl') }}</th>
                                    <th>{{ __('Expense Category Name') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->expense_category_name }}</td>
                                        <td>

                                            <a data-href="{{ route('category.update', $category->id) }}"
                                                id="editcategory" data-name="{{ $category->expense_category_name }}"
                                                class="btn btn-sm btn-primary text-white">{{ __('Edit') }}</a>

                                            <a data-href="{{route('category.delete',$category->id)}}" id="deleteIdexcat" data_id="{{ $category->id }}"
                                                class="btn btn-sm btn-danger text-white">{{ __('Delete') }}</a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Row-->


@endsection

@push('script')

    <script>
        $(function() {
            'use strict'

            $('#default-datatable').DataTable();

            $(document).on("submit", '#category-us-form', function(e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#saveCategory').html('Sending..');

                $.ajax({
                    url: 'save',
                    type: "POST",
                    data: $('#category-us-form').serialize(),
                    success: (response) => {
                        location.reload();
                        this.reset();
                        $("#category-us-form")[0].reset();
                        $('#saveCategory').html('Submit');
                    },
                    error: function(response) {
                        $("#category-us-form")[0].reset();
                        $('#saveCategory').html('Create');
                        toastr.error(response.responseJSON.errors.expense_category_name[0]);
                    }
                });

            });

            $(document).on('click', '#editcategory', function() {
                $('input[name=expense_category_name]').val($(this).data('name'));

                $('form').attr('action', $(this).data('href')).removeAttr('id');

                $('#saveCategory').text('Update');


            })

            $(document).on("click", "#deleteCategoryId", function(arg) {

                var x = confirm("Are you sure you want to delete?");
                if (x == true) {

                    arg.preventDefault();
                    var id = $(this).data("id");
                    var url = '/category/delete/';

                    $.ajax({
                        url: url,
                        data: {
                            id: id
                        },
                        type: "GET",
                        dataType: "JSON",
                        success(response) {
                            swal("Deleted", "Data has been Deleted Successfully", "success");
                            location.reload();
                        }
                    });

                }
            });
           
            $(document).on('click', '#deleteIdexcat', function(e) {
                e.preventDefault();
                let id = $(this).attr('data_id');
                let url = $(this).data('href')
                new swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: url,
                                method: 'POST',
                                success: function(out) {
                                    location.reload();
                                }
                            })

                        } else {
                            swal("Your data is safe!");
                        }
                    });




            });

        })
    </script>

@endpush
