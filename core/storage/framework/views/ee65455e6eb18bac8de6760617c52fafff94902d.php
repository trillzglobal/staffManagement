

<?php $__env->startSection('content'); ?>
   
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white"><?php echo e(__('Create Lead')); ?></h3>
            </div>
           
            <form action="<?php echo e(route('client.store')); ?>"  method="post" >
                <?php echo csrf_field(); ?>
                <?php echo $__env->make('admin.client._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Create Lead')); ?></button>
                </div>
            </form>
        </div>
    </div>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/client/create.blade.php ENDPATH**/ ?>