<?php if(config('sweetalert.alwaysLoadJS') === true && config('sweetalert.neverLoadJS') === false ): ?>
    <script src="<?php echo e($cdn ?? asset('assets/vendor/sweetalert/sweetalert.all.js')); ?>"></script>
<?php endif; ?>
<?php if(Session::has('alert.config')): ?>
    <?php if(config('sweetalert.animation.enable')): ?>
        <link rel="stylesheet" href="<?php echo e(config('sweetalert.animatecss')); ?>">
    <?php endif; ?>
    <?php if(config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false): ?>
        <script src="<?php echo e($cdn ?? asset('assets/vendor/sweetalert/sweetalert.all.js')); ?>"></script>
    <?php endif; ?>
    <script>
        'use strict'
        Swal.fire(<?php echo Session::pull('alert.config'); ?>);
    </script>
<?php endif; ?>
<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/vendor/sweetalert/alert.blade.php ENDPATH**/ ?>