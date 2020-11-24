<header>
    <div class="nav-bar container container-palette">
        <div class="wide-container">
            <div class="flex-row">
                <div class="grid logo-container">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <b class="text-color-primary">Pet</b>Hotel
                        </a>
                    </div>
                </div><!-- ./ logo -->
                <div class="grid nav-menu nav-lang">
                    <nav class="navbar navbar-expand-sm navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse default-menu-collapse" id="main-menu">
                            <button class="navbar-toggler mobile-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="icon_close_alt2"></i>
                            </button>
                            <ul class="nav navbar-nav collapse navbar-collapse default-menu"  id="navbarNavDropdown">
                                <li class="nav-item dropdown ">
                                    <a href="{{url('/')}}" class="btn btn-clear">Home</a>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a href="{{route('room.list')}}" class="btn btn-clear">Room List</a>
                                </li>

                                @guest
                                @else
                                    @role('Customer')
                                    <li class="nav-item dropdown ">
                                        <a href="{{route('room-booking.index')}}" class="btn btn-clear">My Booking</a>
                                    </li>
                                    @endrole
                                    @role('Employee')
                                        <li class="nav-item dropdown ">
                                            <a href="{{route('task-complete.index')}}" class="btn btn-clear">Task</a>
                                        </li>
                                    @endrole
                                    @role('Admin')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Administration
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('users.index')}}">Add New User</a>
                                            <a class="dropdown-item" href="{{route('room-category.index')}}">Add New Room Category</a>
                                            <a class="dropdown-item" href="{{route('room-facility.index')}}">Add New Facility</a>
                                            <a class="dropdown-item" href="{{route('room.index')}}">Add New Room</a>
                                            <a class="dropdown-item" href="{{route('booking.report')}}">Booking Report</a>
                                            <a class="dropdown-item" href="{{route('task.index')}}">Task</a>
                                            <a class="dropdown-item" href="{{route('assign-employee.index')}}">Assign Employee</a>
                                        </div>
                                    </li>
                                    @endrole
                                @endguest
                                <li class="nav-item dropdown  ">
                                    <a href="{{route('about')}}" class="btn btn-clear">About</a>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a href="{{route('contact')}}" class="btn btn-clear">Contact Us</a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="btn btn-clear">Sign In</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}" class="btn btn-clear">Register</a>
                                        </li>
                                    @endif
                                @else

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu">
                                            @role('Admin')
                                            <a class="dropdown-item"  href="{{ route('roles.index') }}">Manage Role</a>
                                            @endrole
                                            <a class="dropdown-item"  href="{{ route('password.edit') }}">Change Password</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest

                            </ul>
                        </div>
                    </nav>
                    <div class="lang-manu dropdown mobile">
                        <button class="btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>En</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="{{url('')}}/assets/img/flags/en.png" alt="" class="" />En
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="{{url('')}}/assets/img/flags/hr.png" alt="" class="" />Hr
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item rtl" href="?test=rtl">
                                    <img src="{{url('')}}/assets/img/flags/ae.png" alt="" class="" />Ar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- ./ main menu -->
                <div class="grid quick-navigation">
                    <div class="lang-manu display dropdown">
                        <button class="btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>En</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="{{url('')}}/assets/img/flags/en.png" alt="" class="" />En
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <img src="{{url('')}}/assets/img/flags/hr.png" alt="" class="" />Hr
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item rtl" href="?test=rtl">
                                    <img src="{{url('')}}/assets/img/flags/ae.png" alt="" class="" />Ar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- ./ actions panel -->
            </div>
        </div>
    </div> <!-- ./ navigation bar -->
</header><!-- ./ header -->