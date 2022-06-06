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
            <a class="nav-link dropdown-toggle" href="{{route('employee.attendanceform')}}"  role="button">
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
                <span class="badge badge-danger badge-counter">{{auth()->user()->unreadNotifications->count()}}</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    {{__('Notification Center')}}
                </h6>
                @foreach (auth()->user()->unreadNotifications as $n)
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div>
                        <div class="text-truncate">{{$n->data['data']}}</div>
                        <div class="small text-gray-500">{{$n->created_at}}</div>
                    </div>
                </a>
                @endforeach

                <a class="dropdown-item text-center small text-gray-500" href="{{route('markread')}}">mark as read</a>
            </div>
        </li>

        <li class="mx-1 my-auto nav-item dropdown no-arrow"> 
            <select name="" id="" class="changeLang form-control">
                <option value="">{{__('Change Language')}}</option>
                @foreach ($language_top as $top)
                <option value="{{$top->short_code}}" {{session('locale') == $top->short_code ? 'selected' : ''}}>{{__(strtoupper($top->name))}}</option>
                    
                @endforeach
            </select>
          </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('employee.profile')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="{{route('employee.password.change',Auth::user()->id)}}">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
