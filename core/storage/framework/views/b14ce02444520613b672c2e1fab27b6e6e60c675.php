<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/favicon.ico')); ?>" />

<?php echo $__env->make('admin.admin-layouts._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldPushContent('style'); ?>


<body id="page-top">

    <div id="wrapper">

        <?php echo $__env->make('admin.admin-layouts._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      
        <div id="content-wrapper" class="d-flex flex-column">

           
            <div id="content">

                <?php echo $__env->make('admin.admin-layouts._topNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>

            </div>

            <?php echo $__env->make('admin.admin-layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
       
        <a class="rounded scroll-to-top" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



    </div>


    <script src="<?php echo e(asset('assets/backend/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/sb-admin-2.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/backend/js/jquery.easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/loader.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/backend/js/gijgo.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/chart.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script-plugin'); ?>

    <script src="<?php echo e(asset('assets/backend/js/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/inputmask.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/daterangepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/fullcalendar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/toastr.min.js')); ?>"></script>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
    <script src="<?php echo e(asset('assets/backend/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/backend/js/datatables-demo.js')); ?>"></script>





    <script>
        'use strict'


        var url = "<?php echo e(route('changeLang')); ?>";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>

    <?php echo $__env->yieldPushContent('script'); ?>


   



</body>

</html>
<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/admin-layouts/master.blade.php ENDPATH**/ ?>