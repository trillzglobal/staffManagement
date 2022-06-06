<nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light topbar static-top">

    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="ml-auto navbar-nav">


        <li class="mx-1 nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="<?php echo e(route('admin.attendanceform')); ?>" role="button">
                <i class="fas fa-clock fa-fw"></i>


            </a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
               
                <span class="badge badge-danger badge-counter"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span>
            </a>
          
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    <?php echo e(__('Notification Center')); ?>

                </h6>
                <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div>
                            <div class="text-truncate"><?php echo e($n->data['data']); ?></div>
                            <div class="small text-gray-500"><?php echo e($n->created_at); ?></div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <a class="dropdown-item text-center small text-gray-500" href="<?php echo e(route('admin.markread')); ?>"><?php echo e(__('mark as read')); ?></a>
            </div>
        </li>


        <li class="mx-1 nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="<?php echo e(route('admin.event')); ?>">
                <i class="fas fa-calendar fa-fw"></i>


            </a>
        </li>

        <li class="mx-1 my-auto nav-item dropdown no-arrow">
            <select name="" id="" class="changeLang form-control">
                <option value=""><?php echo e(__('Change Language')); ?></option>
                <?php $__currentLoopData = $language_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($top->short_code); ?>"
                        <?php echo e(session('locale') == $top->short_code ? 'selected' : ''); ?>><?php echo e(__(strtoupper($top->name))); ?>

                    </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 text-gray-600 d-none d-lg-inline small"><?php echo e(Auth::user()->name); ?></span>

            </a>
            
            <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo e(route('admin.profile', Auth::user()->id)); ?>">
                    <i class="mr-2 text-gray-400 fas fa-user fa-sm fa-fw"></i>
                    <?php echo e(__('Profile')); ?>

                </a>
                <a class="dropdown-item" href="<?php echo e(route('admin.pssword.change', Auth::user()->id)); ?>">
                    <i class="mr-2 text-gray-400 fas fa-lock fa-sm fa-fw"></i>
                    <?php echo e(__('Change Password')); ?>

                </a>



                <div class="dropdown-divider"></div>
                <form action="<?php echo e(route('logout')); ?>" method="POST" class="text-center">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn"><?php echo e(__('Logout')); ?></button>
                </form>


            </div>
        </li>

    </ul>

</nav>

<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/admin-layouts/_topNav.blade.php ENDPATH**/ ?>