<div class="card-body">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="client_name"><?php echo e(__('Client Name')); ?></label>
            <input type="text" name="client_name" class="form-control" id="client_name"
                value="<?php echo e(old('client_name', isset($client) ? $client->client_name : null)); ?>"
                placeholder="Enter Client Name">
            <?php $__errorArgs = ['client_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group col-md-6">
            <label for="client_email"><?php echo e(__('Client Email')); ?></label>
            <input type="email" name="client_email" class="form-control" id="client_email"
                value="<?php echo e(old('client_email', isset($client) ? $client->client_email : null)); ?>"
                placeholder="Enter Client Email">
            <?php $__errorArgs = ['client_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
  


        <div class="form-group col-md-6">
            <label for="client_mobile"><?php echo e(__('Client Mobile')); ?></label>
            <input type="text" name="client_mobile" class="form-control" id="client_mobile"
                value="<?php echo e(old('client_mobile', isset($client) ? $client->client_mobile : null)); ?>"
                placeholder="Enter Client Phone Number">
            <?php $__errorArgs = ['client_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group col-md-6">
            <label for="client_mobile"><?php echo e(__('Client Company')); ?></label>
            <input type="text" name="client_company" class="form-control" id="client_company"
                value="<?php echo e(old('client_company', isset($client) ? $client->client_company : null)); ?>"
                placeholder="Enter Client Company Name">
            <?php $__errorArgs = ['client_company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group col-md-6">
            <label for="client_address"><?php echo e(__('Client Address')); ?></label>
            <input type="text" name="client_address" class="form-control" id="client_address"
                value="<?php echo e(old('client_address', isset($client) ? $client->client_address : null)); ?>"
                placeholder="Enter Client Address">
            <?php $__errorArgs = ['client_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
   
        <div class="form-group col-md-6">
            <label for="client_website"><?php echo e(__('Client website')); ?></label>
            <input type="text" name="client_website" class="form-control" id="client_website"
                value="<?php echo e(old('client_website', isset($client) ? $client->client_website : null)); ?>"
                placeholder="Enter Client Website">
            <?php $__errorArgs = ['client_website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group col-md-6">
            <label><?php echo e(__('Meeting Date')); ?>:</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="date" name="client_meeting_date"
                    value="<?php echo e(old('client_meeting_date', isset($client) ? $client->client_meeting_date : null)); ?>"
                    class="form-control datetimepicker-input" data-target="#reservationdate" >
                </div>
                <?php $__errorArgs = ['client_meeting_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>


        <div class="form-group col-md-6">
            <label for="role"><?php echo e(__('Client Priority')); ?></label>
            <select class="form-control" name="client_priority" id="client_priority">


                <option <?php if(old('client_priority', isset($client) ? $client->client_priority : null) == 'high'): ?> selected <?php endif; ?> value="high">high</option>
                <option <?php if(old('client_priority', isset($client) ? $client->client_priority : null) == 'middle'): ?> selected <?php endif; ?> value="middle">middle</option>
                <option <?php if(old('client_priority', isset($client) ? $client->client_priority : null) == 'low'): ?> selected <?php endif; ?> value="low">low</option>

            </select>

            <?php $__errorArgs = ['client_priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><i class="text-danger"><?php echo e($message); ?></i><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group col-md-12">
            <label for="client_note"><?php echo e(__('Client Note')); ?></label>
            <textarea type="text" name="client_note" class="form-control" id="client_note"
                placeholder="Enter Client Note"> <?php echo e(old('client_note', isset($client) ? clean($client->client_note) : null)); ?></textarea>
            <?php $__errorArgs = ['client_note'];
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
<!-- /.card-body -->


<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/client/_form.blade.php ENDPATH**/ ?>