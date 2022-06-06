<nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light topbar static-top">

    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="ml-auto navbar-nav">


        <li class="mx-1 nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="{{ route('admin.attendanceform') }}" role="button">
                <i class="fas fa-clock fa-fw"></i>


            </a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
               
                <span class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->count() }}</span>
            </a>
          
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    {{__('Notification Center')}}
                </h6>
                @foreach (auth()->user()->unreadNotifications as $n)
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div>
                            <div class="text-truncate">{{ $n->data['data'] }}</div>
                            <div class="small text-gray-500">{{ $n->created_at }}</div>
                        </div>
                    </a>
                @endforeach

                <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.markread') }}">{{__('mark as read')}}</a>
            </div>
        </li>


        <li class="mx-1 nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="{{ route('admin.event') }}">
                <i class="fas fa-calendar fa-fw"></i>


            </a>
        </li>

        <li class="mx-1 my-auto nav-item dropdown no-arrow">
            <select name="" id="" class="changeLang form-control">
                <option value="">{{ __('Change Language') }}</option>
                @foreach ($language_top as $top)
                    <option value="{{ $top->short_code }}"
                        {{ session('locale') == $top->short_code ? 'selected' : '' }}>{{ __(strtoupper($top->name)) }}
                    </option>

                @endforeach
            </select>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 text-gray-600 d-none d-lg-inline small">{{ Auth::user()->name }}</span>

            </a>
            
            <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile', Auth::user()->id) }}">
                    <i class="mr-2 text-gray-400 fas fa-user fa-sm fa-fw"></i>
                    {{__('Profile')}}
                </a>
                <a class="dropdown-item" href="{{ route('admin.pssword.change', Auth::user()->id) }}">
                    <i class="mr-2 text-gray-400 fas fa-lock fa-sm fa-fw"></i>
                    {{ __('Change Password') }}
                </a>



                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST" class="text-center">
                    @csrf
                    <button type="submit" class="btn">{{ __('Logout') }}</button>
                </form>


            </div>
        </li>

    </ul>

</nav>

