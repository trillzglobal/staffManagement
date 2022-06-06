 
 <?php $__env->startSection('content'); ?>

     <div class="container-fluid">

         <div class="card shadow mb-4">
             <div class="card-header py-3 bg-primary">
                 <h6 class="m-0 font-weight-bold text-white"><?php echo e(__('List of Leads')); ?></h6>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                         <thead>
                             <tr>
                                 <th><?php echo e(__('ID')); ?></th>
                                 <th><?php echo e(__('Name')); ?></th>
                                 <th><?php echo e(__('Priority')); ?></th>
                                 <th><?php echo e(__('Meeting Date')); ?></th>
                                 <th><?php echo e(__('Email')); ?></th>
                                 <th><?php echo e(__('Phone')); ?></th>
                                 <th><?php echo e(__('Company')); ?></th>
                                 <th><?php echo e(__('Address')); ?></th>
                                 <th><?php echo e(__('Website')); ?></th>

                                 <th><?php echo e(__('Action')); ?></th>

                             </tr>
                         </thead>
                         <tbody>
                             <?php $__currentLoopData = $clientInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                     <td><?php echo e(++$key); ?></td>
                                     <td><?php echo e($client->client_name); ?></td>
                                     <td><?php echo e($client->client_priority); ?></td>
                                     <td><?php echo e($client->client_meeting_date); ?></td>
                                     <td><?php echo e($client->client_email); ?></td>
                                     <td><?php echo e($client->client_mobile); ?></td>
                                     <td><?php echo e($client->client_company); ?></td>
                                     <td><?php echo e($client->client_address); ?></td>
                                     <td><?php echo e($client->client_website); ?></td>

                                     <td>
                                         <a class="btn btn-primary"
                                             href="<?php echo e(route('client.edit', $client->id)); ?>"><i
                                                 class="fa fa-pen"></i></a>
                                         
                                             <button data-href="<?php echo e(route('client.destroy', $client->id)); ?>" class="btn btn-danger delete"><i
                                                     class="fa fa-trash"></i></button>
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

     <div class="modal fade" tabindex="-1" role="dialog" id="delete">
         <div class="modal-dialog" role="document">
             <form action="" method="post">
                 <?php echo csrf_field(); ?>
                 <?php echo method_field('delete'); ?>
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title"><?php echo e(__('Delete Modal')); ?></h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <p><?php echo e(__('Are You Sure to Delete Lead')); ?></p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                         <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 <?php $__env->stopSection(); ?>


 <?php $__env->startPush('script'); ?>

 <script>
     'use strict'

     $(function(){
        $('.delete').on('click',function(){
            const modal = $('#delete');

            modal.find('form').attr('action', $(this).data('href'));

            modal.modal('show');
        })
     })

 </script>
     
 <?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/client/index.blade.php ENDPATH**/ ?>