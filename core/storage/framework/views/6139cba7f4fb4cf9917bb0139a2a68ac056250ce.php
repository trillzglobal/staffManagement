

<?php $__env->startSection('content'); ?>
  
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white"><?php echo e($title); ?></h3>
            </div>
          
            <form action="<?php echo e(route('employee.files.store')); ?>"  method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo $__env->make('employee.file-management._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Send File')); ?></button>
                </div>
            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('employee.employee-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/employee/file-management/create.blade.php ENDPATH**/ ?>