

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('Site Name')); ?></h6>
                    </div>
                    <div class="card-body">

                        <?php if(session()->has('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(__('Site Name Updated')); ?>

                            </div>

                        <?php endif; ?>

                        <form action="" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for=""><?php echo e(__('Site Name')); ?></label>
                                <input type="text" name="sitename" id="" class="form-control"
                                    value="<?php echo e(@$sitename->sitename); ?>">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update Site Name">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/logo/setting.blade.php ENDPATH**/ ?>