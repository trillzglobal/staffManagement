<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 m-text text-dark"><?php echo e($title); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e($title); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">


        <div class="mb-4 shadow card">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th><?php echo e(__('User ID')); ?></th>
                                <th><?php echo e(__('Image')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>

                        <tbody>


                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            

                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td class="w-15">
                                        <img src="<?php echo e(asset('assets/files/uploads/' . @$employee->emp_info->avatar)); ?>"
                                            alt="employee" class="rounded w-100">
                                    </td>
                                    <td><?php echo e($employee->name); ?></td>
                                    <td><?php echo e($employee->email); ?></td>
                                    <td>
                                        <?php if($employee->status): ?>
                                            <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-danger"><?php echo e(__('Deactive')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start mb-2">
                                            <div class="mr-2">
                                                <a href="<?php echo e(route('admin.employeeView', @$employee->id)); ?>"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-eye"
                                                        aria-hidden="true"></i></a>
                                            </div>

                                            <div>
                                                <a href="<?php echo e(route('admin.employeeEdit', @$employee->id)); ?>"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-pen"
                                                        aria-hidden="true"></i></a>
                                            </div>

                                        </div>
                                        <?php if($employee->role != 'admin'): ?>
                                            <div class="d-flex justify-content-start">

                                                

                                                <div>
                                                    <a class="btn btn-sm btn-danger " id="employee_btn_by"
                                                        employee_id="<?php echo e(@$employee->id); ?>">
                                                        <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    </td>
                                </tr>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

    <style>
        .w-15 {
            width: 15% !important;
        }
        @media (max-width: 575.98px) { 
            .m-text{
            font-size: 1.5rem;
        }
        }
        

    </style>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        $(function() {
            'use strict'
            $(document).on('click', '#employee_btn_by', function(e) {
                e.preventDefault();
                let id = $('#employee_btn_by').attr('employee_id');

               
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
                                url: 'manage-employee/delete/' + id,
                                method: 'POST',
                                success: function(out) {
                                    swal("Deleted", "Data has been Deleted Successfully",
                                        "success");
                                    window.location.href =
                                        "<?php echo e(route('admin.employeeIndex')); ?>"
                                }
                            })

                        } else {
                            swal("Your data is safe!");
                        }
                    });
            });

            $(document).on('click', '#disableEmployee', function(e) {
                e.preventDefault();
                let id = $('#employee_btn_by').attr('employee_id');
                new swal({
                        title: "Are you sure?",
                        text: "You want to disable this Employee",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {

                        if (willDelete) {
                            $.ajax({
                                url: 'manage-employee/disable/' + id,
                                method: 'GET',
                                success: function(out) {
                                    window.location.href =
                                        "<?php echo e(route('admin.employeeIndex')); ?>"
                                }
                            })

                        } else {
                            swal("Your data is safe!");
                        }
                    });
            });



        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/manage-employee/employeeIndex.blade.php ENDPATH**/ ?>