<?php $__env->startSection('content'); ?>

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 mb-2 font-weight-bold text-primary"><?php echo e(__('Designation List')); ?></h6>
                <a class="btn btn-sm btn-primary" data-toggle="modal" href="#add_designation_modal"> <i
                        class="fa fa-plus"></i> <?php echo e(__('Add Designation')); ?></a>
            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered " id="designationDT" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Designation Name')); ?></th>
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

    </div>


    <div id="add_designation_modal" class="modal fade">
        <div class="modal-dialog">
            <form method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('Add designation')); ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Designation Name')); ?></label>
                            <input name="designation_name" class="form-control" type="text" placeholder="">
                            <p class="designation_name_error text-bold text-danger"></p>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                        <button type="submit" class="btn btn-primary" id="adddesignation">
                            <?php echo e(__('Create Designation')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="delete_designation_modal" class="modal fade">
        <div class="modal-dialog">
            <form id="ss" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Delete designation')); ?></h5>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">

                            <input type="hidden" name="designationID">
                            <h5><?php echo e(__('Are You Sure To Delete')); ?> ? </h5>
                        </div>
                        <div class="form-group">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                        <button id="deletedesignation" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>

                    </div>
                </div>
            </form>
        </div>
    </div>


    <div id="edit_designation_modal" class="modal fade">
        <div class="modal-dialog">
            <form method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('Edit designation')); ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>

                        <div class="form-group">
                            <input type="hidden" name="designationID">
                            <input name="designation_nameEdit" class="form-control" type="text">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button class="btn btn-primary" id="editdesignation"
                            type="submit"><?php echo e(__('Update Designation')); ?></button>
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

            var tableLoaddesignation = $('#designationDT').DataTable({
                ajax: 'designationTable',
                columns: [{
                        "data": "id"
                    },
                    {
                        "data": "designation_name"
                    },
                    {
                        "data": null,
                        render: function(data, type, row) {
                            return [`<a id="editdesignationModal" class="btn btn-sm btn-primary text-white" data-id="${row.id}"><i class="fa fa-pen" aria-hidden="true" data-toggle="modal" href="#"></i></a>`,
                                `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="deletedesignationModal"><i class="fa fa-trash text-white" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`
                            ];
                        }
                    }

                ]
            });


            $(document).on('click', '#adddesignation', function(e) {
                e.preventDefault();

                let designation_name = $("input[name=designation_name]").val();
                if (designation_name == "") {
                    $('.designation_name_error').text('This field is required')
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: 'add-designation',
                        method: 'POST',
                        data: {
                            'designation_name': designation_name,
                        },
                        dataType: "json",
                        success: function(response) {
                            $('#add_designation_modal').modal('hide');
                            tableLoaddesignation.ajax.reload();
                            $("input[name=designation_name]").val('')
                            toastr["success"]("Successfully Created Designation")

                        },
                        error: function(response) {
                            toastr["error"](response.responseJSON.errors.designation_name[0])
                        }
                    });

                }

            });

            $(document).on('click', 'a#deletedesignationModal', function(e) {
                e.preventDefault();
                $('#delete_designation_modal').modal('show');
                let designationID = $(this).attr('data-id');

                $('#delete_designation_modal input[name="designationID"]').val(designationID);


            });

            $(document).on('click', '#deletedesignation', function(e) {
                e.preventDefault();
                let designationID = $('#delete_designation_modal input[name="designationID"]').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'delete-designation/' + designationID,
                    method: 'POST',
                    dataType: "json",
                    success: function(response) {
                        $('#delete_designation_modal').modal('hide');
                        tableLoaddesignation.ajax.reload();
                        toastr["success"]("Successfully Deleted Designation")
                    },
                    error: function(response) {

                    }
                });


            });

            $(document).on('click', 'a#editdesignationModal', function(e) {
                e.preventDefault();

                let designationID = $(this).attr('data-id');
                $('#edit_designation_modal input[name="designationID"]').val(designationID);

                $.ajax({
                    url: 'edit-designation/' + designationID,
                    method: 'get',
                    dataType: "json",
                    success: function(data) {

                        $('#edit_designation_modal input[name="designation_nameEdit"]').val(data
                            .designation_name);
                        $('#edit_designation_modal').modal('show');
                    },
                    error: function(data) {

                    }
                });

            });

            $(document).on('click', '#editdesignation', function(e) {
                e.preventDefault();
                let designationID = $('#edit_designation_modal input[name="designationID"]').val();
                let designation_name = $("#edit_designation_modal input[name=designation_nameEdit]").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'edit-designation/' + designationID,
                    method: 'POST',
                    data: {
                        'designation_name': designation_name,
                    },
                    success: function(response) {

                        $('#edit_designation_modal').modal('hide');
                        tableLoaddesignation.ajax.reload();
                        toastr["success"]("Successfully Updated Designation")
                    },
                    error: function(response) {
                        toastr["error"](response.responseJSON.errors.designation_name[0])
                    }
                });


            });
        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/M1CH43L/Desktop/AirvendApplication/hrm/MainFile/core/resources/views/admin/department/designation.blade.php ENDPATH**/ ?>