<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark m-text"><?php echo e($title); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e($title); ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="mb-4 shadow card">
            <div class="py-3 card-header bg-primary">
                <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('List of files')); ?></h6>
            </div>
            <div class="py-3 card-header">
                <form action="<?php echo e(route('delete.all')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-outline-danger btn-xs"><?php echo e(__('Delete all files')); ?></button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th><?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Sender Name')); ?></th>
                                <th><?php echo e(__('Receiver Name')); ?></th>
                                <th><?php echo e(__('Description')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Files')); ?></th>
                                <th><?php echo e(__('Download')); ?></th>
                                <th><?php echo e(__('Delete')); ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e(@$files->firstItem() + $key); ?></td>
                                    <td><?php echo e(@$file->title); ?></td>
                                    <td><?php echo e(@\App\User::find($file->sender_id)->name); ?></td>
                                    <td><?php echo e(@$file->user->name); ?></td>
                                    <td><?php echo e(@$file->description); ?></td>
                                    <td><?php echo e(@$file->created_at->format('d-m-Y')); ?></td>
                                    <td>
                                        <?php if($file->files): ?>
                                            <?php echo e(@$file->files); ?>

                                        <?php else: ?>
                                            <span><?php echo e(__('No Attachments')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($file->files): ?>
                                            <a class="btn btn-primary btn-xs"
                                                href="<?php echo e(route('file.download', @$file->files)); ?>"><i
                                                    class="fa fa-download"></i></a>
                                        <?php else: ?>
                                            <span><?php echo e(__('No Attachments')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('file-management.destroy', @$file->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button class="btn btn-danger btn-xs" id="file_delete"><?php echo e(__('Delete')); ?></button>
                                        </form>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

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

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/file-management/index.blade.php ENDPATH**/ ?>