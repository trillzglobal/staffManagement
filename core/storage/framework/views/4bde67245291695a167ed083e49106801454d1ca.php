<?php $__env->startSection('content'); ?>


    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-gradient-primary text-light text-bold">
                    <div class="card-title">
                        <h4><?php echo e(__('Change Password')); ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.password.change', $admin->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Old Password')); ?></label>
                            <input type="password" name="old_password" class="form-control" id="">
                            <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <strong class="text-danger text-small"><?php echo e($message); ?></strong>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('New Password')); ?></label>
                            <input type="password" name="password" class="form-control" id="">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <strong class="text-danger text-small"><?php echo e($message); ?></strong>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__('Confirm Password')); ?></label>
                            <input type="password" name="password_confirmation" class="form-control" id="">

                        </div>
                        <button type="submit" class="btn text-light bg-gradient-primary"><?php echo e(__('Submit')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/manage-employee/passwordchange.blade.php ENDPATH**/ ?>