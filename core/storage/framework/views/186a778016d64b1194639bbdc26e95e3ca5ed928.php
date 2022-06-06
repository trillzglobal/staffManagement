<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">

                        <div class="d-flex justify-content-start user-flex">

                            <div>
                                <img src="<?php echo e(asset('assets/files/uploads/' . @$profile->emp_info->avatar)); ?>"
                                    class="rounded-circle image-size">
                            </div>

                            <div class="mt-3">
                                <h5> <strong> <?php echo e(@$profile->name); ?> </strong> </h5>
                                <p class="mb-1 text-secondary">
                                    <?php echo e(@$profile->emp_info->designation); ?>

                                </p>

                                <p class="mb-1 text-secondary">
                                    ID : <?php echo e(@$profile->emp_info->user_id); ?> </p>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.employeeEdit', $profile->id)); ?>"> <i
                                    class="fa fa-pen"></i> <?php echo e(__('Edit Profile')); ?></a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12">


            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('Full Name')); ?><br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <?php echo e(@$profile->emp_info->full_name); ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('Email')); ?> <br>
                                        <br>
                                    </h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <?php echo e(@$profile->email); ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"> <?php echo e(__('Mobile')); ?> <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <?php echo e(@$profile->emp_info->contact); ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('Age')); ?> <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <?php echo e(@$profile->emp_info->age); ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('Emergency Contact')); ?></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <?php echo e(@$profile->emp_info->emergency_contact); ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('Gender')); ?> </h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <?php echo e(@$profile->emp_info->gender); ?>

                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('Joining Date')); ?> <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    <?php echo e(@$profile->created_at->diffForHumans()); ?>


                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('Present Address')); ?></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    <?php echo e(@$profile->emp_info->present_address); ?>


                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('Permanent Address')); ?></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    <?php echo e(@$profile->emp_info->permanent_address); ?>


                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('NID Number')); ?> <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    <?php echo e(@$profile->emp_info->nid); ?>


                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"><?php echo e(__('Department')); ?> <br><br></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">

                                    <?php echo e(@$profile->emp_info->department); ?>


                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"> <?php echo e(__('Designation')); ?></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <?php echo e(@$profile->emp_info->designation); ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0"> <?php echo e(__('Shift')); ?></h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <?php echo e(@$profile->emp_info->shift); ?>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><?php echo e(__('Nid Card')); ?>

                                    </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <?php if($profile->emp_info->nid_photo != NULL || $profile->emp_info->nid_photo != [] ): ?>
                                    <?php $__currentLoopData = $profile->emp_info->nid_photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <a href="<?php echo e(route('download.file',$photo)); ?>" class="btn btn-sm btn-primary d-inline"><i class="fas fa-download"></i></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                   



                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><?php echo e(__('Professional CV')); ?>

                                    </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">


                                    <?php if($profile->emp_info->cv != NULL || $profile->emp_info->cv != []): ?>
                                        <?php $__currentLoopData = $profile->emp_info->cv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('download.file',$photo)); ?>" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>


                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><?php echo e(__('Educational Certificate')); ?>

                                    </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">

                                    <?php if($profile->emp_info->certificate != NULL || $profile->emp_info->certificate != []): ?>
                                    <?php $__currentLoopData = $profile->emp_info->certificate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('download.file',$photo)); ?>" class="btn btn-sm btn-primary"><i class="fas fa-download"></i></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

    <style>
        .image-size {
            width: 100px;
            height: 100px;
            margin-right: 20px;
        }
        @media (max-width: 575.98px) { 
            .user-flex{
                 flex-direction: column !important;
            }
            .image-size {
            width: 70px;
            height: 70px;
        }
         }
    </style>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/manage-employee/employeeprofile.blade.php ENDPATH**/ ?>