

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('Change Signature')); ?></h6>
        </div>
        <div class="card-body">

            <br>

            <?php if(session()->has('success')): ?>
            <div class="alert alert-success">
                <?php echo e(__('Signature Updated')); ?>

            </div>

            <?php endif; ?>

            <form action="<?php echo e(route('signature.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><?php echo e(__('Upload')); ?></span>
                    </div>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add">
              </div>
            </form>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/signature/index.blade.php ENDPATH**/ ?>