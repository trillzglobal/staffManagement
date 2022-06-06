<?php $__env->startSection('content'); ?>

<div class="mt-3 mb-3 ml-5 mr-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="pl-0 col-lg-3">
                            <a href="#" class="mt-3 noble-ui-logo d-block">
                                <p class="mt-1 mb-1"><b><img src="<?php echo e(asset('assets/images/logo/'.@$sitename->logo)); ?>"></b></p>
                            </a>
                            <h5 class="mt-5 mb-2 text-muted"><?php echo e(__('Invoice to')); ?> :</h5>
                            <p><?php echo e($invoice_details->invoiceto); ?> <br> <?php echo e($invoice_details->contact); ?></p>
                        </div>
                        <div class="pr-0 col-lg-3">
                            <h4 class="mt-4 mb-2 text-right font-weight-medium text-uppercase"><?php echo e(__('invoice')); ?></h4>
                            <h6 class="pb-4 mb-5 text-right"># <?php echo e($invoice_details->id); ?></h6>
                            <h4 class="mt-2 mb-2 text-right font-weight-medium text-uppercase"><?php echo e(__('Payment Status')); ?></h4>
                            <h5 class="pb-4 mb-5 text-right">#
                                <?php echo e($invoice_details->payment_status == 0 ? 'Unpaid' : ($invoice_details->payment_status == 1 ? 'Paid' : 'Partial')); ?>

                            </h5>
                            <h6 class="mt-3 mb-0 mb-2 text-right font-weight-normal"><span
                                    class="text-muted"><?php echo e(__('Invoice
                                    Date')); ?> : <?php echo e($invoice_details->date); ?></span> </h6>
                        </div>
                    </div>
                    <div class="mt-5 container-fluid d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo e(__('Description')); ?></th>
                                        <th class="text-center"><?php echo e(__('Amount')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $lists = json_decode($invoice_details->list_price, true);
                                    ?>
                                    <?php if(isset($lists)): ?>
                                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($list['item']); ?></td>
                                                <td><?php echo e($list['price']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-5 container-fluid w-100">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="signature">
                                   
                                    <img src="<?php echo e(asset('assets/images/signature/' . @$signature->signature)); ?>" class="w-25">
                                    <h6><?php echo e(__('Authorized Signature')); ?></h6>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td><?php echo e(__('Sub Total')); ?></td>
                                                <td class="text-right">$ <?php echo e($invoice_details->total); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Paid </td>
                                                <td class="text-right">$
                                                    <?php echo e($invoice_details->partial == null ? $invoice_details->total : $invoice_details->partial); ?>

                                                </td>
                                            </tr>

                                            <tr class="bg-light">
                                                <td class="text-bold-800"><?php echo e(__('Grand Total')); ?></td>
                                                <td class="text-right text-bold-800">$ <?php echo e($invoice_details->total); ?>

                                                </td>
                                            </tr>
                                            <tr class="bg-light">
                                                <td class="text-bold-800"><?php echo e(__('Due')); ?></td>
                                                <td class="text-right text-bold-800 text-danger">$
                                                    <?php echo e($invoice_details->due ?? 0); ?>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1 container-fluid w-100">
                        <a href="/invoice" class="float-right mt-4 ml-2 btn btn-primary"><i data-feather="send"
                                class="mr-3 icon-md"></i><?php echo e(__('Back')); ?></a>
                        <a href="#" onclick="window.print();" class="float-right mt-4 btn btn-outline-primary"><i
                                data-feather="printer" class="mr-2 icon-md"></i><?php echo e(__('Print')); ?></a>
                    </div>
                </div>
                <p class="text-center font-weight-lighter font-italic "><?php echo e(__('Thank you for shopping with us. Please come
                    again')); ?>

                </p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/invoice/invoice.blade.php ENDPATH**/ ?>