

<?php $__env->startSection('content'); ?>

    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header bg-primary">
                <h3 class="card-title text-light"><?php echo e(__('Fill the form')); ?></h3>
            </div>

            <form action="<?php echo e(route('admin.updateuser')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>


                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo e($user->name); ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php echo e($user->id); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email"><?php echo e(__('Email')); ?></label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="<?php echo e($user->email); ?>" placeholder="Enter User Email">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>



                        <div class="form-group col-md-6">
                            <label for="role"><?php echo e(__('Select Role')); ?></label>
                            <select class="form-control" name="role" id="role">
                                <option value="admin" <?php echo e($user->role == 'admin' ? 'selected' : ''); ?>>admin</option>
                                <option value="employee" <?php echo e($user->role == 'employee' ? 'selected' : ''); ?>>employee</option>
                                

                            </select>


                        </div>


                        <div class="form-group col-md-6">
                            <label for="status"><?php echo e(__('Select Status')); ?></label>
                            <select class="form-control" name="status" required>
                                <option disabled>--<?php echo e(__('Change Status')); ?>--</option>
                                <option value="1" <?php echo e($user->status ? 'selected' : ''); ?>><?php echo e(__('Enabled')); ?></option>
                                <option value="0" <?php echo e(!$user->status ? 'selected' : ''); ?>><?php echo e(__('Disabled')); ?></option>

                            </select>

                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                      


                      
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                </div>

            </form>
        </div>
    </div>

    <!-- /.card -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>