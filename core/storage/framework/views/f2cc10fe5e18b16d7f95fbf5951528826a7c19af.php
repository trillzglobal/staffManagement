

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 tile" id="tile-1">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <div class="slider"></div>
                    <li class="nav-item bg-secondary">
                        <a class="nav-link active text-white" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true"><i
                                class="fas fa-spinner mr-2"></i></i><?php echo e(__('In Progress')); ?></a>
                    </li>
                    <li class="nav-item bg-primary">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false"><i class="fas fa-tasks mr-2"></i></i>
                            <?php echo e(__('To Do')); ?></a>
                    </li>
                    <li class="nav-item bg-success">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false"><i class="fas fa-check-circle mr-2"></i>
                            <?php echo e(__('Complete')); ?></a>
                    </li>

                </ul>

                <div class="tab-content">


                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $inProgress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $progress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>




                                <div class="col-xl-6 col-md-6 col-12 mb-3">
                                    <div class="shadow card h-100">
                                        <div class="card-header bg-primary">
                                            <p class="text-white text-center"><?php echo e($progress->name); ?></p>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <p><?php echo e($progress->description); ?></p>

                                                <table class="table table-bordered text-center w-100">
                                                    <tr>
                                                        <th class="bg-success text-white"><?php echo e(__('Start Date')); ?></th>
                                                        <th class="bg-danger text-white"><?php echo e(__('End Date')); ?></th>
                                                        <th class="bg-primary text-white"><?php echo e(__('Priority')); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e($progress->startdate); ?></td>
                                                        <td><?php echo e($progress->enddate); ?></td>
                                                        <td>
                                                            <?php echo e($progress->priority); ?>

                                                        </td>
                                                    </tr>
                                                </table>



                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <div class="mainbox">

                                    <i class="icon-not-found fas fa-sad-tear"></i>

                                    <div class="msg">
                                        <p><?php echo e(__('No In Progrees Task Is Available ')); ?></p>
                                    </div>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>



                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $todo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


                                <div class="col-xl-6 col-md-6 col-12 mb-3">
                                    <div class="shadow card h-100">
                                        <div class="card-header bg-primary">
                                            <p class="text-white text-center"><?php echo e($todo->name); ?></p>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <p><?php echo e($todo->description); ?></p>

                                                <table class="table table-bordered text-center w-100">
                                                    <tr>
                                                        <th class="bg-success text-white"><?php echo e(__('Start Date')); ?></th>
                                                        <th class="bg-danger text-white"><?php echo e(__('End Date')); ?></th>
                                                        <th class="bg-primary text-white"><?php echo e(__('Priority')); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e($todo->startdate); ?></td>
                                                        <td><?php echo e($todo->enddate); ?></td>
                                                        <td>
                                                            <?php echo e($todo->priority); ?>

                                                        </td>
                                                    </tr>
                                                </table>



                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                    <div class="mainbox">

                                        <i class="icon-not-found fas fa-sad-tear"></i>

                                        <div class="msg">
                                            <p><?php echo e(__('No Todo Task Is Available ')); ?></p>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <?php $__empty_1 = true; $__currentLoopData = $finished; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finished): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


                                    <div class="col-xl-6 col-md-6 col-12 mb-3">
                                        <div class="shadow card h-100">
                                            <div class="card-header bg-primary">
                                                <p class="text-white text-center"><?php echo e($finished->name); ?></p>
                                            </div>
                                            <div class="card-body">
                                                <div class="">
                                                    <p><?php echo e($finished->description); ?></p>

                                                    <table class="table table-bordered text-center w-100">
                                                        <tr>
                                                            <th class="bg-success text-white"><?php echo e(__('Start Date')); ?></th>
                                                            <th class="bg-danger text-white"><?php echo e(__('End Date')); ?></th>
                                                            <th class="bg-primary text-white"><?php echo e(__('Priority')); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo e($finished->startdate); ?></td>
                                                            <td><?php echo e($finished->enddate); ?></td>
                                                            <td>
                                                                <?php echo e($finished->priority); ?>

                                                            </td>
                                                        </tr>
                                                    </table>



                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                    <div class="mainbox">

                                        <i class="icon-not-found fas fa-sad-tear"></i>

                                        <div class="msg">
                                            <p><?php echo e(__('No Complete Task Is Available ')); ?></p>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('style'); ?>

        <style>
            .tile {
                width: 100%;
                margin: 60px auto;
            }

            #tile-1 .tab-pane {
                padding: 15px 0;
            }

            #tile-1 .nav-tabs {
                position: relative;
                border: none !important;
                background-color: #fff;
                border-radius: 6px;
            }

            #tile-1 .nav-tabs li {
                margin: 0px !important;
            }

            #tile-1 .nav-tabs li a {
                position: relative;
                margin-right: 0px !important;
                padding: 20px 40px !important;
                font-size: 16px;
                border: none !important;
                color: rgb(255, 255, 255);
            }



            #tile-1 .slider {
                display: inline-block;
                width: 30px;
                height: 4px;
                border-radius: 3px;
                background-color: #281463;
                position: absolute;
                z-index: 1;
                bottom: 0;
                transition: all .4s linear;

            }

            @media (max-width: 575.98px) {
                .slider {
                    display: none !important;
                }
            }

            #tile-1 .nav-tabs .active {
                background-color: transparent !important;
                border: none !important;
                color: #ffffff !important;
            }


            .mainbox {
                background-color: #6a2332;
                margin: auto;
                height: 280px;
                width: 100%;
                position: relative;
            }



            .icon-not-found.fas {
                position: absolute;
                font-size: 8.5rem;
                left: 45%;
                top: 10%;
                color: #ffffff;
            }

            .msg {
                text-align: center;
                font-family: "Nunito Sans", sans-serif;
                font-size: 1.6rem;
                position: absolute;
                left: 16%;
                top: 65%;
                width: 75%;

            }

            .msg p {
                color: #fff
            }

        </style>

    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('script'); ?>

        <script>
            'use strict'
            $(function() {
                $("#tile-1 .nav-tabs a").on('click',function() {
                    var position = $(this).parent().position();
                    var width = $(this).parent().width();
                    $("#tile-1 .slider").css({
                        "left": +position.left,
                        "width": width
                    });
                });
                var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
                var actPosition = $("#tile-1 .nav-tabs .active").position();
                $("#tile-1 .slider").css({
                    "left": +actPosition.left,
                    "width": actWidth
                });
            })
        </script>

    <?php $__env->stopPush(); ?>

<?php echo $__env->make('employee.employee-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/employee/task/index.blade.php ENDPATH**/ ?>