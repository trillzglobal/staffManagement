<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">

    <div class="container mt-3 mb-3 justify-content-center">
        <img class="employee-mimg" src="<?php echo e(asset('assets/images/logo/'.@$sitename->logo)); ?>" alt="" width="100px" width="50px" align="center">
    </div>

    <hr class="my-0 sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('employee.dashboard')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><?php echo e(__('Dashboard')); ?></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseF"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span><?php echo e(__('File Management')); ?></span>
        </a>
        <div id="collapseF" class="collapse <?php echo e(menuActive(['employee.files.index','user-sending-list','user-receiving-list'])); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                <div class="py-2 bg-white rounded collapse-inner">
                    <h6 class="collapse-header"><?php echo e(__('File-Management System')); ?></h6>
                    <a class="collapse-item" href="<?php echo e(route('employee.files.index')); ?>"><?php echo e(__('Add File')); ?></a>
                    <a class="collapse-item" href="<?php echo e(route('user-sending-list')); ?>"><?php echo e(__('Sending List')); ?></a>
                    <a class="collapse-item" href="<?php echo e(route('user-receiving-list')); ?>"><?php echo e(__('Receving List')); ?></a>
                </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseA"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clock"></i>
            <span><?php echo e(__('Attendance')); ?></span>
        </a>
        <div id="collapseA" class="collapse <?php echo e(menuActive(['employee.attendanceform','employee.attendancelist'])); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <h6 class="collapse-header"><?php echo e(__('Attendance')); ?></h6>

                <a class="collapse-item" href="<?php echo e(route('employee.attendanceform')); ?>"><?php echo e(__('Attendance Form')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('employee.attendancelist')); ?>"><?php echo e(__('My Attendance')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAa"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tasks"></i>
            <span><?php echo e(__('My Tasks')); ?></span>
        </a>
        <div id="collapseAa" class="collapse <?php echo e(menuActive(['employee.tasks'])); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <h6 class="collapse-header"><?php echo e(__('My Tasks')); ?></h6>

                <a class="collapse-item" href="<?php echo e(route('employee.tasks')); ?>"><?php echo e(__('Tasks')); ?></a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseL"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-info-circle"></i>
            <span><?php echo e(__('Leave')); ?></span>
        </a>
        <div id="collapseL" class="collapse <?php echo e(menuActive(['empolyee.leave'])); ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <h6 class="collapse-header"><?php echo e(__('File-Management System')); ?></h6>

                <a class="collapse-item" href="<?php echo e(route('empolyee.leave')); ?>"><?php echo e(__('Leave request')); ?></a>
            </div>
        </div>
    </li>


    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="border-0 rounded-circle" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/employee/employee-layouts/_sidebar.blade.php ENDPATH**/ ?>