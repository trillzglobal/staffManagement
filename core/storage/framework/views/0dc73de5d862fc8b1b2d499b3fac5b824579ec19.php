

<?php $__env->startSection('section'); ?>
    <div class="image">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <img src"<?php echo e(asset('assets/images/logo/'.@$sitename->logo)); ?>">
                                            <h1 class="h4 text-gray-900 mb-4"><?php echo e(__('Welcome To')); ?> <br><?php echo e(@$sitename->sitename); ?></h1>
                                            
                                        </div>
                                        <form method="POST" action="<?php echo e(route('login')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Address..." <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> name="email" value="<?php echo e(old('email')); ?>" required
                                                    autocomplete="email" autofocus>
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p><strong><?php echo e($message); ?></strong></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password" <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> name="password" required
                                                    autocomplete="current-password">

                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="" name="remember"
                                                        id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>

                                                        >

                                                    <label class="form-check-label" for="remember">
                                                        <?php echo e(__('Remember Me')); ?>

                                                    </label>

                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                <?php echo e(__('Login')); ?>

                                            </button>
                                            <hr>

                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?php echo e(route('register')); ?>" ><?php echo e(__('Create an
                                                Account')); ?>!</a>
                                        </div>
                                        <div class="text-center">
                                            <?php if(Route::has('password.request')): ?>
                                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>"
                                                    >
                                                    <?php echo e(__('Forgot Your Password?')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>

                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('auth.master_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/springso/public_html/producthrm/core/resources/views/auth/login.blade.php ENDPATH**/ ?>