<?php $__env->startSection('content'); ?>


    <div class="container-fluid">
        <div class="mb-4 shadow card">
            <div class="py-3 card-header d-flex justify-content-between">

                <h5 class="font-weight-bold text-info"><?php echo e(__('Department List')); ?></h5>

                <a class="btn btn-sm btn-primary" data-toggle="modal" href="#add_department_modal "> <i
                        class="fa fa-plus"></i> <?php echo e(__('Add Department')); ?></a>

            </div>

            <div class="card-body">

                <div class="row">



                    <div class="col-md-12">
                        <table class="table table-bordered " id="departmentDT" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Department Name')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

    <div id="add_department_modal" class="modal fade">
        <div class="modal-dialog">
            <form method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('Add Department')); ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Department Name')); ?></label>
                            <input name="dept_name" class="form-control" type="text" placeholder="">
                            <p class="dept_name_error text-bold text-danger"></p>
                        </div>
                        <div class="form-group">

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></button>
                        <input id="addDepartment" class="btn btn-primary" type="submit" value="Create Department">
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div id="delete_department_modal" class="modal fade">
        <div class="modal-dialog">
            <form id="ss" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('Delete Department')); ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">

                            <input type="hidden" name="departmentID">
                            <h5><?php echo e(__('Are You Sure To Delete This Department')); ?>? </h5>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></button>
                        <button id="deleteDepartment" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="edit_department_modal" class="modal fade">
        <div class="modal-dialog ">
            <form method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('Edit Department')); ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">
                            <input type="hidden" name="departmentID">
                            <input name="dept_nameEdit" class="form-control" type="text" placeholder="">
                        </div>

                        <div class="form-group">

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" type="button" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></button>
                        <input id="editDepartment" class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('style'); ?>

    <style>
        @media (max-width: 575.98px) { 
            .card-header{
                 flex-direction: column !important;
            }
           
         }
    </style>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>


    <script>
        $(function() {
            'use strict'
            var tableLoadDepartment = $('#departmentDT').DataTable({
                ajax: "<?php echo e(route('admin.department')); ?>",
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "dept_name"
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return [`<a id="editDepartmentModal" class="btn btn-sm btn-primary text-white" data-id="${row.id}"><i class="fa fa-pen" aria-hidden="true" data-toggle="modal" href="#"></i></a>`,
                                `<a class="btn btn-sm btn-danger text-white" data-id="${row.id}" id="deleteDepartmentModal"><i class="fa fa-trash" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`
                            ];
                        }
                    }

                ]
            });


            $(document).on('click', '#addDepartment', function(e) {
                e.preventDefault();

                let dept_name = $("input[name=dept_name]").val();
                if (dept_name == "") {
                    $('.dept_name_error').text('This field is required')
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: 'add-department',
                        method: 'POST',
                        data: {
                            'dept_name': dept_name,
                        },
                        dataType: "json",
                        success: function(response) {
                            $('#add_department_modal').modal('hide');
                            tableLoadDepartment.ajax.reload();
                            toastr["success"]('Department Created Successfully')
                        },
                        error: function(response) {
                            $('#add_department_modal').modal('hide');
                            toastr["error"](response.responseJSON.errors.dept_name[0])
                        }
                    });
                }



            });

            $(document).on('click', 'a#deleteDepartmentModal', function(e) {
                e.preventDefault();
                $('#delete_department_modal').modal('show');
                let departmentID = $(this).attr('data-id');

                $('#delete_department_modal input[name="departmentID"]').val(departmentID);


            });

            $(document).on('click', '#deleteDepartment', function(e) {
                e.preventDefault();
                let departmentID = $('#delete_department_modal input[name="departmentID"]').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'delete-department/' + departmentID,
                    method: 'POST',
                    dataType: "json",
                    success: function(response) {
                        $('#delete_department_modal').modal('hide');
                        tableLoadDepartment.ajax.reload();
                        toastr["success"]('Department Deleted Successfully')
                    },
                    error: function(response) {

                    }
                });


            });

            $(document).on('click', 'a#editDepartmentModal', function(e) {

                e.preventDefault();

                let departmentID = $(this).attr('data-id');

                $('#edit_department_modal input[name="departmentID"]').val(departmentID);

                $.ajax({
                    url: 'edit-department/' + departmentID,
                    method: 'get',
                    dataType: "json",
                    success: function(data) {

                        $('#edit_department_modal input[name="dept_nameEdit"]').val(data
                            .dept_name);
                        $('#edit_department_modal').modal('show');
                    },
                    error: function(data) {


                    }
                });

            });

            $(document).on('click', '#editDepartment', function(e) {
                e.preventDefault();
                let departmentID = $('#edit_department_modal input[name="departmentID"]').val();
                let dept_name = $("#edit_department_modal input[name=dept_nameEdit]").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'edit-department/' + departmentID,
                    method: 'POST',
                    data: {
                        'dept_name': dept_name,
                    },
                    success: function(response) {

                        $('#edit_department_modal').modal('hide');
                        tableLoadDepartment.ajax.reload();
                        toastr["success"]('Department Updated Successfully')

                    },
                    error: function(response) {
                        toastr["error"](response.responseJSON.errors.dept_name[0])
                    }
                });


            });
        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/department/department.blade.php ENDPATH**/ ?>