

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="container">
            <div class="col-md-8">

                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('Employee Information')); ?></h6>
                    </div>
                    <div class="card-body">


                        <table class="table table-responsive w-100" id="dataTable3">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo e(__('ID')); ?></th>
                                    <th scope="col"><?php echo e(__('Employee')); ?></th>
                                    <th scope="col"><?php echo e(__('Department')); ?></th>
                                    <th scope="col"><?php echo e(__('Status')); ?></th>
                                    <th scope="col"><?php echo e(__('Salary')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($e->user_id); ?></th>
                                        <td><?php echo e($e->name); ?></td>
                                        <td><?php echo e($e->department); ?></td>
                                        <td>
                                            <?php if($e->status): ?>
                                                <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-danger"><?php echo e(__('Deactive')); ?></span>
                                            <?php endif; ?>

                                        </td>
                                        <td><?php echo e($e->salary); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">

            <div class="col-md-12">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('success')); ?>


                    </div>
                <?php endif; ?>

                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('Payment Information')); ?></h6>
                    </div>
                    <div class="card-body">

                        <table class="table table-responsive w-100" id="dataTable2">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo e(__('Created Date')); ?></th>
                                    <th scope="col"><?php echo e(__('Monthly Salary')); ?></th>
                                    <th scope="col"><?php echo e(__('Deduction')); ?></th>
                                    <th scope="col"><?php echo e(__('Bonus')); ?></th>
                                    <th scope="col"><?php echo e(__('Total Salary')); ?></th>
                                    <th scope="col"><?php echo e(__('From Date')); ?></th>
                                    <th scope="col"><?php echo e(__('To Date')); ?></th>
                                    <th scope="col"><?php echo e(__('Approve key')); ?></th>
                                    <th scope="col"><?php echo e(__('Comment')); ?></th>
                                    <th scope="col"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $payroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($p->created_at); ?></td>
                                        <td><?php echo e($p->salary); ?></td>
                                        <td><?php echo e($p->deduction); ?></td>
                                        <td><?php echo e($p->bonus); ?></td>
                                        <td><?php echo e($p->total_salary); ?></td>
                                        <td><?php echo e($p->fromdate); ?></td>
                                        <td><?php echo e($p->todate); ?></td>
                                        <td>
                                            <?php if($p->approve_key == 1): ?>
                                                <span class="badge badge-primary"><?php echo e(__('Pending')); ?></span>
                                            <?php else: ?>
                                            <span class="badge badge-primary"><?php echo e(__('Done')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($p->comment); ?></td>
                                        <td><a href="<?php echo e(route('admin.paymentedit', $p->id)); ?>"
                                                class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                            <a href="<?php echo e(route('admin.paymentdelete',[$p->id ,$p->user_id ])); ?>"
                                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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

    <div class="row">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow ml-3 mb-4">
                        <div class="card-header bg-primary">
                            <h6 class="m-0 font-weight-bold text-white mb-4"><?php echo e(__('Filter Date')); ?></h6>
                        </div>
                        <div class="card-body ">
                           
                            <form action="<?php echo e(route('admin.filterbydate', $e->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">

                                    <div class="input-group date">
                                        <input type="text" name="fromdate" class="datepicker form-control" required
                                            autocomplete="off" />

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="input-group date">
                                        <input type="text" name="todate" class="datepicker form-control" required
                                            autocomplete="off" />

                                    </div>
                                </div>
                                <input type="submit" class="btn btn-outline-primary btn-sm mb-3" name="submit"
                                    placeholder="filter">
                            </form>



                            <div class="table-responsive">
                                <table class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Date')); ?></th>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('In Time')); ?></th>
                                            <th><?php echo e(__('Out Time')); ?></th>
                                            <th><?php echo e(__('Worked Hours')); ?></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($atd->date); ?></td>
                                                <td><?php echo e($atd->name); ?></td>
                                                <td><?php echo e($atd->timein); ?></td>
                                                <td><?php echo e($atd->timeout); ?></td>
                                                <td><?php echo e($atd->workedhours); ?></td>


                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow mb-4 mr-3">
                        <div class="card-header bg-primary">
                            <h6 class="m-0 font-weight-bold text-white mb-4"><?php echo e(__('Attendance Days Information')); ?></h6>
                        </div>
                        <div class="card-body ">
                           

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('From Date')); ?></th>
                                        <th scope="col"><?php echo e(__('Till Date')); ?></th>
                                        <th scope="col"><?php echo e(__('Days')); ?></th>
                                        <th scope="col"><?php echo e(__('Salary')); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        <?php if(session()->has('from')): ?>
                                            <?php echo e(session('from')); ?>

                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(Session::has('to')): ?>
                                            <?php echo e(Session::get('to')); ?>

                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(count($attendance)); ?></td>
                                    <td><?php echo e($e->salary); ?></td>


                                </tbody>
                            </table>

                            <h6><?php echo e(__('Add Salary')); ?></h6>

                            <form action="<?php echo e(route('admin.pay', $e->id)); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Salary')); ?></label>
                                    <input name="salary" id="salary" class="form-control" type="text"
                                        value="<?php echo e($e->salary); ?>" readonly>
                                    <input name="user_id" id="salary" class="form-control" type="hidden"
                                        value="<?php echo e($e->id); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('From Date')); ?></label>
                                    <input name="fromdate" id="fromdate" class="form-control " type="text"
                                        value="<?php if(session()->has('from')): ?><?php echo e(session('from')); ?> <?php endif; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Till date')); ?></label>
                                    <input name="todate" id="todate" class="form-control" type="text"
                                        value="<?php if(session()->has('from')): ?><?php echo e(session('from')); ?> <?php endif; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Deduction')); ?></label>
                                    <input name="deduction" id="deduction" class="form-control deduction" type="text">
                                    <input name="attendance_count" value="<?php echo e(count($attendance)); ?>"
                                        class="form-control deduction" type="hidden">
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Bonus')); ?></label>
                                    <input name="bonus" id="bonus" class="form-control bonus" type="text">
                                </div>

                                <div class="form-group">
                                    <label for=""><?php echo e(__('Comment')); ?></label>
                                    <input name="comment" id="comment" class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo e(__('Total')); ?></label>
                                    <input name="total" id="total" class="form-control total" type="text" readonly>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" name="approve_key" type="checkbox" value="1"
                                        id="flexCheckDefault">
                                    <label class="form-check-label mb-3" for="flexCheckDefault">
                                        <?php echo e(__('Pending')); ?>

                                    </label>
                                </div>

                                <div class="form-group">
                                    <input id="payment" class="btn btn-block  btn-primary" type="submit" value="Pay">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-plugin'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-datepicker3.min.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-plugin'); ?>

    <script src="<?php echo e(asset('assets/backend/js/bootstrap-datepicker.min.js')); ?>"></script>



<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {

            'use strict'

            $('.datepicker').datepicker(); 
            $('#dataTable2').DataTable(); 
            $('#dataTable3').DataTable();

            function nettotalfind() {
                var sum = 0;
                $('.total').each(function() {
                    sum += parseFloat($(this).val());
                });

                $('#total').val(sum);

            }

            $(document).on("keyup", ".deduction", function(arg) {
                var deduction = $('#deduction').val();
                var bonus = $('#bonus').val();
                var salary = $('#salary').val();
                var total = +bonus + +salary - deduction;
                $('#total').val(total);
                nettotalfind();

            });

            $(document).on("keyup", ".bonus", function(arg) {
                var deduction = $('#deduction').val();
                var bonus = $('#bonus').val();
                var salary = $('#salary').val();
                var total = +bonus + +salary - deduction;
                $('#total').val(total);
                nettotalfind();
            });

        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/payroll/payment.blade.php ENDPATH**/ ?>