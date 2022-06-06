<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="<?php echo e(route('employee.attendanceform')); ?>"  role="button">
              <i class="fas fa-clock fa-fw"></i>
                <!-- Counter - Alerts -->
            </a>
        </li>



        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span>
            </a>
            <!-- Dropdown - Messages -->
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

                <a class="dropdown-item text-center small text-gray-500" href="<?php echo e(route('markread')); ?>">mark as read</a>
            </div>
        </li>

        <li class="mx-1 my-auto nav-item dropdown no-arrow"> 
            <select name="" id="" class="changeLang form-control">
                <option value=""><?php echo e(__('Change Language')); ?></option>
                <?php $__currentLoopData = $language_top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($top->short_code); ?>" <?php echo e(session('locale') == $top->short_code ? 'selected' : ''); ?>><?php echo e(__(strtoupper($top->name))); ?></option>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(Auth::user()->name); ?></span>
                
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo e(route('employee.profile')); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="<?php echo e(route('employee.password.change',Auth::user()->id)); ?>">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/employee/employee-layouts/_topNav.blade.php ENDPATH**/ ?>