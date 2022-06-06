<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo e(@$sitename->sitename); ?></title>


    
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/all.min.css')); ?>">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
   
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/login.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/custom.css')); ?>" >
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/toaster.min.css')); ?>"/>


    <?php echo $__env->yieldPushContent('style-plugin'); ?>



</head>

<body class="bg-gradient-primary">

    <?php echo $__env->yieldContent('section'); ?>

    <script src="<?php echo e(asset('assets/backend/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/sb-admin-2.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/backend/js/jquery.easing.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/loader.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/toastr.min.js')); ?>"></script>

    <script>
        <?php if(session()->has('success')): ?>

            toastr.success("<?php echo e(session('success')); ?>")      


            <?php echo e(session()->forget('success')); ?>


        <?php endif; ?>
    </script>

</body>

</html>
<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/auth/master_auth.blade.php ENDPATH**/ ?>