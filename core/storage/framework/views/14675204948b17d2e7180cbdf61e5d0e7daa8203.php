
<?php $__env->startSection('content'); ?>


    <div class="container">

        <div class="row">

            <div class="card col-md-12">

                <div class="card-header">
                    <button class="btn btn-primary add"><?php echo e(__('Create Language')); ?></button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Language Name')); ?></th>
                                <th><?php echo e(__('Default')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($lang->name); ?></td>
                                    <td>
                                        <?php if($lang->is_default): ?>
                                         <span class="badge badge-primary"><?php echo e(__('Default')); ?></span>
                                         <?php else: ?>
                                            <span class="badge badge-warning"><?php echo e(__('Changeable')); ?></span>
                                         <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary edit" data-href="<?php echo e(route('language.edit', $lang)); ?>" data-lang="<?php echo e($lang); ?>"><i class="fa fa-pen"></i></button> 
                                        
                                        <?php if(!$lang->is_default): ?>
                                        <button class="btn btn-danger delete" data-href="<?php echo e(route('language.delete', $lang)); ?>"><i class="fa fa-trash"></i></button>
                                        <?php endif; ?>

                                        <a href="<?php echo e(route('language.translator',$lang->short_code)); ?>" class="btn btn-primary"><?php echo e(('Transalator')); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

    <div class="modal fade" tabindex="-1" id="add" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Add Language')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Language Name')); ?></label>
                                <input type="text" name="language" class="form-control" placeholder="<?php echo e(__('Enter Language')); ?>">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Language short Code')); ?></label>
                                <input type="text" name="short_code" class="form-control" placeholder="<?php echo e(__('Enter Language Short Code')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Create')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    
    <div class="modal fade" tabindex="-1" id="edit" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Edit Language')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Language Name')); ?></label>
                                <input type="text" name="language" class="form-control" placeholder="<?php echo e(__('Enter Language')); ?>">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for=""><?php echo e(__('Language short Code')); ?></label>
                                <input type="text" name="short_code" class="form-control" placeholder="<?php echo e(__('Enter Language Short Code')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    
    
    <div class="modal fade" tabindex="-1" id="delete" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Delet Language')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      
                            <p><?php echo e(__('Are You Sure to Delete')); ?>?</p>
                       
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
        $(function() {
            'use strict'
            
            $('#myTable').DataTable();


            $('.add').on('click',function(){
                const modal = $('#add');

                modal.modal('show')
            })
            
            $('.edit').on('click',function(){
                const modal = $('#edit');
                modal.find('form').attr('action',$(this).data('href'))
                modal.find('input[name=language]').val($(this).data('lang').name)
                modal.find('input[name=short_code]').val($(this).data('lang').short_code)
                modal.modal('show')
            })

            $('.delete').on('click',function(){
                const modal = $('#delete');

                modal.find('form').attr('action', $(this).data('href'));

                modal.modal('show');
            })

        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/M1CH43L/Desktop/AirvendApplication/hrm/MainFile/core/resources/views/admin/language/index.blade.php ENDPATH**/ ?>