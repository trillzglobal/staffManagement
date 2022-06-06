<?php $__env->startSection('content'); ?>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="<?php echo e(route('admin.userCreate')); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"
                            aria-hidden="true"></i> <?php echo e(__('Add user')); ?></a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><?php echo e(__('User ID')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Role')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->role); ?></td>
                                    <td>

                                        <?php if($user->status == 1): ?>
                                            <p><?php echo e(__('Enabled')); ?></p>
                                        <?php else: ?>
                                            <p><?php echo e(__('Disabled')); ?></p>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.useredit', $user->id)); ?>" class="btn btn-sm btn-primary"><i
                                                class="fa fa-pen" aria-hidden="true"></i></a>

                                        <a href="<?php echo e(route('admin.destroy', $user->id)); ?>" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are You Confirm To Delete')"><i class="fa fa-times"
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

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/M1CH43L/Desktop/AirvendApplication/hrm/MainFile/core/resources/views/admin/user/userIndex.blade.php ENDPATH**/ ?>