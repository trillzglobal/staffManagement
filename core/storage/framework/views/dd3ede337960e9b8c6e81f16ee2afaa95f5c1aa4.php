


<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="container">

            <div class="col-md-12">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('Payment Information')); ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="dataTable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('Employee')); ?></th>
                                        <th scope="col"><?php echo e(__('Created Date')); ?></th>
                                        <th scope="col"><?php echo e(__('Monthly Salary')); ?></th>
                                        <th scope="col"><?php echo e(__('Deduction')); ?></th>
                                        <th scope="col"><?php echo e(__('Bonus')); ?></th>
                                        <th scope="col"><?php echo e(__('Total Salary')); ?></th>
                                        <th scope="col"><?php echo e(__('From Date')); ?></th>
                                        <th scope="col"><?php echo e(__('To Date')); ?></th>
                                        <th scope="col"><?php echo e(__('Status')); ?></th>
                                        <th scope="col"><?php echo e(__('Comment')); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $payroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($p->name); ?></td>
                                            <td><?php echo e($p->created_at); ?></td>
                                            <td><?php echo e($p->salary); ?></td>
                                            <td><?php echo e($p->deduction); ?></td>
                                            <td><?php echo e($p->bonus); ?></td>
                                            <td><?php echo e($p->total_salary); ?></td>
                                            <td><?php echo e($p->fromdate); ?></td>
                                            <td><?php echo e($p->enddate); ?></td>
                                            <td>
                                                <?php if($p->approve_key == 1): ?>
                                                    <span class="badge badge-danger"><?php echo e(__('Pending')); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-primary"><?php echo e(__('Done')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($p->comment); ?></td>

                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/payroll/index.blade.php ENDPATH**/ ?>