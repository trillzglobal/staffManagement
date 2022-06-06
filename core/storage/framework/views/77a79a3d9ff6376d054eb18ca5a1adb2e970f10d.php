

<?php $__env->startSection('content'); ?>
  
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark m-text"><?php echo e($title); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e($title); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   
    <div class="col-md-10">
        <div class="card card-success">
            <div class="card-header bg-primary">
                <h3 class="card-title text-white"><?php echo e(__('Fill the form')); ?></h3>
            </div>

            <form action="<?php echo e(route('file-management.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo $__env->make('admin.file-management._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Send')); ?></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>

    <style>
        
        @media (max-width: 575.98px) { 
          
        .m-text{
            font-size: 1.5rem;
        }
        }

    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/file-management/create.blade.php ENDPATH**/ ?>