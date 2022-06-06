<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">
    <div class="container mt-3 mb-3 justify-content-center">
        <img src="<?php echo e(asset('assets/images/logo/'.@$sitename->logo)); ?>" class="img-fluid">
    </div>


    <hr class="my-0 sidebar-divider">


    <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><?php echo e(__('Dashboard')); ?></span></a>
    </li>


    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        <?php echo e(__('Employee Management')); ?>

    </div>

    <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsDept" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span><?php echo e(__('Department')); ?></span>
        </a>
        <div id="collapsDept" class="collapse <?php echo e(menuActive(['admin.addDepartment', 'admin.addDesignation'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">

                <a class="collapse-item" href="<?php echo e(route('admin.addDepartment')); ?>"><?php echo e(__('Department')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.addDesignation')); ?>"><?php echo e(__('Designation')); ?></a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmp" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span><?php echo e(__('Employees')); ?></span>
        </a>
        <div id="collapseEmp" class="collapse <?php echo e(menuActive('admin.employeeIndex')); ?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">

                <a class="collapse-item" href="<?php echo e(route('admin.employeeIndex')); ?>"> <?php echo e(__('Employee List')); ?></a>

            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        <?php echo e(__('Accounts')); ?>

    </div>



    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa fa-dollar-sign"></i>
            <span><?php echo e(__('Income')); ?></span>
        </a>
        <div id="collapsePages" class="collapse <?php echo e(menuActive('income.get')); ?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                
                <a class="collapse-item" href="<?php echo e(url('/income/get')); ?>"><?php echo e(__('Add Income')); ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span><?php echo e(__('Expense')); ?></span>
        </a>
        <div id="collapseT" class="collapse <?php echo e(menuActive(['category.show', 'expense.create'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
              
                <a class="collapse-item" href="<?php echo e(url('/category/show/')); ?>"><?php echo e(__('Add Expense Category')); ?></a>
                <a class="collapse-item" href="<?php echo e(url('/expense/')); ?>"><?php echo e(__('Add Expensive')); ?></a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAttendance"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clock"></i>
            <span><?php echo e(__('Attendance Manage')); ?></span>
        </a>
        <div id="collapseAttendance" class="collapse <?php echo e(menuActive(['admin.attendanceform', 'admin.attendancelist'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
               
                <a class="collapse-item" href="<?php echo e(route('admin.attendanceform')); ?>"><?php echo e(__('Add Attendance')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.attendancelist')); ?>"><?php echo e(__('Attendance List')); ?></a>
            </div>
        </div>
    </li>
    <hr class="my-0 sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoq" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span><?php echo e(__('Payroll Manage')); ?></span>
        </a>
        <div id="collapseTwoq" class="collapse <?php echo e(menuActive(['admin.addpayroll', 'admin.payrolllist'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
              

                <a class="collapse-item" href="<?php echo e(route('admin.addpayroll')); ?>"><?php echo e(__('Add Payroll')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.payrolllist')); ?>"><?php echo e(__('Payroll List')); ?></a>

            </div>
        </div>
    </li>

    <hr class="my-0 sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWorkspace"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tasks"></i>
            <span> <?php echo e(__('Project & Tasks')); ?></span>
        </a>
        <div id="collapseWorkspace" class="collapse <?php echo e(menuActive('workspace.index')); ?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                
                <a class="collapse-item" href="<?php echo e(route('workspace.index')); ?>"><?php echo e(__('Workspace')); ?></a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span><?php echo e(__('Invoice')); ?></span>
        </a>
        <div id="collapseInvoice" class="collapse <?php echo e(menuActive('invoice.index')); ?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                
                <a class="collapse-item" href="<?php echo e(url('/invoice')); ?>"><?php echo e(__('Add Invoice')); ?></a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFile" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span><?php echo e(__('File Management')); ?></span>
        </a>
        <div id="collapseFile"
            class="collapse <?php echo e(menuActive(['file-management.create', 'file-management.index', 'admin.sending-list', 'admin.receiving-list'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                
                <a class="collapse-item" href="<?php echo e(route('file-management.create')); ?>"><?php echo e(__('Add File')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('file-management.index')); ?>"><?php echo e(__('File List')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.sending-list')); ?>"><?php echo e(__('Sending List')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.receiving-list')); ?>"><?php echo e(__('Receving List')); ?></a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClinet" aria-expanded="true"
            aria-controls="collapseClinet">
            <i class="fas fa-fw fa-user"></i>
            <span><?php echo e(__('User Management')); ?></span>
        </a>
        <div id="collapseClinet" class="collapse <?php echo e(menuActive(['admin.userCreate', 'admin.inactive'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
              

                <a class="collapse-item" href="<?php echo e(route('admin.userCreate')); ?>"><?php echo e(__('Register New User')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.inactive')); ?>"><?php echo e(__('User List')); ?></a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span><?php echo e(__('Lead Management')); ?></span>
        </a>
        <div id="collapseTwo" class="collapse <?php echo e(menuActive(['client.index', 'client.create'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="<?php echo e(route('client.index')); ?>"><?php echo e(__('Lead Management')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('client.create')); ?>"><?php echo e(__('Lead Create')); ?></a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-calendar"></i>
            <span><?php echo e(__('Event Management')); ?></span>
        </a>
        <div id="collapseEvent" class="collapse <?php echo e(menuActive(['admin.event'])); ?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
              
                <a class="collapse-item" href="<?php echo e(route('admin.event')); ?>"><?php echo e(__('Manage Event')); ?></a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- Nav Item - Assets -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAsset" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span><?php echo e(__('Assets')); ?></span>
        </a>
        <div id="collapseAsset" class="collapse <?php echo e(menuActive(['admin.assetType', 'admin.equipment'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
               

                <a class="collapse-item" href="<?php echo e(route('admin.assetType')); ?>"><?php echo e(__('Assset Type')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.equipment')); ?>"><?php echo e(__('Equipment')); ?></a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-info-circle"></i>
            <span><?php echo e(__('Leave')); ?></span>
        </a>
        <div id="collapseLeave" class="collapse <?php echo e(menuActive(['admin.addLeaveType', 'admin.leaveRequest'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
               

                <a class="collapse-item" href="<?php echo e(route('admin.addLeaveType')); ?>"><?php echo e(__('Add Leave Type')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.leaveRequest')); ?>"><?php echo e(__('Leave Request')); ?></a>

            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLanguage"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-info-circle"></i>
            <span><?php echo e(__('Manage Language')); ?></span>
        </a>
        <div id="collapseLanguage" class="collapse <?php echo e(menuActive(['admin.language'])); ?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">

                <a class="collapse-item" href="<?php echo e(route('admin.language')); ?>"><?php echo e(__('Add Language')); ?></a>


            </div>
        </div>
    </li>
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselogo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span><?php echo e(__('Setting')); ?></span>
        </a>
        <div id="collapselogo"
            class="collapse <?php echo e(menuActive(['sitename', 'logo', 'signature.create', 'admin.time.index', 'copyright', 'shift', 'email.config'])); ?>"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
               
                <a class="collapse-item" href="<?php echo e(route('sitename')); ?>"> <?php echo e(__('Change Site Name')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('logo')); ?>"> <?php echo e(__('Change Logo')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('signature.create')); ?>">
                    <?php echo e(__('Change Signature')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('admin.time.index')); ?>"> <?php echo e(__('Change TimeZone')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('copyright')); ?>"> <?php echo e(__('Change Copyright')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('shift')); ?>"><?php echo e(__('Shift Setting')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('email.config')); ?>"><?php echo e(__('Email Setting')); ?></a>
                <a class="collapse-item" href="<?php echo e(route('our_backup_database')); ?>"><?php echo e(__('Database Backup')); ?></a>

            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">


    <div class="text-center d-none d-md-inline">
        <button class="border-0 rounded-circle" id="sidebarToggle"></button>
    </div>



</ul>


<!-- End of Sidebar -->




<?php /**PATH /home/springso/public_html/producthrm/core/resources/views/admin/admin-layouts/_sidebar.blade.php ENDPATH**/ ?>