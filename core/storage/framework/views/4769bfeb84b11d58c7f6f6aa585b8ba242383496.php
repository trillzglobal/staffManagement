<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Role')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->role); ?></td>
                                    <td>

                                        <?php if($user->status): ?>
                                            <span class="badge badge-success"><?php echo e(__('Enabled')); ?></span>
                                        <?php else: ?>
                                            <p class="badge badge-danger"><?php echo e(__('Disabled')); ?></p>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.useredit', $user->id)); ?>"
                                            class="btn btn-sm btn-primary"><i class="fa fa-pen"
                                                aria-hidden="true"></i></a>

                                        <a href="#" class="btn btn-sm btn-danger" id="userdel"
                                            del_id="<?php echo e($user->id); ?>"><i class="fa fa-times"
                                                aria-hidden="true"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>


    <script>
        'use strict'
        $(document).on("click", "#userdel", function(arg) {
            arg.preventDefault();
            var id = $(this).attr("del_id");
            let url = "<?php echo e(route('admin.destroy',':id')); ?>";

            url = url.replace(':id',id);
            new swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            type: "GET",
                            success(response) {
                                swal("Deleted", "Data has been Deleted Successfully", "success");
                                location.reload();
                            }
                        });

                    } else {
                        swal("Your data is safe!");
                    }
                });


        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/user/userIndexList.blade.php ENDPATH**/ ?>