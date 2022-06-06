<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('employee.employee-layouts._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php echo $__env->make('employee.employee-layouts._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php echo $__env->make('employee.employee-layouts._topNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>

            </div>
            <!-- End of Main Content -->

            <?php echo $__env->make('employee.employee-layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

  
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('employee.employee-layouts._js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        'use strict'

        var url = "<?php echo e(route('employee.changeLang')); ?>";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>
</body>

</html>
<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/employee/employee-layouts/master.blade.php ENDPATH**/ ?>