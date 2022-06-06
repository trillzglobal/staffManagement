<div class="card-body">
    <div class="form-group">
        <label for="employee_id"><?php echo e(__('Select Employee')); ?></label>
        <select class="form-control" name="employee_id" id="employee_id">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <option <?php if(old('employee_id', isset($user) ? $user->employee_id : null) == $user->id): ?> selected <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <?php $__errorArgs = ['employee_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group">
        <label for="title"><?php echo e(__('Title')); ?></label>
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
        <textarea type="text" name="description" class="form-control" id="description"
            placeholder="Enter File Description"></textarea>
    </div>

    <div class="form-group">
        <label for="file"><?php echo e(__('File')); ?></label>
        <div class="mb-3 input-group">

            <div class="custom-file">
                <input type="file" id="inputGroupFile01" class="custom-file-input" name="file" class="form-control"
                    id="file" value="" placeholder="Upload File ">
                <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
            </div>
        </div>
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

<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/file-management/_form.blade.php ENDPATH**/ ?>