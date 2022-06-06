<?php $__env->startSection('content'); ?>


    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('Change TimeZone')); ?></h6>
            </div>
            <div class="card-body">

                <br>

                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(__('TimeZone Updated')); ?>

                    </div>

                <?php endif; ?>

                <form action="<?php echo e(route('admin.time')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>


                    <div class="mr-2">
                        <select class="form-control" id="timezone_select" name="timezone">
                            <?php
                                $timezones = json_decode(file_get_contents(resource_path('views/admin/timezone/timezone.json')));
                            ?>
                            <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="'<?php echo e(@$timezone); ?>'" <?php if(config('app.timezone') == $timezone): ?> selected <?php endif; ?>><?php echo e(__($timezone)); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Change">
                    </div>
                </form>

            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        'use strict'
        $(document).on('change', '#timezone_select', function() {
            let val = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.time')); ?>",
                data: {
                    "timezone": val
                },
                method: "POST",
                success: function(output) {
                    if (output.success) {
                        location.reload();
                    }
                }


            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/timezone/index.blade.php ENDPATH**/ ?>