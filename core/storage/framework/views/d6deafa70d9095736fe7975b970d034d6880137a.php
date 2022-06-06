

<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('success')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="card">
                        
                       
                        <div class="card-body table-responsive">
                            <table class="table table-hover text-nowrap" id="myTable">
                                <thead>
                                    <tr>

                                        <th><?php echo e(__('Title')); ?></th>
                                        <th><?php echo e(__('Description')); ?></th>
                                        <th><?php echo e(__('Files')); ?></th>
                                        <th><?php echo e(__('Download')); ?></th>
                                        <th><?php echo e(__('Delete')); ?></th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($d->title); ?></td>

                                            <td><?php echo e($d->description); ?></td>

                                            <td>
                                                <?php if($d->files): ?>
                                                    <?php echo e($d->files); ?>

                                                <?php else: ?>
                                                    <span><?php echo e(__('No Attachment')); ?></span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if($d->files): ?>
                                                    <a class="btn btn-primary btn-xs"
                                                        href="<?php echo e(route('employee.file.download', $d->files)); ?>"><i
                                                            class="fa fa-download"></i></a>
                                                <?php else: ?>
                                                    <span><?php echo e(__('No Attachment')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('empolyee.files.delete', $d->id)); ?>"
                                                    method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <button class="btn btn-danger btn-xs"
                                                        onclick="return confirm('Are You Confirm To Delete')"><?php echo e(__('Delete')); ?></button>
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

        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        'use strict'
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('employee.employee-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/employee/file-management/index.blade.php ENDPATH**/ ?>