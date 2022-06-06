<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-custom sidebar sidebar-dark accordion" id="accordionSidebar">

    <div class="container mt-3 mb-3 justify-content-center">
        <img class="employee-mimg" src="{{asset('assets/images/logo/'.@$sitename->logo)}}" alt="" width="100px" width="50px" align="center">
    </div>

    <hr class="my-0 sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="{{route('employee.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('Dashboard')}}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseF"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>{{__('File Management')}}</span>
        </a>
        <div id="collapseF" class="collapse {{menuActive(['employee.files.index','user-sending-list','user-receiving-list'])}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                <div class="py-2 bg-white rounded collapse-inner">
                    <h6 class="collapse-header">{{__('File-Management System')}}</h6>
                    <a class="collapse-item" href="{{route('employee.files.index')}}">{{__('Add File')}}</a>
                    <a class="collapse-item" href="{{route('user-sending-list')}}">{{__('Sending List')}}</a>
                    <a class="collapse-item" href="{{route('user-receiving-list')}}">{{__('Receving List')}}</a>
                </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseA"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clock"></i>
            <span>{{__('Attendance')}}</span>
        </a>
        <div id="collapseA" class="collapse {{menuActive(['employee.attendanceform','employee.attendancelist'])}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <h6 class="collapse-header">{{__('Attendance')}}</h6>

                <a class="collapse-item" href="{{route('employee.attendanceform')}}">{{__('Attendance Form')}}</a>
                <a class="collapse-item" href="{{route('employee.attendancelist')}}">{{__('My Attendance')}}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAa"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tasks"></i>
            <span>{{__('My Tasks')}}</span>
        </a>
        <div id="collapseAa" class="collapse {{menuActive(['employee.tasks'])}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <h6 class="collapse-header">{{__('My Tasks')}}</h6>

                <a class="collapse-item" href="{{route('employee.tasks')}}">{{__('Tasks')}}</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseL"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>{{__('Leave')}}</span>
        </a>
        <div id="collapseL" class="collapse {{menuActive(['empolyee.leave'])}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <h6 class="collapse-header">{{__('File-Management System')}}</h6>

                <a class="collapse-item" href="{{route('empolyee.leave')}}">{{__('Leave request')}}</a>
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
