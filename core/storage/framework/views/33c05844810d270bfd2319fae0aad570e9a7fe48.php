

<?php $__env->startSection('content'); ?>
    <?php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ip-api.com/json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $result = json_decode($result);
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-success mb-2">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title"><?php echo e(__('Attendance')); ?></h3>

                    </div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <?php if(session('failed')): ?>
                                <div class="alert alert-danger ml-4 col-md-12">
                                    <?php echo e(session('failed')); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success ml-4 col-md-12">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>

                            <div class="col-md-6 col-6">
                                <form action="<?php echo e(route('employee.attendancestore')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo $result->query; ?>" name="timein_ip">
                                    <button type="submit" class="btn btn-success px-3 py-3"> <i
                                            class="fas fa-check-circle"></i>
                                        <?php echo e(__('Time In')); ?></button>
                                </form>
                            </div>
                            <div class="col-md-6 col-6">
                                <form action="<?php echo e(route('employee.attendanceupdate')); ?>" method="post"
                                    class="text-right">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo $result->query; ?>" name="timeout_ip">
                                    <button type="submit" class="btn btn-danger px-3 py-3"><i
                                            class="fas fa-sign-out-alt"></i><?php echo e(__('Time Out')); ?></button>
                                </form>
                            </div>
                            <main class="main col-md-6">
                                <div class="clockbox">
                                    <svg id="clock" width="300" height="300" viewBox="0 0 600 600">
                                        <g id="face">
                                            <circle class="circle" cx="300" cy="300" r="253.9" />
                                            <path class="hour-marks"
                                                d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6" />
                                            <circle class="mid-circle" cx="300" cy="300" r="16.2" />
                                        </g>
                                        <g id="hour">
                                            <path class="hour-arm" d="M300.5 298V142" />
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9" />
                                        </g>
                                        <g id="minute">
                                            <path class="minute-arm" d="M300.5 298V67" />
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9" />
                                        </g>
                                        <g id="second">
                                            <path class="second-arm" d="M300.5 350V55" />
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9" />
                                        </g>
                                    </svg>
                                </div>
                            </main>



                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

    <style>
        .main {
            display: flex;
            min-height: 35vh;
            justify-content: center;
            align-items: middle;
        }

        .clockbox,
        #clock {
            width: 100%;
        }


        .circle {
            fill: none;
            stroke: #000;
            stroke-width: 9;
            stroke-miterlimit: 10;
        }

        .mid-circle {
            fill: #000;
        }

        .hour-marks {
            fill: none;
            stroke: #000;
            stroke-width: 9;
            stroke-miterlimit: 10;
        }

        .hour-arm {
            fill: none;
            stroke: #000;
            stroke-width: 17;
            stroke-miterlimit: 10;
        }

        .minute-arm {
            fill: none;
            stroke: #000;
            stroke-width: 11;
            stroke-miterlimit: 10;
        }

        .second-arm {
            fill: none;
            stroke: #000;
            stroke-width: 4;
            stroke-miterlimit: 10;
        }


        .sizing-box {
            fill: none;
        }


        #hour,
        #minute,
        #second {
            transform-origin: 300px 300px;
            transition: transform .5s ease-in-out;
        }

    </style>

<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>

    <script async>
        'use strict'


        const HOURHAND = document.querySelector("#hour");
        const MINUTEHAND = document.querySelector("#minute");

        const SECONDHAND = document.querySelector("#second");

        let hr = <?php echo e(date('H', strtotime(now()))); ?>;
        let min = <?php echo e(date('i', strtotime(now()))); ?>;
        let sec = <?php echo e(date('s', strtotime(now()))); ?>;


        let hrPosition = (hr * 360 / 12) + (min * (360 / 60) / 12);
        let minPosition = (min * 360 / 60) + (sec * (360 / 60) / 60);
        let secPosition = sec * 360 / 60;

        function runThetime() {
            hrPosition = hrPosition + (3 / 360);
            minPosition = minPosition + (6 / 60);
            secPosition = secPosition + (6);

            HOURHAND.style.transform = "rotate(" + hrPosition + "deg)";
            MINUTEHAND.style.transform = "rotate(" + minPosition + "deg)";
            SECONDHAND.style.transform = "rotate(" + secPosition + "deg)";
        }

        var interval = setInterval(runThetime, 1000);
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('employee.employee-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/employee/attendance/attendanceform.blade.php ENDPATH**/ ?>