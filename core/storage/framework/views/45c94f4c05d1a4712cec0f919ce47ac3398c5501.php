

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">


        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('Attendance Log')); ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('In Time')); ?></th>
                                <th><?php echo e(__('Out Time')); ?></th>
                                <th><?php echo e(__('Worked Hours')); ?></th>
                                <th><?php echo e(__('Timein Status')); ?></th>
                                <th><?php echo e(__('Timeout Status')); ?></th>
                                <th><?php echo e(__('Timein IP')); ?></th>
                                <th><?php echo e(__('TimeOut IP')); ?></th>
                            </tr>
                        </thead>

                       
                        <tbody>
                            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <tr>
                                    <th><?php echo e($atd->date); ?></th>
                                    <th><?php echo e($atd->timein); ?></th>
                                    <?php if($atd->timeout > 0): ?>
                                        <th><?php echo e($atd->timeout); ?></th>
                                    <?php else: ?>
                                        <th> </th>
                                    <?php endif; ?>


                                    <th><?php echo e($atd->workedhours); ?> hour </th>

                                    <th><?php echo e($atd->timein_status); ?></th>
                                    <th><?php echo e($atd->timeout_status); ?></th>
                                    <th><?php echo e($atd->timein_ip); ?></th>
                                    <?php if($atd->timeout_ip > 0): ?>
                                        <th><?php echo e($atd->timeout_ip); ?></th>
                                    <?php else: ?>
                                        <th> </th>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('employee.employee-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/M1CH43L/Desktop/AirvendApplication/hrm/MainFile/core/resources/views/employee/attendance/index.blade.php ENDPATH**/ ?>