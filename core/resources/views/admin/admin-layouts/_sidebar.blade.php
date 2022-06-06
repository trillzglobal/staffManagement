<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">
    <div class="container mt-3 mb-3 justify-content-center">
        <img src="{{ asset('assets/images/logo/'.@$sitename->logo) }}" class="img-fluid">
    </div>


    <hr class="my-0 sidebar-divider">


    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>


    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        {{ __('Employee Management') }}
    </div>

    <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsDept" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ __('Department') }}</span>
        </a>
        <div id="collapsDept" class="collapse {{ menuActive(['admin.addDepartment', 'admin.addDesignation']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">

                <a class="collapse-item" href="{{ route('admin.addDepartment') }}">{{ __('Department') }}</a>
                <a class="collapse-item" href="{{ route('admin.addDesignation') }}">{{ __('Designation') }}</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmp" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('Employees') }}</span>
        </a>
        <div id="collapseEmp" class="collapse {{ menuActive('admin.employeeIndex') }}" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">

                <a class="collapse-item" href="{{ route('admin.employeeIndex') }}"> {{ __('Employee List') }}</a>

            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        {{ __('Accounts') }}
    </div>



    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa fa-dollar-sign"></i>
            <span>{{ __('Income') }}</span>
        </a>
        <div id="collapsePages" class="collapse {{ menuActive('income.get') }}" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                
                <a class="collapse-item" href="{{ url('/income/get') }}">{{ __('Add Income') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>{{ __('Expense') }}</span>
        </a>
        <div id="collapseT" class="collapse {{ menuActive(['category.show', 'expense.create']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
              
                <a class="collapse-item" href="{{ url('/category/show/') }}">{{ __('Add Expense Category') }}</a>
                <a class="collapse-item" href="{{ url('/expense/') }}">{{ __('Add Expensive') }}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAttendance"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clock"></i>
            <span>{{ __('Attendance Manage') }}</span>
        </a>
        <div id="collapseAttendance" class="collapse {{ menuActive(['admin.attendanceform', 'admin.attendancelist']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
               
                <a class="collapse-item" href="{{ route('admin.attendanceform') }}">{{ __('Add Attendance') }}</a>
                <a class="collapse-item" href="{{ route('admin.attendancelist') }}">{{ __('Attendance List') }}</a>
            </div>
        </div>
    </li>
    <hr class="my-0 sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoq" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>{{ __('Payroll Manage') }}</span>
        </a>
        <div id="collapseTwoq" class="collapse {{ menuActive(['admin.addpayroll', 'admin.payrolllist']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
              

                <a class="collapse-item" href="{{ route('admin.addpayroll') }}">{{ __('Add Payroll') }}</a>
                <a class="collapse-item" href="{{ route('admin.payrolllist') }}">{{ __('Payroll List') }}</a>

            </div>
        </div>
    </li>

    <hr class="my-0 sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWorkspace"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tasks"></i>
            <span> {{ __('Project & Tasks') }}</span>
        </a>
        <div id="collapseWorkspace" class="collapse {{ menuActive('workspace.index') }}" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                
                <a class="collapse-item" href="{{route('workspace.index')}}">{{ __('Workspace') }}</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>{{ __('Invoice') }}</span>
        </a>
        <div id="collapseInvoice" class="collapse {{ menuActive('invoice.index') }}" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                
                <a class="collapse-item" href="{{ url('/invoice') }}">{{ __('Add Invoice') }}</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFile" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>{{ __('File Management') }}</span>
        </a>
        <div id="collapseFile"
            class="collapse {{ menuActive(['file-management.create', 'file-management.index', 'admin.sending-list', 'admin.receiving-list']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                
                <a class="collapse-item" href="{{ route('file-management.create') }}">{{ __('Add File') }}</a>
                <a class="collapse-item" href="{{ route('file-management.index') }}">{{ __('File List') }}</a>
                <a class="collapse-item" href="{{ route('admin.sending-list') }}">{{ __('Sending List') }}</a>
                <a class="collapse-item" href="{{ route('admin.receiving-list') }}">{{ __('Receving List') }}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClinet" aria-expanded="true"
            aria-controls="collapseClinet">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('User Management') }}</span>
        </a>
        <div id="collapseClinet" class="collapse {{ menuActive(['admin.userCreate', 'admin.inactive']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
              

                <a class="collapse-item" href="{{route('admin.userCreate')}}">{{ __('Register New User') }}</a>
                <a class="collapse-item" href="{{ route('admin.inactive') }}">{{ __('User List') }}</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('Lead Management') }}</span>
        </a>
        <div id="collapseTwo" class="collapse {{ menuActive(['client.index', 'client.create']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('client.index') }}">{{ __('Lead Management') }}</a>
                <a class="collapse-item" href="{{ route('client.create') }}">{{ __('Lead Create') }}</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-calendar"></i>
            <span>{{ __('Event Management') }}</span>
        </a>
        <div id="collapseEvent" class="collapse {{ menuActive(['admin.event']) }}" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
              
                <a class="collapse-item" href="{{ route('admin.event') }}">{{ __('Manage Event') }}</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- Nav Item - Assets -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAsset" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ __('Assets') }}</span>
        </a>
        <div id="collapseAsset" class="collapse {{ menuActive(['admin.assetType', 'admin.equipment']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
               

                <a class="collapse-item" href="{{ route('admin.assetType') }}">{{ __('Assset Type') }}</a>
                <a class="collapse-item" href="{{ route('admin.equipment') }}">{{ __('Equipment') }}</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>{{ __('Leave') }}</span>
        </a>
        <div id="collapseLeave" class="collapse {{ menuActive(['admin.addLeaveType', 'admin.leaveRequest']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
               

                <a class="collapse-item" href="{{ route('admin.addLeaveType') }}">{{ __('Add Leave Type') }}</a>
                <a class="collapse-item" href="{{ route('admin.leaveRequest') }}">{{ __('Leave Request') }}</a>

            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLanguage"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>{{ __('Manage Language') }}</span>
        </a>
        <div id="collapseLanguage" class="collapse {{ menuActive(['admin.language']) }}" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">

                <a class="collapse-item" href="{{ route('admin.language') }}">{{ __('Add Language') }}</a>


            </div>
        </div>
    </li>
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselogo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ __('Setting') }}</span>
        </a>
        <div id="collapselogo"
            class="collapse {{ menuActive(['sitename', 'logo', 'signature.create', 'admin.time.index', 'copyright', 'shift', 'email.config']) }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
               
                <a class="collapse-item" href="{{ route('sitename') }}"> {{ __('Change Site Name') }}</a>
                <a class="collapse-item" href="{{ route('logo') }}"> {{ __('Change Logo') }}</a>
                <a class="collapse-item" href="{{ route('signature.create') }}">
                    {{ __('Change Signature') }}</a>
                <a class="collapse-item" href="{{ route('admin.time.index') }}"> {{ __('Change TimeZone') }}</a>
                <a class="collapse-item" href="{{ route('copyright') }}"> {{ __('Change Copyright') }}</a>
                <a class="collapse-item" href="{{ route('shift') }}">{{ __('Shift Setting') }}</a>
                <a class="collapse-item" href="{{ route('email.config') }}">{{ __('Email Setting') }}</a>
                <a class="collapse-item" href="{{ route('our_backup_database') }}">{{ __('Database Backup') }}</a>

            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">


    <div class="text-center d-none d-md-inline">
        <button class="border-0 rounded-circle" id="sidebarToggle"></button>
    </div>



</ul>


<!-- End of Sidebar -->




