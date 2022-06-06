<?php $__env->startSection('content'); ?>

    <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('admin.employeeEdit', $profile->id)); ?>">
        <?php echo csrf_field(); ?>

        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="d-flex justify-content-start mbl-flex">
                                <div>
                                    <img src="<?php echo e(asset('assets/files/uploads/' . @$profile->emp_info->avatar)); ?>"
                                        class="rounded-circle image-size" id="employee_edit_img">
                                </div>
                                <div class="mt-4">
                                    <input name="photo" id="employee_edit_input" class="form-control" type="file">
                                </div>
                            </div>
                            <div>
                                <input value="Update Profile" type="submit" class="btn btn-sm btn-primary">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3"><?php echo e(__('Full Name')); ?></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="full_name"
                                                    value="<?php echo e(@$profile->name); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo e($profile->id); ?>">
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Email')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="email" class="form-control" type="text"
                                            value="<?php echo e(@$profile->email); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Mobile')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="contact" class="form-control" type="number"
                                            value="<?php echo e(@$profile->emp_info->contact); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Salary')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="salary" class="form-control" type="number"
                                            value="<?php echo e(@$profile->emp_info->salary); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Age')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="age" class="form-control" type="number"
                                            value="<?php echo e(@$profile->emp_info->age); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Emergency Contact')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="emergency_contact" class="form-control" type="number"
                                            value="<?php echo e(@$profile->emp_info->emergency_contact); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Gender')); ?> </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="gender" class="form-control">
                                            <option value="">-<?php echo e(__('select')); ?>-</option>
                                            <option value="male"
                                                <?php echo e(@$profile->emp_info->gender == 'male' ? 'selected' : ''); ?>>Male
                                            </option>
                                            <option value="female"
                                                <?php echo e(@$profile->emp_info->gender == 'female' ? 'selected' : ''); ?>>Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Marital Status')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="marital_status" class="form-control">
                                            <option value="">-<?php echo e(__('select')); ?>-</option>
                                            <option value="married"
                                                <?php echo e(@$profile->emp_info->marital_status == 'married' ? 'selected' : ''); ?>>
                                                <?php echo e(__('Married')); ?></option>
                                            <option value="single"
                                                <?php echo e(@$profile->emp_info->marital_status == 'single' ? 'selected' : ''); ?>>
                                                <?php echo e(__('Single')); ?></option>
                                            <option value="separeted"
                                                <?php echo e(@$profile->emp_info->marital_status == 'separeted' ? 'selected' : ''); ?>>
                                                <?php echo e(__('Separeted')); ?></option>

                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Shift')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="shift" class="form-control">
                                            <option value="">-<?php echo e(__('select')); ?>-</option>
                                            <option value="day"
                                                <?php echo e(@$profile->emp_info->shift == 'day' ? 'selected' : ''); ?>>
                                                <?php echo e(__('Day Shift')); ?>

                                            </option>
                                            <option value="night"
                                                <?php echo e(@$profile->emp_info->shift == 'night' ? 'selected' : ''); ?>>
                                                <?php echo e(__('Night
                                                                                                Shift')); ?>

                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Joining Date')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="joining_date" class="form-control" type="date"
                                            value="<?php echo e(@$profile->emp_info->joining_date); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Date of Birth')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="dob" class="form-control" type="date"
                                            value="<?php echo e(@$profile->emp_info->dob); ?>" />
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Present Address')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="present_address" class="form-control" type="text"
                                            value="<?php echo e(@$profile->emp_info->present_address); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Permanent Address')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="permanent_address" class="form-control" type="text"
                                            value="<?php echo e(@$profile->emp_info->permanent_address); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('NID Number')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="nid" class="form-control" type="number"
                                            value="<?php echo e(@$profile->emp_info->nid); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Department')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="department" class="form-control">
                                            <option value="">-<?php echo e(__('select')); ?>-</option>
                                            <?php $__currentLoopData = $all_department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($department->dept_name); ?>"
                                                    <?php echo e(@$profile->emp_info->department == @$department->dept_name ? 'selected' : ''); ?>>
                                                    <?php echo e($department->dept_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Designation')); ?></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="designation" class="form-control">
                                            <option value="">-<?php echo e(__('select Designation')); ?>-</option>
                                            <?php $__currentLoopData = $all_designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(@$designation->designation_name); ?>"
                                                    <?php echo e(@$profile->emp_info->designation == @$designation->designation_name ? 'selected' : ''); ?>>
                                                    <?php echo e(@$designation->designation_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
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
                                        <input type="file" class="form-control" multiple name="nid_photo[]">
                                    </div>
                                </div>
                                <hr>


                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Professional CV')); ?>

                                        </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" multiple name="cv[]">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"><?php echo e(__('Educational Certificate')); ?>

                                        </h6>
                                    </div>
                                    <div class="text-left col-sm-9 text-secondary">
                                        <input type="file" class="form-control" multiple name="certificate[]">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>
        </div>
        




    </form>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

    <style>
        .image-size {
            width: 100px;
            height: 100px;
        }

        @media (max-width: 575.98px) {

            .mbl-flex {
                flex-direction: column !important;
            }

        }

    </style>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

    <script>
        'use strict'
        $('#employee_edit_input').on('change',function(e) {
            e.preventDefault();
            let img_src = URL.createObjectURL(e.target.files[0]);
            $('#employee_edit_img').attr('src', img_src);
        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/manage-employee/employeeEdit.blade.php ENDPATH**/ ?>