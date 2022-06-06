

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">

        <div class="row">
            <div class="card col-md-12 shadow mb-4">
                <div class="card-header text-right">
                    <a class="btn btn-sm btn-primary" data-toggle="modal"
                        href="#add_leaveRequest_modal"><?php echo e(__('Add new Request')); ?></a>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table table-bordered dt-responsive" id="EmployeeLeaveRequestDT" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Leave Type')); ?> </th>
                                    <th><?php echo e(__('Leave From')); ?></th>
                                    <th><?php echo e(__('Leave To')); ?></th>
                                    <th><?php echo e(__('Reason')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>

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


    <div id="add_leaveRequest_modal" class="modal fade">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white"><?php echo e(__('New Leave Request')); ?></h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="hidden" name="employee_id" value="<?php echo e(Auth::user()->id); ?>">
                            <input type="hidden" name="employee_name" value="<?php echo e(Auth::user()->name); ?>">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Leave Type')); ?></label>
                            <select name="leave_typeRequest" id="leave_typeRequest" class="form-control">
                                <option value="">-<?php echo e(__('select')); ?>-</option>
                                <?php $__currentLoopData = $leave_Types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($leave_type->leavetype); ?>"><?php echo e($leave_type->leavetype); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Leave From')); ?></label>
                            <input name="leave_from" class="form-control" type="date" placeholder="Leave From">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Leave To')); ?></label>
                            <input name="leave_to" class="form-control" type="date" placeholder="Leave To">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Reason')); ?></label>
                            <textarea id="reason" name="reasonedit" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input id="addLeaveRequest" class="btn btn-block btn-primary" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- delete -fluid -->
    <div id="delete_leaveRequest_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title"><?php echo e(__('Delete Leave Request')); ?></h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form id="ss" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="hidden" name="leaveRequestID">
                            <h4><?php echo e(__('Are You Sure to Delete')); ?>? </h4>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                            <input id="deleteLeaveRequest" class="btn btn-danger" type="submit" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_leaveRequest_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white"><?php echo e(__('Edit equipment')); ?></h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="hidden" name="leaveRequestID">
                            <input type="hidden" name="employee_id" value="<?php echo e(Auth::user()->id); ?>">
                            <input type="hidden" name="employee_name" value="<?php echo e(Auth::user()->name); ?>">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Leave Type')); ?></label>
                            <select name="leave_typeRequest" id="leave_typeRequestedit" class="form-control">
                                <option value="">-<?php echo e(__('select')); ?>-</option>
                                <?php $__currentLoopData = $leave_Types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($leave_type->leavetype); ?>"><?php echo e($leave_type->leavetype); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Leave From')); ?></label>
                            <input name="leave_fromedit" class="form-control" type="date" placeholder="Leave From">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Leave To')); ?></label>
                            <input name="leave_toedit" class="form-control" type="date" placeholder="Leave To">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Reason')); ?></label>
                            <textarea id="reasonedit" name="reasonedit" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <input id="editLeaveRequest" class="btn btn-block btn-primary" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        'use strict'
        $(function() {



            let employee_id = "<?php echo e(Auth::id()); ?>"

            let leaveurl = "<?php echo e(route('employee.leave.req',':id')); ?>";

            leaveurl = leaveurl.replace(':id', employee_id)

            var tableLoadLeaveRequest = $('#EmployeeLeaveRequestDT').DataTable({
                ajax:  leaveurl,
                columns: [{
                        "data": "idno"
                    },
                    {
                        "data": "type"
                    },
                    {
                        "data": "leavefrom"
                    },
                    {
                        "data": "leaveto"
                    },
                    {
                        "data": "reason"
                    },
                    {
                        "data": "status"
                    },

                    {
                        "data": null,
                        render: function(data, type, row) {
                            if ((data.status == "approve") || (data.status == 'decline')) {
                                return ['No Action Available']
                            }
                            return [`<a id="editLeaveRequestModal" class="btn btn-sm btn-primary" data-id="${row.id}"><i class="fa fa-pen" aria-hidden="true" data-toggle="modal" href="#"></i></a>`,
                                `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="deleteLeaveRequestModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`
                            ];
                        }
                    }

                ]
            });


            $(document).on('click', '#addLeaveRequest', function(e) {
                e.preventDefault();


                let employee_id = $("input[name=employee_id]").val();
                let employee_name = $("input[name=employee_name]").val();

                let leave_typeRequest = $('#leave_typeRequest').val();

                let leave_from = $("input[name=leave_from]").val();
                let leave_to = $("input[name=leave_to]").val();
                let reason = $("textarea#reason").val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('employee.add-leaveRequest')); ?>",
                    method: 'POST',
                    data: {
                        'employee_id': employee_id,
                        'employee_name': employee_name,
                        'leave_typeRequest': leave_typeRequest,
                        'leave_from': leave_from,
                        'leave_to': leave_to,
                        'reason': reason
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#add_leaveRequest_modal').modal('hide');
                        tableLoadLeaveRequest.ajax.reload();
                        toastr.success('Leave Request Created Successfully')

                    },
                    error: function(response) {

                    }
                });


            });

            //Employee Leave Edit
            $(document).on('click', 'a#editLeaveRequestModal', function(e) {
                e.preventDefault();

                let leaveRequestID = $(this).attr('data-id');
                $('#edit_leaveRequest_modal input[name="leaveRequestID"]').val(leaveRequestID);

                let url = "<?php echo e(route('employee.edit-leaveRequest', ':id')); ?>";

                url = url.replace(':id', leaveRequestID)

                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: "json",
                    success: function(data) {

                        $("#leave_typeRequestedit ").val(data.type).change();;

                        $('#edit_leaveRequest_modal input[name="leave_fromedit"]').val(data
                            .leavefrom);
                        $('#edit_leaveRequest_modal input[name="leave_toedit"]').val(data
                            .leaveto);
                        $('#edit_leaveRequest_modal textarea[name="reasonedit"]').val(data
                            .reason);

                        $('#edit_leaveRequest_modal').modal('show');
                    },
                    error: function(data) {

                    }
                });

            });

            $(document).on('click', '#editLeaveRequest', function(e) {
                e.preventDefault();

                let leaveRequestID = $('#edit_leaveRequest_modal input[name="leaveRequestID"]').val();


                let employee_id = $("#edit_leaveRequest_modal input[name=employee_id]").val();
                let employee_name = $("#edit_leaveRequest_modal input[name=employee_name]").val();

                let leave_typeRequest = $('#leave_typeRequestedit').val();

                let leave_from = $("#edit_leaveRequest_modal input[name=leave_fromedit]").val();
                let leave_to = $("#edit_leaveRequest_modal input[name=leave_toedit]").val();
                let reason = $("#edit_leaveRequest_modal textarea#reasonedit").val();

                let url = "<?php echo e(route('employee.edit-leaveRequest', ':id')); ?>";

                url = url.replace(':id', leaveRequestID)

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        'employee_id': employee_id,
                        'employee_name': employee_name,
                        'leave_typeRequest': leave_typeRequest,
                        'leave_from': leave_from,
                        'leave_to': leave_to,
                        'reason': reason
                    },
                    success: function(response) {

                        $('#edit_leaveRequest_modal').modal('hide');

                        tableLoadLeaveRequest.ajax.reload();

                        toastr.success('Leave Edited Successfully')


                    },
                    error: function(response) {

                    }
                });


            });



            $(document).on('click', 'a#deleteLeaveRequestModal', function(e) {
                e.preventDefault();
                $('#delete_leaveRequest_modal').modal('show');
                let leaveRequestID = $(this).attr('data-id');
                $('#delete_leaveRequest_modal input[name="leaveRequestID"]').val(leaveRequestID);


            });

            $(document).on('click', '#deleteLeaveRequest', function(e) {
                e.preventDefault();
                let leaveRequestID = $('#delete_leaveRequest_modal input[name="leaveRequestID"]').val();


                let url = "<?php echo e(route('employee.delete-leaveRequest', ':id')); ?>";

                url = url.replace(':id', leaveRequestID)

               

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:url,
                    method: 'POST',
                    dataType: "json",
                    success: function(response) {
                        $('#delete_leaveRequest_modal').modal('hide');
                        tableLoadLeaveRequest.ajax.reload();

                        toastr.success('Leave Deleted Suceessfull')

                    },
                    error: function(response) {

                    }
                });


            });
        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('employee.employee-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/M1CH43L/Desktop/AirvendApplication/hrm/MainFile/core/resources/views/employee/leave.blade.php ENDPATH**/ ?>