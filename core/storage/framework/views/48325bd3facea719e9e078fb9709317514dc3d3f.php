<div class="card-body">

    <div class="form-group">
        <label for="category_id"><?php echo e(__('Select Admin')); ?></label>
        <select class="form-control" name="user_id" id="user_id">
            <option value=""><?php echo e(__('Select Admin')); ?></option>
            <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <option value="<?php echo e($admin->id); ?>"><?php echo e($admin->name); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group">
        <label for="name"><?php echo e(__('File Title')); ?></label>
        <input type="text" name="title" class="form-control" id="title" value="" placeholder="Enter File Title">
        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group">
        <label for="description"><?php echo e(__('Description')); ?></label>
        <input type="text" name="description" class="form-control" id="description" value=""
            placeholder="Enter Description">
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group">
        <label for="image"><?php echo e(__('File')); ?></label>
        <input type="file" name="file" class="form-control" id="file" value="" placeholder="Upload File ">
        <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>


</div>
<!-- /.card-body -->
<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/employee/file-management/_form.blade.php ENDPATH**/ ?>