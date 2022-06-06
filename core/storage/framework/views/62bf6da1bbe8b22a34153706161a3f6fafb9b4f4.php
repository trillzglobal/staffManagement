


<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('Payroll List')); ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('Employee')); ?></th>
                                <th><?php echo e(__('Department')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Monthly Salary')); ?></th>

                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($e->user_id); ?></td>
                                    <td><?php echo e($e->user->name); ?></td>
                                    <td><?php echo e($e->department); ?></td>
                                    <td>
                                        <?php if($e->user->status): ?>
                                            <span class="badge badge-primary"><?php echo e(__('Active')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-danger"><?php echo e(__('Deactive')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($e->salary); ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="<?php echo e(route('admin.addpayment', $e->user_id)); ?>"><i
                                                class="fa fa-pen"></i></a>
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


<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/payroll/list.blade.php ENDPATH**/ ?>