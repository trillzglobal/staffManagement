

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('Leave Request')); ?></h6>
            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered dt-responsive" id="AdminLeaveRequestDT" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Employee Name')); ?></th>
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


        <div id="approve_LeaveRequest_modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('Approve Leave request')); ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <input type="hidden" name="leaveRequestID">
                                <p><?php echo e(__('Are You Sure to Approve')); ?>? </p>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                                <button id="approveLeaveRequest" type="submit"
                                    class="btn btn-primary"><?php echo e(__('Approve')); ?></button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decline Leave -->
        <div id="decline_LeaveRequest_modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('Decline Leave request')); ?></h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="mess"></div>
                        <form method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <input type="hidden" name="leaveRequestID">
                                <h4><?php echo e(__('Are You Sure To Decline')); ?>? </h4>
                            </div>
                            <div class="form-group text-right">

                                <button class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                                <button id="declineLeaveRequest" type="submit"
                                    class="btn btn-danger"><?php echo e(__('Decline')); ?></button>

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
               
                var tableLoadLeaveRequest = $('#AdminLeaveRequestDT').DataTable({
                    ajax: "<?php echo e(route('admin.leave.req')); ?>",
                    columns: [{
                            "data": "id"
                        },
                        {
                            "data": "employee"
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
                                return [`<a id="approveLeaveRequestModal" class="btn btn-sm btn-primary" data-id="${row.id}"><i class="fa fa-check text-white" aria-hidden="true" data-toggle="modal" href="#"></i></a>`,
                                    `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="declineLeaveRequestModal"><i class="fa fa-times text-white" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`
                                ];
                            }
                        }

                    ]
                });

                $(document).on('click', 'a#approveLeaveRequestModal', function(e) {
                    e.preventDefault();
                    $('#approve_LeaveRequest_modal').modal('show');
                    let leaveRequestID = $(this).attr('data-id');

                    $('#approve_LeaveRequest_modal input[name="leaveRequestID"]').val(leaveRequestID);


                });

                $(document).on('click', '#approveLeaveRequest', function(e) {
                    e.preventDefault();
                    let leaveRequestID = $('#approve_LeaveRequest_modal input[name="leaveRequestID"]').val();

                    let url = "<?php echo e(route('admin.approve-leaveRequest',':id')); ?>";

                    url = url.replace(':id', leaveRequestID);

                    url = url.replace()

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: url,
                        method: 'POST',
                        dataType: "json",
                        success: function(response) {
                            $('#approve_LeaveRequest_modal').modal('hide');
                            toastr.success('Leave Request Accepted Suceessfully')
                            $('#AdminLeaveRequestDT').DataTable().ajax.reload()

                        },
                        error: function(response) {

                        }
                    });


                });

                $(document).on('click', 'a#declineLeaveRequestModal', function(e) {
                    e.preventDefault();
                    $('#decline_LeaveRequest_modal').modal('show');
                    let leaveRequestID = $(this).attr('data-id');

                    $('#decline_LeaveRequest_modal input[name="leaveRequestID"]').val(leaveRequestID);


                });

                $(document).on('click', '#declineLeaveRequest', function(e) {
                    e.preventDefault();
                    let leaveRequestID = $('#decline_LeaveRequest_modal input[name="leaveRequestID"]').val();


                    let url = "<?php echo e(route('admin.decline-leaveRequest',':id')); ?>";

                    url = url.replace(':id', leaveRequestID);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: url,
                        method: 'POST',
                        dataType: "json",
                        success: function(response) {
                            $('#decline_LeaveRequest_modal').modal('hide');

                            toastr.success('Successfully Declined Request ');
                            $('#AdminLeaveRequestDT').DataTable().ajax.reload()

                        },
                        error: function(response) {

                        }
                    });


                });
            })
        </script>

    <?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/M1CH43L/Desktop/AirvendApplication/hrm/MainFile/core/resources/views/admin/leave/leaveRequest.blade.php ENDPATH**/ ?>