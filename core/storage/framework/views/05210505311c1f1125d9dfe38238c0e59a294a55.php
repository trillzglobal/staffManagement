

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info"><?php echo e(__('Change Logo')); ?></h6>
                    </div>
                    <div class="card-body">

                        <?php if(session()->has('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(__('Logo Updated')); ?>

                            </div>

                        <?php endif; ?>

                        <form action="<?php echo e(route('logo.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div id="image-preview" style="background: url(<?php echo e(asset('assets/images/logo/' . @$logo->logo)); ?>)">

                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><?php echo e(__('Upload')); ?></span>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="imageUpload">
                                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update Logo">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('style'); ?>

    <style>
        #image-preview {
            width: 300px;
            height: 300px;
            border: 1px dotted lightgray;
            background-position: center;
            background-repeat: no-repeat !important;
            object-fit: cover;
            margin-bottom: 15px;
        }

    </style>

<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>

    <script>
        'use strict'

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').css('background-image', 'url(' + e.target.result + ')');
                    $('#image-preview').hide();
                    $('#image-preview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").on('change', function() {
            readURL(this);
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin-layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/logo/index.blade.php ENDPATH**/ ?>