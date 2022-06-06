

<?php $__env->startSection('content'); ?>


    <div class="container">


        <div class="card">
            <div class="card-body">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-info" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <form action="" method="POST">
                    <?php echo csrf_field(); ?>

                    <fieldset>
                        <legend><?php echo e(__('Day Shift Time Schedule')); ?></legend>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('Day Shift Start Time')); ?></label>
                                <input type="text" name="from_day" id="" class="timepicker form-control" autocomplete="off"
                                    value="<?php echo e(\Carbon\Carbon::parse(@$shifts->from_day)->format('h:i a')); ?>">

                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('Day Shift Start Time')); ?></label>
                                <input type="text" name="to_day" id="" class="timepicker form-control" autocomplete="off"
                                    value="<?php echo e(\Carbon\Carbon::parse(@$shifts->to_day)->format('h:i a')); ?>">

                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend><?php echo e(__('Night Shift Time Schedule')); ?></legend>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('Night Shift Start Time')); ?></label>
                                <input type="text" name="from_night" id="" class="timepicker form-control"
                                    autocomplete="off"
                                    value="<?php echo e(\Carbon\Carbon::parse(@$shifts->from_night)->format('h:i a')); ?>">

                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><?php echo e(__('Night Shift Start Time')); ?></label>
                                <input type="text" name="to_night" id="" class="timepicker form-control" autocomplete="off"
                                    value="<?php echo e(\Carbon\Carbon::parse(@$shifts->to_night)->format('h:i a')); ?>">

                            </div>
                        </div>
                    </fieldset>



                    <button class="btn btn-primary" type="submit"><?php echo e(__('Save Shift Settings')); ?></button>
                </form>
            </div>
        </div>



    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-plugin'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/timepicker.min.css')); ?>">
    
<?php $__env->stopPush(); ?>
<?php $__env->startPush('style'); ?>
    

    <style>
        fieldset {
            border: 3px solid #98a9c9;
            border-radius: 15px;
            margin-bottom: 50px;
            padding: 10px;
        }

        legend {
            padding: 20px;
            background: #12429c;
            border-radius: 12px;
            font-size: 1.05rem;
            color: rgb(255, 255, 255);
        }

    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/timepicker.min.js')); ?>"></script>

    <script>
        'use strict'
        $('.timepicker').timepicker({
            timeFormat: 'h:mm a',
            startTime: '0:00',
            interval: 15,
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/shift_setting.blade.php ENDPATH**/ ?>